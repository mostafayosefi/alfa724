
<div class="row">
    <div class="col-md-6">

                       <div class="card-body">
                        <h3 class="card-title"><strong> لیست {{ law_name($flag) }} </strong></h3><br>

                        <table id="" class="table table-bordered table-hover">
                            <thead>
                                <th>ردیف</th>
                                <th>تاریخ تراکنش {{ law_name($flag) }} </th>
                                <th>توضیحات</th>
                                <th>  مبلغ {{ law_name($flag) }} </th>
                                <th>  حذف {{ law_name($flag) }} </th>

                            </thead>
                                <tbody>
                                @foreach ($item->price_my_services as $key =>  $my_price )
                                @if($my_price->type==$flag)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>  {{ $my_price->date }}</td>
                                    <td>  {!! $my_price->text !!}</td>
                                    <td>
                                        <span class="btn btn-{{ law_style($flag) }}  btn-sm">
                                        {{ number_format($my_price->price) }} تومان </span>  </td>

                                        <td>
 @include('dashboard.ui.modal_delete' , ['myname' =>  law_name($flag).' به مبلغ '.number_format($my_price->price).'تومان'   , 'route' => route('dashboard.admin.daily.destroy' , $item->id  ) ] )

                                        </td>
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                        </table>
                        <div style="max-height:250px;overflow-y:scroll;">
                            {!! $item->description !!}
                        </div>

                        </div>


 <a href="#" class="delete_post"  type="button"  data-toggle="modal" data-target="#modal-lg-{{ $flag }}">
    <span class="btn btn-{{ law_style($flag) }} btn-sm">
    <i class="fa fa-fw fa-plus"></i> ثبت {{  law_name($flag) }}
    </span>
</a>








    </div>
</div>

<hr>

