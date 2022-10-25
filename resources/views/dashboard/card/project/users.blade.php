


            <div class="card card-primary">
                <div class="card-header">
                     <h3 class="card-title">کاربران پروژه</h3>
                   </div>

<div class="card-body">
                        <table id="example3" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>نام و نام خانوادگی </th>
                                    <th>ایمیل</th>
                                    <th>شماره تماس</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th>هزینه</th>
                                    <th>پروفایل</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                 @foreach($users as $item)
                                    <tr>
                                        <td>{{ $item->for->first_name }} {{ $item->for->last_name }}</td>
                                        <td>{{ $item->for->email }}</td>
                                        <td>{{ $item->for->mobile }}</td>
                                        <td>{{ $item->start_date->formatJalali() }}</td>
                                        <td>{{ $item->finish_date->formatJalali() }}</td>
                                        <td>{{ $item->cost }}</td>
                                        <td><a href="{{route('dashboard.admin.users.show',['id'=>$item->for->id])}}" class="btn btn-block btn-outline-primary btn-sm">مشاهده پروفایل</a></td>
                                        <td><button type="button" data-toggle="modal" data-target="#modal-edit-employee-{{ $item->id }}" class="btn btn-block bg-gradient-warning btn-sm">ویرایش</button></td>
                                        <td>
                                        <a href="#" class="delete_post" ><i class="fa fa-fw fa-eraser"  data-toggle="modal" data-target="#modal-success{{ $item->id }}"></i></a>
                                        </td>
                                    </tr>
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
                                              <a href="{{route('dashboard.admin.employee.deleteemployee',['id'=>$item->id,'project_id'=>$item->project->id])}}" class="btn btn-outline-light">بله </a>
                                           </form>
                                        </div>
                                      </div>
                                     </div>
                                   </div>
                                 @endforeach
                                </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>نام و نام خانوادگی </th>
                                        <th>ایمیل</th>
                                        <th>شماره تماس</th>
                                        <th>تاریخ شروع</th>
                                        <th>تاریخ پایان</th>
                                        <th>هزینه</th>
                                        <th>پروفایل</th>
                                        <th>ویرایش</th>
                                        <th>حذف</th>
                                    </tr>
                                    </tfoot>
                        </table>
                        </div>

                        @if((explode_url(2)=='project'))

                       <div class="card-footer">
                           <div class="row">
                               <div class="col-12 col-md-4 col-lg-3">
                                   <button type="button" data-toggle="modal" data-target="#modal-create-employee" class="btn btn-success">افزودن کاربر </button>
                               </div>
                           </div>
                       </div>

                       @endif

                        <!-- /.card-body -->
                        </div>
