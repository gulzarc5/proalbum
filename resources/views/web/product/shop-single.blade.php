  @extends('web.templet.master')

    {{-- META --}}
    @section('meta')
        <title>Premium Photobooks | Making Albums For South Africa</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <link rel="stylesheet" type="text/css" href="{{asset('web/sliderengine/amazingslider-1.css')}}">
        <style>.amazingslider-text-box-1{display:none!important}</style>
    @endsection

    {{-- EXTRA STYLESHEET --}}
    @section('stylesheet')
        <link rel="stylesheet" type="text/css" href="{{asset('web/css/prettyPhoto.css')}}">
    @endsection
      <!-- end header -->

    @section('content')
        @if (isset($product_detail->banner) && !empty($product_detail->banner))
        <section class="section paralbackground page-banner hidden-xs" style="background-image:url('{{asset('assets/product/'.$product_detail->banner.'')}}');" data-img-width="2000" data-img-height="400" data-diff="100">
        </section>
        @endif
        <!-- end section -->

        <section class="section single-white-shop">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-sm-12 single-blog">

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    
                                    <div class="amazingslider-wrapper" id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:500px;margin:0px auto 108px;">
                                        <div class="amazingslider" id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                                            <ul class="amazingslider-slides" style="display:none;">
                                                @if (isset($product_images) && !empty($product_images))
                                                    @foreach ($product_images as $item)
                                                    <li><img src="{{asset('assets/product/thumb/'.$item->images.'')}}" alt="1"  title="1" />
                                                    </li>
                                                    @endforeach
                                                @endif 
                                                @if (isset($product_detail->video) && !empty($product_detail->video) && !empty($product_detail->video_thumb))
                                                <li><img src="{{asset('assets/product/'.$product_detail->video_thumb.'')}}" alt="Black-Friday"  title="Black-Friday" />
                                                <video preload="none" src="https://www.youtube.com/embed/{{$product_detail->video}}?v=hFGG7T3Mq3w&list=RDhFGG7T3Mq3w&start_radio=1" ></video>
                                                </li>
                                                @endif
                                            </ul>
                                            <ul class="amazingslider-thumbnails" style="display:none;">
                                                @if (isset($product_images) && !empty($product_images))
                                                    @foreach ($product_images as $item)
                                                    <li><img src="{{asset('assets/product/thumb/'.$item->images.'')}}" alt="1"  title="1" />
                                                    </li>
                                                    @endforeach
                                                @endif  
                                                @if (isset($product_detail->video) && !empty($product_detail->video) && !empty($product_detail->video_thumb))
                                                <li><img src="{{asset('assets/product/'.$product_detail->video_thumb.'')}}" alt="Black-Friday" title="Black-Friday" /></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>                                
                            </div><!-- end col -->

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="shop-desc bgw">
                                    <h3 id="product_name">{{ $product_detail->name }} </h3>
                                    <div style="width:100%">
                                        <p id="product_desc">{{ $product_detail->p_short_desc }}</p>

                                        <a class="button button--aylen btn"  data-toggle="modal" data-target="#exampleModalCenter">Get Estimates</a>                                        
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
                                                <h5>Total :  R <b id="showPriceProduct">{{ $product_detail->sheet_price }}</b></h5>
                                                <h5>Vat @ 15% : R <b id="showPriceVat">{{ (($product_detail->sheet_price*15)/100) }}</b></h5>
                                                <h5>Sub Total : R <b id="showPricetotal">{{ ($product_detail->sheet_price + (($product_detail->sheet_price*15)/100)) }}</b></h5>
                                            </div>
                                            <div class="col-sm-6 flex">
                                                <a class="btn btn-cancel" id="cancel_btn" style="margin-right:10px">Cancel</a>
                                                <a href="http://orders.proalbums.co.za/Login.aspx?CompanyID=rfdQoTDga7aQhXaPLdOEBg==" class="btn btn-primary">Order Now</a>                               
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

        <section class="home-gallery">
            <div class="container">
                <div class="section-title text-center clearfix">
                    <h4>Related Items</h4>
                    <p>We showcase all our premium quality home decoration materials and furniture's!</p>
                    <hr>
                </div><!-- end title -->

                <div class="tab-content">
                    <!-- Tab 1 -->
                    <div class="tab-pane fade in active" id="1">
                        <div class=row>
                        @if(!empty($related_product) && (count($related_product) > 0))
                            @foreach($related_product as $key => $item)
                            <div class="col-md-3 col-xs-6">
                                <div class="tab-block">
                                    <a href="{{ route('web.product_detail', ['slug' => $item->slug, 'product_id' => $item->id]) }}"><img src="{{asset('assets/product/thumb/'.$item->image.'')}}" alt="" class="img-responsive">
                                        <figcaption>
                                            <h5 class="f-w-6">{{ $item->name }}</h5>
                                            <p class="regular">Starting from <span>R {{$item->price}}</span></p>
                                            <p class="index-product-detail"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></p>
                                        </figcaption>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        </div>
                    </div>

                </div><!-- end div -->

            </div><!-- end container-fluid -->
        </section><!-- end section -->

        

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="{{route('web.order_contact_submit')}}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">Enter Basic Detail</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 30px;color: #2f2f2f;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body contact_form">
                        <form class="contact_form">
                            <input type="hidden" name="p_id" value="{{$product_detail->id}}">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required> 
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" required> 
                            <input type="text" name="mobile" id="phone" class="form-control" placeholder="Phone" required> 
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- footer -->
    @endsection 

    @section('script')
        <!-- prettyPhoto STYLES -->
        
        <script src="{{asset('web/sliderengine/jquery.js')}}"></script>
        <script src="{{asset('web/sliderengine/amazingslider.js')}}"></script>
        <script src="{{asset('web/sliderengine/initslider-1.js')}}"></script>
        <script src="{{asset('web/js/product_detail.js')}}"></script>

        <script type="text/javascript" src="{{asset('web/js/html5gallery.js')}}"></script>

        @if (isset($data_status) && !empty($data_status))
            <script>
                $("#product_name").hide();
                $("#product_desc").hide();
                $("#product_selection_btn").hide();
                $("#feature_details").hide();
                $("#product-select").show();
            </script>
        @endif
    @endsection     