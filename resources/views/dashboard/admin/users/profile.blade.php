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
    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
    </ul>
    </div>
    <div class="card-body">
    <div class="tab-content">
    <div class="tab-pane" id="edit">


        @include('dashboard.card.user.edit' , [  'route' => '#' ])


    </div>

    <div class="active tab-pane" id="task">
        <div class="row">
            <div class="col-md-12">
              <x-card type="primary">
                  <x-card-header>مدیریت مسئولیت ها</x-card-header>
                      <x-card-body>
                          <div class="box-body">
                              <table id="example1" class="table table-bordered table-hover">
                                  <thead>
                                  <tr>
                                      <th>ردیف</th>
                                      <th>عنوان</th>
                                      <th>تاریخ شروع</th>
                                      <th>تاریخ پایان</th>
                                       <th>ساعت شروع</th>
                                      <th>ساعت پایان</th>
                                      <th>وضعیت</th>
                                      <th>حذف</th>
                                      <th>ویرایش</th>
                                  </tr>
                                  </thead>
                                      <tbody>
                                   @foreach($task as $key => $item)
                                      <tr>
                                          <td>{{ $key + 1 }}</td>
                                          <td>{{ $item->title }}</td>
                                          <td>{{ $item->start_date->formatJalali() }}</td>
                                          <td>{{$item->finish_date->formatJalali()}}</td>
                                          @if($item->start_time != NULL && $item->finish_time != NULL)
                                          <td>{{$item->start_time->format('H:i')}}</td>
                                          <td>{{$item->finish_time->format('H:i')}}</td>
                                          @else
                                          <td>تعریف نشده</td>
                                          <td>تعریف نشده</td>
                                          @endif
                                          <td>{{ __('app.status.' . $item->status) }}</td>
                                          <td>
                                          <a href="#" class="delete_post" ><i class="fa fa-fw fa-eraser"  data-toggle="modal" data-target="#modal-success{{ $item->id }}"></i></a>
                                          </td>
                                          <td>
                                          <button type="button" data-toggle="modal" data-target="#modal-edit-task-{{ $item->id }}" style="padding: 0;color:#dc3545" class="btn edit_post"><i class="fas fa-edit"></i></button>
                                          </td>
                                      </tr>
                                                              <!-- SHOW SUCCESS modal -->
                             <div class="modal fade show" id="modal-success{{ $item->id }}" aria-modal="true" role="dialog">
                              <div class="modal-dialog modal-danger">
                                <div class="modal-content bg-danger">
                                  <div class="modal-header">
                                    <h4 class="modal-title">{{ $item->content }}</h4>
                                    <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                                      <span  aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      آیا می خواهید این  مورد حذف کنید ؟

                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light uncheckd" data-dismiss="modal">خیر</button>
                                     <form  action="#" method="post">
                                         <input type="hidden" name="id" value="{{ $item->id }}" >
                                        {{-- <a href="{{route('dashboard.admin.task.deletetask',['id'=>$item->id,'project_id'=>$item->for->id])}}" class="btn btn-outline-light">بله </a> --}}
                                     </form>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                                   @endforeach
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                          <th>ردیف</th>
                                          <th>عنوان</th>
                                          <th>تاریخ شروع</th>
                                          <th>تاریخ پایان</th>
                                          <th>ساعت شروع</th>
                                          <th>ساعت پایان</th>
                                          <th>وضعیت</th>
                                          <th>حذف</th>
                                          <th>ویرایش</th>
                                      </tr>
                                      </tfoot>
                              </table>
                          </div>
                          </x-card-body>
                      <x-card-footer>
                          <div class="row">
                              <div class="col-lg-12">
                                  <ul class="pagination">
                                      {{$task->links()}}
                                  </ul>
                              </div>
                          </div>
                      </x-card-footer>
              </x-card>
          </div>
        </div>
    </div>

    <div class="tab-pane" id="settings">
    <form class="form-horizontal">
    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
    <input type="email" class="form-control" id="inputName" placeholder="Name">
    </div>
    </div>
    <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
    <button type="submit" class="btn btn-danger">Submit</button>
    </div>
    </div>
    </form>
    </div>

    </div>

    </div>
    </div>

    </div>


























      </div>
    </div>
@endsection
