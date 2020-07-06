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
                <h4>
                  @if (isset($album) && !empty($album))
                      {{$album->name}}
                  @endif
                </h4>
                <hr>
            </div><!-- end title -->

            <div class="row">
              @if (isset($images) && !empty($images))
              @foreach ($images as $item)
              <div class="col-md-3">
                <div class="singlephoto">
                  <a data-rel="prettyPhoto[gallery]" href="{{asset('assets/gallery/'.$item->image.'')}}">
                    <img src="{{asset('assets/gallery/thumb/'.$item->image.'')}}">                    
                    <h4 class="img-tittle text-center">{{$item->caption}} </h4>
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div> 
              @endforeach 
              @endif         
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