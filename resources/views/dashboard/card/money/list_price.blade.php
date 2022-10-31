

        <x-card type="primary">
            <x-card-header>   لیست {{ law_name($flag) }}       </x-card-header>
            <x-card-body>


                        <table
@if($flag=='depo')  id="example" @else  id="example1" @endif
                         class="table table-bordered table-hover">
                            <thead>
                                <th>ردیف</th>
                                <th>تاریخ تراکنش {{ law_name($flag) }} </th>
                                @if((explode_url(3)=='index_project'))
                                <th>نام پروژه</th>
                                @endif
                                <th>توضیحات</th>
                                <th>  مبلغ {{ law_name($flag) }} </th>
                                <th>  حذف {{ law_name($flag) }} </th>

                            </thead>
                                <tbody>
                                 @foreach ($items as $key =>  $my_price )
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>  {{ $my_price->date }}</td>
                                    @if((explode_url(3)=='index_project'))
                                    <td>  {{ $my_price->project->title }}</td>
                                    @endif
                                    <td>  {!! $my_price->description !!}</td>
                                    <td>
<<<<<<< HEAD
                                        <span class="btn btn-{{ law_style($my_price->type) }}  btn-sm"  type="button"  data-toggle="modal"   data-target="#modal-lg-edit-money{{ $my_price->type }}{{ $my_price->id }}" >
=======
                                        <span class="btn btn-{{ law_style($flag) }}  btn-sm"  type="button"  data-toggle="modal"   data-target="#modal-lg-edit-money{{ $flag }}{{ $my_price->id }}" >
>>>>>>> refs/remotes/origin/master
                                        {{ number_format($my_price->price) }} تومان </span>  </td>

                                        <td>
@php

 if((explode_url(2)=='project')||(explode_url(3)=='index_project')){
    $route_delete = route('dashboard.admin.project.destroy_price' , $my_price->id  ) ; }
 if(explode_url(2)=='service'){
    $route_delete = route('dashboard.admin.service.destroy_price' , $my_price->id  ) ; }
 if(explode_url(3)=='index_system'){
    $route_delete = route('dashboard.admin.money.destroy_price' , $my_price->id  ) ; }
@endphp

 @include('dashboard.ui.modal_delete' , ['myname' =>  law_name($my_price->type).' به مبلغ '.number_format($my_price->price).'تومان'
  , 'route' => $route_delete , 'item' =>$my_price ] )

                                        </td>
                                </tr>
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
                                    {{ number_format(sum_price_depocost($items,$flag,'service')) }}
                                    @endif
                                    @if((explode_url(2)=='project')||(explode_url(3)=='index_project'))
                                    {{ number_format(sum_price_depocost($items,$flag,'project')) }}
                                    @endif
                                    @if(explode_url(3)=='index_system')
                                    {{ number_format(sum_price_depocost($items,$flag,'system')) }}
                                    @endif

                                     تومان </span>
                            </td>
                            </tr>


                            </tbody></table>


                        </x-card-body>
                    </x-card>

 @if((explode_url(2)=='service')||(explode_url(2)=='project'))
 <a href="#" class="delete_post"  type="button"  data-toggle="modal" data-target="#modal-lg-{{ $flag }}">
    <span class="btn btn-{{ law_style($flag) }} btn-sm">
    <i class="fa fa-fw fa-plus"></i> ثبت {{  law_name($flag) }}
    </span>
</a>
@endif
 @if((explode_url(3)=='index_system'))
 <a href="{{route('dashboard.admin.money.create' , [ $parametr ])}}" class="delete_post"  >
    <span class="btn btn-{{ law_style($flag) }} btn-sm">
    <i class="fa fa-fw fa-plus"></i> ثبت {{  law_name($flag) }}
    </span>
</a>
@endif






