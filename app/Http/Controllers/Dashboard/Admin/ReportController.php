<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use App\Models\Phase;
use App\Models\Absence;
use App\Models\EmployeeProject;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use Hekmatinasser\Verta\Verta;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $users=User::where('type','employee')->orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.report.index', ['users' => $users]);
    }
    
    public function show($id)
    {
        $post = User::find($id);
        $b= Verta::now()->startMonth()->subMonths(0)->formatGregorian('Y-m-d H:i:s'); 
        $task=Task::where('employee_id',$id)->where('created_at','>', $b)->paginate(50);
        return view('dashboard.admin.report.show', ['task' => $task]);
    }
    
    public function absence($id)
    {
        $post = User::find($id);
        $b= Verta::now()->startMonth()->subMonths(1)->formatGregorian('Y-m-d H:i:s'); 
        $absence=Absence::where('employee_id',$id)->where('created_at','>', $b)->orderBy('date', 'desc')->paginate(50);
        return view('dashboard.admin.report.absence', ['absence' => $absence]);
    }
    
}