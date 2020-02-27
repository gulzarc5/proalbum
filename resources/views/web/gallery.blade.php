  @extends('web.templet.master')

    {{-- META --}}
    @section('meta')
      <title>Premium Photobooks | Making Albums For South Africa</title>
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="">
    @endsection
      <!-- end header -->

    @section('content')

    <section class="catagory-section" style="background-color: #c1bebe36;">
        <div class="container">
            <div class="section-title text-center clearfix">
                <h4>Gallery</h4>
                <hr>
            </div><!-- end title -->

            <article class="gallery">
              <a class="gallery-link">
                  <figure class="gallery-image">
                      <img class="zoom" height="1600" src="http://localhost/proalbum/public/web/images/photos/1.jpg">
                      <a class="gallery-link" data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_02.jpg')}}"><figcaption>Photo caption</figcaption></a>
                  </figure>
              </a>
              <a class="gallery-link">
                  <figure class="gallery-image">
                      <img class="zoom" height="1600" src="http://localhost/proalbum/public/web/images/photos/2.jpg">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class="gallery-link">
                  <figure class="gallery-image">
                      <img class="zoom" height="1600" src="http://localhost/proalbum/public/web/images/photos/3.jpg">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class="gallery-link">
                  <figure class="gallery-image">
                      <img class="zoom" height="1200" src="http://localhost/proalbum/public/web/images/photos/9.jpg" width="1200">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class="gallery-link">
                  <figure class="gallery-image">
                      <img class="zoom" height="1200" src="http://localhost/proalbum/public/web/images/photos/8.jpg" width="1200">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class="gallery-link">
                  <figure class="gallery-image">
                      <img class="zoom" height="1400" src="http://localhost/proalbum/public/web/images/photos/7.jpg">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class="gallery-link">
                  <figure class="gallery-image">
                      <img class="zoom" height="1400" src="http://localhost/proalbum/public/web/images/photos/4.jpg">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class="gallery-link">
                  <figure class="gallery-image">
                      <img class="zoom" height="1000" src="http://localhost/proalbum/public/web/images/photos/5.jpg">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>
              <a class="gallery-link">
                  <figure class="gallery-image">
                      <img class="zoom" height="1200" src="http://localhost/proalbum/public/web/images/photos/6.jpg">
                      <figcaption>Photo caption</figcaption>
                  </figure>
              </a>              
            </article>

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