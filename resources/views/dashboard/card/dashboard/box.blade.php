
          <div class="small-box bg-{{$box_bg}}">
            <div class="inner">
              <h3>{{$box_header}}</h3>
              <p>{{$box_titr}}</p>
            </div>
            @if($box_icon)
            <div class="icon">
              <i class="{{$box_icon}}"></i>
            </div>
            @endif

            @if($box_route)
            <a href="{{$box_route}}"
            class="small-box-footer">{{$box_more}}<i class="{{$box_more_icon}}"></i></a>
            @endif
          </div>
