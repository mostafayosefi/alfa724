
    @if($type=='holiday')
    <div class="tools">
    <span @if($items->holiday=='true')  class="btn btn-danger btn-sm"   @else  class="btn btn-success btn-sm" @endif  data-target="#modal-lf{{ $items->id }}" data-toggle="modal" >
      <i class="fas fa-edit"></i>
    </span>
    </div>
    @endif

    @if($type=='daily')

@if($items->cleander_day_tasks)
@foreach ($items->cleander_day_tasks as $cleander_day_task )
@if (auth()->user()->id == $cleander_day_task->task->employee_id  )
 @if ($items->id == $cleander_day_task->cleander_day_id )
{{-- {{ $cleander_day_task->task_id }}<br>
{{ $cleander_day_task->id }}<br>
  {{ $cleander_day_task->task->title }}<br> --}}

    <span class="btn btn-block bg-gradient-info btn-xs" data-target="#modal-lf{{ $cleander_day_task->task_id }}" data-toggle="modal" >
      <i class="fas fa-edit"></i> {{ $cleander_day_task->task->title }}
    </span>

@endif
@endif
@endforeach
@endif

    @endif
