  @extends('web.templet.master')

    {{-- META --}}
    @section('meta')
      <title>Premium Photobooks | Making Albums For South Africa</title>
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="">
      <style>.header:not(.affix){ box-shadow: -2px -3px 7px 2px #cccccc;z-index: 99;}</style>
    @endsection
      <!-- end header -->

    @section('content')

        <section class="section">
            <div class="container">
                <div class="checkout-tab">
                    <ul class='nav nav-wizard'>
                        <li><a><i class="fa fa-check"></i> Shopping Cart</a></li>
                        <li class='active'><a>Checkout</a></li>
                        <li><a> Complete</a></li>
                    </ul>

                    <div class="" id="step2">

                        {{ Form::open(['method' => 'post','route'=>'web.order_place']) }}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="widget-title Filewidget">
                                    <h4>SHARE FILE LINK</h4><br>
                                    <small>Google Drive / Dropbox / Other</small>
                                </div>

                                <div class="">
                                    @if (isset($products) && !empty($products))
                                        @foreach ($products as $item)   
                                        <h4>{{$item->name}}</h4>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>Enter Link*</label>
                                                <input type="text" class="form-control" name="file_link[{{$item->id}}]" placeholder="Enter Link">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Password</label>
                                                <input type="text" class="form-control" name="file_password[{{$item->id}}]" placeholder="Enter Password">
                                                <small>if you have a lock on your file / folder</small>
                                            </div>                                            
                                            <div class="form-group col-sm-12 text-center">
                                                <button type="button" class="button button--aylen btn" id="upload-tab">Upload image from local drive</button>
                                                <br>                                           
                                                <label style="float: left;">Choose Image*</label>
                                                <input type="file" class="form-control" name="file_link[{{$item->id}}]">
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                    
                                </div>
                                <div class="widget-title">
                                    <h4>SHIPPING DETAILS</h4>
                                    <button type="button" class="button btn" id="actionbtn">+ ADD SHIPPING ADDRESS</button>
                                </div>
                                <!-- end widget-title -->
                                <div class="row addressselect changeadd">
                                    @if (isset($shipping_address) && !empty($shipping_address))
                                    @php
                                        $ship_count = true;
                                    @endphp
                                        @foreach ($shipping_address as $shipping)
                                        @if ($ship_count)
                                        @php
                                            $ship_count = false;
                                        @endphp
                                            <div class="col-md-6">                                            
                                                <label class="radio-container">
                                                    <input type="radio" checked name="address_id" value="{{$shipping->id}}">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <div class="AddressCard">
                                                    <p>{{$shipping->name}}</p>
                                                    <p class="AddressCard__addresses___2rzGd">{{$shipping->address}}</p>
                                                    <p>{{$shipping->email}}, {{$shipping->contact_no}} </p>
                                                    <p>{{$shipping->city}},{{$shipping->state}} - {{$shipping->zip_code}}</p>
                                                </div>
                                            </div>
                                        @else  
                                            <div class="col-md-6">                                            
                                                <label class="radio-container">
                                                    <input type="radio" name="address_id" value="{{$shipping->id}}">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <div class="AddressCard">
                                                    <p>{{$shipping->name}}</p>
                                                    <p class="AddressCard__addresses___2rzGd">{{$shipping->address}}</p>
                                                    <p>{{$shipping->email}}, {{$shipping->contact_no}} </p>
                                                    <p>{{$shipping->city}},{{$shipping->state}} - {{$shipping->zip_code}}</p>
                                                </div>
                                            </div>  
                                        @endif
                                            
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-md-4">
                                <div class="widget">
                                    <div class="widget-title" style="border-bottom: 0;margin-top: 10px">
                                        <h4>PAYMENT METHOD</h4>
                                    </div>
                                    <!-- end widget-title -->

                                    <hr class="invis">

                                    <div class="payment-methods">

                                        <div class="content-widget">
                                            <div class="accordion-widget">
                                                <div class="accordion-toggle-2">
                                                    <div class="panel-group" id="accordion3">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <div class="panel-title">
                                                                    <label class="radio-container">
                                                                        <input type="radio" checked name="payment" value="1">
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                    <a class="accordion-toggle"> Pay COD </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <div class="panel-title">
                                                                    <label class="radio-container">
                                                                        <input type="radio" name="payment" value="2">
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                    <a class="accordion-toggle"> Pay Online</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- accordion -->
                                            </div>
                                            <!-- end accordion-widget -->
                                        </div>
                                        <!-- end content-widget -->
                                    </div>
                                    <!-- end oayment -->
                                </div>
                                <!-- end widget -->

                                <div class="widget">
                                    <div class="ordertotal clearfix">
                                        <header>
                                            <h3>PRODUCT <span>TOTAL PRICE</span></h3>
                                        </header>
                                        
                                        <!-- end orderbody -->
                                        <div class="orderbottom">
                                            <ul>
                                                <li>
                                                    <h4>Cart Subtotal 
                                                        <span>R 
                                                            @if (isset($product_total) && !empty($product_total))
                                                                {{$product_total}}
                                                            @endif
                                                        </span>
                                                    </h4>
                                                </li>
                                                <li>
                                                    <h4>VAT @ 15% <span>{{floatval(($product_total*15)/100)}}</span></h4>
                                                </li>
                                                <li>
                                                    <h4>Shipping and Handling <span>Free Shipping</span></h4>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="orderbottom">
                                            <ul>
                                                <li>
                                                    <h4>
                                                        <strong>GRAND TOTAL <span>R 
                                                            @if (isset($product_total) && !empty($product_total))
                                                                {{floatval($product_total+($product_total*15)/100)}}
                                                            @endif
                                                        </span>
                                                        </strong>
                                                    </h4>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- end orderbody -->

                                        <hr class="invis">

                                        <div class="form-group">
                                            <button type="submit" class="button button--aylen btn" href="{{route('web.shop-thank')}}">Place Order</button>
                                        </div>
                                    </div>
                                    <!-- end ordertotal -->
                                </div>
                                <!-- end widget -->
                            </div>
                            <!-- end col -->
                        </div>
                        {{Form::close()}}
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-8">                            
                                <div id="shipping-address-add-form" style="display:none">
                                    {{ Form::open(['method' => 'post','route'=>'web.add_shipping_address','id'=>'new_address']) }}
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>Name*</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Email*</label>
                                                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label>Address*</label>
                                                <textarea class="form-control" name="address" placeholder="Type Address..." required></textarea>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Town / City*</label>
                                                <input type="text" name="city" class="form-control" placeholder="Enter Town/City Name" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>State*</label>
                                                <input name="state" type="text" class="form-control" placeholder="Enter State Name" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Contact No</label>
                                                <input name="mobile" type="text" class="form-control" placeholder="Enter Contact Number" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Zip Code</label>
                                                <input name="pin" type="text" class="form-control" placeholder="Enter Zip Code" required>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <button type="submit" class="button button--aylen btn" >Save & Continue</button>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end checkout-tab -->
            </div>

            
            <!-- end container -->
        </section>

    @endsection 
    @section('script')
        <script>
            $( "#actionbtn" ).click(function() {               
                $(".changeadd" ).toggle();
                $("#shipping-address-add-form").toggle();
            });
            $('#actionbtn').click(function(){
                var btntxt = $(this).text();
                if (btntxt == '+ ADD SHIPPING ADDRESS') {
                    $(this).text('BACK TO SELECT ADDRESS');   
                } else {
                    $(this).text('+ ADD SHIPPING ADDRESS');   
                }
            });

            function submitAddressForm() {
                $("#new_address").submit();
            }
        </script>
    @endsection     