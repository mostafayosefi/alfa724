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
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>ویرایش پروژه ها</x-card-header>
        <form style="padding:10px;" action="{{ route('dashboard.admin.project.update', $project->id) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
            <input type="hidden" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"  name="id" value="{{ $project->id }}" >
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required  name="title" value="{{ $project->title }}" placeholder="عنوان">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_name" value="{{ $project->customer_name }}" placeholder="نام و نام خانوادگی مشتری">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_phone" value="{{ $project->customer_phone }}" placeholder="تلفن مشتری">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_mobile" value="{{ $project->customer_mobile }}" placeholder="موبایل مشتری">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_job" value="{{ $project->customer_job }}" placeholder="موضوع کسب و کار">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_provider" value="{{ $project->customer_provider }}" placeholder="کد معرف">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_service" value="{{ $project->customer_service }}" placeholder="موضوع درخواست">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="price" value="{{ number_format($project->price) }}" placeholder="قیمت">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="counter" value="{{ $project->counter }}" placeholder="تعداد">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="time" value="{{ $project->time }}" placeholder="مدت زمان حدودی پروژه">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="employer" value="{{ $project->employer }}" placeholder="مسئول پروژه">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="employer_money" value="{{ number_format($project->employer_money) }}" placeholder="هزینه پروژه">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="giving_date" value="{{ $project->giving_date }}" placeholder="زمان تحویل">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="zero_date" value="{{ $project->zero_date }}" placeholder="زمان تسویه">
            <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"class="form-control" value="" name="description"  placeholder="توضیحات">{{ $project->description }}</textarea>
            <div class="form-group">
                <label>تاریخ شروع:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input required name="start_date" type="text" id="date" value="{{date_frmat_a($project->start_date)  }} " class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                </div>
                <!-- /.input group -->
            </div>

            <div class="form-group">
                <label>تاریخ پایان:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input required name="finish_date" value="{{date_frmat_a($project->finish_date)  }} " type="text" id="date1" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                </div>
                <!-- /.input group -->
            </div>

            <x-select-group required="" label="وضعیت" name="status" :model="$project">
                <x-select-item value="not_done">{{ __('app.status.not_done') }}</x-select-item>
                <x-select-item value="delayed">{{ __('app.status.delayed') }}</x-select-item>
                <x-select-item value="in_progress">{{ __('app.status.in_progress') }}</x-select-item>
                <x-select-item value="done">{{ __('app.status.done') }}</x-select-item>
                <x-select-item value="paid">{{ __('app.status.paid') }}</x-select-item>
            </x-select-group>
@csrf
@method('PUT')
            <x-card-footer>
                <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"  class="btn btn-primary">ارسال</button>
             </x-card-footer>
            </form>
    </x-card>
    </div>
    @endsection
