<?php

namespace App\Http\Controllers\Dashboard\Employee;
use App\Models\Task;
use App\Models\User;
use App\Models\Phase;
use App\Http\Requests;
use App\Models\Absence;
use App\Models\message;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Models\EmployeeProject;
use Illuminate\Auth\Access\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

class IndexController extends Controller
{
    public function profile() {
        $message=message::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $employee=EmployeeProject::where('employee_id',Auth::user()->id)->with('project')->orderBy('created_at', 'desc')->get();
        $task=Task::where('employee_id',Auth::user()->id)->orderBy('finish_date', 'ASC')->get();
        $absence= Absence::where([ ['employee_id',Auth::user()->id] ])->orderby('id','desc')->paginate(10);
        return view('dashboard.employee.index', ['employee' => $employee , 'task' => $task , 'message' => $message , 'absence' => $absence]);
    }
        public function get() {
        return redirect()->route('dashboard.employee.task.manage');
    }
}
