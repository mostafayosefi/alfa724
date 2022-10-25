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
<div class ="row">
    <div class ="col-md-6 col-sm-12" style="margin:20px 0px;">

    </div>
    <div class ="col-md-6 col-sm-12" style="margin:20px 0px;">
      <a href="{{route('dashboard.admin.customer.create')}}" style="float:left;" class="btn btn-success">ثبت مشتری جدید</a>
    </div>
</div>

    <div class="col-md-12">

        <x-card type="primary">

            <x-card-header>
                  مدیریت مشتری ها
            </x-card-header>

                <x-card-body>

                    <div class="box-body">
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th> ردیف</th>
                                <th>کد مشتری</th>
                                <th>نام و نام خانوادگی</th>
                                <th>موضوع کسب و کار</th>
                                <th>تلفن</th>
                                <th>همراه</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $key => $item)
                                <tr>
                                    <td>{{ $key + 1}}</td>
                                    <td>{{ $item->code}}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->job }}</td>
                                    <td>{{ $item->tells }}</td>
                                    <td>{{ $item->tell }}</td>
                                    <td style="width: 150px;">

                                <a href="{{route('dashboard.admin.customer.show',['id'=>$item->id])}}" title="مشاهده " class="btn btn-outline-primary btn-sm"><i class="fas fa-user-edit fa-1x"></i></a>

                                <a href="{{route('dashboard.admin.customer.updatecustomer',['id'=>$item->id])}}" title="ویرایش "   class="btn btn-outline-success btn-sm" target="_blank"><i class="fas fa-edit fa-1x"></i></a>

                               <a href="#"  class="btn btn-outline-danger btn-sm" title="حذف "  ><i class="fas fa-eraser"  data-toggle="modal" data-target="#modal-success{{ $item->id }}"></i></a>


                                     </td>
                                </tr>
                                <!-- SHOW SUCCESS modal -->
                                   <div class="modal fade show" id="modal-success{{ $item->id }}" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-danger">
                                      <div class="modal-content bg-danger">
                                        <div class="modal-header">
                                          <h4 class="modal-title">{{ $item->content }}</h4>
                                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                                            <span  aria-hidden="true">×</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            آیا می خواهید این  مورد حذف کنید ؟

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-outline-light uncheckd" data-dismiss="modal">خیر</button>
                                           <form  action="#" method="post">
                                               <input type="hidden" name="id" value="{{ $item->id }}" >
                                              <a href="{{route('dashboard.admin.customer.deletecustomer',['id'=>$item->id])}}" class="btn btn-outline-light">بله </a>
                                           </form>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                             @endforeach
                                </tbody>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                </x-card-footer>
        </x-card>
    </div>
    @endsection
