
    <div class="col-md-12">
        <x-card type="primary">
            <x-card-header>  مشاهده مسئولیت ها</x-card-header>
            <x-card-body>
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عنوان</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th>تاریخ ایجاد</th>
                            <th>وضعیت</th>
                            <th>ویرایش</th>
                        </tr>
                        </thead>
                            <tbody>
                         @foreach($task as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->start_date->formatJalali() }}</td>
                                <td>{{$item->finish_date->formatJalali()}}</td>


                                <td>{{ date_frmat($item->created_at) }}</td>
                                <td>
                                  @if ($item->status=='done')
                                    <p style="color:green;"> انجام شده </p>
                                  @else
                                    <p style="color:red;">انجام نشده</p>
                                  @endif
                                </td>
                                <td>
                                <button class="btn btn-warning" type="submit" data-target="#modal-lf{{ $item->id }}" data-toggle="modal">
                                    <i class="fas fa-edit"></i> ویرایش</button>
                                </td>
                            </tr>
                         @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th>تاریخ ایجاد</th>
                                <th>وضعیت</th>
                                <th>ویرایش</th>
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
