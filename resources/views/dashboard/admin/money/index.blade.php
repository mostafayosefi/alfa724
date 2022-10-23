@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" /> 
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


<div class="container">
    <div class="row">

    <div class="col-lg-3 col-6">
        @include('dashboard.card.dashboard.box' , [  'box_bg' => 'info' , 'box_header' => number_format(price_finical(auth()->user()->id,'depo','all','null','null')).' تومان '
         , 'box_titr' => 'بیعانه های دریافتی' , 'box_icon' => 'ion ion-stats-bars' , 'box_route' => route('dashboard.admin.money.service.price' , ['type' => 'depo'] ) ,
         'box_more' => 'مشاهده همه' , 'box_more_icon' => 'fas fa-arrow-circle-left' ])
    </div>




    <div class="col-lg-3 col-6">
        @include('dashboard.card.dashboard.box' , [  'box_bg' => 'success' , 'box_header' => number_format(price_finical(auth()->user()->id,'income','all','null','null')).' تومان '
         , 'box_titr' => 'درآمد کل ' , 'box_icon' => 'ion ion-stats-bars' , 'box_route' => route('dashboard.admin.money.service.index') ,
         'box_more' => 'مشاهده همه' , 'box_more_icon' => 'fas fa-arrow-circle-left' ])
    </div>


    </div>
    </div>


    @endsection

