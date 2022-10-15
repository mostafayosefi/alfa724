@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index"/>
    <x-breadcrumb-item title="تنظیمات امتیازات" route="dashboard.admin.score.index"/>
@endsection
@section('content')
    @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif

    <div class="col-md-12">
        <x-card type="primary">
            <x-card-header>تنطیمات امتیازات</x-card-header>
            <x-card-body>
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>نوع امتیازدهی</th>
                        <th> امتیاز جریمه</th>
                        <th> امتیاز پاداش</th>
                        <th> هزینه جریمه</th>
                        <th> هزینه پاداش</th>
                        <th>ویرایش تنظیمات امتیاز</th>
                        <th>ویرایش تنظیمات مالی</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($score_settings as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td style="direction:ltr"><span class="badge badge-warning">{{ $item->value }} امتیاز</span></td>
                            <td style="direction:ltr"><span class="badge badge-primary">{{ $item->value_award }} امتیاز</span></td>
                            <td style=""><span class="badge badge-danger">{{ number_format($item->price) }} تومان</span></td>
                            <td style=""><span class="badge badge-success">{{ number_format($item->price_award) }} تومان</span></td>
                            <td>
@include('dashboard.ui.modal_edit', [$item , 'myname' => 'تنظیمات امتیاز '.$item->name ,
'class_modal' => 'modal-lg'  ,'class_content' => 'success'  ,'ui' => 'dashboard.admin.score.setting.edit'  ])

                            </td>
                            <td>
@include('dashboard.ui.modal_edit2', [$item , 'myname' => 'تنظیمات مالی '.$item->name ,
'class_modal' => 'modal-lg'  ,'class_content' => ''  ,'ui' => 'dashboard.admin.score.setting.editfinical'  ])

                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </x-card-body>
        </x-card>
    </div>
@endsection
