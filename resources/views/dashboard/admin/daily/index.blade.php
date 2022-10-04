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

<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

@include('dashboard.card.task.edit', [ 'route' =>  route('dashboard.admin.daily.editdaily')  ] )
@include('dashboard.card.task.index')

@endsection
