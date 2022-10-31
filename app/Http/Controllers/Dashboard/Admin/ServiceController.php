<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Phase;
use App\Http\Requests;
use App\Models\Salary;
use App\Models\Project;
use App\Models\Service;
use App\Models\Customer;
use App\Models\MyService;
use App\Rules\ValidateRule;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Models\EmployeeProject;
use Illuminate\Auth\Access\Gate;
use App\Http\Controllers\Controller;
use App\Models\Price\PriceMyService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceController extends Controller
{

    public function index()
    {
        $myservices = MyService::where([ ['id' , '<>' , '0'] ])->orderBy('id','desc')->get();
        return view('dashboard.admin.service.manage' , compact([   'myservices'    ]));

    }

    public function create($customer_id=null)
    {

        $users = User::orderBy('created_at', 'desc')->get();
        if($customer_id==null){
            $customer = Customer::orderby('id','desc')->get();
        }else{
            $customer = Customer::find($customer_id);
        }

        return view('dashboard.admin.service.create' , compact([   'users'  ,'customer' , 'customer_id'    ]));

    }

    public function store( Request $request)
    {


        $request->validate([
            'name' => 'required',
<<<<<<< HEAD
            'startdate' => 'required',
=======
            'durday' => 'required|numeric',
>>>>>>> refs/remotes/origin/master
            'price' => ['required',new ValidateRule('validate_rep_price')] ,
        ]);
        $data = $request->all();
        $data['startdate'] = convert_shamsi_to_miladi($data['startdate'],'/');
        $data['price'] = str_rep_price($data['price']);
        $data['count'] = 1;
        if($data['dur_date']=='dur'){
            $data['enddate']  = computing_day_work($data['startdate'],$data['durday']);
        } else{

            $data['durday'] = 0;
            $datestartfinish=check_date_startfinish($data['startdate']  , $data['enddate'] );
            if($datestartfinish=='false'){
                return redirect()->back()->withErrors(['enddate' => 'تاریخ پایان نباید از تاریخ شروع کوچک‌تر باشد.']);
            }

          }


// dd($data);

       $myservice = MyService::create($data);
       return redirect()->route('dashboard.admin.service.show',$myservice )->with('info', '  سرویس جدید ذخیره شد و نام آن' .' ' . $data['name'] );

    }

    public function show($id)
    {

        $item = MyService::find($id);
        $my_service = MyService::find($id);
        $customer = $item->customer;



        $price_my_service_depo = PriceMyService::where([ ['my_service_id',$id], ['type','depo'], ])->get();
        $price_my_service_cost = PriceMyService::where([ ['my_service_id',$id], ['type','cost'], ])->get();


        insert_task_in_cleander($item->startdate,$item->enddate,'my_services',$id ,'miladi');
        return view('dashboard.admin.service.show' , compact([   'item'  ,'customer'  ,'my_service'
         , 'price_my_service_cost'  , 'price_my_service_depo' ]));


    }

    public function GetManagePost(Request $request)
    {
        $myservices = MyService::where([ ['id' , '<>' , '0'] ])->orderBy('id','desc')->get();
        return view('dashboard.admin.service.manage' , compact([   'myservices'    ]));
    }

    public function DeletePost($id){
        $post = MyService::find($id);
        $customer=$post->customer_id;
        $post->delete();
        return redirect()->route('dashboard.admin.customer.show',$customer)->with('info', 'خدمت پاک شد');
    }

    public function edit($id)
    {

        $item = MyService::find($id);
        $customer = $item->customer;
        $customers = Customer::all();

        $users = User::orderBy('created_at', 'desc')->get();
         return view('dashboard.admin.service.edit' , compact([   'item'  ,'customer'  ,'customers'  ,'users'     ]));

    }

    public function update($id , Request $request)
    {


        $request->validate([
            'name' => 'required',
            'durday' => 'required|numeric',
            'price' => ['required',new ValidateRule('validate_rep_price')] ,
        ]);

        $my_service=MyService::find($id);
        $data = $request->all();
        $data['startdate'] = convert_shamsi_to_miladi($data['startdate'],'/');
        $data['enddate'] = convert_shamsi_to_miladi($data['enddate'],'/');
        $data['price'] = str_rep_price($data['price']);


        if($data['dur_date']=='dur'){
            $data['enddate']  = computing_day_work($data['startdate'],$data['durday']);
        } else{
            $data['durday']=0;
            $datestartfinish=check_date_startfinish($data['startdate']  , $data['enddate'] );
            if($datestartfinish=='false'){
                return redirect()->back()->withErrors(['enddate' => 'تاریخ پایان نباید از تاریخ شروع کوچک‌تر باشد.']);
            }


        }

        $data['purdate'] = convert_shamsi_to_miladi($data['purdate'],'/');
        $data['recvdate'] = convert_shamsi_to_miladi($data['recvdate'],'/');

        $my_service->update($data);

        return redirect()->route('dashboard.admin.service.show',$my_service->id)->with('info', 'خدمت ویرایش شد');
    }



    public function price( Request $request)
    {


        $request->validate([
            'date' => 'required',
            'price' => ['required',new ValidateRule('validate_rep_price')] ,
            'description' => 'required',
        ]);
        $data = $request->all();
        $data['miladi'] = convert_shamsi_to_miladi($data['date'],'/');
        $data['price'] = str_rep_price($data['price']);

<<<<<<< HEAD

        $my_service = MyService::find($data['my_service_id']);
        $sumdepo = sum_price_depocost($my_service->price_my_services,'depo','service');
        $sumcost = sum_price_depocost($my_service->price_my_services,'cost','service');
        $kolli = $my_service->price - $sumdepo;


        if(($data['price'] > ($my_service->price - $sumcost))&&($data['type']=='cost')){
            return redirect()->back()
            ->with('info',  'هزینه پرداختی بیشتر از سود خدمت می باشد لطفا مبلغی مناسب خدمت هزینه نمایید!') ;
        }
        if(($data['price'] > ($kolli))&&($data['type']=='depo')){
            return redirect()->back()
            ->with('info',  'بیعانه دریافتی بیشتر از مبلغ کل خدمت می باشد لطفا مبلغی مناسب خدمت ثبت بیعانه نمایید!') ;
=======
        if(($data['price'] > $data['kolli'])&&($data['type']=='cost')){
            return redirect()->back()
            ->with('info',  'هزینه پرداختی بیشتر از سود پروژه می باشد لطفا مبلغی مناسب پروژه هزینه نمایید!') ;
        }
        if(($data['price'] > ($data['kolli']-$data['sumdepo']))&&($data['type']=='depo')){
            return redirect()->back()
            ->with('info',  'بیعانه دریافتی بیشتر از مبلغ کل پروژه می باشد لطفا مبلغی مناسب پروژه ثبت بیعانه نمایید!') ;
>>>>>>> refs/remotes/origin/master
        }



<<<<<<< HEAD
        $path = 'price_my_service_'.$data['type'];
        $pricemyservice = PriceMyService::create($data);
          uploader_multiple($request,$path,'' , $pricemyservice->my_service_id , $pricemyservice->id);

=======
        $data['file']  =  uploadFile($request->file('file'),'images/price_my_services','');


       $pricemyservice = PriceMyService::create($data);
>>>>>>> refs/remotes/origin/master



       return redirect()->route('dashboard.admin.service.show', $data['my_service_id'] )
       ->with('info',  'تراکنش ثبت '.law_name($data['type']).' باموفقیت انجام شد') ;

    }


    public function destroy_price($id , Request $request){

        $price_my_service = PriceMyService::find($id);
        PriceMyService::destroy($id);
        return redirect()->back()
        ->with('info',  'تراکنش  '.law_name($price_my_service->type).' باموفقیت حذف شد') ;

    }




    public function price_update( Request $request)
    {
        $request->validate([
            'date' => 'required',
            'price' => ['required',new ValidateRule('validate_rep_price')] ,
            'description' => 'required|max:5000',
        ]);
        $data = $request->all();
        $data['miladi'] = convert_shamsi_to_miladi($data['date'],'/');
        $data['price'] = str_rep_price($data['price']);

        $my_service = MyService::find($data['my_service_id']);
        $sumdepo = sum_price_depocost($my_service->price_my_services,'depo','service');
        $sumcost = sum_price_depocost($my_service->price_my_services,'cost','service');
        $kolli = $my_service->price - $sumdepo;

        $price_my_service = PriceMyService::find($data['my_price_id']);

        // echo  $data['price'].'<br>';
        // echo $project->price.'<br>';
        // echo $sumcost - ($price_my_project->price).'<br>';

        // dd('hi');

        if(($data['price'] > ($my_service->price  - ($sumcost-$price_my_service->price)  ))&&($data['type']=='cost')){
            return redirect()->back()
            ->with('info',  'هزینه پرداختی بیشتر از سود پروژه می باشد لطفا مبلغی مناسب پروژه هزینه نمایید!') ;
        }
        if(($data['price'] > ($kolli+$price_my_service->price))&&($data['type']=='depo')){
            return redirect()->back()
            ->with('info',  'بیعانه دریافتی بیشتر از مبلغ کل پروژه می باشد لطفا مبلغی مناسب پروژه ثبت بیعانه نمایید!') ;
        }
        $path = 'price_my_service_'.$data['type'];


        $price_my_service->update($data);

          uploader_multiple($request,$path,'' , $price_my_service->my_service_id , $price_my_service->id);
       return redirect()->back()
       ->with('info',  'تراکنش ویرایش '.law_name($data['type']).' باموفقیت انجام شد') ;

    }






}
