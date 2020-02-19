@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12" style="display:none" id="add_new_size_div">
            <div class="x_panel">
                <h3>Add New Size</h3>
                <div class="x_content">
                    {{ Form::open(['method' => 'post','route'=>'admin.new_product_size_add']) }}
                    @if (isset($id) && !empty($id))
                        <input type="hidden" name="p_id" value="{{$id}}">
                    @endif
                    <div class="form-row mb-10">
                        <div class="form-group" id="size-div">
                            <div class="form-row">
                                <label class="col-sm-12 control-label">Size</label>
                                <div class="col-sm-2" style="width:150px;">
                                    <input type="text" name="swidth[]" id="swidth" class="form-control" placeholder="Width" required="">
                                </div>
                                <div class="col-sm-2" style="width:auto;line-height: 40px;">X</div>
                                <div class="col-sm-2" style="width:150px;">
                                    <input type="text" name="sheight[]" id="sheigth" class="form-control" placeholder="Height" required="">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="displaysize[]" id="displaysize" class="form-control" placeholder="Display Size" required="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="sprice[]" id="displaysize" class="form-control" placeholder="Extra Page/ Sheet/ Quantity Price" required="">
                                </div>
                            </div>    
                        <button type="button" class="btn btn-info" id="addsize" name="addsize" onclick="addMoreSize()">+ Add More</button> 
                        </div>
                    </div>
                    <div  class="form-row mb-10">    	
                        <div class="col-md-12">            	
                            {{ Form::submit('Submit', array('class'=>'btn btn-success')) }}  
                            <button type="button" class="btn btn-danger" onclick="addNewSizeDivClose()">Close</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div> 

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                <h2>Size List </h2>
                <a class="btn btn-warning" style="float:right" onclick="addNewSizeDivOpen()">Add New</a>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-12">
                        <div class="x_content">
                            <div class="row table-head" style="">
                              <div class="col-md-8">
                                <h4 style="text-align:center">Size</h4>
                              </div>
                              <div class="col-md-3">
                                <h4>Extra Page Price</h4>
                              </div>
                              <div class="col-md-1">
                                <h4>Action</h4>
                              </div>
                            </div>         
                            @if (isset($size) && !empty($size))
                            @foreach ($size as $sizes)         
                            {{ Form::open(['method' => 'post','route'=>'admin.new_product_size_update']) }}
                                <div class="row table-body">                                       
                                    <div class="col-md-8 col-sm-8" style="text-align:center;"> 
                                        <b id="size_name_div{{$sizes->id}}">
                                        {{$sizes->display_name}}
                                        </b>
                                        <b id="size_input{{$sizes->id}}" style="display:none">
                                            <input type="hidden" name="size_id" value="{{$sizes->id}}">
                                            <div class="col-sm-2" style="width:150px;">
                                                <input type="text" name="sHeight" class="form-control" placeholder="Width" required="" value="{{$sizes->height}}">
                                            </div>
                                            <div class="col-sm-2" style="width:auto;line-height: 40px;">X</div>
                                            <div class="col-sm-2" style="width:150px;">
                                                <input type="text" name="sWidth" class="form-control" placeholder="Height" required="" value="{{$sizes->width}}">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="sDisplayName" class="form-control" placeholder="Display Size" required="" value="{{$sizes->display_name}}">
                                            </div>
                                        </b>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <b id="size_price_div{{$sizes->id}}">
                                               R {{$sizes->extra_page_price}}
                                            </b>
                                            <b id="size_price_input{{$sizes->id}}" style="display:none">
                                                <input type="number"  class="form-control" placeholder="Enter Extra Page Price" required="" name="s_price" value="{{$sizes->extra_page_price}}">
                                            </b>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-1" id="option_details_button_div11">
                                        <b id="size_btn_edit{{$sizes->id}}">
                                            <button class="btn btn-warning" type="button" onclick="editSizeDivOpen({{$sizes->id}})">Edit</button>
                                        </b>
                                        <b id="size_btn_save{{$sizes->id}}" style="display:none">
                                            <button type="submit" class="btn btn-sm btn-info">Save</button>
                                        </b>                                         
                                    </div>
                                </div>
                            {{ Form::close() }}    
                            @endforeach
                            @endif                                                                            
                          </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

	<div class="col-md-2"></div>
</div>

 @endsection
@section('script')

<script src="{{ asset('admin/product_size_edit.js')}}"></script>
@endsection