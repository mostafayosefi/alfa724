

        <div class="col-md-12">
            <x-card type="primary">
                <x-card-header>ویرایش خدمت {{ $item->name }}</x-card-header>


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



                        <div class="row">

                            <div class="col-md-4">

                                <input type="hidden" name="customer_id" value="{{ $item->customer_id }}" />

                                @include('dashboard.ui.java-fetch-select')
                                @include('dashboard.ui.selectbox', [ 'allforeachs' => $customers ,
                                'input_name' => 'name'  ,  'name_select' => '  مشتری ' ,
                                'value' =>   $item->customer_id , 'required'=>'required'  , 'index_id'=>'customer_id'  , 'onchange'=>'close_select'])
                                <hr>


                                                            <div class="form-group">
                                                                <label for="name">نام خدمت</label>
                                                                <input type="text" class="form-control input_mystyle" name="name"
                                                                id="name" value="{{ $item->name }}" placeholder="نام خدمت  ">
                                                            </div><hr>


@include('dashboard.ui.java-price')
<div class="form-group">
    <label for="durday">  هزینه خدمت (به تومان)    </label>
    <input type="text" class="form-control input_mystyle" id="price"  name="price"   value="{{ number_format($item->price) }}"  onkeyup="separateNum(this.value,this);"    placeholder=" هزینه پروژه (به تومان)        ">
    </div>
<hr>

                            </div>
                        <div class="col-md-4">



                                <div class="form-group">
                                    <label>تاریخ شروع:</label>
                                  <input id="date" name="startdate"  value="{{date_frmat_a($item->startdate)  }}"  type="text"
                                  class="form-control input_mystyle" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                                 </div>


                                 <input type="hidden" value="0" name="durday" />



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


<div class="form-group">
    <div class="custom-control custom-radio">
    <input class="custom-control-input" type="radio" id="customRadio1" name="dur_date"
     onclick="show2();" value="dur" @if($item->durday!='0')checked=""@endif  >
    <label for="customRadio1" class="custom-control-label">  تاریخ پایان براساس روزکاری    </label>
    </div>
    <br>
    <div class="custom-control custom-radio">
    <input class="custom-control-input" type="radio" id="customRadio2" name="dur_date"
     onclick="show1();" value="end"  @if($item->durday=='0')checked=""@endif >
    <label for="customRadio2" class="custom-control-label">    تاریخ پایان بصورت ثابت </label>
    </div>
</div>

<input type="hidden" value="{{ $item->durday }}" name="durday" />


            <div  id="div1" @if($item->durday=='0') style="display: none;" @endif >
                <hr>
                <div class="form-group">
                    <label for="durday">  مدت زمان روزکاری</label>
                    <input type="text" class="form-control input_mystyle" name="durday"
                    id="durday" value="{{ $item->durday }}" placeholder="مدت زمان روزکاری">
                </div><hr>

            </div>


            <div  id="div2" @if($item->durday!='0') style="display: none;" @endif    >
                <hr>
            <div class="form-group">
                <label>تاریخ پایان:</label>
                <div class="input-group">
                    <input id="date" name="enddate"  value="{{date_frmat_a($item->enddate)  }}"  type="text"
                    class="form-control input_mystyle" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                                </div>
            </div><hr>
            </div>





                        </div>


                        <div class="col-md-4">



                            <div class="form-group">
                                <label>تاریخ تسویه پروژه:</label>
                                <div class="input-group">
                                  <input id="date" name="purdate"  value="@if($item->purdate != null) {{date_frmat_a($item->purdate)}} @else  @endif  "  type="text"
                                  class="form-control input_mystyle" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                                </div>
                            </div>


                            <div class="form-group">
                                <label>تاریخ تحویل پروژه:</label>
                                <div class="input-group">
                                  <input id="date" name="recvdate"  value="@if($item->recvdate != null) {{date_frmat_a($item->recvdate)}} @else  @endif  "  type="text"
                                  class="form-control input_mystyle" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                                </div>
                            </div>

                            @include('dashboard.ui.java-fetch-select')
                            @include('dashboard.ui.selectbox', [ 'allforeachs' => $users ,
                             'input_name' => 'name'  ,  'name_select' => '  کارمند ' ,
                             'value' =>   $item->user_id , 'required'=>'required'  , 'index_id'=>'user_id'  , 'onchange'=>'close_select' ])
                                 <hr>
                                 <button type="submit"
                                         class="btn btn-primary" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;">ویرایش خدمت
                                 </button>
                        </div>

                        </div>







                    </form>


                </x-card>
            </div>













































