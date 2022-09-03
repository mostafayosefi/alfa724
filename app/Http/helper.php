<?php


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Models\Eform\PriceFinical;
use App\Models\Cleander\CleanderDay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Cleander\CleanderYear;
use Illuminate\Support\Facades\Route;
use App\Models\Cleander\CleanderMonth;
use App\Models\Cleander\CleanderToday;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

if(! function_exists('getStatusEmployerPackage') ) {

    function getStatusEmployerPackage($status)
    {
        if($status == 'active')
        {
            echo '<span class="badge badge-primary">فعال</span>';
        }
        elseif($status == 'inactive')
        {
            echo '<span class="badge badge-danger">غیرفعال</span>';
        }
        else
        {
            echo '<span class="badge badge-info">بررسی شده</span>';
        }
    }

}


if(! function_exists('updatecleandertoday') ) {

    function updatecleandertoday()
    {

        $date = now();
        $shamsi = Jalalian::forge($date)->format('Y/m/d');
        $miladi = Jalalian::forge($date)->format('Y-m-d');
        $year = Jalalian::forge($date)->format('Y');
        $month = Jalalian::forge($date)->format('m');
        $day = Jalalian::forge($date)->format('d');

        // $year = now()->format('Y');
        // $month = now()->format('m');
        // $day = now()->format('d');


        $updatecleandertoday = CleanderToday::updateOrCreate([
            'id'   => 1,
        ],[
            'miladi'     => $miladi,
            'shamsi' => $shamsi,
            'year'    => $year,
            'month'   => $month,
            'day'      => $day
        ]);
$date = (new Jalalian(1397, 1, 18, 12, 10, 0))->toCarbon()->toDateTimeString();

    }

}

if(! function_exists('check_cleander_year') ) {
    function check_cleander_year($year)
    {
         CleanderYear::updateOrCreate([
            'year'   => $year ,
        ],[
            'year'     => $year
        ]);

    }

}

if(! function_exists('check_cleander_month') ) {
    function check_cleander_month($year,$month)
    {


        $cleander_year= CleanderYear::where([ ['year' , $year],  ])->first();
        $cleander_month_count = CleanderMonth::where([ ['cleander_year_id' , $cleander_year->id], ])->count();


        if($month=='all'){

            for ($x = 1; $x <= 12; $x++) {

if($x<10){ $x = "0".$x;}

if($cleander_month_count!='12'){

CleanderMonth::updateOrCreate([
    'cleander_year_id'   => $cleander_year->id ,
    'month'   => $x ,
],[
    'cleander_year_id'     => $cleander_year->id,
    'name'     => operator_month($year,$x,'name') ,
    'month'     => operator_month($year,$x,'month') ,
    'weekdayfirst'     => operator_month($year,$x,'weekdayfirst') ,
    'datefirst'     => operator_month($year,$x,'datefirst') ,
    'countdayprev'     => operator_month($year,$x,'countdayprev') ,
    'countdaymonth'     => operator_month($year,$x,'countdaymonth')
]);




              }}

        }elseif($month!='all'){
            $cleander_month_count = CleanderMonth::where([ ['cleander_year_id' , $cleander_year->id],
            ['month' , $month], ])->count();
            if($cleander_month_count=='0'){

           $cleander_month = CleanderMonth::updateOrCreate([
                'cleander_year_id'   => $cleander_year->id ,
                'month'   => $month ,
            ],[
                'cleander_year_id'     => $cleander_year->id,
                'name'     => operator_month($year,$month,'name') ,
                'month'     => operator_month($year,$month,'month') ,
                'weekdayfirst'     => operator_month($year,$month,'weekdayfirst') ,
                'datefirst'     => operator_month($year,$month,'datefirst') ,
                'countdayprev'     => operator_month($year,$month,'countdayprev') ,
                'countdaymonth'     => operator_month($year,$month,'countdaymonth')
            ]);

        }
        $cleander_month = CleanderMonth::where([ ['cleander_year_id' , $cleander_year->id],
        ['month' , $month], ])->first();
                 check_cleander_day($cleander_month);





        }



    }

}





if(! function_exists('check_cleander_day') ) {
    function check_cleander_day($cleander_month)
    {


 $cleander_day_count = CleanderDay::where([ ['cleander_month_id' , $cleander_month->id], ])->count();


        for ($x = 1; $x <= $cleander_month->countdaymonth; $x++) {

            if($x<10){ $x = "0".$x;}

 $datecleander = (new Jalalian($cleander_month->cleander_year->year,$cleander_month->month,$x, 00, 00, 0))->toCarbon()->toDateTimeString();

        $date=date_create($datecleander);
        $date = date_format($date,"Y-m-d");
$holiday=check_holiday($cleander_month->cleander_year->year,$cleander_month->month,$x);;



            if($cleander_day_count!=$cleander_month->countdaymonth){

        $cleander_day = CleanderDay::updateOrCreate([
            'cleander_month_id'   => $cleander_month->id ,
            'day'   => $x ,
        ],[
            'cleander_month_id'   => $cleander_month->id ,
            'day'   => $x ,
            'date'   => $date ,
            'holiday'   => $holiday
        ]);

            }




        }



    }
}


if(! function_exists('operator_month') ) {
    function operator_month($year,$month,$flag)
    {


        $datecleander = (new Jalalian($year,$month, 1, 00, 00, 0))->toCarbon()->toDateTimeString();


        $fmod_kabise = fmod($year,4);

        if($month=='01'){
            $name = 'فروردین';
            if($fmod_kabise==0){$countdayprev = '30'; }else{$countdayprev = '29'; }
            $countdaymonth = '31';
        }

        if($month=='02'){
            $name = 'اردیبهشت';
            $countdayprev = '31';
            $countdaymonth = '31';
        }
        if($month=='03'){
            $name = 'خرداد';
            $countdayprev = '31';
            $countdaymonth = '31';
        }
        if($month=='04'){
            $name = 'تیر';
            $countdayprev = '31';
            $countdaymonth = '31';
        }
        if($month=='05'){
            $name = 'مرداد';
            $countdayprev = '31';
            $countdaymonth = '31';
        }
        if($month=='06'){
            $name = 'شهریور';
            $countdayprev = '31';
            $countdaymonth = '31';
        }
        if($month=='07'){
            $name = 'مهر';
            $countdayprev = '31';
            $countdaymonth = '30';
        }

        if($month=='08'){
            $name = 'آبان';
            $countdayprev = '30';
            $countdaymonth = '30';
        }

        if($month=='09'){
            $name = 'آذر';
            $countdayprev = '30';
            $countdaymonth = '30';
        }
        if($month=='10'){
            $name = 'دی';
            $countdayprev = '30';
            $countdaymonth = '30';
        }
        if($month=='11'){
            $name = 'بهمن';
            $countdayprev = '30';
            $countdaymonth = '30';
        }
        if($month=='12'){
            $name = 'اسفند';
            $countdayprev = '30';
            if($fmod_kabise==3){$countdaymonth = '30'; }else{$countdaymonth = '29'; }

        }

        $date=date_create($datecleander);
        $weekdayfirst = date_format($date,"D");
        $datefirst = date_format($date,"Y-m-d");


        if($flag=='name'){ return $name; }
        if($flag=='month'){ return $month; }
        if($flag=='weekdayfirst'){ return $weekdayfirst; }
        if($flag=='datefirst'){ return $datefirst; }
        if($flag=='countdayprev'){ return $countdayprev; }
        if($flag=='countdaymonth'){ return $countdaymonth; }




    }
}




if(! function_exists('check_holiday') ) {
    function check_holiday($year,$month,$day)
    {


        $datecleander = (new Jalalian($year,$month, $day, 00, 00, 0))->toCarbon()->toDateTimeString();
        $date=date_create($datecleander);
        $dayweek = date_format($date,"D");
        if($dayweek=='Fri'){$holiday="true";}else{{$holiday="false";}}
        return $holiday;

    }
}
