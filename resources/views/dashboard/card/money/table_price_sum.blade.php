<div class="col-6">
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
    <td>  {{ number_format($item->price) }} تومان </td>
    </tr>
    <tr>
    <th style="width:50%">بیعانه های دریافتی:</th>
    <td>  {{ number_format($sumdepo) }} تومان </td>
    </tr>
    <tr>
    <th> هزینه های پرداختی</th>
    <td>  {{ number_format($sumcost) }} تومان </td>
    </tr>
    <tr>
    <th> خالص سود </th>
    <td>  {{ number_format($sumdepo - $sumcost) }} تومان </td>
    </tr>
    <tr>
    <th>مجموع مانده حساب کلی:</th>
    <td> {{ number_format($kolli ) }} تومان</td>
    </tr>
    </tbody></table>
    </div>
    </div>
