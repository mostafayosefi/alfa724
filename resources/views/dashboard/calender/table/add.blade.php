
    @if($type=='holiday')
    <div class="tools">
    <span @if($items->holiday=='true')  class="btn btn-danger btn-sm"   @else  class="btn btn-success btn-sm" @endif  data-target="#modal-lf{{ $items->id }}" data-toggle="modal" >
      <i class="fas fa-edit"></i>
    </span>
    </div>
    @endif
