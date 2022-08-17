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
    <x-breadcrumb-item title="{{ $post->name }}" route="dashboard.admin.service.updateservice" />
@endsection
@section('content')
    <div class="col-md-12">
      <x-card type="info">
        <x-card-header>{{ $post->name }}</x-card-header>
         <x-card-body>
        <div class="box-body">
<tr style="margin-top:50px;">
<div style="margin-top:50px"></div>
  <form style="padding:10px;" action="{{ route('dashboard.admin.service.updateservice',['id'=>$post->id]) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
      <input type="hidden" value="{{$post->id}}" name="id">
      <input type="hidden" value="{{$post->customer_id}}" name="customer_id">
      <div class="form-group">
        <div class="input-group">
        <td>
          <input required name="name" value="{{$post->name}}" type="text" id="name" class="form-control datee" requierd placeholder="نام خدمات">
        </td>  
        <td>
          <input required name="count" value="{{$post->count}}" type="text" id="count" class="form-control datee" requierd placeholder="تعداد">
        </td>  
        <td>
           <input required name="price" value="{{$post->price}}" type="text" id="price" class="form-control datee" requierd placeholder="هزینه پروژه">
        </td>  
        <td>
          <input required name="time" value="{{$post->time}}" type="text" id="time" class="form-control datee" placeholder="مدت روزکاری">
        </td> 
        <td>
          <input required name="start_date" value="{{ $post->start_date }}" type="text" id="start_date" class="form-control datee"  placeholder="تاریخ شروع 1400/12/05">
        </td>
        <td>
          <input required name="end_date" value="{{$post->end_date }}" type="text" id="end_date" class="form-control datee"  placeholder="تاریخ پایان 1400/12/05">
        </td>
          <?php $number=!empty($specification) ? $idx : 'IDX' ;  ?>
        </div>
    </div>
</tr>

<tr>
       <style>
                label:not(.form-check-label):not(.custom-file-label):not(.custom-control-label) {
                    font-weight: 700;
                    display: none !important;
                }
                label{
                    display:none !important;
                }
                </style>
      <div class="form-group">
        <div class="input-group">
        <td>
          <input  name="final_date" value="{{$post->final_date}}" type="text" id="final_date" class="form-control datee"  placeholder="تاریخ تحویل">
        </td>  
        <td>
          <input  name="purchase_date" value="{{$post->purchase_date}}" type="text" id="purchase_date" class="form-control datee"  placeholder="تاریخ تسویه">
        </td>  
        <td>
          <x-select-group name="lead" id="lead"  required :model="$model ?? null">
              <option value="{{$post->lead}}">{{ $post->user->first_name }}  {{ $post->user->last_name}}</option>
                @foreach($users as $category)
                    <x-select-item value="{{ !empty($category->id) ? $category->id : (!empty($specification) ? $specification->key : '' )}}">{{ $category->first_name }} {{ $category->last_name }}</x-select-item>
                @endforeach
           </x-select-group>
        </td>
        <td>
          <input  name="salary" value="{{$post->salary}}" type="text" id="salary" class="form-control datee"  placeholder="دریافتی مسئول پروژه">
        </td>  
        <td>
        </td>

        </div>
    </div>
    <td></td>

</tr>

<tr>
     
      <div class="form-group">
        <div class="input-group">
        <td>
          <input  name="deposit" value="{{$post->deposit}}" type="text" id="deposit" class="form-control datee" requierd placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date" value="{{$post->deposit_date}}" type="text" id="deposit_date" class="form-control datee" requierd placeholder="تاریخ بیعانه">
        </td>  
        <td>
          <input  name="deposit2" value="{{$post->deposit2}}" type="text" id="deposit2" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date2" value="{{$post->deposit_date2}}" type="text" id="deposit_date2" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>   
        <td>
          <input  name="deposit3" value="{{$post->deposit3}}" type="text" id="deposit3" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date3" value="{{$post->deposit_date3}}" type="text" id="deposit_date3" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>  

        </div>
    </div>

</tr>

<tr>
     
      <div class="form-group">
        <div class="input-group">
        <td>
          <input  name="deposit4" value="{{$post->deposit4}}" type="text" id="deposit4" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date4" value="{{$post->deposit_date4}}" type="text" id="deposit_date4" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>  
        <td>
          <input  name="deposit5" value="{{$post->deposit5}}" type="text" id="deposit5" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date5" value="{{$post->deposit_date5}}" type="text" id="deposit_date5" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td> 
        <td>
          <input  name="deposit6" value="{{$post->deposit6}}" type="text" id="deposit6" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date6" value="{{$post->deposit_date6}}" type="text" id="deposit_date6" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>  
        </div>
    </div>

</tr>

<tr>
     
      <div class="form-group">
        <div class="input-group">

        <td>
          <input  name="deposit7" value="{{$post->deposit7}}" type="text" id="deposit7" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date7" value="{{$post->deposit_date7}}" type="text" id="deposit_date7" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>  
        <td>
          <input  name="deposit8" value="{{$post->deposit8}}" type="text" id="deposit8" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date8" value="{{$post->deposit_date8}}" type="text" id="deposit_date8" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>   
        <td>
          <input  name="deposit9" value="{{$post->deposit9}}" type="text" id="deposit9" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date9" value="{{$post->deposit_date9}}" type="text" id="deposit_date9" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td> 
        </div>
    </div>

</tr>
    </div>
    </x-card-body>
     {{ csrf_field() }}
    <x-card-footer>
        <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"class="btn btn-primary">ارسال</button>
    </x-card-footer>
 </x-card>
</div>
@endsection