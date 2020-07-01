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
                                        <li><a href="{{ route('web.my_profile')}}">Profile</a></li>
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
                                    <li><a href="{{route('web.tc')}}">Terms of Condition</a></li>
                                    <li><a href="{{route('web.ret_policy')}}">Return Policy</a></li>
                                    <li><a href="{{route('web.privacy_policy')}}">Privacy Policy</a></li>
                                </ul>
                            </div><!-- end link -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-12">
                        <div class="footer-logo">
                            @if (isset($footer_home) && !empty($footer_home))
                                <a class="navbar-brand" href="index-2.html" style="width: 100%;padding-left: 0;"><img src="{{asset('assets/home_page/'.$footer_home->footer_logo.'')}}" alt=""></a>
                                <div class="social-icons">
                                    <ul class="list-inline">
                                    <li class="facebook"><a data-tooltip="tooltip" data-placement="top" title="" href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li class="google"><a data-tooltip="tooltip" data-placement="top" title="" href="#" data-original-title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                    <li class="twitter"><a data-tooltip="tooltip" data-placement="top" title="" href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                                <p style="color: #fff">
                                    {{$footer_home->footer_address}}</br>
                                    {{$footer_home->footer_phone}}</br>
                                    {{$footer_home->footer_email}}
                                </p>
                            @endif
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
                        <h4>Copyright 2020 Premier PhotoBook </h4>
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