<?php


use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Service;
use App\Models\Customer;
use App\Models\MyService;
use App\Models\MyCustomer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Models\Eform\PriceFinical;
use App\Models\Cleander\CleanderDay;
use App\Models\Price\PriceMyService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Cleander\CleanderYear;
use Illuminate\Support\Facades\Route;
use App\Models\Cleander\CleanderMonth;
use App\Models\Cleander\CleanderToday;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\Models\Cleander\CleanderDayTask;
use App\Models\Cleander\CleanderDayPhase;
use Illuminate\Support\Facades\Validator;
use App\Models\Cleander\CleanderDayProject;
use App\Models\Cleander\CleanderDayMyService;
use App\Models\Score;
use App\Models\Score\ScoreSetting;
use App\Models\Score\ScoreTask;

if(!function_exists('isActive'))
{
    function isActive($key , $activeClassName = 'active')
    {
        if (is_array($key))
        {
            return in_array(Route::currentRouteName() , $key) ? $activeClassName : '';
        }
        return Route::currentRouteName() == $key ? $activeClassName : '';
    }
}

if(!function_exists('isActive_open'))
{
    function isActive_open($key , $activeClassName = 'menu-open')
    {

        // dd($key);
        if (is_array($key))
        {
            return in_array(Route::currentRouteName() , $key) ? $activeClassName : '';
        }
        return Route::currentRouteName() == $key ? $activeClassName : '';
    }
}



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
// $date = (new Jalalian(1397, 1, 18, 12, 10, 0))->toCarbon()->toDateTimeString();

$cleander_today = CleanderToday::find(1);
return $cleander_today;

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

        $cleander_year = CleanderYear::where([ ['year',$year] ])->first();
        return $cleander_year;

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
        if($dayweek=='Fri'){$holiday="true";}else{$holiday="false";}
        return $holiday;

    }
}




if(! function_exists('table_day_cleander') ) {
    function table_day_cleander($j,$p,$n,$month_dayprev,$month_daymonth,$cleander_month,$name_cleander)
    {



    if ($j + $p < 1){
        $myday =$month_dayprev + $n + $p;
        $mymonth=$cleander_month->month - 1;
        $myyear = $cleander_month->cleander_year->year;
        if($cleander_month->month==1){ $mymonth=12; $myyear = $cleander_month->cleander_year->year - 1;  }

    } elseif($j + $p > $month_daymonth){
        $myday =$j + $p - $month_daymonth;
        $mymonth=$cleander_month->month + 1;
        $myyear = $cleander_month->cleander_year->year;
        if($cleander_month->month==12){ $mymonth=1; $myyear = $cleander_month->cleander_year->year + 1;  }

    } else{
        $myday =$j + $p;
        $mymonth=$cleander_month->month ;
        $myyear = $cleander_month->cleander_year->year;
    }

    $cleander_month_id = cleander_year_id($myyear,$mymonth,'month');


    $cleander_day = CleanderDay::where([ ['cleander_month_id' ,$cleander_month_id ],
    ['day' ,$myday ], ])->first();





    if($name_cleander=='year'){
        return $myyear;
    }
    if($name_cleander=='month'){
        return $mymonth;
    }
    if($name_cleander=='day'){
        return $myday;
    }
    if($name_cleander=='dateshamsi'){
        return $myyear.'/'.$mymonth.'/'.$myday;
    }

    if($name_cleander=='day_id'){
        return $cleander_day;
    }

    if($name_cleander=='holiday'){
        // return check_holiday($myyear,$mymonth,$myday);
        return $cleander_day->holiday;
    }





    }
}







if(! function_exists('cleander_year_id') ) {
    function cleander_year_id($year,$month,$cleander)
    {


    check_cleander_year($year);
    $cleander_year = CleanderYear::where([ [ 'year' , $year],  ])->first();

    if($cleander=='year'){
        return $cleander_year->id;
    }
    if($cleander=='month'){
        check_cleander_month($year,$month);
        $cleander_month = CleanderMonth::where([ [ 'cleander_year_id' , $cleander_year->id], [ 'month' , $month],  ])->first();
        return $cleander_month->id;
    }


    }
}




if(! function_exists('route_calender') ) {
    function route_calender($year,$month,$flag,$name)
    {

        $new_year = $year;
        $new_month = $month;



        if($flag=='next'){
            if($month == 12){ $new_year = $year + 1; $new_month = 1; }
            else{ $new_year = $year; $new_month = $month + 1; }
          }

        if($flag=='prev'){
            if($month == 1){ $new_year = $year - 1; $new_month = 12; }
            else{ $new_year = $year; $new_month = $month - 1; }
          }




        // if(($month==12)&&($flag=='next')){ $new_year = $year + 1; $new_month = 1; }
        // elseif(($month==1)&&($flag=='prev')){ $new_year = $year - 1; $new_month = 12; }
        // else { $new_year = $year; $new_month = $month - 1; }

        if($name=='year'){ return $new_year;  }
        if($name=='month'){ return $new_month;  }



    }
}






if(! function_exists('explode_url') ) {
    function explode_url($array)
    {

$route_cleander = Route::currentRouteName();
$collection = Str::of($route_cleander)->explode('.');
return $collection[$array];



    }
}


if(! function_exists('add_days_date') ) {
    function add_days_date($start,$durday ,$holiday)
    {
        if($holiday=='holiday'){
            $date_output = add_date_func('Y-m-d' , $start , $durday , ' days');
            return $date_output;
        }

    }
}



if(! function_exists('check_holiday_v1') ) {
    function check_holiday_v1($start,$end,$flg)
    {
        if($flg=='count'){
            $count = CleanderDay::where([ ['date','>=',$start] ,  ['date','<',$end] , ['holiday','=','true'] , ])->count();
            return $count;
        }
    }
}


if(! function_exists('check_holiday_v2') ) {
    function check_holiday_v2($date)
    {

            $cleander_day = CleanderDay::where([ ['date','=',$date],   ])->first();
            return $cleander_day->holiday;

    }
}




if(! function_exists('computing_day_work') ) {
    function computing_day_work($start,$durday)
    {


        $A=round($durday/7);
        $alldaymax=$A*4;
        $alldaymax=$alldaymax+$durday;
        $n = 0;
        for ($x = 0; $x <= $alldaymax; $x++) {
           $day_out =  add_days_date($start,$x,'holiday');
           $holiday = check_holiday_v2($day_out);
            if($holiday=='false'){
                $n++;
            }
            if($n==$durday){
                $timeenddate = $day_out =  add_days_date($start,$x,'holiday');
            }
            // echo "The ".$holiday."  number ".$n." is: $day_out <br>";
          }

           return $timeenddate;




    }
}







if(! function_exists('insert_task_in_cleander') ) {
    function insert_task_in_cleander($start,$end,$elq,$elq_id,$flgdate)
    {

        if($flgdate=='shamsi'){
            $start = $start->isoFormat('YYYY-MM-DD');
            $end = $end->isoFormat('YYYY-MM-DD');
        }

        $cleander_day = CleanderDay::where([ ['date','>=',$start] ,  ['date','<=',$end] , ])->get();

        if($cleander_day){
            foreach($cleander_day as $item){

                if($elq=='tasks'){
                    $task = CleanderDayTask::create([ 'task_id' => $elq_id , 'cleander_day_id' => $item->id  ]);
                }
                if($elq=='projects'){
                    $task = CleanderDayProject::create([ 'project_id' => $elq_id , 'cleander_day_id' => $item->id  ]);
                }
                if($elq=='phases'){
                    $task = CleanderDayPhase::create([ 'phase_id' => $elq_id , 'cleander_day_id' => $item->id  ]);
                }
                if($elq=='my_services'){


                    $updateorinsert = CleanderDayMyService::updateOrCreate([
                        'my_service_id'   => $elq_id ,
                        'cleander_day_id'   => $item->id ,
                    ],[
                        'my_service_id'   => $elq_id ,
                        'cleander_day_id'   => $item->id ,
                    ]);

                    // $task = CleanderDayMyService::create([ 'my_service_id' => $elq_id , 'cleander_day_id' => $item->id  ]);

                }

            }
        }


    }
}






if(! function_exists('first_cleander_day') ) {
    function first_cleander_day($data)
    {
        $data = $data->isoFormat('YYYY-MM-DD');
        $cleander_day = CleanderDay::where([ ['date','=',$data] ])->first();
        return $cleander_day;

    }
}



if(! function_exists('update_customer_to') ) {
    function update_customer_to()
    {
        $customers = Customer::where([['id' , '<>' , '0']  ])->get();
        if($customers){
            foreach($customers as $customer){
        $my_customer = MyCustomer::updateOrCreate([
            'customer_id'   => $customer->id ,
        ],[
            'name'   => $customer->customer_name ,
            'code'   => $customer->customer_code ,
            'tell'   => $customer->customer_mobile ,
            'tells'   => $customer->customer_phone ,
            'job'   => $customer->customer_job ,
            'referal'   => $customer->customer_provider ,
            'domain'   => $customer->domain ,
            'host'   => $customer->host ,
            'email'   => $customer->email ,
            'text'   => $customer->description ,
            'customer_id'   => $customer->id ,
        ]);
            }
        }
    }
}


if(! function_exists('update_service_to') ) {
    function update_service_to()
    {
        $services = Service::where([['id' , '<>' , '0']  ])->get();
        if($services){
            foreach($services as $service){
               $purdate = convert_shamsi_to_miladi($service->purchase_date,'-');
               $recvdate = convert_shamsi_to_miladi($service->final_date,'-');
        $my_service = MyService::updateOrCreate([
            'service_id'   => $service->id ,
        ],[
            'name'   => $service->name ,
            'count'   => $service->count ,
            'price'   => $service->price ,
            'durday'   => $service->time ,
            'startdate'   => $service->start_date ,
            'enddate'   => $service->end_date ,
            'recvdate'   => $recvdate ,
            'purdate'   => $purdate ,
            'text'   => $service->description ,
            'pricerecvsallary'   => $service->salary ,
            'user_id'   => $service->lead ,
            'customer_id'   => $service->customer_id ,
            'status'   => $service->status ,
            'service_id'   => $service->id ,
        ]);
            }
        }
    }
}





if(! function_exists('update_price_my_service_to') ) {
    function update_price_my_service_to()
    {
        $services = Service::where([['id' , '<>' , '0']  ])->get();
        if($services){
            foreach($services as $service){
                 update_deposit_to($service->id);
            }
        }
    }
}



if(! function_exists('convert_shamsi_to_miladi') ) {
    function convert_shamsi_to_miladi($date,$repl)
    {
$collection = Str::of($date)->explode($repl);

if(empty($date)){

    return null;

}else{


    $milladi = (new Jalalian($collection[0],$collection[1], $collection[2], 00, 00, 0))->toCarbon()->toDateTimeString();
    $pdate=date_create($milladi);
    $miladi = date_format($pdate,"Y-m-d");
    return $miladi;
}




    }
}



if(! function_exists('update_deposit_to') ) {
    function update_deposit_to($id)
    {
        $service = Service::where([['id' , '=' , $id]  ])->first();
        $my_service = MyService::where([['service_id' , '=' , $id]  ])->first();

        if($service){
            if($service->deposit != null ){
                     $updateorinsert = PriceMyService::updateOrCreate([
                        'my_service_id'   => $my_service->id ,
                        'price'   => $service->deposit ,
                        'date'   => $service->deposit_date ,
                    ],[
                        'price'   => $service->deposit ,
                        'date'   => $service->deposit_date ,
                        'type'   => 'depo' ,
                        'miladi'   => convert_shamsi_to_miladi($service->deposit_date,'/') ,
                        'my_service_id'   => $my_service->id ,
                    ]);

            }

            if($service->deposit2 != null ){
                $updateorinsert = PriceMyService::updateOrCreate([
                    'my_service_id'   => $my_service->id ,
                    'price'   => $service->deposit2 ,
                    'date'   => $service->deposit_date2 ,
                ],[
                    'price'   => $service->deposit2 ,
                    'date'   => $service->deposit_date2 ,
                    'type'   => 'depo' ,
                    'miladi'   => convert_shamsi_to_miladi($service->deposit_date2,'/') ,
                    'my_service_id'   => $my_service->id ,
                ]);
            }


            if($service->deposit3 != null ){
                $updateorinsert = PriceMyService::updateOrCreate([
                    'my_service_id'   => $my_service->id ,
                    'price'   => $service->deposit3 ,
                    'date'   => $service->deposit_date3 ,
                ],[
                    'price'   => $service->deposit3 ,
                    'date'   => $service->deposit_date3 ,
                    'type'   => 'depo' ,
                    'miladi'   => convert_shamsi_to_miladi($service->deposit_date3,'/') ,
                    'my_service_id'   => $my_service->id ,
                ]);
            }

            if($service->deposit4 != null ){
                $updateorinsert = PriceMyService::updateOrCreate([
                    'my_service_id'   => $my_service->id ,
                    'price'   => $service->deposit4 ,
                    'date'   => $service->deposit_date4 ,
                ],[
                    'price'   => $service->deposit4 ,
                    'date'   => $service->deposit_date4 ,
                    'type'   => 'depo' ,
                    'miladi'   => convert_shamsi_to_miladi($service->deposit_date4,'/') ,
                    'my_service_id'   => $my_service->id ,
                ]);
            }

            if($service->deposit5 != null ){
                $updateorinsert = PriceMyService::updateOrCreate([
                    'my_service_id'   => $my_service->id ,
                    'price'   => $service->deposit5 ,
                    'date'   => $service->deposit_date5 ,
                ],[
                    'price'   => $service->deposit5 ,
                    'date'   => $service->deposit_date5 ,
                    'type'   => 'depo' ,
                    'miladi'   => convert_shamsi_to_miladi($service->deposit_date5,'/') ,
                    'my_service_id'   => $my_service->id ,
                ]);
            }


            if($service->deposit6 != null ){
                $updateorinsert = PriceMyService::updateOrCreate([
                    'my_service_id'   => $my_service->id ,
                    'price'   => $service->deposit6 ,
                    'date'   => $service->deposit_date6 ,
                ],[
                    'price'   => $service->deposit6 ,
                    'date'   => $service->deposit_date6 ,
                    'type'   => 'depo' ,
                    'miladi'   => convert_shamsi_to_miladi($service->deposit_date6,'/') ,
                    'my_service_id'   => $my_service->id ,
                ]);
            }


            if($service->deposit7 != null ){
                $updateorinsert = PriceMyService::updateOrCreate([
                    'my_service_id'   => $my_service->id ,
                    'price'   => $service->deposit7 ,
                    'date'   => $service->deposit_date7 ,
                ],[
                    'price'   => $service->deposit7 ,
                    'date'   => $service->deposit_date7 ,
                    'type'   => 'depo' ,
                    'miladi'   => convert_shamsi_to_miladi($service->deposit_date7,'/') ,
                    'my_service_id'   => $my_service->id ,
                ]);
            }




        }
    }
}




if(! function_exists('price_finical') ) {
    function price_finical($user,$type,$startdate,$enddate)
    {


        $user = User::find($user);

        if(($startdate=='null')&&($enddate=='null')){
            $startdate = '2000-01-01';
            $enddate = '3000-01-01';
        }

        if($user->type=='admin'){
           $price_my_service =  PriceMyService::where([ ['miladi','>=',$startdate] ,  ['miladi','<=',$enddate] , ])->get();
           $my_service = MyService::where([ ['startdate','>=',$startdate] ,   ])->get();
        }

        if($type=='income'){
            $fir = 0 ;
            foreach($my_service as $item){
                $fir = $item->price + $fir;
            }
        }

        if($type=='depo'){
            $fir = 0 ;
            foreach($price_my_service as $item){
                if(($item->status=='active')&&($item->type=='depo')){
                    $fir = $item->price + $fir;
                }
            }
        }


        // dd($fir);
        return $fir;



    }
}




if(! function_exists('calender_route_origin') ) {
    function calender_route_origin($year,$month,$flag)
    {

        $cleander_today =  updatecleandertoday();
        if($year==null){ $year = $cleander_today->year;  }
        if($month==null){ $month =  $cleander_today->month;  }
          $cleander_year = check_cleander_year($year);
          check_cleander_month($year,$month);
         $cleander_month = CleanderMonth::where([ ['month','=',$month],
         ['cleander_year_id','=',$cleander_year->id]  ])->first();

         if($flag == 'cleander_month'){ return $cleander_month;}
         if($flag == 'cleander_today'){ return $cleander_today;}



    }

}




if(! function_exists('law_name') ) {
    function law_name($type)
    {

        if($type=='depo'){$name='بیعانه'; }
        if($type=='service'){$name='خدمات پروژه'; }

        return $name;

    }
}




if(! function_exists('date_frmat_mnth') ) {
    function date_frmat_mnth($date)
    {
        $date = Jalalian::forge($date)->format('%A, %d %B %Y');
        return $date;

    }

}
//get date_frmat
if(! function_exists('date_frmat') ) {
    function date_frmat($date)
    {
        $date = Jalalian::forge($date)->format('Y/m/d ساعت H:i a');
        return $date;
        // return Verta($date)->format('Y/m/d ساعت H:i a');

    }

}

if(! function_exists('date_frmat_a') ) {
    function date_frmat_a($date)
    {
        $date = Jalalian::forge($date)->format('Y/m/d');
        return $date;
    }

}


 if(! function_exists('date_frmat_ymd') ) {
    function date_frmat_ymd($date)
    {
        $date = Jalalian::forge($date)->format('Y/m/d');
        return $date;

    }

}



 if(! function_exists('update_model_v1') ) {
    function update_model_v1($model)
    {

        if($model == 'tasks'){
            $tasks = Task::where([ ['employee_id' , '<>' , NULL  ], ])->get();
            foreach($tasks as $item){
                $item->update([ 'user_id' => $item->employee_id ]);
            }
        }

        if($model == 'customers'){
            $customers = Customer::where([ ['id' , '<>' , '0'  ], ])->get();
            foreach($customers as $item){
                $item->update([ 'name' => $item->customer_name  ,
                 'code' => $item->customer_code ,  'tells' => $item->customer_phone ,
                 'tell' => $item->customer_mobile , 'referal' => $item->customer_provider
                 , 'job' => $item->customer_job    ]);
            }
        }


        if($model == 'score_settings'){

            $updateorinsert = ScoreSetting::updateOrCreate([
                'link'   => 'tasks' ,
            ],[
                'link'   => 'tasks' ,  'name'   => 'تاخیر در انجام مسئولیت' ,
            ]);

            $updateorinsert = ScoreSetting::updateOrCreate([
                'link'   => 'projects' ,
            ],[
                'link'   => 'projects' ,  'name'   => 'تاخیر در انجام پروژه' ,
            ]);

            $updateorinsert = ScoreSetting::updateOrCreate([
                'link'   => 'phases' ,
            ],[
                'link'   => 'phases' ,  'name'   => ' تاخیر در انجام فاز پروژه' ,
            ]);

            $updateorinsert = ScoreSetting::updateOrCreate([
                'link'   => 'absences' ,
            ],[
                'link'   => 'absences' ,  'name'   => ' تاخیر در حضور غیاب  ' ,
            ]);

        }



    }

}


if(! function_exists('str_rep_price') ) {
    function str_rep_price($price)
    {

     return  str_replace( ",","" , $price);


    }
}


if(! function_exists('valid_init') ) {
    function valid_init($number,$flg)
    {
        $number1 = filter_var( $number , FILTER_VALIDATE_INT );
        if($flg=='daywork'){
            if($number1){
                $mystring = $number1.' روزکاری ';
            }else{
                $mystring = $number;
            }
        }


        return $mystring;


    }
}





if(! function_exists('config_optimize') ) {
    function config_optimize()
    {
        Artisan::call('route:cache');
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        exec('composer dump-autoload');


    }
}


if(! function_exists('check_date_startfinish') ) {
    function check_date_startfinish($start,$end)
    {

        if ($end < $start){
            return 'false';
        }

    }
}





if(! function_exists('uploadFile') ) {

    function uploadFile($file,$path,$defaultfile)
    {
 if($file){
        $current_timestamp = Carbon::now()->timestamp;
        $imagePath = "/upload/$path/";
        $filename = $current_timestamp . $file->getClientOriginalName();
        $file = $file->move(public_path($imagePath) , $filename);
        return $imagePath.$filename;

 }else{
     return $defaultfile;
 }
    }

}





if(! function_exists('score_system') ) {
    function score_system($link , $id)
    {
        $score_setting = ScoreSetting::where([ ['link',$link] ])->first();

        if($link=='tasks'){
            $task = Task::where([ ['id', $id],['status', '=','notwork'], ])->first();



            $mydate =now()->format('Y-m-d H:i:s');
            // $date_output = add_date_func('Y-m-d H:i:s' , $mydate , '+1' , ' days');
            if($task){
                $pdate = date_by_time(   $task->finish_date , $task->finish_time  );
                $betwen_hours = betwen_day_date($pdate,$mydate,'hours');
                $betwen_day = betwen_day_date($pdate,$mydate,'days');
                if($betwen_hours>0){
                    for ($x = 0; $x <= $betwen_day; $x++) {
                        if($x==0){ $pre = 'first'; $my_time="یک ساعته";  }elseif($x!=0){$pre = $x; $my_time= $x."روزه ";  }


            if($task->project){
                $description = "به دلیل تاخیر ( ".$my_time." ) در مسئولیت ( ".$task->title." ) در پروژه ( ".$task->project->title." ) ";
            }else{
                $description = "به دلیل تاخیر ( ".$my_time." ) در مسئولیت ( ".$task->title." )  ";
            }


                $score = Score::updateOrCreate([
                    'pre'   => $pre ,
                    'model'   => $link ,
                    'model_id'   => $id,
                    'user_id'   => $task->employee_id,
                ],[
                    'pre'   => $pre ,
                    'model'   => $link ,
                    'model_id'   => $id,
                    'user_id'   => $task->employee_id,
                    'value'   =>  $score_setting->value  ,
                    'description'   =>  $description  ,
                ]);

                $updateorinsert = ScoreTask::updateOrCreate([
                    'task_id'   => $id ,
                    'score_id'   => $score->id ,
                ],[
                    'task_id'   => $id ,
                    'score_id'   => $score->id ,
                ]);

            }
        }

            }

        }



    }
}






if(! function_exists('add_date_func') ) {
    function add_date_func($format , $date_input , $value , $type)
    {
        $date_outpout = date($format, strtotime($date_input. '  '.$value.' '.$type));
        return $date_outpout;

    }
}



if(! function_exists('scope_score') ) {
    function scope_score(   $link , $user_id )
    {

        $user = User::find($user_id);
        if($user){
            foreach($user->tasks as $item){
                score_system($link,$item->id);
            }
        }



    }
}


if(! function_exists('date_by_time') ) {
    function date_by_time(   $date , $time  )
    {

        $ndate =  $date->format('Y-m-d');
        $ntime =  $time->format('H:i:s');
        $pdate = $ndate." ".$ntime;
        return $pdate;


    }
}



if(! function_exists('delete_model') ) {
    function delete_model(   $model  )
    {


        if($model=='tasks'){
            $deleted = Task::where([ ['id','<>','0'], ])->delete();
        }


        if($model=='scores'){
            $deleted = Score::where([ ['id','<>','0'], ])->delete();
        }




    }
}


if(! function_exists('betwen_day_date') ) {
    function betwen_day_date(   $start , $end , $flg )
    {

        $now = strtotime($end);
        $your_date = strtotime($start);
        $datediff = $now - $your_date;

        if($flg=='days'){
            $time =  round($datediff / (60 * 60 * 24));
        }
        if($flg=='secconds'){
            $time =  round($datediff );
        }
        if($flg=='minuts'){
            $time =  round($datediff /60);
        }
        if($flg=='hours'){
            $time =  round($datediff /(60*60));
        }

        return $time;

    }
}


