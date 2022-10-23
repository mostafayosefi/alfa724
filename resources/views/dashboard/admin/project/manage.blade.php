@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت پروژه ها" route="dashboard.admin.project.manage" />
@endsection
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
    <div class="col-md-12">
        <div class ="row">
            <div class ="col-md-8 col-sm-8" style="margin:20px 0px;">
              <a href="{{route('dashboard.admin.project.manage')}}" class="btn btn-primary">همه پروژه ها   </a>
              <a href="{{route('dashboard.admin.project.manage' , [ 'in_progress' ] )}}" class="btn btn-warning">پروژه های درحال انجام</a>
              <a href="{{route('dashboard.admin.project.manage', [ 'done' ])}}" class="btn btn-secondary">پروژه های انجام شده</a>
              <a href="{{route('dashboard.admin.project.manage', [ 'not_done' ])}}" class="btn btn-danger">پروژه های انجام نشده</a>
              <a href="{{route('dashboard.admin.project.manage', [ 'paid' ])}}" class="btn btn-success">پروژه های تسویه شده</a>
            </div>
            <div class ="col-md-4 col-sm-4" style="margin:20px 0px;">
              <a href="{{route('dashboard.admin.project.create')}}" style="float:left;" class="btn btn-success">ثبت پروژه جدید</a>
            </div>
        </div>

        @include('dashboard.card.project.index')

    </div>
    @endsection
