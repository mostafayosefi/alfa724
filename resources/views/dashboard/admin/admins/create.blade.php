@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index"/>
    <x-breadcrumb-item title="تنظیمات امتیازات" route="dashboard.admin.score.index"/>
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
        <x-card type="info">
            <x-card-header>  ثبت مدیر جدید</x-card-header>
            <x-card-body>

                <form style="padding:10px;" action="#" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    <div class="form-group">
                        <label for="name">نام </label>
                      <input type="text" class="form-control" required  name="first_name" value="{{ old('first_name') }}" placeholder="  نام"  >
                    </div>

                    <div class="form-group">
                        <label for="name">نام خانوادگی </label>
                      <input type="text" class="form-control" required  name="last_name" value="{{ old('last_name') }}" placeholder="  نام خانوادگی"  >
                    </div>

                    <div class="form-group">
                        <label for="name"> ایمیل   </label>
                      <input type="email" class="form-control" required  name="email" value="{{ old('email') }}" placeholder="  ایمیل  "  >
                    </div>

                    <div class="form-group">
                        <label for="name">توضیحات  </label>
                    <textarea type="text" class="form-control" name="text"  placeholder="توضیحات"></textarea>
                </div>



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
