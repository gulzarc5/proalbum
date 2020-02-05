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

        <div class="page-title lb">
            <div class="container clearfix">
                <div class="title-area pull-left">
                    <h2>Shop Cart <small>Please complete your order details in below!</small></h2>
                </div>
                <!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Cart</li>
                        </ol>
                    </div>
                    <!-- end bread -->
                </div>
                <!-- /.pull-right -->
            </div>
        </div>
        <!-- end page-title -->

        <section class="section">
            <div class="container">
                <div class="checkout-tab">
                    <ul class='nav nav-wizard'>
                        <li class='active'><a href='#step1' data-toggle="tab"> Shopping Cart</a></li>
                        <li><a href='#step2' data-toggle="tab">Checkout</a></li>
                        <li><a href='#step3' data-toggle="tab"> Complete</a></li>
                    </ul>

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="step1">
                            <div class="shopcart">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>PRODUCTS</th>
                                            <th>NAME</th>
                                            <th>QUANITY</th>
                                            <th>PRICE</th>
                                            <th>TOTAL PRICE</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="{{asset('web/upload/shop_01.jpg')}}" alt=""></td>
                                            <td>
                                                <h4><a href="#">Old Pink Lamp</a></h4></td>
                                            <td>1</td>
                                            <td>
                                                <h4>$18.00</h4></td>
                                            <td>
                                                <h4>$360.00</h4></td>
                                            <td><a href="#"><i class="fa fa-close"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{asset('web/upload/shop_02.jpg')}}" alt=""></td>
                                            <td>
                                                <h4><a href="#">Green Furniture </a></h4></td>
                                            <td>2</td>
                                            <td>
                                                <h4>$389.00</h4></td>
                                            <td>
                                                <h4>$778.00</h4></td>
                                            <td><a href="#"><i class="fa fa-close"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{asset('web/upload/shop_03.jpg')}}" alt=""></td>
                                            <td>
                                                <h4><a href="#">Oldschool Music</a></h4></td>
                                            <td>2</td>
                                            <td>
                                                <h4>$449.00</h4></td>
                                            <td>
                                                <h4>$449.00</h4></td>
                                            <td><a href="#"><i class="fa fa-close"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="couponarea clearfix">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter Coupon here...">
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <button type="submit" class="button button--aylen btn">Apply Coupon</button>
                                            <div class="pull-right">
                                                <br>
                                                <button type="submit" class="button button--aylen btn">Update Cart</button>
                                                <button type="submit" class="button button--aylen btn">Proceed to Checkout</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end couponarea -->
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end step 1 -->

                        <div class="tab-pane fade" id="step2">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="widget-title">
                                        <h4>BILLING DETAILS</h4>
                                    </div>
                                    <!-- end widget-title -->
                                    <form>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>First Name*</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Last Name*</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Conyacy Number*</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Email*</label>
                                                <input type="email" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="hero clearfix">
                                            <div class="form-group">
                                                <p>Same Delivery is Only Available in Newyork City Only, However we Delivered all the Products Worldwide as soon as Possible with High Quality Team. </p>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label>Address*</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label>Contry</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Town / City*</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>State*</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label>Special instruction </label>
                                                <textarea class="form-control" placeholder=""></textarea>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> CREATE AN ACCOUNT
                                                    </label>
                                                </div>
                                                <button type="submit" class="button button--aylen btn">Save & Continue</button>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </form>
                                </div>
                                <!-- end col -->

                                <div class="col-md-4">
                                    <div class="widget">
                                        <div class="widget-title">
                                            <h4>YOUR ORDER</h4>
                                        </div>
                                        <!-- end widget-title -->

                                        <hr class="invis">

                                        <div class="ordertotal clearfix">
                                            <header>
                                                <h3>PRODUCT <span>TOTAL PRICE</span></h3>
                                            </header>
                                            <div class="orderbody">
                                                <a href="#">Old School Telephone</a>
                                                <span>$55.00</span>
                                            </div>
                                            <!-- end orderbody -->
                                            <div class="orderbottom">
                                                <ul>
                                                    <li>
                                                        <h4>Cart Subtotal <span>$55.00</span></h4>
                                                    </li>
                                                    <li>
                                                        <h4>Shipping and Handling <span>Free Shipping</span></h4>
                                                    </li>
                                                    <li>
                                                        <h4>Order Total <span>1223.00 USD</span></h4>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- end orderbody -->
                                        </div>
                                        <!-- end ordertotal -->
                                    </div>
                                    <!-- end widget -->

                                    <hr class="invis">

                                    <div class="widget">
                                        <div class="widget-title">
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
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseFour">
                                                                        PayPal <i class="indicator fa fa-plus"></i>
                                                                    </a>
                                                                    </div>
                                                                </div>
                                                                <div id="collapseFour" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <div class="panel-title">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseFive">
                                                                        Credit Card <i class="indicator fa fa-plus"></i>
                                                                    </a>
                                                                    </div>
                                                                </div>
                                                                <div id="collapseFive" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <div class="panel-title">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseSix">
                                                                        Direct Ban Transfer <i class="indicator fa fa-plus"></i>
                                                                    </a>
                                                                    </div>
                                                                </div>
                                                                <div id="collapseSix" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie..</p>
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

                                            <hr class="invis">

                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I Have Accept The <a href="#">Terms & Contions</a>
                                                    </label>
                                                </div>

                                                <hr class="invis">

                                                <button type="submit" class="button button--aylen btn">Place Order</button>
                                            </div>
                                        </div>
                                        <!-- end oayment -->
                                    </div>
                                    <!-- end widget -->
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <div class="tab-pane fade" id="step3">
                            <div class="row">
                                <div class="emtrycart col-md-12 text-center">
                                    <h4><i class="fa fa-check"></i> Thanks for your order</h4>
                                </div>
                                <!-- end emtrycart -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end checkout-tab -->
            </div>
            <!-- end container -->
        </section>

    @endsection   