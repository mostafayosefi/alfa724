@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index"/>
    <x-breadcrumb-item title="  ثبت مدیر جدید  " route="dashboard.admin.users.admins.create" />
@endsection
@section('content')


    <div class="row">

    <div class="col-md-3"></div>

    <div class="col-md-6">
        <x-card type="primary">
            <x-card-header>  ثبت مدیر جدید</x-card-header>
            <x-card-body>


                <form style="padding:10px;" action="{{ route('dashboard.admin.users.admins.store'  ) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

                    @csrf


                    <div class="form-group">
                        <label for="first_name">نام </label>
                      <input type="text" class="form-control input_mystyle" required  name="first_name" value="{{ old('first_name') }}" placeholder="  نام"  >
                    </div>

                    <div class="form-group">
                        <label for="last_name">نام خانوادگی </label>
                      <input type="text" class="form-control input_mystyle" required  name="last_name" value="{{ old('last_name') }}" placeholder="  نام خانوادگی"  >
                    </div>

                    <div class="form-group">
                        <label for="email"> ایمیل   </label>
                      <input type="email" class="form-control input_mystyle" required  name="email" value="{{ old('email') }}" placeholder="  ایمیل  "  >
                    </div>


                    <div class="form-group">
                        <label for="password">  رمزعبور </label>
                      <input type="password" class="form-control input_mystyle" required  name="password" value="{{ old('password') }}"    >
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">  تکرار رمزعبور </label>
                      <input type="password" class="form-control input_mystyle" required  name="password_confirmation" value="{{ old('password_confirmation') }}"    >
                    </div>
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
