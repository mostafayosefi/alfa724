<form method="post">
    {{-- <span class="handle">
      <i class="fas fa-ellipsis-v"></i>
      <i class="fas fa-ellipsis-v"></i>
    </span> --}}
    {{-- <div  class="icheck-primary d-inline ml-2">
      <input type="checkbox"  id="todoCheck2{{ $items->id }}"  data-toggle="modal" data-target="#modal-success{{ $items->id }}">
      <label for="todoCheck2{{ $items->id }}"></label>
    </div> --}}
    {{-- <span class="text" style="cursor:pointer;" data-target="#modal-info{{ $items->id }}" data-toggle="modal">{{ $items->date }}</span> --}}
    {{-- <small class="badge badge-info"><i class="far fa-clock"></i> 12 </small> --}}
    <div class="tools">
      <i class="fas fa-edit" data-target="#modal-lf{{ $items->id }}" data-toggle="modal"></i>
      <script>
        $(document).ready(function(){
      $(".check").click(function(){
          $("#todoCheck2{{ $items->id }}").prop("checked", true);
      });
      $(".uncheckd").click(function(){
          $("#todoCheck2{{ $items->id }}").prop("checked", false);
      });
     });
    </script>
    </div>
  </form>
