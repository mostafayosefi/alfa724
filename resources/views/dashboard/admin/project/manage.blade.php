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
            <div class ="col-md-6 col-sm-12" style="margin:20px 0px;">
              <a href="{{route('dashboard.admin.project.create')}}" style="float:left;" class="btn btn-success">ثبت پروژه جدید</a>
            </div>
        </div>
        <x-card type="info">
            <x-card-header>
                مدیریت پروژه ها
                </x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <th>مسئول پروژه</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th>نمایش پروژه</th>
                                {{-- <th>تاریخ ایجاد  </th> --}}
                                <th>حذف</th>
                                <th>ویرایش</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $key => $item)
                                <tr>

                                    <td>{{$key+1}}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->customer_name }}</td>
                                    <td>{{ date_frmat_a($item->start_date) }}</td>
                                    <td>{{ date_frmat_a($item->finish_date) }}</td>
                                    <td><a href="{{route('dashboard.admin.project.index',['id'=>$item->id])}}" class="btn btn-block bg-gradient-primary btn-sm">نمایش پروژه</a></td>
                                    {{-- <td>{{ date_frmat($item->created_at) }}</td> --}}
                                    <td>
                                     @include('dashboard.ui.modal_delete', [$item ,'route' => route('dashboard.admin.project.destroy', $item) , 'myname' => 'پروژه '.$item->title ])
                                    </td>
                                    <td>
                                    <a href="{{route('dashboard.admin.project.edit',['id'=>$item->id])}}" class="edit_post" ><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <!-- SHOW SUCCESS modal -->
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان</th>
                                    <th>مسئول پروژه</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th>نمایش پروژه</th>
                                    <th>حذف</th>
                                    <th>ویرایش</th>
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
