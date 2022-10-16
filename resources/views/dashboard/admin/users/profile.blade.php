@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('title', __('پروفایل'))
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="پروفایل" route="dashboard.admin.users.profile" />
@endsection
@section('content')
@include('dashboard.admin.task.updatetask', ['id' => $post->id, 'phase' => $phase, 'users' => $users, 'posts' => $task])
<?php
$tasks=0;
$income=0;
foreach ($employee as $item) {
  $income=$item->cost+$income;
}
foreach ($task as $item) {
  if($item->status=='done')
     $tasks++;
}
?>
<style>
    .z-0 {display:none;}
    .text-sm{margin-top:20px; }
    #example1_paginate {display:none }
    #example1_info {display:none }
</style>
    <div class="container">
      <div class="row">

        @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif


    @if(($post->scorecomemt) && ($counttask != 0))
        <div class="col-md-12">
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> اخطار !</h5>

        {!! $post->scorecomemt !!}
        </div>
        </div>


        <div class="col-lg-12 col-12">
            @include('dashboard.card.dashboard.box' , [  'box_bg' => 'warning' , 'box_header' => ' اخطار! '
             , 'box_titr' => $post->scorecomemt   , 'box_icon' => 'icon fas fa-exclamation-triangle' , 'box_route' => '' ,
             'box_more' => 'مشاهده و بررسی مسئولیتهای عقب افتاده'.' '.$post->name , 'box_more_icon' => 'fa fa-arrow-circle-left' ])
        </div>
        @endif


        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{ !empty($post->picture) ? $post->picture : asset('assets/images/user.png') }}" alt="{{ $post->first_name }}">
                </div>

                <h3 class="profile-username text-center">{{ $post->first_name }} {{ $post->last_name }}</h3>

                <p class="text-muted text-center">{{ $post->situation }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>مسئولیت های انجام شده</b> <a class="float-right"><?php echo $tasks ;  ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>امتیاز</b> <a class="float-right" style="direction: ltr;" >{{ $post->score }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>تاریخ تولد</b> <a class="float-right">{{ $post->birthdate }}</a>
                  </li>
                </ul>
                <a href="{{route('dashboard.admin.message.create',['user_id'=>$post->id])}}" class="btn btn-warning btn-block"><b>ارسال پیام</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>





<div class="col-md-9">

    <div class="row">
        <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $income; ?><sup style="position: relative;font-size: 15px;top: 1px;right: 6px;">هزارتومان</sup></h3>

                <p>درآمد </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-danger" style="background: #358e82 !important">
              <div class="inner">
                <h3><?php echo $tasks; ?></h3>

                <p>مسئولیت های انجام شده</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          </div>




    <div class="card">
    <div class="card-header p-2">
    <ul class="nav nav-pills">
    <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab">ویرایش اطلاعات شخصی</a></li>
    <li class="nav-item"><a class="nav-link active" href="#task" data-toggle="tab">مسئولیت ها</a></li>
     </ul>
    </div>
    <div class="card-body">
    <div class="tab-content">
    <div class="tab-pane" id="edit">


        @include('dashboard.card.user.edit' , [  'route' => '#' ])


    </div>

    <div class="active tab-pane" id="task">
        <div class="row">


<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

@include('dashboard.card.task.edit', [ 'route' =>  route('dashboard.admin.daily.editdaily')  ] )
@include('dashboard.card.task.index')









        </div>
    </div>



    </div>

    </div>
    </div>

    </div>


























      </div>
    </div>
@endsection
