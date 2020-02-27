@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">

    <div class="">
      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              
              @if (isset($order) && !empty($order))
              <h2>Order Details <small> 
                {{$order->id}}
              </small></h2>
              <h2 style="float:right">Date : {{$order->created_at}}</h2>
              @endif
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                  <div class="row product-view-tag">
                    @if (isset($user) && !empty($user))
                    <div class="col-md-6">
                      <h3 class="prod_title">Order By</h3>
                      <h5><strong>Name : </strong> {{$user->name}}</h5>
                      <h5><strong>Email : </strong> {{$user->email}}</h5>
                      <h5><strong>Profile Type : </strong> 
                        @if ($user->profile_type == '1')
                          Lab Owner
                        @elseif($user->profile_type == '2') 
                          Distributor
                        @else
                          Studio/Photographer
                        @endif
                      </h5>
                      <h5><strong>State : </strong> {{$user->state}} </h5>
                      <h5><strong>City : </strong> {{$user->city}}</h5>
                      <h5><strong>Pin : </strong> {{$user->zip_code}}</h5>
                      <h5><strong>Address : </strong> {{$user->address}}</h5>
                    </div>
                    @endif
                    @if (isset($shipping) && !empty($shipping))
                    <div class="col-md-6">
                      <h3 class="prod_title">Shipping Details</h3>
                      <h5><strong>Name : </strong> {{$shipping->name}}</h5>
                      <h5><strong>Email : </strong> {{$shipping->email}}</h5>
                      <h5><strong>Contact No : </strong> {{$shipping->contact_no}}</h5>
                      <h5><strong>State : </strong> {{$shipping->state}}</h5>
                      <h5><strong>City : </strong> {{$shipping->city}}</h5>
                      <h5><strong>Pin : </strong> {{$shipping->zip_code}}</h5>
                      <h5><strong>Address : </strong> {{$shipping->address}}</h5>
                    </div>  
                    @endif                    
                  </div>                  
                </div>
                
            </div>
          </div>
          <div class="x_panel order-detail">
            <div class="x_title">
              <h2>Order Details</h2>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
              {{-- Order Detail Table --}}
              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th class="column-title" style="width: 11%;">Image </th>
                      <th class="column-title">Description </th>
                      <th class="column-title" style="width: 5%;">Rate </th>                      
                      <th class="column-title" style="width: 5%;">Quantity </th>
                      <th class="column-title" style="width: 5%;">Subtotal </th>
                      <th class="column-title" style="width: 7%;">VAT 15%</th>
                      <th class="column-title" style="width: 5%;">Amount </th>                    
                      <th class="column-title" style="width: 5%;">Status </th>                      
                      <th class="column-title" style="width: 17%;">Action </th>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    @if (isset($ord_detail) && !empty($ord_detail))
                        @foreach ($ord_detail as $order_details)
                        <tr class="pointer">
                          <td class=" ">
                            <a>
                              <img src="{{asset('assets/product/thumb/'.$order_details->p_image.'')}}" alt="...">
                            </a>
                          </td>
                          <td class=" ">
                            <b>{{ $order_details->p_name}}</b><br>
                            <small>Product Type : {{$order_details->sheet_name}} | Number of {{$order_details->sheet_name}} : {{$order_details->sheet_value}} | Size : {{$order_details->size_name}}</small><br>                        
                            <strong><small style="text-decoration: underline;">Option</small></strong><br>
                            <small>
                              @if (isset($order_details->options) && !empty($order_details->options))
                                @foreach ($order_details->options as $option)
                                    {{$option->option_name}} : {{$option->option_details_name}} |
                                @endforeach
                              @endif
                            </small>
                            @if (isset($order_details->file_link) && !empty($order_details->file_link))
                            <br>
                            <strong><small style="text-decoration: underline;">Files</small></strong><br>
                            <small>                             
                                <b>File URL : </b>{{ $order_details->file_link}}<br>                           
                              @if (isset($order_details->file_password) && !empty($order_details->file_password))
                                <b>File Password : </b>{{ $order_details->file_password}}
                              @endif
                            </small>
                            @endif
                          </td>
                          <td class=" ">R {{$order_details->product_price}}</td>
                          <td class=" ">{{$order_details->quantity}}</td>
                          <td class=" ">R {{$order_details->sub_total}}</td>
                          <td class=" ">R {{$order_details->vat}}</td>
                          <td class="a-right a-right ">R {{$order_details->product_total_price}}</</td>
                          <td class=" ">
                            @if ($order_details->order_status == '1')
                              New Order
                            @elseif($order_details->order_status == '2')
                              Processing
                            @elseif($order_details->order_status == '3')
                              Dispatched
                            @elseif($order_details->order_status == '4')
                            <b style="color:green">Delivered</b>
                            @elseif($order_details->order_status == '5')
                              <b style="color:red">Cancelled</b>
                            @endif
                          </td>
                          <td class=" ">
                            @if ($order_details->order_status == '4')
                              Delivered
                            @else
                              
                              <select class="form-control" style="padding-right: 0;" id="order_status{{$order_details->id}}" onchange="updateOrderDetail({{$order_details->id}})">
                                <option value="">--Select Status--</option>
                                <option value="2">Processing</option>
                                <option value="3">Dispatched</option>
                                <option value="4">Delivered</option>
                                <option value="5">Canclled</option>
                              </select>
                            @endif                            
                          </td>
                        </tr>
                        @endforeach
                    @endif
                  </tbody>
                  <tfoot>
                    @if (isset($order) && !empty($order))
                    <tr>
                      <td colspan=6>Sub Total</td>
                      <td colspan=2>R {{$order->sub_total}}</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan=6>Vat 15%</td>
                      <td colspan=2>R {{$order->vat}}</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan=6>Shipping</td>
                      <td colspan=2>R 0</td>
                      <td></td>
                    </tr>
                    <tr class="grand">
                      <td colspan=6><strong>Grand Total</strong></td>
                      <td colspan=2><strong>R {{$order->total_price}}</strong></td>
                      <td></td>
                    </tr>
                    @endif
                  </tfoot>
                </table>
              </div>
              {{-- //Order Detail Table --}}

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

 @section('script')
  <script>
    function updateOrderDetail(id) {
      var status = $("#order_status"+id).val();
      window.location.href = "{{url('/admin/order/status/update/')}}/"+id+"/"+status+"";
    }
  </script>
 @endsection