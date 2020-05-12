<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('log/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/css/util.css"') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('log/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset('log/images/bg-01.jpg') }}');">

			<div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
					<span class="login100-form-logo">
                        <img class="rounded-circle" src="{{asset('log/images/bg-02.jpg')}}" alt="error" width="100" height="100"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Register
					</span>

                    {{-- Username --}}
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100 @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>

                        @error('name')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>

                        @error('email')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>

                        @error('password')
                            <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                    </div>

                    {{-- COnfirm --}}
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="current-password" placeholder="Confirm Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>

					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Register
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="{{ asset('log/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('log/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('log/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('log/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('log/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('log/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('log/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('log/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
