<div class="modal-body">
    <div class="col-md-12">
      <x-card type="info">
          <x-card-header>ویرایش تنظیمات {{$item->name}} </x-card-header>
      <form style="padding:10px;" action="{{ route('dashboard.admin.setting.score.update', $item->id) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <input type="hidden" name="value" value="{{$item->value}}" />
        <input type="hidden" name="text" value="{{$item->text}}" />
        <input type="hidden" name="value_award" value="{{$item->value_award}}" />
        <input type="hidden" name="text_value_award" value="{{$item->text_value_award}}" />

        @include('dashboard.ui.java-price')
        <div class="form-group">
            <label for="price">مبلغ هزینه (جریمه) (به تومان)</label>
          <input type="text" class="form-control" required  name="price"  id="price"   onkeyup="separateNum(this.value,this);"  value="{{ number_format($item->price) }}" placeholder="  (به تومان)" style="direction: ltr;" >
        </div>

        <div class="form-group">
            <label for="text_price">توضیحات هزینه(جریمه) </label>
        <textarea type="text" class="form-control" name="text_price"  placeholder="توضیحات هزینه(جریمه) ">{{ $item->text_price }}</textarea>
        </div>
        <hr>
        <div class="form-group">
            <label for="price_award"> مبلغ هزینه (پاداش) (به تومان)</label>
          <input type="text" class="form-control" required  name="price_award" id="price"   onkeyup="separateNum(this.value,this);"   value="{{ number_format($item->price_award) }}" placeholder="  (به تومان)" style="direction: ltr;" >
        </div>

        <div class="form-group">
            <label for="text_price_award">توضیحات هزینه (پاداش) </label>
        <textarea type="text" class="form-control" name="text_price_award"  placeholder="توضیحات هزینه (پاداش) ">{{ $item->text_price_award }}</textarea>
        </div>

      </x-card>
  </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline" data-dismiss="modal">بستن</button>
    <button type="submit"  type="submit"  class="btn btn-primary">ارسال</button>
  </form>
  </div>
