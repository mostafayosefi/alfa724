
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
    <i class="nav-icon fas fa-search"></i>
    <p>
    Search
    <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
    <li class="nav-item">
    <a href="pages/search/simple.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Simple Search</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="pages/search/enhanced.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Enhanced</p>
    </a>
    </li>
    </ul>
    </li>
@endif



