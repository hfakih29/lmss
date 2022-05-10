
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="{{asset ('css/Registration and login.css') }}">

</head>

<body>
    <div class="wrapper" style="background-image : url('images/bg-registration-form-1.jpg');">
        <div class="inner">
            <div class="image-holder">
                <img src="images/Registration-form.jpg" height="a" alt="">
            </div>
            <form method="POST" action="{{ URL::route('account-sign-in-post') }}">
            @csrf
                <h3>Login</h3>
                <div class="form-wrapper">
                <input id="email" type="username" placeholder="Username or email" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="form-wrapper">
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" >
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
            </form>
        </div>
    </div>
    
    
</body>

</html>