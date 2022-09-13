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
        $employee=EmployeeProject::orderBy('created_at', 'desc')->get();
        $service= Service::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.money.employee', ['employee' => $employee, 'salaries' => Salary::all(),'service' => $service,]);
    }


}
