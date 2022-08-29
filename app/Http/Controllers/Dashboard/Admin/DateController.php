<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Carbon\Carbon;
use App\Models\date;
use App\Http\Requests;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Illuminate\Session\Store;
use Hekmatinasser\Verta\Verta;
use Illuminate\Auth\Access\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Cleander\CleanderToday;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

class DateController extends Controller
{
    public function GetDate()
    {


         updatecleandertoday();

          $year = '1400';
          $month = '01';
          $day = '1';
          check_cleander_year($year);
          echo  check_cleander_month($year,$month);
        //   check_holiday($year,$month,$day);



    //  echo    operator_month($year,$month,'countdaymonth');




        $date=date::orderBy('created_at', 'asc')->get();
        // return view('dashboard.admin.date.manage', ['posts' => $date]);
        // return view('dashboard.admin.date.democleander', ['posts' => $date]);
    }

    public function GetCreatePost(Request $request)
    {
        return view('dashboard.admin.date.create');
    }

    public function CreatePost(Request $request)
    {
         //-------------
         $idx = 1;
         foreach ($request->input('specifications') as $specification) {
            $post = new date([
                'date' => Carbon::fromJalali($specification['date']),
            ]);
             $post->save();
             $idx++;
          }
        return redirect()->route('dashboard.admin.date.manage')->with('info', 'تاریخ جدید ایجاد شد ' );
    }

    public function DeletePost($id){
        $post = date::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.date.manage')->with('info', 'تاریخ پاک شد');
    }

    public function GetEditPost($id)
    {
        $users = User::orderBy('created_at', 'desc')->get();
        $post = message::find($id);
        return view('dashboard.admin.date.update', ['post' => $post, 'id' => $id , 'users' => $users]);
    }

}
