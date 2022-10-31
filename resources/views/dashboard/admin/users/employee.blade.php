@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت کارمند ها" route="dashboard.admin.users.employee" />
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
        <x-card type="primary">
            <x-card-header>مدیریت کارمندان</x-card-header>
            <x-card-body>
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام و نام خانوادگی </th>
                        <th>ایمیل</th>
                        <th>شماره تماس</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                        <tbody>
                     @foreach($users as $key => $item)
                     <?php $ids=$item->id ; ?>
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><a href="{{route('dashboard.admin.users.show',['id'=>$item->id])}}">{{ $item->first_name }} {{ $item->last_name }}</a></td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->mobile }}</td>

                            <td>
                                <a href="{{route('dashboard.admin.users.show',['id'=>$item->id])}}" title="مشاهده پروفایل" class="btn btn-outline-primary btn-sm"><i class="fas fa-user-edit fa-1x"></i></a>

                                {{-- <a href="{{route('dashboard.admin.users.updateuser',['id'=>$item->id])}}" title="ویرایش پروفایل"   class="btn btn-outline-success btn-sm" target="_blank"><i class="fas fa-edit fa-1x"></i></a> --}}

                               <a href="#"  class="btn btn-outline-danger btn-sm" title="حذف پروفایل"  ><i class="fas fa-eraser"  data-toggle="modal" data-target="#modal-success{{ $item->id }}"></i></a>
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
                                              <a href="{{route('dashboard.admin.users.deleteuser',['id'=>$item->id])}}" class="btn btn-outline-light">بله </a>
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
            </x-card-body>
        </x-card>
    </div>
    @endsection
