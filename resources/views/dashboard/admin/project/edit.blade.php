@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مشاهده پروژه" route="dashboard.admin.project.manage" />
@endsection
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif




<div class="row">

    <div class="col-md-1">

    </div>
    <div class="col-md-10">

        <div class="col-md-12">
            <x-card type="primary">
                <x-card-header>  ویرایش اطلاعات پروژه "{{$project->title}}"   </x-card-header>
                <form style="padding:10px;" action="{{ route('dashboard.admin.project.update', $project->id) }}"  method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
@method('PUT')

        <div class="row">

            <div class="col-md-1">

            </div>
        <div class="col-md-5">


    @include('dashboard.ui.selectbox', [ 'allforeachs' => $customers ,
    'input_name' => 'name'  ,  'name_select' => 'مشتری' ,
    'value' =>   $project->customer_id , 'required'=>'required'  , 'index_id'=>'customer_id' ]) <hr>



    <div class="form-group">
        <label for="customer_provider"> مدت زمان حدودی پروژه</label>
        <input type="text" class="form-control input_mystyle"
             name="customer_provider"  value="{{$project->time}}"   placeholder="مدت زمان حدودی پروژه"  >
    </div><hr>


    <div class="form-group">
        <label>تاریخ شروع:</label>
        <div class="input-group">
          <input required id="date" name="start_date"  value="{{date_frmat_a($project->start_date)}}"   type="text" class="form-control input_mystyle" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
        </div>
    </div><hr>

    <div class="form-group">
        <label>تاریخ پایان:</label>
        <div class="input-group">
          <input required name="finish_date"  value="{{date_frmat_a($project->finish_date)}}"   type="text" id="date1" class="form-control input_mystyle" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
        </div>
    </div><hr>

    <div class="form-group">
        <label> زمان تحویل:</label>
        <div class="input-group">
          <input   name="giving_date" @if($project->giving_date)  value="{{date_frmat_a($project->giving_date)}}" @endif     type="text" id="date1" class="form-control input_mystyle" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
        </div>
    </div><hr>


    <div class="form-group">
        <label> زمان تسویه:</label>
        <div class="input-group">
          <input   name="zero_date"  @if($project->zero_date) value="{{date_frmat_a($project->zero_date)}}" @endif   type="text" id="date1" class="form-control input_mystyle" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
        </div>
    </div><hr>



        </div>

        <div class="col-md-5">

            <div class="form-group">
                <label for="title">       عنوان </label>
                <input type="text" class="form-control input_mystyle"
                     name="title"  value="{{$project->title}}"  placeholder="   عنوان "  >
            </div><hr>

            @include('dashboard.ui.java-price')
            <div class="form-group">
                <label for="durday">  هزینه پروژه (به تومان)    </label>
                <input type="text" class="form-control input_mystyle" id="price"  name="price"    value="{{ number_format($project->price) }}"
                onkeyup="separateNum(this.value,this);"  required placeholder=" هزینه پروژه (به تومان)        ">
                </div><hr>

            <div class="form-group">
                <label for="customer_job">موضوع کسب و کار</label>
                <input type="text" class="form-control input_mystyle"
                     name="customer_job"  value="{{$project->customer_job}}"  placeholder="موضوع کسب و کار"  >
            </div><hr>

            <div class="form-group">
                <label for="customer_provider"> معرف</label>
                <input type="text" class="form-control input_mystyle"
                     name="customer_provider"  value="{{$project->customer_provider}}"  placeholder="معرف"  >
            </div><hr>

            <div class="form-group">
                <label for="customer_service"> موضوع درخواست</label>
                <input type="text" class="form-control input_mystyle"
                     name="customer_service"  value="{{$project->customer_service}}"  placeholder="موضوع درخواست"  >
            </div><hr>


    <x-select-group required="" label="وضعیت" name="status" :model="$project">
        <x-select-item value="not_done">{{ __('app.status.not_done') }}</x-select-item>
        <x-select-item value="delayed">{{ __('app.status.delayed') }}</x-select-item>
        <x-select-item value="in_progress">{{ __('app.status.in_progress') }}</x-select-item>
        <x-select-item value="done">{{ __('app.status.done') }}</x-select-item>
        <x-select-item value="paid">{{ __('app.status.paid') }}</x-select-item>
    </x-select-group>




    <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_name" value="{{ $project->customer_name }}" placeholder="نام و نام خانوادگی مشتری">
    <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_phone" value="{{ $project->customer_phone }}" placeholder="تلفن مشتری">
    <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_mobile" value="{{ $project->customer_mobile }}" placeholder="موبایل مشتری">

    <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="employer" value="{{ $project->employer }}" placeholder="مسئول پروژه">


        </div>

        <div class="col-md-1">

        </div>
        </div>


        <div class="row">

            <div class="col-md-1">

            </div>
        <div class="col-md-10">



            <div class="col-md-12 col-sm-12">
                <label for="description"> توضیحات:</label>
                <textarea type="text"  rows="6" class="form-control input_mystyle"
                id="summernote"  required name="description">{{$project->description}}</textarea>
            </div>

        </div>
        <div class="col-md-1">

        </div>
        </div>


        @csrf

        <x-card-footer>
                        <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
                                class="btn btn-primary">  ویرایش اطلاعات پروژه
                        </button>
                    </x-card-footer>
                </form>
            </x-card>
        </div>
    </div>
    <div class="col-md-1">

    </div>
</div>

    @endsection
