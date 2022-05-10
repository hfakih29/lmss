<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>UserRegistration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/Registration and login.css') }}">

</head>

<body>

	<div class="wrapper" style="background-image : url('images/bg-registration-form-1.jpg');">
		<div class="inner">
			<div class="image-holder">
				<img src="images/Registration-form.jpg" height="a" alt="">
			</div>
			<form action="{{ URL::route('account-create-post') }}" method="POST">
            @csrf
				<h3>Registration Form</h3>
				<div class="form-group">
				<input id="firstname" type="text" placeholder="First Name" class="form-control" name="firstname" value="{{ Request::old('login') }}"required autocomplete="first name" >
				@if($errors->has('login'))
					{{ $errors->first('login')}}
				@endif

				<input id="lastname" type="text" placeholder="Last Name" class="form-control" name="lastname" value="{{ Request::old('login') }}" required autocomplete="last name" >
				@if($errors->has('login'))
					{{ $errors->first('login')}}
				@endif
				</div>
				<div class="form-wrapper">
				<input id="username" type="text" placeholder="Username" class="form-control" name="username" value="{{ Request::old('login') }}" >
				@if($errors->has('login'))
					{{ $errors->first('login')}}
				@endif
					<i class="zmdi zmdi-account"></i>
				</div>
				<div class="form-wrapper">
				<input id="email" type="email" placeholder="E-mail address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<i class="zmdi zmdi-email"></i>
				</div>
				<div class="form-wrapper">
				<input id="password" type="password" placeholder="Password" class="form-control" name="password">
				@if($errors->has('password'))
					{{ $errors->first('password')}}
				@endif
				<i class="zmdi zmdi-lock"></i>
				</div>
				<div class="form-wrapper">
				<input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation"  autocomplete="new-password">
				@if($errors->has('password_confirmation'))
					{{ $errors->first('password_confirmation')}}
				@endif
				<i class="zmdi zmdi-lock"></i>
				</div>
				<button type="submit">Register
					<i class="zmdi zmdi-arrow-right"></i>
				</button>
				<a href="{{ URL::route('account-sign-in') }}">Already A User?</a>
					
			</form>
		</div>
	</div>

</body>

</html>