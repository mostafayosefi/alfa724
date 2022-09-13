@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('title', __('داشبورد'))
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
@endsection
@section('content')
<?php
$projects=0;
$employees=0;
$price=0;
$deposits=0;
foreach ($posts as $key) {
    $projects++;
}
foreach ($users as $key) {
    $employees++;
}
foreach ($service as $key) {
    $price=$key->price+$price;
    $deposits = $key->deposit+$key->deposit2+$key->deposit3+$key->deposit4+$key->deposit5+$key->deposit6+$key->deposit7+$key->deposit8+$key->deposit9+$deposits;
}
?>
<style>
 .alert-primary {
    color: #ffffff;
    background: #718ba7;
    border-color: #8c9aa9;
  }
</style>
    <div class="container">
        <div class="row">

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{number_format(price_finical(auth()->user()->id,'depo','null','null'))}}<sup style="font-size: 14px; top:1px;">تومان</sup></h3>

              <p>بیعانه های دریافتی</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">اطلاعات بیشتر<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{number_format(price_finical(auth()->user()->id,'income','null','null'))}}<sup style="font-size: 14px; top:1px;">تومان</sup></h3>

              <p>درآمد کل پروژه ها</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">اطلاعات بیشتر<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $employees ; ?></h3>

              <p>همکاران جدید</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('dashboard.admin.users.employee')}}" class="small-box-footer">اطلاعات بیشتر<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger" style="background: #358e82 !important">
            <div class="inner">
              <h3><?php echo $projects ; ?></h3>

              <p>پروژه های انجام شده</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('dashboard.admin.project.manage')}}" class="small-box-footer">اطلاعات بیشتر<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        @if(!empty($finishing_projects) || !empty($finishing_phases) || !empty($overdue_projects))
            <div class="col-12">
                @foreach($finishing_projects as $project)
                    <div class="alert alert-primary no-dismiss">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        پروژه {{ $project->title }} در تاریخ {{ $project->finish_date->formatJalali() }} به پایان
                        خواهد رسید!
                    </div>
                @endforeach
                @foreach($finishing_phases as $phase)
                    <div class="alert alert-primary no-dismiss">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        فاز {{ $phase->title }} از پروژه {{ $phase->for->title }} در
                        تاریخ {{ $phase->finish_date->formatJalali() }} به پایان خواهد رسید!
                    </div>
                @endforeach
                @foreach($overdue_projects as $project)
                    <div class="alert alert-primary no-dismiss">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        مهلت پروژه {{ $project->title }} در {{ $project->finish_date->formatJalali() }} به پایان
                        رسیده‌است اما هنوز به اتمام نرسیده!
                    </div>
                @endforeach
            </div>
        @endif
      </div>
    </div>
@endsection
