<?php use Hekmatinasser\Verta\Verta; ?>
@extends('layouts.dashboard')
@section('sidebar')
@include('dashboard.employee.notification')
@include('dashboard.employee.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.employee.index" />
    <x-breadcrumb-item title="مدیریت مسئولیت ها" route="dashboard.employee.task.manage" />
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
@include('dashboard.card.task.create' , [ 'route' => route('dashboard.employee.task.store') ] )
@include('dashboard.card.task.edit', [ 'route' =>  route('dashboard.employee.task.edittask')  ] )
@include('dashboard.card.task.status', [ 'route' =>   route('dashboard.employee.task.update')   ] )
@include('dashboard.card.note.updatenote' , [ 'route' => route('dashboard.employee.task.updatenote')  ] )
@include('dashboard.card.note.create' , [ 'route' => route('dashboard.employee.task.note') ] )

@include('dashboard.card.absence.create')
@include('dashboard.card.absence.employee' , [   'route' => route('dashboard.employee.absence.store') ])


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
