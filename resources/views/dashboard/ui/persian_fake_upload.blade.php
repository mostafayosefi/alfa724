
    <div id="fakeDiv">
        <div class="row">
            <span onclick="document.getElementById('selectedFile{{ $flag }}{{ $x }}').click();"   id="buttonImage" >
            @if ($flag=='profile')
تصویرپروفایل
@else
بارگزاری
            @endif
            </span>
            <input type="text" class="fakeInput" id="fakeInput{{ $flag }}{{ $x }}" disabled />
                <input type="file" id="selectedFile{{ $flag }}{{ $x }}" class="selectedFile"
                @if($type_file=='multi')
                 name="uploader_multiple[]"
                 @endif
                @if($type_file=='file')
                 name="file"
                 @endif
                 />
            </div>
      </div>
