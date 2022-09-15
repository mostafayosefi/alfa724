<?php use Hekmatinasser\Verta\Verta; ?>
@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('styles')
    <style>
        .mdtimepicker {
            direction: ltr;
            text-align: left;
        }
        .item-lists{
            display:inline-flex;
        }
        @media only screen and (max-width:700px){
            .item-lists{
                display:block;
            }
        }
        .item-lists p{
            margin-left:70px;
        }
    </style>
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت مشتری ها" route="dashboard.admin.customer.manage" />
    <x-breadcrumb-item title="{{ $post->name }}" route="dashboard.admin.customer.show" />
@endsection
@section('content')
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>{{ $post->name }}</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <div class="item-lists">
                            <p>نام مشتری:{{ $post->name }} </p>
                            <p>کد مشتری:{{ $post->code }} </p>
                            <p>تلفن:{{ $post->tells }} </p>
                            <p>تلفن همراه مشتری:{{ $post->tell }} </p>
                            <p>شغل مشتری:{{ $post->tells}} </p>
                        </div>
                        <div class="item-lists">
                            <p>نام دامنه:{{ $post->domain}} </p>
                            <p>هاست:{{ $post->host}} </p>
                            <p>ایمیل مشتری:{{ $post->email}} </p>
                        </div>
                        <div style="margin-bottom: 50px; clear:both;"></div>
                        <div style="max-height:250px;overflow-y:scroll;">
                        {!! $post->description !!}
                        </div>
                        <div style="margin-bottom: 50px; clear:both;"></div>
                    @foreach($my_services as $item)
                       <div class="card">
                           <div class="card-header">
                             <h3 class="card-title">{{ $item->name }}</h3>
                           </div>
                       <div class="card-body">
                        <table id="" class="table table-bordered table-hover">
                            <thead>

                            </thead>
                                <tbody>

                                <tr>
                                    <td>نام:{{ $item->name }}</td>
                                    <td>تعداد:{{ $item->count }}</td>
                                    <td>مدت زمان:{{ $item->durday }}</td>
                                    @isset($item->user->first_name )
                                    <td>نام کارمند:{{ $item->user->first_name }}  {{ $item->user->last_name }}</td>
                                    @endisset
                                    <td>تاریخ شروع:{{ $item->startdate }}</td>
                                    <td>تاریخ پایان:{{ $item->enddate  }}</td>
                                    <td>تاریخ تسویه:{{ $item->purdate }}</td>
                                </tr>


                                @foreach ($item->price_my_services as  $my_price )

                                <tr>
                                    <td>بیعانه:{{ $my_price->date }}</td>
                                    <td>تاریخ بیعانه:{{ $my_price->price }}</td>
                                </tr>

                                @endforeach


                                </tbody>
                                <tfoot>

                                </tfoot>
                        </table>
                        <div style="max-height:250px;overflow-y:scroll;">
                            {!! $item->description !!}
                        </div>
                        <div class="card-footer">
                           <div class="row">
                               <div class="col-12 col-md-4 col-lg-3">
                                     <a href="#" class="delete_post" data-toggle="modal" data-target="#modal-success{{ $item->id }}"><i class="fa fa-fw fa-eraser"></i></a>
                                     <a href="{{route('dashboard.admin.service.updateservice',['id'=>$item->id])}}" class="btn btn-danger" >ویرایش خدمت</a>
                               </div>
                           </div>
                       </div>
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
                                              <a href="{{route('dashboard.admin.service.deleteservice',['id'=>$item->id])}}" class="btn btn-outline-light">بله </a>
                                           </form>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                        <!-- /.card-body -->
                        </div>
                        </div>
                         <div style="margin-bottom: 50px; clear:both;"></div>
                        @endforeach


                    </div>
                    </x-card-body>
            <x-card-footer>
            <a href="{{route('dashboard.admin.customer.updatecustomer',['id'=>$post->id])}}" class="btn btn-warning" >ویرایش مشتری</a>
            <a href="{{route('dashboard.admin.service.create',['id'=>$post->id])}}" class="btn btn-success" >ساخت خدمت جدید برای مشتری</a>
            </x-card-footer>
        </x-card>
    </div>

@endsection
