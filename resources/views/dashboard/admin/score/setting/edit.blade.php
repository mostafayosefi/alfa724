<div class="modal-body">
    <div class="col-md-12">
      <x-card type="info">
          <x-card-header>ویرایش تنظیمات {{$item->name}} </x-card-header>
      <form style="padding:10px;" action="{{ route('dashboard.admin.setting.score.update', $item->id) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <div class="form-group">
            <label for="name">مقدار امتیاز</label>
          <input type="text" class="form-control" required  name="value" value="{{ $item->value }}" placeholder="مقدار امتیاز" style="direction: ltr;" >
        </div>

        <div class="form-group">
            <label for="name">توضیحات  </label>
        <textarea type="text" class="form-control" name="text"  placeholder="توضیحات">{{ $item->text }}</textarea>

        </div>

      </x-card>
  </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline" data-dismiss="modal">بستن</button>
    <button type="submit"  type="submit"  class="btn btn-primary">ارسال</button>
  </form>
  </div>
