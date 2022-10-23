<div class="modal fade show" id="modal-lg" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">اضافه کردن برنامه کاری جدید</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <x-card type="primary">
          <x-card-header>ساخت برنامه کاری جدید</x-card-header>
      <form style="padding:10px;" action="{{ $route }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

           <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"
           class="form-control" required  name="title"  placeholder="عنوان" value="{{ old('title') }}" >
            <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"
            class="form-control" required name="description"  placeholder="توضیحات مسئولیت"  id="summernote_create_task">{{ old('description') }}</textarea>




  <script>
    var textareas = document.getElementById("summernote_create_task");
    $(function () {
      $('#summernote_create_task').summernote()
for (var i = 0; i < textareas.length; i++) {
  CodeMirror.fromTextArea(textareas[i], {
    lineWrapping: true,
    mode: "htmlmixed",
    theme: "monokai"
  });
}
      });
</script>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>تاریخ شروع:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input id="date" name="start_date" type="text" class="form-control" data-inputmask-alias="datetime" required
                  data-inputmask-inputformat="yyyy-mm-dd" data-mask=""  value="{{ old('start_date' , date_time('date')) }}"  >
                </div>
                <!-- /.input group -->
            </div>
        </div>
        <div class="col-md-6">

          <div class="form-group">
            <label>تاریخ پایان:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input name="finish_date" type="text" id="date1" class="form-control" data-inputmask-alias="datetime" required
              data-inputmask-inputformat="yyyy-mm-dd" data-mask=""  value="{{ old('finish_date', date_time('date')) }}"  >
            </div>
            <!-- /.input group -->
        </div>
        </div>
    </div>



    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label>ساعت شروع کار:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input name="start_time" type="text"  value="{{ old('start_time' , date_time('time')) }}" required  class="form-control mdtimepicker-input">
                </div>
                <!-- /.input group -->
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label>ساعت پایان کار:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input name="finish_time" type="text"  value="{{ old('finish_time',date_time('finish_time')) }}" required  class="form-control mdtimepicker-input">
                </div>
                <!-- /.input group -->
            </div>
        </div>
    </div>



          <input type="hidden" style="margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"  name="status" value="notwork" >

          {{-- <input  type="hidden" value="" name="ignore_conflict"  > --}}

          {{-- <div class="form-group">
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" name="ignore_conflict" id="ignore_conflict">
                  <label class="form-check-label" for="ignore_conflict">
                      صرف‌نظر کردن از تداخل زمانی
                  </label>
              </div>
          </div> --}}
          <x-select-group label="نوع زمان‌بندی" name="continuity">
              <x-select-item value="1d">پیش‌فرض</x-select-item>
              <x-select-item value="1d">نمایش در هر روز</x-select-item>
              <x-select-item value="2d">نمایش یک روز در میان</x-select-item>
          </x-select-group>


          <hr>

          @if((explode_url(1)=='employee'))
          <input type="hidden" name="employee_id" value="{{ Auth::user()->id }}" >
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >

          @endif



          @if((explode_url(1)=='admin'))
          @include('dashboard.ui.java-fetch-select')
          @include('dashboard.ui.selectbox', [ 'allforeachs' => $users ,
          'input_name' => 'name'  ,  'name_select' => 'کاربر' ,
          'value' =>   auth()->user()->id , 'required'=>'required'  ,
           'index_id'=>'user_id'  , 'onchange'=>'close_select']) <hr>
           @endif

          @if((explode_url(2)=='project'))
          <input type="hidden" name="project_id" value="{{$id}}" >
           @endif



          @csrf

          <x-card-footer>
           </x-card-footer>

       </x-card>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
        <button type="submit"  class="btn btn-primary toastrDefaultInfo">اضافه کردن  برنامه کاری</button>
      </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
