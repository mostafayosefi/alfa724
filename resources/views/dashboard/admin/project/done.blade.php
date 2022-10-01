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
            <div class ="col-md-6 col-sm-12" style="margin:20px 0px;">
              <a href="{{route('dashboard.admin.project.manage')}}" class="btn btn-warning">پروژه های درحال انجام</a>
              <a href="{{route('dashboard.admin.project.done')}}" class="btn btn-secondary">پروژه های انجام شده</a>
              <a href="{{route('dashboard.admin.project.paid')}}" class="btn btn-success">پروژه های تسویه شده</a>
            </div>
        </div>
        <x-card type="info">
            <x-card-header>مدیریت پروژه ها</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th>نمایش پروژه</th>
                                <th>ویرایش</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{!! $item->start_date->formatJalali() !!}</td>
                                    <td>{!! $item->finish_date->formatJalali() !!}</td>
                                    <td><a href="{{route('dashboard.admin.project.index',['id'=>$item->id])}}" class="btn btn-block bg-gradient-primary btn-sm">نمایش پروژه</a></td>
                                    <td>
                                    <a href="{{route('dashboard.admin.project.index',['id'=>$item->id])}}" class="edit_post" target="_blank"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>عنوان</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th>نمایش پروژه</th>
                                    <th>ویرایش</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                    <a href="{{route('dashboard.admin.project.create')}}" class="btn btn-success">ثبت پروژه جدید</a>
                </x-card-footer>
        </x-card>
    </div>
    @endsection
