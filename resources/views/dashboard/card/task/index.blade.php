

<script>
    function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>

<form style="padding:10px;" action="{{ route('dashboard.admin.daily.deleteall') }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
@csrf


    <div class="col-md-12">
        <x-card type="primary">
            <x-card-header>  مشاهده مسئولیت ها</x-card-header>
            <x-card-body>


                <div class ="row">
                    <div class ="col-md-6 col-sm-12" style="margin:20px 0px;">
                    </div>
                    <div class ="col-md-6 col-sm-12" style="margin:5px 0px;">
                        <div>
                        <button type="submit" style="float: left;"
                                class="btn btn-danger">     حذف موارد انتخابی
                        </button>
                        <span class="btn btn-success" style="float: left;">
                            <input type="checkbox"  onclick="toggle(this);"   >  انتخاب همه
                        </span>                 </div>
                </div>
                </div>


                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عنوان</th>


                                 @if((explode_url(1)=='admin'))
                                <th>کاربر</th>
                                 @endif
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>

                            @if((explode_url(2)!='project'))
                            <th>تاریخ ایجاد</th>  @endif
                            @if((explode_url(1)=='admin'))
                            <th>تاریخ آپدیت</th>
                             @endif

                            <th>پروژه </th>
                            <th>وضعیت</th>
                            <th>ویرایش</th>
                            @if((explode_url(1)=='admin'))
                           <th>کپی </th>
                            @endif
                            <th>حذف </th>
                        </tr>
                        </thead>
                            <tbody>
                         @foreach($task as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->title }}</td>
                                {{-- @if((explode_url(1)=='admin')&&(explode_url(3)=='alluser')) --}}
                                @if((explode_url(1)=='admin'))
                                @if($item->user)
                                <td>{{ $item->user->name  }}</td>
                                @endif
                                @endif
                                <td>{{ $item->start_date->formatJalali() }}  {{ date_frmat_b($item->start_time) }}</td>
                                <td>{{$item->finish_date->formatJalali()}} {{ date_frmat_b($item->finish_time) }}</td>


                                @if((explode_url(2)!='project'))
                                <td>{{ date_frmat($item->created_at) }}</td> @endif
                                @if((explode_url(1)=='admin'))
                                <td>{{ date_frmat($item->updated_at) }}</td> @endif

                                <td> @if($item->project) {{ $item->project->title  }} @else - @endif </td>

                                <td>
                                  @if ($item->status=='done')
                                    <p style="color:green;"> انجام شده </p>
                                  @else
                                    <p style="color:red;">انجام نشده</p>
                                  @endif
                                </td>
                                <td>
                                <button class="btn btn-warning" type="button" data-target="#modal-lf{{ $item->id }}" data-toggle="modal">
                                    <i class="fas fa-edit"></i></button>
                                </td>

                                @if((explode_url(1)=='admin'))
                                <td>
                                    <a href="{{route('dashboard.admin.daily.duplicate',['id'=>$item->id  ])}}" class="btn btn-block bg-gradient-primary btn-sm">
                                        <i class="nav-icon fas fa-copy"></i>
                                    </a>
                                </td>
                                @endif

 {{-- <td>
    @if(explode_url(1)=='admin')
    @include('dashboard.ui.modal_delete' , ['myname' => 'مسئولیت '. $item->title , 'route' => route('dashboard.admin.daily.destroy' , $item->id  ) ] )
    @elseif (explode_url(1)=='employee')
    @include('dashboard.ui.modal_delete' , ['myname' => 'مسئولیت '. $item->title , 'route' => route('dashboard.employee.task.destroy' , $item->id  ) ] )
    @endif
 </td>  --}}

 <td>
    @if(explode_url(1)=='admin')
    @include('dashboard.ui.modal_delete_get' , ['myname' => 'مسئولیت '. $item->title , 'route' => route('dashboard.admin.daily.destroy_get' , $item->id  ) ] )
    @elseif (explode_url(1)=='employee')
    @include('dashboard.ui.modal_delete_get' , ['myname' => 'مسئولیت '. $item->title , 'route' => route('dashboard.employee.task.destroy_get' , $item->id  ) ] )
    @endif
    <input name="delete[]" value="{{$item->id}}" type="checkbox" />
 </td>

                            </tr>
                         @endforeach
                            </tbody>
                </table>




            </x-card-body>


            {{-- @if(explode_url(1)!='employee') --}}


            <x-card-footer>
                <ul class="pagination">
                    {{$task->links()}}
                 </ul>
            </x-card-footer>


        </x-card>
    </div>

</form>


@if((explode_url(2)=='project'))

<div class="card-footer">
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3">
            <button type="button" data-toggle="modal" data-target="#modal-lg" class="btn btn-success">ثبت مسئولیت جدید برای پروژه</button>
        </div>
    </div>
</div>

@endif

