
@if($ul=='false')
<li class="nav-item">
    @if(!empty($route))
        <a href="{{ route($route, $routeParam) }}" class="nav-link {{ isActive([$route]) }}">
    @else
        <span class="nav-link">
    @endif
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $title }}
        </p>
    @if(!empty($route))
        </a>
    @else
        </span>
    @endif
</li>
@endif




@if($ul=='true')




@foreach ($multi_route as list($a, $b , $c))
@php
 $arrayName[] =$a; @endphp
@endforeach

<li class="nav-item {{ isActive_open($arrayName) }}">

{{-- <li class="nav-item"> --}}
    <a href="#" class="nav-link">
    <i class="nav-icon {{ $icon }}"></i>
    <p>
        {{ $title }}
    <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview"  >
 @foreach ($multi_route as $key => list($a, $d , $b , $c  ))

<li class="nav-item">
    <a href="{{route($a, $d)}}" class="nav-link {{ isActive([$a]) }}">
    <i class="{{$c}}"></i>
    <p>{{$b}} </p>
    </a>
    </li>

  @endforeach


</ul>
</li>




@endif









