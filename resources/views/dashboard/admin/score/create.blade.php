@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index"/>
    <x-breadcrumb-item title="افزودن/کسر امتیاز" route="dashboard.admin.score.create"/>
@endsection
@section('content')
    @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif


<script>
    function fetch_score_setting(vall){
        var vall = document.getElementById("score_setting_id").value;$.ajax({
            type: 'get',
            url: '../../../../dashboard/admin/fetch/score_setting/'+vall+'/{{ $value }}',
        data: {get_option:vall},
        success: function (response) {document.getElementById("score_setting_input").innerHTML=response;}
    });
        }
</script>

    <div class="row">

        @php
            if($value=='award'){
                $style_card = 'success';
                $my_title = 'افزودن امتیاز';
            }else{
                $style_card = 'danger';
                $my_title = 'کسر امتیاز';
            }
        @endphp


@include('dashboard.ui.java-price')

    <div class="col-md-2"></div>
    <div class="col-md-8">
        <x-card type="{{ $style_card }}">
            <x-card-header>  {{ $my_title }}  </x-card-header>
            <form style="padding:10px;" action="{{ route('dashboard.admin.score.store' , [ $value ]) }}"
                  method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
                @csrf
                <x-card-body>

          @include('dashboard.ui.selectbox', [ 'allforeachs' => $users ,
          'input_name' => 'name'  ,  'name_select' => 'کاربر' ,
          'value' =>    old('user_id')  , 'required'=>'required'  ,
           'index_id'=>'user_id' ]) <hr>

          @include('dashboard.ui.selectbox', [ 'allforeachs' => $score_settings ,
          'input_name' => 'name'  ,  'name_select' => 'نوع امتیازدهی' ,
          'value' =>    old('score_setting_id')  , 'required'=>'required'  ,
           'index_id'=>'score_setting_id' ]) <hr>


<div id="score_setting_input"></div>
<hr>
                </x-card-body>
                <x-card-footer>
                    <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
                            class="btn btn-{{ $style_card }}">{{ $my_title }}
                    </button>
                </x-card-footer>
            </form>
        </x-card>
    </div>
    <div class="col-md-2"></div>
</div>
@endsection
