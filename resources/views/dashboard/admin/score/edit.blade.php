@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index"/>
    <x-breadcrumb-item title="ویرایش امتیاز" route="dashboard.admin.score.edit"/>
@endsection
@section('content')
    @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif


@include('dashboard.ui.java-price')

    <div class="col-md-12">
        <x-card type="primary">
            <x-card-header>ویرایش امتیاز</x-card-header>
            <form style="padding:10px;" action="{{ route('dashboard.admin.score.update',['id'=>$score->id]) }}"
                  method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <x-card-body>
                    <x-text-group name="user" label="کاربر" :default="empty($score->user) ? 'کاربر حذف شده' : ($score->user->first_name . ' ' . $score->user->last_name)" disabled />
                    <x-text-group name="description_no_textarea" label="توضیحات" :default="$score->description" />
                    <x-text-group  name="value" label="مقدار" type="number" step="any" :model="$score" />



<div class="form-group">
    <label for="price"> هزینه نقدی (به تومان)  </label>
  <input type="text" class="form-control input_mystyle" style="direction: ltr;"
  required  name="price" value="{{number_format($score->price)}}"  id="price"   onkeyup="separateNum(this.value,this);"  placeholder="هزینه جریمه نقدی (به تومان)  "  >
</div><hr>


                </x-card-body>
                <x-card-footer>
                    <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
                            class="btn btn-primary">ارسال
                    </button>
                </x-card-footer>
            </form>
        </x-card>
    </div>
@endsection
