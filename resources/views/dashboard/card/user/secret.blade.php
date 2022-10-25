
<form style="padding:10px;" action="{{ $route }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">

        <x-card type="primary">
            <x-card-header>   ویرایش رمزعبور    </x-card-header>
        </x-card>

        <div class="row">
            <div class="col-md-1">
            </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="first_name">    رمزعبور </label>
              <input type="password" class="form-control input_mystyle"
              required  name="password" value="{{old('password')}}"  >
            </div><hr>
            <div class="form-group">
                <label for="password">    تکرار رمزعبور   </label>
              <input type="password" class="form-control input_mystyle"
              required  name="password_confirmation" value="{{old('password_confirmation')}}"   >
            </div><hr>
        </div>
        <div class="col-md-5">

        </div>
        <div class="col-md-1">

        </div>
        </div>


@method('PUT')
        @csrf

        <x-card-footer>
                        <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"
                                class="btn btn-primary">    ویرایش رمزعبور
                        </button>
                    </x-card-footer>
                </form>
