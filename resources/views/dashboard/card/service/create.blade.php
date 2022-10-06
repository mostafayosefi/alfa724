

        <div class="col-md-12">
            <x-card type="primary">
                <x-card-header>ساخت خدمت جدید</x-card-header>


@if(Session::has('info'))
<div class="row">
    <div class="col-md-12">
        <p class="alert alert-info">{{ Session::get('info') }}</p>
    </div>
</div>
@endif


                    <form style="padding:10px;" action="{{ route('dashboard.admin.service.store')}}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
                        @csrf




                        <div class="row">

                            <div class="col-md-1">

                            </div>
                        <div class="col-md-5">


@if($customer_id)
<input type="hidden" name="customer_id" value="{{ $customer_id }}" />
@else

@include('dashboard.ui.selectbox', [ 'allforeachs' => $customer ,
'input_name' => 'name'  ,  'name_select' => '  مشتری ' ,
'value' =>   old('customer_id') , 'required'=>'required'  , 'index_id'=>'customer_id' ])
<hr>


@endif

                            <div class="form-group">
                                <label for="name">نام خدمت</label>
                                <input type="text" class="form-control input_mystyle" name="name"
                                 id="name" placeholder="نام خدمت  "  value="{{ old('name') }}" >
                            </div><hr>


                                <div class="form-group">
                                    <label>تاریخ شروع:</label>
                                      <input id="date" name="startdate" value="{{ old('startdate') }}" type="text"
                                      class="form-control input_mystyle" data-inputmask-alias="datetime"
                                       data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                                 </div><hr>

                                <div class="form-group">
                                    <label for="durday">  مدت زمان روزکاری</label>
                                    <input type="text" class="form-control input_mystyle" name="durday"
                                    id="durday" placeholder="مدت زمان روزکاری">
                                </div><hr>


                        </div>

<div class="col-md-5">

@include('dashboard.ui.java-price')


<div class="form-group">
    <label for="durday">  هزینه پروژه (به تومان)    </label>
    <input type="text" class="form-control input_mystyle" id="price"  name="price"  onkeyup="separateNum(this.value,this);"  required placeholder=" هزینه پروژه (به تومان)        ">
</div><hr>

    @include('dashboard.ui.selectbox', [ 'allforeachs' => $users ,
     'input_name' => 'name'  ,  'name_select' => '  کارمند ' ,
     'value' =>   old('user_id') , 'required'=>'required'  , 'index_id'=>'user_id' ])
     <hr>

</div>
                        <div class="col-md-1">

                        </div>
                        </div>





<x-card-footer>
    <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
            class="btn btn-primary">ثبت خدمت جدید
    </button>
</x-card-footer>


                    </form>


                </x-card>
            </div>

