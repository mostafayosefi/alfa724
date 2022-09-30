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

class CustomerController extends Controller
{
    public function GetCreatePost()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.customer.create', ['users' => $users]);
    }

    public function GetCustomer($id)
    {
        $customer = Customer::find($id);
        $service= Service::where('customer_id',$id)->orderBy('created_at', 'desc')->get();
        $my_services= MyService::where('customer_id',$id)->orderBy('created_at', 'desc')->get();

        return view('dashboard.admin.customer.show' , compact([   'customer' , 'id'  , 'service'  , 'my_services'     ]));
    }

    public function CreatePost(Request $request)
    {

        $code = code_customer();

        $post = new Customer([
            'description' => $request->input('description'),
            'code' => $code,
            'name' => $request->input('name'),
            'tells' => $request->input('tells'),
            'tell' => $request->input('tell'),
            'job' => $request->input('job'),
            'referal' => $request->input('referal'),
            'domain' => $request->input('domain'),
            'host' => $request->input('host'),
            'email' => $request->input('email'),
        ]);
        $post->save();
        $post=Customer::orderBy('id', 'desc')->first();

        return redirect()->route('dashboard.admin.customer.show' , $post->id)->with('info', '  مشتری جدید ذخیره شد و نام آن' .' ' . $request->input('name'));
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
        $service= Service::where('customer_id',$id)->orderBy('created_at', 'desc')->get();
        $users = User::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.customer.edit', ['post' => $post, 'id' => $id,'service' => $service,'users' => $users]);
    }

    public function UpdatePost($id , Request $request)
    {
        $post = Customer::find($id);
        if (!is_null($post)) {
            $old_status = $post->status;
            $post->description = $request->input('description');
            // $post->code = $request->input('code');
            $post->name = $request->input('name');
            $post->tells = $request->input('tells');
            $post->tell = $request->input('tell');
            $post->job = $request->input('job');
            $post->referal = $request->input('referal');
            $post->domain = $request->input('domain');
            $post->host = $request->input('host');
            $post->email = $request->input('email');
            $post->save();

        }
        return redirect()->route('dashboard.admin.customer.updatecustomer',$id)->with('info', 'مشتری ویرایش شد');

    }

    public function UpdateService(Request $request)
    {
        $post = Service::find($request->input('id'));
        $customer=$request->input('id');
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
        return redirect()->route('dashboard.admin.customer.updatecustomer',$customer)->with('info', 'خدمت ویرایش شد');
    }


}
