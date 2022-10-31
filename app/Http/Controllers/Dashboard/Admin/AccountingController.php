<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Phase;
use App\Http\Requests;
use App\Models\Salary;
use App\Models\Project;
use App\Models\Service;
use App\Models\MyService;
use App\Rules\ValidateRule;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Hekmatinasser\Verta\Verta;
use App\Models\EmployeeProject;
use Illuminate\Auth\Access\Gate;
use App\Http\Controllers\Controller;
use App\Models\Price\PriceMyProject;
use App\Models\Price\PriceMyService;
use App\Models\Price\PriceSystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

class AccountingController extends Controller
{
<<<<<<< HEAD
    public function create($flag)
    {
        return view('dashboard.admin.money.system.create', compact([ 'flag' ]));
    }

    public function index_system($flag)
    {
        $parametr = $flag;
        $flag = law_type($flag);
        $items = PriceSystem::where([ ['type',$flag ], ])->get();
        return view('dashboard.admin.money.system.index', compact([ 'flag' , 'items' , 'parametr' ]));
    }

    public function index_project($flag)
    {
        $parametr = $flag;
        if($flag=='all'){
            $mymodel=PriceMyProject::where([ ['type','<>',$flag ], ]);
        }else{
            $mymodel=PriceMyProject::where([ ['type',$flag ], ]);
        }

        $items = $mymodel->orderBy('id','desc')->get();
        
        return view('dashboard.admin.money.system.index', compact([ 'flag' , 'items'   ]));
    }

    public function store($flag , Request $request )
    {


        $request->validate([
            'date' => 'required',
            'price' => ['required',new ValidateRule('validate_rep_price')] ,
            'description' => 'required|max:5000',
        ]);
        $data = $request->all();
        $data['miladi'] = convert_shamsi_to_miladi($data['date'],'/');
        $data['price'] = str_rep_price($data['price']);

        $path = 'price_system_'.$data['type'];
        $price_system = PriceSystem::create($data);
          uploader_multiple($request,$path,'' , 1 , $price_system->id);
       return redirect()->route('dashboard.admin.money.index_system',  [ $flag ])
       ->with('info',  'تراکنش ثبت '.law_name($data['type']).' باموفقیت انجام شد') ;


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

        $price_system = PriceSystem::find($data['my_price_id']);

        $path = 'price_system_'.$data['type'];

        $price_system->update($data);

          uploader_multiple($request,$path,'' , 1, $price_system->id);
       return redirect()->back()
       ->with('info',  'تراکنش ویرایش '.law_name($data['type']).' باموفقیت انجام شد') ;

    }


    public function destroy_price($id , Request $request){
        $price_system = PriceSystem::find($id);
        PriceSystem::destroy($id);
        return redirect()->back()
        ->with('info',  'تراکنش  '.law_name($price_system->type).' باموفقیت حذف شد') ;

    }








=======
>>>>>>> refs/remotes/origin/master
    public function index()
    {
        $employee=EmployeeProject::orderBy('created_at', 'desc')->get();
        $service= Service::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.money.index', ['employee' => $employee, 'salaries' => Salary::all(),'service' => $service,]);
    }

    public function report_service( $year = null ,$month = null )
    {
        $type = 'service';
       $cleander_month =  calender_route_origin($year  ,$month , 'cleander_month'  );
       $cleander_today = calender_route_origin($year  ,$month , 'cleander_today'  );
        $price_my_services = PriceMyService::where([ ['id','<>','0'], ])->orderBy('miladi' , 'desc')->get();
        $my_services = MyService::where([ ['id','<>','0'], ])->orderBy('id' , 'desc')->get();
        return view('dashboard.admin.money.report.service.index' , compact([   'cleander_month' ,
        'cleander_today'  , 'price_my_services' , 'type'  , 'my_services'     ]));

    }

    public function report_service_price( $type ,  $year = null ,$month = null )
    {
       $cleander_month =  calender_route_origin($year  ,$month , 'cleander_month'  );
       $cleander_today = calender_route_origin($year  ,$month , 'cleander_today'  );
        $price_my_services = PriceMyService::where([ ['id','<>','0'], ])->orderBy('miladi' , 'desc')->get();
        $my_services = MyService::where([ ['id','<>','0'], ])->orderBy('id' , 'desc')->get();
        return view('dashboard.admin.money.report.service.index' , compact([   'cleander_month' ,
        'cleander_today'  , 'price_my_services' , 'type'  , 'my_services'     ]));

    }


}
