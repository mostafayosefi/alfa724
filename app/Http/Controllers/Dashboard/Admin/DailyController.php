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
        $data['employee_id'] = Auth::user()->id;
        $cleander_day = first_cleander_day($data['finish_date']);
        if($cleander_day==null){
            return redirect()->back()->withErrors(['finish_date' => 'دقت نمایید بازه زمانی انتخاب شده در سیستم تعریف نشده است!       ' ]);
        }
        $task = Task::create($data);
        insert_task_in_cleander($data['start_date'],$data['finish_date'],'tasks',$task->id,'shamsi');
        return redirect()->route('dashboard.admin.daily.manage')->with('info', 'مسئولیت جدید اضافه شد ' );
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

        return view('dashboard.admin.daily.manage', [
        'task' => $task,
        'write' => $write,
        'note' => $note,
        'absence' => $absence,
        'diff' => $diff,
        ]);
    }

    public function index()
    {
        $task=Task::where('employee_id',Auth::user()->id)->orderBy('finish_date', 'desc')->paginate(10);
        return view('dashboard.admin.daily.index', ['task' => $task , 'guard' => 'user'  ]);
    }

    public function alluser()
    {
        $task=Task::where('id','<>' , '0')->orderBy('finish_date', 'desc')->paginate(10);
        return view('dashboard.admin.daily.index', ['task' => $task , 'guard' => 'admin'  ]);
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
                return redirect()->route('dashboard.admin.daily.manage')->with('info', 'مسئولیت انجام شد');
            }

            $post->update($request->validated());
            // if ($post->status == 'done' && $old_status != $post->status)
            //     $post->applyEmployeeScore(Auth::user());
        }
        return redirect()->route('dashboard.admin.daily.manage')->with('info', 'مسئولیت انجام شد');
    }


    public function EditPost( TaskRequest $request)
    {
        $data = $request->validated();
        $data['employee_id'] = Auth::user()->id;

        // dd($request->task_id);

        $post = Task::find($request->task_id);
        if (!is_null($post)) {
            $old_status = $post->status;
            $post->update($data);
            // if ($post->status == 'done' && $old_status != $post->status)
            //     $post->applyEmployeeScore(Auth::user());
        }
        return redirect()->route('dashboard.admin.daily.manage')->with('info', 'مسئولیت ویرایش شد');
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
        return redirect()->route('dashboard.admin.daily.manage')->with('info', 'حضوری شما زده شد ' );
    }

    public function AbsenceEnd($id,Request $request)
    {
        $post = Absence::find($id);
        if (!is_null($post)) {
            $post->exit = Carbon::now()->isoFormat('HH:mm:ss');
            $post->hours = strtotime(Carbon::now()->isoFormat('HH:mm:ss')) - strtotime($post->enter);
            $post->save();
        }
        return redirect()->route('dashboard.admin.daily.manage')->with('info', 'ساعت خروج شما ثبت شد ' );
    }



    public function CreateNote(Request $request)
    {
        $this->validate($request, [
            'content' => ['required', 'string', 'max:5000'] ,
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
            'content' => ['required', 'string', 'max:5000'] ,
        ]);
        $post = Note::find($request->input('id'));
        if (!is_null($post)) {
            $old_status = $post->status;
            $post->content = $request->input('content');
            $post->save();

        }
        return redirect()->route('dashboard.admin.daily.manage')->with('info', 'یادداشت ویرایش شد');
    }



    public function destroy($id , Request $request){
        Task::destroy($request->id);
        return redirect()->back()->with('info', 'مسئولیت باموفقیت حذف شد ' );

    }



}
