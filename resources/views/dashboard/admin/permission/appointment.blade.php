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

    {{-- @foreach ($permission_roles->chunk(5) as $chunk)
    @foreach ($chunk as $key => $permission ) --}}



    {{-- @foreach ($permission_roles->chunk(5) as $chunk)
    @foreach ($chunk as $key => $permission ) --}}

    <div class="row">



    <div class="col-md-12">
        <x-card type="primary">
            <x-card-header>  انتصاب مدیر به نقش {{$role->name}}   </x-card-header>
            <x-card-body>


                <form style="padding:10px;" action="{{route('dashboard.admin.permission.appointment.put' , $role->id)}}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

                    @csrf
                    @method('PUT')



        <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">نام نقش </label>
                      <input type="text" class="form-control" required disabled  name="name" value="{{$role->name}}" placeholder="  نام"  >
                    </div>
                    </div>

                    <div class="col-md-6">

@include('dashboard.ui.java-fetch-select')
 @include('dashboard.ui.selectbox', [ 'allforeachs' => $users ,
 'input_name' => 'name'  ,  'name_select' => 'مدیر' ,
 'value' =>   old('user_id') , 'required'=>'required'  , 'index_id'=>'user_id'  , 'onchange'=>'close_select' ])

                    </div>
                    </div>


                    <div id="close_select_input"></div>

                    {{-- $permissions , $permission_roles ,  --}}

  @include('dashboard.card.permission.tab_accesses'  )



<<<<<<< HEAD
=======
                    @include('dashboard.card.permission.tab_accesses' , [ $permissions , $permission_roles , 'oper' => 'show' ] )



>>>>>>> 258f96c65876930f11c495605fa7ae745478f096



 <hr>

<<<<<<< HEAD
=======
 @include('dashboard.ui.selectbox', [ 'allforeachs' => $users ,
 'input_name' => 'name'  ,  'name_select' => 'مدیر' ,
 'value' =>   old('user_id') , 'required'=>'required'  , 'index_id'=>'user_id' ]) <hr>

>>>>>>> 258f96c65876930f11c495605fa7ae745478f096



                <div class="card-footer">
                    <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;" class="btn btn-primary">انتصاب نقش به مدیر</button>
                </div>




                </form>


            </x-card-body>
        </x-card>
    </div>


    </div>
@endsection
