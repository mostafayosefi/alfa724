<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Score\ScoreSetting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FetchController extends Controller
{


    public function score_setting(   $value , $m){

        $score_setting= ScoreSetting::find($value);
        return view('dashboard.card.fetch.score_setting' , compact(['value'  , 'score_setting' , 'm'    ]));

    }

    public function close_select(   $value)  {

    }



}
