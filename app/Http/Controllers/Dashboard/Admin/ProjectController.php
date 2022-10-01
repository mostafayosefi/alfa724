<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Phase;
use App\Http\Requests;
use App\Models\Salary;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Models\EmployeeProject;
use Illuminate\Auth\Access\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectController extends Controller
{
    public function create()
    {
        return view('dashboard.admin.project.create');
    }

    public function GetProject($id)
    {
        $post = Project::find($id);
        $phase= Phase::where('project_id',$id)->orderBy('created_at', 'desc')->get();
        $users = EmployeeProject::where('project_id',$id)->orderBy('created_at', 'desc')->get();
        $all_users = User::orderBy('created_at', 'desc')->get();
        $tasks= Task::where('project_id',$id)->orderBy('created_at', 'desc')->paginate(25);
        $salaries = Salary::all();

        // dd($users);

        return view('dashboard.admin.project.index', ['post' => $post, 'id' => $id ,'phase' => $phase,'users' => $users , 'all_users' => $all_users, 'tasks' =>$tasks, 'salaries' => $salaries ]);
    }

    public function store(Request $request)
    {



        $data = $request->all();
        $data['start_date'] = convert_shamsi_to_miladi($data['start_date'],'/');
        $data['finish_date'] = convert_shamsi_to_miladi($data['finish_date'],'/');
        $datestartfinish=check_date_startfinish($data['start_date']  , $data['finish_date'] );
        if($datestartfinish=='false'){
            return redirect()->back()->withErrors(['finish_date' => 'تاریخ پایان نباید از تاریخ شروع کوچک‌تر باشد.']);
        }
        $project = Project::create($data);
        return redirect()->route('dashboard.admin.project.index', ['id' => $project->id])->with('info', '  پروژه جدید با نام '.$project->title.' ذخیره شد و نام آن' .' ');
    }

    public function GetManagePost(Request $request)
    {
        $posts = Project::where('status','!=','paid')->where('status','!=','done')->orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.project.manage', ['posts' => $posts]);
    }

    public function GetDonePost(Request $request)
    {

        $posts = Project::withTrashed()->where('status','done')->orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.project.done', ['posts' => $posts]);
    }

    public function GetPaidPost(Request $request)
    {
        $posts = Project::withTrashed()->where('status','paid')->orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.project.paid', ['posts' => $posts]);
    }

    public function destroy($id){
        $post = Project::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.project.manage')->with('info', 'پروژه پاک شد');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('dashboard.admin.project.edit', ['project' => $project ]);
    }

    public function update($id , Request $request)
    {

        $data = $request->all();
        $data['start_date'] = convert_shamsi_to_miladi($data['start_date'],'/');
        $data['finish_date'] = convert_shamsi_to_miladi($data['finish_date'],'/');
        $data['price'] = str_rep_price($data['price']);
        $data['employer_money'] = str_rep_price($data['employer_money']);
        $project=Project::find($id);
        $project->update($data);
        return redirect()->route('dashboard.admin.project.manage')->with('info', 'پروژه ویرایش شد');
    }

    public function UpdateStatus(Request $request, $id, $status)
    {
        $post = Project::find($id);
        if (!is_null($post)) {
            $old_status = $post->status;
            $post->status = $status;
            $post->save();
            //     if ($post->status == 'done' && $old_status != $post->status)
            //     $post->applyEmployeesScore();
        }
        return redirect()->back()->with('info', 'وضعیت پروژه تغییر کرد به "' . __('app.status.' . $status) . '"');
    }


    public function testi(){






        // $user = User::create([
        //     'name' => 'test',
        //     'first_name' => 'test',
        //     'last_name' => 'test',
        //     'email' => 'mustafa1390@gmail.com',
        //     'password' => Hash::make('98879887') ,
        // ]);


        echo 'hi';

    }



}
