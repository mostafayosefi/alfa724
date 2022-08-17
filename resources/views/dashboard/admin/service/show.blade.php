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
    <x-breadcrumb-item title="مدیریت سرویس ها" route="dashboard.admin.service.manage" />
    <x-breadcrumb-item title="{{ $post->name }}" route="dashboard.admin.service.index" />
@endsection
@section('content')
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>{{ $post->name }}</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <div class="item-lists">
                            <p>نام و سرویس:{{ $post->name }} </p>
                            <p>تعداد:{{ $post->count }} </p>
                            <p>قیمت:{{ $post->price }} </p>
                            <p>مدت زمان:{{ $post->time }} </p>
                            <p>تاریخ شروع{{ $post->start_date->formatJalali() }} </p>
                            <p>تاریخ پایان:{{ $post->end_date->formatJalali() }} </p>
                        </div>
                        <div style="margin-bottom: 50px; clear:both;"></div>
                        <p>بیعانه:{{ $post->deposit }} </p>
                        <p>تاریخ بیعانه:{{ $post->deposit_date }} </p>
                        <p>بیعانه دوم:{{ $post->deposit2 }} </p>
                        <p>تاریخ بیعانه دوم:{{ $post->deposit_date2 }} </p>
                        <p>بیعانه سوم:{{ $post->deposit3}} </p>
                        <p>تاریخ بیعانه سوم:{{ $post->deposit_date3 }} </p>
                        {!! $post->description !!}
                    </div>
                    </x-card-body>
            <x-card-footer>

            </x-card-footer>
        </x-card>
    </div>

@endsection