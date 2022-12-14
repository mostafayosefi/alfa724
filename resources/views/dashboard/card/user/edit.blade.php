
<form style="padding:10px;" action="{{ $route }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

        <x-card type="primary">
            <x-card-header>اطلاعات کاربری    </x-card-header>
        </x-card>

        <div class="row">
            <div class="col-md-1">
            </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="first_name">    نام </label>
              <input type="text" class="form-control input_mystyle"
              required  name="first_name" value="{{ $user->first_name }}" placeholder=" نام "  >
            </div><hr>
            <div class="form-group">
                <label for="last_name">    نام خانوادگی </label>
              <input type="text" class="form-control input_mystyle"
              required  name="last_name" value="{{ $user->last_name }}" placeholder=" نام خانوادگی "  >
            </div><hr>
            <div class="form-group">
                <label for="situation">    سمت   </label>
              <input type="text" class="form-control input_mystyle"
              required  name="situation" value="{{ $user->situation }}" placeholder=" سمت   "  >
            </div><hr>
        </div>
        <div class="col-md-5">

            <div class="form-group">
                <label for="birthdate">      تاریخ تولد </label>
              <input type="text" class="form-control input_mystyle" id="date"
              data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask=""
              required  name="birthdate" value="{{ $user->birthdate }}" placeholder="   تاریخ تولد "  >
            </div><hr>
            <div class="form-group">
                <label for="mobile">      شماره همراه </label>
              <input type="text" class="form-control input_mystyle"
              required  name="mobile" value="{{ $user->mobile }}" placeholder="   شماره همراه "  >
            </div><hr>
            <div class="form-group">
                <label for="email">        ایمیل </label>
              <input type="text" class="form-control input_mystyle"
              required  name="email" value="{{ $user->email }}" placeholder="     ایمیل "  >
            </div><hr>
            @include('dashboard.ui.upload' , [ 'flag' => 'profile' , 'type_file' => 'file' ] )

        </div>
        <div class="col-md-1">

        </div>
        </div>


@method('PUT')
        @csrf

        <x-card-footer>
                        <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
                                class="btn btn-primary">    ویرایش اطلاعات
                        </button>
                    </x-card-footer>
                </form>
