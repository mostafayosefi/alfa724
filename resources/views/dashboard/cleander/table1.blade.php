
@if($name_tr == 'first_tr')

<td
@if (($cleander_month->cleander_year->year == $cleander_today->year) && ($cleander_month->month== $cleander_today->month) &&  (($j + $p ) == $cleander_today->day)) class="fc-day fc-widget-content  fc-other-month fc-today " @else class="fc-day-top fc-future" @endif
    data-date="2020-07-09"> </td>

@endif


@if($name_tr == 'multi_table')


<td role="gridcell"

@if (($cleander_month->cleander_year->year == $cleander_today->year) && ($cleander_month->month== $cleander_today->month) &&  (($j + $p ) == $cleander_today->day))
class="fc-daygrid-day fc-day fc-day-tue fc-day-today "
@else


@if ($j + $p < 1 || $j + $p > $month_daymonth)
class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other"
 @else
class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
 @endif

 @endif


data-date="2022-08-14"
aria-labelledby="fc-dom-30">
<div
    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
    <div class="fc-daygrid-day-top"><a
            id="fc-dom-30"
            class="fc-daygrid-day-number"
            aria-label="August 14, 2022">
            @if ($j + $p < 1)
            {{ $month_dayprev + $n + $p }}
        @elseif($j + $p > $month_daymonth)
            {{ $j + $p - $month_daymonth }}
        @else
            {{ $j + $p }}
        @endif
 
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

