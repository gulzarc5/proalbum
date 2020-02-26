@extends('admin.template.admin_master')

@section('content')

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="invoice">

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title" style="text-align: center;border: 0;margin: 0;padding: 0;">
              <img src="{{asset('web/images/logo1.png')}}" alt="">
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <section class="content invoice">
                <!-- title row -->
                <div class="row">
                  <div class="col-md-6 col-xs-12 invoice-header">
                    <h1>
                      Premium Photobook
                    </h1>
                    <p>
                      2 Van Tonder Street, c/o Rudolph street.<br> Unit 4 - Sunderland Ridge, Centurion - 0157
                    </p>
                    <p>VAT No.: 4520267529 </p>
                    <p> 0732877622</p>
                  </div>
                  <div class="col-md-6 col-xs-12 invoice-header" style="text-align: right;">
                    <h1>
                       Invoice
                    </h1>
                    <p>Invoice #007612</p>
                    <p>Order ID: 4F3S8J</p>
                    <p>Date: 2/22/2014</p>
                  </div>
                  <div class="col-xs-12 invoice-header"><hr></div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-6 invoice-col">
                    Bill To
                    <address>
                      <strong>Iron Admin, Inc.</strong>
                      <br>795 Freedom Ave, Suite 600
                      <br>New York, CA 94107
                      <br>Phone: 1 (804) 123-9876
                      <br>Email: ironadmin.com
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 invoice-col">
                    Ship To
                    <address>
                      <strong>John Doe</strong>
                      <br>795 Freedom Ave, Suite 600
                      <br>New York, CA 94107
                      <br>Phone: 1 (804) 123-9876
                      <br>Email: jon@ironadmin.com
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
                          <th>VAT</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>El snort testosterone trophy driving gloves handsome gerry Richardson helvetica tousled street art master testosterone trophy driving gloves handsome gerry Richardson
                          </td>
                          <td>1</td>
                          <td>R 1200 </td>
                          <td>15 %</td>
                          <td>R 1200 </td>
                        </tr>
                        <tr>
                          <td>Wes Anderson umami biodiesel</td>
                          <td>1</td>
                          <td>R 1200 </td>
                          <td>15 %</td>
                          <td>R 1800 </td>
                        </tr>
                        <tr>
                          <td>Terry Richardson helvetica tousled street art master, El snort testosterone trophy driving gloves handsome letterpress erry Richardson helvetica tousled</td>
                          <td>1</td>
                          <td>R 1200 </td>
                          <td>15 %</td>
                          <td>R 1565 </td>
                        </tr>
                        <tr>
                          <td>Tousled lomo letterpress erry Richardson helvetica tousled street art master helvetica tousled street art master, El snort testosterone</td>
                          <td>1</td>
                          <td>R 1200 </td>
                          <td>15 %</td>
                          <td>R 2012 </td>
                        </tr>
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
                          <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>R 5530</td>
                          </tr>
                          <tr>
                            <th>Tax (9.3%)</th>
                            <td>R 1034</td>
                          </tr>
                          <tr>
                            <th>Shipping:</th>
                            <td>R 580</td>
                          </tr>
                          <tr>
                            <th><strong>Grand Total:</strong></th>
                            <td><strong>R 8654</strong></td>
                          </tr>
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
                    <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                    <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                    <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
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
