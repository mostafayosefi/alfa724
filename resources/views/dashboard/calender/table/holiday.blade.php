

                            @if ($admin->holiday == 'false')
                                  <button type="button" class="btn btn-success" data-toggle="modal"
                                      data-target="#status_{{ $admin->id }}">
                                      <i data-feather="check-circle"></i> &nbsp; فعال
                                  </button>


                                  @elseif($admin->holiday=='true')
                                  <button type="button" class="btn btn-warning" data-toggle="modal"
                                      data-target="#status_{{ $admin->id }}">
                                      <i data-feather="x-circle"></i> &nbsp; غیرفعال
                                  </button>


                                  @endif




<div class="modal fade" id="status_{{$admin->id}}">
    <div class="modal-dialog">

    @if ($admin->holiday == 'false')
    <div class="modal-content bg-success">
        @else
        <div class="modal-content bg-warning">

        @endif
    <div class="modal-header">
    <h4 class="modal-title">{{ $admin->holiday == 'false' ? ' غیرفعال کردن'.$myname : ' فعال کردن'.$myname }}</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <p>
        آیا شما مایل به   {{ $admin->holiday == 'false' ? ' غیرفعال کردن'.$myname : ' فعال کردن'.$myname }} هستید؟

    </p>
    </div>
    <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">خیر</button>

    @if ($admin->holiday == 'false')
    <button type="button" class="btn btn-outline-light">غیرفعال کردن</button>

     @else
    <button type="button" class="btn btn-outline-light">  فعال کردن</button>

     @endif

    </div>
    </div>
    </div>
    </div>
