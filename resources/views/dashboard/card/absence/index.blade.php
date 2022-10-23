
    <div class="col-md-12">
        <x-card type="success">
            <x-card-header>مدیریت حضور غیاب ها</x-card-header>
                <x-card-body>
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>کاربر</th>
                            <th>تاریخ</th>
                            <th>ساعت ورود</th>
                            <th>ساعت خروج</th>
                            <th>مقدار ساعت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($absence as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->user->first_name }} {{ $item->user->last_name }}</td>
                                <td>{!! Facades\Verta::instance($item->date)->formatDate() !!}</td>
                                <td>{{ $item->enter }}</td>
                                <td>{{ $item->exit }}</td>
                                @if($item->exit != NULL)
                                <td>{{ \Carbon\CarbonInterval::seconds((int)$item->hours)->cascade()->forHumans(['join' => true]) }}</td>
                                @else
                                <td>کاربر پایان کار نزده است</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ردیف</th>
                            <th>کاربر</th>
                            <th>تاریخ</th>
                            <th>ساعت ورود</th>
                            <th>ساعت خروج</th>
                            <th>مقدار ساعت</th>
                        </tr>
                        </tfoot>
                    </table>
                </x-card-body>
                <x-card-footer>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="pagination">
                                {{$absence->links()}}
                            </ul>
                        </div>
                    </div>
             </x-card-footer>

        </x-card>
    </div>
