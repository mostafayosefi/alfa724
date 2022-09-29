@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index"/>
<<<<<<< HEAD
    <x-breadcrumb-item title="    مدیریت نقش ها" route="dashboard.admin.permission.index"/>
=======
    <x-breadcrumb-item title="    مدیریت نقش ها" route="dashboard.admin.score.index"/>
>>>>>>> 6d5953f577c34bb52297a8b3af8c763c85331fd0
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

    <div class="col-md-3"></div>

    <div class="col-md-6">
        <x-card type="primary">
            <x-card-header>  ایجاد نقش جدید</x-card-header>
            <x-card-body>

<<<<<<< HEAD
                <form style="padding:10px;" action="{{route('dashboard.admin.permission.store')}}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

                    @csrf


                    <div class="form-group">
                        <label for="name">نام نقش </label>
                      <input type="text" class="form-control" required  name="name" value="{{ old('name') }}" placeholder="  نام"  >
=======
                <form style="padding:10px;" action="#" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    <div class="form-group">
                        <label for="first_name">نام نقش </label>
                      <input type="text" class="form-control" required  name="first_name" value="{{ old('first_name') }}" placeholder="  نام"  >
>>>>>>> 6d5953f577c34bb52297a8b3af8c763c85331fd0
                    </div>





                    <div class="card card-success">
                        <div class="card-header">
                        <h3 class="card-title"> فعالسازی دسترسی های نقش کاربری </h3>
                        </div>
                        <div class="card-body">

                        <div class="row">
                        <div class="col-sm-6">


                            @foreach ($permissions as $permission )

                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
<<<<<<< HEAD
                                    <input type="checkbox" id="permission{{$permission->id}}"
                                    name="permission[]" value="{{$permission->id}}" >
                                    <label for="permission{{$permission->id}}">
=======
                                    <input type="checkbox" id="permission{{ $permission->id }}"
                                    name="permission{{ $permission->id }}" value="active" >
                                    <label for="permission{{ $permission->id }}">
>>>>>>> 6d5953f577c34bb52297a8b3af8c763c85331fd0
                                        &nbsp; &nbsp; &nbsp;     {{ $permission->name }}
                                    </label>
                                </div>
                                </div>

                            @endforeach


                        </div>
                        </div>



                        </div>

                    {{-- test --}}

{{--
                    <div class="form-group">
                        <label for="name">توضیحات  </label>
                    <textarea type="text" class="form-control" name="text"  placeholder="توضیحات"></textarea>
                    </div> --}}



                <div class="card-footer">
                    <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;" class="btn btn-primary">ایجاد</button>
                </div>




                </form>


            </x-card-body>
        </x-card>
    </div>
    <div class="col-md-3"></div>

    </div>
@endsection
