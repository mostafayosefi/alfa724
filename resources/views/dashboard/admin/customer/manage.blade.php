@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت مشتری ها" route="dashboard.admin.customer.manage" />
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

            <x-card-header> 
                  مدیریت مشتری ها
            </x-card-header>
            
                <x-card-body>
                    <div class="box-body">
                        <a href="{{route('dashboard.admin.customer.create')}}" style="float: left;margin-bottom: 15px;" class="btn btn-success">ثبت مشتری جدید</a> 
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>کد مشتری</th>
                                <th>نام و نام خانوادگی</th>
                                <th>موضوع کسب و کار</th>
                                <th>تلفن</th>
                                <th>همراه</th>
                                <th>نمایش</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $item)
                                <tr>
                                    <td>{{ $item->customer_code}}</td>
                                    <td>{{ $item->customer_name }}</td>
                                    <td>{{ $item->customer_job }}</td>
                                    <td>{{ $item->customer_phone }}</td>
                                    <td>{{ $item->customer_mobile }}</td>
                                    <td>
                                    <a href="{{route('dashboard.admin.customer.show',['id'=>$item->id])}}" class="btn btn-primary" >نمایش</a>
                                    </td>
                                    <td>
                                    <a href="{{route('dashboard.admin.customer.updatecustomer',['id'=>$item->id])}}" class="btn btn-warning" >ویرایش</a>
                                    </td>
                                    <td>
                                    <a href="{{route('dashboard.admin.customer.deletecustomer',['id'=>$item->id])}}" class="delete_post" ><i class="fa fa-fw fa-eraser"></i></a>
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                <th>کد مشتری</th>
                                <th>نام و نام خانوادگی</th>
                                <th>موضوع کسب و کار</th>
                                <th>تلفن</th>
                                <th>همراه</th>
                                <th>نمایش</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
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
