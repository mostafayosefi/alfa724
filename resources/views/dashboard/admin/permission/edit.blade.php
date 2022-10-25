@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index"/>
    <x-breadcrumb-item title="    مدیریت نقش ها" route="dashboard.admin.permission.index"/>
@endsection
@section('content')
    @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif


    <div class="row">


    <div class="col-md-12">
        <x-card type="success">
            <x-card-header>  ویرایش نقش {{$role->name}}    </x-card-header>
            <x-card-body>


                <form style="padding:10px;" action="{{route('dashboard.admin.permission.update' , $role->id)}}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    <div class="form-group">
                        <label for="name">نام نقش </label>
                      <input type="text" class="form-control" required  name="name" value="{{$role->name}}" placeholder="  نام"  >
                    </div>
                    @include('dashboard.card.permission.tab_accesses'  )


                <div class="card-footer">
                    <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;" class="btn btn-primary">ویرایش نقش کاربری</button>
                </div>




                </form>


            </x-card-body>
        </x-card>
    </div>

    </div>
@endsection
