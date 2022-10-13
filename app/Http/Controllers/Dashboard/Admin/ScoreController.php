<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\ScoreCreateRequest;
use App\Http\Requests\Dashboard\Admin\ScoreUpdateRequest;
use App\Http\Requests;
use App\Models\Score;
use App\Models\Score\ScoreSetting;
use App\Models\User;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {

        // $scores = Score::paginate(15);
        $scores = Score::orderBy('id', 'desc')->paginate(10);


        return view('dashboard.admin.score.index', ['scores' => $scores ] );
    }

    public function create($value)
    {
        $users = User::where([ ['id','<>' , '0'] ])->orderBy('id','desc')->get();
        $score_settings = ScoreSetting::where([ ['id','<>' , '0'] ])->orderBy('id','asc')->get();
        return view('dashboard.admin.score.create' , compact([ 'users' , 'score_settings' , 'value'  ]) );
    }

    public function store($value ,Request $request)
    {
        // $score = new Score($data = $request->validated());
        // $score->user()->associate($data['user_id']);
        // $score->save();


        $request->validate([
            'value' => 'required|numeric',
        ]);



        $data = $request->all();


        // dd($data);

        $data['type']=$value;
        $data['value']=$request->value;
        $data['description']=$request->text_value.' '.$request->text_price;

        $data['price'] = str_rep_price($data['price']);


       $create = Score::create($data);



        return redirect()->route('dashboard.admin.score.index')->with('info', 'امتیاز ایجاد شد!');
    }

    public function edit(  $id)
    {

        $score = Score::find($id);

        return view('dashboard.admin.score.edit', ['score' => $score]);
    }

    public function update(Request $request,  $id)
    {
        // $score->update($request->validated());
        // $score->save();

        $request->validate([
            'value' => 'required|numeric',
        ]);

        $data = $request->all();

        $data['price'] = str_rep_price($data['price']);
        $score = Score::find($id);
        $score->update($data);

        return redirect()->route('dashboard.admin.score.index')->with('info', 'امتیاز ویرایش شد!');
    }

    public function delete($id) {
        $post = Score::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.score.index')->with('info', 'امتیاز حذف شد!');
    }



    public function destroy_get($id){
        Score::destroy($id);
        return redirect()->back()->with('info', 'امتیاز باموفقیت حذف شد ' );

    }


    public function deleteall(  Request $request){

        $data['delete'] = $request->delete;

        if($data['delete']){
            foreach($data['delete'] as $key => $location){
                Score::destroy($location);
              }

              return redirect()->back()->with('info', 'امتیازهای های انتخابی باموفقیت حذف شدند ' );

        }else{

            return redirect()->back()->with('info', 'متاسفانه آیتمی انتخاب نشده است!' );
        }

            }


}
