


<span style="font-size: 14px; color:#fa34bb; "> دقت نمایید جهت اعمال هر کدام از عملیات ها شامل امتیاز یا هزینه فیلدهای زیر را پر نمایید ، در صورت
    انتخاب یک پارامتر مقدار پارامترهای دیگر را خالی بگذارید </span>
    <hr>

@if($m == 'fine')


<div class="form-group">
    <label for="value"> کسر امتیاز</label>
  <input type="text" class="form-control input_mystyle" style="direction: ltr;"
  required  name="value" value="{{$score_setting->value}}" placeholder="کسر امتیاز"  >
</div><hr>

<div class="col-md-12 col-sm-12">
    <label for="text_value">   توضیحات کسر امتیاز</label>
    <textarea type="text"  rows="6" class="form-control input_mystyle"
      name="text_value"  >{{$score_setting->text_value}}</textarea>
</div>


<div class="form-group">
    <label for="price"> هزینه جریمه نقدی (به تومان)  </label>
  <input type="text" class="form-control input_mystyle" style="direction: ltr;"
  required  name="price" value="{{number_format($score_setting->price)}}"  id="price"   onkeyup="separateNum(this.value,this);"  placeholder="هزینه جریمه نقدی (به تومان)  "  >
</div><hr>

<div class="col-md-12 col-sm-12">
    <label for="text_price">   توضیحات جریمه نقدی </label>
    <textarea type="text"  rows="6" class="form-control input_mystyle"
      name="text_price"  >{{$score_setting->text_price}}</textarea>
</div>
@endif

@if($m == 'award')


<div class="form-group">
    <label for="value"> افزایش امتیاز</label>
  <input type="text" class="form-control input_mystyle" style="direction: ltr;"
  required  name="value" value="{{$score_setting->value_award}}" placeholder="افزایش امتیاز"  >
</div><hr>

<div class="col-md-12 col-sm-12">
    <label for="text_value">   توضیحات افزایش امتیاز</label>
    <textarea type="text"  rows="6" class="form-control input_mystyle"
      name="text_value"  >{{$score_setting->text_value_award}}</textarea>
</div>


<div class="form-group">
    <label for="price"> هزینه پاداش نقدی (به تومان)  </label>
  <input type="text" class="form-control input_mystyle" style="direction: ltr;"
  required  name="price" value="{{number_format($score_setting->price_award)}}"  id="price"   onkeyup="separateNum(this.value,this);"  placeholder="هزینه پاداش نقدی (به تومان)  "  >
</div><hr>

<div class="col-md-12 col-sm-12">
    <label for="text_price">   توضیحات پاداش نقدی </label>
    <textarea type="text"  rows="6" class="form-control input_mystyle"
      name="text_price"  >{{$score_setting->text_price_award}}</textarea>
</div>
@endif
