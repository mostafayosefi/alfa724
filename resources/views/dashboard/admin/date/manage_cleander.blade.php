@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت تاریخ ها" route="dashboard.admin.date.manage" />
@endsection
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif

@php $id = 1; @endphp

    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>مدیریت تاریخ ها</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>تاریخ</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $item)
                                <tr>
                                    <td>{!! $item->date->formatJalali() !!}</td>
                                    <td>
                                    <a href="{{route('dashboard.admin.date.deletedate',['id'=>$item->id])}}" class="delete_post" ><i class="fa fa-fw fa-eraser"></i></a>
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>تاریخ</th>
                                    <th>حذف</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                    <a href="{{route('dashboard.admin.date.create')}}" class="btn btn-success">ثبت تاریخ جدید</a>
                </x-card-footer>
        </x-card>
    </div>



    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    خرید و رزرو ماک حضوری
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}/user/panel">پنل</a></li>
                        <li class="breadcrumb-item active" aria-current="page">خرید و رزرو ماک حضوری</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8"">


                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">خرید و رزرو ماک حضوری</h4>



                            <link rel="stylesheet" href="{{ env('APP_URL') }}/build/melody/custom/custom.css">
                            <link rel="stylesheet" href="{{ env('APP_URL') }}/build/melody/custom/fonts-fa.css">

                            <div class="panel panel-transparent">

                                <div class="panel-body">

                                    <ul class="list-unstyled multi-steps">
                                        <li
                                            @if ($id > '1') class="is-actived"  @else  class="is-active" @endif>
                                            انتخاب زمان آزمون</li>
                                        <li
                                            @if ($id > '2') class="is-actived"  @else  class="is-active" @endif>
                                            انتخاب ماک</li>
                                        <li
                                            @if ($id > '3') class="is-actived"  @else  class="is-active" @endif>
                                            مشاهده فاکتور</li>
                                        <li
                                            @if ($id > '4') class="is-actived"  @else  class="is-active" @endif>
                                            پرداخت هزینه نهایی</li>
                                    </ul>


                                </div>
                            </div>


                            @if ($id == '1')
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">انتخاب زمان آزمون</h4>
                                            <p class="card-text">
                                                برای انتخاب زمان رزرو روی تاریخ و زمانهای باز کلیک نمایید و نسبت به رزرو
                                                زمان آزمون اقدام نمایید
                                            </p>
                                            <div class="calendar--area">
                                                <div class="row justify-content-end align-items-center">
                                                    <div
                                                        class="col-lg-12 mt-3 text-right d-flex justify-content-space-between">
                                                        <div class="btn-group" role="group" aria-label="مثال">


                                                            @if ($cleander_month->cleander_year->year == '1399' && $cleander_month->month== '12')
                                                                <a href="{{ env('APP_URL') }}/user/date/1400/1"
                                                                    class="fullcalendar-btn-prev btn btn-sm btn-primary"
                                                                    title="ماه بعد">
                                                                    <i class="fa fa-angle-right"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ env('APP_URL') }}/user/date/{{ $cleander_month->cleander_year->year }}/{{ $cleander_month->month+ 1 }}"
                                                                    class="fullcalendar-btn-prev btn btn-sm btn-primary"
                                                                    title="ماه بعد">
                                                                    <i class="fa fa-angle-right"></i>
                                                                </a>
                                                            @endif

                                                            <a href="#"
                                                                class="fullcalendar-btn-next btn btn-sm btn-primary active"
                                                                data-calendar-view="month">{{ $cleander_month->name }}
                                                                {{ $cleander_month->cleander_year->year }}</a>



                                                            @if ($cleander_month->cleander_year->year == '1400' && $cleander_month->month== '1')
                                                                <a href="{{ env('APP_URL') }}/user/date/1399/12"
                                                                    class="fullcalendar-btn-next btn btn-sm btn-primary"
                                                                    title="ماه قبل">
                                                                    <i class="fa fa-angle-left"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ env('APP_URL') }}/user/date/{{ $cleander_month->cleander_year->year }}/{{ $cleander_month->month- 1 }}"
                                                                    class="fullcalendar-btn-next btn btn-sm btn-primary"
                                                                    title="ماه قبل">
                                                                    <i class="fa fa-angle-left"></i>
                                                                </a>
                                                            @endif




                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="مثال">


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="co-12">
                                                        <!-- Fullcalendar -->
                                                        <div class="calendar-area px-3">
                                                            <div class="calendar fc fc-unthemed fc-ltr"
                                                                data-toggle="calendar" id="calendar">
                                                                <div class="fc-toolbar fc-header-toolbar">
                                                                    <div class="fc-left"></div>
                                                                    <div class="fc-right"></div>
                                                                    <div class="fc-center"></div>
                                                                    <div class="fc-clear"></div>
                                                                </div>
                                                                <div class="fc-view-container" style="">
                                                                    <div class="fc-view fc-month-view fc-basic-view"
                                                                        style="">




                                                                        <table class="">
                                                                            <thead class="fc-head">
                                                                                <tr>
                                                                                    <td
                                                                                        class="fc-head-container fc-widget-header">
                                                                                        <div
                                                                                            class="fc-row fc-widget-header">

                                                                                            <table class="">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th
                                                                                                            class="fc-day-header fc-widget-header ">
                                                                                                            <span>جمعه</span>
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="fc-day-header fc-widget-header ">
                                                                                                            <span>پنجشنبه</span>
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="fc-day-header fc-widget-header ">
                                                                                                            <span>چهارشنبه</span>
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="fc-day-header fc-widget-header ">
                                                                                                            <span>سه
                                                                                                                شنبه</span>
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="fc-day-header fc-widget-header ">
                                                                                                            <span>دوشنبه</span>
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="fc-day-header fc-widget-header ">
                                                                                                            <span>یکشنبه</span>
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="fc-day-header fc-widget-header ">
                                                                                                            <span>شنبه</span>
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                            </table>

                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </thead>



                                                                            <tbody class="fc-body">

                                                                                <tr>
                                                                                    <td class="fc-widget-content">
                                                                                        <div class="fc-scroller fc-day-grid-container"
                                                                                            style="overflow: hidden; height: 663px;">
                                                                                            <div
                                                                                                class="fc-day-grid fc-unselectable">



                                                                                                <?php $m = 0; ?>

                                                                                                @for ($i = 0; $i <= 5; $i++)
                                                                                                    <?php

                                                                                                    $weekfirst = $cleander_month->weekdayfirst;
                                                                                                    $month_dayprev = $cleander_month->countdayprev;
                                                                                                    $month_daymonth = $cleander_month->countdaymonth;

                                                                                                    if ($weekfirst == 'Sat') {
                                                                                                        $n = 0;
                                                                                                    } elseif ($weekfirst == 'Sun') {
                                                                                                        $n = -1;
                                                                                                    } elseif ($weekfirst == 'Mon') {
                                                                                                        $n = -2;
                                                                                                    } elseif ($weekfirst == 'Tue') {
                                                                                                        $n = -3;
                                                                                                    } elseif ($weekfirst == 'Wed') {
                                                                                                        $n = -4;
                                                                                                    } elseif ($weekfirst == 'Thu') {
                                                                                                        $n = -5;
                                                                                                    } elseif ($weekfirst == 'Fri') {
                                                                                                        $n = -6;
                                                                                                    }
                                                                                                    ?>

                                                                                                    <?php $m = $i * 7;
                                                                                                    $j = $m + $n;
                                                                                                    ?>

                                                                                                    <div class="fc-row fc-week fc-widget-content"
                                                                                                        style="height: 110px;">



                                                                                                        <div class="fc-bg">
                                                                                                            <table
                                                                                                                class="">
                                                                                                                <tbody>
                                                                                                                    <tr>


                                    @include('dashboard.cleander.table' , ['cleander_month' => $cleander_month ,
                                     'cleander_today'=> $cleander_today , 'j'=> $j  , 'p'=> '7'  , 'name_tr' => 'first_tr'  ] )


                                    @include('dashboard.cleander.table' , ['cleander_month' => $cleander_month ,
                                     'cleander_today'=> $cleander_today , 'j'=> $j  , 'p'=> '6'  , 'name_tr' => 'first_tr'  ] )


                                    @include('dashboard.cleander.table' , ['cleander_month' => $cleander_month ,
                                     'cleander_today'=> $cleander_today , 'j'=> $j  , 'p'=> '5'  , 'name_tr' => 'first_tr'  ] )


                                    @include('dashboard.cleander.table' , ['cleander_month' => $cleander_month ,
                                     'cleander_today'=> $cleander_today , 'j'=> $j  , 'p'=> '4'  , 'name_tr' => 'first_tr'  ] )


                                    @include('dashboard.cleander.table' , ['cleander_month' => $cleander_month ,
                                     'cleander_today'=> $cleander_today , 'j'=> $j  , 'p'=> '3'  , 'name_tr' => 'first_tr'  ] )


                                    @include('dashboard.cleander.table' , ['cleander_month' => $cleander_month ,
                                     'cleander_today'=> $cleander_today , 'j'=> $j  , 'p'=> '2'  , 'name_tr' => 'first_tr'  ] )


                                    @include('dashboard.cleander.table' , ['cleander_month' => $cleander_month ,
                                     'cleander_today'=> $cleander_today , 'j'=> $j  , 'p'=> '1'  , 'name_tr' => 'first_tr'  ] )



                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </div>


                                                                                                        <div
                                                                                                            class="fc-content-skeleton">
                                                                                                            <table>
                                                                                                                <thead>
                                                                                                                    <tr>



                                    @include('dashboard.cleander.table' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '7'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )

                                    @include('dashboard.cleander.table' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '6'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )

                                    @include('dashboard.cleander.table' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '5'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )

                                    @include('dashboard.cleander.table' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '4'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )

                                    @include('dashboard.cleander.table' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '3'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )

                                    @include('dashboard.cleander.table' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '2'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )

                                    @include('dashboard.cleander.table' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '1'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )




                                                                                                                    </tr>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </div>


                                                                                                    </div>
                                                                                                @endfor











                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Modal - Add new event -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif





                            @if ($id > '1')

                                <div class="row">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">تاریخ رزرو</h4>
                                                <div class="template-demo">


                                                    @if ($listrezerv)
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="pl-0">تاریخ </th>
                                                                    <th class="text-right">ساعت</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="pl-0">

                                                                        {{ $listrezerv->cal_year }}/{{ $listrezerv->cal_month }}/{{ $listrezerv->cal_day }}
                                                                    </td>
                                                                    <td class="pr-0 text-right">
                                                                        <div class="badge badge-primary">
                                                                            {{ $listrezerv->cal_hours }}</div>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p>تاریخ رزرو وجود ندارد</p>
                                                    @endif


                                                    <hr>
                                                    <p>تاریخ ایجاد درخواست :
                                                        <b>{{ jDate::forge($listrezerv->list_createdatdate)->format('Y/m/d ساعت H:i a') }}</b>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif





                            @if ($id == 2)

                                <form class="forms-sample" action="{{ env('APP_URL') }}/user/rezervmakpers"
                                    method="post">


                                    @if (count($errors))


                                        @foreach ($errors->all() as $error)
                                            <div class="breadcrumb bg-inverse-danger">
                                                <span style="color: #000000">{{ $error }}</span>
                                            </div>
                                        @endforeach

                                    @endif






                                    <script type="text/javascript">
                                        function show(str) {
                                            document.getElementById('sh2').style.display = 'none';
                                            document.getElementById('sh1').style.display = 'block';
                                        }

                                        function show2(sign) {
                                            document.getElementById('sh2').style.display = 'block';
                                            document.getElementById('sh1').style.display = 'none';
                                        }
                                    </script>






                                    <div class="col-md-12">


                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">انتخاب ماک</h4>
                                                <p class="card-text">
                                                    لطفا نسبت به انتخاب ماک موردنظر برای شرکت در آزمون اقدام نمایید د
                                                </p>



                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    value="1" name="makp" id="e1"
                                                                    onchange="show2()" checked="checked">
                                                                ماک پیرسون دارم
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="col-sm-12">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    name="makp" onchange="show(this.value)"
                                                                    value="2">
                                                                ماک پیرسون ندارم
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>




                                                <div id="sh2"> </div>

                                                <div id="sh1" style="display:none;">


                                                    <hr>
                                                    <label class="col-sm-12 col-form-label">نوع ماک موردنظر را وارد
                                                        نمایید</label>

                                                    <br>

                                                    <input type="hidden" class="form-check-input" value="0"
                                                        name="mak">
                                                    <input type="hidden" class="form-check-input"
                                                        value="{{ $listrezerv->list_id }}" name="list_id">

                                                    @foreach ($makcenters as $makcenter)
                                                        <div class="col-sm-12">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        value="{{ $makcenter->mak_id }}" name="mak">
                                                                    {{ $makcenter->mak_name }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    @endforeach



                                                </div>
                                                <p>&nbsp;</p>





                                                <tr>



                                                    <td class="pr-0 text-right">
                                                        <div
                                                            class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                                            @if ($errors->has('name'))
                                                                <label class="error mt-2 text-danger">کد تخفیف</label>
                                                            @else
                                                                <label>کد تخفیف</label>
                                                            @endif
                                                            <input type="text" class="form-control" name="disccodereq"
                                                                value="{{ old('name') }}" placeholder="کد تخفیف"
                                                                id="box3" oninput="calculate();">
                                                        </div>
                                                    </td>







                                                    <script src="{{ env('APP_URL') }}/build/js/alert/alertify.min.js"></script>
                                                    <link rel="stylesheet"
                                                        href="{{ env('APP_URL') }}/build/js/alert/alertify.core.css" />
                                                    <link rel="stylesheet"
                                                        href="{{ env('APP_URL') }}/build/js/alert/alertify.default.css"
                                                        id="toggleCSS" />



                                                    <style>
                                                        .divclass {
                                                            background: #415665;
                                                            height: 50px;
                                                            width: 200px;
                                                            border-radius: 15px;
                                                            padding: 20px;
                                                            font-size: 22px;
                                                            color: #fff;
                                                        }
                                                    </style>

                                                    <script type="text/javascript">
                                                        function goFurther() {
                                                            if (document.getElementById("chkAgree").checked == true)
                                                                document.getElementById("btnSubmit").disabled = false;
                                                            else
                                                                document.getElementById("btnSubmit").disabled = true;
                                                        }
                                                    </script>

                                                    <style type="text/css">
                                                        input[disabled] {
                                                            color: Gray;
                                                            text-decoration: none;
                                                        }
                                                    </style>

                                                    <?php $i = 4; ?>

                                                    <script>
                                                        function calculate() {
                                                            var myBox3 = document.getElementById('box3').value;
                                                            var myBox4 = document.getElementById('box4').value;
                                                            var myBox5 = document.getElementById('box5').value;
                                                            var myBox6 = document.getElementById('box6').value;

                                                            var result5 = document.getElementById('resul5');
                                                            var result6 = document.getElementById('resul6');


                                                            if (myBox3 != myBox4) {
                                                                var myResult5 = 1 * myBox5;
                                                                document.getElementById('result5').value = myResult5;
                                                                var myResult6 = 0;
                                                                document.getElementById('result6').value = myResult6;
                                                            }


                                                            if (myBox3 == myBox4) {
                                                                var myResult5 = myBox5 - myBox6;
                                                                document.getElementById('result5').value = myResult5;
                                                                var myResult6 = myBox6;
                                                                document.getElementById('result6').value = myResult6;
                                                            }


                                                            var maxmm = <?php echo $i; ?>;








                                                            if (myBox3 == myBox4) {

                                                                alertify.confirm("کد تخفیف شما با موفقیت اعمال شد ", function(e) {
                                                                    if (e) {
                                                                        alertify.alert("باتشکر از حسن توجه و شکیبایی شما");
                                                                    } else {
                                                                        alertify.alert("باتشکر از حسن توجه و شکیبایی شما");
                                                                    }
                                                                });


                                                            }
                                                        }
                                                    </script>


                                                    @if ($listdiscounts)
                                                        <input type="hidden" name="disccode" id="box4"
                                                            oninput="calculate();"
                                                            value="{{ $listdiscounts->discount_code }}">
                                                        <input type="hidden" name="discprice" id="box6"
                                                            oninput="calculate();"
                                                            value="{{ $listdiscounts->discount_price }}">
                                                    @else
                                                        <input type="hidden" name="disccode" id="box4"
                                                            oninput="calculate();" value="zzzzzzzzzzzzzzzzzz">
                                                        <input type="hidden" name="discprice" id="box6"
                                                            oninput="calculate();" value="0">
                                                    @endif



                                                    <input type="hidden" name="disc" id="box5"
                                                        oninput="calculate();" value="{{ $makcenter->mak_price }}">


                                                <tr>
                                                    <td class="pr-0 text-right">
                                                        <div
                                                            class="form-group {{ $errors->has('finalfee') ? 'has-error' : '' }}">
                                                            <label class="control-label">تخفیف (ريال)</label>
                                                            <input type="text" id="result6" oninput="calculate();"
                                                                name="finalfee" disabled="" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>


                                                <tr>

                                                    <td class="pr-0 text-right">
                                                        <div
                                                            class="form-group {{ $errors->has('finalfee') ? 'has-error' : '' }}">
                                                            <label class="control-label">مبلغ نهایی قابل پرداخت با اعمال
                                                                تخفیف (به ریال) </label>
                                                            <input type="text" id="result5" oninput="calculate();"
                                                                name="finalfee" disabled=""
                                                                value="{{ $makcenter->mak_price }}" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>















                                                </tr>







                                            </div>
                                        </div>
                                    </div>




                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button type="submit" class="btn btn-primary mr-2">خرید</button>
                                </form>
                            @endif



                            @if ($id > '2')

                                <div class="row">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">نوع ماک</h4>
                                                <div class="template-demo">



                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="pl-0">نوع ماک </th>
                                                                <th class="text-right">هزینه به ریال</th>
                                                            </tr>
                                                        </thead>



                                                        <tbody>
                                                            @if ($listrezerv->list_mak != '0')
                                                                @foreach ($makcenters as $makcenter)
                                                                    @if ($listrezerv->list_mak == $makcenter->mak_id)
                                                                        <tr>
                                                                            <td class="pl-0">

                                                                                {{ $makcenter->mak_name }}
                                                                            </td>
                                                                            <td class="pr-0 text-right">
                                                                                <div class="badge badge-success">
                                                                                    {{ $makcenter->mak_price }} ريال</div>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @elseif($listrezerv->list_mak == '0')
                                                                <tr>
                                                                    <td class="pl-0">

                                                                        ماک پیرسون دارم
                                                                    </td>
                                                                    <td class="pr-0 text-right">
                                                                        <div class="badge badge-success">- ريال</div>
                                                                    </td>
                                                                </tr>

                                                            @endif



                                                            <tr>
                                                                <td class="pl-0"> وضعیت پرداخت</td>
                                                                <td class="pr-0 text-right">


                                                                    @if ($listrezerv->list_flg == '1')
                                                                <td><a href="#">
                                                                        <button type="button"
                                                                            class="btn btn-success btn-sm"> پرداخت شده
                                                                            <i
                                                                                class="far fa-check-square btn-icon-prepend"></i>
                                                                        </button>
                                                                    </a></td>
                                                            @elseif($listrezerv->list_flg != '1')
                                                                <td><a href="#">

                                                                        <button type="button"
                                                                            class="btn btn-warning btn-sm"> منتظرپرداخت
                                                                            <i
                                                                                class="fa fa-exclamation-triangle btn-icon-prepend"></i>
                                                                        </button>

                                                                    </a></td>
                            @endif



                            </td>
                            </tr>





                            </tbody>


                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        @endif




        @if ($id > '2')

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">هزینه ها</h4>
                            <div class="template-demo">



                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th class="pl-0">عنوان </th>
                                            <th class="text-right">هزینه به ریال</th>
                                        </tr>
                                    </thead>



                                    <tbody>
                                        @if ($listrezerv->list_mak != '0')
                                            @foreach ($makcenters as $makcenter)
                                                @if ($listrezerv->list_mak == $makcenter->mak_id)
                                                    <tr>
                                                        <td class="pl-0">

                                                            {{ $makcenter->mak_name }}
                                                        </td>
                                                        <td class="pr-0 text-right">
                                                            <div class="badge badge-success"> {{ $makcenter->mak_price }}
                                                                ريال</div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @elseif($listrezerv->list_mak == '0')
                                            <tr>
                                                <td class="pl-0">
                                                    ماک پیرسون دارم
                                                </td>
                                                <td class="pr-0 text-right">
                                                    <div class="badge badge-success">- </div>
                                                </td>
                                            </tr>

                                        @endif


                                        <tr>
                                            <td class="pl-0">

                                                هزینه رزرو
                                            </td>
                                            <td class="pr-0 text-right">
                                                <div class="badge badge-success">{{ $listrezerv->list_pricerezerv }} ريال
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="pl-0">

                                                جمع کل قابل پرداخت
                                            </td>
                                            <td class="pr-0 text-right">
                                                <div class="badge badge-success">{{ $listrezerv->list_price }} ريال</div>
                                            </td>
                                        </tr>



                                    </tbody>


                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ env('APP_URL') }}/user/rezervmak/{{ $idrezerv }}/{{ $id - 1 }}"
                class="fullcalendar-btn-next btn btn-sm btn-primary" title="  قبل">
                <i class="fa fa-angle-right"></i>

            </a>



            @if ($listrezerv->list_flg == '1')
                <td> </td>
            @elseif($listrezerv->list_flg != '1')
                <td><a
                        href="{{ env('APP_URL') }}/samplemak/request.php?id={{ $listrezerv->list_rnd }}&&price={{ $listrezerv->list_price }}">
                        <button type="button" class="btn btn-primary mr-2">پرداخت نهایی</button>
                    </a></td>
            @endif





        @endif





    </div>
    </div>
    </div>

    <div class="col-lg-2">

    </div>

    <link rel="stylesheet" href="{{ env('APP_URL') }}/build/melody/vendors/iconfonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/build/melody/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/build/melody/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/build/melody/css/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/build/melody/css/style.css">











    </div>
    </div>
    </div>











    @endsection
