@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('title', __('داشبورد'))
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
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
    background: #718ba7;
    border-color: #8c9aa9;
  }
</style>
    <div class="container">
        <div class="row">

        <div class="col-lg-3 col-6">
            @include('dashboard.card.dashboard.box' , [  'box_bg' => 'info' , 'box_header' => number_format(price_finical(auth()->user()->id,'depo','service','null','null')).' تومان '
             , 'box_titr' => 'بیعانه های دریافتی' , 'box_icon' => 'ion ion-stats-bars' , 'box_route' => route('dashboard.admin.money.service.price' , ['type' => 'depo'] ) ,
             'box_more' => 'مشاهده همه' , 'box_more_icon' => 'fas fa-arrow-circle-left' ])
        </div>

        <div class="col-lg-3 col-6">
            @include('dashboard.card.dashboard.box' , [  'box_bg' => 'success' , 'box_header' => number_format(price_finical(auth()->user()->id,'income','service','null','null')).' تومان '
             , 'box_titr' => 'درآمد کل ' , 'box_icon' => 'ion ion-stats-bars' , 'box_route' => route('dashboard.admin.money.service.index') ,
             'box_more' => 'مشاهده همه' , 'box_more_icon' => 'fas fa-arrow-circle-left' ])
        </div>


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


        
      </div>
    </div>
@endsection
