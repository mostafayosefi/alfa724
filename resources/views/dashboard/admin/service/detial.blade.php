


            <div class="card card-primary">
                <div class="card-header">
                     <h3 class="card-title">اطلاعات خدمت</h3>
                     {{-- <h3 class="card-title">{{ $customer->name }}</h3> --}}
                   </div>

<div class="card-body">
<div class="row">
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i> نام خدمت:  {{ $my_service->name }}</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i> تاریخ شروع:  {{ date_frmat_a($my_service->startdate)   }}</strong>
<p class="text-muted">
</p>
</div>
@if($my_service->durday!='0')
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>   مدت زمان روزکاری:  {{  valid_init($my_service->durday,'daywork') }}</strong>
<p class="text-muted">
</p>
</div>
@endif
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i> تاریخ پایان:  {{ date_frmat_a($my_service->enddate)   }}</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>    هزینه خدمت    :  {{ number_format($my_service->price) }} تومان</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>   کارمند  :  {{ $my_service->user->first_name.' '.$my_service->user->last_name }}</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>تاریخ تسویه :  @if($my_service->purdate != null) {{date_frmat_a($my_service->purdate)}} @else  @endif</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>تاریخ تحویل :  @if($my_service->recvdate != null) {{date_frmat_a($my_service->recvdate)}} @else  @endif  </strong>
<p class="text-muted">
</p>
</div>
</div>



</div>
</div>


