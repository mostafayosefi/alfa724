
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12 col-md-4 col-lg-3">

 <a href="#" class="delete_post" data-toggle="modal" data-target="#modal-success{{ $item->id }}">
     <span class="btn btn-danger btn-sm">
     <i class="fa fa-fw fa-eraser"></i> حذف خدمت
     </span>
 </a>


 @if(explode_url(2)=='customer')
                                 <a href="{{route('dashboard.admin.service.show',['id'=>$item->id])}}" class="btn btn-success" >میز خدمت</a>
 @endif

 @if(explode_url(2)=='service')
                                 <a href="{{route('dashboard.admin.service.edit',['id'=>$item->id])}}" class="btn btn-success" >ویرایش خدمت</a>
 @endif
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
