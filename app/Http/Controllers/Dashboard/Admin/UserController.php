<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Phase;
use App\Models\Score;
use App\Http\Requests;
use App\Models\Absence;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Hekmatinasser\Verta\Verta;
use App\Models\EmployeeProject;
use Illuminate\Auth\Access\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

class UserController extends Controller
{
    public function GetUsers()
    {
        $users=User::withTrashed()->where('type','employee')->orderBy('id', 'desc')->get();
        return view('dashboard.admin.users.employee', ['users' => $users]);
    }

    public function edit($id) {
        $post = User::find($id);
        $task=Task::where('user_id',$id)->orderBy('created_at', 'desc')->paginate(50);
        $employee=EmployeeProject::where('employee_id',$id)->orderBy('created_at', 'desc')->get();
        $phase=Phase::whereHas('for', function($q) {
            $q->whereHas('employees', function($q) {
                $q->where('users.id', Auth::id());
            });
        })->get();
        $users = EmployeeProject::where('employee_id', Auth::id())->get();


        // $score = Score::where( [ ['id','<>','0'] ]);
        // $score->delete();


        scope_score(   'tasks' , $id );
        return view('dashboard.admin.users.profile', ['id' => $id,'post' => $post,'phase' => $phase,'users' => $users,'employee' => $employee,'task' => $task]);
    }

    public function DeletePost($id)
    {
        $post = User::withTrashed()->find($id);
        if (!$post->trashed()) {
            $post->delete();
        }
        else {
            $post->forceDelete();
        }

        return redirect()->route('dashboard.admin.users.employee', ['id' => $id])->with('info', 'کاربر پاک شد');
    }

    public function GetEditPost($id)
    {
        $post = User::find($id);
        return view('dashboard.admin.users.edit', ['post' => $post, 'id' => $id]);
    }

    public function UpdatePost($id,Request $request)
    {
        $post = User::find($request->input('id'));
        if (!is_null($post)) {
            $post->first_name = $request->input('first_name');
            $post->last_name = $request->input('last_name');
            $post->mobile = $request->input('mobile');
            $post->situation = $request->input('situation');
            $post->email = $request->input('email');
            $post->birthdate = $request->input('birthdate');
            if (!empty($password = $request->input('password')))
                $post->password = Hash::make($password);
            $post->save();
        }
        return redirect()->route('dashboard.admin.users.employee',$post->id)->with('info', 'کاربر ویرایش شد');
    }

    public function restore($id) {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->back()->with('info', 'کاربر بازگردانی شد!');
    }

}
