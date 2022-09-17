<?php

namespace App\Http\Controllers\Notification;

use App\Models\Setting;
use App\Models\Notification\SettingSms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SettingSmsController extends Controller
{


    public function index()
    {
        $setting=Setting::find(1);
        $setting_sms=$setting->setting_sms()->get();
        return view('admin.notification.setting.index' , compact(['setting_sms'  ]));

    }



    public function edit($id)
    {
        $setting_sms=SettingSms::find($id);
        return view('admin.notification.setting.edit' , compact(['setting_sms'  ]));
    }

    public function update(Request $request, $id )
    {

        SettingSms::where('id', $id)
->update(['token' => $request->token   ]);
Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
return redirect()->back();

    }
    public function status(Request $request, $status , $id )
  {
    SettingSms::where('id', '<>' , '11')
    ->update(['status' => 'inactive'   ]);
    SettingSms::where('id', $id)
->update(['status' => 'active'    ]);
    Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
    return redirect()->back();

  }


}
