@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index"/>
    <x-breadcrumb-item title="افزودن مشتری جدید" route="dashboard.admin.customer.create"/>
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

        <div class="col-md-1">

        </div>
        <div class="col-md-10">

            <div class="col-md-12">
                <x-card type="success">
                    <x-card-header>ساخت مشتری جدید</x-card-header>
                    <form style="padding:10px;" action="{{ route('dashboard.admin.customer.store') }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">


            <div class="row">

                <div class="col-md-1">

                </div>
            <div class="col-md-5">

                <div class="form-group">
                    <label for="name">نام و نام خانوادگی مشتری </label>
                  <input type="text" class="form-control input_mystyle"
                  required  name="name" value="{{ old('name') }}" placeholder="  نام و نام خانوادگی مشتری"  >
                </div><hr>

                <div class="form-group">
                    <label for="job">موضوع کسب و کار </label>
                    <input type="text" class="form-control input_mystyle"
                       name="job" value="{{ old('job') }}" placeholder="  موضوع کسب و کار"  >
                    </div><hr>

                <div class="form-group">
                    <label for="referal">   معرف  </label>
                    <input type="text" class="form-control input_mystyle"
                       name="referal" value="{{ old('referal') }}" placeholder="معرف"  >
                    </div><hr>

                <div class="form-group">
                    <label for="host">   هاست  </label>
                    <input type="text" class="form-control input_mystyle"
                       name="host" value="{{ old('host') }}" placeholder="هاست"  >
                    </div><hr>

            </div>

            <div class="col-md-5">

                <div class="form-group">
                    <label for="tells">      تلفن مشتری </label>
                    <input type="text" class="form-control input_mystyle"
                         name="tells" value="{{ old('tells') }}" placeholder="تلفن مشتری "  >
                </div><hr>
                <div class="form-group">
                    <label for="tell">      موبایل مشتری </label>
                    <input type="text" class="form-control input_mystyle"
                    required  name="tell" value="{{ old('tell') }}" placeholder="  موبایل مشتری "  >
                </div><hr>
                <div class="form-group">
                    <label for="email">   آدرس ایمیل    </label>
                    <input type="text" class="form-control input_mystyle"
                       name="email" value="{{ old('email') }}" placeholder="آدرس ایمیل "  >
                    </div><hr>
                    <div class="form-group">
                    <label for="domain">   آدرس سایت    </label>
                    <input type="text" class="form-control input_mystyle"
                       name="domain" value="{{ old('domain') }}" placeholder="آدرس سایت "  >
                    </div><hr>


            </div>

            <div class="col-md-1">

            </div>
            </div>


            <div class="row">

                <div class="col-md-1">

                </div>
            <div class="col-md-10">



                <div class="col-md-12 col-sm-12">
                    <label for="description"> توضیحات:</label>
                    <textarea type="text"  rows="6" class="form-control input_mystyle"
                      name="description" id="summernote"></textarea>
                </div>

            </div>
            <div class="col-md-1">

            </div>
            </div>


            @csrf

            <x-card-footer>
                            <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
                                    class="btn btn-success">ثبت نام مشتری
                            </button>
                        </x-card-footer>
                    </form>
                </x-card>
            </div>
        </div>
        <div class="col-md-1">

        </div>
    </div>

@endsection
