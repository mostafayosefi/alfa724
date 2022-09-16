
<div class="row">
    <div class="col-md-6">

                       <div class="card-body">
                        <h3 class="card-title"><strong> لیست پرداختی های بیعانه</strong></h3><br>

                        <table id="" class="table table-bordered table-hover">
                            <thead>
                                <th>ردیف</th>
                                <th>تاریخ پرداخت بیعانه</th>
                                <th>  مبلغ بیعانه</th>

                            </thead>
                                <tbody>


                                @foreach ($item->price_my_services as $key =>  $my_price )

                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>  {{ $my_price->date }}</td>
                                    <td>
                                        <span class="btn btn-block btn-primary btn-sm">
                                        {{ number_format($my_price->price) }} تومان </span>  </td>
                                </tr>

                                @endforeach


                                </tbody>
                                <tfoot>

                                </tfoot>
                        </table>
                        <div style="max-height:250px;overflow-y:scroll;">
                            {!! $item->description !!}
                        </div>
                        <div class="card-footer">
                           <div class="row">
                               <div class="col-12 col-md-4 col-lg-3">
                                     <a href="#" class="delete_post" data-toggle="modal" data-target="#modal-success{{ $item->id }}"><i class="fa fa-fw fa-eraser"></i></a>
                                     <a href="{{route('dashboard.admin.service.updateservice',['id'=>$item->id])}}" class="btn btn-danger" >ویرایش خدمت</a>
                               </div>
                           </div>
                       </div>
                                <!-- SHOW SUCCESS modal -->
                                   <div class="modal fade show" id="modal-success{{ $item->id }}" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-danger">
                                      <div class="modal-content bg-danger">
                                        <div class="modal-header">
                                          <h4 class="modal-title">{{ $item->content }}</h4>
                                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                                            <span  aria-hidden="true">×</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            آیا می خواهید این  مورد حذف کنید ؟

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-outline-light uncheckd" data-dismiss="modal">خیر</button>
                                           <form  action="#" method="post">
                                               <input type="hidden" name="id" value="{{ $item->id }}" >
                                              <a href="{{route('dashboard.admin.service.deleteservice',['id'=>$item->id])}}" class="btn btn-outline-light">بله </a>
                                           </form>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                        <!-- /.card-body -->
                        </div>

    </div>
</div>

