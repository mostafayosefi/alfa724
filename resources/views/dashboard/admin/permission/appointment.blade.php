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

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <x-card type="primary">
            <x-card-header>  ویرایش نقش {{$role->name}}    </x-card-header>
            <x-card-body>

                <form style="padding:10px;" action="{{route('dashboard.admin.permission.appointment.put' , $role->id)}}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    <div class="form-group">
                        <label for="name">نام نقش </label>
                      <input type="text" class="form-control" required disabled  name="name" value="{{$role->name}}" placeholder="  نام"  >
                    </div>





                    <div class="card card-success">
                        <div class="card-header">
                        <h3 class="card-title"> نقشهای فعال {{$role->name}} </h3>
                        </div>



                            @foreach ($permission_roles->chunk(5) as $chunk)
                            <div class="card-body">
                            <div class="row">


                            @foreach ($chunk as $key => $permission )
                                                       <div class="col-md-4">


                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" disabled id="permission{{$permission->permission_accesse->id}}"
                                    name="permission[]" value="{{$permission->permission_accesse->id}}"
                                     @if($permission->status=='active') checked @endif  >
                                    <label for="permission{{$permission->permission_accesse->id}}">
                                        &nbsp; &nbsp; &nbsp;     {{ $permission->permission_accesse->name }}
                                    </label>
                                </div>
                                </div>

                                @php $key+1;
                                 $k_hr = fmod($key, 5);
                                if($k_hr==4){ echo '<hr>';}
                                @endphp

                                </div>

                                @endforeach
                            </div>
                            </div>
                                @endforeach

 <hr>

 @include('dashboard.ui.selectbox', [ 'allforeachs' => $users ,
 'input_name' => 'name'  ,  'name_select' => 'مدیر' ,
 'value' =>   old('user_id') , 'required'=>'required'  , 'index_id'=>'user_id' ]) <hr>




                        </div>



                <div class="card-footer">
                    <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;" class="btn btn-primary">انتصاب نقش به مدیر</button>
                </div>




                </form>


            </x-card-body>
        </x-card>
    </div>
    <div class="col-md-2"></div>

    </div>
@endsection
