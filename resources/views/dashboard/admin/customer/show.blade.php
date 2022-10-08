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
        @media only screen and (max-width:700px){
            .item-lists{
                display:block;
            }
        }
        .item-lists p{
            margin-left:70px;
        }
    </style>
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت مشتری ها" route="dashboard.admin.customer.manage" />
    <x-breadcrumb-item title="{{ $customer->name }}" route="dashboard.admin.customer.show" />
@endsection
@section('content')
    <div class="col-md-12">
        <x-card type="info">

            @include('dashboard.admin.customer.detial')


{{--
<x-card-body>
    <div class="box-body">
        <div style="margin-bottom: 50px; clear:both;"></div>
    @foreach($my_services as $item)
 @include('dashboard.admin.service.list-service')
 <div style="margin-bottom: 50px; clear:both;"></div>
 @endforeach
</div>
</x-card-body> --}}


            <x-card-footer>
            <a href="{{route('dashboard.admin.customer.updatecustomer',['id'=>$customer->id])}}" class="btn btn-warning" >ویرایش مشتری</a>
            <a href="{{route('dashboard.admin.service.create', $customer->id )}}" class="btn btn-success" >ساخت خدمت جدید برای مشتری</a>
            <a href="{{route('dashboard.admin.project.create', $customer->id )}}" class="btn btn-primary" >ساخت پروژه جدید برای مشتری</a>
            </x-card-footer>
        </x-card>
    </div>

@endsection
