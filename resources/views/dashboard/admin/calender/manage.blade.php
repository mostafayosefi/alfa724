@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت تاریخ ها" route="dashboard.admin.date.manage" />
@endsection
@section('content')
    @if (Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif
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
                            @foreach ($posts as $item)
                                <tr>
                                    <td>{!! $item->date->formatJalali() !!}</td>
                                    <td>
                                        <a href="{{ route('dashboard.admin.date.deletedate', ['id' => $item->id]) }}"
                                            class="delete_post"><i class="fa fa-fw fa-eraser"></i></a>
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
                <a href="{{ route('dashboard.admin.date.create') }}" class="btn btn-success">ثبت تاریخ جدید</a>
            </x-card-footer>
        </x-card>
    </div>



    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('assets/datepicker_v1/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datepicker_v1/main.css') }}">

    <div class="row">
        <div class="col-md-3">
            <div class="sticky-top mb-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Draggable Events</h4>
                    </div>
                    <div class="card-body">

                        <div id="external-events">
                            <div class="external-event bg-success ui-draggable ui-draggable-handle"
                                style="position: relative;">Lunch</div>
                            <div class="external-event bg-warning ui-draggable ui-draggable-handle"
                                style="position: relative;">Go home</div>
                            <div class="external-event bg-info ui-draggable ui-draggable-handle"
                                style="position: relative;">Do homework</div>
                            <div class="external-event bg-primary ui-draggable ui-draggable-handle"
                                style="position: relative;">Work on UI design</div>
                            <div class="external-event bg-danger ui-draggable ui-draggable-handle"
                                style="position: relative;">Sleep tight</div>
                            <div class="checkbox">
                                <label for="drop-remove">
                                    <input type="checkbox" id="drop-remove">
                                    remove after drop
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Event</h3>
                    </div>
                    <div class="card-body">
                        <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                            <ul class="fc-color-picker" id="color-chooser">
                                <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                            </ul>
                        </div>

                        <div class="input-group">
                            <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                            <div class="input-group-append">
                                <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-body p-0">

                    <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap">
                        <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
                            <div class="fc-toolbar-chunk">
                                <div class="btn-group">


                                    <button type="button"
                                    title="Next month" aria-pressed="false" class="fc-next-button btn btn-primary"><span
                                        class="fa fa-chevron-right"></span></button>
                                            <button type="button"
                                    title="This month" disabled="" aria-pressed="false"
                                    class="fc-today-button btn btn-primary"> {{$cleander_month->name}} {{$cleander_month->cleander_year->year}} </button>

                                    <button type="button" title="Previous month" aria-pressed="false"
                                        class="fc-prev-button btn btn-primary"><span
                                            class="fa fa-chevron-left"></span></button>

                                        </div>
                            </div>
                            <div class="fc-toolbar-chunk">
                                <h2 class="fc-toolbar-title" id="fc-dom-1">  {{$cleander_month->name}} {{$cleander_month->cleander_year->year}} </h2>
                            </div>
                            <div class="fc-toolbar-chunk">
                                <div class="btn-group"><button type="button" title="month view" aria-pressed="true"
                                        class="fc-dayGridMonth-button btn btn-primary active">month</button><button
                                        type="button" title="week view" aria-pressed="false"
                                        class="fc-timeGridWeek-button btn btn-primary">week</button><button type="button"
                                        title="day view" aria-pressed="false"
                                        class="fc-timeGridDay-button btn btn-primary">day</button></div>
                            </div>
                        </div>
                        <div aria-labelledby="fc-dom-1" class="fc-view-harness fc-view-harness-active"
                            style="height: 590.37px;  ">
                            <div class="fc-daygrid fc-dayGridMonth-view fc-view">
                                <table role="grid" class="fc-scrollgrid table-bordered fc-scrollgrid-liquid">
                                    <thead role="rowgroup">
                                        <tr role="presentation"
                                            class="fc-scrollgrid-section fc-scrollgrid-section-header ">
                                            <th role="presentation">
                                                <div class="fc-scroller-harness">
                                                    <div class="fc-scroller" style="overflow: hidden;">
                                                        <table role="presentation" class="fc-col-header "
                                                           >
                                                            <colgroup></colgroup>
                                                            <thead role="presentation">
                                                                <tr role="row">
                                                                    <th role="columnheader"
                                                                        class="fc-col-header-cell fc-day fc-day-sat">
                                                                        <div class="fc-scrollgrid-sync-inner"><a
                                                                                aria-label="Saturday"
                                                                                class="fc-col-header-cell-cushion ">شنبه</a>
                                                                        </div>
                                                                    </th>
                                                                    <th role="columnheader"
                                                                        class="fc-col-header-cell fc-day fc-day-sun">
                                                                        <div class="fc-scrollgrid-sync-inner"><a
                                                                                aria-label="Sunday"
                                                                                class="fc-col-header-cell-cushion ">یکشنبه</a>
                                                                        </div>
                                                                    </th>
                                                                    <th role="columnheader"
                                                                        class="fc-col-header-cell fc-day fc-day-mon">
                                                                        <div class="fc-scrollgrid-sync-inner"><a
                                                                                aria-label="Monday"
                                                                                class="fc-col-header-cell-cushion ">دوشنبه</a>
                                                                        </div>
                                                                    </th>
                                                                    <th role="columnheader"
                                                                        class="fc-col-header-cell fc-day fc-day-tue">
                                                                        <div class="fc-scrollgrid-sync-inner"><a
                                                                                aria-label="Tuesday"
                                                                                class="fc-col-header-cell-cushion ">سه شنبه</a>
                                                                        </div>
                                                                    </th>
                                                                    <th role="columnheader"
                                                                        class="fc-col-header-cell fc-day fc-day-wed">
                                                                        <div class="fc-scrollgrid-sync-inner"><a
                                                                                aria-label="Wednesday"
                                                                                class="fc-col-header-cell-cushion ">چهارشنبه</a>
                                                                        </div>
                                                                    </th>
                                                                    <th role="columnheader"
                                                                        class="fc-col-header-cell fc-day fc-day-thu">
                                                                        <div class="fc-scrollgrid-sync-inner"><a
                                                                                aria-label="Thursday"
                                                                                class="fc-col-header-cell-cushion ">پنجشنبه</a>
                                                                        </div>
                                                                    </th>
                                                                    <th role="columnheader"
                                                                        class="fc-col-header-cell fc-day fc-day-fri">
                                                                        <div class="fc-scrollgrid-sync-inner"><a
                                                                                aria-label="Friday"
                                                                                class="fc-col-header-cell-cushion ">جمعه</a>
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody role="rowgroup">
                                        <tr role="presentation"
                                            class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid">
                                            <td role="presentation">
                                                <div class="fc-scroller-harness fc-scroller-harness-liquid">
                                                    <div class="fc-scroller fc-scroller-liquid-absolute"
                                                        style="overflow: hidden auto;">
                                                        <div class="fc-daygrid-body fc-daygrid-body-unbalanced "
                                                             >
                                                            <table role="presentation" class="fc-scrollgrid-sync-table"

                                                                >
                                                                <colgroup></colgroup>
                                                                <tbody role="presentation">



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



                                                                    <tr role="row">


                                    @include('dashboard.cleander.table1' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '1'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )

                                    @include('dashboard.cleander.table1' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '2'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )

                                    @include('dashboard.cleander.table1' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '3'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )

                                    @include('dashboard.cleander.table1' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '4'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )

                                    @include('dashboard.cleander.table1' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '5'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )

                                    @include('dashboard.cleander.table1' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '6'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )

                                    @include('dashboard.cleander.table1' , ['month_daymonth' => $month_daymonth ,
                                    'month_dayprev'=> $month_dayprev , 'j'=> $j  , 'p'=> '7'  , 'n'=> $n  , 'name_tr' => 'multi_table'  ] )


                                                                    </tr>


                                                                    @endfor


                                                                </tbody>
                                                            </table>
                                                        </div>
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

            </div>

        </div>

    </div>


    <script src="{{ asset('assets/datepicker_v1/moment.min.js') }}"></script>
    <script src="{{ asset('assets/datepicker_v1/main.js') }}"></script>
@endsection
