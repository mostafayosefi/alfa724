@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت پروژه ها" route="dashboard.admin.project.manage" />
    <x-breadcrumb-item title="مدیریت هزینه کاربران" route="dashboard.admin.money.employee" />
@endsection
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
{{-- @include('dashboard.admin.employee.updateemployee', ['posts' => $employee, 'salaries' => $salaries]) --}}


    <div class="col-md-12">

        @include('dashboard.admin.money.report.header')



        <x-card type="info">
            <x-card-header>
                 گزارش {{law_name($type)}}
            </x-card-header>
            <x-card-body>
                @include('dashboard.admin.money.report.table')
            </x-card-body>
        </x-card>
    </div>

    @endsection

