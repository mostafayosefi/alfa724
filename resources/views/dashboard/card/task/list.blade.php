@if($card=='task_notwork')
<div class="card card-widget widget-user-2">
    <div class="widget-user-header bg-warning">
    <h3 class="widget-user-username">  لیست وظایف انجام نشده کاربران  </h3>
    </div>
    <div class="card-body">
@if($task_notwork_all)
  <div class="col-12">
    @foreach ($task_notwork_all as $item )
    @if($item->user)
    <a href="{{ route('dashboard.admin.daily.alluser' ,  [ 'notwork' , $item->user->id ]  ) }}"  target="_blank" >
    <div class="alert alert-warning no-dismiss">
        <button type="button" class="close" data-dismiss="alert">×</button>
    مهلت انجام مسئولیت  {{$item->title}} توسط کاربر {{$item->user->name}} به پایان رسیده ولی هنوز پایان کار ثبت نگردید
    </div>
     </a>
    @endif
    @endforeach
     </div>
    @endif
    </div>
    </div>
    @endif

    @if($card=='task_today')
<div class="card card-widget widget-user-2">
    <div class="widget-user-header bg-primary">
    <h3 class="widget-user-username">  لیست وظایف امروز کاربران  </h3>
    </div>
    <div class="card-body">
@if($task_today_all)
  <div class="col-12">
    @foreach ($task_today_all as $item )
    @if($item->user)
    <a href="{{ route('dashboard.admin.daily.alluser' ,  [ 'all' , $item->user->id ]  ) }}"  target="_blank" >
    <div class="alert alert-primary no-dismiss">
        <button type="button" class="close" data-dismiss="alert">×</button>
    مسئولیت {{$item->title}} برای کاربر {{$item->user->name}} امروز تعریف شده است
    </div>
     </a>
    @endif
    @endforeach
     </div>
    @endif
    </div>
    </div>
    @endif
