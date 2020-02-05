    <!-- PRELOADER -->
    <div id="loader">
        <div class="loader-container">
            <img src="{{asset('web/images/load.gif')}}" alt="" class="loader-site spinner">
        </div>
    </div>
    <!-- END PRELOADER -->

    <div id="wrapper">
        <header class="header">
            <div class="container-full">
                <nav class="navbar navbar-inverse yamm">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.php"><img src="{{asset('web/images/logo1.png')}}" alt=""></a>
                        </div>

                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{route('web.index')}}">Home</a></li>
                                <li class="dropdown hasmenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product <span class="fa fa-angle-down"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('web.shop-list')}}">ALBUMS ( LAYFLAT )</a></li>
                                        <li><a href="{{route('web.shop-list')}}">SREMIUM PHOTOBOOK</a></li>
                                        <li><a href="{{route('web.shop-list')}}">PHOTO PRINTS AND ENLARGEMENTS</a></li>
                                        <li><a href="{{route('web.shop-list')}}">PHOTO PRINT BOX</a></li>
                                        <li><a href="{{route('web.shop-list')}}">PREMIUM CANVAS PRINT</a></li>
                                        <li><a href="{{route('web.shop-list')}}">WALL ART</a></li>
                                        <li><a href="{{route('web.shop-list')}}">PREMIUM LINEN BOX</a></li>
                                        <li><a href="{{route('web.shop-list')}}">STANDARD WIBALIN BOX</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Albums</a></li>
                                <li><a href="#">Service</a></li>
                                <li><a href="">About</a></li>
                                <li><a href="">Contact</a></li>
                                <li class="dropdown hasmenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="fa fa-angle-down"></span></a>
                                    <ul class="dropdown-menu">
                                    @auth('users')
                                        <li><a href="{{ route('web.my_profile') }}">Profile</a></li>
                                        <li><a href="{{route('web.shop-list')}}">orders</a></li>
                                        <li><a href="{{route('web.shop-list')}}">cart</a></li>
                                        <li><a href="{{route('web.shop-list')}}">wishlist</a></li>
                                        <li><a href="{{route('web.shop-list')}}">shipping address</a></li>
                                        <li><a href="{{route('web.logout')}}">Logout</a></li>
                                    @else
                                        <li><a href="{{ route('web.login') }}">Login</a></li>
                                        <li><a href="{{ route('web.registration_page') }}">Register</a></li>
                                    @endauth
                                    </ul>
                                </li>                             
                                <li class="active"><a href="">DOWNLOAD FREE SOFTWARE </a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </nav>
            </div><!-- end container -->
        </header>