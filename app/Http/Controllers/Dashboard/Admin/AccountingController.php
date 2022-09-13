<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use App\Models\Phase;
use App\Models\EmployeeProject;
use App\Models\Price\PriceMyService;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use Hekmatinasser\Verta\Verta;
use Carbon\Carbon;
use App\Models\Service;

class AccountingController extends Controller
{
    public function GetEmployee()
    {
        $employee=EmployeeProject::orderBy('created_at', 'desc')->get();
        $service= Service::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.money.employee', ['employee' => $employee, 'salaries' => Salary::all(),'service' => $service,]);
    }

    public function report( $year = null ,$month = null )
    {
        $type =  explode_url('4');

       $cleander_month =  calender_route_origin($year  ,$month , 'cleander_month'  );
       $cleander_today = calender_route_origin($year  ,$month , 'cleander_today'  );

        $price_my_service = PriceMyService::where([ ['id','<>','0'], ])->get();
        $employee=EmployeeProject::orderBy('created_at', 'desc')->get();
        $service= Service::orderBy('created_at', 'desc')->get();


        return view('dashboard.admin.money.report.index' , compact([   'cleander_month' ,
        'cleander_today'  , 'price_my_service' , 'type'     ]));


        // return view('dashboard.admin.money.report.index', ['employee' => $employee, 'salaries' => Salary::all(),'service' => $service,]);
    }


}
