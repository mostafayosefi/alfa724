@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.employee.notification')
    @include('dashboard.employee.sidebar')
@endsection
@section('title', __('مدیریت مالی'))
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.employee.index" />
    <x-breadcrumb-item title="مدیریت مالی" route="dashboard.employee.money.index" />
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


<?php
$tasks=0;
$income=0;
foreach ($employee as $key) {
    $income += empty($key->salary) ? 0 : $key->salary->amount;
}
foreach ($task as $item) {
  if($item->status=='done')
     $tasks++;
}
?>

@if ($task)
@foreach ($task as $item)
@include('dashboard.employee.task.edit', [ 'route' =>  route('dashboard.employee.task.edittask', $item->id)  ] )
@endforeach
@endif
    <div class="container">
      <div class="row">

          <div class="col-md-12">
              <div class="row">
                <div class="col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3><?php echo $income; ?><sup style="font-size: 20px">هزارتومان</sup></h3>

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
                  <div class="col-md-12">


                    <x-card type="info">
                        <x-card-header>پروژه ها</x-card-header>
                            <x-card-body>
                                <div class="box-body">
                                    <table id="example3" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>نام پروژه</th>
                                            <th>تاریخ شروع</th>
                                            <th>تاریخ پایان</th>
                                            <th>درآمد</th>
                                        </tr>
                                        </thead>
                                            <tbody>
                                         @foreach($employee as $item)
                                            <tr>
                                                <td>{{ $item->project->title }}</td>
                                                <td>{!! $item->project->start_date->formatJalali() !!}</td>
                                                <td>{!! $item->project->finish_date->formatJalali() !!}</td>
                                                <td>{{empty($item->salary) ? 'نامعلوم' : $item->salary->amount . ' تومان'}}</td>
                                            </tr>
                                         @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>نام پروژه</th>
                                                <th>تاریخ شروع</th>
                                                <th>تاریخ پایان</th>
                                                <th>درآمد</th>
                                            </tr>
                                            </tfoot>
                                    </table>
                                </div>
                                </x-card-body>
                            <x-card-footer>
                            </x-card-footer>
                    </x-card>


                    <div style="margin-top:50px;"></div>



@include('dashboard.card.task.index' , [ 'guard' => 'employee'  ])


                </div>
              </div>
          </div>
      </div>
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
