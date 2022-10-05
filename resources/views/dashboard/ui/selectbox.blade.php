<div class="form-group" >
    <label for="{{$index_id}}">{{$name_select}}</label>
        <select  name="{{$index_id}}"  
         {{-- style="font-size: 18px;"  class="js-example-basic-single w-100"    --}}
         class="form-control input_mystyle"
          {{$required}}
         @if($index_id=='form_id') id="form_id"  onchange="fetch_form(this.value);"   @endif
        @if($index_id=='form_coloumn_id') id="form_coloumn_id"  onchange="fetch_form_coloumn(this.value);"    @endif
         @if($index_id=='form_category_id') id="form_category_id"  onchange="fetch_myselect_4(this.value);"   @endif
         @if($index_id=='form_subcategory_id') id="form_subcategory_id" onchange="fetch_form_fetch(this.value);"   @endif
         @if($index_id=='form_currency_id') id="form_currency_id" onchange="fetch_currency(this.value);"   @endif
          @if($index_id=='user_id') id="language"   onChange="totalIt()"  @endif
          @if($index_id=='customer_id')     @endif
           >
        <option value="">لطفا {{$name_select}} مورد نظر را انتخاب نمایید</option>
        @if($allforeachs)
        @foreach($allforeachs as $option)
        <option value="{{$option->id}}"  {{($option->id  == $value ? 'selected' : '')}}  >
            {{$option->$input_name}}</option>
        @endforeach

        @endif
    </select>
    </div>
