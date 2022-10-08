<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\Models\User;
use App\Models\Project;
use App\Models\Phase;
use App\Models\Customer;
use App\Models\Service;
use App\Models\EmployeeProject;
use App\Models\MyService;
use App\Models\Price\PriceMyService;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
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
            'durday' => 'required|numeric',
            'price' => 'required',
        ]);
        $data = $request->all();
        $data['startdate'] = convert_shamsi_to_miladi($data['startdate'],'/');
        $data['price'] = str_rep_price($data['price']);
        $data['count'] = 1;
        $data['enddate']  = computing_day_work($data['startdate'],$data['durday']);
       $myservice = MyService::create($data);
       return redirect()->route('dashboard.admin.service.show',$myservice )->with('info', '  سرویس جدید ذخیره شد و نام آن' .' ' . $data['name'] );

    }

    public function show($id)
    {

        $item = MyService::find($id);
        $my_service = MyService::find($id);
        $customer = $item->customer;
        insert_task_in_cleander($item->startdate,$item->enddate,'my_services',$id ,'miladi');
        return view('dashboard.admin.service.show' , compact([   'item'  ,'customer'  ,'my_service'     ]));


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
        $users = User::orderBy('created_at', 'desc')->get();
         return view('dashboard.admin.service.edit' , compact([   'item'  ,'customer'    ,'users'     ]));

    }

    public function update($id , Request $request)
    {


        $request->validate([
            'name' => 'required',
            'durday' => 'required|numeric',
            'price' => 'required',
        ]);

        $my_service=MyService::find($id);
        $data = $request->all();
        $data['startdate'] = convert_shamsi_to_miladi($data['startdate'],'/');
        $data['price'] = str_rep_price($data['price']);
        $data['enddate']  = computing_day_work($data['startdate'],$data['durday']);

        $data['purdate'] = convert_shamsi_to_miladi($data['purdate'],'/');
        $data['recvdate'] = convert_shamsi_to_miladi($data['recvdate'],'/');

        $my_service->update($data);

        return redirect()->route('dashboard.admin.service.show',$my_service->id)->with('info', 'خدمت ویرایش شد');
    }



    public function price( Request $request)
    {


        $request->validate([
            'date' => 'required',
            'price' => 'required',
            'text' => 'required',
        ]);
        $data = $request->all();
        $data['miladi'] = convert_shamsi_to_miladi($data['date'],'/');
        $data['price'] = str_rep_price($data['price']);
       $pricemyservice = PriceMyService::create($data);



       return redirect()->route('dashboard.admin.service.show', $data['my_service_id'] )
       ->with('info',  'تراکنش ثبت '.law_name($data['type']).' باموفقیت انجام شد') ;

    }


    public function destroy_price($id , Request $request){

        $price_my_service = PriceMyService::find($id);
        PriceMyService::destroy($id);
        return redirect()->back()
        ->with('info',  'تراکنش  '.law_name($price_my_service->type).' باموفقیت حذف شد') ;

    }


}
