<a href="#" class="edit_post"   data-toggle="modal" data-target="#modal-edit2{{ $item->id }}">
    <span class="btn btn-primary btn-sm">
        <i class="fa fa-fw fa-edit" ></i> مشاهده
        </span>
 </a>

                                   <div class="modal fade show" id="modal-edit2{{ $item->id }}" aria-modal="true" role="dialog">
                                    <div class="modal-dialog {{$class_modal}}">
                                      <div class="modal-content {{$class_content}}">
                                        <div class="modal-header">
                                          <h4 class="modal-title">{{$myname}}</h4>
                                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                                            <span  aria-hidden="true">×</span>
                                          </button>
                                        </div>

                                        @include($ui)

                                      </div>
                                    </div>
                                  </div>
