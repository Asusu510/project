<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{url('public/admin/form')}}/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/admin/form')}}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/admin/form')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/admin/form')}}/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/admin/form')}}/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{url('public/admin/form')}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/admin/form')}}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/admin/form')}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{url('public/admin/form')}}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/admin/form')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{url('public/admin/form')}}/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{url('public/admin/form')}}/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post" action>
				@csrf
					<span class="login100-form-title p-b-49">
						Sign In
					</span>
					@if(Session::has('error'))
			            <div class="alert alert-danger">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			                <strong>{{ Session::get('error')}}</strong>
			            </div>
			        @endif
			       
					<div class="wrap-input100  m-b-23" >
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Nhập email của bạn">
						<span class="focus-input100" data-symbol="&#xf206;"></span>		
					</div>
					@if($errors->first('email'))
		                  <span class="text-danger">{{ $errors->first('email') }}</span>
		            @endif
					
					<div class="wrap-input100 ">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Nhập mật khẩu">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					@if($errors->first('password'))
		                  <span class="text-danger">{{ $errors->first('password') }}</span>
		            @endif
					<div class="">

						<label class=""><input type="checkbox" name="remember" >Nhớ mật khẩu</label>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Login
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<a href="{{route('admin.get.register')}}">
							<span>
								Bạn chưa có tài khoản? Hãy đăng ký
							</span>
						</a>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{url('public/admin/form')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/admin/form')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/admin/form')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{url('public/admin/form')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/admin/form')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/admin/form')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{url('public/admin/form')}}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/admin/form')}}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/admin/form')}}/js/main.js"></script>

</body>
</html>