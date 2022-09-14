<div class="row">
    <div class="col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{number_format(price_finical(auth()->user()->id,'depo','null','null'))}}<sup style="font-size: 13px; top:0px;">تومان</sup></h3>

          <p>بیعانه های دریافتی</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class=" col-6">
      <!-- small box -->
      <div class="small-box bg-danger" >
        <div class="inner">
            <h3>{{number_format(price_finical(auth()->user()->id,'income','null','null'))}}<sup style="font-size: 13px; top:0px;">تومان</sup></h3>

            <p>درآمد کل پروژه ها</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
  </div>


