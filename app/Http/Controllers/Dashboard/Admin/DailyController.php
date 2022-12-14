<?php

namespace App\Http\Controllers\Dashboard\Admin;


use Carbon\Carbon;
use App\Models\Note;
use App\Models\Task;
use App\Models\User;
use App\Models\Phase;
use App\Models\Score;
use App\Http\Requests;
use App\Models\Absence;
use App\Models\message;
use App\Models\Project;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Illuminate\Session\Store;
use App\Models\EmployeeProject;
use Illuminate\Auth\Access\Gate;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use phpDocumentor\Reflection\Types\Null_;
use App\Http\Requests\Dashboard\Employee\TaskCreateRequest;
use App\Http\Requests\Dashboard\Employee\TaskUpdateRequest;
use App\Http\Requests\Dashboard\Employee\TaskStatusUpdateRequest;

class DailyController extends Controller
{
    public function GetCreatePost()
    {
        return view('dashboard.admin.daily.create');
    }

    // public function store(TaskCreateRequest $request)
    public function store(TaskRequest $request)
    {


        // $request->validate([
        //     'name' => 'required',
        //     'username' => ['required',new Uniqemail('users','username',$id)] ,
        //     'email' => ['required' , 'email',new Uniqemail('users','email',$id)] ,
        //     'tell' => ['required', 'regex:/^09[0-9]{9}$/' ,new Uniqemail('users','tell',$id)] ,
        // ]);



        $data = $request->validated();
        $data['employee_id'] = $request->user_id;
        $data['project_id'] = $request->project_id;
        $cleander_day = first_cleander_day($data['finish_date']);
        if($cleander_day==null){
            return redirect()->back()->withErrors(['finish_date' => 'دقت نمایید بازه زمانی انتخاب شده در سیستم تعریف نشده است!       ' ]);
        }
        $task = Task::create($data);
        insert_task_in_cleander($data['start_date'],$data['finish_date'],'tasks',$task->id,'shamsi');
        return redirect()->back()->with('info', 'مسئولیت جدید اضافه شد ' );
    }

    public function GetManagePost(Request $request)
    {
        $message=message::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $absence=Absence::orderBy('created_at', 'desc')
        ->where('employee_id',Auth::user()->id)
        ->where('date',Carbon::now()->format('Y-m-d'))->FIRST();
        $diff=NULL;
        if($absence != NULL){
        if($absence->exit != NULL){
            $diff = strtotime($absence->exit) - strtotime($absence->enter);
            if($diff < 60){
                $diff= $diff.' ثانیه ';
            }
            elseif($diff < 3600){
                $diff=  round($diff / 60,0,1).' دقیقه ';
            }
            elseif($diff >= 3660 && $diff < 86400){
                $diff=  round($diff / 3600,0,1).' ساعت ';
            }
            elseif($diff > 86400){
                $diff=  round($diff / 86400,0,1).' روز ';
            }
        }
        }

        // $query=Task::where([ ['id' , '<>' ,'0'], ['employee_id',Auth::user()->id], ['status','!=','done'],  ]);
        // dd($query);

        $task=Task::managePage()->where('status','!=','done')->where('employee_id',Auth::user()->id)->orderBy('finish_date', 'asc')->limit(90)->get();
        $note=Note::where('user_id',Auth::user()->id)->orderBy('created_at', 'asc')->limit(30)->get();
        $write=Task::managePage()->where('status','!=','done')->where('employee_id',Auth::user()->id)->where('project_id',null)->orderBy('finish_date', 'asc')->paginate(6);


        $users = User::where([ ['id','<>','0'], ])->orderby('id','desc')->get();

        return view('dashboard.admin.daily.manage', [
        'task' => $task,
        'write' => $write,
        'note' => $note,
        'absence' => $absence,
        'diff' => $diff,
        'users' => $users,
        ]);
    }

<<<<<<< HEAD
    public function index($status='all')
=======
    public function index($status=null)
>>>>>>> refs/remotes/origin/master
    {
        $users = User::where([ ['id','<>','0'], ])->orderby('id','desc')->get();
        $mymodel = model_filter('task',$status);
        $task=$mymodel->where([  ['employee_id',Auth::user()->id ], ])->orderBy('id', 'desc')->paginate(10);
<<<<<<< HEAD

        $guard = 'admin';
        $user_id = Auth::user()->id;

        return view('dashboard.admin.daily.index',
         compact([ 'task'  , 'guard'  , 'users', 'status' , 'user_id'])   );
    }

    public function alluser($status='all',$user_id='all')
=======
        return view('dashboard.admin.daily.index', ['task' => $task , 'guard' => 'user' , 'users' => $users    ]);
    }

    public function alluser($status=null)
>>>>>>> refs/remotes/origin/master
    {


        $users = User::where([ ['id','<>','0'], ])->orderby('id','desc')->get();
<<<<<<< HEAD
        $mymodel = model_filter('task',$status);
        $mymodel = model_filter_user($mymodel,'employee_id',$user_id);
        $task=$mymodel->orderBy('id', 'desc')->paginate(10);
        $guard = 'admin';

        return view('dashboard.admin.daily.index',
         compact([ 'task'  , 'guard'  , 'users', 'status' , 'user_id'])   );
=======

        $mymodel = model_filter('task',$status);
        $task=$mymodel->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.admin.daily.index', ['task' => $task , 'guard' => 'admin' , 'users' => $users  ]);
>>>>>>> refs/remotes/origin/master
    }

    public function GetTask($id,Request $request)
    {
        $task=Task::find($id);
        return view('dashboard.admin.daily.show', ['task' => $task]);
    }

    public function UpdatePost( TaskStatusUpdateRequest $request)
    {
        $post = Task::find($request->input('id'));
        if (!is_null($post)) {
            $old_status = $post->status;

            if($post->created_at<='2022-01-26 14:20:44'){
                $post->status == 'done';
                $post->save();
                return redirect()->back()->with('info', 'مسئولیت انجام شد');
            }

            $post->update($request->validated());
            // if ($post->status == 'done' && $old_status != $post->status)
            //     $post->applyEmployeeScore(Auth::user());
        }
        return redirect()->back()->with('info', 'مسئولیت انجام شد');
    }


    public function EditPost( TaskRequest $request)
    {
        $data = $request->validated();

        if($request->employee_id){
            $data['employee_id'] = $request->employee_id;
        }else{
            $data['employee_id'] = Auth::user()->id;
        }

        // dd($request->task_id);

        $post = Task::find($request->task_id);
        if (!is_null($post)) {
            $old_status = $post->status;
            $post->update($data);
            // if ($post->status == 'done' && $old_status != $post->status)
            //     $post->applyEmployeeScore(Auth::user());
        }
        return redirect()->back()->with('info', 'مسئولیت ویرایش شد');
    }


    //ABSENCCE CONTROLLER
    public function Absence(Request $request)
    {
        $post = new Absence([
            'employee_id' => Auth::user()->id,
            'date' => Carbon::now(),
            'enter'=>Carbon::now()->isoFormat('HH:mm:ss')
        ]);
        $post->save();
        return redirect()->back()->with('info', 'حضوری شما زده شد ' );
    }

    public function AbsenceEnd($id,Request $request)
    {
        $post = Absence::find($id);
        if (!is_null($post)) {
            $post->exit = Carbon::now()->isoFormat('HH:mm:ss');
            $post->hours = strtotime(Carbon::now()->isoFormat('HH:mm:ss')) - strtotime($post->enter);
            $post->save();
        }
        return redirect()->back()->with('info', 'ساعت خروج شما ثبت شد ' );
    }



    public function CreateNote(Request $request)
    {
        $this->validate($request, [
            'content' => ['required', 'string', 'max:20000'] ,
        ]);
        $post = new Note([
            'content' => $request->input('content'),
            'user_id' =>  Auth::user()->id,
        ]);
        $post->save();
        return redirect()->back()->with('info', 'یادداشت جدید اضافه شد ' );
    }

    public function DeleteNote($id){
        $post = Note::find($id);
        $post->delete();
        return redirect()->back()->with('info', 'یادداشت پاک شد ' );
    }

    public function GetEditNote($id)
    {
        $post = Note::find($id);
        return view('dashboard.admin.daily.updatenote', ['post' => $post, 'id' => $id]);
    }

    public function UpdateNote(Request $request)
    {

        // dd($request);
        $this->validate($request, [
            'content' => ['required', 'string', 'max:20000'] ,
        ]);
        $post = Note::find($request->input('id'));
        if (!is_null($post)) {
            $old_status = $post->status;
            $post->content = $request->input('content');
            $post->save();

        }
        return redirect()->back()->with('info', 'یادداشت ویرایش شد');
    }



    public function destroy($id , Request $request){
        Task::destroy($request->id);
        return redirect()->back()->with('info', 'مسئولیت باموفقیت حذف شد ' );

    }

    public function destroy_get($id){
        Task::destroy($id);
        return redirect()->back()->with('info', 'مسئولیت باموفقیت حذف شد ' );

    }


    public function deleteall(  Request $request){

$data['delete'] = $request->delete;

if($data['delete']){
    foreach($data['delete'] as $key => $location){
        Task::destroy($location);
      }

      return redirect()->back()->with('info', 'مسئولیت های انتخابی باموفقیت حذف شدند ' );

}else{

    return redirect()->back()->with('info', 'متاسفانه آیتمی انتخاب نشده است!' );
}

    }




    public function duplicate( $id ){

        $task = Task::find($id);
        $data['project_id']  =  $task->project_id;
        $data['phase_id']  =  $task->phase_id;
        $data['title']  =  $task->title;
        $data['description']  =  $task->description;
        $data['status']  =  $task->status;
        $data['start_date']  =  $task->start_date;
        $data['finish_date']  =  $task->finish_date;
        $data['continuity']  =  $task->continuity;
        $data['start_time']  =  $task->start_time;
        $data['finish_time']  =  $task->finish_time;
        $data['done_at']  =  $task->done_at;
        $data['price']  =  $task->price;
        $data['employee_id']  =  $task->employee_id;


        Task::create($data);

      return redirect()->back()->with('info', 'مسئولیت انتخابی باموفقیت کپی شد ' );

    }


}
