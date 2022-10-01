@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مشاهده مسئولیت ها  " route="dashboard.admin.users.admins.index" />
@endsection
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif


@if ($task)
@foreach ($task as $item)
@include('dashboard.employee.task.edit', [ 'route' =>  route('dashboard.employee.task.edittask', $item->id)  ] )
@endforeach
@endif

@include('dashboard.card.task.index')

@endsection
