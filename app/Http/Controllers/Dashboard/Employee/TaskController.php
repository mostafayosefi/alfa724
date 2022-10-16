<?php

namespace App\Http\Controllers\Dashboard\Employee;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Employee\TaskCreateRequest;
use App\Http\Requests\Dashboard\Employee\TaskStatusUpdateRequest;
use App\Http\Requests\Dashboard\Employee\TaskUpdateRequest;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TaskRequest;
use Illuminate\Session\Store;
use App\Models\User;
use App\Models\Task;
use App\Models\Note;
use App\Models\Project;
use App\Models\Phase;
use App\Models\Absence;
use App\Models\message;
use App\Models\EmployeeProject;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function GetCreatePost()
    {
        return view('dashboard.card.task.create');
    }

    public function CreatePost(TaskRequest $request)
    {
        $data = $request->validated();
        $data['employee_id'] = Auth::user()->id;
        $post = new Task($data);
        $post->save();
        return redirect()->route('dashboard.employee.task.manage')->with('info', 'مسئولیت جدید اضافه شد ' );
    }

    public function GetManagePost(Request $request)
    {
        $message=message::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $absence=Absence::orderBy('created_at', 'desc')
        ->where('employee_id',Auth::user()->id)
        ->where('date',Carbon::now()->format('Y-m-d'))->FIRST();
        $diff=NULL;
        if($absence != NULL){
        if($absence->exit != NULL){
            $diff = strtotime($absence->exit) - strtotime($absence->enter);
            if($diff < 60){
                $diff= $diff.' ثانیه ';
            }
            elseif($diff < 3600){
                $diff=  round($diff / 60,0,1).' دقیقه ';
            }
            elseif($diff >= 3660 && $diff < 86400){
                $diff=  round($diff / 3600,0,1).' ساعت ';
            }
            elseif($diff > 86400){
                $diff=  round($diff / 86400,0,1).' روز ';
            }
        }
        }
        $task=Task::managePage()->where('status','!=','done')->where('employee_id',Auth::user()->id)->orderBy('finish_date', 'asc')->limit(90)->get();
        $note=Note::where('user_id',Auth::user()->id)->orderBy('created_at', 'asc')->limit(30)->get();
        $write=Task::managePage()->where('status','!=','done')->where('employee_id',Auth::user()->id)->where('project_id',null)->orderBy('finish_date', 'asc')->paginate(6);

        $users = User::where([ ['id','<>',0], ['id','=',Auth::user()->id], ])->get();

        return view('dashboard.employee.task.manage', [
        'task' => $task,
        'note' => $note,
        'write' => $write,
        'absence' => $absence,
        'diff' => $diff,
        'message' => $message,
        'users' => $users
        ]);
    }

    public function GetTask($id,Request $request)
    {
        $task=Task::find($id);
        return view('dashboard.employee.task.show', ['task' => $task]);
    }

    public function UpdatePost( TaskStatusUpdateRequest $request)
    {
        $post = Task::find($request->input('id'));
        if (!is_null($post)) {
            $old_status = $post->status;
            $post->update($request->validated());

        }
        return redirect()->route('dashboard.employee.task.manage')->with('info', 'مسئولیت انجام شد');
    }


    public function EditPost(  TaskRequest $request)
    {
        $data = $request->validated();
        $data['employee_id'] = Auth::user()->id;
        $post = Task::find($request->task_id);
        // dd($data);

        if (!is_null($post)) {
            $old_status = $post->status;
            $post->update($data);
            // if ($post->status == 'done' && $old_status != $post->status)
            //     $post->applyEmployeeScore(Auth::user());
        }
        return redirect()->back()->with('info', 'مسئولیت ویرایش شد');
    }


    //ABSENCCE CONTROLLER
    public function Absence(Request $request)
    {
       $absence=NULL;
       $absence=Absence::where('employee_id', Auth::user()->id)->where('date',Carbon::now()->format('Y-m-d'))->where('exit', NULL)->orderBy('created_at', 'desc')->FIRST();
       if($absence == NULL){
        $post = new Absence([
            'employee_id' => Auth::user()->id,
            'date' => Carbon::now(),
            'enter'=>Carbon::now()->isoFormat('HH:mm:ss')
        ]);
        $post->save();
        return redirect()->route('dashboard.employee.task.manage')->with('info', 'حضوری شما زده شد ' );
       }
       else{
        return redirect()->route('dashboard.employee.task.manage')->with('info', 'شما حضوری خود را ثبت کرده اید' );
    }
    }
    public function AbsenceEnd($id,Request $request)
    {
        $post = Absence::find($id);
        if (!is_null($post)) {
            $post->exit = Carbon::now()->isoFormat('HH:mm:ss');
            $post->hours = strtotime(Carbon::now()->isoFormat('HH:mm:ss')) - strtotime($post->enter);
            $post->save();
        }
        return redirect()->route('dashboard.employee.task.manage')->with('info', 'ساعت خروج شما ثبت شد ' );
    }


   //NOTE CONTROLLER
    public function CreateNote(Request $request)
    {
        $this->validate($request, [
            'content' => ['required', 'string', 'max:5000'] ,
        ]);
        $post = new Note([
            'content' => $request->input('content'),
            'user_id' =>  Auth::user()->id,
        ]);
        $post->save();
        return redirect()->back()->with('info', 'یادداشت جدید اضافه شد ' );
    }

    public function DeleteNote($id){
        $post = Note::find($id);
        $post->delete();
        return redirect()->back()->with('info', 'یادداشت پاک شد ' );
    }

    public function GetEditNote($id)
    {
        $post = Note::find($id);
        return view('dashboard.card.note.updatenote', ['post' => $post, 'id' => $id]);
    }

    public function UpdateNote(Request $request)
    {
        $this->validate($request, [
            'content' => ['required', 'string', 'max:5000'] ,
        ]);
        $post = Note::find($request->input('id'));
        if (!is_null($post)) {
            $old_status = $post->status;
            $post->content = $request->input('content');
            $post->save();

        }
        return redirect()->route('dashboard.employee.task.manage')->with('info', 'یادداشت ویرایش شد');
    }


    public function index()
    {


        $mydate =now()->format('Y-m-d H:i:s');


        // $date_output = add_date_func('Y-m-d H:i:s' , $mydate , '-7' , ' days');
        // $task=Task::where([ ['employee_id',Auth::user()->id],   ])->orderBy('finish_date', 'desc')->get();

        $date_output = add_date_func('Y-m-d H:i:s' , $mydate , '-7' , ' days');
        $task=Task::where([ ['employee_id',Auth::user()->id],  ])->orderBy('finish_date', 'desc')->paginate(10);
        return view('dashboard.employee.task.index', ['task' => $task , 'guard' => 'user'  ]);
    }



    public function destroy($id , Request $request){
        Task::destroy($request->id);
        return redirect()->back()->with('info', 'مسئولیت باموفقیت حذف شد ' );

    }




    public function deleteall(  Request $request){


        // $data = $request->all();
        $data['delete'] = $request->delete;


        if($data['delete']){
            foreach($data['delete'] as $key => $location){
                // echo $location.'<br>';
                Task::destroy($location);
              }

              return redirect()->back()->with('info', 'مسئولیت های انتخابی باموفقیت حذف شدند ' );

        }else{

            return redirect()->back()->with('info', 'متاسفانه آیتمی انتخاب نشده است!' );
        }


    }


}
