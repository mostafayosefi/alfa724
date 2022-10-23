<div class="form-group" >
    <label for="{{$index_id}}">{{$name_select}}</label>
        <select  name="{{$index_id}}"
         {{-- style="font-size: 18px;"  class="js-example-basic-single w-100"    --}}
         class="form-control input_mystyle  select2"  style="width: 100%;"
          {{$required}}
          @if($onchange)
          id="close_select"    onchange="fetch_close_select(this.value);"
          @else
          @if($index_id=='score_setting_id') id="score_setting_id"  onchange="fetch_score_setting(this.value);"   @endif
          @if($index_id=='user_id')  id="score_setting_id"  onchange="fetch_score_setting(this.value);"   @endif
          @endif
           >
        <option value="">لطفا {{$name_select}} مورد نظر را انتخاب نمایید</option>
        @if($allforeachs)


        @foreach($allforeachs as $option)
        @if((explode_url(1)=='admin')&&(explode_url(2)=='project')&&(($index_id=='user_id')||($index_id=='employee_id')))

        <option value="{{$option->for->id}}"  {{($option->for->id  == $value ? 'selected' : '')}}  >
            {{$option->for->$input_name}}</option>
@else
<option value="{{$option->id}}"  {{($option->id  == $value ? 'selected' : '')}}  >
    {{$option->$input_name}}</option>

    @endif
@endforeach






        @endif
    </select>
    </div>
