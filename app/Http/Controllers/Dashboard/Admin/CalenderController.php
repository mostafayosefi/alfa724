<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cleander\CleanderMonth;
use App\Models\Cleander\CleanderToday;
use App\Models\Cleander\CleanderYear;
use App\Models\date;
use Illuminate\Http\Request;

class CalenderController extends Controller
{



    public function manage($type,$year = null ,$month = null ){




        updatecleandertoday();

        $year = '1401';
        $month = '06';
        $day = '1';
        check_cleander_year($year);
        echo  check_cleander_month($year,$month);
      //   check_holiday($year,$month,$day);



  //  echo    operator_month($year,$month,'countdaymonth');


  $cleander_year=CleanderYear::where([ ['year','=','1401'] ])->first();

  $cleander_month = CleanderMonth::where([ ['month','=','06'],
  ['cleander_year_id','=',$cleander_year->id]  ])->first();
  $cleander_today = CleanderToday::find(1);

$id = 1 ;
      $posts=date::orderBy('created_at', 'asc')->get();


       return view('dashboard.admin.calender.manage' , compact(['posts'   , 'cleander_month'
       , 'cleander_today'  , 'id'  ]));



    }






    public function index(){
        $values= Value::all();
        return view('admin.value.index' , compact(['values'  ]));
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



    public function update(Request $request, $id , Value $value){
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);
        $value=Value::find($id);
        $data = $request->all();
        $data['image']= $value->image;
        $data['image']  =  uploadFile($request->file('image'),'images/values',$value->image);
        $value->update($data);
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
