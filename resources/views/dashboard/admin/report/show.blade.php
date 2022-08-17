@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="گزارش گیری ماهانه" route="dashboard.admin.report.index" />
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
                                <th>عنوان</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th>وضعیت</th>
                            </tr>
                            </thead>
                                <tbody>
                            @foreach($task as $item)
                                <tr style="background-color: @if($item->status == 'notwork' && $item->finish_date->lt(now()->startOfDay())) #f4b9b9 @elseif($item->status == 'done') #a9ecb0 @else #fff @endif">
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->start_date->formatJalali() }}</td>
                                    <td>{{$item->finish_date->formatJalali()}}</td>
                                    <td>{{ __('app.status.' . $item->status) }}</td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                <th>عنوان</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th>وضعیت</th>
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
    @endsection