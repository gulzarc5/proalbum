@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">

    <div class="">
      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Product View</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              @if (isset($product) && !empty($product))
                <div class="col-md-8 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
                <h3 class="prod_title">{{$product->name}} <a href="{{route('admin.product_edit_form',['id'=>encrypt($product->id)])}}" class="btn btn-warning" style="float:right;margin-top: -8px;">Edit Product</a></h3>
                  <p>{{$product->p_short_desc}}</p>
                  <div class="row product-view-tag">
                      <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Product Code:</strong> {{$product->product_code}}</h5>
                      <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Catagory:</strong> {{$product->cat_name}}</h5>
                      <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Unit:</strong> {{$product->unit}}</h5>
                      <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Dpi:</strong> {{$product->dpi}}</h5>
                      <h5 class="col-md-4 col-sm-4 col-xs-12"><strong>Product Type Name:</strong> {{$product->sheet_name}}</h5>
                      <h5 class="col-md-4 col-sm-4 col-xs-12"><strong>Min {{$product->sheet_name}}:</strong> {{$product->sheet_value}}</h5>
                      <h5 class="col-md-4 col-sm-4 col-xs-12"><strong>Price:</strong> R {{$product->sheet_price}}</h5>
                      <div class="col-md-12">
                        <hr>
                        <h3>Product Size List <a class="btn btn-warning" style="float:right" href="{{route('admin.product_size_edit_form',['p_id'=>encrypt($product->id)])}}">Edit Sizes</a></h3>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Size</th>
                              <th><b>SizePrice</b></th>
                            </tr>
                          </thead>
                          <tbody>
                            @if (isset($size) && !empty($size))
                                @foreach ($size as $sizes)
                                <tr>
                                  <td>{{$sizes->display_name}}</td>
                                  <td>{{$sizes->extra_page_price}}</td>
                                </tr>
                                @endforeach
                            @endif
                            
                          </tbody>
                        </table>
                      </div>
                  </div>
                  <br />
                </div>
                <div class="col-md-4 col-sm-7 col-xs-12">
                  <h3 class="prod_title">Images <a href="{{route('admin.product_image_edit',['id'=>encrypt($product->id)])}}" class="btn btn-warning" style="float:right;margin-top: -8px;"><i class="fa fa-edit"></i></a></h3>
                  <div class="product-image">
                    <img src="{{asset('assets/product/thumb/'.$product->image.'')}}" alt="..." />
                  </div>
                  @if (isset($product_images) && !empty($product_images))
                  <div class="product_gallery">
                      @foreach ($product_images as $item)
                          @if ($product->image != $item->images)
                          <a>
                            <img src="{{asset('assets/product/thumb/'.$item->images.'')}}" alt="..." />
                          </a>
                          @endif
                      @endforeach
                  @endif                  
                </div>
                </div>

                <div class="col-md-12">
                  {{-- Option Tab Start --}}
                  <div style="margin-top: 30px;" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      @if (isset($option) && !empty($option))
                        @php
                          $option_chk = true;
                        @endphp
                        @foreach ($option as $options)
                          @if ($option_chk)
                            <li role="presentation" class="active"><a href="#tab_content{{$options->id}}" role="tab" id="home-tab" data-toggle="tab" aria-expanded="true">{{$options->name}}</a></li>
                          @else
                            <li role="presentation" class=""><a href="#tab_content{{$options->id}}" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">{{$options->name}}</a></li>
                          @endif
                          @php
                              $option_chk = false;
                          @endphp
                        @endforeach
                      @endif
                    <li class="" style="float: right;"><a class="btn btn-warning" style="background-color: #f0ad4e;border-color: #f0ad4e;" href="{{route('admin.product_option_edit_form',['p_id'=>encrypt($product->id)])}}">Edit Options</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      @if (isset($option) && !empty($option))
                        @php
                          $option_chk = true;
                        @endphp
                        @foreach ($option as $options)
                          @if ($option_chk)
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content{{$options->id}}" aria-labelledby="home-tab">
                          @else
                            <div role="tabpanel" class="tab-pane fade" id="tab_content{{$options->id}}" aria-labelledby="home-tab">
                          @endif
                              <div class="x_title" style="margin-bottom: 0;border-bottom: 0px solid #E6E9ED;">
                                <h4 style="width: 70%;float: left;"><strong>{{$options->name}} List</strong></h4>
                              </div>
                              @if (isset($options->option_details) && !empty($options->option_details))
                                <div class="x_content">   
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th class="wd-150">Name</th>
                                        <th class="option-size-price"><b>Size</b><b>Price</b></th>
                                        <th>Image</th>
                                      </tr>
                                    </thead>
                                    <tbody> 
                                      @foreach ($options->option_details as $option_details)
                                        <tr>
                                          <td class="wd-150">{{$option_details->name}}</td>
                                          <td class="wd-200">
                                            
                                            @if (isset($option_details->option_details_price) && !empty($option_details->option_details_price))
                                              @foreach ($option_details->option_details_price as $option_details_price)
                                              <div class="option-size-price">
                                                <b>{{$option_details_price->size_name}}</b>
                                                <b>R {{$option_details_price->price}}</b>
                                              </div>
                                              @endforeach                                        
                                            @endif 
                                          </td>
                                          <td><img src="{{asset('assets/option_image/thumb/'.$option_details->image.'')}}" class="option-img" alt="icon"></td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              @endif                                
                            </div>
                          @php
                            $option_chk = false;
                          @endphp
                        @endforeach
                      @endif
                    </div>
                  </div>
                    {{-- Option Tab End --}}
                </div>
                <div class="col-md-12">
                  <div class="product_price">
                    <h3 style="margin: 0">Product Description</h3><hr style="margin: 10px 0;border-top: 1px solid #ddd;">
                    <h5 style="margin-bottom: 5px"><strong>Description Tittle:</strong> {{$product->p_long_description_title}}</h5>
                    <p>{!!$product->p_long_description!!}</p>
                  </div>

                </div>
                
              @endif
              <div class="col-md-12">
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