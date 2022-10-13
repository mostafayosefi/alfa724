@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.employee.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.employee.index" />
    <x-breadcrumb-item title="حضور غیاب" route="dashboard.employee.absence.index" />
@endsection
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
<style>
    .z-0 {display:none;}
    .text-sm{margin-top:20px; }
    #example1_paginate {display:none }
    #example1_info {display:none }
</style>


@include('dashboard.card.absence.index')

    @endsection

