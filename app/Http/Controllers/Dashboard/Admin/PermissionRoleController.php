<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role\Permission;
use App\Models\Role\PermissionAccesse;
use App\Models\Role\PermissionRole;
use App\Models\Role\Role;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionRoleController extends Controller
{


    public function indexadmin(){

        $permissionroles = PermissionRole::all();
        $roles = Role::all();
        $users= User::where([ [ 'type' , 'admin' ], ])->orderBy('id', 'desc')->get();
        return view('dashboard.admin.admins.index' , compact(['users' ,  'roles' ,  'permissionroles'  ]));
    }


    public function createadmin(){
        $roles=Role::orderBy('id', 'desc')->get();
        $permissions=Permission::orderBy('id', 'desc')->get();
        return view('dashboard.admin.admins.create' , compact([    'permissions' ,  'roles'  ]));
      }


    public function index(){
        $permissionroles = PermissionRole::where([ ['status' , '=' , 'active'], ])->get();

        $roles=Role::orderBy('id', 'desc')->get();
        $users=User::where([ ['type' , '=' , 'admin'], ])->orderBy('id', 'desc')->get();
        return view('dashboard.admin.permission.index' , compact(['roles' , 'permissionroles', 'users'  ]));
    }


    public function create(){
        $users=User::withTrashed()->where('type','admin')->orderBy('created_at', 'desc')->get();
        $roles=Role::orderBy('id', 'desc')->get();
        $permissions=Permission::orderBy('id', 'asc')->get();

        $permission_accesses=PermissionAccesse::orderBy('id', 'asc')->get();
        return view('dashboard.admin.permission.create' , compact([    'users' ,  'permissions' ,  'roles',  'permission_accesses'    ]));
      }


    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email,$request->email',
            'password' => 'required| min:4 |confirmed',
            'password_confirmation' => 'required| min:4'
        ]);


        $data = $request->all();
        $data['type']  = 'admin';
        $data['password']  =  Hash::make($request->password) ;

       User::create($data);
       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('dashboard.admin.users.admins.index');
    }


    public function storepermission(Request $request)
    {

         $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();
        $role = Role::create([ 'name' => $data['name']   ]);
        $permissions=Permission::orderBy('id', 'asc')->get();

        $permission_accesses=PermissionAccesse::orderBy('id', 'asc')->get();

        foreach($permission_accesses as $permission){
        $first=PermissionAccesse::find($permission->id);
        $permission_role = PermissionRole::create([ 'role_id' => $role->id , 'permission_id' => $first->permission_id , 'permission_accesse_id' => $permission->id  ]);
        }



        update_permission_role_v1($data['permission'] , $role->id);


       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('dashboard.admin.permission.index');
    }



    public function editpermission($id){
        $role=Role::find($id);
        $permissions=Permission::orderBy('id', 'asc')->get();
        $permission_accesses = PermissionAccesse::orderBy('id', 'asc')->get();

        update_or_insert_permission_role($id);
        $permission_roles = PermissionRole::where([ ['role_id' , $id], ])->get();


        // dd($permission_roles);


        // foreach($permission_roles as $item){
        //     echo $item->permission_id.'<br>';
        // }

        // dd('hi');

        return view('dashboard.admin.permission.edit' , compact(['permissions' ,  'role'  ,
         'permission_roles'   , 'permission_accesses'  ]));
        }



    public function appointment($id)
    {
        $role=Role::find($id);
        $permissions=Permission::orderBy('id', 'asc')->get();

        foreach($permissions as $item){
            $update = PermissionRole::updateOrCreate([
                'role_id' => $role->id  ,
                'permission_id' => $item->id,
            ],[

                'role_id' => $role->id  ,
                'permission_id' => $item->id,
            ]);

        }
        $permission_roles = PermissionRole::where([ ['role_id' , $id], ])->get();
        $users = User::where([ ['id' , '<>' , '0'] ])->orderBy('id', 'desc')->get();
        return view('dashboard.admin.permission.appointment' , compact(['permissions' ,  'role'  ,
        'permission_roles' , 'users'  ]));
    }

    public function appointment_put(Request $request, $id  ){

        $data = $request->all();
        $update = User::where([ ['id',$data['user_id']] ])->update([ 'role_id' => $id ,  'type' => 'admin']);
        return redirect()->route('dashboard.admin.permission.index')->with('info', 'نقش کاربری با موفقیت به مدیر انتخاب شده منتصب شد');



    }


    public function updatepermission(Request $request, $id  ){
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        $permission_role=PermissionRole::where([  ['role_id' , $id],  ])->get();
        $update = Role::where([ ['id',$id] ])->update([ 'name' => $data['name']]);
        update_permission_role_v1($data['permission'] , $id);
        return redirect()->back()->with('info', 'نقش کاربری با موفقیت ویرایش شد');

    }


    public function destroy($id , Request $request){

        $user = User::where([ ['type' , 'admin'],  ['role_id' , $id], ])->update( ['role_id' => null ] );
        $destroy =  Role::destroy($id);
          $permission_roles = PermissionRole::where([ [ 'role_id' , '=' , $id ] ])->delete();
          $count = Role::find($id)->count();
        if($count==0){
            update_model_v1('permissions');
            update_model_v1('roles');
            update_model_v1('permission_roles');
        }

        if($destroy){
            return redirect()->back()->with('info', 'نقش کاربری با موفقیت حذف شد و کاربران منتصب به این نقش بدون نقش هستند ، لطفا نسبت به انتصاب نقش به مدیران خود اقدام نمایید');
        }else{
            return redirect()->back()->with('warning', 'عملیلات حذف به دلیل منتصب بودن چندین نقش به چندین مدیر بامشکل مواجه شد');
        }
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'values');
        return back();
    }




}
