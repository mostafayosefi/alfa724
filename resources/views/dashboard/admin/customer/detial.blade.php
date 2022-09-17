


            <div class="card card-success">
                <div class="card-header">
                     <h3 class="card-title">{{ $customer->name }}</h3>
                   </div>

<div class="card-body">
<div class="row">
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i> نام مشتری:  {{ $customer->name }}</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i> کد مشتری:  {{ $customer->code }}</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>   تلفن:  {{ $customer->tells }}</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>   شماره همراه  :  {{ $customer->tell }}</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>   شغل  :  {{ $customer->job }}</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>   نام دامنه:  {{ $customer->domain }}</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>   هاست  :  {{ $customer->host }} </strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>     ایمیل:  {{ $customer->email }}</strong>
<p class="text-muted">
</p>
</div>
</div>


@if((explode_url(2)=='edit')||(explode_url(3)=='show'))
<div class="row">
    <div class="col-md-12">
    <strong> &nbsp; </strong>
    <p class="text-muted">
        {!! $customer->description !!}
    </p>
    </div>
</div>
@endif

</div>
</div>


