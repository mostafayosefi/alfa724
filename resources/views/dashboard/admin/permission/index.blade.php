@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
<<<<<<< HEAD
    <x-breadcrumb-item title="مشاهده نقش ها  " route="dashboard.admin.permission.index" />
=======
    <x-breadcrumb-item title="مشاهده مدیران  " route="dashboard.admin.users.admins.index" />
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
    <div class="col-md-12">
        <x-card type="info">
<<<<<<< HEAD
            <x-card-header>  مشاهده نقش</x-card-header>
=======
            <x-card-header>  مشاهده مدیران</x-card-header>
>>>>>>> 6d5953f577c34bb52297a8b3af8c763c85331fd0
            <x-card-body>
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>  نقش     </th>
                        <th>سطح دسترسی</th>
                        <th>ویرایش</th>
                    </tr>
                    </thead>
                        <tbody>
                     @foreach($roles as $key => $item)
                     <?php $ids=$item->id ; ?>
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
<<<<<<< HEAD

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
=======
                            <td>
                                @if($item->permissions)
                                @foreach ($item->permissions as $permission   )

                                <b>{{ $permission->$permission->name }}</b>
                                @endforeach

                                @endif
                            </td>


            <td>
                <a href="{{ route('dashboard.admin.notification.list.type', $item) }}">
>>>>>>> 6d5953f577c34bb52297a8b3af8c763c85331fd0
                <span class="btn btn-success btn-sm">
                    <i class="fa fa-fw fa-edit"></i> مشاهده
                    </span>
                </a>
            </td>

                        </tr>

                     @endforeach
                        </tbody>
                        <tfoot>
                        <tr>

                        <th>ردیف</th>
                        <th>  نقش     </th>
                        <th>سطح دسترسی</th>
                        <th>ویرایش</th>

                        </tr>
                        </tfoot>
                </table>
            </x-card-body>
        </x-card>
    </div>
    @endsection
