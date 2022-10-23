<x-card type="primary">
    <x-card-header>
        مدیریت پروژه ها
        </x-card-header>
        <x-card-body>
            <div class="box-body">
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>عنوان</th>
                        <th>مسئول پروژه</th>
                        <th>تاریخ شروع</th>
                        <th>تاریخ پایان</th>
                        <th>وضعیت پروژه</th>
                        <th>  عملیات</th>
                    </tr>
                    </thead>
                        <tbody>
                     @foreach($project as $key => $item)
                        <tr>

                            <td>{{$key+1}}</td>
                            <td>{{ $item->title }}</td>
                            <td>@if($item->customer) {{$item->customer->name}} @else هنوزمشخص نشده @endif</td>
                            <td>{{ date_frmat_a($item->start_date) }}</td>
                            <td>{{ date_frmat_a($item->finish_date) }}</td>
                            @if($item->status=='in_progress') <td><span class="btn btn-block bg-gradient-warning btn-sm">در حال انجام</span></td> @endif
                             @if($item->status=='done') <td><span class="btn btn-block bg-gradient-secondary btn-sm"> انجام شده</span></td> @endif
                             @if($item->status=='not_done') <td><span class="btn btn-block bg-gradient-danger btn-sm"> انجام نشده</span></td> @endif
                             @if($item->status=='paid') <td><span class="btn btn-block bg-gradient-success btn-sm"> تسویه شده</span></td> @endif
                            <td>



                                <a href="{{route('dashboard.admin.project.step',['id'=>$item->id , 'project' ])}}" title="مراحل کاری پروژه " class="btn btn-outline-primary btn-sm"><i class="fas fa-user-edit fa-1x"></i></a>
                                <a href="{{route('dashboard.admin.project.index',['id'=>$item->id])}}" title="نمایش پروژه " class="btn btn-outline-success btn-sm"><i class="fas fa-user-edit fa-1x"></i></a>
                                <a href="{{route('dashboard.admin.project.edit',['id'=>$item->id])}}" title="ویرایش "   class="btn btn-outline-success btn-sm" target="_blank"><i class="fas fa-edit fa-1x"></i></a>

                             @include('dashboard.ui.modal_delete', [$item ,'route' => route('dashboard.admin.project.destroy', $item) , 'myname' => 'پروژه '.$item->title ])

                             </td>
                        </tr>
                        <!-- SHOW SUCCESS modal -->
                     @endforeach
                        </tbody>
                </table>
            </div>
            </x-card-body>
        <x-card-footer>
        </x-card-footer>
</x-card>
