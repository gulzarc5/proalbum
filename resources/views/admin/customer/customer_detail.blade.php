@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">

    <div class="">
      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Customer Details</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              @if (isset($customer) && !empty($customer))
                <div class="col-md-8 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
                  <h3 class="prod_title">{{$customer->name}}</h3>
                  <div class="row product-view-tag">
                      <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Email : </strong> {{$customer->email}}</h5>
                      <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Profile Type : </strong> 
                        @if ($customer->profile_type == '1')
                          Lab Owner
                        @elseif($customer->profile_type == '2')
                          Distributor
                        @else
                          Studio/Photographer	
                        @endif
                      </h5>
                      <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Contact Person : </strong> {{$customer->contact_person}}</h5>
                      <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>State : </strong> {{$customer->state}}</h5>
                      <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>City : </strong> {{$customer->city}}</h5>
                      <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Pin : </strong> {{$customer->zip_code}}</h5>
                      <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Address : </strong> {{$customer->address}}</h5>
                  </div>
                  
                </div>
                
              @endif
              <div class="col-md-12" style="padding-top: 20px;">
                <button class="btn btn-danger" onclick="window.close();">Close Window</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

 @endsection