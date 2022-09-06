
                                  @if ($admin->status == 'active')
                                  <button type="button" class="badge badge-success" data-toggle="modal"
                                      data-target="#status_{{ $admin->id }}">
                                      <i data-feather="check-circle"></i> &nbsp; فعال
                                  </button>


                                  @elseif($admin->status=='inactive')
                                  <button type="button" class="badge badge-warning" data-toggle="modal"
                                      data-target="#status_{{ $admin->id }}">
                                      <i data-feather="x-circle"></i> &nbsp; غیرفعال
                                  </button>


                                  @endif

                                  <div class="modal fade" id="status_{{ $admin->id }}" tabindex="-1" role="dialog"
                                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">  {{ $admin->status == 'active' ? ' غیرفعال کردن'.$myname : ' فعال کردن'.$myname }}</h5>
                                                  <button type="button" class="close" data-dismiss="modal"
                                                      aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  آیا شما مایل به   {{ $admin->status == 'active' ? ' غیرفعال کردن'.$myname : ' فعال کردن'.$myname }} هستید؟
                                              </div>
                                              <div class="modal-footer">

                                                      <form class="forms-sample" method="POST" action="{{$route}}" >
                                                        @csrf
                                                        @method('PUT')

                                                        @if ($admin->status == 'active')
                                                        <button  type="submit"   class="btn btn-warning"  >غیرفعال کردن</button>
                                                        @else
                                                        <button  type="submit"   class="btn btn-success"  >فعال کردن</button>
                                                        @endif

                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
                                                        </form>


                                              </div>
                                          </div>
                                      </div>
                                  </div>


