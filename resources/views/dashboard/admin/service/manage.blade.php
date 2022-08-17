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
        <x-card type="info">
            <x-card-header>مدیریت خدمت ها</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>اسم</th>
                                <th>تعداد</th>
                                <th>نام مسئول</th>
                                <th>تاریخ پایان</th>
                                <th>تاریخ شروع</th>
                                <th>مشاهده</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->count }}</td>
                                    <td>{{ $item->user->first_name }}  {{ $item->user->last_name }}</td>
                                    <td>{{ $item->start_date->formatJalali() }}</td>
                                    <td>{{ $item->end_date->formatJalali() }}</td>
                                    <td><a href="{{route('dashboard.admin.service.index',['id'=>$item->id])}}" class="btn btn-primary">مشاهده</a></td>
                                    <td>
                                    <a href="{{route('dashboard.admin.service.deleteservice',['id'=>$item->id])}}" class="delete_post" ><i class="fa fa-fw fa-eraser"></i></a>
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                <th>اسم</th>
                                <th>تعداد</th>
                                <th>نام مسئول</th>
                                <th>تاریخ پایان</th>
                                <th>تاریخ شروع</th>
                                <th>مشاهده</th>
                                <th>حذف</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                    جهت ساخت خدمات جدید از صفحه مشتریان اقدام کنید
                </x-card-footer>
        </x-card>
    </div>
    @endsection
