@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index"/>
    <x-breadcrumb-item title="ویرایش مشتری" route="dashboard.admin.customer.updatecustomer"/>
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
            <x-card-header>ویرایش مشتری</x-card-header>
            <form style="padding:10px;" action="{{ route('dashboard.admin.customer.updatecustomer',['id'=>$post->id]) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
                 <div class="form-group">
                     <input type="hidden" value="{{$post->id}}" name="id">
                     <div class="row">
                         <div class="col-md-1 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_code" value="{{$post->customer_code}}"  placeholder="کد مشتری">
                         </div>
                         
                         <div class="col-md-3 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_name" value="{{$post->customer_name}}"  placeholder="نام و نام خانوادگی مشتری">
                         </div> 
                         
                         <div class="col-md-2 col-sm-12">
                             <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_phone" value="{{$post->customer_phone}}"  placeholder="تلفن مشتری">
                         </div>
                         
                        <div class="col-md-2 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_mobile" value="{{$post->customer_mobile}}"  placeholder="موبایل مشتری">
                         </div>
                         <div class="col-md-2 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_job" value="{{$post->customer_job}}"  placeholder="موضوع کسب و کار">
                         </div>     
                         <div class="col-md-2 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="customer_provider" value="{{$post->customer_provider}}"  placeholder=" معرف">
                         </div>
                        <div class="col-md-4 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="domain" value="{{$post->domain}}"   placeholder="آدرس سایت">
                         </div>
                         
                         <div class="col-md-4 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="host" value="{{$post->host}}"   placeholder="هاست">
                         </div> 
                         
                         <div class="col-md-4 col-sm-12">
                             <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="email" value="{{$post->email}}"   placeholder="ایمیل">
                         </div>
                        <div class="col-md-12 col-sm-12">
                             <label for="description"> توضیحات:</label>
                             <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"class="form-control" required name="description">{{$post->description}}</textarea>
                         </div>
                     </div>
                 </div>
                {{ csrf_field() }}
                <x-card-footer>
                    <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
                            class="btn btn-primary">ویرایش
                    </button>
                </x-card-footer>
            </form>
        </x-card>
    </div>

@endsection