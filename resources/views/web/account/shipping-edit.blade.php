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
                            <h4>Shipping Address Edit</h4>
                            <p>Add your shipping address for hassel free checkout</p>
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="inputAddress2">Address</label>
                                <textarea type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"></textarea>
                            </div>
                            <div class="form-group pl-0 col-md-6">
                                <label for="inputState">Phone</label>
                                <input type="text" class="form-control" id="inputState" placeholder="Enter Phone">
                            </div>
                            <div class="form-group pr-0 col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity" placeholder="Enter City">
                            </div>
                            <div class="form-group pl-0 col-md-6">
                                <label for="inputState">State</label>
                                <input type="text" class="form-control" id="inputState" placeholder="Enter State">
                            </div>
                            <div class="form-group pr-0 col-md-6">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip" placeholder="Enter Zip">
                            </div>
                            <div class="flex form-group pl-0 col-md-6">
                                <a href="{{route('web.account.shipping')}}" class="btn btn-cancel" title="">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>                                
                            </div>
                        </form>
                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
    @endsection   