@extends('layouts.install')
@section('content')
<body class="login-page" style="min-height: 496.8px;">
	<div class="login-box">
		<div class="login-logo">
			<a href="#">
			    <img src="{{ asset("assets/images/logo.png") }}" alt="{{ config('app.name') }}" style=" width: auto;" class="brand-image" style="opacity: .8">
			</a>
		</div>
		<?php echo base_path(); ?>
		    @if(Session::has('info'))
                <div class="row">
                    <div class="col-md-12">
                        <p class="alert alert-info">{{ Session::get('info') }}</p>
                    </div>
                </div>
            @endif
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">به نصب سریع آتی یار خوش آمدید</p>
				<form action="{{ route('installl') }}" method="post">
				    @csrf
					<div class="input-group mb-3">
						<input requierd name="app_name" class="form-control" placeholder="نام سامانه" type="text">
					</div>
					<div class="input-group mb-3">
						<input requierd name="app_url" class="form-control" placeholder="آدرس سامانه" type="text">
					</div>
				<p class="login-box-msg">تنظیمات دیتابیس</p>
					<div class="input-group mb-3">
						<input requierd name="database" class="form-control" placeholder="نام دیتابیس" type="text">
					</div>
					<div class="input-group mb-3">
						<input requierd name="database_username" class="form-control" placeholder="نام یوزر دیتابیس" type="text">
					</div>
					<div class="input-group mb-3">
						<input requierd name="database_password" class="form-control" placeholder="پسورد دیتابیس" type="password">
					</div>
				<p class="login-box-msg">تنظیمات پنل ادمین</p>
					<div class="input-group mb-3">
						<input requierd name="email" class="form-control" placeholder="ایمیل" type="email">
					</div>
					<div class="input-group mb-3">
						<input requierd name="phone" class="form-control" placeholder="تلفن همراه" type="text">
					</div>
					<div class="input-group mb-3">
						<input requierd name="username" class="form-control" placeholder="نام کاربری ادمین" type="text">
					</div>
					<div class="input-group mb-3">
						<input requierd name="password" class="form-control" placeholder="رمز عبور ادمین" type="password">
					</div>
					<div class="row">
						<div class="col-8">
					
						</div>
						<div class="col-4">
							<button class="btn btn-primary btn-block" type="submit">نصب</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
@endsection