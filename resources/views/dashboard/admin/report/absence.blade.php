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
                        <table id="example3" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>کاربر</th>
                                <th>تاریخ</th>
                                <th>ساعت شروع</th>
                                <th>ساعت پایان</th>
                                <th>وضعیت</th>
                            </tr>
                            </thead>
                                <tbody>
                            @foreach($absence as $item)
                            <tr>
                                <td>{{ $item->for->first_name }} {{ $item->for->last_name }}</td>
                                <td>{!! Facades\Verta::instance($item->date)->formatDate() !!}</td>
                                <td>{{ $item->enter }}</td>
                                <td>{{ $item->exit }}</td>
                                @if($item->exit != NULL)
                                <td>{{ \Carbon\CarbonInterval::seconds((int)$item->hours)->cascade()->forHumans(['join' => true]) }}</td>
                                @else
                                <td>کاربر پایان کار نزده است</td>
                                @endif
                            </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                            <tr>
                                <th>کاربر</th>
                                <th>تاریخ</th>
                                <th>ساعت شروع</th>
                                <th>ساعت پایان</th>
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
                                {{$absence->links()}}
                            </ul>
                        </div>
                    </div>                
                </x-card-footer>      
        </x-card>
    </div>
    @endsection