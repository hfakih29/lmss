<div class="navbar navbar-fixed-top" >
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a>
                <a class="brand" href="{{ URL::route('home') }}" style="color:#000000;">Library Management System</a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav pull-right">
                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ auth()->user()->username }}
                        @if(Auth::user()->image)
                            <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 40px;height: 40px;   ">
                        @endif
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::route('account-profile') }}" target="_blank">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ URL::route('account-sign-out') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>