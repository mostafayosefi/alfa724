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
use App\Models\Task;
use App\Models\EmployeeProject;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectController extends Controller
{
    public function GetCreatePost()
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
        return view('dashboard.admin.project.index', ['post' => $post, 'id' => $id ,'phase' => $phase,'users' => $users , 'all_users' => $all_users, 'tasks' =>$tasks, 'salaries' => $salaries ]);
    }

    public function CreatePost(Request $request)
    {
        $post = new Project([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'customer_name' => $request->input('customer_name'),
            'customer_phone' => $request->input('customer_phone'),
            'customer_mobile' => $request->input('customer_mobile'),
            'customer_job' => $request->input('customer_job'),
            'customer_provider' => $request->input('customer_provider'),
            'customer_service' => $request->input('customer_service'),
            'price' => $request->input('price'),
            'counter' => $request->input('counter'),
            'employer' => $request->input('employer'),
            'start_date' => Carbon::fromJalali($request->input('start_date')),
            'finish_date' => Carbon::fromJalali($request->input('finish_date')),
            'status' => $request->input('status'),
        ]);
        if ($post->finish_date->lt($post->start_date))
            return redirect()->back()->withErrors(['finish_date' => 'تاریخ پایان نباید از تاریخ شروع کوچک‌تر باشد.']);
        $post->save();
        return redirect()->route('dashboard.admin.project.index', ['id' => $post->id])->with('info', '  پروژه جدید ذخیره شد و نام آن' .' ' . $request->input('title'));
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

    public function DeletePost($id){
        $post = Project::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.project.manage')->with('info', 'پروژه پاک شد');
    }

    public function GetEditPost($id)
    {
        $post = Project::find($id);
        return view('dashboard.admin.project.updatepost', ['post' => $post, 'id' => $id]);
    }

    public function UpdatePost(Request $request)
    {
        $post = Project::find($request->input('id'));
        if (!is_null($post)) {
            $old_status = $post->status;
            $post->title = $request->input('title');
            $post->description = $request->input('description');
            $post->customer_name = $request->input('customer_name');
            $post->customer_phone = $request->input('customer_phone');
            $post->customer_mobile = $request->input('customer_mobile');
            $post->customer_job = $request->input('customer_job');
            $post->customer_provider = $request->input('customer_provider');
            $post->customer_service = $request->input('customer_service');
            $post->price = $request->input('price');
            $post->counter = $request->input('counter');
            $post->employer = $request->input('employer');
            $post->start_date = Carbon::fromJalali($request->input('start_date'));
            $post->finish_date = Carbon::fromJalali($request->input('finish_date'));
            if ($post->finish_date->lt($post->start_date))
                return redirect()->back()->withErrors(['finish_date' => 'تاریخ پایان نباید از تاریخ شروع کوچک‌تر باشد.']);
            $post->status = $request->input('status');
            
            $post->save();
            if ($post->status == 'done' && $old_status != $post->status)
                $post->applyEmployeesScore();
        }
        return redirect()->route('dashboard.admin.project.manage',$post->id)->with('info', 'پروژه ویرایش شد');
    }

    public function UpdateStatus(Request $request, $id, $status)
    {
        $post = Project::find($id);
        if (!is_null($post)) {
            $old_status = $post->status;
            $post->status = $status;
            $post->save();
            if ($post->status == 'done' && $old_status != $post->status)
                $post->applyEmployeesScore();
        }
        return redirect()->back()->with('info', 'وضعیت پروژه تغییر کرد به "' . __('app.status.' . $status) . '"');
    }

}
