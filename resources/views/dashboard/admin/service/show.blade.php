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
    <x-breadcrumb-item title="{{ $item->name }}" route="dashboard.admin.service.show" />
@endsection
@section('content')
    <div class="col-md-12">
        <x-card type="info">

            @include('dashboard.admin.customer.detial')

            @include('dashboard.admin.service.list-service')

        </x-card>
    </div>

@endsection
