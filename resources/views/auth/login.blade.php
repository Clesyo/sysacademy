<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Sys Academy | Login') }}</title>
    <!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
    type="text/css" />
    <link href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/fonts/material-design-icons/material-icon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- style -->
	<link rel="stylesheet" href="{{asset('assets/css/pages/extra_pages.css')}}">
	<!-- favicon -->
	<link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}"/>
<body>
    <div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
					<span class="login100-form-logo">
						<img alt="" src="{{asset('assets/img/logo-2.png')}}">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
						<label class="label-checkbox100" for="ckb1">
							{{__('Lembra-me')}}
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							{{__('Login')}}
						</button>
					</div>
                    @if (Route::has('password.request'))
					<div class="text-center p-t-30">
						<a class="txt1" href="forgot_password.html">
							Esqueceu a senha?
						</a>
					</div>
                    @endif
				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/pages/extra-pages/pages.js')}}"></script>
	<!-- end js include path -->
</body>
</html>
