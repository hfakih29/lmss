@extends('account.index')
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

  <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
  
  
  <link type="text/css" href="{{asset('static/images/icons/css/font-awesome.css') }}" rel="stylesheet">
  <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Style -->
<link rel="stylesheet" href="{{asset('css/index.css')}}">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
<link href="{{ asset('css/searchbar.css ')}}" rel="stylesheet" />



    

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
            <li><a href="{{ URL::route('member-registration') }}">Apply for member</a></li>           
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
     
	<div class="container">
		<br/>
		<div class="row justify-content-center">
			<div class="module span9">
				
				<div class="module-body">
					<form class="form-horizontal row-fluid">
						<div class="control-group">
							<label class="control-label">Name or author or year<br>of the book</label>
							<div class="controls">
								<textarea class="span14" rows="1"></textarea>
							</div>
						</div>

						<div class="control-group">
							<div class="controls" id="search_book_button">
								<a class="btn btn-default">Search Book</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row" style="display: none;">
			<div class="module span12">
				<div class="module-body">
		            <table class="table table-striped table-bordered table-condensed">
		                <thead>
		                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Publisher</th>
                        <th>Year</th>
                        <th>Edition</th>
                        <th>Available</th>
		                    </tr>
		                </thead>
		                <tbody id="book-results">

                    @foreach($books as $row )
                    @include('underscore.search_bookMember')
                    @endforeach
                    </tbody>
		            </table>
				</div>
			</div>
		</div>

	



@section('custom_bottom_script')
<script type="text/javascript">
    var callNumber_list = $('#callNumber_list').val();
</script>
<script type="text/javascript" src="{{  asset('static/custom/js/script.searchbook.js') }}"></script>

<script type="text/template" id="search_book">
    @include('underscore.search_bookMember')
</script>
@stop

        

</body>

</html>
