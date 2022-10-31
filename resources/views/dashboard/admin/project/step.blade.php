@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/MDTimePicker/mdtimepicker.min.css') }}">
    <style>
        .mdtimepicker {
            direction: ltr;
            text-align: left;
        }
    </style>
@endsection
@section('hierarchy')
<x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
<x-breadcrumb-item title="مدیریت پروژه ها" route="dashboard.admin.project.manage" />
<x-breadcrumb-item title="{{ $project->title }}" route="dashboard.admin.project.step" />
@endsection
@section('content')

<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>


@if($level=='phase')
@include('dashboard.admin.phase.create', ['id' => $project->id])
@include('dashboard.admin.phase.updatepost', ['posts' => $phase, 'id' => $project->id])
@endif


@if($level=='employee')
@include('dashboard.admin.employee.create', ['users' => $all_users, 'project' => $project])
@include('dashboard.admin.employee.updateemployee', ['posts' => $users, 'salaries' => $salaries])
@endif

@if($level=='task')
@include('dashboard.card.task.create' , [ 'route' => route('dashboard.admin.daily.store') , 'users' => $users ] )
@include('dashboard.card.task.edit', [ 'route' =>  route('dashboard.admin.daily.editdaily') , 'users' => $users , 'task' => $tasks  ] )
@endif

@if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
@if(Session::has('error'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
        </div>
    </div>
@endif



<div class="col-12">
    <x-card type="primary">


@if($level=='finical')
@include('dashboard.card.money.create' , [ 'flag' => 'depo' , 'item' => $project ] )
@include('dashboard.card.money.create' , [ 'flag' => 'cost' , 'item' => $project ] )
@include('dashboard.card.money.edit' , [ 'route' => '#' , 'items' => $project->price_my_projects  ] )

@endif




<div class="col-12">
    <x-card type="primary">
        <x-card-body>
            @include('dashboard.card.project.multiseteps')
        </x-card-body>
    </x-card>
</div>



    <div class="col-md-12">

            @if($level=='project')
            @if($project->customer)
            @include('dashboard.admin.customer.detial' , [ 'customer' =>$project->customer  ])
            @else
            مشتری این پروژه هنوز مشخص نشده است
            @endif

@include('dashboard.card.project.detial')
@endif

@if($level=='phase')
@include('dashboard.card.phase.table')
@endif

@if($level=='employee')
@include('dashboard.card.project.users')
@endif

@if($level=='task')
@include('dashboard.card.task.index' , [ $users , 'task' => $tasks ])
@endif

                    </div>




                    @if($level=='finical')
            <x-card-footer>
            <!--
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">
                        @if($project->status != 'done')
                            <a class="btn btn-warning w-100 m-2" href="{{ route("dashboard.admin.project.updatestatus", ['id'=>$id,'status'=>'done']) }}">به اتمام‌رساندن پروژه</a>
                        @endif
                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        @if($project->status != 'paid')
                            <a class="btn btn-success w-100 m-2" href="{{ route("dashboard.admin.project.updatestatus", ['id'=>$id,'status'=>'paid']) }}">پروژه تسویه شده</a>
                        @endif
                    </div>
                </div>
            -->
            </x-card-footer>
            @endif
    </div>


    @if($level=='finical')
<<<<<<< HEAD



    <div class="row">
    <div class="col-md-6">
        <x-card type="info">
 @include('dashboard.card.money.list_price' , [ 'flag' => 'depo' , 'item' => $project , 'items' => $price_my_project_depo ] )
=======
    <div class="row">
    <div class="col-md-6">
        <x-card type="info">
 @include('dashboard.card.money.list_price' , [ 'flag' => 'depo' , 'item' => $project , 'items' => $project->price_my_projects ] )
>>>>>>> refs/remotes/origin/master


        </x-card>
    </div>

    <div class="col-md-6">
        <x-card type="info">

<<<<<<< HEAD
            @include('dashboard.card.money.list_price' , [ 'flag' => 'cost' , 'item' => $project , 'items' => $price_my_project_cost ] )
=======
            @include('dashboard.card.money.list_price' , [ 'flag' => 'cost' , 'item' => $project , 'items' => $project->price_my_projects ] )
>>>>>>> refs/remotes/origin/master

        </x-card>
    </div>
    <div class="col-md-12">


    @include('dashboard.card.money.table_price_sum',[  'item' => $project ])
    {{-- @include('dashboard.card.service.footer') --}}

    </div>




    </div>

    @endif
{{--
<div class="row" style=""  >

    @if($level != 'project')
<div class="col-3 col-md-3 col-lg-3"  >
    <a class="btn btn-primary w-100 r-2" href="{{ route('dashboard.admin.project.step' , [ $id , step_btn_footer('perv' , $level) ] ) }}"> مرحله قبلی</a>
</div>
@endif

<div class="col-9 col-md-9 col-lg-9"  ></div>

@if($level != 'taskk')
<div class="col-3 col-md-3 col-lg-3"  >
        <a class="btn btn-primary w-100 r-2" href="{{ route('dashboard.admin.project.step' , [ $id , step_btn_footer('next' , $level) ] ) }}"> مرحله بعدی</a>
</div>
@endif

</div> --}}



</x-card>
</div>


    @endsection

@section('scripts')
    <script src="{{ asset('assets/dashboard/plugins/MDTimePicker/mdtimepicker.min.js') }}"></script>
    <script>
        mdtimepicker('.mdtimepicker-input', {
            is24hour: true,
        });
        @if(Session::has('show-create-employee'))
            $(window).on('load', function() {
                $('#modal-create-employee').modal('show');
            });
        @endif
    </script>
@endsection
