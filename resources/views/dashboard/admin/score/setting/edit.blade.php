<div class="modal-body">
    <div class="col-md-12">
      <x-card type="info">
          <x-card-header>ویرایش تنظیمات {{$item->name}} </x-card-header>
      <form style="padding:10px;" action="{{ route('dashboard.admin.setting.score.update', $item->id) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <input type="hidden" name="price" value="{{number_format($item->price)}}" />
        <input type="hidden" name="text_price" value="{{$item->text_price}}" />
        <input type="hidden" name="price_award" value="{{number_format($item->price_award)}}" />
        <input type="hidden" name="text_price_award" value="{{$item->text_price_award}}" />

        <div class="form-group">
            <label for="name">مقدار امتیاز (جریمه)</label>
          <input type="text" class="form-control" required  name="value" value="{{ $item->value }}" placeholder="مقدار امتیاز (جریمه)" style="direction: ltr;" >
        </div>

        <div class="form-group">
            <label for="name">توضیحات (جریمه) </label>
        <textarea type="text" class="form-control" name="text"  placeholder="توضیحات (جریمه) ">{{ $item->text }}</textarea>
        </div>
        <hr>
        <div class="form-group">
            <label for="value_award">مقدار امتیاز (پاداش)</label>
          <input type="text" class="form-control" required  name="value_award" value="{{ $item->value_award }}" placeholder="مقدار امتیاز (پاداش)" style="direction: ltr;" >
        </div>

        <div class="form-group">
            <label for="text_value_award">توضیحات (پاداش) </label>
        <textarea type="text" class="form-control" name="text_value_award"  placeholder="توضیحات (پاداش) ">{{ $item->text_value_award }}</textarea>
        </div>

      </x-card>
  </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline" data-dismiss="modal">بستن</button>
    <button type="submit"  type="submit"  class="btn btn-primary">ارسال</button>
  </form>
  </div>
