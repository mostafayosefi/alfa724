<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Absence;
use Illuminate\Session\Store;
use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use App\Models\Phase;
use App\Models\EmployeeProject;
use App\Models\MyService;
use App\Models\Service;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use Hekmatinasser\Verta\Verta;
use Carbon\Carbon;
use Morilog\Jalali\Jalalian;

class IndexController extends Controller
{
    public function dashboard() {
        $posts = Project::orderBy('created_at', 'desc')->get();
        $users=User::where('type','employee')->orderBy('created_at', 'desc')->get();
        $service= Service::orderBy('created_at', 'desc')->get();
        $from_date_finishing = now();
        $to_date_finishing = now()->addDays(3);
        $finishing_projects = Project
            ::where('finish_date', '>=', $from_date_finishing)
            ->where('finish_date', '<=', $to_date_finishing)
            ->where('status', '!=', 'done')
            ->where('status', '!=', 'paid')
            ->get();
        $finishing_phases = Phase
            ::where('finish_date', '>=', $from_date_finishing)
            ->where('finish_date', '<=', $to_date_finishing)
            ->get();
        $overdue_projects = Project
            ::where('finish_date', '<=', now())
            ->where('status', '!=', 'done')
            ->where('status', '!=', 'paid')
            ->get();





 $test =  price_finical(Auth::user()->id,'model', 'all' ,'null','null');
foreach($test as $model) {
if($model instanceof Project){
    // echo $model->id.'<br>';
}elseif($model instanceof MyService){
    // echo 'my_service'.$model->id.'<br>';
}
 }



 $now_miladi=date_today('now_miladi');
 $mymodel = model_filter('task', 'notwork');
 $mymodel=$mymodel->where([ [ 'finish_date','>', $now_miladi ], ]);
 $task_notwork_count=$mymodel->orderBy('id', 'desc')->count();
 $task_notwork_all=$mymodel->orderBy('id', 'desc')->get();


 $myabsence=Absence::orderBy('created_at', 'desc')
 ->where([ ['employee_id',Auth::user()->id], ['date',date_today('now_miladi')] ])->first();
  $diff=NULL;
 if($myabsence != NULL){
 if($myabsence->exit != NULL){
     $diff = strtotime($myabsence->exit) - strtotime($myabsence->enter);
     if($diff < 60){
         $diff= $diff.' ثانیه ';
     }
     elseif($diff < 3600){
         $diff=  round($diff / 60,0,1).' دقیقه ';
     }
     elseif($diff >= 3660 && $diff < 86400){
         $diff=  round($diff / 3600,0,1).' ساعت ';
     }
     elseif($diff > 86400){
         $diff=  round($diff / 86400,0,1).' روز ';
     }
 }
 }



//  dd($task_notwork_count);

            // update_customer_to();
            // delete_model('tasks');
            // update_model_v1('customers');

            // delete_model('scores');


            update_model_v1('admin_demo1');
            update_model_v1('admin_demo2');


            update_model_v1('permissions');
            update_model_v1('roles');
            update_model_v1('permission_roles');



            update_service_to();
            update_price_my_service_to();
            update_model_v1('tasks');
            update_model_v1('score_settings');

            $absence = Absence::orderby('id','desc')->paginate(8);


            $model_listabsence = User::where([ ['listabsence' , 'active'], ]);
            $count_listabsence = User::where([ ['listabsence' , 'active'], ])->count();
            $listabsence = User::where([ ['listabsence' , 'active'], ])->get();

            $model_absence = Absence::where([ ['id' , '<>' , 0], ]);
            $count_online_absence =  $model_absence->where([ [ 'date' , $now_miladi ], ])->count();

            // dd($count_online_absence);


        return view('dashboard.admin.index', [
            'posts' => $posts,
            'users' => $users,
            'service' => $service,
            'finishing_projects' => $finishing_projects,
            'finishing_phases' => $finishing_phases,
            'overdue_projects' => $overdue_projects,
            'absence' => $absence,
            'task_notwork_all' => $task_notwork_all,
            'task_notwork_count' => $task_notwork_count,
            'myabsence' => $myabsence,
            'diff' => $diff,
        ]);
    }
}
