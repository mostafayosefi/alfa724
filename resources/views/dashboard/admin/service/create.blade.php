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
    <x-breadcrumb-item title="ساخت سرویس جدید برای مشتری" route="dashboard.admin.service.create" />
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
            <x-card-header>ساخت خدمت جدید</x-card-header>
            @include('dashboard.admin.customer.detial')
        </x-card>
    </div>


    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>ساخت خدمت جدید</x-card-header>

            <div class="row">
                <div class="col-md-6">

                    <form style="padding:10px;" action="#" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label for="name">نام خدمت</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="نام خدمت  ">
                            </div>


                            <div class="form-group">
                                <label>تاریخ شروع:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                  </div>
                                  <input id="date" name="startdate" value="{{ old('startdate') }}" type="text"
                                  class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="durday">  مدت زمان روزکاری</label>
                                <input type="text" class="form-control" name="durday" id="durday" placeholder="مدت زمان روزکاری">
                                </div>


                            <div class="form-group ">
                                <label for="user_id">انتخاب کارمند</label>
                                <select id="user_id" name="user_id" class="form-control" required>
                                    <option value=""> لطفا انتخاب نمایید </option>
                                    @foreach ($users as $user )
                                    <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                    @endforeach
                                </select>
                                </div>

@include('dashboard.ui.java-price')


<div class="form-group">
    <label for="durday">  هزینه پروژه (به تومان)    </label>
    <input type="text" class="form-control" id="price"  name="price"  onkeyup="separateNum(this.value,this);"  required placeholder=" هزینه پروژه (به تومان)        ">
    </div>



{{-- 
    $data = $request->all();
    $data['rateusd'] = str_rep_price($data['rateusd']); --}}


    @include('dashboard.ui.selectbox', [ 'allforeachs' => $users ,
     'input_name' => 'name'  ,  'name_select' => '  کارمند ' ,
     'value' =>   old('user_id') , 'required'=>'required'  , 'index_id'=>'user_id' ])




                    </form>



                </div>
                <div class="col-md-6"></div>
             </div>
                    </x-card>
    </div>





@endsection
