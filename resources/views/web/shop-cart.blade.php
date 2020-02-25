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

        <section class="section" style="border-top: 1px solid #e3e3e3;">
            <div class="container">
                <div class="checkout-tab">
                    <ul class='nav nav-wizard'>
                        <li class='active'><a> Shopping Cart</a></li>
                        <li><a>Checkout</a></li>
                        <li><a> Complete</a></li>
                    </ul>

                    <div class="order-detail-content myorder">
                        <div class="row">
                            <div class="col-md-2"></div>
                            @if (isset($cartData) && !empty($cartData))
                            <div class="col-md-8">
                                <div class="row singleorder">
                                    @php
                                        $cart_total = 0;
                                    @endphp
                                   
                                    @if (count($cartData) > 0)
                                        @foreach ($cartData as $cart)
                                        @php
                                            $cart_total+=$cart['price'];
                                        @endphp
                                            <div class="row">
                                                <div class="col-md-2 singleorderimg">
                                                    <a href="#"><img src="{{asset('assets/product/thumb/'.$cart['product_image'].'')}}" alt=""></a>
                                                </div>
                                                <div class="col-md-10 singleordercontent">
                                                    <a href="#">{{$cart['product_name']}}</a><br>
                                                    <b class="sub-tag">Product Type : {{$cart['sheet_name']}}</b>
                                                    <b class="sub-tag spl">Number of {{$cart['sheet_name']}} : {{$cart['sheet_value']}}</b>
                                                    <b class="sub-tag spl">Size : {{$cart['size_name']}}</b> 
                                                    <div class="cart-price" style="text-align: left;">                                             
                                                        {{-- <p class="quantity" style="padding-right: 20px;width: 20%;float: left;">Quantity: 2</p> --}}
                                                        <p style="width: 100%;float: left;margin-bottom: 0">
                                                            Amount: R {{$cart['price']}}
                                                        </p>
                                                    </div>
                                                    <a href="{{route('web.product_detail',['slug'=>$cart['product_slug'],'id'=>$cart['product_id']])}}" class="editproduct">Change Selection</a>
                                                    
                                                    <a href="{{route('web.remove_cart',['cart_id'=>$cart['cart_id']])}}" class="editproduct oth">Remove</a>
                                                </div>
                                                @if (isset($cart['options']) && !empty($cart['options']) && (count($cart['options']) > 0))
                                                    <div class="col-md-12 singleordercontent" style="padding: 5px 10px">
                                                        <label style="text-decoration: underline;"><strong>OPTIONS</strong></label><br>
                                                        @php
                                                            $option_print = true;
                                                        @endphp
                                                        @foreach ($cart['options'] as $item)
                                                            @if ($option_print)
                                                                <b class="sub-tag">{{$item['option_name']}} : {{$item['option_detail_name']}}</b>
                                                                @php
                                                                    $option_print = false;
                                                                @endphp
                                                            @else
                                                                <b class="sub-tag spl">{{$item['option_name']}} : {{$item['option_detail_name']}}</b>
                                                                
                                                            @endif
                                                        @endforeach
                                                    </div>  
                                                @endif
                                                                        
                                            </div>                                                
                                        @endforeach
                                    @else
                                    @endif
                                    
                                    {{-- <div class="row">
                                        <div class="col-md-2 singleorderimg">
                                            <a href="#"><img src="{{asset('web/upload/shop_02.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="col-md-10 singleordercontent">
                                            <a href="#">Syska X110 11000 mAh Li-Ion Power Bank - White&amp;Grey</a><br>
                                            <b class="sub-tag">Product Type : Metal</b>
                                            <b class="sub-tag spl">Size : 12 x 12</b> 
                                            <b class="sub-tag spl">Number of Pages : 21</b>
                                            <div class="cart-price" style="text-align: left;">                                             
                                                <p class="quantity" style="padding-right: 20px;width: 20%;float: left;">Quantity: 2</p>
                                                <p style="width: 80%;float: left;margin-bottom: 0">
                                                    Amount: ₹ 1000
                                                </p>
                                            </div>
                                            <a href="#" class="editproduct">Edit Product</a>
                                        </div>
                                        <div class="col-md-12 singleordercontent" style="padding: 5px 10px">
                                            <label style="text-decoration: underline;"><strong>OPTIONS</strong></label><br>
                                            <b class="sub-tag">Meterial Type : Metal</b>
                                            <b class="sub-tag spl">Color : Red</b> 
                                            <b class="sub-tag spl">Frame Color : Black</b>
                                            <b class="sub-tag spl">Sheet Color : Off-White</b>
                                            <b class="sub-tag spl">Other : Nothing</b>
                                        </div>                       
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-12 totalordercontent"> 
                                            <h5><strong>Sub Total : R {{$cart_total}}</strong></h5> 
                                            <h5><strong>VAT 15% : R {{floatval(($cart_total*15)/100)}}</strong></h5> 
                                            <h5><strong>Total Order Amount: R {{$cart_total+floatval(($cart_total*15)/100)}}</strong></h5>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="text-align: center;">
                                <a href="{{route('web.checkout')}}" class="button button--aylen btn">Proceed to Checkout</a>
                            </div>
                            @else
                            <h3>Cart Id Empty</h3>
                            @endif
                        </div>

                    </div>
                </div>
                <!-- end checkout-tab -->
            </div>
            <!-- end container -->
        </section>

    @endsection   