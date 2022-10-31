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
    <x-breadcrumb-item title="مدیریت سرویس ها" route="dashboard.admin.service.manage" />
    {{-- <x-breadcrumb-item title="{{ $item->name }}" route="dashboard.admin.service.show" /> --}}
@endsection
@section('content')
    <div class="col-md-12">
        <x-card type="info">

            @include('dashboard.admin.customer.detial')

            {{-- @include('dashboard.admin.service.list-service') --}}

        </x-card>
    </div>


<<<<<<< HEAD
    @include('dashboard.card.service.edit')
=======
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>ویرایش خدمت {{ $item->name }}</x-card-header>

            <div class="row">
                <div class="col-md-6">


@if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif

                    <form style="padding:10px;" action="{{ route('dashboard.admin.service.update' , $item->id ) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
                        @csrf


@method('PUT')
                        <div class="form-group">
                            <label for="name">نام خدمت</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $item->name }}" placeholder="نام خدمت  ">
                            </div>


                            <div class="form-group">
                                <label>تاریخ شروع:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                  </div>
                                  <input id="date" name="startdate"  value="{{date_frmat_a($item->startdate)  }}"  type="text"
                                  class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="durday">  مدت زمان روزکاری</label>
                                <input type="text" class="form-control" name="durday" id="durday" value="{{ $item->durday }}" placeholder="مدت زمان روزکاری">
                                </div>

{{--

                            <div class="form-group">
                                <label>تاریخ پایان:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                  </div>
                                  <input id="date" name="enddate"  value="{{date_frmat_a($item->enddate)  }}"  type="text"
                                  class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                                </div>
                            </div> --}}



@include('dashboard.ui.java-price')


<div class="form-group">
    <label for="durday">  هزینه خدمت (به تومان)    </label>
    <input type="text" class="form-control" id="price"  name="price"   value="{{ number_format($item->price) }}"  onkeyup="separateNum(this.value,this);"  required placeholder=" هزینه پروژه (به تومان)        ">
    </div>




    @include('dashboard.ui.java-fetch-select')
    @include('dashboard.ui.selectbox', [ 'allforeachs' => $users ,
     'input_name' => 'name'  ,  'name_select' => '  کارمند ' ,
     'value' =>   $item->user_id , 'required'=>'required'  , 'index_id'=>'user_id'  , 'onchange'=>'close_select' ])




<div class="form-group">
    <label>تاریخ تسویه پروژه:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
      </div>
      <input id="date" name="purdate"  value="@if($item->purdate != null) {{date_frmat_a($item->purdate)}} @else  @endif  "  type="text"
      class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
    </div>
</div>


<div class="form-group">
    <label>تاریخ تحویل پروژه:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
      </div>
      <input id="date" name="recvdate"  value="@if($item->recvdate != null) {{date_frmat_a($item->recvdate)}} @else  @endif  "  type="text"
      class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
    </div>
</div>




<x-card-footer>
    <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
            class="btn btn-primary">ویرایش خدمت
    </button>
</x-card-footer>


                    </form>



                </div>
                <div class="col-md-6"></div>
             </div>
                    </x-card>
    </div>




>>>>>>> refs/remotes/origin/master


@endsection
