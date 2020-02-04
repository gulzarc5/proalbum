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
                      <li data-index="rs-181" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="{{asset('web/upload/slide2.jpg')}}"  data-rotate="0"  data-saveperformance="off"  data-title="For The Book Lovers" data-description="">
                         <!-- MAIN IMAGE -->
                         <img src="{{asset('web/upload/slide2.jpg')}}"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                         <!-- LAYERS -->
                         <!-- LAYER NR. BG -->
                         <!-- <div class="tp-caption tp-shape tp-shapewrapper   rs-parallaxlevel-0" 
                            id="slide-270-layer-101" 
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                            data-width="full"
                            data-height="full"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                            data-transform_out="s:300;s:300;" 
                            data-start="750" 
                            data-basealign="slide" 
                            data-responsive_offset="on" 
                            data-responsive="off"
                            style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 0.50);"> </div> -->
                         <!-- LAYER NR. 1 -->
                         <!-- <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme rs-parallaxlevel-0" 
                            id="slide-18-layer-91" 
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['15','15','15','15']" 
                            data-width="500"
                            data-height="140"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:0px;" 
                            data-mask_out="x:inherit;y:inherit;" 
                            data-start="2000" 
                            data-responsive_offset="on" 
                            style="z-index: 5;background-color:rgba(29, 29, 29, 0.85);border-color:rgba(0, 0, 0, 0.50);"> </div> -->
                         <!-- LAYER NR. 2 -->
                         <!-- <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" 
                            id="slide-18-layer-11" 
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                            data-fontsize="['70','70','70','35']"
                            data-lineheight="['70','70','70','50']"
                            data-width="none"
                            data-height="none"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1000" 
                            data-splitin="chars" 
                            data-splitout="none" 
                            data-responsive_offset="on" 
                            data-elementdelay="0.05" 
                            style="z-index: 6; white-space: nowrap;">SALAMANDER </div> -->
                         <!-- LAYER NR. 3 -->
                         <!-- <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0" 
                            id="slide-18-layer-41" 
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['52','51','51','31']" 
                            data-width="none"
                            data-height="none"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1500" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on" 
                            style="z-index: 7; white-space: nowrap;">GERMAN UPVC WINDOWS & DOOR SYSTEMS</div> -->
                      </li>
                      <li data-index="rs-18" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="{{asset('web/upload/slide3.jpg')}}"  data-rotate="0"  data-saveperformance="off"  data-title="Premium Photobook" data-description="">
                         <!-- MAIN IMAGE -->
                          <img src="{{asset('web/upload/slide3.jpg')}}"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                          <!-- LAYERS -->
                          <!-- LAYER NR. BG -->
                          <!-- <div class="tp-caption tp-shape tp-shapewrapper   rs-parallaxlevel-0" 
                            id="slide-270-layer-10" 
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                            data-width="full"
                            data-height="full"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                            data-transform_out="s:300;s:300;" 
                            data-start="750" 
                            data-basealign="slide" 
                            data-responsive_offset="on" 
                            data-responsive="off"
                            style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 0.50);"> </div> -->
                          <!-- LAYER NR. 1 -->
                          <!-- <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme rs-parallaxlevel-0" 
                            id="slide-18-layer-9" 
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['15','15','15','15']" 
                            data-width="500"
                            data-height="140"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:0px;" 
                            data-mask_out="x:inherit;y:inherit;" 
                            data-start="2000" 
                            data-responsive_offset="on" 
                            style="z-index: 5;background-color:rgba(29, 29, 29, 0.85);border-color:rgba(0, 0, 0, 0.50);"> </div> -->
                          <!-- LAYER NR. 2 -->
                          <!-- <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" 
                            id="slide-18-layer-1" 
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                            data-fontsize="['70','70','70','35']"
                            data-lineheight="['70','70','70','50']"
                            data-width="none"
                            data-height="none"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1000" 
                            data-splitin="chars" 
                            data-splitout="none" 
                            data-responsive_offset="on" 
                            data-elementdelay="0.05" 
                            style="z-index: 6; white-space: nowrap;">SALAMANDER</div> -->
                          <!-- LAYER NR. 3 -->
                          <!-- <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0" 
                            id="slide-18-layer-4" 
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['52','51','51','31']" 
                            data-width="none"
                            data-height="none"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1500" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on" 
                            style="z-index: 7; white-space: nowrap;">GERMAN UPVC WINDOWS & DOOR SYSTEMS</div> -->
                      </li>
                      <li data-index="rs-1812" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="{{asset('web/upload/slide1.jpg')}}"  data-rotate="0"  data-saveperformance="off"  data-title="Capture The Moment" data-description="">
                         <!-- MAIN IMAGE -->
                         <img src="{{asset('web/upload/slide1.jpg')}}"  alt="#"  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                         <!-- LAYERS -->
                         <!-- LAYER NR. BG -->
                         <!-- <div class="tp-caption tp-shape tp-shapewrapper   rs-parallaxlevel-0" 
                            id="slide-270-layer-1012" 
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                            data-width="full"
                            data-height="full"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                            data-transform_out="s:300;s:300;" 
                            data-start="750" 
                            data-basealign="slide" 
                            data-responsive_offset="on" 
                            data-responsive="off"
                            style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 0.50);"> </div> -->
                         <!--  LAYER NR. 1 -->
                          <!-- <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme rs-parallaxlevel-0" 
                            id="slide-18-layer-912" 
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['15','15','15','15']" 
                            data-width="500"
                            data-height="140"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:0px;" 
                            data-mask_out="x:inherit;y:inherit;" 
                            data-start="2000" 
                            data-responsive_offset="on" 
                            style="z-index: 5;background-color:rgba(29, 29, 29, 0.85);border-color:rgba(0, 0, 0, 0.50);"> </div> -->
                         <!--  LAYER NR. 2 -->
                          <!-- <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" 
                            id="slide-18-layer-112" 
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                            data-fontsize="['70','70','70','35']"
                            data-lineheight="['70','70','70','50']"
                            data-width="none"
                            data-height="none"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1000" 
                            data-splitin="chars" 
                            data-splitout="none" 
                            data-responsive_offset="on" 
                            data-elementdelay="0.05" 
                            style="z-index: 6; white-space: nowrap;">SALAMANDER</div> -->
                         <!--  LAYER NR. 3 -->
                         <!-- <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0" 
                            id="slide-18-layer-412" 
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['52','51','51','31']" 
                            data-width="none"
                            data-height="none"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1500" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on" 
                            style="z-index: 7; white-space: nowrap;">GERMAN UPVC WINDOWS & DOOR SYSTEMS </div> -->
                      </li>
                  </ul>
                  <div class="tp-static-layers"></div>
              </div>
          </div>
      </div><!-- end first slider -->

      <section class="home-gallery">
        <div class="container-fluid">
            <div class="section-title text-center clearfix">
                <h4>Our Products</h4>
                <p>Listed below our awesome products with a stylish portfolio section!</p>
                <hr>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12">
                    <nav class="portfolio-filter text-center">
                        <ul class="list-inline">
                            <li><a class="button button--aylen btn" data-filter="*">All</a></li>
                            <li><a class="button button--aylen btn" data-filter=".cat2">Pillows</a></li>
                            <li><a class="button button--aylen btn" data-filter=".cat1">Furniture Sets</a></li> 
                            <li><a class="button button--aylen btn" data-filter=".cat3">Combinations</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div id="da-thumbs" class="da-thumbs">
                <div class="pentry item-w1 item-h1 cat1">
                    <a href="{{route('web.shop-single')}}" title="">
                        <img src="{{asset('web/images/photo/2.jpg')}}" alt="" class="img-responsive">
                        <figcaption>
                          <h5>Hardcover Photo Book</h5>
                          <span>Rs. 100</span>
                        </figcaption>
                    </a>
                </div>
                <div class="pentry item-w1 item-h1 cat2 cat1">
                    <a href="{{route('web.shop-single')}}" title="">
                        <img src="{{asset('web/images/photo/4.jpg')}}" alt="" class="img-responsive">
                        <figcaption>
                          <h5>Hardcover Photo Book</h5>
                          <span>Rs. 100</span>
                        </figcaption>
                    </a>
                </div>

                <div class="pentry item-w1 item-h1 cat2 cat3">
                    <a href="{{route('web.shop-single')}}" title="">
                        <img src="{{asset('web/images/photo/5.jpg')}}" alt="" class="img-responsive">
                        <figcaption>
                          <h5>Hardcover Photo Book</h5>
                          <span>Rs. 100</span>
                        </figcaption>
                    </a>
                </div>

                <div class="pentry item-w1 item-h1 cat1 cat3">
                    <a href="{{route('web.shop-single')}}" title="">
                        <img src="{{asset('web/images/photo/1.jpg')}}" alt="" class="img-responsive">
                        <figcaption>
                          <h5>Hardcover Photo Book</h5>
                          <span>Rs. 100</span>
                        </figcaption>
                    </a>
                </div>

                <div class="pentry item-w1 item-h1 cat2">
                    <a href="{{route('web.shop-single')}}" title="">
                        <img src="{{asset('web/images/photo/6.jpg')}}" alt="" class="img-responsive">
                        <figcaption>
                          <h5>Hardcover Photo Book</h5>
                          <span>Rs. 100</span>
                        </figcaption>
                    </a>
                </div>

                <div class="pentry item-w1 item-h1 cat3 cat2">
                    <a href="{{route('web.shop-single')}}" title="">
                        <img src="{{asset('web/images/photo/3.jpg')}}" alt="" class="img-responsive">
                        <figcaption>
                          <h5>Hardcover Photo Book</h5>
                          <span>Rs. 100</span>
                        </figcaption>
                    </a>
                </div>

                <div class="pentry item-w1 item-h1 cat3">
                    <a href="{{route('web.shop-single')}}" title="">
                        <img src="{{asset('web/images/photo/2.jpg')}}" alt="" class="img-responsive">
                        <figcaption>
                          <h5>Hardcover Photo Book</h5>
                          <span>Rs. 100</span>
                        </figcaption>
                    </a>
                </div>

                <div class="pentry item-w1 item-h1 cat1">
                    <a href="{{route('web.shop-single')}}" title="">
                        <img src="{{asset('web/images/photo/3.jpg')}}" alt="" class="img-responsive">
                        <figcaption>
                          <h5>Hardcover Photo Book</h5>
                          <span>Rs. 100</span>
                        </figcaption>
                    </a>
                </div>

            </div><!-- end div -->

            <hr class="invis">
        </div><!-- end container-fluid -->
      </section><!-- end section -->

      <section class="catagory-section" style="background-color: #c1bebe36;">
        <div class="container">
            <div class="section-title text-center clearfix">
                <h4>Top Categories</h4>
                <p>Listed below our top categories, campaings, promotions and offers for you!</p>
                <hr>
            </div><!-- end title -->

            <article class='gallery'>
              <a class='gallery-link'>
                  <figure class='gallery-image'>
                      <img class="zoom" height='1600' src="{{asset('web/images/photos/1.jpg')}}">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class='gallery-link'>
                  <figure class='gallery-image'>
                      <img class="zoom" height='1600' src="{{asset('web/images/photos/2.jpg')}}">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class='gallery-link'>
                  <figure class='gallery-image'>
                      <img class="zoom" height='1600' src="{{asset('web/images/photos/3.jpg')}}">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class='gallery-link'>
                  <figure class='gallery-image'>
                      <img class="zoom" height='1200' src="{{asset('web/images/photos/9.jpg')}}" width='1200'>
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class='gallery-link'>
                  <figure class='gallery-image'>
                      <img class="zoom" height='1200' src="{{asset('web/images/photos/8.jpg')}}" width='1200'>
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class='gallery-link'>
                  <figure class='gallery-image'>
                      <img class="zoom" height='1400' src="{{asset('web/images/photos/7.jpg')}}">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class='gallery-link'>
                  <figure class='gallery-image'>
                      <img class="zoom" height='1400' src="{{asset('web/images/photos/4.jpg')}}">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class='gallery-link'>
                  <figure class='gallery-image'>
                      <img class="zoom" height='1000' src="{{asset('web/images/photos/5.jpg')}}">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class='gallery-link'>
                  <figure class='gallery-image'>
                      <img class="zoom" height='1200' src="{{asset('web/images/photos/6.jpg')}}">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>              
            </article>

        </div><!-- end container -->
      </section><!-- end section -->

      <section class="testimonial-section paralbackground parallax content-light" style="background-image:url('{{asset('web/upload/ss.jpg')}}');" data-img class="zoom"-width="2000" data-img-height="2000" data-diff="10">
          <div class="container">
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
                        gridheight: [500, 700, 500, 400],
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