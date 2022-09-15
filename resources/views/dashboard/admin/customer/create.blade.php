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
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>ساخت مشتری جدید</x-card-header>
            <form style="padding:10px;" action="{{ route('dashboard.admin.customer.store') }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
                 <div class="form-group">
                     <div class="row">
                         <div class="col-md-2 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="code"  placeholder="کد مشتری">
                         </div>

                         <div class="col-md-2 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="name"  placeholder="نام و نام خانوادگی مشتری">
                         </div>

                         <div class="col-md-2 col-sm-12">
                             <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="tells"  placeholder="تلفن مشتری">
                         </div>

                        <div class="col-md-2 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="tell"  placeholder="موبایل مشتری">
                         </div>
                         <div class="col-md-2 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="job"  placeholder="موضوع کسب و کار">
                         </div>
                         <div class="col-md-2 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="referal"  placeholder=" معرف">
                         </div>
                        <div class="col-md-4 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="domain"  placeholder="آدرس سایت">
                         </div>

                         <div class="col-md-4 col-sm-12">
                            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="host"  placeholder="هاست">
                         </div>

                         <div class="col-md-4 col-sm-12">
                             <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control"   name="email"  placeholder="ایمیل">
                         </div>
                        <div class="col-md-12 col-sm-12">
                             <label for="description"> توضیحات:</label>
                             <textarea type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 140px; border-radius: 7px; font-size: 16px;"class="form-control" required name="description"></textarea>
                         </div>
                     </div>
                    <label style="margin-top: 20px;">افزودن لیست خدمات این پروژه</label>
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
                                @include('dashboard.admin.customer.spec-item', ['specification' => $specification])

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
