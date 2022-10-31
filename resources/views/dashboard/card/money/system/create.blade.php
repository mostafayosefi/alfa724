
        <div class="col-md-12">

        <x-card type="{{ law_style($flag) }}">
          <x-card-header> ثبت {{  law_name($flag) }}  </x-card-header>



<form style="padding:10px;"
action="{{route('dashboard.admin.money.store',[ $flag ])}}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">



        <div class="row">
            <div class="col-md-6">
                @include('dashboard.ui.java-price')
                <div class="form-group">
                    <label for="durday">  مبلغ {{  law_name($flag) }} (به تومان)    </label>
                    <input type="text" class="form-control input_mystyle" id="price"  name="price"  onkeyup="separateNum(this.value,this);"    placeholder="   مبلغ {{  law_name($flag) }} (به تومان)     ">
                </div><hr>

                <div class="form-group">
                    <label for="name_send">  نام و نام خانوادگی واریزکننده {{  law_name($flag) }}     </label>
                    <input type="text" class="form-control input_mystyle"   name="name_send"  value="{{ old('name_send') }}"     >
                </div><hr>
                <div class="form-group">
                    <label for="name_recv">  نام و نام خانوادگی دریافت کننده {{  law_name($flag) }}     </label>
                    <input type="text" class="form-control input_mystyle"   name="name_recv"  value="{{ old('name_recv') }}"     >
                </div><hr>


    <hr>


    <div class="form-group">
        <label>تاریخ تراکنش:</label>
        <div class="input-group">
          <input id="date" name="date" type="text" class="form-control input_mystyle" data-inputmask-alias="datetime"
          data-inputmask-inputformat="yyyy-mm-dd" data-mask=""  value="{{ old('date', date_time('date')) }}"  >
        </div>
    </div><hr>


            </div>


            <div class="col-md-6">

                <div class="form-group">
                    <label for="for">  بابت       </label>
                    <input type="text" class="form-control input_mystyle"   name="for"  value="{{ old('for') }}"     >
                </div><hr>

                <div class="form-group">
                    <label for="intype">  نحوه تراکنش (نقدی ، شبا ، انتقالی یا .....)       </label>
                    <input type="text" class="form-control input_mystyle"   name="intype"  value="{{ old('intype') }}"     >
                </div><hr>


    @include('dashboard.ui.upload' , [  'type_file' => 'multi' ] )


            </div>
        </div>

        <input type="hidden" name="type" value="{{law_type($flag)}}" />
        <input type="hidden" name="status" value="active" />

        <div class="form-group">
            <label>توضیحات :</label>
            <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"
            class="form-control"   name="description"  placeholder="توضیحات "  id="summernote{{ $flag }}">{{ old('description') }}</textarea>
        </div>

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



          @csrf

          <button type="submit"  class="btn btn-{{ law_style($flag) }} ">ثبت {{  law_name($flag) }}</button>

       </x-card>

      </form>

    </div>
