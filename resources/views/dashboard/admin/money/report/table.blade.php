@if($type=='depo')
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>  تاریخ واریزی </th>
                        <th>مشتری  </th>
                        <th>مبلغ واریزی</th>
                        <th>کاربر پروژه  </th>
                        <th>مشخصات پروژه</th>
                    </tr>
                    </thead>
                        <tbody>
                     @foreach($price_my_services as $item)
                        <tr>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->my_service->customer->customer_name }}</td>
                            <td>{{ number_format($item->price) }} تومان</td>
                            <td>{{ $item->my_service->user->first_name }} {{ $item->my_service->user->last_name }}</td>
                            <td>{{ $item->my_service->name }}</td>
                        </tr>

                     @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>  تاریخ واریزی </th>
                            <th>مشتری  </th>
                            <th>مبلغ واریزی</th>
                            <th>کاربر پروژه  </th>
                            <th>مشخصات پروژه</th>
                        </tr>
                        </tfoot>
                </table>
                @endif
                @if($type=='service')
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>  نام پروژه </th>
                        <th>مشتری  </th>
                        <th>مبلغ کل پروژه</th>
                        <th>کاربر پروژه  </th>
                        <th>تاریخ شروع پروژه</th>
                        <th>تاریخ پایان پروژه</th>
                    </tr>
                    </thead>
                        <tbody>
                     @foreach($my_services as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->customer->customer_name }}</td>
                            <td>{{ number_format($item->price) }} تومان</td>
                            <td>{{ $item->user->first_name }} {{ $item->user->last_name }}</td>
                            <td>{{ date_frmat_ymd($item->startdate) }}</td>
                            <td>{{ date_frmat_ymd($item->enddate) }}</td>

                        </tr>

                     @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>  نام پروژه </th>
                            <th>مشتری  </th>
                            <th>مبلغ کل پروژه</th>
                            <th>کاربر پروژه  </th>
                            <th>تاریخ شروع پروژه</th>
                            <th>تاریخ پایان پروژه</th>
                        </tr>
                        </tfoot>
                </table>
                @endif
