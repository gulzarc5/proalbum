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

                    <div class="order-detail-content myorder">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                @if (isset($orders) && !empty($orders))
                                    @foreach ($orders as $order)
                                    <div class="row singleorder">
                                        <div class="col-md-12 singleorderid">
                                          <h5><strong>Orders ID: {{$order->id}}</strong></h5>
                                          <p>Order Date: {{$order->created_at}}</p>
                                        </div>
                                        @foreach ( $order->order_details as $order_details)
                                        <div class="row">
                                            <div class="col-md-2 singleorderimg">
                                                <a href="#"><img src="{{asset('assets/product/thumb/'.$order_details->p_image.'')}}" alt=""></a>
                                            </div>
                                            <div class="col-md-10 singleordercontent">
                                                <a href="#">{{$order_details->p_name}}</a><br>
                                                <b class="sub-tag">Product Type : {{$order_details->sheet_name}}</b>
                                                <b class="sub-tag spl">Number of Spread : {{$order_details->sheet_value}}</b>
                                                <b class="sub-tag spl">Size : {{$order_details->size_name}}</b> 
                                                <div class="cart-price" style="text-align: left;">                                             
                                                <p style="width: 100%;float: left;margin-bottom: 0">
                                                        Amount: R {{$order_details->product_total_price}}
                                                    </p>
                                                </div>
                                                @if ($order_details->order_status == '1')
                                                    <a href="{{route('web.order_details_cancel',['order_id'=>encrypt($order->id),'order_details_id'=>encrypt($order_details->id)])}}" class="editproduct oth">Cancel</a>
                                                @elseif($order_details->order_status == '1')
                                                    <a class="editproduct oth">Processing</a>
                                                @elseif($order_details->order_status == '3')
                                                    <a class="editproduct oth">Dispatched</a>
                                                @elseif($order_details->order_status == '4')
                                                    <a  class="editproduct oth">Delivered</a>
                                                @elseif($order_details->order_status == '5')
                                                    <a class="editproduct oth">Cancelled 
                                                        @if ($order_details->cancelled_by == '2')
                                                            By Admin
                                                        @endif
                                                    </a>
                                                @endif
                                               
                                            </div>
                                            <div class="col-md-12 singleordercontent" style="padding: 5px 10px">
                                                <label style="text-decoration: underline;"><strong>OPTIONS</strong></label><br>
                                                @foreach ($order_details->options as $options)
                                                    <b class="sub-tag">{{$options->option_name}} : {{$options->option_details_name}}</b>
                                                @endforeach
                                            </div>
                                        </div>                                            
                                        @endforeach
                                       
    
                                        <div class="row">
                                          <div class="col-md-12 totalordercontent" style="display: flex;justify-content: space-around;"> 
                                            <h5>Total Order Amount: R {{$order->total_price}}</h5>   
                                            @if ($order->order_status == '1')
                                                <h5 class="status">Order Status: <a href="#" style="color: #07bdbd;">Processing</a></h5>
                                            @elseif($order->order_status == '1')
                                                <h5 class="status">Order Status: <span style="color: #07bdbd;">Processing</span></h5>
                                            @elseif($order->order_status == '3')
                                                <h5 class="status">Order Status: <span style="color: #07bdbd;">Dispatched</span></h5>
                                            @elseif($order->order_status == '4')
                                                <h5 class="status">Order Status: <span style="color: #07bdbd;">Delivered</span></h5>
                                            @elseif($order->order_status == '5')
                                                <h5 class="status">Order Status: <span style="color: #07bdbd;">Cancelled  
                                                    @if ($order->cancelled_by == '2')
                                                        By Admin
                                                    @endif
                                                </span></h5>
                                            @endif                           
                                            {{-- <h5 class="status">Order Status: <span style="color: #07bdbd;">DELIVERED</span></h5> --}}
                                          </div>                         
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                                
                                {{-- <div class="row singleorder">
                                    <div class="col-md-12 singleorderid">
                                      <h5><strong>Orders ID: FGI15468GHU</strong></h5>
                                      <p>Order Date: 02 DEC 2020</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2 singleorderimg">
                                            <a href="#"><img src="{{asset('assets/product/thumb/315821145392020-Feb-19.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="col-md-10 singleordercontent">
                                            <a href="#">Royal Velbet One</a><br>
                                            <b class="sub-tag">Product Type : Spread</b>
                                            <b class="sub-tag spl">Number of Spread : 11</b>
                                            <b class="sub-tag spl">Size : 13X13</b> 
                                            <div class="cart-price" style="text-align: left;">                                             
                                            <p style="width: 100%;float: left;margin-bottom: 0">
                                                    Amount: R 1530
                                                </p>
                                            </div>
                                            
                                            <a href="http://localhost/proalbum/public/remove/cart/3" class="editproduct oth">Return</a>
                                        </div>
                                        <div class="col-md-12 singleordercontent" style="padding: 5px 10px">
                                            <label style="text-decoration: underline;"><strong>OPTIONS</strong></label><br>
                                            <b class="sub-tag">Color : Green</b>
                                            <b class="sub-tag spl">Page : A5</b>
                                            <b class="sub-tag spl">Frame Color : Black</b>
                                        </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-12 totalordercontent" style="display: flex;justify-content: space-around;"> 
                                        <h5>Total Order Amount: Rs 10000</h5>                              
                                        <h5 class="status">Order Status: <span style="color: #07bdbd;">DELIVERED</span></h5>
                                      </div>                         
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-md-12" style="text-align: center;">
                                <a href="#" class="button button--aylen btn">Continue Shopping</a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end checkout-tab -->
            </div>
            <!-- end container -->
        </section>

    @endsection   