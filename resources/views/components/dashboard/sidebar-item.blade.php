
    @if($ul=='false')
<li class="nav-item">
    @if(!empty($route))
        <a href="{{ route($route, $routeParam) }}" class="nav-link @if(Route::current()->getName() == $route) active @endif">
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

<li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-edit"></i>
    <p>
        {{ $title }}
    <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
    <li class="nav-item">
    <a href="../forms/general.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>General Elements</p>
    </a>
    </li>
    </ul>
    </li>

    @php dd($routeParam); @endphp

    @foreach($routeParam() as $item)
    <li class="nav-item">
        <a href="../forms/general.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>ffffff fffff</p>
        </a>
        </li>
        @endforeach
@endif
