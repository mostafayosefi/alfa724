<div class="form-group" >
    <label for="{{$index_id}}">{{$name_select}}</label>
        <select  name="{{$index_id}}"
         class="form-control input_mystyle  select2"  style="width: 100%;"
           onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" >
        <option value="">لطفا {{$name_select}} مورد نظر را انتخاب نمایید</option>
@if($allforeachs)

@if($search=='search_task')
 @foreach($allforeachs as $option)
<option
value="{{ route('dashboard.admin.daily.'.explode_url(3) ,  [ $status , $option->id ]  ) }}"
{{($option->id  == $value ? 'selected' : '')}}   >
    {{$option->$input_name}}</option>
 @endforeach
@endif

@endif
    </select>
    </div>
