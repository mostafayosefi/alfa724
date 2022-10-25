
        <div class="col-md-12">
            <x-card type="primary">
                <x-card-header>  ویرایش لیست حضور و غیاب</x-card-header>
                <form style="padding:10px;" action="{{ route('dashboard.admin.absence.setting.update') }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">


        <div class="row">

            <div class="col-md-3">

            </div>
        <div class="col-md-6">




<div class="form-group">
    <label>لیست کارمندان حضوری جهت سیستم حضور و غیاب</label>
    <select class="select2" multiple="multiple" name="users[]"  data-placeholder="انتخاب کاربر جهت حضورغیاب" style="width: 100%; ;">
        @foreach ($users as $user )
        <option value="{{ $user->id }}"
            @if($user->listabsence == 'active') selected @endif  >{{ $user->name }}</option>
        @endforeach

    </select>
</div>


<button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
class="btn btn-primary">   ویرایش لیست حضور و غیاب
</button>


        </div>

        <div class="col-md-3">

        </div>
        </div>

            @csrf

            @method('PUT')





                    </form>
                </x-card>
            </div>

