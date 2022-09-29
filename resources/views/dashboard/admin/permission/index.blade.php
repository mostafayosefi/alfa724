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
        <x-card type="info">
            <x-card-header>  مشاهده نقش</x-card-header>
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
