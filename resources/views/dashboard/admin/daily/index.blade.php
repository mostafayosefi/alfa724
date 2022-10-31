@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    @if (explode_url(3)=='index')
    <x-breadcrumb-item title=" مسئولیت های من" route="dashboard.admin.daily.{{explode_url(3)}}" />
@else
<x-breadcrumb-item title=" مسئولیت های کاربران" route="dashboard.admin.daily.{{explode_url(3)}}" />
    @endif
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

<<<<<<< HEAD
<div class="col-md-12">
    <x-card type="primary">
        <x-card-header> مشاهده گزارش ها</x-card-header>
        <x-card-body>


<div class ="row">
    <div class ="col-md-4 col-sm-6"  >

        @if((explode_url(3)=='alluser'))
        @include('dashboard.ui.select_box_redirect', [ 'allforeachs' => $users ,
        'input_name' => 'name'  ,  'name_select' => 'کاربر' ,
        'value' =>   $user_id   , 'index_id'=>'user_id' , 'search' => 'search_task'  ]) <hr>
         @endif

    </div>
    <div class ="col-md-8 col-sm-6"  >

    </div>
    </div>
    <div class ="row">
    <div class ="col-md-6 col-sm-12" style="margin:20px 0px;">
        <a href="{{ route('dashboard.admin.daily.'.explode_url(3) ,  [ 'all' , $user_id ]  ) }}" class="btn btn-primary" > همه مسئولیت ها </a>
        <a href="{{ route('dashboard.admin.daily.'.explode_url(3) ,  [ 'done', $user_id ] ) }}" class="btn btn-success" > مسئولیتهای انجام شده   </a>
        <a href="{{ route('dashboard.admin.daily.'.explode_url(3) ,  [ 'notwork', $user_id ] ) }}" class="btn btn-danger" > مسئولیتهای انجام نشده   </a>





    </div>
=======

<div class ="row">
    <div class ="col-md-6 col-sm-12" style="margin:20px 0px;">
        <a href="{{ route('dashboard.admin.daily.index') }}" class="btn btn-primary" > همه مسئولیت ها </a>
        <a href="{{ route('dashboard.admin.daily.'.explode_url(3) ,  [ 'done' ] ) }}" class="btn btn-success" > مسئولیتهای انجام شده   </a>
        <a href="{{ route('dashboard.admin.daily.'.explode_url(3) ,  [ 'notwork' ] ) }}" class="btn btn-danger" > مسئولیتهای انجام نشده   </a>
           </div>
>>>>>>> refs/remotes/origin/master
    <div class ="col-md-6 col-sm-12" style="margin:20px 0px;">
      {{-- <button type="button"  data-toggle="modal" style="float:left;" data-target="#modal-lg" style="font-size:13px;" class="btn btn-info float-right"><i class="fas fa-plus"></i>اضافه کردن کار</button> --}}

    </div>
</div>

<<<<<<< HEAD
</x-card-body>
</x-card>
</div>

=======
>>>>>>> refs/remotes/origin/master
@include('dashboard.card.task.index' , [ $users ])

@endsection
