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
                @if (isset($cartData) && !empty($cartData))
                <!-- product-tab -->
                <div class="checkout-tab">
                    <ul class='nav nav-wizard'>
                        <li class='active'><a> Shopping Cart</a></li>
                        <li><a>Checkout</a></li>
                        <li><a> Complete</a></li>
                    </ul>

                    <div class="order-detail-content myorder">
                        <div class="row">
                            
                            <div class="col-md-2"></div>
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
                                                    <b class="sub-tag spl">Number of  {{$cart['sheet_name']}} : {{$cart['sheet_value']}}</b>
                                                    <b class="sub-tag spl">Size : {{$cart['size_name']}}</b> 
                                                    <div class="cart-price" style="text-align: left;">   
                                                        @auth('users')
                                                            <p style="width: 100%;float: left;margin-bottom: 0">
                                                            Quantity : <input type="number" id="qtty{{$cart['cart_id']}}" value="{{$cart['quantity']}}" onchange="updateCart({{$cart['cart_id']}})">
                                                            </p>
                                                        @endauth                                          
                                                        
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
                            
                        </div>

                    </div>
                </div>
                <!-- end product-tab -->
                @else                
                <!-- zero product -->
                <div>
                    <div style="display:table;margin:auto;"><img src="{{asset('web/images/empty-cart.png')}}" alt=""></div>
                    <h3 style="text-align: center;text-transform: uppercase;">Your Cart Is Empty</h3>
                    <a href="" class="button button--aylen btn" style=" width: 20%;margin:auto">CONTINUE SHOPPING</a>
                </div>
                <!-- end zero product-->
                @endif
            </div>
            <!-- end container -->
        </section>

    @endsection   

    @section('script')
        <script>
            function updateCart(id) {
                var quantity = $("#qtty"+id).val();
                window.location.href = "{{url('product/cart/update/')}}/"+id+"/"+quantity+"";
            }
        </script>
    @endsection