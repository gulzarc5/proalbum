        <footer class="section footer" style="padding: 50px 0">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h4>Addtional Links</h4>
                                <hr>
                            </div>

                            <div class="link-widget">
                                <ul class="check">
                                    {{-- <li><a href="#">Home</a></li> --}}
                                    <li><a href="{{route('web.about')}}">About us</a></li>
                                    <li><a href="{{route('web.gallery-cat')}}">Gallery</a></li>
                                    <li><a href="{{route('web.contact')}}">Contact us</a></li>
                                </ul>
                            </div><!-- end link -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-12">

                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h4>Account</h4>
                                <hr>
                            </div>

                            <div class="link-widget">
                                <ul class="check">
                                    <li><a href="#">Cart</a></li>
                                    @auth('users')
                                        <li><a href="{{ route('web.my_profile') }}">Profile</a></li>
                                        <li><a href="{{route('web.logout')}}">Logout</a></li>
                                    @else
                                        <li><a href="{{ route('web.login') }}">Login</a></li>
                                        <li><a href="{{ route('web.registration_page') }}">Register</a></li>
                                    @endauth
                                </ul>
                            </div><!-- end link -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-12">
                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h4>Copyrights</h4>
                                <hr>
                            </div>

                            <div class="link-widget">
                                <ul class="check">
                                    <li><a href="#">Terms of Condition</a></li>
                                    <li><a href="#">Return Policy</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div><!-- end link -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-12">
                        <div class="footer-logo">
                            <a class="navbar-brand" href="index-2.html" style="width: 100%;padding-left: 0;"><img src="{{asset('web/images/logo.png')}}" alt=""></a>
                            <p style="color: #fff">Centurian, South Africa</br>Phone: +011 254867</br>Email: demo@mail.com</p>
                        </div>
                    </div><!-- end col -->

                </div><!-- end row -->
            </div><!-- end container -->
        </footer>

        <div class="topfooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        
                    </div><!-- end col -->

                    <div class="col-md-8 col-sm-8 col-xs-12 text-center payments">
                        <h4>Copyright 2020 Premier PhotoBook | Develped By<a target="_blank" href="https://www.webinfotech.net.in/">Webinfotech</a></h4>
                    </div><!-- end col -->

                    <div class="col-md-2">
                       
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->

    </div><!-- end wrapper -->


    <!-- Main Scripts-->
    <script src="{{asset('web/js/jquery.js')}}"></script>
    <script src="{{asset('web/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('web/js/plugins.js')}}"></script>
    <script src="{{asset('web/js/hover.js')}}"></script>   
    <script src="{{asset('web/js/threecolgallery.js')}}"></script>

    <script>
        function myFunction() {
          var x = document.getElementById("inputPassword4");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        </script>