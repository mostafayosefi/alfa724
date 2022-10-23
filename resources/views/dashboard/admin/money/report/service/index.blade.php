@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت پروژه ها" route="dashboard.admin.project.manage" />
    <x-breadcrumb-item title="مدیریت هزینه کاربران" route="dashboard.admin.money.index" />
@endsection
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif



<div class="row">

    <div class="col-lg-4 col-6">
        @include('dashboard.card.dashboard.box' , [  'box_bg' => 'info' , 'box_header' => number_format(price_finical(auth()->user()->id,'depo','service','null','null')).' تومان '
         , 'box_titr' => 'بیعانه های دریافتی' , 'box_icon' => 'ion ion-stats-bars' , 'box_route' => null ,
         'box_more' => null, 'box_more_icon' => null ])
    </div>

</div>

    <div class="col-md-12">




        <x-card type="primary">
            <x-card-header>
                 گزارش {{law_name($type)}} های خدمات
            </x-card-header>
            <x-card-body>
                @include('dashboard.admin.money.report.service.table')
            </x-card-body>
        </x-card>
    </div>

    @endsection

