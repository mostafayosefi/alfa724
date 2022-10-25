

     @include('dashboard.ui.multiseteps')


     {{-- is-actived --}}
     {{-- is-active --}}
     {{-- deactived --}}


<ul class="list-unstyled multi-steps">
    <li  class=" @if($level == 'project') is-active @else is-actived @endif "><a href="{{ route('dashboard.admin.project.step' , [ $id , 'project' ] ) }}">اطلاعات پروژه</a> </li>
    <li   class="@if($level == 'phase') is-active @else is-actived @endif "  ><a href="{{ route('dashboard.admin.project.step' , [ $id , 'phase' ] ) }}"> فازها</a></li>
    <li   class="@if($level == 'employee') is-active @else is-actived @endif "   ><a href="{{ route('dashboard.admin.project.step' , [ $id , 'employee' ] ) }}" > کاربران</a></li>
    <li   class="@if($level == 'task') is-active @else is-actived @endif "   ><a href="{{ route('dashboard.admin.project.step' , [ $id , 'task' ] ) }}" > مسئولیتها</a></li>
    <li   class="@if($level == 'finical') is-active @else is-actived @endif "   ><a href="{{ route('dashboard.admin.project.step' , [ $id , 'finical' ] ) }}" > مالی</a></li>
</ul>
