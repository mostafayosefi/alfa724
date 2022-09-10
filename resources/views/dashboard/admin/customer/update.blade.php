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
            <form style="padding:10px;" action="{{ route('dashboard.admin.customer.updatecustomer',['id'=>$post->id]) }}" id="form-customer" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
                 <div class="form-group">
                     <input type="hidden" value="{{$post->id}}" name="customer_id">
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
                 </div>
                {{ csrf_field() }}
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
  <form style="padding:10px;" action="{{ route('dashboard.admin.customer.updateservice',['id'=>$item->id]) }}" method="post" id="form-id{{ $item->id }}" role="form" class="form-horizontal " enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="{{$item->id}}" name="id">
      <input type="hidden" value="{{$item->customer_id}}" name="customer_id">
    <div class="input-group">
        <td>
          <input required name="name" value="{{$item->name}}" type="text" id="name" class="form-control datee" requierd placeholder="نام خدمات">
        </td>  
        <td>
          <input required name="count" value="{{$item->count}}" type="text" id="count" class="form-control datee" requierd placeholder="تعداد">
        </td>  
        <td>
           <input required name="price" value="{{$item->price}}" type="text" id="price" class="form-control datee" requierd placeholder="هزینه پروژه">
        </td>  
        <td>
          <input required name="time" value="{{$item->time}}" type="text" id="time" class="form-control datee" placeholder="مدت روزکاری">
        </td> 
        <td>
          <input required name="start_date" value="{{ $item->start_date }}" type="text" id="start_date" class="form-control datee"  placeholder="تاریخ شروع 1400/12/05">
        </td>
        <td>
          <input required name="end_date" value="{{$item->end_date }}" type="text" id="end_date" class="form-control datee"  placeholder="تاریخ پایان 1400/12/05">
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
          <input  name="final_date" value="{{$item->final_date}}" type="text" id="final_date" class="form-control datee"  placeholder="تاریخ تحویل">
        </td>  
        <td>
          <input  name="purchase_date" value="{{$item->purchase_date}}" type="text" id="purchase_date" class="form-control datee"  placeholder="تاریخ تسویه">
        </td>  
        <td>
          <x-select-group name="lead" id="lead"  required :model="$model ?? null">
              <option value="{{$item->lead}}">@isset($item->user->first_name ){{ $item->user->first_name }}  {{ $item->user->last_name}} @endisset</option>
                @foreach($users as $category)
                    <x-select-item value="{{ !empty($category->id) ? $category->id : (!empty($specification) ? $specification->key : '' )}}">{{ $category->first_name }} {{ $category->last_name }}</x-select-item>
                @endforeach
           </x-select-group>
        </td>
        <td>
          <input  name="salary" value="{{$item->salary}}" type="text" id="salary" class="form-control datee"  placeholder="دریافتی مسئول پروژه">
        </td>  
        <td>
        </td>

        </div>
    </div>
    <td></td>

</tr>

<tr>
     
        <div class="input-group">
        <td>
          <input  name="deposit" value="{{$item->deposit}}" type="text" id="deposit" class="form-control datee" requierd placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date" value="{{$item->deposit_date}}" type="text" id="deposit_date" class="form-control datee" requierd placeholder="تاریخ بیعانه">
        </td>  
        <td>
          <input  name="deposit2" value="{{$item->deposit2}}" type="text" id="deposit2" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date2" value="{{$item->deposit_date2}}" type="text" id="deposit_date2" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>   
        <td>
          <input  name="deposit3" value="{{$item->deposit3}}" type="text" id="deposit3" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date3" value="{{$item->deposit_date3}}" type="text" id="deposit_date3" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>  

        </div>

</tr>

<tr>
     
        <div class="input-group">
        <td>
          <input  name="deposit4" value="{{$item->deposit4}}" type="text" id="deposit4" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date4" value="{{$item->deposit_date4}}" type="text" id="deposit_date4" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>  
        <td>
          <input  name="deposit5" value="{{$item->deposit5}}" type="text" id="deposit5" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date5" value="{{$item->deposit_date5}}" type="text" id="deposit_date5" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td> 
        <td>
          <input  name="deposit6" value="{{$item->deposit6}}" type="text" id="deposit6" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date6" value="{{$item->deposit_date6}}" type="text" id="deposit_date6" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>  
        </div>

</tr>

<tr>
     
        <div class="input-group">

        <td>
          <input  name="deposit7" value="{{$item->deposit7}}" type="text" id="deposit7" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date7" value="{{$item->deposit_date7}}" type="text" id="deposit_date7" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>  
        <td>
          <input  name="deposit8" value="{{$item->deposit8}}" type="text" id="deposit8" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date8" value="{{$item->deposit_date8}}" type="text" id="deposit_date8" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>   
        <td>
          <input  name="deposit9" value="{{$item->deposit9}}" type="text" id="deposit9" class="form-control datee"  placeholder="بیعانه">
        </td>  
        <td>
          <input  name="deposit_date9" value="{{$item->deposit_date9}}" type="text" id="deposit_date9" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td> 
    </div>

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
                                     <a href="#"  onclick="document.getElementById('form-id{{ $item->id }}').submit();" class="btn btn-success" >ویرایش خدمت</a>
                               </div>
    </form>
                           </div>
                       </div>
                        <!-- /.card-body -->
                        </div>
                        </div>
                         <div style="margin-bottom: 50px; clear:both;"></div>
                        @endforeach
                <x-card-footer>
                    <a href="#"  onclick="document.getElementById('form-customer').submit();" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
                            class="btn btn-primary">ویرایش
                    </a>
                </x-card-footer>
                
            </form>
        </x-card>
    </div>

@endsection