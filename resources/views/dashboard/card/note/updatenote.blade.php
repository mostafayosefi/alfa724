@foreach ($note as $item)
               <!-- SHOW EDIT modal -->
                <div class="modal fade show" id="modal-lgf{{ $item->id }}" aria-modal="true" role="dialog">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">{{ $item->content }}</h4>
                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="col-md-12">
                            <x-card type="info">
                                <x-card-header>ویرایش یادداشت </x-card-header>
                            <form style="padding:10px;" action="{{$route}}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $item->id }}" >
                                <textarea type="text"
                                id="summernote_note{{ $item->id }}"
                                style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"
                                class="form-control" name="content"  placeholder="توضیحات">{{ $item->content }}</textarea>
                                <input type="hidden" name="employee_id" value="{{ Auth::user()->id }}" >

                                @csrf
                                @method('PUT')
                        </x-card>
                        </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline" data-dismiss="modal">بستن</button>
                          <button type="submit"  type="submit"  class="btn btn-primary">ارسال</button>
                        </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>




  <script>
    var textareas = document.getElementById("summernote_note{{ $item->id }}");
    $(function () {
      $('#summernote_note{{ $item->id }}').summernote()
for (var i = 0; i < textareas.length; i++) {
  CodeMirror.fromTextArea(textareas[i], {
    lineWrapping: true,
    mode: "htmlmixed",
    theme: "monokai"
  });
}
      });
</script>




@endforeach
