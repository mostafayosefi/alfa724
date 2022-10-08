<tr style="margin-top:50px;">
<div style="margin-top:50px"></div>
      <div class="form-group">
        <div class="input-group">
        <td>
          <input required name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][name]" value="{{ !empty($name) ? $name : (!empty($specification) ? $specification->key : '' )}}" type="text" id="name{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee" requierd placeholder="نام خدمات">
        </td>
        <td>
          <input required name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][count]" value="{{ !empty($count) ? $count : (!empty($specification) ? $specification->key : '' )}}" type="text" id="count{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee" requierd placeholder="تعداد">
        </td>
        <td>
           <input required name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][price]" value="{{ !empty($price) ? $price : (!empty($specification) ? $specification->key : '' )}}" type="text" id="price{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee" requierd placeholder="هزینه پروژه">
        </td>
        <td>
          <input required name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][time]" value="{{ !empty($time) ? $time : (!empty($specification) ? $specification->key : '' )}}" type="text" id="time{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee" placeholder="مدت روزکاری">
        </td>
        <td>
          <input required name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][start_date]" value="{{ !empty($start_date) ? $start_date : (!empty($specification) ? $specification->key : '' )}}" type="text" id="start_date{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="تاریخ شروع 1400/12/05">
        </td>
        <td>
          <input required name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][end_date]" value="{{ !empty($end_date) ? $end_date : (!empty($specification) ? $specification->key : '' )}}" type="text" id="end_date{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="تاریخ پایان 1400/12/05">
        </td>
          <?php $number=!empty($specification) ? $idx : 'IDX' ;  ?>
        </div>
    </div>

    <td><button type="button" class="btn btn-xs btn-danger btn-remove-spec"><i class="fa fa-times"></i></button></td>
</tr>

<tr>
       <style>
                label:not(.form-check-label):not(.custom-file-label):not(.custom-control-label) {
                    font-weight: 700;
                    display: none !important;
                }
                label{
                    display:none !important;
                }
                </style>
      <div class="form-group">
        <div class="input-group">
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][final_date]" value="{{ !empty($final_date) ? $final_date : (!empty($specification) ? $specification->key : '' )}}" type="text" id="final_date{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="تاریخ تحویل">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][purchase_date]" value="{{ !empty($purchase_date) ? $purchase_date : (!empty($specification) ? $specification->key : '' )}}" type="text" id="purchase_date{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="تاریخ تسویه">
        </td>
        <td>
          <x-select-group name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][lead]" id="lead{{ !empty($specification) ? $idx : 'IDX' }}"  required :model="$model ?? null">
                @foreach($users as $category)
                    <x-select-item value="{{ !empty($category->id) ? $category->id : (!empty($specification) ? $specification->key : '' )}}">{{ $category->first_name }} {{ $category->last_name }}</x-select-item>
                @endforeach
           </x-select-group>
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][salary]" value="{{ !empty($salary) ? $salary : (!empty($specification) ? $specification->key : '' )}}" type="text" id="salary{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="دریافتی مسئول پروژه">
        </td>
        <td>
        </td>

          <?php $number=!empty($specification) ? $idx : 'IDX' ;  ?>
        </div>
    </div>
    <td></td>
        <td><button type="button" class="btn btn-xs btn-danger btn-remove-spec"><i class="fa fa-times"></i></button></td>

</tr>

<tr>

      <div class="form-group">
        <div class="input-group">
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit]" value="{{ !empty($deposit) ? $deposit : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee" requierd placeholder="بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit_date]" value="{{ !empty($deposit_date) ? $deposit_date : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit_date{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee" requierd placeholder="تاریخ بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit2]" value="{{ !empty($deposit2) ? $deposit2 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit2{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit_date2]" value="{{ !empty($deposit_date2) ? $deposit_date2 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit_date2{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit3]" value="{{ !empty($deposit4) ? $deposit3 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit3{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit_date3]" value="{{ !empty($deposit_date4) ? $deposit_date3 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit_date3{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>

          <?php $number=!empty($specification) ? $idx : 'IDX' ;  ?>
        </div>
    </div>
        <td><button type="button" class="btn btn-xs btn-danger btn-remove-spec"><i class="fa fa-times"></i></button></td>

</tr>

<tr>

      <div class="form-group">
        <div class="input-group">
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit4]" value="{{ !empty($deposit4) ? $deposit4 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit4{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit_date4]" value="{{ !empty($deposit_date4) ? $deposit_date4 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit_date4{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit5]" value="{{ !empty($deposit5) ? $deposit5 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit5{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit_date5]" value="{{ !empty($deposit_date5) ? $deposit_date5 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit_date5{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit6]" value="{{ !empty($deposit6) ? $deposit6 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit6{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit_date6]" value="{{ !empty($deposit_date6) ? $deposit_date6 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit_date6{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>
          <?php $number=!empty($specification) ? $idx : 'IDX' ;  ?>
        </div>
    </div>
        <td><button type="button" class="btn btn-xs btn-danger btn-remove-spec"><i class="fa fa-times"></i></button></td>

</tr>

<tr>

      <div class="form-group">
        <div class="input-group">


        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit7]" value="{{ !empty($deposit7) ? $deposit7 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit7{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit_date7]" value="{{ !empty($deposit_date7) ? $deposit_date7 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit_date7{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit8]" value="{{ !empty($deposit8) ? $deposit8 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit8{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit_date8]" value="{{ !empty($deposit_date8) ? $deposit_date8 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit_date8{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit9]" value="{{ !empty($deposit9) ? $deposit9 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit9{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="بیعانه">
        </td>
        <td>
          <input  name="specifications[{{ !empty($specification) ? $idx : 'IDX' }}][deposit_date9]" value="{{ !empty($deposit_date9) ? $deposit_date9 : (!empty($specification) ? $specification->key : '' )}}" type="text" id="deposit_date9{{ !empty($specification) ? $idx : 'IDX' }}" class="form-control datee"  placeholder="تاریخ بیعانه">
        </td>
          <?php $number=!empty($specification) ? $idx : 'IDX' ;  ?>
        </div>
    </div>
        <td><button type="button" class="btn btn-xs btn-danger btn-remove-spec"><i class="fa fa-times"></i></button></td>

</tr>



</mr>
