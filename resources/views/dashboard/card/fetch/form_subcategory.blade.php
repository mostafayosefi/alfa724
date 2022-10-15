<option value="">لطفا زیرگروه مورد نظر را انتخاب نمایید</option>

@foreach ($form_subcategories as $form_subcategory)
    <option value="{{ $form_subcategory->id }}"
        {{ old('form_subcategory') == $form_subcategory->id ? 'selected' : '' }}>{{ $form_subcategory->name }}
    </option>
@endforeach
