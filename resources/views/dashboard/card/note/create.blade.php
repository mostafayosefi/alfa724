<div class="modal fade show" id="modal-lgg" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">اضافه کردن یادداشت جدید</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <x-card type="info">
          <x-card-header>ساخت یادداشت جدید</x-card-header>
      <form style="padding:10px;" action="{{$route}}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
          <textarea type="text"
          id="summernote_note"
          style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"
          class="form-control" required name="content"  placeholder="توضیحات "    ></textarea>



  <script>
    var textareas = document.getElementById("summernote_note");
    $(function () {
      $('#summernote_note').summernote()
for (var i = 0; i < textareas.length; i++) {
  CodeMirror.fromTextArea(textareas[i], {
    lineWrapping: true,
    mode: "htmlmixed",
    theme: "monokai"
  });
}
      });
</script>

{{--
          <script>
            $(function () {
              $('#summernote_note').summernote()
              CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
              });
            })
          </script> --}}



          @csrf
          <x-card-footer>
           </x-card-footer>

       </x-card>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
        <button type="submit"  class="btn btn-primary toastrDefaultInfo">ساخت یادداشت</button>
      </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
