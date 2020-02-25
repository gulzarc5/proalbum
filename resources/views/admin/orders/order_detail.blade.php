@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">

    <div class="">
      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Order Details <small> FGHGAU12IN</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                  <div class="row product-view-tag">
                    <div class="col-md-6">
                      <h3 class="prod_title">User Info</h3>
                      <h5><strong>Email : </strong> fdgfdgd</h5>
                      <h5><strong>Profile Type : </strong> Lab Owner</h5>
                      <h5><strong>Contact Person : </strong> sddsad</h5>
                      <h5><strong>State : </strong> sdfsdf</h5>
                      <h5><strong>City : </strong> dsfgsdfg</h5>
                      <h5><strong>Pin : </strong> sdffgdsfg</h5>
                      <h5><strong>Address : </strong> dsffdsf</h5>
                    </div>
                    <div class="col-md-6">
                      <h3 class="prod_title">Shipping Details</h3>
                      <h5><strong>Email : </strong> fdgfdgd</h5>
                      <h5><strong>Profile Type : </strong> Lab Owner</h5>
                      <h5><strong>Contact Person : </strong> sddsad</h5>
                      <h5><strong>State : </strong> sdfsdf</h5>
                      <h5><strong>City : </strong> dsfgsdfg</h5>
                      <h5><strong>Pin : </strong> sdffgdsfg</h5>
                      <h5><strong>Address : </strong> dsffdsf</h5>
                    </div>                      
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
                      <th class="column-title" style="width: 5%;">Quantity </th>
                      <th class="column-title" style="width: 5%;">Rate </th>
                      <th class="column-title" style="width: 7%;">VAT 15%</th>
                      <th class="column-title" style="width: 5%;">Amount </th>                    
                      <th class="column-title" style="width: 5%;">Status </th>                      
                      <th class="column-title" style="width: 17%;">Action </th>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr class="pointer">
                      <td class=" ">
                        <a>
                          <img src="http://localhost/proalbum/public/assets/product/thumb/115822039832020-Feb-20.jpg" alt="...">
                        </a>
                      </td>
                      <td class=" ">
                        <b>Royal Velbet One</b><br>
                        <small>Product Type : Spread | Number of Spread : 12 | Size : 13X13</small><br>                        
                        <strong><small style="text-decoration: underline;">Option</small></strong><br>
                        <small>Print Type : A one | Paper : A4 | Color : Green</small>
                      </td>
                      <td class=" ">2 </td>
                      <td class=" ">R 200</td>
                      <td class=" ">R 30</td>
                      <td class="a-right a-right ">R 230</td>
                      <td class=" ">Delivered</td>
                      <td class=" ">
                        <select class="form-control" style="padding-right: 0;">
                          <option>Waiting to dispatch</option>
                          <option>Dispatched</option>
                          <option>Delivered</option>
                          <option>Canclled</option>
                        </select>
                      </td>
                    </tr>
                    <tr class="pointer">
                      <td class=" ">
                        <a>
                          <img src="http://localhost/proalbum/public/assets/product/thumb/115822039832020-Feb-20.jpg" alt="...">
                        </a>
                      </td>
                      <td class=" ">
                        <b>Royal Velbet One</b><br>
                        <small>Product Type : Spread | Number of Spread : 12 | Size : 13X13</small><br>                        
                        <strong><small style="text-decoration: underline;">Option</small></strong><br>
                        <small>Print Type : A one | Paper : A4 | Color : Green</small>
                      </td>
                      <td class=" ">2 </td>
                      <td class=" ">R 200</td>
                      <td class=" ">R 30</td>
                      <td class="a-right a-right ">R 230</td>
                      <td class=" ">Delivered</td>
                      <td class=" ">
                        <select class="form-control" style="padding-right: 0;">
                          <option>Waiting to dispatch</option>
                          <option>Dispatched</option>
                          <option>Delivered</option>
                          <option>Canclled</option>
                        </select>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan=6>Sub Total</td>
                      <td colspan=2>R 1500</td>
                    </tr>
                    <tr>
                      <td colspan=6>Vat 15%</td>
                      <td colspan=2>R 192</td>
                    </tr>
                    <tr>
                      <td colspan=6>Shipping</td>
                      <td colspan=2>R 250</td>
                    </tr>
                    <tr class="grand">
                      <td colspan=6><strong>Grand Total</strong></td>
                      <td colspan=2><strong>R 1942</strong></td>
                    </tr>
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