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
        return view('dashboard.admin.index', [
            'posts' => $posts,
            'users' => $users,
            'service' => $service,
            'finishing_projects' => $finishing_projects,
            'finishing_phases' => $finishing_phases,
            'overdue_projects' => $overdue_projects,
            'absence' => $absence,
        ]);
    }
}
