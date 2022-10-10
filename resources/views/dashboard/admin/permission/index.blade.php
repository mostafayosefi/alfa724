@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مشاهده نقش ها  " route="dashboard.admin.permission.index" />
@endsection
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
    <div class="col-md-12">
        <x-card type="primary">
            <x-card-header>  مشاهده نقش ها</x-card-header>
            <x-card-body>
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>  نقش     </th>
                        <th>سطح دسترسی</th>
                        <th>ویرایش</th>
                        <th>انتصاب نقش به مدیر</th>
                        <th> مدیران منتصب </th>
                        {{-- <th> حذف  </th> --}}
                    </tr>
                    </thead>
                        <tbody>
                     @foreach($roles as $key => $item)
                     <?php $ids=$item->id ; ?>
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>

             <td>
                @if($item->id)
                @foreach ($permissionroles as $permission   )
                @if($permission->role_id==$item->id)
                 <b>{{ $permission->permission->name }}</b><br>
                 @endif
                @endforeach
                @endif
            </td>




            <td>
                <a href="{{ route('dashboard.admin.permission.edit', $item) }}">
                <span class="btn btn-success btn-sm">
                    <i class="fa fa-fw fa-edit"></i> مشاهده
                    </span>
                </a>
            </td>

            <td>
                <a href="{{ route('dashboard.admin.permission.appointment', $item) }}">
                <span class="btn btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus"></i> انتصاب
                    </span>
                </a>
            </td>

            <td>
                @if($item->id)
                @foreach ($users as $user   )
                @if($user->role_id==$item->id)
                 <b>{{ $user->name }}</b><br>
                 @endif
                @endforeach
                @endif
            </td>
                {{-- <td>
                @include('dashboard.ui.modal_delete', [$item ,'route' => route('dashboard.admin.permission.destroy', $item) , 'myname' => 'نقش '.$item->name ])
               </td> --}}

                        </tr>

                     @endforeach
                        </tbody>
                </table>
            </x-card-body>
        </x-card>
    </div>
    @endsection
