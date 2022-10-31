<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use App\Models\Phase;
use App\Models\Absence;
use App\Models\EmployeeProject;
<<<<<<< HEAD
use App\Models\SettingAbsence;
=======
>>>>>>> refs/remotes/origin/master
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use Hekmatinasser\Verta\Verta;
use Carbon\Carbon;

class AbsenceController extends Controller
{
    public function GetAbsence()
    {
        $absence=Absence::orderBy('date', 'desc')->paginate(50);
        return view('dashboard.admin.absence.manage' , compact([   'absence'     ]));

    }

    public function setting()
    {
<<<<<<< HEAD
        update_model_v1('setting_absence');


        $setting_absence = SettingAbsence::find('1');
        $users=User::orderBy('id', 'desc')->get();
        return view('dashboard.admin.absence.setting' , compact([   'users' , 'setting_absence'    ]));
=======
        $users=User::orderBy('id', 'desc')->get();
        return view('dashboard.admin.absence.setting' , compact([   'users'     ]));
>>>>>>> refs/remotes/origin/master
    }

    public function update(Request $request)
    {
<<<<<<< HEAD
        $data = $request->all();
        if($data['time_enter'] > $data['time_float']){
        return redirect()->back()
        ->with('info',   'زمان ورود کاربران باید قبل از تاخیر کاربران باشد!') ;
        }
        $mu_user = User::where([ ['listabsence','active'], ])->update([ 'listabsence' => 'inactive' ]);
        $setting_absence = SettingAbsence::find('1');
        $setting_absence->update($data);
=======

        $mu_user = User::where([ ['listabsence','active'], ])->update([ 'listabsence' => 'inactive' ]);

>>>>>>> refs/remotes/origin/master
        foreach($request->users as $user){
            $mu_user = User::where([ ['id',$user], ])->update([ 'listabsence' => 'active' ]);
        }

        return redirect()->back()
<<<<<<< HEAD
        ->with('info',   'لیست حضور و غیاب کارمندان/وتنظیمات ورود کاربران با موفقیت ویرایش شد') ;
=======
        ->with('info',   'لیست حضور و غیاب کارمندان با موفقیت ویرایش شد') ;
>>>>>>> refs/remotes/origin/master
    }



    public function store(Request $request)
    {
       $absence=NULL;
       $absence=Absence::where('employee_id', Auth::user()->id)->where('date',Carbon::now()->format('Y-m-d'))->where('exit', NULL)->orderBy('created_at', 'desc')->FIRST();
       if($absence == NULL){
        $post = new Absence([
            'employee_id' => Auth::user()->id,
            'date' => Carbon::now(),
            'enter'=>Carbon::now()->isoFormat('HH:mm:ss')
        ]);
        $post->save();
        return redirect()->route('dashboard.admin.index')->with('info', 'حضوری شما زده شد ' );
       }
       else{
        return redirect()->route('dashboard.admin.index')->with('info', 'شما حضوری خود را ثبت کرده اید' );
    }
    }



    public function end($id,Request $request)
    {
        $post = Absence::find($id);
        if (!is_null($post)) {
            $post->exit = Carbon::now()->isoFormat('HH:mm:ss');
            $post->hours = strtotime(Carbon::now()->isoFormat('HH:mm:ss')) - strtotime($post->enter);
            $post->save();
        }
        return redirect()->route('dashboard.admin.index')->with('info', 'ساعت خروج شما ثبت شد ' );
    }



}
