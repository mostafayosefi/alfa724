@foreach ($task as $item)

<!-- SHOW SUCCESS modal -->
<div class="modal fade show" id="modal-success{{ $item->id }}" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-success">
      <div class="modal-content bg-success">
        <div class="modal-header">
          <h4 class="modal-title">{{ $item->title }}</h4>
          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
            <span  aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            آیا این مسئولیت را با موفقیت به اتمام رساندید ؟
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light uncheckd" data-dismiss="modal">نه هنوز انجام نشده</button>
          <form  action="{{$route}}" method="post">
              @method('PUT')
              @csrf
              <input type="hidden" name="id" value="{{ $item->id }}" >
              <input type="hidden"  name="status" value="done">
             <button type="submit"  class="btn btn-outline-light">بله انجام و تست شده</button>
          </form>
        </div>
      </div>

    </div>

  </div>


@endforeach
