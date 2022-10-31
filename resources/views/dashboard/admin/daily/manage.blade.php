<?php use Hekmatinasser\Verta\Verta; ?>
@extends('layouts.dashboard')
@section('sidebar')
@include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')

<li class="breadcrumb-item "><a href="{{ route('dashboard.admin.index') }}">داشبورد</a></li>
<li class="breadcrumb-item  active ">برنامه روزانه</li>
 
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/MDTimePicker/mdtimepicker.min.css') }}">
    <style>
        .mdtimepicker {
            direction: ltr;
            text-align: left;
        }
    </style>
    <style>
    .z-0 {display:none;}
    .text-sm{margin-top:20px; }
    #example1_paginate {display:none }
    #example1_info {display:none }
</style>
@endsection

@section('content')
<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-success">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
@include('dashboard.card.task.create' , [ 'route' => route('dashboard.admin.daily.store') ] )
@include('dashboard.card.task.edit', [ 'route' =>  route('dashboard.admin.daily.editdaily')  ] )
@include('dashboard.card.task.status', [ 'route' =>  route('dashboard.admin.daily.update')  ] )
@include('dashboard.card.note.updatenote' , [ 'route' => route('dashboard.admin.daily.updatenote')  ] )
@include('dashboard.card.note.create' , [ 'route' => route('dashboard.admin.daily.note') ] )


<div class="row">

    @include('dashboard.card.task.today')
    @include('dashboard.card.task.tomorow')
    @include('dashboard.card.note.list')


</div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/dashboard/plugins/MDTimePicker/mdtimepicker.min.js') }}"></script>
    <script>
        mdtimepicker('.mdtimepicker-input', {
            is24hour: true,
        });
    </script>
@endsection
