<div class="col-12">


    <x-card type="primary">
        <x-card-header>   لیست کلی تراکنش مالی    </x-card-header>
        <x-card-body>


    @php

    $myprice = $item->price;
 if(explode_url(2)=='project'){
    $sumdepo = sum_price_depocost($item->price_my_projects,'depo','project');
    $sumcost = sum_price_depocost($item->price_my_projects,'cost','project');
 }
 if(explode_url(2)=='service'){

    $sumdepo = sum_price_depocost($item->price_my_services,'depo','service');
    $sumcost = sum_price_depocost($item->price_my_services,'cost','service');
 }

        $kolli = $item->price - $sumdepo;

    @endphp
    <p class="lead">لیست کلی تراکنش مالی</p>
    <div class="table-responsive">
    <table class="table">
    <tbody><tr>
    <th style="width:50%">هزینه کل اعلام شده:</th>
    <td>   {{ price_low_high( $item->price ) }}  </td>
    </tr>
    <tr>
    <th style="width:50%">بیعانه های دریافتی:</th>
    <td>    {{ price_low_high( $sumdepo ) }}  </td>
    </tr>
    <tr>
    <th> هزینه های پرداختی</th>
    <td>   {{ price_low_high( $sumcost ) }}   </td>
    </tr>
    <tr>
    <th> خالص سود </th>
    <td> {{ price_low_high($sumdepo - $sumcost ) }}   </td>
    </tr>
    <tr>
    <th>مجموع مانده حساب کلی:</th>
    <td> {{ price_low_high($kolli ) }}  </td>
    </tr>
    </tbody></table>
    </div>

</x-card-body>
</x-card>
    </div>
