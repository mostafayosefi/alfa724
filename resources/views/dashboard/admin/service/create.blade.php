<?php use Hekmatinasser\Verta\Verta; ?>
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
    <x-breadcrumb-item title="مدیریت مشتری ها" route="dashboard.admin.customer.manage" />
    <x-breadcrumb-item title="ساخت سرویس جدید برای مشتری" route="dashboard.admin.service.create" />
@endsection
@section('content')

@if($customer_id)

<div class="col-md-12">
    <x-card type="info">
         @include('dashboard.admin.customer.detial')
    </x-card>
</div>

@endif


        @include('dashboard.card.service.create')




@endsection
