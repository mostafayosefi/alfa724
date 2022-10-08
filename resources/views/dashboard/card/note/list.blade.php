
     <!-- SIDE 3 -->
     <section class="col-lg-4 connectedSortable">
        <!-- TO DO List -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            دفترچه یادداشت
          </h3>

          {{-- @admin('gg')
          <p>Only admin sees this</p>
          @endadmin --}}

          <div class="card-tools">
            <ul class="pagination pagination-sm">

            </ul>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <ul class="todo-list" data-widget="todo-list">
            @if($note)
            @foreach ($note as $item)
              <li>
              <form  method="post">
              <span class="handle">
                <i class="fas fa-ellipsis-v"></i>
                <i class="fas fa-ellipsis-v"></i>
              </span>
              <div  class="icheck-primary d-inline ml-2">
                   <input type="checkbox"  id="todoCheck2{{ $item->id }}"  data-toggle="modal" data-target="#modal-success{{ $item->id }}">
                <label for="todoCheck2{{ $item->id }}"></label>
              </div>
              <span class="text" style="cursor:pointer;" data-target="#modal-info{{ $item->id }}" data-toggle="modal">{!! $item->content !!}</span>
              <small class="badge badge-info"><i class="far fa-clock"></i> {{$item->created_at->formatJalali()}}</small>
              <div class="tools">
                <i class="fas fa-edit" data-target="#modal-lgf{{ $item->id }}" data-toggle="modal"></i>
                <script>
                  $(document).ready(function(){
                $(".check").click(function(){
                    $("#todoCheck2{{ $item->id }}").prop("checked", true);
                });
                $(".uncheckd").click(function(){
                    $("#todoCheck2{{ $item->id }}").prop("checked", false);
                });
               });

              </script>
              </div>

            </li>

           <!-- SHOW SUCCESS modal -->
           <div class="modal fade show" id="modal-success{{ $item->id }}" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-danger">
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h4 class="modal-title">ویرایش یادداشت</h4>
                  <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                    <span  aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    آیا می خواهید این یادداشت را حذف کنید ؟

                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light uncheckd" data-dismiss="modal">خیر</button>
                   <form  action="#" method="post">
                       <input type="hidden" name="id" value="{{ $item->id }}" >
                      <a href="{{ route('dashboard.admin.daily.deletenote', $item->id) }}" class="btn btn-outline-light">بله </a>
                   </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
            @endforeach
            @endif
          </ul>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <button type="button"  data-toggle="modal" data-target="#modal-lgg" style="font-size:13px;" class="btn btn-warning float-right"><i class="fas fa-plus"></i>اضافه کردن یادداشت</button>
          <ul class="pagination">
             {{-- {{$write->links()}} --}}
          </ul>
        </div>
      </div>
    </section>
