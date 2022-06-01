<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

  <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Style -->
  <link rel="stylesheet" href="{{asset('css/index.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
  <link href="{{ asset('css/searchbar.css ')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('css/index.css')}}">

  <title>Library Management System</title>
</head>

<body>
  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div> <!-- .site-mobile-menu -->

  <header class=" site-navbar mt-3">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="site-logo col-6"><a href="{{ URL::route('account-userlogin') }}">Library Management System
          </a></div>

        <nav class="mx-auto site-navigation">
          <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">            
            <li><a href="{{ URL::route('member-registration') }}">Apply as member</a></li>          
        </nav>
        <div class="ml-auto nav-user dropdown  "><a href="#" class="dropdown-toggle" data-toggle="dropdown">
        {{ auth()->user()->username }}
                        @if(Auth::user()->image)
                            <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="" style="width: 35px;height: 35px;   ">
                        @endif
                <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                            <li><a href="{{ URL::route('account-Userprofile') }}" target="_blank">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ URL::route('account-sign-out') }}">Logout</a></li>
                        </ul>
        </div>
  </header>
  <div class="s003" style="background-image: url('images/main\ bg.jpg');">
  <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form action="{{route('account-pic-upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image">
                        <input type="submit" value="Upload">
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="{{asset('static/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
<script src="{{asset('static/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
<script src="{{asset('static/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('static/scripts/underscore-min.js') }}" type="text/javascript"></script>

<script src="{{asset('static/custom/js/script.common.js') }}" type="text/javascript"></script>

<link type="text/css" href="{{asset('static/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{asset('static/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{asset('static/css/theme.css') }}" rel="stylesheet">
    <link type="text/css" href="{{asset('static/images/icons/css/font-awesome.css') }}" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</body>

</html>


