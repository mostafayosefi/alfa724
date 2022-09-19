<a href="#" class="delete_post" ><i class="fa fa-fw fa-eraser"  data-toggle="modal" data-target="#modal-delete{{ $item->id }}"></i></a>

                                   <div class="modal fade show" id="modal-delete{{ $item->id }}" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-danger">
                                      <div class="modal-content bg-danger">
                                        <div class="modal-header">
                                          <h4 class="modal-title">{{$myname}}</h4>
                                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                                            <span  aria-hidden="true">×</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            آیه شما مایل به حذف   {{$myname}} از سیستم هستید؟

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-outline-light uncheckd" data-dismiss="modal">خیر</button>


  <form class="forms-sample" method="POST" action="{{$route}}" >
    @csrf
    @method('DELETE')
    <button  type="submit"  class="btn btn-outline-light"  >حذف</button>
     </form>

                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
