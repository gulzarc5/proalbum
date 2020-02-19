@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
  <div class="row">
	  <div class="col-md-12">
        <a href="{{ route('admin.product_list') }}" class="btn btn-primary" style="float: right;">Product List</a>
	    <div class="x_panel">

	        <div class="x_title">
              <h4 style="margin: 0;">Edit Option Detail</h4>
              @if (isset($product))
                <h2>{{$product->name}}</h2>
              @endif
	            <div class="clearfix"></div>
	        </div>
      </div>
      <div class="x_panel" id="addNewOptionDiv" style="display:none">
        <h3>Add New Option</h3>
        <div class="x_content">
          {{ Form::open(['method' => 'post','route'=>'admin.new_option_edit_add']) }}
          @if (isset($product))
          <input type="hidden" name="p_id" value="{{$product->id}}">
          @endif
          <div class="well" style="overflow: auto">
            <div class="form-row mb-10" id="option-div">
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="option">Option Name</label>
                    <br>
                    <input type="text" class="form-control" name="option[]"  placeholder="Enter Product name" id="name" style="width:75%;float:left" required>
                    <button type="button" class="btn btn-info" style="float:right;" onclick="moreOption()">+ Add More</button>
                </div>                                                  
            </div>  
            
            <div class="form-row mb-10" id="option-div">
              <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                <button class="btn btn-info" type="submit">Submit</button>
                <button class="btn btn-danger" type="button" onclick="addNewOptionDivClose();">Close</button>
              </div>
            </div>
          </div>
          {{ Form::close() }}
        </div>
      </div>
        <div class="x_panel">
          <div class="x_content">

            <div style="margin-top: 30px;" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                @if (isset($option) && !empty($option))
                @php
                    $active_count = 1;
                @endphp
                  @foreach ($option as $item)
                    @if (isset($tab) && !empty($tab))
                      @if ($tab == $item->id)
                        <li role="presentation" class="active"><a href="#tab_content{{$item->id}}" role="tab" id="home-tab" data-toggle="tab" aria-expanded="true">{{$item->name}}</a></li>
                      @else
                        <li role="presentation" class=""><a href="#tab_content{{$item->id}}" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">{{$item->name}}</a></li>                            
                      @endif
                    @else
                      @if ($active_count == 1)
                        <li role="presentation" class="active"><a href="#tab_content{{$item->id}}" role="tab" id="home-tab" data-toggle="tab" aria-expanded="true">{{$item->name}}</a></li>
                      @else
                        <li role="presentation" class=""><a href="#tab_content{{$item->id}}" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">{{$item->name}}</a></li>                            
                      @endif
                    @endif
                    @php
                      $active_count++;
                    @endphp
                  @endforeach
                @endif
                <li  class="" style="float:right"><a class="btn btn-success" style="background-color: #f0ad4e;border-color: #f0ad4e;" onclick="addNewOptionDivOpen();">Add New Option</a></li>
              </ul>
              {{-- /////////////////////////Tab Div Start Here ////////////////////////////--}}
              <div id="myTabContent" class="tab-content">
                @if (isset($option) && !empty($option))
                @php
                    $count_tab_option = 1;
                @endphp
                  @foreach ($option as $item)
                    @if (isset($tab) && !empty($tab))
                      @if ($tab == $item->id)
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content{{$item->id}}" aria-labelledby="home-tab">
                      @else
                        <div role="tabpanel" class="tab-pane fade" id="tab_content{{$item->id}}" aria-labelledby="home-tab">
                      @endif

                    @else
                      @if ($count_tab_option == '1')
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content{{$item->id}}" aria-labelledby="home-tab">
                      @else
                        <div role="tabpanel" class="tab-pane fade" id="tab_content{{$item->id}}" aria-labelledby="home-tab">
                      @endif
                    @endif
                    @php
                      $count_tab_option++;
                    @endphp                  
                    {{--////////////////////////// New Option Item Add Div  ///////////////////////////--}}
                    {{ Form::open(['method' => 'post','route'=>'admin.new_option_add','enctype'=>'multipart/form-data','id'=>'newOptionAddForm'.$item->id.'']) }}
                      <div class="well" style="overflow: auto;display:none;" id="newOptionItem{{$item->id}}">          
                      <input type="hidden" value="{{$item->id}}" name="option_id">
                      @if (isset($product))
                        <input type="hidden" name="pro_id" value="{{$product->id}}">
                      @endif
                      <input type="hidden" name="main_option_id" value="{{$item->id}}">

                      <div class="form-row mb-10">
                        <div class="col-md-8 col-sm-12 col-xs-12 mb-30" id="errMsg{{$item->id}}">
                        </div>
                      </div>
                        <div class="form-row mb-10">
                            <div class="col-md-8 col-sm-12 col-xs-12 mb-30">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" name="name"  placeholder="Enter Product name" id="name">                             
                              <label for="img">Image</label>
                              <input type="file" onchange="readURL(this)" class="form-control" name="img" id="img">
                              <label for="name">Size</label>
                              @if (isset($size) && !empty($size))
                                  @foreach ($size as $sizes)
                                    <div class="option-size">
                                      <h4>{{$sizes->display_name}}</h4>
                                      <input type="hidden" name="size_id[]" value="{{$sizes->id}}">
                                      <input type="text" class="form-control" name="price[]"  placeholder="Enter Price" id="price">
                                    </div>
                                  @endforeach
                              @endif
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                              {{-- <img class="" src="{{asset('web/images/photos/9.jpg')}}" style="width: 150px"> --}}
                            </div> 
                            <div class="form-group col-sm-12">                    
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" onclick="newOptionItemDivClose({{$item->id}})"  class="btn btn-warning">Cancel</button>
                            </div> 
                        </div>                                                   
                    </div>                    
	            	    {{ Form::close() }}
                     {{--////////////////////////////// New Option Item Add Div End //////////////////////--}}
                    <div class="x_title" style="margin-bottom: 0;border-bottom: 0px solid #E6E9ED;">
                      <h4 style="width: 70%;float: left;"><strong>{{$item->name}} List</strong></h4>
                      <button class="btn btn-sm btn-info btn-add-option" onclick="newOptionItemDivOpen({{$item->id}});">+ Add New {{$item->name}}</button>
                    </div>
                    <div class="x_content">

                      <div class="row table-head" style="">
                        <div class="col-md-3">
                          <h4>Name</h4>
                        </div>
                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Size</h4>
                            </div>
                            <div class="col-md-6">
                              <h4>Price</h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <h4>Image</h4>
                        </div>
                        <div class="col-md-1">
                          <h4>Action</h4>
                        </div>
                      </div>
                      {{--/////////// Option Detail Div Area //////////////--}}
                      @if (isset($item->option_details) && !empty($item->option_details))
                        @foreach ($item->option_details as $option_details)

                        {{ Form::open(['method' => 'post','route'=>'admin.new_option_Edit','enctype'=>'multipart/form-data','id'=>'newOptionUpdateForm'.$option_details->id.'']) }}
                        @if (isset($product))
                          <input type="hidden" name="pro_id" value="{{$product->id}}">
                        @endif
                        <input type="hidden" name="main_option_id" value="{{$item->id}}">
                          <input type="hidden" name="option_detail_id" value="{{$option_details->id}}">
                          <div class="row table-body">

                            {{--/////////// Option Detail Name Area ///////--}}
                            <div class="col-md-3">
                              <p id="option_details_name_div{{$option_details->id}}">{{$option_details->name}} </p>
                              <p id="option_details_name_input_div{{$option_details->id}}" style="display:none">
                                <input type="text" name="option_name" value="{{$option_details->name}}" class="form-control">
                              </p>
                            </div>
                            {{--/////////// Option Detail Name Area ///////--}}

                            {{--/////////// Option Detail Size Area ///////--}}
                            <div class="col-md-4">
                              <div class="row">
                                <div class="col-md-12">
                                  @if (isset($option_details->option_details_price) && !empty($option_details->option_details_price))
                                    @foreach ($option_details->option_details_price as $option_price)
                                      <p class="col-md-6">{{$option_price->size_name}}</p>
                                      <p class="col-md-6 price-edit">R 
                                        <span class="option_size_price_div{{$option_details->id}}">
                                          {{$option_price->price}}
                                        </span>
                                        <span class="option_size_input_div{{$option_details->id}}" style="display:none">
                                          <input type="hidden" name="option_size_id[]" value="{{$option_price->id}}">
                                          <input type="text" name="option_size_price[]" value="{{$option_price->price}}" style="width:50px">
                                        </span>                                        
                                      </p>
                                    @endforeach
                                  @endif
                                </div>
                              </div>
                            </div>
                            {{--/////////// Option Detail Size Area End///////--}}

                            {{--/////////// Option Detail Image Area ///////--}}
                            <div class="col-md-4">
                              <div id="option_details_img_div{{$option_details->id}}">                              
                                <img src="{{asset('assets/option_image/thumb/'.$option_details->image.'')}}" style="max-width:100px">
                              </div>
                              <div id="option_details_img_input_div{{$option_details->id}}" style="display:none">                              
                                <input type="file" class="form-control" name="img" style="width: 90%;">
                              </div>
                            </div>
                            {{--/////////// Option Detail Image Area End ///////--}}
                            
                            <div class="col-md-1" id="option_details_button_div{{$option_details->id}}">
                              <button onclick="optionDetailsEdit({{$option_details->id}})" type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button>
                            </div>
                          </div>
                                                                      
	            	        {{ Form::close() }}
                        @endforeach
                      @endif
                       {{--/////////// Option Detail Div Area ///////////////--}}
                    </div>
                  </div>        
                  @endforeach
                @endif
              </div>
              {{-- /////////////////////////Tab Div End Here ////////////////////////////--}}

            </div>

          </div>
        </div>
    </div>
  </div>

	<div class="col-md-2"></div>
</div>

    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>

 @endsection
 @section('script')
 <script src="{{ asset('admin/admin_product_option.js')}}"></script>
 
<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();  
        reader.onload = function (e) {
            $('#preview')
                .attr('src', e.target.result)
                .height(120);
        };
  
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
 @endsection