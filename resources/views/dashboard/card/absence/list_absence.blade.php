
@if ($list_absence=='list')

@php $first = report_user($item->id  , 'first' , 'list_absence'   ); @endphp
@if ($first)

@php
            $hourse_enter = explode_ext($first->enter,':','0');
            $minute_enter = explode_ext($first->enter,':','1');
            $hourse_float = explode_ext($setting_absence->time_float,':','0');
            $minutefloat = explode_ext($setting_absence->time_float,':','1');
             @endphp

 <li class="nav-item"> <a href="{{route('dashboard.admin.users.show' , [ $first->user->id ])  }}" class="nav-link"> {{$item->name}}
    @if((($hourse_enter - $hourse_float) >= 0)&&(($minute_enter - $minutefloat)>0))
     <span class="float-right badge bg-warning">تاخیر
        {{  $hourse_enter - $hourse_float }}  ساعت و  {{  $minute_enter - $minutefloat }} دقیقه
    </span>
    @endif
    <span class="float-right badge bg-success">ساعت ورود  {{ $first->enter }}</span>
    </a> </li>
  @else
  <li class="nav-item"> <a href="#" class="nav-link"> {{$item->name}} <span class="float-right badge bg-danger"> غایب </span> </a> </li>
 @endif

@endif

@if ($list_absence=='score')

@php $first = report_user($item->id  , 'first' , 'list_absence'   );

$hourse_now = explode_ext(date_time('time'),':','0');
$minute_now = explode_ext(date_time('time'),':','1');
$hourse_float = explode_ext($setting_absence->time_float,':','0');
$minutefloat = explode_ext($setting_absence->time_float,':','1');
@endphp



@if ($first)

@php
$hourse_enter = explode_ext($first->enter,':','0');
$minute_enter = explode_ext($first->enter,':','1');
 @endphp


@if((($hourse_enter - $hourse_float) >= 0)&&(($minute_enter - $minutefloat)>0))
<a href="{{ route('dashboard.admin.score.create', [ 'fine' ]) }}"  target="_blank" >
    <div class="alert alert-secondary no-dismiss">
        <button type="button" class="close" data-dismiss="alert">×</button>

   باتوجه به تاخیر
    {{  $hourse_enter - $hourse_float }}  ساعت و  {{  $minute_enter - $minutefloat }} دقیقه
 کاربر {{$item->name}}  مستلزم جریمه می باشد!

</div>
</a>
@endif

 @elseif (empty($first))

 @if((($hourse_now - $hourse_float) >= 0)&&(($minute_now - $minutefloat)>0))

 <a href="{{ route('dashboard.admin.score.create', [ 'fine' ]) }}"  target="_blank" >
    <div class="alert alert-danger no-dismiss">
        <button type="button" class="close" data-dismiss="alert">×</button>
 باتوجه به غیبت
کاربر {{$item->name}} تا اکنون در محل کار خود مستلزم جریمه می باشد!

</div>
</a>

@endif
  @endif




@endif
