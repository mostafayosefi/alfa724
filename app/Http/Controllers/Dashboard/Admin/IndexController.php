<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Phase;
use App\Http\Requests;
use App\Models\Absence;
use App\Models\Project;
use App\Models\Service;
use App\Models\MyService;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Illuminate\Session\Store;
use App\Models\SettingAbsence;
use Hekmatinasser\Verta\Verta;
use App\Models\EmployeeProject;
use Illuminate\Auth\Access\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

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
<<<<<<< HEAD
 $mymodel=$mymodel->where([ [ 'finish_date','<', $now_miladi ], ]);
 $task_notwork_count=$mymodel->orderBy('id', 'desc')->count();
 $task_notwork_all=$mymodel->orderBy('id', 'desc')->limit(5)->get();


 $mymodel = model_filter('task', 'all');
 $mymodel=$mymodel->where([ [ 'finish_date','=', $now_miladi ], ]);
 $task_today_all=$mymodel->orderBy('id', 'desc')->limit(5)->get();
=======
 $mymodel=$mymodel->where([ [ 'finish_date','>', $now_miladi ], ]);
 $task_notwork_count=$mymodel->orderBy('id', 'desc')->count();
 $task_notwork_all=$mymodel->orderBy('id', 'desc')->get();
>>>>>>> refs/remotes/origin/master


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

<<<<<<< HEAD
        update_model_v1('setting_absence');
=======
            $absence = Absence::orderby('id','desc')->paginate(8);
>>>>>>> refs/remotes/origin/master

            $absence = Absence::orderby('id','desc')->paginate(8);

            $model_listabsence = User::where([ ['listabsence' , 'active'], ]);
            $count_listabsence = User::where([ ['listabsence' , 'active'], ])->count();
            $listabsence = User::where([ ['listabsence' , 'active'], ])->get();

<<<<<<< HEAD
            $model_listabsence = User::where([ ['listabsence' , 'active'], ]);
            $count_listabsence = User::where([ ['listabsence' , 'active'], ])->count();
            $listabsence = User::where([ ['listabsence' , 'active'], ])->get();

=======
>>>>>>> refs/remotes/origin/master
            $model_absence = Absence::where([ ['id' , '<>' , 0], ]);
            $count_online_absence =  $model_absence->where([ [ 'date' , $now_miladi ], ])->count();
            $list_online_absence =  $model_absence->where([ [ 'date' , $now_miladi ], ])->get();

<<<<<<< HEAD

            $setting_absence = SettingAbsence::find('1');
=======
>>>>>>> refs/remotes/origin/master
            // dd($count_listabsence);


        return view('dashboard.admin.index', compact([  'posts','users' , 'service'  ,'finishing_projects','finishing_phases'
<<<<<<< HEAD
        ,'overdue_projects' ,'absence' ,'task_notwork_all' ,'task_notwork_count' ,'myabsence' ,'diff' ,'listabsence'
        ,'list_online_absence','setting_absence' , 'task_today_all' ]));
=======
        ,'overdue_projects' ,'absence' ,'task_notwork_all' ,'task_notwork_count' ,'myabsence' ,'diff' ,'listabsence'  ,'list_online_absence' ]));
>>>>>>> refs/remotes/origin/master
    }
}
