 @extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="افزودن پروژه" route="dashboard.admin.project.create" />
@endsection



@section('content')



@if($customer_id)

<div class="col-md-12">
    <x-card type="info">
         @include('dashboard.admin.customer.detial')
    </x-card>
</div>

@endif


    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif


<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">

        @include('dashboard.card.project.create')

        </div>
        <div class="col-md-1">
        </div>
    </div>

 
    @endsection
