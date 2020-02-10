  @extends('web.templet.master')

    {{-- META --}}
    @section('meta')
      <title>Premium Photobooks | Making Albums For South Africa</title>
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="">
    @endsection

    {{-- EXTRA STYLESHEET --}}
    @section('stylesheet')
        <link rel="stylesheet" type="text/css" href="{{asset('web/css/prettyPhoto.css')}}">
    @endsection
      <!-- end header -->

    @section('content')
        <section class="section paralbackground page-banner hidden-xs" style="background-image:url('{{asset('web/upload/page_banner_shop.jpg')}}');" data-img-width="2000" data-img-height="400" data-diff="100">
        </section>
        <!-- end section -->

        <section class="section single-white-shop">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-sm-12 single-blog">

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="product-images">
                                    <ul class="thumbnail">
                                        <li> <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_02.jpg')}}" title=""><img class="img-responsive" src="{{asset('web/upload/shop_02.jpg')}}" alt="" /></a></li>
                                        <li> <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_01.jpg')}}" title=""><img class="img-responsive" src="{{asset('web/upload/shop_01.jpg')}}" alt="" /></a></li>
                                        <li> <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_03.jpg')}}" title=""><img class="img-responsive"  src="{{asset('web/upload/shop_03.jpg')}}" alt="" /></a></li>
                                        <li> <a data-rel="prettyPhoto[gallery]" href="{{asset('web/upload/shop_04.jpg')}}" title=""><img class="img-responsive"  src="{{asset('web/upload/shop_04.jpg')}}" alt="" /></a></li>
                                    </ul>
                                     <a data-rel="prettyPhoto" href="{{asset('web/upload/shop_02.jpg')}}" class="product-images-main" title="">
                                        <img class="img-responsive" src="{{asset('web/upload/shop_02.jpg')}}" alt="" />
                                     </a>
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="shop-desc bgw">
                                    <h3>Custom Single Shop Item </h3>
                                    <div>
                                        <p>Lorem iam nonummy nibh euismod tincidunt ut laoreet dolore Lorem ipsum dolor sit amet orem iam nonummy nibh euismod tincidunt ut laoreet dolore Lorem ipsum dolor sit amet nibh euismod tincidunt ut laoreet dolore Lorem ipsum dolor sit amet orem iam nonummy nibh euismod tincidunt ut laoreet dolore Lorem ipsum dolor sit amet..</p>

                                        <a href="#" class="button button--aylen btn">Product Selection</a>

                                        <div class="addwish">
                                            <a href="shop-wishlist.html"><i class="fa fa-heart-o"></i> Add to Wishlist</a>
                                        </div><!-- end addw -->
                                        <div class="shopmeta">
                                            <span><strong>Category:</strong> <a href="#">Furniture Supplies Foods</a></span>
                                            <span><strong>Tags:</strong> <a href="#">Furniture</a>, <a href="#">Art</a></span>
                                        </div><!-- end shopmeta -->
                                    </div>
                                    <div id="product-select">
                                        <h4>Product Selection</h4>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>Size*</label>
                                                <select class="form-control">
                                                    <option value="">12 x 12</option>
                                                    <option value="">15 x 15</option>
                                                    <option value="">20 x 20</option>                                                    
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Number of pages*</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <a href="{{route('web.shipping_address_list')}}" class="btn btn-cancel" style="margin-right:10px">Cancel</a>
                                            <button type="submit" class="btn btn-primary">Proceed to cart</button>                                
                                        </div>
                                    </div>   
                                </div><!-- end desc -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-style-1">
                                    <div class="tabbed-widget">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#home">Descriptions</a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="home" class="tab-pane fade in active">
                                                <p><img src="{{asset('web/upload/alignright.png')}}" class="alignleft" alt=""> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut..</p>

                                                <p> In dignissim feugiat gravida.Proin quis mauris ut magna fringilla vulputate quis non ante. Integer bibendum er bibendum velit dui. Sed cm at tincidunt felis,. Nulla dictum id enim vitavelit dui. Sed coibus vulputate. Phasellus eget fringilla justo. Aliquam erat volutpat. Praenisi, vehicula fringilla ruibus iaculis. Sed non lorem in quam placerat facilisis nec eu quam. Etiam at tincidunt felis,. Nulla dictum id enim vitae fermentum. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end tabbed-widget -->
                                </div>
                                <!-- end service-style-1 -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section lb">
            <div class="container">
                <div class="section-title text-center clearfix">
                    <h4>Related Items</h4>
                    <p>We showcase all our premium quality home decoration materials and furniture's!</p>
                    <hr>
                </div><!-- end title -->

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="shop-item text-center">
                            <div class="shop-thumbnail">
                                <a href=""><img src="{{asset('web/upload/shop_01.jpg')}}" alt="" class="img-responsive"></a>
                            </div><!-- end shop-thumbnail -->
                            <div class="shop-desc">
                                <h3><a href="shop-single.html" title="">Table Pink Lamp</a></h3>
                                <small class="regular">$90.00</small>
                            </div><!-- end shop-desc -->

                            <div class="shop-meta clearfix">
                                <ul class="">
                                    <li><a href="shop-single.html"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></a></li>
                                    <li><a href="shop-wishlist.html"><i class="fa fa-heart-o"></i> <span class="hidden-xs">Wishlist</span></a></li>
                                </ul><!-- end list -->
                            </div><!-- end shop-meta --> 
                        </div><!-- end shop-item -->
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="shop-item text-center">
                            <div class="shop-thumbnail">
                                <a href=""><img src="{{asset('web/upload/shop_02.jpg')}}" alt="" class="img-responsive"></a>
                            </div><!-- end shop-thumbnail -->
                            <div class="shop-desc">
                                <h3><a href="shop-single.html" title="">Oldschool Armchair</a></h3>
                                <small class="regular">$1233.00</small>
                            </div><!-- end shop-desc -->

                            <div class="shop-meta clearfix">
                                <ul class="">
                                    <li><a href="shop-single.html"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></a></li>
                                    <li><a href="shop-wishlist.html"><i class="fa fa-heart-o"></i> <span class="hidden-xs">Wishlist</span></a></li>
                                </ul><!-- end list -->
                            </div><!-- end shop-meta --> 
                        </div><!-- end shop-item -->
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="shop-item text-center">
                            <div class="shop-thumbnail">
                                <a href=""><img src="{{asset('web/upload/shop_03.jpg')}}" alt="" class="img-responsive"></a>
                            </div><!-- end shop-thumbnail -->
                            <div class="shop-desc">
                                <h3><a href="shop-single.html" title="">Classic Gramophone</a></h3>
                                <small class="regular">$553.00</small>
                            </div><!-- end shop-desc -->

                            <div class="shop-meta clearfix">
                                <ul class="">
                                    <li><a href="shop-single.html"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></a></li>
                                    <li><a href="shop-wishlist.html"><i class="fa fa-heart-o"></i> <span class="hidden-xs">Wishlist</span></a></li>
                                </ul><!-- end list -->
                            </div><!-- end shop-meta --> 
                        </div><!-- end shop-item -->
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="shop-item text-center">
                            <div class="shop-thumbnail">
                                <a href=""><img src="{{asset('web/upload/shop_04.jpg')}}" alt="" class="img-responsive"></a>
                            </div><!-- end shop-thumbnail -->
                            <div class="shop-desc">
                                <h3><a href="shop-single.html" title="">Berlingo Armchair</a></h3>
                                <small class="regular">$600.00</small>
                            </div><!-- end shop-desc -->

                            <div class="shop-meta clearfix">
                                <ul class="">
                                    <li><a href="shop-single.html"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></a></li>
                                    <li><a href="shop-wishlist.html"><i class="fa fa-heart-o"></i> <span class="hidden-xs">Wishlist</span></a></li>
                                </ul><!-- end list -->
                            </div><!-- end shop-meta --> 
                        </div><!-- end shop-item -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
        
        <!-- footer -->
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