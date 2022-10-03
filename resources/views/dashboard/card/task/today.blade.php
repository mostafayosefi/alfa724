<section class="col-lg-4 connectedSortable">
    <!-- TO DO List -->
<div class="card">
<div class="card-header">
<h3 class="card-title">
<i class="ion ion-clipboard mr-1"></i>
کارهای امروز و ضروری
</h3>

<div class="card-tools">

</div>
</div>
<!-- /.card-header -->
<div class="card-body">
<ul class="todo-list ui-sortable" data-widget="todo-list">
@foreach ($task as $item)


@php

$sdate = date_by_time(   $item->start_date , $item->start_time  );
$mydate =now()->format('Y-m-d H:i:s');
$fdate = date_by_time(   $item->finish_date , $item->finish_time  );

@endphp

@if ($item->is_due_or_overdue)
@if ($item->is_overdue)
<li style="background:#ff7c7c">
@else
<li>
@endif
<form method="post">
<span class="handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>
<div  class="icheck-primary d-inline ml-2">
<input type="checkbox"  id="todoCheck20{{ $item->id }}"  data-toggle="modal" data-target="#modal-success{{ $item->id }}">
<label for="todoCheck20{{ $item->id }}"></label>
</div>
{{--
<input
type="checkbox"
id="myCheck"
onmouseover="myFunction()"
onclick="alert('click event occurred')" /> --}}


<span class="text" style="cursor:pointer;" data-target="#modal-info{{ $item->id }}" data-toggle="modal">{{ $item->title }}</span>
<small class="badge badge-info"><i class="far fa-clock"></i>@if(!empty($item->start_time)){{ $item->start_time->format('H:i') }} - {{ $item->finish_time->format('H:i') }} - {{$item->finish_date->formatJalali()}}@else {{$item->finish_date->formatJalali()}} @endif</small>
<div class="tools">
<i class="fas fa-edit" data-target="#modal-lf{{ $item->id }}" data-toggle="modal"></i>
<script>
  $(document).ready(function(){
$(".check").click(function(){
    $("#todoCheck20{{ $item->id }}").prop("checked", true);
});
$(".uncheckd").click(function(){
    $("#todoCheck20{{ $item->id }}").prop("checked", false);
});
});
</script>
</div>
</form>
</li>
@endif

<div class="modal fade show" id="modal-info{{ $item->id }}" aria-modal="true" role="dialog">
<div class="modal-dialog modal-info">
<div class="modal-content bg-info">
  <div class="modal-header">
    <h4 class="modal-title">{{ $item->title }}</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">
    {!! $item->description !!}
  </div>
  <div class="modal-footer justify-content-between">
       <button type="button" class="btn btn-outline-light" data-dismiss="modal">بستن</button>
  </form>
  </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>





@endforeach
</ul>
</div>

<div class="card-footer clearfix">
       <button type="button"  data-toggle="modal" data-target="#modal-lg" style="font-size:13px;" class="btn btn-info float-right"><i class="fas fa-plus"></i>اضافه کردن کار</button>
</div>
</div>
</section>
