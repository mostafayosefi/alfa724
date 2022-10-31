
        <div class="col-md-12">
            <x-card type="success">
                <x-card-header>ساخت پروژه جدید</x-card-header>
                <form style="padding:10px;" action="{{ route('dashboard.admin.project.store') }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">


        <div class="row">

            <div class="col-md-4">

                <div class="form-group">
                    <label for="title">عنوان</label>
                  <input type="text" class="form-control input_mystyle"
                     name="title" value="{{ old('title') }}" placeholder="عنوان"  >
                </div><hr>


@include('dashboard.ui.java-price')
<div class="form-group">
    <label for="durday">  مبلغ پروژه (به تومان)    </label>
    <input type="text" class="form-control input_mystyle" id="price"  name="price"    value="{{ number_format(old('price')) }}"
    onkeyup="separateNum(this.value,this);"    placeholder=" هزینه پروژه (به تومان)        ">
    </div><hr>

            </div>
        <div class="col-md-4">


            <div class="form-group">
                <label>تاریخ شروع:</label>
                <div class="input-group">
                  <input   id="date" name="start_date" value="{{ old('start_date', date_time('date')) }}"  type="text" class="form-control input_mystyle" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                </div>
            </div><hr>




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
                <div class="form-group">
                    <label for="time"> مدت زمان حدودی پروژه (به روز)</label>
                    <input type="text" class="form-control input_mystyle"
                         name="time"  value="{{ old('time') }}"   placeholder="مدت زمان حدودی پروژه"  >
                </div><hr>
            </div>


            <div  id="div2"    >
            <div class="form-group">
                <label>تاریخ پایان:</label>
                <div class="input-group">
                  <input   name="finish_date" value="{{ old('finish_date') }}"  type="text" id="date1" class="form-control input_mystyle" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                </div>
            </div><hr>
            </div>



        </div>

        <div class="col-md-4">


            <x-select-group required="" label="وضعیت" name="status">
                <x-select-item value="not_done">{{ __('app.status.not_done') }}</x-select-item>
                <x-select-item value="delayed">{{ __('app.status.delayed') }}</x-select-item>
                <x-select-item value="in_progress">{{ __('app.status.in_progress') }}</x-select-item>
                <x-select-item value="done">{{ __('app.status.done') }}</x-select-item>
                <x-select-item value="paid">{{ __('app.status.paid') }}</x-select-item>
            </x-select-group>

            @if($customer_id)
            <input type="hidden" name="customer_id" value="{{ $customer_id }}" />
            @else
            @include('dashboard.ui.java-fetch-select')
        @include('dashboard.ui.selectbox', [ 'allforeachs' => $customer ,
        'input_name' => 'name'  ,  'name_select' => 'مشتری' ,
        'value' =>   old('customer_id') , 'required'=>'required'  , 'index_id'=>'customer_id'  , 'onchange'=>'close_select' ]) <hr>

        @endif

        </div>
        </div>

            @csrf



            <div class="col-md-12 col-sm-12">
                <label for="description"> توضیحات:</label>
                <textarea type="text"  rows="6" class="form-control input_mystyle"
                  name="description" id="summernote" ></textarea>
            </div>

            <x-card-footer>
                            <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
                                    class="btn btn-success">  ایجاد پروژه
                            </button>
         </x-card-footer>

                    </form>
                </x-card>
            </div>

            @section('myscript')

            <script src="{{ asset('assets/cdn/editor/summernote-bs4.min.js')}}"></script>

            <script>
            var textareas = document.getElementById("summernote");
            $(function () {
              $('#summernote').summernote()
            for (var i = 0; i < textareas.length; i++) {
            CodeMirror.fromTextArea(textareas[i], {
            lineWrapping: true,
            mode: "htmlmixed",
            theme: "monokai"
            });
            }
              });
            </script>

            @endsection
