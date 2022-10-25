

        <x-card type="primary">
            <x-card-header>   لیست {{ law_name($flag) }}       </x-card-header>
            <x-card-body>


                        <table id="" class="table table-bordered table-hover">
                            <thead>
                                <th>ردیف</th>
                                <th>تاریخ تراکنش {{ law_name($flag) }} </th>
                                <th>توضیحات</th>
                                <th>  مبلغ {{ law_name($flag) }} </th>
                                <th>  حذف {{ law_name($flag) }} </th>

                            </thead>
                                <tbody>
                                 @foreach ($items as $key =>  $my_price )
                                @if($my_price->type==$flag)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>  {{ $my_price->date }}</td>
                                    <td>  {!! $my_price->description !!}</td>
                                    <td>
                                        <span class="btn btn-{{ law_style($flag) }}  btn-sm"  type="button"  data-toggle="modal"   data-target="#modal-lg-edit-money{{ $flag }}{{ $my_price->id }}" >
                                        {{ number_format($my_price->price) }} تومان </span>  </td>

                                        <td>
@php

 if(explode_url(2)=='project'){
    $route_delete = route('dashboard.admin.project.destroy_price' , $my_price->id  ) ; }
 if(explode_url(2)=='service'){
    $route_delete = route('dashboard.admin.service.destroy_price' , $my_price->id  ) ; }
@endphp

 @include('dashboard.ui.modal_delete' , ['myname' =>  law_name($flag).' به مبلغ '.number_format($my_price->price).'تومان'
  , 'route' => $route_delete , 'item' =>$my_price ] )

                                        </td>
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                        </table>

                        <table class="table">
                            <tbody><tr>
                            <th style="width:50%">جمع کل {{law_name($flag)}} های پرداختی:</th>
                            <td>
                                <span class="btn btn-block bg-gradient-secondary btn-sm">
                                    @if(explode_url(2)=='service')
                                    {{ number_format(sum_price_depocost($item->price_my_services,$flag,'service')) }}
                                    @endif
                                    @if(explode_url(2)=='project')
                                    {{ number_format(sum_price_depocost($item->price_my_projects,$flag,'project')) }}
                                    @endif

                                     تومان </span>
                            </td>
                            </tr>


                            </tbody></table>


                        </x-card-body>
                    </x-card>


 <a href="#" class="delete_post"  type="button"  data-toggle="modal" data-target="#modal-lg-{{ $flag }}">
    <span class="btn btn-{{ law_style($flag) }} btn-sm">
    <i class="fa fa-fw fa-plus"></i> ثبت {{  law_name($flag) }}
    </span>
</a>






