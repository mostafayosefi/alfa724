<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use App\Models\Task;
use App\Rules\TaskRule;
use App\Rules\JalaliDate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        if (in_array($this->method(), ['POST'])) {
            // dd($this->title);
        }

        // dd($this->method());

        return [
            'status' => ['required', 'string'],
            'title' => ['required', 'string', 'max:250'],
            'description' => ['nullable', 'string'],
            'start_date' => ['required', new JalaliDate],
            'finish_date' => ['required', new JalaliDate],
            'start_time' => ['required','nullable', 'regex:/^\d{1,2}:\d{1,2}$/'],
            'finish_time' => ['required','bail', 'required_with:start_time', 'nullable', 'regex:/^\d{1,2}:\d{1,2}$/'],
            'continuity' => ['nullable', 'in:1d,2d'],
            'ignore_conflict' => ['sometimes', 'required', 'in:1'],
        ];

    }


    public function validated()
    {
        $data = parent::validated();
        $task = Task::find($this->id);
        if (
            $data['status'] == 'done' &&
            !empty($data['continuity']) &&
            (empty($task->done_at) || $task->done_at->startOfDay()->lt(now()->startOfDay()))) {
            $data['done_at'] = now();
        }
        return $data;
    }


    public function withValidator(Validator $validator)
    {
        $validator->after(function (Validator $validator) {
            $data = $validator->getData();
            $data['start_date'] = Carbon::fromJalali($data['start_date']);
            $data['finish_date'] = Carbon::fromJalali($data['finish_date']);
            $validator->setData($data);

            if ($data['finish_date']->lt($data['start_date']))
                $validator->errors()->add('finish_date', '?????????? ?????????? ?????????? ???? ?????????? ???????? ??????????????? ????????.');

                if ($data['finish_date'] == $data['start_date']){
                    if (!empty($data['start_time']) && !empty($data['finish_time']) && Carbon::createFromFormat('H:i', $data['finish_time'])->lt(Carbon::createFromFormat('H:i', $data['start_time'])))
                        $validator->errors()->add('finish_date', '???????? ?????????? ?????????? ???? ???????? ???????? ??????????????? ????????.');

                }
            $existing_tasks = Task
                ::where('employee_id', $data['user_id'])
                ->where('status', 'notwork')
                ->where(function ($q) use ($data) {
                    $q
                        ->where(function ($q) use ($data) {
                            $q
                                ->whereNull('continuity');

                            if (empty($data['continuity']))
                                $q
                                    ->where('finish_date', $data['finish_date']);
                            else
                                $q
                                    ->where('finish_date', '<=', $data['finish_date'])
                                    ->where('finish_date', '>=', $data['start_date']);
                        })
                        ->orWhere(function ($q) use ($data) {
                            if (empty($data['continuity']))
                                $q
                                    ->where('finish_date', '>=', $data['finish_date'])
                                    ->where('start_date', '<=', $data['finish_date']);
                            else
                                $q
                                    ->where('start_date', '<=', $data['finish_date'])
                                    ->where('finish_date', '>=', $data['start_date']);
                            $q
                                ->where(function ($q) {
                                    $q->whereNotNull('continuity');
                                });

                        });
                });
            if (!empty($data['start_time']) && !empty($data['finish_time']))
                $existing_tasks = $existing_tasks->where(function($q) use ($data) {
                    $q
                        ->whereNotNull('start_time')
                        ->whereNotNull('finish_time')
                        ->where('start_time', '<=', $data['finish_time'])
                        ->where('finish_time', '>=', $data['start_time']);
                });

            if (!empty($this->id))
                $existing_tasks = $existing_tasks
                    ->where([ ['id', '!=', $this->id], ['employee_id', '=', $data['user_id']], ]);



                    if (in_array($this->method(), ['POST'])) {

                        if (!$this->has('ignore_conflict') && $existing_tasks->count() > 0){
                        $past_task = Task::where([ ['employee_id', '=', $data['user_id']], ])
                        ->orderby('finish_date','desc')->orderby('finish_time','desc')->first();
                        $pdate = date_by_time(   $past_task->finish_date , $past_task->finish_time  );
                        $tarikh = date_frmat($pdate);
                        $newstring="?????? ???????????? ???????? ???????? ?????????? ???? ?????????? ".$tarikh." ???? ?????? ???? ????????";
                        // $validator->errors()->add('start_date', '???? ???????? ?????????? ????????????????? ??????????????????????? ?????????? ???????? ??????????! ???? ???????? ???????????? ?????????? ???????? ???? ???????????? ???????????????? ?????? "??????????????? ???????? ???? ?????????? ??????????" ???? ??????????.'.$newstring);
                        $validator->errors()->add('start_date', '???? ???????? ?????????? ????????????????? ??????????????????????? ?????????? ???????? ??????????!  .'.' '.$newstring);
                        }



                    }

       });
    }




}
