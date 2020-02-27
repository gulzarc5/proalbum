  @extends('web.templet.master')

    {{-- META --}}
    @section('meta')
      <title>Premium Photobooks | Making Albums For South Africa</title>
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="">
    @endsection
      <!-- end header -->
       {{-- EXTRA STYLESHEET --}}
    @section('stylesheet')
        <link rel="stylesheet" type="text/css" href="{{asset('web/css/prettyPhoto.css')}}">
    @endsection
      <!-- end header -->

    @section('content')

    <section class="catagory-section gallery-container" style="background-color: #c1bebe36;">
        <div class="container">
            <div class="section-title text-center clearfix">
                <h4>Gallery</h4>
                <hr>
            </div><!-- end title -->

            <div class="row">
              <div class="col-md-3">
                <div class="singlephoto">
                  <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_01.jpg')}}">
                    <img src="{{asset('web/upload/shop_01.jpg')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="singlephoto">
                  <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_02.jpg')}}">
                    <img src="{{asset('web/upload/shop_02.jpg')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="singlephoto">
                  <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_03.jpg')}}">
                    <img src="{{asset('web/upload/shop_03.jpg')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="singlephoto">
                  <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_04.jpg')}}">
                    <img src="{{asset('web/upload/shop_04.jpg')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="singlephoto">
                  <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_05.jpg')}}">
                    <img src="{{asset('web/upload/shop_05.jpg')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="singlephoto">
                  <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_06.jpg')}}">
                    <img src="{{asset('web/upload/shop_06.jpg')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="singlephoto">
                  <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_07.jpg')}}">
                    <img src="{{asset('web/upload/shop_07.jpg')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="singlephoto">
                  <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_08.jpg')}}">
                    <img src="{{asset('web/upload/shop_08.jpg')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="singlephoto">
                  <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_09.jpg')}}">
                    <img src="{{asset('web/upload/shop_09.jpg')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="singlephoto">
                  <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_10.jpg')}}">
                    <img src="{{asset('web/upload/shop_10.jpg')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="singlephoto">
                  <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_11.jpg')}}">
                    <img src="{{asset('web/upload/shop_11.jpg')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="singlephoto">
                  <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_12.jpg')}}">
                    <img src="{{asset('web/upload/shop_12.jpg')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
        </div><!-- end container -->
      </section>

    @endsection
    @section('script')
        <!-- prettyPhoto STYLES -->
        <script src="{{asset('web/js/jquery.prettyPhoto.js')}}"></script>
        <script type="text/javascript">
            (function($) {
            "use strict";
            jQuery('a[data-gal]').each(function() {
            jQuery(this).attr('rel', jQuery(this).data('gal')); });     
            jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'light_square',slideshow:true,overlay_gallery: true,social_tools:false,deeplinking:false});
            })(jQuery);
        </script>
    @endsection 