

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
  <link type="text/css" href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('static/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('static/css/theme.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('static/images/icons/css/font-awesome.css') }}" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

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
        <div class="site-logo col-6"><a href="">Library Management System
          </a></div>

        <nav class="mx-auto site-navigation">
          <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
            <li><a href="" class="nav-link active">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li class="d-lg-none"><a href="{{ URL::route('account-create') }}"><span class="mr-2">+</span> Register</a></li>
            <li class="d-lg-none"><a href="{{ URL::route('account-login') }}">Log In</a></li>
          </ul>

        </nav>
        

        <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
          <div class="ml-auto">
            <a href="{{ URL::route('account-create') }}" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span
                class="mr-2 icon-add"></span>Register</a>
            <a href="{{ URL::route('account-login') }}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                class="mr-2 icon-lock"></span>Login</a>
          </div>
          <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
              class="icon-menu h3 m-0 p-0 mt-2"></span></a>
        </div>

      </div>
    </div>
  </header>
  <div class="s003" style="background-image: url('images/main\ bg.jpg');">

        @include('public.book-search')
       
        <script src="{{ asset('static/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('static/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>

<script type="text/template" id="alert_box">
    @include('underscore.alert_box')


</script>
<script src="{{ asset('static/custom/js/script.common.js') }}" type="text/javascript"></script>
  <script src="{{ asset('static/scripts/underscore-min.js') }}" type="text/javascript"></script>
  <script>
        $(document).ready(function(){ 
        $("input").attr("autocomplete", "off");
    });
</script>
</body>

</html>
