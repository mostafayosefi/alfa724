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

    public function show($id, $tab_active = null  ){
        $counttask=Task::where('employee_id',$id)->orderBy('id', 'desc')->count();
        $task=Task::where('employee_id',$id)->orderBy('id', 'desc')->paginate(10);

        $employee=EmployeeProject::where('employee_id',$id)->orderBy('created_at', 'desc')->get();
        $phase=Phase::whereHas('for', function($q) {
            $q->whereHas('employees', function($q) {
                $q->where('users.id', Auth::id());
            });
        })->get();
        $users = EmployeeProject::where('employee_id', Auth::id())->get();

        $activition = 'view';
         scope_score(   'tasks' , $id, $activition  );
         $user = User::find($id);

         return view('dashboard.admin.users.profile', compact([  'id' ,  'user' , 'phase' , 'users' , 'employee' , 'task' , 'counttask' , 'tab_active' ]));


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
        $user = User::find($id);
        secret_user($request , $user , 'update'  , 'users' );

        return redirect()->route('dashboard.admin.users.show', [$id , 'profile'  ])->with('info', ' اطلاعات پروفایل با موفقیت ویرایش شد');


  }

    public function secret($id,Request $request)
    {
        $user = User::find($id);
        secret_user($request , $user , 'secret'  , 'users' );

        return redirect()->route('dashboard.admin.users.show', [$id , 'secret'  ])->with('info', ' رمزعبور کاربر با موفقیت ویرایش شد');


  }

    public function restore($id) {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->back()->with('info', 'کاربر بازگردانی شد!');
    }

}
