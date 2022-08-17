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
use App\Models\Customer;
use App\Models\Service;
use App\Models\EmployeeProject;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerController extends Controller
{
    public function GetCreatePost()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.customer.create', ['users' => $users]);
    }

    public function GetCustomer($id)
    {
        $post = Customer::find($id);
        $service= Service::where('customer_id',$id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.customer.show', ['post' => $post, 'id' => $id ,'service' => $service ]);
    }

    public function CreatePost(Request $request)
    {
        $post = new Customer([
            'description' => $request->input('description'),
            'customer_code' => $request->input('customer_code'),
            'customer_name' => $request->input('customer_name'),
            'customer_phone' => $request->input('customer_phone'),
            'customer_mobile' => $request->input('customer_mobile'),
            'customer_job' => $request->input('customer_job'),
            'customer_provider' => $request->input('customer_provider'),
            'domain' => $request->input('domain'),
            'host' => $request->input('host'),
            'email' => $request->input('email'),
        ]);
        $post->save();
        $post=Customer::orderBy('created_at', 'desc')->FIRST();
        if($request->input('specifications')){
        foreach ($request->input('specifications') as $specification) {
            $project = new Service([
                'name' => $specification['name'] ,
                'price' => $specification['price'] ,
                'count' => $specification['count'] ,
                'time' => $specification['time'] ,
                'lead' => $specification['lead']  ,
                'salary' => $specification['salary'] ,
                'final_date' => $specification['final_date'] ,
                'customer_id' => $post->id , 
                'purchase_date' => $specification['purchase_date'] , 
                'start_date' => Carbon::fromJalali($specification['start_date']),
                'end_date' => Carbon::fromJalali($specification['end_date']),
                'status' => 'new',
                'description' => $request->input('description'),
                'deposit' => $specification['deposit'] ,
                'deposit_date' => $specification['deposit_date'],
                'deposit2' => $specification['deposit2'],
                'deposit_date2' => $specification['deposit_date2'],
                'deposit3' => $specification['deposit3'] ,
                'deposit_date3' => $specification['deposit_date3'],
                'deposit4' => $specification['deposit4'] ,
                'deposit_date4' => $specification['deposit_date4'],
                'deposit5' => $specification['deposit5'] ,
                'deposit_date5' => $specification['deposit_date5'],
                'deposit6' => $specification['deposit6'] ,
                'deposit_date6' => $specification['deposit_date6'],
                'deposit7' => $specification['deposit7'] ,
                'deposit_date7' => $specification['deposit_date7'],
                'deposit8' => $specification['deposit8'],
                'deposit_date8' => $specification['deposit_date8'],
                'deposit9' => $specification['deposit9'] ,
                'deposit_date9' => $specification['deposit_date9'],

            ]);
                if ($project->end_date->lt($project->start_date))
            return redirect()->back()->withErrors(['end_date' => 'تاریخ پایان نباید از تاریخ شروع کوچک‌تر باشد.']);
       
             $project->save();
             
          }
        }
        return redirect()->route('dashboard.admin.customer.manage')->with('info', '  مشتری جدید ذخیره شد و نام آن' .' ' . $request->input('customer_name'));
    }
    public function GetManagePost(Request $request)
    {
        $posts = Customer::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.customer.manage', ['posts' => $posts]);
    }

    public function DeletePost($id){
        $post = Customer::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.customer.manage')->with('info', 'مشتری پاک شد');
    }

    public function GetEditPost($id)
    {
        $post = Customer::find($id);
        return view('dashboard.admin.customer.update', ['post' => $post, 'id' => $id]);
    }

    public function UpdatePost(Request $request)
    {
        $post = Customer::find($request->input('id'));
        if (!is_null($post)) {
            $old_status = $post->status;
            $post->description = $request->input('description');
            $post->customer_code = $request->input('customer_code');
            $post->customer_name = $request->input('customer_name');
            $post->customer_phone = $request->input('customer_phone');
            $post->customer_mobile = $request->input('customer_mobile');
            $post->customer_job = $request->input('customer_job');
            $post->customer_provider = $request->input('customer_provider');
            $post->domain = $request->input('domain');
            $post->host = $request->input('host');
            $post->email = $request->input('email');
            $post->save();

        }
        return redirect()->route('dashboard.admin.customer.manage',$post->id)->with('info', 'مشتری ویرایش شد');
    }


}
