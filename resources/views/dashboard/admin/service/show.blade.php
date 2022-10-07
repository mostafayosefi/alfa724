@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('styles')
    <style>
        .mdtimepicker {
            direction: ltr;
            text-align: left;
        }
        .item-lists{
            display:inline-flex;
        }
        .item-lists p{
            margin-left:70px;
        }
    </style>
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت سرویس ها" route="dashboard.admin.service.manage" />
    {{-- <x-breadcrumb-item title="{{ $item->name }}" route="dashboard.admin.service.show" /> --}}
@endsection
@section('content')

<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-success">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
@include('dashboard.card.money.create' , [ 'route' => route('dashboard.admin.daily.store') , 'flag' => 'depo' ] )
@include('dashboard.card.money.create' , [ 'route' => route('dashboard.admin.daily.store') , 'flag' => 'cost' ] )

    <div class="col-md-12">
        <x-card type="info">

            @include('dashboard.admin.customer.detial')

            @include('dashboard.card.money.list_service' , [ 'flag' => 'depo'  ] )
            @include('dashboard.card.money.list_service' , [ 'flag' => 'cost'  ] )

@include('dashboard.card.service.footer')

        </x-card>
    </div>

@endsection
