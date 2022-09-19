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
        <x-card type="info">
            <x-card-header>تنطیمات امتیازات</x-card-header>
            <x-card-body>
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>نوع امتیازدهی</th>
                        <th>مقدار امتیاز</th>
                        <th>توضیحات</th>
                        <th>ویرایش</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($score_settings as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td style="direction:ltr">{{ $item->value }}</td>
                            <td>{{ $item->text }}</td>
                            <td>
@include('dashboard.ui.modal_edit', [$item , 'myname' => 'تنظیمات امتیاز '.$item->name ,
'class_modal' => 'modal-lg'  ,'class_content' => ''  ,'ui' => 'dashboard.admin.score.setting.edit'  ])

                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>مقدار</th>
                        <th>کاربر</th>
                        <th>توضیحات</th>
                        <th>ویرایش</th>
                    </tr>
                    </tfoot>
                </table>
            </x-card-body> 
        </x-card>
    </div>
@endsection
