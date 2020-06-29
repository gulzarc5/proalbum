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
                            @if(isset($header_data['header_home']->header_logo) && !empty($header_data['header_home']->header_logo))
                            <a class="navbar-brand" href="{{ route('web.index') }}"><img src="{{asset('assets/home_page/'.$header_data['header_home']->header_logo.'')}}" alt=""></a>
                            @endif
                        </div>

                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                {{-- <li><a href="#" style="color: #d43f3f">Special</a></li>                                --}}
                                @if(count($header_data['categories']) > 0)
                                    @foreach($header_data['categories'] as $item)
                                    <li>
                                        @if (isset($item->color) && !empty($item->color))                                        
                                        <a href="{{route('web.product_list',['slug'=>$item->url_slug,'id'=>$item->id])}}" style="color:{{$item->color}}">
                                        @else   
                                            <a href="{{route('web.product_list',['slug'=>$item->url_slug,'id'=>$item->id])}}">
                                        @endif
                                            {{ $item->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                @endif                                
                                {{-- <li><a href="#">Frames</a></li>
                                <li><a href="#">Prints</a></li>
                                <li><a href="#">Card</a></li>
                                <li><a href="#">Gifts</a></li> --}}
                                <li class="desktop-fix-menu"><a href="{{ route('web.view_cart') }}"><span class="fa fa-shopping-cart"></span> Cart</a></li> 
                                <li class="dropdown hasmenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="fa fa-align-right"></span></a>
                                    <ul class="dropdown-menu">
                                    @auth('users')
                                        <li><a href="{{ route('web.my_profile') }}">Profile</a></li>
                                        <li><a href="{{route('web.order_history')}}">orders</a></li>
                                        <li><a href="{{route('web.shipping_address_list')}}">shipping address</a></li>
                                        <li><a href="{{route('web.change_password_form')}}">change password</a></li>
                                        <li><a href="{{route('web.logout')}}">Logout</a></li>
                                    @else
                                        <li><a href="{{ route('web.login') }}">Login</a></li>
                                        <li><a href="{{ route('web.registration_page') }}">Register</a></li>
                                    @endauth
                                       
                                    </ul>
                                </li>                             
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </nav>
            </div><!-- end container -->
        </header>