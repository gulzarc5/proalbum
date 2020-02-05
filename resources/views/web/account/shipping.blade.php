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
        <section class="section lb">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-md-6 col-sm-6 col-md-offset-3 login">
                        <div class="login-head">
                            <h4>Shipping Address</h4>
                            <p>Save your shipping address for hassel free checkout</p>
                            <a href="{{route('web.account.shipping-edit')}}" class="new-add btn btn-primary" title="">+ ADD NEW ADDRESS</a>
                        </div>
                        <div class="shipping-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="add">
                                        <p>Vishal Nag</p>
                                        <p>56/1, Rose Vil, Downtown</p>
                                        <p>Durban, SA</p>
                                        <p>Ph- +015 74586245</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="add">
                                        <p>Vishal Nag</p>
                                        <p>56/1, Rose Vil, Downtown</p>
                                        <p>Durban, SA</p>
                                        <p>Ph- +015 74586245</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
    @endsection   