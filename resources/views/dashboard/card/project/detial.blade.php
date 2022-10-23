


            <div class="card card-primary">
                <div class="card-header">
                     <h3 class="card-title">اطلاعات پروژه</h3>
                     {{-- <h3 class="card-title">{{ $project->name }}</h3> --}}
                   </div>

<div class="card-body">
<div class="row">
<div class="col-md-8">
<strong><i class="fas fa-book mr-1"></i> نام پروژه:  {{ $project->title }}</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>   هزینه پروژه :  {{ number_format($project->price) }} تومان</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>   تاریخ شروع  :  {{date_frmat_a($project->start_date)}}</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>   مدت زمان حدودی انجام پروژه  :  {{ valid_init($project->time,'daywork') }}</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>    تاریخ پایان  :  {{date_frmat_a($project->finish_date)}}</strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>    تاریخ تحویل  : @if($project->giving_date)  value="{{date_frmat_a($project->giving_date)}}" @endif </strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>  تاریخ تسویه:   @if($project->zero_date) value="{{date_frmat_a($project->zero_date)}}" @endif  </strong>
<p class="text-muted">
</p>
</div>
<div class="col-md-4">
<strong><i class="fas fa-book mr-1"></i>   وضعیت  :  {{ status_project($project->status) }} </strong>
<p class="text-muted">
</p>
</div>
</div>


@if((explode_url(2)=='project')||(explode_url(2)=='edit')||(explode_url(3)=='show'))
<div class="row">
    <div class="col-md-12">
    <strong> &nbsp; </strong>
    <p class="text-muted">
        {!! $project->description !!}
    </p>
    </div>
</div>
@endif

</div>


<x-card-footer>

    <a href="{{route('dashboard.admin.project.step',['id'=>$project->id , 'project'  ])}}" class="btn btn-success" >مراحل کاری پروژه </a>
    <a href="{{route('dashboard.admin.project.index',['id'=>$project->id   ])}}" class="btn btn-primary" > مشاهده اطلاعات پروژه </a>
    <a href="{{route('dashboard.admin.project.edit',['id'=>$project->id])}}" class="btn btn-warning" >ویرایش پروژه</a>
            @if($project->status != 'done' && $project->status != 'paid')
                <a class="btn btn-primary" href="{{ route("dashboard.admin.project.updatestatus", ['id'=>$project->id,'status'=>'done']) }}">به اتمام‌رساندن پروژه</a>
            @endif
            @if($project->status != 'paid')
                <a class="btn btn-success" href="{{ route("dashboard.admin.project.updatestatus", ['id'=>$project->id,'status'=>'paid']) }}">پروژه تسویه شده</a>
            @endif

    {{-- <a href="{{route('dashboard.admin.service.create', $project->id )}}" class="btn btn-success" >ساخت خدمت جدید برای مشتری</a>
    <a href="{{route('dashboard.admin.project.create', $project->id )}}" class="btn btn-primary" >ساخت پروژه جدید برای مشتری</a> --}}
</x-card-footer>



</div>


