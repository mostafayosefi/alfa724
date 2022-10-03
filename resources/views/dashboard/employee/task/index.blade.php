<?php use Hekmatinasser\Verta\Verta; ?>
@extends('layouts.dashboard')
@section('sidebar')
{{-- @include('dashboard.employee.notification') --}}
@include('dashboard.employee.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.employee.index" />
    <x-breadcrumb-item title="مدیریت مسئولیت ها" route="dashboard.employee.task.manage" />
@endsection

@section('content')
@if(Session::has('info'))
<div class="row">
    <div class="col-md-12">
        <p class="alert alert-info">{{ Session::get('info') }}</p>
    </div>
</div>
@endif

<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

@include('dashboard.card.task.edit', [ 'route' =>  route('dashboard.employee.task.edittask')  ] )
@include('dashboard.card.task.index' , [ 'guard' => 'employee'  ])

@endsection
