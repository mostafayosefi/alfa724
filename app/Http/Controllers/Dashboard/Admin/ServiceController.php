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
use App\Models\MyService;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceController extends Controller
{

    public function GetCreatePost($id)
    {   $post = Customer::find($id);
        $users = User::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.service.create', ['post' => $post,'users' => $users]);
    }

    public function CreatePost($id,Request $request)
    {
        $post = Customer::find($request->input('customer_id'));
        if($request->input('specifications')){
        foreach ($request->input('specifications') as $specification) {
            $project = new Service([
                'name' => $specification['name'] ,
                'price' => $specification['price'] ,
                'count' => $specification['count'] ,
                'time' => $specification['time'] ,
                'lead' => $specification['lead']  ,
                'salary' => $specification['salary'] ,
                'final_date' =>  $specification['final_date'] ,
                'customer_id' => $request->input('customer_id') ,
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
        return redirect()->route('dashboard.admin.customer.show',$request->input('customer_id'))->with('info', '  سرویس جدید ذخیره شد و نام آن' .' ' . $request->input('name'));
    }

    public function GetService($id)
    {
        $post = Service::find($id);
        return view('dashboard.admin.service.show', ['post' => $post, 'id' => $id ]);
    }

    public function GetManagePost(Request $request)
    {
        $posts = Service::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.service.manage', ['posts' => $posts]);
    }

    public function DeletePost($id){
        $post = Service::find($id);
        $customer=$post->customer_id;
        $post->delete();
        return redirect()->route('dashboard.admin.customer.show',$customer)->with('info', 'خدمت پاک شد');
    }

    public function GetEditPost($id)
    {
        $post = Service::find($id);
        $my_service = MyService::find($id);
        $users = User::orderBy('created_at', 'desc')->get();

        return view('dashboard.admin.service.update' , compact([   'post' , 'id'  , 'users'  , 'my_service'     ]));
 

    }

    public function UpdatePost(Request $request)
    {
        $post = Service::find($request->input('id'));
        if (!is_null($post)) {
            $post->name = $request->input('name');
            $post->price = $request->input('price');
            $post->count = $request->input('count');
            $post->time = $request->input('time');
            $post->lead = $request->input('lead');
            $post->salary = $request->input('salary');
            $post->final_date = $request->input('final_date');
            $post->customer_id = $request->input('customer_id');
            $post->purchase_date = $request->input('purchase_date');
            $post->start_date = $request->input('start_date');
            $post->end_date = $request->input('end_date');
            $post->description = $request->input('description');

            $post->deposit = $request->input('deposit');
            $post->deposit_date = $request->input('deposit_date');
            $post->deposit2 = $request->input('deposit2');
            $post->deposit_date2 = $request->input('deposit_date2');
            $post->deposit3 = $request->input('deposit3');
            $post->deposit_date3 = $request->input('deposit_date3');
            $post->deposit4 = $request->input('deposit4');
            $post->deposit_date4 = $request->input('deposit_date4');
            $post->deposit5 = $request->input('deposit5');
            $post->deposit_date5 = $request->input('deposit_date5');
            $post->deposit6 = $request->input('deposit6');
            $post->deposit_date6 = $request->input('deposit_date6');
            $post->deposit7 = $request->input('deposit7');
            $post->deposit_date7 = $request->input('deposit_date7');
            $post->deposit8 = $request->input('deposit8');
            $post->deposit_date8 = $request->input('deposit_date8');
            $post->deposit9 = $request->input('deposit9');
            $post->deposit_date9 = $request->input('deposit_date9');

            $post->save();

        }
        return redirect()->route('dashboard.admin.customer.show',$request->input('customer_id'))->with('info', 'خدمت ویرایش شد');
    }


}
