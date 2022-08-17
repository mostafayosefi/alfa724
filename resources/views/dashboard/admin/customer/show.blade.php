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
        .item-lists p{
            margin-left:70px;
        }
    </style>
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت مشتری ها" route="dashboard.admin.customer.manage" />
    <x-breadcrumb-item title="{{ $post->customer_name }}" route="dashboard.admin.customer.show" />
@endsection
@section('content')
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>{{ $post->customer_name }}</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <div class="item-lists">
                            <p>نام مشتری:{{ $post->customer_name }} </p>
                            <p>کد مشتری:{{ $post->customer_code }} </p>
                            <p>تلفن:{{ $post->customer_phone }} </p>
                            <p>تلفن همراه مشتری:{{ $post->customer_mobile }} </p>
                            <p>شغل مشتری:{{ $post->customer_job}} </p>
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
                    @foreach($service as $item)
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
                                    <td>مدت زمان:{{ $item->time }}</td>
                                    <td>نام کارمند:{{ $item->user->first_name }}  {{ $item->user->last_name }}</td>
                                    <td>تاریخ شروع:{{ $item->start_date->formatJalali() }}</td>
                                    <td>تاریخ پایان:{{ $item->end_date->formatJalali() }}</td>
                                    <td>تاریخ تسویه:{{ $item->final_date }}</td>
                                    <td>قیمت :{{ $item->price }}</td>
                                </tr>
                                <tr>
                                    <td>بیعانه:{{ $item->deposit }}</td>
                                    <td>تاریخ بیعانه:{{ $item->deposit_date }}</td>
                                    <td>بیعانه:{{ $item->deposit2 }}</td>
                                    <td>تاریخ بیعانه:{{ $item->deposit_date2 }}</td>
                                    <td>بیعانه:{{ $item->deposit3 }}</td>
                                    <td>تاریخ بیعانه:{{ $item->deposit_date3 }}</td>
                                    <td>بیعانه:{{ $item->deposit4 }}</td>
                                    <td>تاریخ بیعانه:{{ $item->deposit_date4 }}</td>
                                </tr>
                                <tr>
                                    <td>بیعانه:{{ $item->deposit5 }}</td>
                                    <td>تاریخ بیعانه:{{ $item->deposit_date5 }}</td>
                                    <td>بیعانه:{{ $item->deposit6 }}</td>
                                    <td>تاریخ بیعانه:{{ $item->deposit_date6 }}</td>
                                    <td>بیعانه:{{ $item->deposit7 }}</td>
                                    <td>تاریخ بیعانه:{{ $item->deposit_date7 }}</td>
                                    <td>بیعانه:{{ $item->deposit8 }}</td>
                                    <td>تاریخ بیعانه:{{ $item->deposit_date8 }}</td>
                                </tr>
                                <tr>
                                    <td>بیعانه:{{ $item->deposit9 }}</td>
                                    <td>تاریخ بیعانه:{{ $item->deposit_date9 }}</td>
                                </tr>
                            
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
                                     <a href="{{route('dashboard.admin.service.deleteservice',['id'=>$item->id])}}" class="delete_post" ><i class="fa fa-fw fa-eraser"></i></a>
                                     <a href="{{route('dashboard.admin.service.updateservice',['id'=>$item->id])}}" class="btn btn-danger" >ویرایش خدمت</a>
                               </div>
                           </div>
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