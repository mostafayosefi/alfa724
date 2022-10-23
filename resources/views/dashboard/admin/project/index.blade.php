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
    <x-breadcrumb-item title="{{ $project->title }}" route="dashboard.admin.project.index" />
@endsection
@section('content')

<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

@include('dashboard.admin.phase.create', ['id' => $project->id])
@include('dashboard.admin.phase.updatepost', ['posts' => $phase, 'id' => $project->id])


@include('dashboard.card.task.create' , [ 'route' => route('dashboard.admin.daily.store') , 'users' => $users ] )
@include('dashboard.card.task.edit', [ 'route' =>  route('dashboard.admin.daily.editdaily') , 'users' => $users , 'task' => $tasks  ] )


{{-- @include('dashboard.admin.task.create', ['id' => $project->id, 'phase' => $phase, 'posts' => $users]) --}}
{{-- @include('dashboard.admin.task.updatetask', ['id' => $project->id, 'phase' => $phase, 'users' => $project->users, 'posts' => $tasks]) --}}
@include('dashboard.admin.employee.create', ['users' => $all_users, 'project' => $project])
@include('dashboard.admin.employee.updateemployee', ['posts' => $users, 'salaries' => $salaries])
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


@include('dashboard.card.money.create' , [ 'flag' => 'depo' , 'item' => $project ] )
@include('dashboard.card.money.create' , [ 'flag' => 'cost' , 'item' => $project ] )
@include('dashboard.card.money.edit' , [ 'route' => '#' , 'items' => $project->price_my_projects  ] )


    <div class="col-md-12">
        <x-card type="primary">


            @if($project->customer)
            @include('dashboard.admin.customer.detial' , [ 'customer' =>$project->customer  ])
            @else
            مشتری این پروژه هنوز مشخص نشده است
            @endif



@include('dashboard.card.project.detial')
@include('dashboard.card.phase.table')







                        @include('dashboard.card.project.users')



                        @include('dashboard.card.task.index' , [ $users , 'task' => $tasks ])








                    </div>




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
        </x-card>
    </div>


    <div class="row">

    <div class="col-md-6">
        <x-card type="info">


 @include('dashboard.card.money.list_price' , [ 'flag' => 'depo' , 'item' => $project , 'items' => $project->price_my_projects ] )


        </x-card>
    </div>

    <div class="col-md-6">
        <x-card type="info">

            @include('dashboard.card.money.list_price' , [ 'flag' => 'cost' , 'item' => $project , 'items' => $project->price_my_projects ] )

        </x-card>
    </div>
    <div class="col-md-12">


    @include('dashboard.card.money.table_price_sum',[  'item' => $project ])
    {{-- @include('dashboard.card.service.footer') --}}

    </div>
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
