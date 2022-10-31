

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

                            <div class="col-md-4">

                                @if($customer_id)
                                <input type="hidden" name="customer_id" value="{{ $customer_id }}" />
                                @else
                                @include('dashboard.ui.java-fetch-select')
                                @include('dashboard.ui.selectbox', [ 'allforeachs' => $customer ,
                                'input_name' => 'name'  ,  'name_select' => '  مشتری ' ,
                                'value' =>   old('customer_id') , 'required'=>'required'  , 'index_id'=>'customer_id'  , 'onchange'=>'close_select'])
                                <hr>

<<<<<<< HEAD

                                @endif
=======
@if($customer_id)
<input type="hidden" name="customer_id" value="{{ $customer_id }}" />
@else
@include('dashboard.ui.java-fetch-select')
@include('dashboard.ui.selectbox', [ 'allforeachs' => $customer ,
'input_name' => 'name'  ,  'name_select' => '  مشتری ' ,
'value' =>   old('customer_id') , 'required'=>'required'  , 'index_id'=>'customer_id'  , 'onchange'=>'close_select'])
<hr>
>>>>>>> refs/remotes/origin/master

                                                            <div class="form-group">
                                                                <label for="name">نام خدمت</label>
                                                                <input type="text" class="form-control input_mystyle" name="name"
                                                                 id="name" placeholder="نام خدمت  "  value="{{ old('name') }}" >
                                                            </div><hr>

                            </div>
                        <div class="col-md-4">



                                <div class="form-group">
                                    <label>تاریخ شروع:</label>
                                      <input id="date" name="startdate" value="{{ old('startdate') }}" type="text"
                                      class="form-control input_mystyle" data-inputmask-alias="datetime"
                                       data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                                 </div>


                                 <input type="hidden" value="0" name="durday" />



<<<<<<< HEAD
<style>
    *:not(.far):not(.fa):not(.fas) {
    font-family: iransans !important;
    font-size: 14px;
    font-weight: 700;
}
</style>

<script>
    function show1(){
  document.getElementById('div1').style.display ='none';
  document.getElementById('div2').style.display ='block';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
  document.getElementById('div2').style.display ='none';
}
</script>

=======
@include('dashboard.ui.java-price')
<div class="form-group">
    <label for="durday">  هزینه خدمت (به تومان)    </label>
    <input type="text" class="form-control input_mystyle" id="price"  name="price"  onkeyup="separateNum(this.value,this);"  required placeholder=" هزینه پروژه (به تومان)        ">
</div><hr>
@include('dashboard.ui.java-fetch-select')
    @include('dashboard.ui.selectbox', [ 'allforeachs' => $users ,
     'input_name' => 'name'  ,  'name_select' => '  کارمند ' ,
     'value' =>   old('user_id') , 'required'=>'required'  , 'index_id'=>'user_id'  , 'onchange'=>'close_select' ])
     <hr>
>>>>>>> refs/remotes/origin/master

<div class="form-group">
    <div class="custom-control custom-radio">
    <input class="custom-control-input" type="radio" id="customRadio1" name="dur_date"
     onclick="show2();" value="dur" >
    <label for="customRadio1" class="custom-control-label">  تاریخ پایان براساس روزکاری    </label>
    </div>
    <br>
    <div class="custom-control custom-radio">
    <input class="custom-control-input" type="radio" id="customRadio2" name="dur_date"
     onclick="show1();" value="end"  checked="">
    <label for="customRadio2" class="custom-control-label">    تاریخ پایان بصورت ثابت </label>
    </div>
</div>



            <div  id="div1"  style="display: none;" >
                <hr>
                <div class="form-group">
                    <label for="durday">  مدت زمان روزکاری</label>
                    <input type="text" class="form-control input_mystyle" name="durday"
                    id="durday" placeholder="مدت زمان روزکاری"  value="{{ old('durday') }}">
                </div><hr>

            </div>


            <div  id="div2"    >
                <hr>
            <div class="form-group">
                <label>تاریخ پایان:</label>
                <div class="input-group">
                  <input   name="enddate" value="{{ old('enddate') }}"  type="text" id="date1" class="form-control input_mystyle" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                </div>
            </div><hr>
            </div>






                        </div>


                        <div class="col-md-4">
                            @include('dashboard.ui.java-price')
                            <div class="form-group">
                                <label for="price">  هزینه خدمت (به تومان)    </label>
                                <input type="text" class="form-control input_mystyle" id="price"  name="price" value="{{ old('price')  }}"
                                 onkeyup="separateNum(this.value,this);"    placeholder=" هزینه پروژه (به تومان)        ">
                            </div><hr>
                            @include('dashboard.ui.java-fetch-select')
                                @include('dashboard.ui.selectbox', [ 'allforeachs' => $users ,
                                 'input_name' => 'name'  ,  'name_select' => '  کارمند ' ,
                                 'value' =>   old('user_id') , 'required'=>'required'  , 'index_id'=>'user_id'  , 'onchange'=>'close_select' ])
                                 <hr>

                                 <hr>
                                 <button type="submit"
                                         class="btn btn-primary" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;">ثبت خدمت جدید
                                 </button>
                        </div>

                        </div>







                    </form>


                </x-card>
            </div>

