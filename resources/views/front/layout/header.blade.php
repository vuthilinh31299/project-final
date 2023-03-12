<?php $user = Auth::user() ;?>
<nav class="navbar navbar-custom">
    <div class="container" id="container-navigation">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                <li class="hidden-sm">
                    <a href="{{route('front.index')}}">Home</a>
                </li>
                <li>
                    <a href="plan/index.html">News</a>
                </li>
                <li class="hidden-sm">
                    <a href="place.html">Blog</a>
                </li>
                <li>
                    <a href="travel-app.html">Contact Us</a>
                </li>
                <li class="dropdown nav-user hidden-xs" id="user-logined"></li>
                <li id="btn-login-checked">
                    <div class="navbar-btn">
                        @if(!$user)
                        <a class="btn btn-info" href="{{route('front.getlogin')}}">Sign in</a>
                        <a class="btn btn-info" href="{{route('front.registerUser')}}">Sign Up</a>
                        @else
                        <a class="btn btn-info" href="{{route('front.logOutUser')}}">LogOut</a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>