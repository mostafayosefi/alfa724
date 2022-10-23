
<x-card type="primary">
    <x-card-header>فازهای پروژه</x-card-header>
    <x-card-body>

                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th>حذف</th>
                                <th>ویرایش</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($phase as $key=> $item)
                             <?php $ids=$item->id ; ?>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{!! $item->start_date->formatJalali() !!}</td>
                                    <td>{!! $item->finish_date->formatJalali() !!}</td>
                                    <td>
                                    <a href="#" class="delete_post" ><i class="fa fa-fw fa-eraser"  data-toggle="modal" data-target="#modal-success{{ $item->id }}"></i></a>
                                    </td>
                                    <td>
                                    <button type="button" data-toggle="modal" data-target="#modal-edit-phase-{{ $item->id }}" style="padding: 0;color:#dc3545" class="btn edit_post"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
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
                                              <a href="{{route('dashboard.admin.phase.deletephase',['id'=>$item->id,'project_id'=>$item->for->id])}}" class="btn btn-outline-light">بله </a>
                                           </form>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th>حذف</th>
                                    <th>ویرایش</th>
                                </tr>
                                </tfoot>
                        </table>


                        @if((explode_url(2)=='project'))

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12 col-md-4 col-lg-3">
                                    <button type="button" data-toggle="modal" data-target="#modal-create-phase" class="btn btn-success">ثبت فاز جدید برای پروژه</button>
                                </div>
                            </div>
                        </div>

                        @endif
    </x-card-body>


</x-card>
