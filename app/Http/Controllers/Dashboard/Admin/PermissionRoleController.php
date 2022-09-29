<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role\Permission;
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
<<<<<<< HEAD
        $permissionroles = PermissionRole::where([ ['status' , '=' , 'active'], ])->get();

        $roles=Role::orderBy('id', 'desc')->get();
        return view('dashboard.admin.permission.index' , compact(['roles' , 'permissionroles'  ]));
=======
        $roles=Role::orderBy('id', 'desc')->get();
        return view('dashboard.admin.permission.index' , compact(['roles'  ]));
>>>>>>> 6d5953f577c34bb52297a8b3af8c763c85331fd0
    }


    public function create(){
        $users=User::withTrashed()->where('type','admin')->orderBy('created_at', 'desc')->get();
        $roles=Role::orderBy('id', 'desc')->get();
<<<<<<< HEAD
        $permissions=Permission::orderBy('id', 'asc')->get();
=======
        $permissions=Permission::orderBy('id', 'desc')->get();
>>>>>>> 6d5953f577c34bb52297a8b3af8c763c85331fd0
        return view('dashboard.admin.permission.create' , compact([    'users' ,  'permissions' ,  'roles'  ]));
      }

    public function edit($id){
        $value=Value::find($id);
        return view('admin.value.edit' , compact(['value'  ]));
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

        foreach($permissions as $permission){
        $permission_role = PermissionRole::create([ 'role_id' => $role->id , 'permission_id' => $permission->id  ]);
        }



        update_permission_role_v1($data['permission'] , $role->id);


       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('dashboard.admin.permission.index');
    }



    public function editpermission($id){
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


        return view('dashboard.admin.permission.edit' , compact(['permissions' ,  'role'  ,
         'permission_roles'  ]));
        }



    public function show($id)
    {
        //
    }



    public function updatepermission(Request $request, $id  ){
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        $permission_role=PermissionRole::where([  ['role_id' , $id],  ])->get();
        $update = Role::where([ ['id',$id] ])->update([ 'name' => $data['name']]);
 
        update_permission_role_v1($data['permission'] , $id);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }

    public function update(Request $request, $id , Value $value){
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);
        $value=Value::find($id);
        $data = $request->all();
        $data['image']= $value->image;
        $data['image']  =  uploadFile($request->file('image'),'images/values',$value->image);
        $value->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        Value::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'values');
        return back();
    }




}
