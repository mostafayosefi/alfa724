


                    <div class="card card-primary">
                        <div class="card-header">
                             <h3 class="card-title">{{ $item->name }}</h3>
                           </div>

<div class="card-body">
 <div class="row">
    <div class="col-md-4">
        <strong><i class="fas fa-book mr-1"></i> مدت زمان :  {{ valid_init($item->durday,'daywork') }}</strong>
        <p class="text-muted">
        </p>
    </div>
    <div class="col-md-4">
        <strong><i class="fas fa-user mr-1"></i> نام کارمند   :  {{ $item->user->first_name }} {{ $item->user->last_name }}</strong>
        <p class="text-muted">
        </p>
    </div>
    <div class="col-md-4">
        <strong><i class="fas fa-book mr-1"></i>تاریخ شروع پروژه:  {{ date_frmat_mnth($item->startdate) }}</strong>
        <p class="text-muted">
        </p>
    </div>
    <div class="col-md-4">
        <strong><i class="fas fa-book mr-1"></i>تاریخ پایان پروژه:  {{ date_frmat_mnth($item->enddate) }}</strong>
        <p class="text-muted">
        </p>
    </div>
    <div class="col-md-4">
        <strong><i class="fas fa-book mr-1"></i>تاریخ تسویه پروژه: @if($item->purdate)  {{ date_frmat_mnth($item->purdate)   }} @else تعیین نشده @endif </strong>
        <p class="text-muted">
        </p>
    </div>
    <div class="col-md-4">
        <strong><i class="fas fa-book mr-1"></i>تاریخ تحویل پروژه: @if($item->purdate)   {{ date_frmat_mnth($item->recvdate) }} @else تعیین نشده @endif  </strong>
        <p class="text-muted">
        </p>
    </div>
    <div class="col-md-4">
        <strong><i class="fas fa-book mr-1"></i> هزینه کل پروژه :

            <span class="btn btn-primary btn-sm">
                {{ number_format($item->price) }} تومان </span>         </strong>
        <p class="text-muted">
        </p>
    </div>

    </div>
</div>



{{-- @include('dashboard.admin.service.price-my-service') --}}


                        </div>
