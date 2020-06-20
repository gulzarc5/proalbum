  @extends('web.templet.master')

    {{-- META --}}
    @section('meta')
      <title>Premium Photobooks | Making Albums For South Africa</title>
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="">
    @endsection

    @section('content')
      <div class="first-slider">
          <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" style="margin:0px auto;background-color:transparent;padding:0px;margin:0">
              <!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
              <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
                  <ul>
                      <li data-index="rs-181" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="{{asset('web/upload/slide2.jpg')}}"  data-rotate="0"  data-saveperformance="off"  data-title="For The Book Lovers" data-description="" onclick="location.href='pic_bulbon.php'">
                         <!-- MAIN IMAGE -->
                          <img src="{{asset('web/upload/slide2.jpg')}}"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                      </li>
                      <li data-index="rs-18" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="{{asset('web/upload/slide3.jpg')}}"  data-rotate="0"  data-saveperformance="off"  data-title="Premium Photobook" data-description="" onclick="location.href='pic_bulbon1.php'">
                         <!-- MAIN IMAGE -->
                          <img src="{{asset('web/upload/slide3.jpg')}}"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                      </li>
                      <li data-index="rs-1812" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="{{asset('web/upload/slide1.jpg')}}"  data-rotate="0"  data-saveperformance="off"  data-title="Capture The Moment" data-description="" onclick="location.href='pic_bulbon2.php'">
                         <!-- MAIN IMAGE -->
                         <img src="{{asset('web/upload/slide1.jpg')}}"  alt="#"  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                      </li>
                  </ul>
                  <div class="tp-static-layers"></div>
              </div>
          </div>
      </div><!-- end first slider -->

      <section style="padding:0">
        <div class="container">
            <div class="mt-20">
                <img src="{{asset('web/images/hom-pic1.png')}}" alt="" class="img-responsive">
            </div><!-- end title -->

        </div><!-- end container -->
      </section><!-- end section -->

      <section class="home-gallery">
        <div class="container-fluid">
            <div class="section-title text-center clearfix">
                <h4>Our Products</h4>
                <p>Listed below our awesome products with a stylish portfolio section!</p>
                <hr>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12">
                    <nav class="text-center">
                        <ul class="nav nav-tabs" style="display:inline-block;margin:auto">
                            <li class="active"><a class="tab-btn" href="#1" data-toggle="tab">Bestseller</a></li>
                            <li><a class="tab-btn" href="#2" data-toggle="tab">New Arrival</a></li> 
                            <li><a class="tab-btn" href="#3" data-toggle="tab">Feature Product</a></li>
                            <li><a class="tab-btn" href="#4" data-toggle="tab">Wedding</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="tab-content">
                <!-- Tab 1 -->
                <div class="tab-pane fade in active" id="1">
                  <div class=row>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/2.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/1.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/3.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/2.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Tab 2 -->
                <div class="tab-pane" id="2">
                  <div class=row>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/2.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/6.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/1.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/2.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Tab 3 -->
                <div class="tab-pane" id="3">
                  <div class=row>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/6.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/5.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/2.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/1.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Tab 2 -->
                <div class="tab-pane" id="4">
                  <div class=row>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/2.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/6.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/1.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                      <div class="tab-block">
                          <a href="#" title="">
                            <img src="{{asset('web/images/photo/2.jpg')}}" alt="" class="img-responsive">
                            <figcaption>
                              <h5 class="f-w-6">Hardcover Photo Book</h5>
                              <p class="regular">Starting from <span>R 125</span></p>
                              <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                            </figcaption>
                          </a>
                      </div>
                    </div>
                  </div>
                </div>

            </div><!-- end div -->

        </div><!-- end container-fluid -->
      </section><!-- end section -->

      <section class="catagory-section" style="background-color: #f4f4f1;">
        <div class="container">
            <div class="section-title text-center clearfix">
                <h4>Top Categories</h4>
                <p>Listed below our top categories, campaings, promotions and offers for you!</p>
                <hr>
            </div><!-- end title -->

            <div class="cat-section">
              <div class="row">
                <div class="col-md-4 col-xs-6" style="max-height: 510px;">
                  <a href="" title="">                    
                    <img src="{{asset('web/images/photos/3.jpg')}}" alt="">
                    <h6>Album (Leyflat)</h6>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6" style="max-height: 510px;">
                  <a href="" title="">                    
                    <img src="{{asset('web/images/photos/1.jpg')}}" alt="">
                    <h6>Album (Leyflat)</h6>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6" style="max-height: 510px;">
                  <a href="" title="">                    
                    <img src="{{asset('web/images/photos/6.jpg')}}" alt="">
                    <h6>Album (Leyflat)</h6>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6" style="max-height: 510px;">
                  <a href="" title="">                    
                    <img src="{{asset('web/images/photos/6.jpg')}}" alt="">
                    <h6>Album (Leyflat)</h6>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6" style="max-height: 510px;">
                  <a href="" title="">                    
                    <img src="{{asset('web/images/photos/1.jpg')}}" alt="">
                    <h6>Album (Leyflat)</h6>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6" style="max-height: 510px;">
                  <a href="" title="">                    
                    <img src="{{asset('web/images/photos/3.jpg')}}" alt="">
                    <h6>Album (Leyflat)</h6>
                  </a>
                </div>
              </div>
            </div>

        </div><!-- end container -->
      </section><!-- end section -->

      <section class="video-block" style="background: #f9f9f9;">
          <div class="container">
            <video controls style="outline: none">
                <source src="{{asset('web/images/video/Black-Friday.mp4')}}" type="video/mp4">
                Your browser does not support HTML5 video.
              </video>
          </div>
      </section>

      <section class="section">
        <div class="container">   
            <div class="section-title text-center clearfix">
                <h4>ORDER</h4>
                <p>Choose your Ordering mode to upload Orders at your comfort.</p>
                <hr>
            </div><!-- end title -->         
            <div class="row">
              <div class="col-sm-3 col-xs-12">
              </div><!-- end col -->
              <div class="col-sm-6 col-xs-12">
                  <div class="cat-boxes">
                      <a href="#" title="">
                          <h4 style="font-size: 24px;text-align: right;">
                            <img src="{{asset('web/images/icon/icon_03.png')}}" alt="" style="width:26%" class="img-responsive">
                            Album Designer
                          </h4>
                          <p>Design &amp; Upload Multiple Album Orders from PC/ Mac<br> "Designer" Software <br><a style="text-decoration: underline;color: #89bbc4;font-size: 22px" target="_blank" href="https://drive.google.com/open?id=1_rQjM-hDukr7bYlsifpA762HP13UHHU7">Download Now</a>.</p>
                      </a>
                  </div><!-- end cat-boxes -->
              </div><!-- end col -->
              <div class="col-sm-3 col-xs-12">
              </div><!-- end col -->
            </div>
          
        </div>
      </section>

      <section class="testimonial-section paralbackground parallax content-light" style="background-image:url('{{asset('web/upload/ss.jpg')}}');" data-img class="zoom"-width="2000" data-img-height="2000" data-diff="10">
          <div class="">
            <div class="row">
              <div class="col-md-12 p-30" style="padding-right: 17px">
                <div class="section-title text-center clearfix">
                    <h4>Happy Clients</h4>
                    <p>Let's see What Others Say About HomeStyle!</p>
                    <hr>
                </div><!-- end title -->

                <div id="owl-testimonial" class="text-center">
                    <div class="testi-item">
                        <img src="{{asset('web/upload/avatar_01.jpg')}}" alt="" class="img-circle">
                        <h4>Jenny DEO</h4>
                        <small>Envato.com</small>
                        <p class="lead">It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop ...</p>
                    </div><!-- end item -->

                    <div class="testi-item">
                        <img src="{{asset('web/upload/avatar_03.png')}}" alt="" class="img-circle">
                        <h4>Mark DEO</h4>
                        <small>Envato.com</small>
                        <p class="lead">It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop ...</p>
                    </div><!-- end item --> 
                </div><!-- end relative -->
              </div>
            </div>

          </div><!-- end container -->
      </section><!-- end section -->

      <section class="section" style="background-color: #eee;padding: 40px 0;">
          <div class="container">

              <div id="owl-client" class="clients">
                  <div class="client-logo GrayScale">
                      <a href="#"><img src="{{asset('web/upload/client_01.png')}}" alt="" class="img-responsive"></a>
                  </div><!-- end logo -->

                  <div class="client-logo GrayScale">
                      <a href="#"><img src="{{asset('web/upload/client_02.png')}}" alt="" class="img-responsive"></a>
                  </div><!-- end logo -->

                  <div class="client-logo GrayScale">
                      <a href="#"><img src="{{asset('web/upload/client_03.png')}}" alt="" class="img-responsive"></a>
                  </div><!-- end logo -->

                  <div class="client-logo GrayScale">
                      <a href="#"><img src="{{asset('web/upload/client_04.png')}}" alt="" class="img-responsive"></a>
                  </div><!-- end logo -->

              </div><!-- end row -->

          </div><!-- end container -->
      </section><!-- end section -->
      <!-- footer -->
    @endsection

    @section('script')
        <!-- REVOLUTION JS FILES -->
        <script type="text/javascript" src="{{asset('web/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('web/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->  
        <script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
        <!-- <script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script> -->

        <script type="text/javascript">
            /**===== Revolution Slider =====**/
            var tpj = jQuery;
            var revapi4;
            tpj(document).ready(function() {
                if (tpj("#rev_slider_4_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_4_1");
                } else {
                    revapi4 = tpj("#rev_slider_4_1").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "revolution/js/",
                        sliderLayout: "fullwidth",
                        dottedOverlay: "none",
                        delay: 7000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            arrows: {
                                style: "zeus",
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 600,
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                tmp: '<div class="tp-title-wrap"><div class="tp-arr-imgholder"></div></div>',
                                left: {
                                    h_align: "left",
                                    v_align: "center",
                                    h_offset: 0,
                                    v_offset: 0
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "center",
                                    h_offset: 0,
                                    v_offset: 0
                                }
                            },
                            bullets: {
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 600,
                                style: "metis",
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                direction: "horizontal",
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: 0,
                                v_offset: 30,
                                space: 5,
                                tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span>'
                            }
                        },
                        viewPort: {
                            enable: true,
                            outof: "pause",
                            visible_area: "80%"
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [500, 700, 500, 160],
                        lazyType: "none",
                        parallax: {
                            type: "mouse",
                            origo: "slidercenter",
                            speed: 3000,
                            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                        },
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        shuffle: "off",
                        autoHeight: "off",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
            /**===== End slider =====**/
        </script>
    @endsection     