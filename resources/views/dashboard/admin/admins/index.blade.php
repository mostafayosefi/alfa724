@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مشاهده مدیران  " route="dashboard.admin.users.admins.index" />
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
            <x-card-header>  مشاهده مدیران</x-card-header>
            <x-card-body>
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام و نام خانوادگی </th>
                        <th>ایمیل</th>
                        <th>پروفایل</th>
                        <th>ویرایش</th>
                        <th>نقش</th>
                        <th>حذف</th>
                    </tr>
                    </thead>
                        <tbody>
                     @foreach($users as $key => $item)
                     <?php $ids=$item->id ; ?>
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @if($item->trashed())
                                    <p>کاربر حذف شده</p>
                                @else
                                    <a href="{{route('dashboard.admin.users.profile',['id'=>$item->id])}}" class="btn btn-block btn-outline-primary btn-sm">مشاهده پروفایل</a>
                                @endif
                            </td>
                            <td>
                                @if($item->trashed())
                                    <a href="{{route('dashboard.admin.users.restore',['id'=>$item->id])}}" class="edit_post"><i class="fas fa-undo"></i> بازگردانی</a>
                                @else
                                    <a href="{{route('dashboard.admin.users.updateuser',['id'=>$item->id])}}" class="edit_post" target="_blank"><i class="fas fa-edit"></i></a>
                                @endif
                            </td>

            <td>
                <a href="{{ route('dashboard.admin.notification.list.type', $item) }}">
                <span class="btn btn-success btn-sm">
                    <i class="fa fa-fw fa-edit"></i> مشاهده
                    </span>
                </a>
            </td>

                            <td>
                                    <a href="#" class="delete_post" ><i class="fa fa-fw fa-eraser"  data-toggle="modal" data-target="#modal-success{{ $item->id }}"></i></a>
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
                        <tfoot>
                        <tr>
                            <th>نام و نام خانوادگی </th>
                            <th>ایمیل</th>
                            <th>شماره تماس</th>
                            <th>پروفایل</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </tfoot>
                </table>
            </x-card-body>
        </x-card>
    </div>
    @endsection
