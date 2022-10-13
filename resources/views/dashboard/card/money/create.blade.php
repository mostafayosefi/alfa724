<div class="modal fade show" id="modal-lg-{{ $flag }}" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ثبت {{  law_name($flag) }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <x-card type="{{ law_style($flag) }}">
          <x-card-header> ثبت {{  law_name($flag) }}  </x-card-header>




<form style="padding:10px;"
@if(explode_url(2)=='service')
action="{{ route('dashboard.admin.service.price') }}"
@endif
@if(explode_url(2)=='project')
action="{{ route('dashboard.admin.project.price') }}"
@endif
method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

@if(explode_url(2)=='service')
<input type="hidden" name="my_service_id" value="{{ $item->id }}" />

@endif
@if(explode_url(2)=='project')
<input type="hidden" name="project_id" value="{{ $item->id }}" />
@endif

        <div class="row">
            <div class="col-md-6">
                @include('dashboard.ui.java-price')
                <div class="form-group">
                    <label for="durday">  مبلغ {{  law_name($flag) }} (به تومان)    </label>
                    <input type="text" class="form-control input_mystyle" id="price"  name="price"  onkeyup="separateNum(this.value,this);"  required placeholder="   مبلغ {{  law_name($flag) }} (به تومان)     ">
                </div><hr>

                <div class="form-group">
                    <label for="name_send">  نام و نام خانوادگی واریزکننده {{  law_name($flag) }}     </label>
                    <input type="text" class="form-control input_mystyle"   name="name_send"  value="{{ old('name_send') }}"     >
                </div><hr>
                <div class="form-group">
                    <label for="name_recv">  نام و نام خانوادگی دریافت کننده {{  law_name($flag) }}     </label>
                    <input type="text" class="form-control input_mystyle"   name="name_recv"  value="{{ old('name_recv') }}"     >
                </div><hr>

<div class="form-group">

    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="file" >
    <label class="custom-file-label  " for="customFile">آپلود مستندات پرداخت</label>
    </div>
    </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label>تاریخ تراکنش:</label>
                    <div class="input-group">
                      <input id="date" name="date" type="text" class="form-control input_mystyle" data-inputmask-alias="datetime"
                      data-inputmask-inputformat="yyyy-mm-dd" data-mask=""  value="{{ old('date') }}"  >
                    </div>
                </div><hr>

                <div class="form-group">
                    <label for="for">  بابت       </label>
                    <input type="text" class="form-control input_mystyle"   name="for"  value="{{ old('for') }}"     >
                </div><hr>

                <div class="form-group">
                    <label for="intype">  نحوه تراکنش (نقدی ، شبا ، انتقالی یا .....)       </label>
                    <input type="text" class="form-control input_mystyle"   name="intype"  value="{{ old('intype') }}"     >
                </div><hr>

            </div>
        </div>

        <input type="hidden" name="type" value="{{$flag}}" />
        <input type="hidden" name="status" value="active" />

        <div class="form-group">
            <label>توضیحات :</label>
            <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"
            class="form-control" required name="description"  placeholder="توضیحات "  id="summernote{{ $flag }}">{{ old('description') }}</textarea>
        </div>


        @section('myscript')

        <script src="{{ asset('assets/cdn/editor/summernote-bs4.min.js')}}"></script>

        <script>
        var textareas = document.getElementById("summernote{{$flag}}");
        $(function () {
          $('#summernote{{$flag}}').summernote()
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



          @csrf

          <x-card-footer>
           </x-card-footer>

       </x-card>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
        <button type="submit"  class="btn btn-{{ law_style($flag) }} ">ثبت {{  law_name($flag) }}</button>
      </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
