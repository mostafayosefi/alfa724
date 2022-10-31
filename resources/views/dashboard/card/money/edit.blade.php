
<<<<<<< HEAD
                                 @foreach ($items as   $my_price )
=======
                                 @foreach ($items as $key =>  $my_price )
>>>>>>> refs/remotes/origin/master

                                 @php $flag=$my_price->type; @endphp
<div class="modal fade show" id="modal-lg-edit-money{{ $flag }}{{ $my_price->id }}" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ویرایش {{  law_name($flag) }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <x-card type="{{ law_style($flag) }}">
<<<<<<< HEAD
          <x-card-header> ویرایش {{  law_name($flag) }}   </x-card-header>
=======
          <x-card-header> ویرایش {{  law_name($flag) }}  </x-card-header>
>>>>>>> refs/remotes/origin/master



<form style="padding:10px;"
@if(explode_url(2)=='service')
<<<<<<< HEAD
action="{{ route('dashboard.admin.service.price.update') }}"
@endif
@if(explode_url(2)=='project')
action="{{ route('dashboard.admin.project.price.update') }}"
@endif
@if(explode_url(3)=='index_system')
action="{{ route('dashboard.admin.money.price.update') }}"
@endif
method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

@method('PUT')

@if(explode_url(2)=='service')
<input type="hidden" name="my_service_id" value="{{ $my_price->my_service_id }}" />
@php
if($flag=='depo'){ $list_files = show_detial_model('price_my_service_depo',$my_price->my_service_id); }
if($flag=='cost'){ $list_files = show_detial_model('price_my_service_cost',$my_price->my_service_id); }
@endphp
@endif

@if((explode_url(2)=='project')||(explode_url(3)=='index_project'))
<input type="hidden" name="project_id" value="{{$my_price->project_id}}" />
@php
if($flag=='depo'){ $list_files = show_detial_model('price_my_project_depo',$my_price->project_id); }
if($flag=='cost'){ $list_files = show_detial_model('price_my_project_cost',$my_price->project_id); }
@endphp
@endif


@if(explode_url(3)=='index_system')
@php
if($flag=='depo'){ $list_files = show_detial_model('price_system_depo',1); }
if($flag=='cost'){ $list_files = show_detial_model('price_system_cost',1); }
@endphp
@endif




<input type="hidden" name="my_price_id" value="{{ $my_price->id }}" />
=======
action="{{ route('dashboard.admin.service.price') }}"
@endif
@if(explode_url(2)=='project')
action="{{ route('dashboard.admin.project.price') }}"
@endif
method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

@if(explode_url(2)=='service')
<input type="hidden" name="my_service_id" value="{{ $my_price->id }}" />

@endif
@if(explode_url(2)=='project')
<input type="hidden" name="project_id" value="{{ $my_price->id }}" />
@endif



@php

$myprice = $my_price->price;
if(explode_url(2)=='project'){
$sumdepo = sum_price_depocost($my_price,'depo','project');
$sumcost = sum_price_depocost($my_price,'cost','project');
}
if(explode_url(2)=='service'){

$sumdepo = sum_price_depocost($my_price,'depo','service');
$sumcost = sum_price_depocost($my_price,'cost','service');
}

    $kolli = $my_price->price - $sumdepo;

@endphp
<input type="hidden" name="kolli" value="{{ $kolli }}" />
<input type="hidden" name="sumdepo" value="{{ $sumdepo }}" />
<input type="hidden" name="sumcost" value="{{ $sumcost }}" />
>>>>>>> refs/remotes/origin/master

        <div class="row">
            <div class="col-md-6">
                @include('dashboard.ui.java-price')
                <div class="form-group">
                    <label for="durday">  مبلغ {{  law_name($flag) }} (به تومان)    </label>
                    <input type="text" class="form-control input_mystyle" id="price"  name="price"  onkeyup="separateNum(this.value,this);" value="{{ number_format($my_price->price) }}" required placeholder="   مبلغ {{  law_name($flag) }} (به تومان)      ">
                </div><hr>

                <div class="form-group">
<<<<<<< HEAD
                    <label for="name_send">  نام و نام خانوادگی واریزکننده      </label>
                    <input type="text" class="form-control input_mystyle"   name="name_send"  value="{{$my_price->name_send}}"     >
                </div><hr>
                <div class="form-group">
                    <label for="name_recv">  نام و نام خانوادگی دریافت کننده      </label>
                    <input type="text" class="form-control input_mystyle"   name="name_recv"  value="{{$my_price->name_recv}}"     >
                </div><hr>




<hr>

<div class="form-group">
    <label>تاریخ تراکنش:</label>
    <div class="input-group">
      <input id="date" name="date" type="text" class="form-control input_mystyle" data-inputmask-alias="datetime"
      data-inputmask-inputformat="yyyy-mm-dd" data-mask=""  value="{{$my_price->date }}"  >
    </div>
</div><hr>
=======
                    <label for="name_send">  نام و نام خانوادگی واریزکننده {{  law_name($flag) }}     </label>
                    <input type="text" class="form-control input_mystyle"   name="name_send"  value="{{$my_price->name_send}}"     >
                </div><hr>
                <div class="form-group">
                    <label for="name_recv">  نام و نام خانوادگی دریافت کننده {{  law_name($flag) }}     </label>
                    <input type="text" class="form-control input_mystyle"   name="name_recv"  value="{{$my_price->name_recv}}"     >
                </div><hr>

<div class="form-group">

    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="file" >
    <label class="custom-file-label  " for="customFile">آپلود مستندات پرداخت</label>
    </div>
    </div>

    <a target="_blank" href="{{ asset($my_price->file)}}">مشاهده فایل</a>
    <hr>

>>>>>>> refs/remotes/origin/master




            </div>


            <div class="col-md-6">
<<<<<<< HEAD
=======
                <div class="form-group">
                    <label>تاریخ تراکنش:</label>
                    <div class="input-group">
                      <input id="date" name="date" type="text" class="form-control input_mystyle" data-inputmask-alias="datetime"
                      data-inputmask-inputformat="yyyy-mm-dd" data-mask=""  value="{{$my_price->date }}"  >
                    </div>
                </div><hr>
>>>>>>> refs/remotes/origin/master

                <div class="form-group">
                    <label for="for">  بابت       </label>
                    <input type="text" class="form-control input_mystyle"   name="for"  value="{{$my_price->for}}"     >
                </div><hr>

                <div class="form-group">
                    <label for="intype">  نحوه تراکنش (نقدی ، شبا ، انتقالی یا .....)       </label>
                    <input type="text" class="form-control input_mystyle"   name="intype"  value="{{$my_price->intype}}"     >
                </div><hr>

<<<<<<< HEAD
 @include('dashboard.ui.upload' , [ 'flag' => $flag.'_edit_'.$my_price->id , 'type_file' => 'multi' ])


@if ($list_files)
<div class="col-12">
    <x-card type="{{ law_style($flag) }} ">
        <x-card-header> فایلهای تراکنش {{ law_name($flag) }}  </x-card-header>
        <x-card-body>
            <div class="table-responsive">
            <table class="table">
            <tbody><tr>
            <th>مشاهده</th>
            <th>حذف</th>
            </tr>


@foreach ($list_files as  $file )
@if($file->model_sub_id==$my_price->id)
            <tr>
            <td>  <a target="_blank" href="{{ asset($file->name)}}">مشاهده فایل</a>
            </td>
            <td>

 @include('dashboard.ui.modal_delete_get' , ['myname' =>  'فایل انتخابی تراکنش '.law_name($flag).'  مبلغ '.number_format($my_price->price).'تومان'
 , 'route' => route('dashboard.admin.project.destroy.file',[ 'type'=>$flag , 'id'=>$file->id]) , 'item' =>$file ] )
            </td>
            </tr>
@endif
@endforeach
            </tbody>
            </table>
            </div>

        </x-card-body>
    </x-card>
</div>


@endif





=======
>>>>>>> refs/remotes/origin/master
            </div>
        </div>

        <input type="hidden" name="type" value="{{$flag}}" />
        <input type="hidden" name="status" value="active" />

        <div class="form-group">
            <label>توضیحات :</label>
            <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"
            class="form-control"   name="description"  placeholder="توضیحات "  id="summernoteedit{{ $my_price->id }}">{{$my_price->description}}</textarea>
        </div>


        <script>
        var textareas = document.getElementById("summernoteedit{{$my_price->id}}");
        $(function () {
          $('#summernoteedit{{$my_price->id}}').summernote()
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

          <x-card-footer>
           </x-card-footer>

       </x-card>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
        <button type="submit"  class="btn btn-{{ law_style($flag) }} ">ویرایش {{  law_name($flag) }}</button>
      </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@endforeach
