

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
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عنوان</th>

                            @if((explode_url(1)=='admin')&&(explode_url(3)=='alluser'))
                            <th>کاربر</th>
    @endif
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th>تاریخ ایجاد</th>
                            <th>وضعیت</th>
                            <th>ویرایش</th>
                            <th>حذف </th>
                            <th>حذف همه </th>
                        </tr>
                        </thead>
                            <tbody>
                         @foreach($task as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->title }}</td>
                                @if((explode_url(1)=='admin')&&(explode_url(3)=='alluser'))
                                @if($item->user->name)
                                <td>{{ $item->user->name  }}</td>
                                @endif
                                @endif
                                <td>{{ $item->start_date->formatJalali() }}  {{ date_frmat_b($item->start_time) }}</td>
                                <td>{{$item->finish_date->formatJalali()}} {{ date_frmat_b($item->finish_time) }}</td>


                                <td>{{ date_frmat($item->created_at) }}</td>
                                <td>
                                  @if ($item->status=='done')
                                    <p style="color:green;"> انجام شده </p>
                                  @else
                                    <p style="color:red;">انجام نشده</p>
                                  @endif
                                </td>
                                <td>
                                <button class="btn btn-warning" type="button" data-target="#modal-lf{{ $item->id }}" data-toggle="modal">
                                    <i class="fas fa-edit"></i> ویرایش</button>
                                </td>

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
 </td>
 <td>

<input name="delete[]" value="{{$item->id}}" type="checkbox" />انتخاب<br />

</td>

                            </tr>
                         @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>

                                @if((explode_url(1)=='admin')&&(explode_url(3)=='alluser'))
                                 <th>کاربر</th>
                                 @endif

                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th>تاریخ ایجاد</th>
                                <th>وضعیت</th>
                                <th>ویرایش</th>
                                <th>حذف </th>
                                    <th>

                                <input type="checkbox" onclick="toggle(this);" />  حذف همه
                                <br>
                                <x-card-footer>
                                    <button type="submit" style=""
                                            class="btn btn-primary">     حذف همه موارد
                                    </button>
                 </x-card-footer>
                            </th>
                            </tr>
                            </tfoot>
                </table>




            </x-card-body>

            <x-card-footer>
                <ul class="pagination">
                    {{$task->links()}}
                 </ul>
               </x-card-footer>

        </x-card>
    </div>


</form>
