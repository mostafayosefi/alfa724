<?php use Hekmatinasser\Verta\Verta; ?>
@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('styles')
    <style>
        .mdtimepicker {
            direction: ltr;
            text-align: left;
        }
        .item-lists{
            display:inline-flex;
        }
        .item-lists p{
            margin-left:70px;
        }
    </style>
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت مشتری ها" route="dashboard.admin.customer.manage" />
    <x-breadcrumb-item title="ساخت سرویس جدید برای مشتری" route="dashboard.admin.service.create" />
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
            <x-card-header>ساخت خدمت جدید</x-card-header>
            <form style="padding:10px;" action="{{ route('dashboard.admin.service.create',['id'=>$post->id]) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
                 <div class="form-group">
                    <label style="margin-top: 20px;">سرویس جدید برای {{ $post->customer_name }}</label>
                    <input type="hidden" value="{{$post->id}}" name="customer_id">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead>
                        </thead>
                        <tbody id="specs" style="margin-top: 70px;">
                            <?php $number=0 ?>
                        @if(old('specifications'))
                            @foreach(old('specifications') as $idx => $specification)
                                @if(!empty($specification['customer'])))
                                    @include('dashboard.admin.customer.spec-item', [
                                        'idx' => $idx,
                                        'title' => $specification['title'],
                                        'price' => $specification['price'],
                                        'time' => $specification['time'],
                                        'counter' => $specification['counter'],
                                        'start_date' => $specification['start_date'],
                                        'finish_date' => $specification['finish_date'],
                                    ])
                                @endif
                            @endforeach
                        @elseif(!empty($model))
                            @foreach($model->specifications as $specification)
                                {{-- @include('dashboard.admin.customer.spec-item', ['specification' => $specification]) --}}
                                @include('dashboard.admin.service.add_item', ['specification' => $specification])

                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                        <td colspan="7">
                            <script>
                                $(function () {
                              });
                            </script>
                            <button id="add-spec" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
                        </td>
                        </tr>
                        </tfoot>
                    </table>
                 </div>
                {{ csrf_field() }}
                <x-card-footer>
                    <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
                            class="btn btn-primary">ارسال
                    </button>
                </x-card-footer>
            </form>
        </x-card>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let field = `@include('dashboard.admin.customer.spec-item', ['specification' => null])`;
            let idx = $("#specs tr").length + 1;
            $('#add-spec').click(function () {
                $("#specs").append(field.replace(/IDX/g, idx.toString()));
                updateListeners();
                idx ++;
            });

            function onRemove() {
                $(this).closest('tr').remove();
            }
            function updateListeners() {
                $('.btn-remove-spec').click(onRemove);
            }
        });
        document.write(idx);
    </script>

@endsection
