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
                            <a href="{{route('web.add_shipping_address_form')}}" class="new-add btn btn-primary" title="">+ ADD NEW ADDRESS</a>
                        </div>
                        @if(!empty($shipping_address) && (count($shipping_address) > 0))
                        <div class="shipping-content">
                            <div class="row">
                                @foreach($shipping_address as $key => $item)
                                <div class="col-md-6 mb-10">
                                    <div class="add">
                                        <p>{{ $item->name }}</p>                                        
                                        <p>{{ $item->email }}</p>
                                        <p>{{ $item->address }}</p>
                                        <p>{{ $item->city }}, {{ $item->state }}, {{ $item->zip_code }}</p>
                                        <p>Ph- {{ $item->contact_no }}</p>
                                        <a href="{{route('web.edit_shipping_address',['address_id'=>encrypt($item->id)])}}" title="edit"> Edit address</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
    @endsection   