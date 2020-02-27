@extends('admin.template.admin_master')

@section('content')

  <div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Products</span>
        <div class="count green">
          @if (isset($total_products))
              {{$total_products}}
          @endif
        </div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Total Customers</span>
        <div class="count green">
          @if (isset($total_customers))
              {{$total_customers}}
          @endif
        </div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total New Orders </span>
          <div class="count green">
            @if (isset($new_orders))
              {{$new_orders}}
            @endif
          </div>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Processing Orders </span>
        <div class="count green">
          @if (isset($processing_orders))
            {{$processing_orders}}
          @endif
        </div>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Dispatched Orders </span>
        <div class="count green">
          @if (isset($dispatched_orders))
            {{$dispatched_orders}}
          @endif
        </div>
      </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
              <div class="x_content">
                 {{--//////////// Last Ten Sellers //////////////--}}
                 <div class="table-responsive">
                    <h2>Last Ten Orders</h2>
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">                
                                <th class="column-title">Sl No. </th>
                                <th class="column-title">Name</th>
                                <th class="column-title">Email</th>
                                <th class="column-title">Total Item</th>
                                <th class="column-title">Sub Total</th>
                                <th class="column-title">VAT @ 15%</th>
                                <th class="column-title">Total</th>
                                <th class="column-title">Date</th>
                                <th class="column-title">Status</th> 
                                <th class="column-title">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                          @if (isset($last_orders) && !empty($last_orders))
                          @php
                              $order_count = 1;
                          @endphp
                            @foreach ($last_orders as $item)
                                <tr>
                                  <td>{{$order_count++}}</td>
                                  <td>{{$item->user_name}}</td>
                                  <td>{{$item->user_email}}</td>
                                  <td>{{$item->total_quantity}}</td>
                                  <td>{{$item->sub_total}}</td>
                                  <td>{{$item->vat}}</td>
                                  <td>{{$item->total_price}}</td>
                                  <td>{{$item->created_at}}</td>
                                  <td>
                                    @if ($item->order_status == '1')
                                        <a class="btn btn-warning">New</a>
                                    @elseif($item->order_status == '2')
                                      <a class="btn btn-info">Processing</a>
                                    @elseif($item->order_status == '3')
                                      <a class="btn btn-primary">Dispatched</a>
                                    @elseif($item->order_status == '4')
                                      <a class="btn btn-success">Delivered</a>
                                    @else
                                        <a class="btn btn-danger">Cancelled</a>
                                    @endif
                                  </td>
                                  <td>
                                    <a target="_blank" href="{{route('admin.order_details',['order_id'=>encrypt($item->id)])}}" class="btn btn-info">View</a>
                                  </td>
                                </tr>
                            @endforeach
                          @endif
                        </tbody>
                    </table>
                </div>
              </div>
          </div>
      </div>

    </div>

  </div>

 @endsection