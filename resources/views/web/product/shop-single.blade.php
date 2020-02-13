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
                                    <h3 id="product_name">{{ $product_detail->name }} </h3>
                                    <div>
                                        <p id="product_desc">{{ $product_detail->p_short_desc }}</p>

                                        <a class="button button--aylen btn" id="product_selection_btn">Product Selection</a>
{{-- 
                                        <div class="addwish">
                                            <a href="shop-wishlist.html"><i class="fa fa-heart-o"></i> Add to Wishlist</a>
                                        </div> --}}
                                        <div class="shopmeta">
                                            <span><strong>Category:</strong> <a href="#">{{ $product_detail->category_name }}</a></span>
                                        </div><!-- end shopmeta -->
                                    </div>
                                    <div id="product-select" style="display: none;">
                                        <h4 style="margin-bottom: 0">Product Selection</h4><hr>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label>Size*</label>
                                                <select class="form-control">
                                                    @if(!empty($product_sizes) && (count($product_sizes) > 0))
                                                        @foreach($product_sizes as $key => $item)
                                                        <option value="{{ $item->id }}">{{ $item->display_name }}</option>
                                                        @endforeach
                                                    @endif    
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>Number of {{ $product_detail->sheet_name }}
                                                *</label>
                                                <input type="text" value="{{ $product_detail->sheet_value }}" class="form-control" placeholder="">
                                            </div>
                                {{--             <div class="form-group col-sm-4">
                                                <label>Product Type*</label>
                                                <select class="form-control">
                                                    <option value="1">Paper</option>
                                                    <option value="2">Spread</option>
                                                    <option value="3">Quantity</option>  
                                                </select>
                                            </div> --}}
                                        </div>
                                        <div class="row my-option">
                                            <div class="form-group col-sm-12"><h5><strong>Option</strong></h5></div>
                                            {{-- Option1 --}}
                                            @if(!empty($option) && (count($option) > 0))
                                                @foreach($option as $key => $item)
                                            <div class="row ml-0 mr-0" >
                                                <div class="form-group col-sm-4">
                                                    <label>{{ $item['option_name'] }}*</label>
                                                    <select class="form-control" onchange="option_change_function({{ $item['option_id'] }});" id="option_detail{{ $item['option_id'] }}">
                                                        <option>Choose {{ $item['option_name'] }}</option>
                                                        @if(!empty($item['option_details']) && (count($item['option_details']) > 0))
                                                            @foreach($item['option_details'] as $key_1 => $item_1)
                                                                <option value="{{ $item_1->id }}">{{ $item_1->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-2"></div>
                                                <div class="form-group col-sm-6">
                                                    <div id="showOne">
                                                        <img src="#" alt="{{ $item['option_name'] }}" class="img-responsive img-thumbnail" id="option_detail_img{{ $item['option_id'] }}" style="display: none;" />
                                                    </div>
                                                </div>
                                            </div>
                                                @endforeach
                                            @endif
                                            {{-- //Option1 --}}
                                        </div>
                                        <div class="row price-div">
                                            <div class="col-sm-6">
                                                <h5>Sub Total : R {{ $product_detail->sheet_price }}</h5>
                                            </div>
                                            <div class="col-sm-6 flex">
                                                <a class="btn btn-cancel" id="cancel_btn" style="margin-right:10px">Cancel</a>
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
        <script src="{{asset('web/js/product_detail.js')}}"></script>
        <script type="text/javascript">
            (function($) {
            "use strict";
            jQuery('a[data-gal]').each(function() {
            jQuery(this).attr('rel', jQuery(this).data('gal')); });     
            jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'light_square',slideshow:true,overlay_gallery: true,social_tools:false,deeplinking:false});
            })(jQuery);
        </script>
    @endsection     