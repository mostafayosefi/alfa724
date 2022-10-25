@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت پروژه ها" route="dashboard.admin.project.manage" />
    <x-breadcrumb-item title="مدیریت هزینه کاربران" route="dashboard.admin.money.employee" />
@endsection
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
@include('dashboard.admin.employee.updateemployee', ['posts' => $employee, 'salaries' => $salaries])

    <?php
$spend=0;
foreach ($employee as $key) {
    $spend += $key->cost;
}
$price=0;
$deposits=0;
foreach ($service as $key) {
    $price=$key->price+$price;
    $deposits = $key->deposit+$key->deposit2+$key->deposit3+$key->deposit4+$key->deposit5+$key->deposit6+$key->deposit7+$key->deposit8+$key->deposit9+$deposits;
}
?>
    <div class="col-md-12">
        <div class="row">
            <div class="col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo number_format($price) ?><sup style="font-size: 13px; top:0px;">تومان</sup></h3>

                  <p>درآمد</p>
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
                    <h3><?php echo $spend; ?><sup style="font-size: 13px; top:0px;">تومان</sup></h3>

                  <p>هزینه های انجام شده</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
          </div>
        <x-card type="info">
            <x-card-header>مدیریت هزینه کاربران</x-card-header>
            <x-card-body>
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>نام و نام خانوادگی </th>
                        <th>پروژه</th>
                        <th>تاریخ شروع</th>
                        <th>تاریخ پایان</th>
                        <th>هزینه</th>
                        <th>پروفایل</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    </thead>
                        <tbody>
                     @foreach($employee as $item)
                        <tr>
                            <td>{{ $item->for->first_name }} {{ $item->for->last_name }}</td>
                            <td>{{ $item->project->title }}</td>
                            <td>{!! $item->start_date->formatJalali() !!}</td>
                            <td>{!! $item->finish_date->formatJalali() !!}</td>
                            <td>{{ $item->cost }}</td>
                            <td><a href="{{route('dashboard.admin.users.show',['id'=>$item->for->id])}}" class="btn btn-block btn-outline-primary btn-sm">مشاهده پروفایل</a></td>
                            <td><button type="button" data-toggle="modal" data-target="#modal-edit-employee-{{ $item->id }}" class="btn btn-block bg-gradient-warning btn-sm">ویرایش</button></td>
                            <td>
                                    <a href="#" class="delete_post" ><i class="fa fa-fw fa-eraser"  data-toggle="modal" data-target="#modal-success{{ $item->id }}"></i></a>
                            </td>
                        </tr>
                                <!-- SHOW SUCCESS modal -->
                                   <div class="modal fade show" id="modal-success{{ $item->id }}" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-danger">
                                      <div class="modal-content bg-danger">
                                        <div class="modal-header">
                                          <h4 class="modal-title">{{ $item->content }}</h4>
                                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                                            <span  aria-hidden="true">×</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            آیا می خواهید این  مورد حذف کنید ؟

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-outline-light uncheckd" data-dismiss="modal">خیر</button>
                                           <form  action="#" method="post">
                                               <input type="hidden" name="id" value="{{ $item->id }}" >
                                              <a href="{{route('dashboard.admin.employee.deleteemployee',['id'=>$item->id,'project_id'=>$item->project->id])}}" class="btn btn-outline-light">بله </a>
                                           </form>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                     @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>نام و نام خانوادگی </th>
                            <th>پروژه</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th>هزینه</th>
                            <th>پروفایل</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </tfoot>
                </table>
            </x-card-body>
        </x-card>
    </div>

    @endsection

