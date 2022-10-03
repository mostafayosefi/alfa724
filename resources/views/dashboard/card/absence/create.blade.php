
    @if($absence != NULL && $absence->exit==NULL)

    <!-- SHOW SUCCESS modal -->
    <div class="modal fade show" id="modal-absence" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-success">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">پایان کار</h4>
                    <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                        <span  aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    آیا لیست کار های امروز را چک کرده و مطمئن هستید اتمام پیدا کرده‌اند؟ (عدم انجام وظایف طبق برنامه از رتبه شما کم می‌کند)
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-info uncheckd" data-dismiss="modal">نه هنوز انجام نشده</button>
                    <form method="post" action="{{ route('dashboard.employee.absence.end', $absence->id) }}">
                        @csrf
                        <button type="submit"  class="btn btn-success">بله انجام شده</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-info no-dismiss" style="background: none;
    width: 100%;
    display: inline-flex;
    border: none;
    margin: 0px 7px 15px 0px;
    padding: 0px;">
                <div class="row" style="width:100%">
                    <div class="col-sm-6 col-md-8 col-12">
                        <p style="color:#464545; position: relative; top: 8px;">ساعت زدن حضوری شما : {{$absence->enter}}</p>
                    </div>
                    <div class="col-sm-6 col-md-4 col-12">
                        <button style="" type="submit" class=" btn btn-block btn-outline-secondary toastrDefaultInfo" data-toggle="modal" data-target="#modal-absence">
                            ثبت پایان کار
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif($absence != NULL && $absence->exit!=NULL)
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info no-dismiss" style="background: #17a2b85e; width:100%;display:inline-flex;">
                <div class="col-md-10 col-sm-12">
                    <p style="color:#464545; position: relative; top: 8px;">شما امروز به مدت  {{$diff}} کار کرده اید</p>
                </div>
            </div>
        </div>
    </div>
@endif
