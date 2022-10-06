
        <div class="col-md-12">
            <x-card type="success">
                <x-card-header>ساخت پروژه جدید</x-card-header>
                <form style="padding:10px;" action="{{ route('dashboard.admin.project.store') }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">


        <div class="row">

            <div class="col-md-1">

            </div>
        <div class="col-md-5">

            @if($customer_id)
            <input type="hidden" name="customer_id" value="{{ $customer_id }}" />
            @else

    @include('dashboard.ui.selectbox', [ 'allforeachs' => $customers ,
    'input_name' => 'name'  ,  'name_select' => 'مشتری' ,
    'value' =>   old('customer_id') , 'required'=>'required'  , 'index_id'=>'customer_id' ]) <hr>

@endif

<div class="form-group">
    <label for="title">عنوان</label>
  <input type="text" class="form-control input_mystyle"
  required  name="title" value="{{ old('title') }}" placeholder="عنوان"  >
</div><hr>

<x-select-group required="" label="وضعیت" name="status">
    <x-select-item value="not_done">{{ __('app.status.not_done') }}</x-select-item>
    <x-select-item value="delayed">{{ __('app.status.delayed') }}</x-select-item>
    <x-select-item value="in_progress">{{ __('app.status.in_progress') }}</x-select-item>
    <x-select-item value="done">{{ __('app.status.done') }}</x-select-item>
    <x-select-item value="paid">{{ __('app.status.paid') }}</x-select-item>
</x-select-group>

        </div>

        <div class="col-md-5">



            <div class="form-group">
                <label>تاریخ شروع:</label>
                <div class="input-group">
                  <input required id="date" name="start_date" value="{{ old('start_date') }}"  type="text" class="form-control input_mystyle" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                </div>
            </div><hr>

            <div class="form-group">
                <label>تاریخ پایان:</label>
                <div class="input-group">
                  <input required name="finish_date" value="{{ old('finish_date') }}"  type="text" id="date1" class="form-control input_mystyle" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="">
                </div>
            </div><hr>


        </div>
        <div class="col-md-1">

        </div>
        </div>

            @csrf



            <div class="col-md-12 col-sm-12">
                <label for="description"> توضیحات:</label>
                <textarea type="text"  rows="6" class="form-control input_mystyle"
                  name="description" id="summernote" ></textarea>
            </div>

            <x-card-footer>
                            <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
                                    class="btn btn-success">  ایجاد پروژه
                            </button>
         </x-card-footer>

                    </form>
                </x-card>
            </div>
