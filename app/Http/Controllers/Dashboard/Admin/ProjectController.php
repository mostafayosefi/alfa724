<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Phase;
use App\Http\Requests;
use App\Models\Salary;
use App\Models\Project;
use App\Models\Customer;
use App\Rules\ValidateRule;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Models\EmployeeProject;
use Illuminate\Auth\Access\Gate;
use App\Http\Controllers\Controller;
use App\Models\Price\PriceMyProject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectController extends Controller
{
    public function create($customer_id=null)
    {


        $users = User::orderBy('created_at', 'desc')->get();
        if($customer_id==null){
            $customer = Customer::orderby('id','desc')->get();
        }else{
            $customer = Customer::find($customer_id);
        }

        return view('dashboard.admin.project.create' , compact([    'customer' , 'customer_id'    ]));


    }

    public function GetProject($id)
    {
<<<<<<< HEAD
        $project = show_detial_model('project',$id);
        $phase = show_detial_model('phase',$id);
        $users = show_detial_model('users',$id);
        $all_users = show_detial_model('all_users',$id);
        $tasks = show_detial_model('tasks',$id);
        $salaries = show_detial_model('salaries',$id);
        return view('dashboard.admin.project.index' , compact([ 'id', 'phase' ,'users'   , 'all_users'   , 'tasks'  , 'salaries' , 'project'   ]));
     }
=======
        $project = Project::find($id);
        $post = Project::find($id);
        $phase= Phase::where('project_id',$id)->orderBy('created_at', 'desc')->get();
        $users = EmployeeProject::where('project_id',$id)->orderBy('created_at', 'desc')->get();
        $all_users = User::orderBy('created_at', 'desc')->get();
        $tasks= Task::where('project_id',$id)->orderBy('created_at', 'desc')->paginate(25);
        $salaries = Salary::all();

 

        // dd($users);

        return view('dashboard.admin.project.index' , compact(['post' , 'id', 'phase' ,'users'   , 'all_users'   , 'tasks'  , 'salaries' , 'project'   ]));
>>>>>>> 258f96c65876930f11c495605fa7ae745478f096


    public function step($id,$level)
    {
        $project = show_detial_model('project',$id);
        $phase = show_detial_model('phase',$id);
        $users = show_detial_model('users',$id);
        $all_users = show_detial_model('all_users',$id);
        $tasks = show_detial_model('tasks',$id);
        $salaries = show_detial_model('salaries',$id);
        return view('dashboard.admin.project.step' , compact([ 'id', 'phase' ,'users'
         , 'all_users'   , 'tasks'  , 'salaries' , 'project'  , 'level'   ]));
     }

    public function store(Request $request)
    {

        $request->validate([
            'price' => ['required',new ValidateRule('validate_rep_price')] ,
        ]);


        $data = $request->all();

        $data['price'] = str_rep_price($data['price']);
        $data['start_date'] = convert_shamsi_to_miladi($data['start_date'],'/');
        $data['finish_date'] = convert_shamsi_to_miladi($data['finish_date'],'/');
        $datestartfinish=check_date_startfinish($data['start_date']  , $data['finish_date'] );
        if($datestartfinish=='false'){
            return redirect()->back()->withErrors(['finish_date' => 'تاریخ پایان نباید از تاریخ شروع کوچک‌تر باشد.']);
        }
        $project = Project::create($data);
        return redirect()->route('dashboard.admin.project.step', ['id' => $project->id , 'phase'])->with('info', '  پروژه جدید با نام '.$project->title.' ثبت شد   ' .' ');
    }

    public function GetManagePost(Request $request , $status = null)
    {

        $mymodel = model_filter('project',$status);
        $project=$mymodel->orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.project.manage', ['project' => $project]);
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
        $customers = Customer::orderby('id','desc')->get();
        return view('dashboard.admin.project.edit' , compact(['project' , 'customers'  ]));

    }

    public function update($id , Request $request)
    {
        $request->validate([
            'time' => 'required|numeric',
            'price' => ['required',new ValidateRule('validate_rep_price')] ,
        ]);

        $data = $request->all();

        // dd($data);

        $data['start_date'] = convert_shamsi_to_miladi($data['start_date'],'/');
        $data['finish_date'] = convert_shamsi_to_miladi($data['finish_date'],'/');
        $data['giving_date'] = convert_shamsi_to_miladi($data['giving_date'],'/');
        $data['zero_date'] = convert_shamsi_to_miladi($data['zero_date'],'/');
        $data['price'] = str_rep_price($data['price']);
        $project=Project::find($id);
        $project->update($data);
        return redirect()->back()->with('info', 'پروژه ویرایش شد');
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




        $projects = Project::where([
            ['id', '<>' , '0'],
            ['customer_name', '<>' , 'سیداحمدپور'],
            ['customer_name', '<>' , 'خانم واعظ'],
            ['customer_name', '<>' , 'وب یار'],
            ['customer_name', '<>' , 'مجموعه وب یار'],
            ['customer_name', '<>' , ''],
        ])->orderby('customer_name','asc')->get();


        $customers = Customer::where([
            ['id', '<>' , '0'],
        ])->orderby('name','asc')->get();


        // $projects = Project::where([
            // ['id', '<>' , '0'],
            // ['customer_name', 'like' , '%سیداحمدپور%'],
            // ['customer_name', 'like' , '%خانم واعظ%'],
            // ['customer_name', 'like' , '%وب یار%'],
            // ])->orderby('customer_name','asc')->get();

            echo 'Project';  echo '<br>';
            foreach($projects as $project){
        echo $project->customer_name.'__ customer_mobile: '.$project->customer_mobile.'__id: '.$project->id.'__ phone: '.$project->customer_phone;
        echo '<br>';
            }

            echo 'Customer';  echo '<br>';
            foreach($customers as $item){
        echo $item->name.'__ id: '.$item->id;
        echo '<br>';
            }

        // dd($projects);

        // $user = User::create([
        //     'name' => 'test',
        //     'first_name' => 'test',
        //     'last_name' => 'test',
        //     'email' => 'mustafa1390@gmail.com',
        //     'password' => Hash::make('98879887') ,
        // ]);


        echo 'hi';

    }



    public function price( Request $request)
    {





        $request->validate([
            'date' => 'required',
            'price' => ['required',new ValidateRule('validate_rep_price')] ,
            'description' => 'required|max:5000',
        ]);


        $data = $request->all();


        $data['miladi'] = convert_shamsi_to_miladi($data['date'],'/');
        $data['price'] = str_rep_price($data['price']);

        if(($data['price'] > $data['kolli'])&&($data['type']=='cost')){
            return redirect()->back()
            ->with('info',  'هزینه پرداختی بیشتر از سود پروژه می باشد لطفا مبلغی مناسب پروژه هزینه نمایید!') ;
        }
        if(($data['price'] > ($data['kolli']-$data['sumdepo']))&&($data['type']=='depo')){
            return redirect()->back()
            ->with('info',  'بیعانه دریافتی بیشتر از مبلغ کل پروژه می باشد لطفا مبلغی مناسب پروژه ثبت بیعانه نمایید!') ;
        }

        $data['file']  =  uploadFile($request->file('file'),'images/price_my_project','');


        // $data['image']= $page->image;
        // $data['image']  =  uploadFile($request->file('image'),'images/pages',$page->image);


       $pricemyservice = PriceMyProject::create($data);



       return redirect()->back()
       ->with('info',  'تراکنش ثبت '.law_name($data['type']).' باموفقیت انجام شد') ;

    }


    public function destroy_price($id , Request $request){

        $price_my_project = PriceMyProject::find($id);
        PriceMyProject::destroy($id);
        return redirect()->back()
        ->with('info',  'تراکنش  '.law_name($price_my_project->type).' باموفقیت حذف شد') ;

    }




}
