

<script>
    function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>

<form style="padding:10px;" action="{{ route('dashboard.admin.score.deleteall') }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
@csrf


    <div class="col-md-12">
        <x-card type="primary">
            <x-card-header>  لیست امتیازات    </x-card-header>
            <x-card-body>
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>


                    <th>ردیف</th>
                    <th>مقدار</th>

                     <th>توضیحات</th>
                    <th>هزینه</th>
                    <th>نوع امتیاز</th>

 @if((explode_url(1)=='admin'))

 <th>کاربر</th>
                    <th> ویرایش</th>
                    <th>حذف </th>
                    <th>حذف همه </th>
                    @endif


                        </tr>
                        </thead>
                            <tbody>
                         @foreach($scores as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td style="direction:ltr">{{ $item->value }}</td>

                                <td >{!! $item->description !!}</td>

                                <td style="direction:rtl">{{number_format($item->price)}} تومان</td>
                                <td style="direction:ltr">
                                @if($item->type=='award')
                                <span class="badge badge-success">پاداش </span>
                                @else

                                <span class="badge badge-warning">جریمه </span>
                                @endif
                                </td>


                                @if((explode_url(1)=='admin'))
                                @if($item->user->name)
                                <td>{{ $item->user->name  }}</td>
                                @endif

                                <td>
                                    <a href="{{route('dashboard.admin.score.edit',['id'=>$item->id ])}}" class="edit_post"
                                      target="_blank"><i class="fas fa-edit"></i></a>
                               </td>

<td>
  @if(explode_url(1)=='admin')
  @include('dashboard.ui.modal_delete_get' , ['myname' => ' '. $item->description , 'route' => route('dashboard.admin.score.destroy_get' , $item->id  ) ] )
   @endif
</td>
<td>

<input name="delete[]" value="{{$item->id}}" type="checkbox" />انتخاب<br />

</td>

                                @endif


                            </tr>
                         @endforeach
                            </tbody>
                            <tfoot>
                            <tr>

                    <th>ردیف</th>
                    <th>مقدار</th>

                     <th>توضیحات</th>
                    <th>هزینه</th>
                    <th>نوع امتیاز</th>

 @if((explode_url(1)=='admin'))  <th>کاربر</th>

 <th> ویرایش</th>
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

         @endif

                            </tr>
                            </tfoot>
                </table>




            </x-card-body>
            @if((explode_url(1)=='admin'))

            <x-card-footer>
                <a href="{{ route('dashboard.admin.score.create' , [ 'award' ]) }}" class="btn btn-success"><i class="fa fa-plus"></i> افزودن امتیاز به کاربر</a>
                <a href="{{ route('dashboard.admin.score.create', [ 'fine' ]) }}" class="btn btn-danger"><i class="icon fas fa-exclamation-triangle"></i> کسر امتیاز از کاربر</a>
            </x-card-footer>

            @endif

            <x-card-footer>
                <ul class="pagination">
                    {{$scores->links()}}
                 </ul>
               </x-card-footer>

        </x-card>
    </div>


</form>
