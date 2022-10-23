@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مشاهده مسئولیت ها  " route="dashboard.admin.users.admins.index" />
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
@include('dashboard.card.task.create' , [ 'route' => route('dashboard.admin.daily.store') ] )

@include('dashboard.card.task.edit', [ 'route' =>  route('dashboard.admin.daily.editdaily') , $users  ] )


<div class ="row">
    <div class ="col-md-6 col-sm-12" style="margin:20px 0px;">
        <a href="{{ route('dashboard.admin.daily.index') }}" class="btn btn-primary" > همه مسئولیت ها </a>
        <a href="{{ route('dashboard.admin.daily.'.explode_url(3) ,  [ 'done' ] ) }}" class="btn btn-success" > مسئولیتهای انجام شده   </a>
        <a href="{{ route('dashboard.admin.daily.'.explode_url(3) ,  [ 'notwork' ] ) }}" class="btn btn-danger" > مسئولیتهای انجام نشده   </a>
           </div>
    <div class ="col-md-6 col-sm-12" style="margin:20px 0px;">
      {{-- <button type="button"  data-toggle="modal" style="float:left;" data-target="#modal-lg" style="font-size:13px;" class="btn btn-info float-right"><i class="fas fa-plus"></i>اضافه کردن کار</button> --}}

    </div>
</div>

@include('dashboard.card.task.index' , [ $users ])

@endsection
