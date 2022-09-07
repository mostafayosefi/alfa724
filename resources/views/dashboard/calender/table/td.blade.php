
@if($name_tr == 'first_tr')

<td
@if (($cleander_month->cleander_year->year == $cleander_today->year) && ($cleander_month->month== $cleander_today->month) &&  (($j + $p ) == $cleander_today->day)) class="fc-day fc-widget-content  fc-other-month fc-today " @else class="fc-day-top fc-future" @endif
    data-date="2020-07-09"> </td>

@endif


@if($name_tr == 'multi_table')


<td role="gridcell"

@php
$day_id = table_day_cleander($j,$p,$n,$month_dayprev,$month_daymonth,$cleander_month,'day_id');
$holiday = table_day_cleander($j,$p,$n,$month_dayprev,$month_daymonth,$cleander_month,'holiday');
@endphp

@if (($cleander_month->cleander_year->year == $cleander_today->year) && ($cleander_month->month== $cleander_today->month) &&  (($j + $p ) == $cleander_today->day))
class="fc-daygrid-day fc-day fc-day-tue fc-day-today "
@endif



@if ($j + $p < 1 || $j + $p > $month_daymonth)
class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other"
 @else

@if ($holiday=='true')
class="fc-daygrid-day fc-day fc-day-tue day-holiday "
@endif

class="fc-daygrid-day fc-day fc-day-sun fc-day-past"


 @endif





data-date="2022-08-14"
aria-labelledby="fc-dom-30">
<div
    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
    <div class="fc-daygrid-day-top"><a
            id="fc-dom-30"
            class="fc-daygrid-day-number"
            aria-label="August 14, 2022">

{{table_day_cleander($j,$p,$n,$month_dayprev,$month_daymonth,$cleander_month,'day');}}



{{-- {{$type}} --}}

@if($type=='holiday')
@include('dashboard.calender.table.holiday', ['items' => $day_id ,'route' => '' , 'myname' => $day_id->date ])
@endif











{{-- {{$day_id->id}} --}}

    @php


// dateshamsi
// echo    table_day_cleander($j,$p,$n,$month_dayprev,$month_daymonth,$cleander_month,'dateshamsi');


//  cleander_day
// $cleander_day = table_day_cleander($j,$p,$n,$month_dayprev,$month_daymonth,$cleander_month,'day_id');
// $month_td = table_day_cleander($j,$p,$n,$month_dayprev,$month_daymonth,$cleander_month,'month');
// $year_td = table_day_cleander($j,$p,$n,$month_dayprev,$month_daymonth,$cleander_month,'year');

//  echo check_holiday($year_td,$month_td,$cleander_day->day);

    @endphp

        </a>
    </div>
    <div class="fc-daygrid-day-events">
        <div class="fc-daygrid-day-bottom"
            style="margin-top: 0px;"></div>
    </div>
    <div class="fc-daygrid-day-bg"></div>
</div>
</td>



@endif

