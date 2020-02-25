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
                        <li><a><i class="fa fa-check"></i> Shopping Cart</a></li>
                        <li><a><i class="fa fa-check"></i> Checkout</a></li>
                        <li class='active'><a> Complete</a></li>
                    </ul>

                    <div class="order-detail-content myorder">
                        <div class="row" style="margin-bottom: 30px">
                            <div class="emtrycart col-md-12">
                                <h2 class=" text-center"><i class="fa fa-check"></i> Thanks your order has been placed</h2>
                                {{-- <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="row singleorder">
                                            <div class="row">
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
                                                </div>
                                                <div class="col-md-12 singleordercontent" style="padding: 5px 10px">
                                                    <label style="text-decoration: underline;"><strong>OPTIONS</strong></label><br>
                                                    <b class="sub-tag">Meterial Type : Metal</b>
                                                    <b class="sub-tag spl">Color : Red</b> 
                                                    <b class="sub-tag spl">Frame Color : Black</b>
                                                    <b class="sub-tag spl">Sheet Color : Off-White</b>
                                                    <b class="sub-tag spl">Other : Nothing</b>
                                                </div>                       
                                            </div>
                                            <div class="row">
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
                                                </div>
                                                <div class="col-md-12 singleordercontent" style="padding: 5px 10px">
                                                    <label style="text-decoration: underline;"><strong>OPTIONS</strong></label><br>
                                                    <b class="sub-tag">Meterial Type : Metal</b>
                                                    <b class="sub-tag spl">Color : Red</b> 
                                                    <b class="sub-tag spl">Frame Color : Black</b>
                                                    <b class="sub-tag spl">Sheet Color : Off-White</b>
                                                    <b class="sub-tag spl">Other : Nothing</b>
                                                </div>                       
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 totalordercontent" style="background: #89bbc4;justify-content: center;"> 
                                                    <h5 style="color: #fff"><strong>Total Order Amount: Rs 900</strong></h5>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-md-12" style="text-align: center;">
                                    <a href="{{route('web.order_history')}}" class="button button--aylen btn">Click Here To View Order History</a>
                                </div>
                            </div>
                            <!-- end emtrycart -->
                        </div>
                    </div>
                </div>
                <!-- end checkout-tab -->
            </div>
            <!-- end container -->
        </section>

    @endsection   