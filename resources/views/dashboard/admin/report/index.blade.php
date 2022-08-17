@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="گزارشگیری ماهانه" route="dashboard.admin.report.index" />
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
            <x-card-header>مدیریت گزارش ها</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>نام کاربر</th>
                                <th>مشاهده گزارش</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($users as $item)
                                <tr>
                                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                    <td>
                                        <a href="{{route('dashboard.admin.report.show',['id'=>$item->id])}}" class="btn btn-block bg-gradient-primary btn-sm">گزارش برنامه کاری</a> 
                                        <a href="{{route('dashboard.admin.report.absence',['id'=>$item->id])}}" class="btn btn-block bg-gradient-warning btn-sm">گزارش حضورغیاب</a>
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                <th>نام کاربر</th>
                                <th>مشاهده گزارش</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                </x-card-footer>      
        </x-card>
    </div>
    @endsection