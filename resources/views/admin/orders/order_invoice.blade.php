@extends('admin.template.admin_master')

@section('content')

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="invoice">

      <div class="clearfix"></div>

      <div class="row" id="print_area">
        <div class="col-md-12 col-xs-12 col-sm-12">
          <div class="x_panel">
            <div class="x_title" style="text-align: center;border: 0;margin: 0;padding: 0;">
              <img src="{{asset('web/images/logo1.png')}}" alt="">
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <section class="content invoice">
                <!-- title row -->
                <div class="row">
                  <div class="col-xs-12 col-sm-12 invoice-header">
                  <div class="col-xs-6 col-sm-6 invoice-header">
                    <h1>
                      Premium Photobook
                    </h1>
                    <p>
                      2 Van Tonder Street, c/o Rudolph street.<br> Unit 4 - Sunderland Ridge, Centurion - 0157
                    </p>
                    <p>VAT No.: 4520267529 </p>
                    <p> 0732877622</p>
                  </div>
                  <div class="col-sm-6 col-xs-6 invoice-header" style="text-align: right;">
                    <h1>
                       Invoice
                    </h1>
                    {{-- <p>Invoice #007612</p> --}}
                    @if (isset($order) && !empty($order))
                      <p>Order ID: {{$order->id}}</p>
                      <p>Date: {{$order->created_at}}</p>
                    @endif

                  </div>
                  </div>
                  <div class="col-xs-12 invoice-header"><hr></div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-6 col-xs-6  invoice-col">
                    Bill To
                    <address>
                      @if (isset($user) && !empty($user))
                        <strong>{{$user->name}}</strong>
                        <br>{{$user->address}}
                        <br>{{$user->state}},{{$user->city}} - {{$user->zip_code}}
                        <br>Phone: 1 (804) 123-9876
                        <br>Email: {{$user->email}}
                      @endif
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 col-xs-6 invoice-col">
                    Ship To
                    <address>
                      @if (isset($shipping) && !empty($shipping))
                      <strong>{{$shipping->name}}</strong>
                      <br>{{$shipping->address}}
                      <br>{{$shipping->state}}, {{$shipping->city}} - {{$shipping->zip_code}}
                      <br>Phone: {{$shipping->contact_no}}
                      <br>Email: {{$shipping->zip_code}}
                      @endif
                    </address>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                  <div class="col-xs-12 table">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 59%">Description</th>
                          <th>Qty</th>
                          <th>Rate</th>
                          <th>VAT @ 15%</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $cancel_amount = 0;
                        @endphp
                        @if (isset($ord_detail) && !empty($ord_detail))
                        @foreach ($ord_detail as $order_details)
                        
                        <tr>
                          <td>
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
                            @if ($order_details->order_status == '5')
                            @php
                                $cancel_amount += $order_details->sub_total + $order_details->vat;
                            @endphp
                              <img src="{{asset('admin/build/images/cancelled.png')}}" alt="" style="width: 13%;float: right;margin-top: -42px;">
                            @endif
                          </td>
                          <td>{{$order_details->quantity}}</td>
                          <td>R {{$order_details->product_price}} </td>
                          <td>R {{$order_details->vat}}</td>
                          <td>R {{$order_details->sub_total + $order_details->vat}} </td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-xs-6">
                    <p class="lead">Payment :</p>
                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                      Please use your invoice number when making payment.<br>
                      Payment should be made to the following account: <br>
                      Premium Photobook Bank : XYZ CO. LTD <br>
                      Account no: 45445446933 <br>
                      Branch code: 6345605<br>
                      <span style="color: red">*</span> Kindly email proof of payment to accounts@premiumphotobook.com
                    </p>
                  </div>
                  <!-- /.col -->
                  <div class="col-xs-6">
                    <p class="lead">Amount :</p>
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                          @if (isset($order) && !empty($order))
                          <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>R {{$order->sub_total}}</td>
                          </tr>
                          <tr>
                            <th>VAT @ 15 %</th>
                            <td>R {{$order->vat}}</td>
                          </tr>
                          @if (isset($cancel_amount) && ($cancel_amount > 0))
                            <tr>
                              <th>Cancelled:</th>
                              <td>R {{$cancel_amount}}</td>
                            </tr>
                          @endif
                          
                          <tr>
                            <th><strong>Grand Total:</strong></th>
                            <td><strong>R {{(($order->total_price) - $cancel_amount)}}</strong></td>
                          </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-xs-12">
                    <button class="btn btn-default" onclick="printInfo()"><i class="fa fa-print"></i> Print</button>
                    {{-- <button class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="generatePDF()"><i class="fa fa-download"></i> Generate PDF</button> --}}
                  </div>
                </div>
              </section>
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
      function printInfo() {
        $(".top_nav").hide();
        window.print();
        $(".top_nav").show();
      }
    </script>
@endsection
