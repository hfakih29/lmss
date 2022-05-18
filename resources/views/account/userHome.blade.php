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
        <div class="site-logo col-6"><a href="">Library Management System
          </a></div>

        <nav class="mx-auto site-navigation">
          <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
            <li><a href="" class="nav-link active">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>           
        </nav>
        <div class="ml-auto nav-user dropdown  "><a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('images/icon-user.png') }}" class="nav-avatar" />{{ auth()->user()->username }}
                <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                            <li><a href="#" target="_blank">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ URL::route('account-sign-out') }}">Logout</a></li>
                        </ul>
        </div>
  </header>
  <div class="s003" style="background-image: url('images/main\ bg.jpg');">
      <form>
        <div class="inner-form">
          <div class="input-field second-wrap">
            <input id="search" type="text" placeholder="Enter Keywords?" />
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="button">
              <svg class="svg-inline--fa fa-search fa-w-16" id="search_book_button" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
          </div>
        </div>
        @include('account.message')
		<div class="row" style="display: none;">
			<div class="module span12">
				<div class="module-body">
		            <table class="table table-striped table-bordered table-condensed">
		                <thead>
		                    <tr>
		                        <th>Book ID</th>
		                        <th>Book Title</th>
		                        <th>Author</th>
		                        <th>Description</th>
		                        <th>Category</th>
		                        <th>Status</th>
		                    </tr>
		                </thead>
		                <tbody id="book-results"></tbody>
		            </table>
				</div>
			</div>
		</div>
	</div>

</div>
      </form>
    </div>
	@section('custom_bottom_script')
	<script type="text/javascript">
    var callNumber_list = $('#callNumber_list').val();
</script>
<script type="text/javascript" src="{{  asset('static/custom/js/script.searchbook.js') }}"></script>

<script type="text/template" id="search_book">
    @include('underscore.search_book')
</script>
@stop
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
