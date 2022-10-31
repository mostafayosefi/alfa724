@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت هزینه ثابت" route="dashboard.admin.money.index" />
@endsection




@section('content')

<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
 @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
@include('dashboard.card.money.edit' , [ 'route' => '#' , 'items' => $items  ] )


<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">


        @include('dashboard.card.money.list_price' )





        </div>
        <div class="col-md-1">
        </div>
    </div>


    @endsection
