
        <x-card type="primary">
            <x-card-header>مدیریت گزارش ها</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام کاربر</th>
                                <th>   مسئولیتها</th>
                                <th>    حضور و غیاب</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($users as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                    <td> <a href="{{route('dashboard.admin.report.show',['id'=>$item->id   ])}}" class="btn  bg-gradient-success btn-sm">    مشاهده </a></td>
                                    <td> <a href="{{route('dashboard.admin.report.absence',['id'=>$item->id])}}" class="btn  bg-gradient-primary btn-sm">  مشاهده   </a></td>
                                </tr>
                             @endforeach
                                </tbody>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                </x-card-footer>
        </x-card>


