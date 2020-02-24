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
                            <h4>Shipping Address Add</h4>
                            <p>Add your shipping address for hassel free checkout</p>
                        </div>
                        <form method="POST" autocomplete="off" action="{{ route('web.update_shipping_address') }}">
                            @csrf
                            <div class="form-group">
                                <label for="inputState">Name</label>
                                <input type="text" class="form-control" id="inputName" placeholder="Enter Name" name="contact_no">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Address</label>
                                <textarea type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address"></textarea>
                                @if($errors->has('address'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group pl-0 col-md-6">
                                <label for="inputState">Phone</label>
                                <input type="text" class="form-control" id="inputState" placeholder="Enter Phone" name="contact_no">
                                @if($errors->has('contact_no'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group pr-0 col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity" placeholder="Enter City" name="city">
                                @if($errors->has('city'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group pl-0 col-md-6">
                                <label for="inputState">State</label>
                                <input type="text" class="form-control" id="inputState" placeholder="Enter State" name="state">
                                @if($errors->has('state'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group pr-0 col-md-6">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip" placeholder="Enter Zip" name="zip_code">
                                @if($errors->has('zip_code'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="flex form-group pl-0 col-md-6">
                                <a href="{{route('web.shipping_address_list')}}" class="btn btn-cancel" title="">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>                                
                            </div>
                        </form>
                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
    @endsection   