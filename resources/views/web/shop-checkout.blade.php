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

        <section class="section">
            <div class="container">
                <div class="checkout-tab">
                    <ul class='nav nav-wizard'>
                        <li><a><i class="fa fa-check"></i> Shopping Cart</a></li>
                        <li class='active'><a>Checkout</a></li>
                        <li><a> Complete</a></li>
                    </ul>

                    <div class="" id="step2">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="widget-title Filewidget">
                                    <h4>SHARE FILE LINK</h4><br>
                                    <small>Google Drive / Dropbox / Other</small>
                                </div>

                                <div class="">
                                    <form>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>Enter Link*</label>
                                                <input type="text" class="form-control" placeholder="Enter Link">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Password</label>
                                                <input type="text" class="form-control" placeholder="Enter Password">
                                                <small>if you have a lock on your file / folder</small>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </form>
                                </div>
                                <div class="widget-title">
                                    <h4>SHIPPING DETAILS</h4>
                                    <button type="submit" class="button btn" id="actionbtn">+ ADD SHIPPING ADDRESS</button>
                                </div>
                                <!-- end widget-title -->
                                <div class="row addressselect changeadd">
                                    <div class="col-md-6">                                            
                                            <label class="radio-container">
                                                <input type="radio" checked name="address" value="">
                                                <span class="checkmark"></span>
                                            </label>
                                            <div class="AddressCard">
                                                <p>Vishal Nag</p>
                                                <p class="AddressCard__addresses___2rzGd">House No. 16,  Sewali Path,  hengrabari, </p>
                                                <p>imvishalnag@gmail.com, 8436590120 </p>
                                                <p>Guwahati, Assam - 781034</p>
                                            </div>
                                    </div>
                                    <div class="col-md-6">                                           
                                            <label class="radio-container">
                                                <input type="radio" name="address" value="">
                                                <span class="checkmark"></span>
                                            </label>
                                            <div class="AddressCard">
                                                <p>Vishal Nag</p>
                                                <p class="AddressCard__addresses___2rzGd">House No. 16,  Sewali Path,  hengrabari, </p>
                                                <p>imvishalnag@gmail.com, 8436590120 </p>
                                                <p>Guwahati, Assam - 781034</p>
                                            </div>
                                    </div>
                                </div>

                                <div class="changeadd" style="display: none;">
                                    <form>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>First Name*</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Email*</label>
                                                <input type="email" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label>Address*</label>
                                                <textarea class="form-control" placeholder=""></textarea>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Town / City*</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>State*</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Contry</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Conyacy Number*</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <button type="submit" class="button button--aylen btn">Save & Continue</button>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </form>
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
                                                                        <input type="radio" checked name="payment" value="">
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
                                                                        <input type="radio" name="payment" value="">
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
                                                    <h4>Cart Subtotal <span>$55.00</span></h4>
                                                </li>
                                                <li>
                                                    <h4>Shipping and Handling <span>Free Shipping</span></h4>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="orderbottom">
                                            <ul>
                                                <li>
                                                    <h4><strong>GRAND TOTAL <span>$55.00</span></strong></h4>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- end orderbody -->

                                        <hr class="invis">

                                        <div class="form-group">
                                            <a type="submit" class="button button--aylen btn" href="{{route('web.shop-thank')}}">Place Order</a>
                                        </div>
                                    </div>
                                    <!-- end ordertotal -->
                                </div>
                                <!-- end widget -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
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
              $( ".changeadd" ).toggle();
            });
            $('#actionbtn').click(function(){
                var btntxt = $(this).text();
                if (btntxt == '+ ADD SHIPPING ADDRESS') {
                    $(this).text('BACK TO SELECT ADDRESS');   
                } else {
                    $(this).text('+ ADD SHIPPING ADDRESS');   
                }
            });
        </script>
    @endsection     