<?php use Hekmatinasser\Verta\Verta; ?>
@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت خدمات ها" route="dashboard.admin.service.manage" />
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
        <div class ="col-md-6 col-sm-12" style="margin:20px 0px;">
        </div>

<div class ="col-md-6 col-sm-12" style="margin:20px 0px;">
    <a href="{{route('dashboard.admin.service.create')}}" style="float:left;" class="btn btn-primary">ثبت خدمت جدید</a>
  </div>
  </div>
  </div>

    <div class="col-md-12">
        <x-card type="primary">
            <x-card-header>مدیریت خدمت ها</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام خدمت</th>
                                <th> مسئول</th>
                                 <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($myservices as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                     <td>{{ $item->user->first_name }}  {{ $item->user->last_name }}</td>
                                    <td>{{ date_frmat_a($item->startdate) }}</td>
                                    <td>{{ date_frmat_a($item->enddate) }}</td>
                                    <td>


                                        <a href="{{route('dashboard.admin.service.show',['id'=>$item->id])}}" title="مشاهده " class="btn btn-outline-primary btn-sm"><i class="fas fa-user-edit fa-1x"></i></a>


                                       <a href="{{route('dashboard.admin.service.deleteservice',['id'=>$item->id])}}"  class="btn btn-outline-danger btn-sm" title="حذف "  ><i class="fas fa-eraser"  ></i></a>

                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                    جهت ساخت خدمات جدید از صفحه مشتریان اقدام کنید
                </x-card-footer>
        </x-card>
    </div>
    @endsection
