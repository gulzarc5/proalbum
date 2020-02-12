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
                                        <img class="img-responsive" src="{{asset('assets/product/thumb/'.$product_detail->image.'')}}" alt="" />
                                     </a>
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="shop-desc bgw">
                                    <h3>{{ $product_detail->name }} </h3>
                                    <div>
                                        {{ $product_detail->p_short_desc }}

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
                                        <h4 style="margin-bottom: 0">Product Selection</h4><hr>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label>Size*</label>
                                                <select class="form-control">
                                                    <option value="">12 x 12</option>
                                                    <option value="">15 x 15</option>
                                                    <option value="">20 x 20</option>                                                    
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>Number of pages*</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>Product Type*</label>
                                                <select class="form-control">
                                                    <option value="">Paper</option>
                                                    <option value="">Spread</option>
                                                    <option value="">Quantity</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row my-option">
                                            <div class="form-group col-sm-12"><h5><strong>Option</strong></h5></div>
                                            {{-- Option1 --}}
                                            <div class="row ml-0 mr-0" >
                                                <div class="form-group col-sm-4">
                                                    <label>Colour*</label>
                                                    <select class="form-control" id="myselection">
                                                        <option>Select Option</option>
                                                        <option value="One"/>Manager</option>
                                                        <option value="Two"/>HR</option>
                                                        <option value="Three"/>Developer</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-2"></div>
                                                <div class="form-group col-sm-6">
                                                    <div id="showOne" class="myDiv">
                                                        <img src="{{asset('web/upload/shop_02.jpg')}}" alt="Manager" class="img-responsive img-thumbnail"/>
                                                    </div>
                                                    <div id="showTwo" class="myDiv">
                                                        <img src="{{asset('web/upload/shop_01.jpg')}}" alt="HR" class="img-responsive img-thumbnail"/>
                                                    </div>
                                                    <div id="showThree" class="myDiv">
                                                        <img src="{{asset('web/upload/shop_03.jpg')}}" alt="Developer" class="img-responsive img-thumbnail"/>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- //Option1 --}}
                                        </div>
                                        <div class="row price-div">
                                            <div class="col-sm-6">
                                                <h5>Sub Total : R 100</h5>
                                            </div>
                                            <div class="col-sm-6 flex">
                                                <a href="{{route('web.shipping_address_list')}}" class="btn btn-cancel" style="margin-right:10px">Cancel</a>
                                                <button type="submit" class="btn btn-primary">Proceed to cart</button>                               
                                            </div>
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
                                                <p><img src="{{asset('assets/product/thumb/'.$product_detail->image.'')}}" class="alignleft" alt=""> 
                                                    {!! $product_detail->p_long_description !!}
                                                </p>
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
                    @if(!empty($related_product) && (count($related_product) > 0))
                        @foreach($related_product as $key => $item)
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="shop-item text-center">
                                <div class="shop-thumbnail">
                                    <a href=""><img src="{{asset('assets/product/thumb/'.$item->image.'')}}" alt="" class="img-responsive"></a>
                                </div><!-- end shop-thumbnail -->
                                <div class="shop-desc">
                                    <h3><a href="shop-single.html" title="">{{ $item->name }}</a></h3>{{-- 
                                    <small class="regular">${{ $item->price }}</small> --}}
                                </div><!-- end shop-desc -->

                                <div class="shop-meta clearfix">
                                    <ul class="">
                                        <li><a href="{{ route('web.product_detail', ['slug' => $item->slug, 'product_id' => $item->id]) }}"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></a></li>
                                        <li><a href="shop-wishlist.html"><i class="fa fa-heart-o"></i> <span class="hidden-xs">Wishlist</span></a></li>
                                    </ul><!-- end list -->
                                </div><!-- end shop-meta --> 
                            </div><!-- end shop-item -->
                        </div><!-- end col -->
                        @endforeach
                    @endif
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

        <script>
            $(document).ready(function(){
                $('#myselection').on('change', function(){
                    var demovalue = $(this).val(); 
                    $("div.myDiv").hide();
                    $("#show"+demovalue).show();
                });
            });
        </script>
    @endsection     