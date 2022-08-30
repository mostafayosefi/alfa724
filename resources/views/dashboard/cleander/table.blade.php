
@if($name_tr == 'first_tr')

<td @if (($cleander_month->cleander_year->year == $cleander_today->year) && ($cleander_month->month== $cleander_today->month) &&  (($j + $p ) == $cleander_today->day)) class="fc-day fc-widget-content  fc-other-month fc-today " @else class="fc-day-top fc-future" @endif
    data-date="2020-07-09"> </td>

@endif


@if($name_tr == 'multi_table')


<td @if ($j + $p < 1 || $j + $p > $month_daymonth) class="fc-day-top fc-other-month fc-past" @else class="fc-day-top fc-future" @endif
    data-date="2020-07-01">
    <span
        class="fc-day-number">
        @if ($j + $p < 1)
            {{ $month_dayprev + $n + $p }}
        @elseif($j + $p > $month_daymonth)
            {{ $j + $p - $month_daymonth }}
        @else
            {{ $j + $p }}
        @endif
    </span>

                {{-- <a href="#"
                    data-toggle="modal"
                    data-target="#rezervd5"
                    class="fc-day fc-widget-content  fc-other-month fc-today ">
                    <button
                        type="submit"
                        style="background-color: #cb34a9; color: #ffffff;  direction: rtl;">r</button>
                </a> --}}

</td>

@endif

