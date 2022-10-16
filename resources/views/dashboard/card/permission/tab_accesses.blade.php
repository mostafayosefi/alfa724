
    <div class="card">
        <div class="card-header p-2">
        <ul class="nav nav-pills">
        @foreach ($permissions as $key => $permission )
            <li class="nav-item"><a class="nav-link @if($key=='0') active @endif" href="#{{$permission->link}}" data-toggle="tab">{{$permission->name}}</a></li>
        @php $key++; @endphp
        @endforeach
         </ul>
        </div>
        <div class="card-body">
        <div class="tab-content">

        @foreach ($permission_roles as $key => $permission_role )
        <div class="@if($key=='0') active @endif tab-pane" id="{{$permission_role->permission_accesse->permission->link}}">
        @if($permission_role->permission_accesse->id==$permission_role->permission_accesse_id)
        {{-- {{$permission_role->permission_id}}/ {{$permission_role->permission_accesse->id}}/ --}}
        @foreach ($permission_roles as  $permission )
        @if($permission_role->permission->id==$permission->permission_id)
        <div class="col-md-4">
        <div class="form-group clearfix">
            <div class="icheck-primary d-inline">
                <input type="checkbox" @if ($oper=='show') disabled @endif  id="permission{{$permission->permission_accesse->id}}"
                name="permission[]" value="{{$permission->permission_accesse->id}}"
                 @if($permission->status=='active') checked @endif  >
                <label for="permission{{$permission->permission_accesse->id}}">
                    &nbsp; &nbsp; &nbsp;     {{ $permission->permission_accesse->name }}
                </label>
            </div>
            </div>
            </div>
            @endif
            @endforeach
        @endif
        </div>
        @endforeach
        </div>
        </div>
    </div>
