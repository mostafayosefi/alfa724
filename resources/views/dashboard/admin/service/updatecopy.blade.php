<?php use Hekmatinasser\Verta\Verta; ?>
@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت مشتری ها" route="dashboard.admin.customer.manage" />
    <x-breadcrumb-item title="{{ $my_service->name }}" route="dashboard.admin.service.updateservice" />
@endsection
@section('content')



    <div class="col-md-12">
      <x-card type="info">
        <x-card-header>{{ $my_service->name }}</x-card-header>
         <x-card-body>

        <div class="box-body">
<tr style="margin-top:50px;">
<div style="margin-top:50px"></div>
  <form style="padding:10px;" action="{{ route('dashboard.admin.service.updateservice',['id'=>$my_service->id]) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
      <input type="hidden" value="{{$my_service->id}}" name="id">
      <input type="hidden" value="{{$my_service->customer_id}}" name="customer_id">
      <div class="form-group">
        <div class="input-group">
        <td>
          <input required name="name" value="{{$my_service->name}}" type="text" id="name" class="form-control datee" requierd placeholder="نام خدمات">
        </td>
        <td>
          <input required name="count" value="{{$my_service->count}}" type="text" id="count" class="form-control datee" requierd placeholder="تعداد">
        </td>
        <td>
           <input required name="price" value="{{$my_service->price}}" type="text" id="price" class="form-control datee" requierd placeholder="هزینه پروژه">
        </td>
        <td>
          <input required name="time" value="{{$my_service->time}}" type="text" id="time" class="form-control datee" placeholder="مدت روزکاری">
        </td>
        <td>
          <input required name="start_date" value="{{ $my_service->startdate }}" type="text" id="start_date" class="form-control datee"  placeholder="تاریخ شروع 1400/12/05">
        </td>
        <td>
          <input required name="end_date" value="{{$my_service->enddate }}" type="text" id="end_date" class="form-control datee"  placeholder="تاریخ پایان 1400/12/05">
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
          <input  name="final_date" value="{{$my_service->recvdate}}" type="text" id="final_date" class="form-control datee"  placeholder="تاریخ تحویل">
        </td>
        <td>
          <input  name="purchase_date" value="{{$my_service->purdate}}" type="text" id="purchase_date" class="form-control datee"  placeholder="تاریخ تسویه">
        </td>
        <td>
          <x-select-group name="lead" id="lead"  required :model="$model ?? null">
              <option value="{{$my_service->user_id}}">{{ $my_service->user->first_name }}  {{ $my_service->user->last_name}}</option>
                @foreach($users as $category)
                    <x-select-item value="{{ !empty($category->id) ? $category->id : (!empty($specification) ? $specification->key : '' )}}">{{ $category->first_name }} {{ $category->last_name }}</x-select-item>
                @endforeach
           </x-select-group>
        </td>
        <td>
          <input  name="salary" value="{{$my_service->salary}}" type="text" id="salary" class="form-control datee"  placeholder="دریافتی مسئول پروژه">
        </td>
        <td>
        </td>

        </div>
    </div>
    <td></td>

</tr>

@foreach ($my_service->price_my_services as  $my_price )

<tr>

    <div class="form-group">
      <div class="input-group">
      <td>
        <input  name="deposit" value="{{$my_price->price}}" type="text" id="deposit" class="form-control datee" requierd placeholder="بیعانه">
      </td>
      <td>
        <input  name="deposit_date" value="{{$my_price->date}}" type="text" id="deposit_date" class="form-control datee" requierd placeholder="تاریخ بیعانه">
      </td>

      </div>
  </div>

</tr>
@endforeach

    </div>
    </x-card-body>
     {{ csrf_field() }}
    <x-card-footer>
        <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"class="btn btn-primary">ارسال</button>
    </x-card-footer>
 </x-card>
</div>
@endsection
