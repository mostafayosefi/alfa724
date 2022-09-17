@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('styles')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت سرویس ها" route="dashboard.admin.service.manage" />
    {{-- <x-breadcrumb-item title="{{ $item->name }}" route="dashboard.admin.service.show" /> --}}
@endsection
@section('content')


<div class="col-md-12">

    <x-card type="info">

        <x-card-header>
              مدیریت متن های پیش فرض
        </x-card-header>

            <x-card-body>

                <div class="box-body">
                    @if($notification_types)

                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>اطلاع رسانی</th>
                            <th>  مشاهده </th>
                        </tr>
                        </thead>
                            <tbody>
                                @foreach($notification_types as $key => $admin)
                                <tr>

            <td>{{ $key + 1 }}</td>
            <td>
            {{$admin->name}}
             </td>

            <td>
                <a href="{{ route('dashboard.admin.notification.list.type', $admin) }}">
                <span class="btn btn-success btn-sm">
                    <i class="fa fa-fw fa-edit"></i> مشاهده
                    </span>
                </a>
            </td>

                            </tr>

                         @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ردیف</th>
                                <th>اطلاع رسانی</th>
                                <th>  مشاهده </th>
                            </tr>
                            </tfoot>
                    </table>
                    @endif
                </div>
                </x-card-body>
            <x-card-footer>
            </x-card-footer>
    </x-card>
</div>



@endsection
