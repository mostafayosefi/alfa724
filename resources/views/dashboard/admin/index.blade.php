@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('title', __('داشبورد'))
@section('hierarchy')
    {{-- <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" /> --}}
@endsection
@section('content')


<?php
$projects=0;
$employees=0;
$price=0;
$deposits=0;
foreach ($posts as $key) {
    $projects++;
}
foreach ($users as $key) {
    $employees++;
}
foreach ($service as $key) {
    $price=$key->price+$price;
    $deposits = $key->deposit+$key->deposit2+$key->deposit3+$key->deposit4+$key->deposit5+$key->deposit6+$key->deposit7+$key->deposit8+$key->deposit9+$deposits;
}
?>
<style>
 .alert-primary {
    color: #ffffff;
    background: #006fe5;
    border-color: #8c9aa9;
  }

  .alert-primary a {

  }

  .alert .close, .alert .mailbox-attachment-close {
    color: #fff;
    opacity: .2;
}
</style>
    <div class="container">



        @if(auth()->user()->listabsence=='active')
        @include('dashboard.card.absence.create' , [  'absence'=> $myabsence ] )
        @include('dashboard.card.absence.employee', [  'absence'=> $myabsence , 'route' => route('dashboard.admin.absence.store') ])
        @endif


        <div class="row">



        <div class="col-lg-3 col-6">
            @include('dashboard.card.dashboard.box' , [  'box_bg' => 'warning' , 'box_header' =>  $employees.' کارمند جدید'
             , 'box_titr' => 'همکاران جدید  ' , 'box_icon' => 'ion ion-person-add'
              , 'box_route' => route('dashboard.admin.users.employee') ,
             'box_more' => 'مشاهده همه' , 'box_more_icon' => 'fas fa-arrow-circle-left' ])
        </div>

        <div class="col-lg-3 col-6">
            @include('dashboard.card.dashboard.box' , [  'box_bg' => 'primary' , 'box_header' =>  $projects.' پروژه '
             , 'box_titr' => 'پروژه های انجام شده ' , 'box_icon' => 'ion ion-pie-graph'
              , 'box_route' => route('dashboard.admin.project.manage') ,
             'box_more' => 'مشاهده همه' , 'box_more_icon' => 'fas fa-arrow-circle-left' ])
        </div>

        <div class="col-lg-3 col-6">
            @include('dashboard.card.dashboard.box' , [  'box_bg' => 'warning' , 'box_header' =>  $task_notwork_count.' مسئولیت '
             , 'box_titr' => 'مسئولیت های انجام نشده ' , 'box_icon' => 'ion ion-pie-graph'
              , 'box_route' => route('dashboard.admin.daily.alluser',[ 'notwork']) ,
             'box_more' => 'مشاهده همه' , 'box_more_icon' => 'fas fa-arrow-circle-left' ])
        </div>
        <div class="col-lg-3 col-6">
            @include('dashboard.card.dashboard.box' , [  'box_bg' => 'card-outline card-success' , 'box_header' =>   date_today('shamsi')
             , 'box_titr' => ' آخرین به روز رسانی سامانه' , 'box_icon' => 'ion ion-gear-a'
              , 'box_route' => '#',
             'box_more' => 'به روزرسانی ' , 'box_more_icon' => 'fas fa-arrow-circle-left' ])
        </div>


        </div>


        <div class="row">
<<<<<<< HEAD
            <div class="col-md-6">
                <div class="card card-widget widget-user-2">
                <div class="widget-user-header bg-primary">
                <h3 class="widget-user-username">لیست حضور غیاب</h3>
                </div>
                <div class="card-footer p-0">
                <ul class="nav flex-column">
            @if($listabsence)
            @foreach ($listabsence as $item )
@include('dashboard.card.absence.list_absence' , [ 'list_absence' => 'list' ])
                @endforeach
                @endif
                </ul>
                </div>
                </div>

                @include('dashboard.card.task.list' , [ 'card' => 'task_notwork' ])


                </div>


            <div class="col-md-6">
                <div class="card card-widget widget-user-2">
                <div class="widget-user-header bg-secondary">
                <h3 class="widget-user-username">جریمه تاخیر و غیبت کاربران</h3>
                </div>


                <div class="card-body">
                <div class="col-12">
            @if($listabsence)
            @foreach ($listabsence as $item )
@include('dashboard.card.absence.list_absence' , [ 'list_absence' => 'score' ])
                @endforeach
                @endif



                </div>
                </div>
                </div>
                @include('dashboard.card.task.list' , [ 'card' => 'task_today' ])

                </div>
=======


>>>>>>> refs/remotes/origin/master

            <div class="col-md-4">
                <div class="card card-widget widget-user-2">
                <div class="widget-user-header bg-primary">
                <h3 class="widget-user-username">لیست حضور غیاب</h3>
                </div>
                <div class="card-footer p-0">
                <ul class="nav flex-column">
            @if($listabsence)
            @foreach ($listabsence as $item )

@php $first = report_user($item->id  , 'first' , 'list_absence'   ); @endphp

@if ($first)
 <li class="nav-item"> <a href="#" class="nav-link"> {{$item->name}} <span class="float-right badge bg-success">ساعت ورود  {{ $first->enter }}
 </span> </a> </li>
  @else

  <li class="nav-item"> <a href="#" class="nav-link"> {{$item->name}} <span class="float-right badge bg-danger"> غایب </span> </a> </li>
 @endif

                @endforeach
                @endif

                </ul>
                </div>
                </div>
                </div>

            <div class="col-md-8">
                <div class="card card-widget widget-user-2">
                <div class="widget-user-header bg-warning">
                <h3 class="widget-user-username">  لیست وظایف انجام نشده کاربران  </h3>
                </div>
                <div class="card-body">


            @if($task_notwork_all)


            <div class="col-12">
                @foreach ($task_notwork_all as $item )


                <div class="alert alert-warning no-dismiss">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                مهلت انجام مسئولیت  {{$item->title}} توسط کاربر {{$item->user->name}} به پایان رسیده ولی هنوز پایان کار ثبت نگردید


                </div>

                @endforeach
            </div>
                @endif

                </div>
                </div>
                </div>



            </div>
        <div class="row">


            @if($listabsence)
            @foreach ($listabsence as $item )

            <div class="col-md-4">

                <div class="card card-widget widget-user-2">

                <div class="widget-user-header bg-primary">
                <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ !empty($item->picture) ? $item->picture : asset('assets/images/user.png') }}" alt="User Avatar">
                </div>

                <h3 class="widget-user-username">{{ $item->name }}</h3>
                <h5 class="widget-user-desc">{{ $item->situation }}</h5>
                </div>
                <div class="card-footer p-0">
                <ul class="nav flex-column">
                <li class="nav-item">
                <a href="#" class="nav-link">
                پروژه ها <span class="float-right badge bg-primary">{{ report_user($item->id  , 'count' , 'employee_project'   ) }}</span>
                </a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                مسئولیت ها <span class="float-right badge bg-info">{{ report_user($item->id  , 'count' , 'task'   ) }}</span>
                </a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                وظایف انجام نداده <span class="float-right badge bg-danger">{{ report_user($item->id  , 'count' , 'task_notwork'   ) }}</span>
                </a>
                </li>
                </ul>
                </div>
                </div>

                </div>
            @endforeach
            @endif
            </div>

            <div class="row">

                </div>

        <div class="row">


            @if($listabsence)
            @foreach ($listabsence as $item )

            <div class="col-md-4">

                <div class="card card-widget widget-user-2">

                <div class="widget-user-header bg-primary">
                <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ !empty($item->picture) ? $item->picture : asset('assets/images/user.png') }}" alt="User Avatar">
                </div>

                <h3 class="widget-user-username">{{ $item->name }}</h3>
                <h5 class="widget-user-desc">{{ $item->situation }}</h5>
                </div>
                <div class="card-footer p-0">
                <ul class="nav flex-column">
                <li class="nav-item">
                <a href="#" class="nav-link">
                پروژه ها <span class="float-right badge bg-primary">{{ report_user($item->id  , 'count' , 'employee_project'   ) }}</span>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{ route('dashboard.admin.daily.alluser' ,  [ 'all' , $item->id ]  ) }}" class="nav-link">
                مسئولیت ها <span class="float-right badge bg-info">{{ report_user($item->id  , 'count' , 'task'   ) }}</span>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{ route('dashboard.admin.daily.alluser' ,  [ 'notwork' , $item->id ]  ) }}" class="nav-link">
                وظایف انجام نداده <span class="float-right badge bg-danger">{{ report_user($item->id  , 'count' , 'task_notwork'   ) }}</span>
                </a>
                </li>
                </ul>
                </div>
                </div>

                </div>
            @endforeach
            @endif
            </div>

            <div class="row">

        @if(!empty($finishing_projects) || !empty($finishing_phases) || !empty($overdue_projects))
            <div class="col-12">
                @foreach($finishing_projects as $project)
                    <div class="alert alert-primary no-dismiss">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        پروژه {{ $project->title }} در تاریخ {{ $project->finish_date->formatJalali() }} به پایان
                        خواهد رسید!
                    </div>
                @endforeach
                @foreach($finishing_phases as $phase)
                    <div class="alert alert-primary no-dismiss">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        فاز {{ $phase->title }} از پروژه {{ $phase->for->title }} در
                        تاریخ {{ $phase->finish_date->formatJalali() }} به پایان خواهد رسید!
                    </div>
                @endforeach
                @foreach($overdue_projects as $project)
                <a href="{{route('dashboard.admin.project.index' , $project->id)}}" >
                    <div class="alert alert-primary no-dismiss">
                        <button type="button" class="close" data-dismiss="alert">×</button>

                            مهلت پروژه {{ $project->title }} در {{ $project->finish_date->formatJalali() }} به پایان
                            رسیده‌است اما هنوز به اتمام نرسیده!

                    </div></a>
                @endforeach
            </div>
        @endif



       <div class="col-12">
            <x-card type="primary">
                <x-card-body>


@include('dashboard.card.absence.index')
                </x-card-body>
            </x-card>
        </div>




<<<<<<< HEAD
        {{-- @include('dropzone.sample1') --}}



=======
>>>>>>> refs/remotes/origin/master

       </div>

    </div>
@endsection
