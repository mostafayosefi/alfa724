<?php

namespace App\Http\View\Composser;

use App\Models\message;
use Illuminate\Contracts\View\View;

class Menuindex{
    public function compose(View $view){



        $message_model = message::where([ ['user_id',auth()->user()->id],
        ['status','=',null], ])->orderby('id','desc');
        $messages = $message_model->get();
        $message_count = $message_model->count();


$view->with(['messages' => $messages , 'message_count' => $message_count  ]);


    }
}
