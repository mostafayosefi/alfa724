
<tr style="margin-top:50px;">
    <div style="margin-top:50px"></div>
      <div class="form-group">
        <div class="input-group">
        <td>

            <?php $number=!empty($specification) ? $idx : 'IDX' ;  ?>

            {{-- <div class="form-group">
                <div  >
                <input type="file"   name="image_uploader_multiple[]"   onchange="show_image_preview(this);" >
                <label class="custom-file-label  " for="customFile">آپلود مستندات</label>
                </div>
                </div> --}}


                @include('dashboard.ui.persian_upload')


{{-- @include('dashboard.ui.persian_upload') --}}
{{-- @include('dashboard.ui.persian_js' , [ $number ]) --}}






        </td>
        </div>
    </div>

    <td><button type="button" class="btn btn-xs btn-danger btn-remove-spec{{ $flag }}"><i class="fa fa-times"></i></button></td>
</tr>


