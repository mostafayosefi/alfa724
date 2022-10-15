<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Score\ScoreSetting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScoreSettingController extends Controller
{


    public function index(){
        $score_settings= ScoreSetting::all();
        return view('dashboard.admin.score.setting.index' , compact(['score_settings'  ]));
    }


    public function create(){
        return view('admin.value.create' );
    }

    public function edit($id){
        $value=Value::find($id);
        return view('admin.value.edit' , compact(['value'  ]));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);
        $data = $request->all();
        $data['image']  =  uploadFile($request->file('image'),'images/values','');

       Value::create($data);
       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.value.index');
    }

    public function show($id)
    {
        //
    }



    public function update(Request $request , $id ){
        $request->validate([
            'value' => 'required',
        ]);
         $score_settings=ScoreSetting::find($id);
        $data = $request->all();

        $data['price'] = str_rep_price($data['price']);
        $data['price_award'] = str_rep_price($data['price_award']);

        $score_settings->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        Value::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'values');
        return back();
    }




}
