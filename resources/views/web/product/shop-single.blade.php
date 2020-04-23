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
                                    <div style="margin:0 auto;" class="html5gallery" data-skin="verticallight" data-width="400" data-height="225" data-resizemode="fill">
    
                                        <!-- Add images to Gallery -->

                                        @if (isset($product_images) && !empty($product_images))
                                            @foreach ($product_images as $item)
                                                <a href="{{asset('assets/product/'.$item->images.'')}}"><img src="{{asset('assets/product/thumb/'.$item->images.'')}}" alt="product images"></a>
                                            @endforeach
                                        @endif                                        
                                        
                                        <!-- Add videos to Gallery -->
                                        <a href="{{asset('web/images/video/Black-Friday.mp4')}}" data-webm="{{asset('web/images/video/Black-Friday.mp4')}}"><img src="{{asset('assets/product/thumb/315821156672020-Feb-19.jpg')}}" alt="Big Buck Bunny, Copyright Blender Foundation"></a>
                                    
                                    </div>                                
                            </div><!-- end col -->

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="shop-desc bgw">
                                    <h3 id="product_name">{{ $product_detail->name }} </h3>
                                    <div style="width:100%">
                                        <p id="product_desc">{{ $product_detail->p_short_desc }}</p>

                                        <a class="button button--aylen btn" id="product_selection_btn">Product Selection</a>                                        
                                    </div>
                                    <hr>
                                    <div style="width:100%" id="feature_details"> 
                                        <div class="shopmeta">
                                            <span><strong>Category:</strong> <a>{{ $product_detail->category_name }}</a></span>
                                        </div>
                                        <div class="shopmeta">
                                            <span><strong>Product Code:</strong> <a>{{ $product_detail->product_code }}</a></span>
                                        </div>
                                        <div class="shopmeta">
                                            <span><strong>Unit:</strong> <a>{{ $product_detail->unit }}</a></span>
                                        </div>
                                        <div class="shopmeta">
                                            <span><strong>Dpi:</strong> <a>{{ $product_detail->dpi }}</a></span>
                                        </div>
                                        <div class="shopmeta">
                                            <span><strong>Min Order {{$product_detail->sheet_name}} :</strong> <a>{{ $product_detail->sheet_value }}</a></span>
                                        </div>
                                        <div class="shopmeta">
                                            <span><strong>Price :</strong> <a>R {{ $product_detail->sheet_price }}</a></span>
                                        </div>
                                        @if (isset($option) && !empty($option) && (count($option) > 0))
                                            @foreach ($option as $option_item)
                                                @if (count($option_item['option_details']) > 0)
                                                <div class="shopmeta">
                                                    <span><strong>{{$option_item['option_name']}} :</strong> 
                                                    @foreach ($option_item['option_details'] as $item)
                                                        <a>{{ $item->name }}</a> ,
                                                    @endforeach
                                                    </span>
                                                </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div id="product-select" style="display: none;">
                                        {{ Form::open(['method' => 'post','route'=>'web.add_to_cart', 'id'=>'product_selection_form']) }}
                                        <input type="hidden" id="fetch_price_action" value="{{route('web.product_detail_price_fetch')}}">
                                        <input type="hidden" name="product_id" value="{{ $product_detail->id }}">
                                        <h4 style="margin-bottom: 0">Product Selection</h4><hr>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label>Size*</label>
                                                <select class="form-control" name="size_id" onchange="priceGetValue()">
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
                                                <input type="number" name="size_value" value="{{ $product_detail->sheet_value }}" class="form-control" placeholder="" name="size_value" onchange="priceGetValue()">
                                            </div>
                                        </div>
                                        <div class="row my-option">
                                            <div class="form-group col-sm-12"><h5><strong>Option</strong></h5></div>
                                            {{-- Option1 --}}
                                            @if(!empty($option) && (count($option) > 0))
                                                @foreach($option as $key => $item)
                                                    @if(!empty($item['option_details']) && (count($item['option_details']) > 0))
                                                    <div class="row ml-0 mr-0" >
                                                        <div class="form-group col-sm-5">
                                                            <label>{{ $item['option_name'] }}*</label>
                                                            {{-- <input type="text" name="option_id[]" value="{{$item['option_id']}}"> --}}
                                                            <select class="form-control" onchange="option_change_function({{ $item['option_id'] }});" id="option_detail{{ $item['option_id'] }}" name="option_detail_id[{{$item['option_id']}}][]">
                                                                <option value="">Choose {{ $item['option_name'] }}</option>          
                                                                    @foreach($item['option_details'] as $key_1 => $item_1)
                                                                        <option value="{{ $item_1->id }}">{{ $item_1->name }}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-1"></div>
                                                        <div class="form-group col-sm-6">
                                                            <div id="DisplayOptionImage{{ $item['option_id'] }}">
                                                                
                                                            </div>
                                                            @if(!empty($item['option_details']) && (count($item['option_details']) > 0))
                                                                @foreach($item['option_details'] as $key_1 => $item_1)
                                                                    <div id="optionDetailImage{{$item_1->id}}" style="display:none">
                                                                        <img src="{{asset('assets/option_image/'.$item_1->image.'')}}" alt="{{ $item_1->name }}" class="img-responsive img-thumbnail" style="max-height: 117px;">
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                            {{-- //Option1 --}}
                                        </div>
                                        <div class="row price-div">
                                            <div class="col-sm-6">
                                                <h5 style="font-size: 20px;font-weight: 500;color: #fff;">Sub Total : R <b id="showPriceProduct">{{ $product_detail->sheet_price }}</b></h5>
                                            </div>
                                            <div class="col-sm-6 flex">
                                                <a class="btn btn-cancel" id="cancel_btn" style="margin-right:10px">Cancel</a>
                                                <button type="submit" class="btn btn-primary">Proceed to cart</button>                               
                                            </div>
                                        </div>
                                        {{Form::close()}}
                                        {{-- Ajax Loader HTML --}}
                                        <div class="box" id="price_loader" style="display: none;">
                                            <div class="loader1"></div>
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
                                                <p>
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
                                    <a href="{{ route('web.product_detail', ['slug' => $item->slug, 'product_id' => $item->id]) }}"><img src="{{asset('assets/product/thumb/'.$item->image.'')}}" alt="" class="img-responsive"></a>
                                </div><!-- end shop-thumbnail -->
                                <div class="shop-desc">
                                    <h3><a href="shop-single.html" title="">{{ $item->name }}</a></h3>
                                    <p class="regular">Starting from <span>R 125</span></p>   
                                </div><!-- end shop-desc -->

                                <div class="shop-meta clearfix">
                                    <ul class="">
                                        <li><a href="{{ route('web.product_detail', ['slug' => $item->slug, 'product_id' => $item->id]) }}"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></a></li>
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
        
        <script src="{{asset('web/js/product_detail.js')}}"></script>

        <script type="text/javascript" src="{{asset('web/js/html5gallery.js')}}"></script>
    @endsection     