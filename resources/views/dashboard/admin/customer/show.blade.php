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

            @include('dashboard.admin.customer.detial')



<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">  پروژه های مشتری</h3>
    </div>
@foreach($projects as $item)
@include('dashboard.card.project.detial' , [ 'project' => $item ] )
 @endforeach
</div>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">  خدمات مشتری</h3>
    </div>
@foreach($my_services as $item)
 @include('dashboard.admin.service.list-service')
 @endforeach
</div>


</div>

@endsection
