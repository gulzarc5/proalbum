@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
        <a href="{{ route('admin.product_list') }}" class="btn btn-primary" style="float: right;">Product List</a>
	    <div class="x_panel">
	        <div class="x_title">
	            <h2>Add Product</h2>
	            <div class="clearfix"></div>
	        </div>
            <div>
                 @if (Session::has('message'))
                    <div class="alert alert-success" >{{ Session::get('message') }}</div>
                 @endif
                 @if (Session::has('error'))
                    <div class="alert alert-danger" >{{ Session::get('error') }}</div>
                 @endif

            </div>
	        <div>
	            <div class="x_content">
	            	{{ Form::open(['method' => 'post','route'=>'admin.product_add','enctype'=>'multipart/form-data']) }}
	            	<div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Enter Product name" id="name" value="{{old('name')}}">
                                  @if($errors->has('name'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="slug">URL Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" readonly value="{{old('slug')}}">
                                @if($errors->has('slug'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @enderror
                            </div>                                                          
                        </div>

                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="p_code">Product Code</label><br>
                                <input type="text" class="form-control" name="p_prefix"  placeholder="Enter Prefix" value="{{old('p_prefix', "PRO-")}}" style="width:49.5%;float:left">
                                <input type="text" class="form-control" name="p_code"  placeholder="Enter Product Code" value="{{old('p_code')}}" style="width:49%;margin-left:5px;float:left">
                                @if($errors->has('p_prefix'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('p_prefix') }}</strong>
                                    </span>
                                @enderror
                                @if($errors->has('p_code'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('p_code') }}</strong>
                                    </span>
                                @enderror
                                  
                              </div>
                              <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Category</label>
                                <select class="form-control" name="category" >
                                    <option value="">--Select Category--</option>
                                    @if (isset($category) && !empty($category))
                                        @foreach ($category as $item)
                                           <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach                                        
                                    @endif
                                </select>
                                @if($errors->has('category'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @enderror
                            </div>                                                          
                        </div>

                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                              <label for="img">Image</label>
                              <input type="file" onchange="readURL(this)" class="form-control" name="img"></input>
                               @if($errors->has('img'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @enderror
                            </div>       
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <img src="" height="300px" id="preview" style="padding: 12px;">
                            </div>                                                                                 
                        </div>                        
                    </div>

                    <div class="well" style="overflow: auto">

                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="unit">Select Unit</label>
                                <div style="display: flex;">
                                    <div class="radio" style="margin-top: 10px;margin-bottom: 10px;float: left;padding-right: 30px">
                                        <label class="hover" style="padding-left: 0px">
                                            <div class="iradio_flat-green hover" style="position: relative;">
                                                <input type="radio" class="flat" name="select_unit" style="position: absolute; opacity: 0;" value="2" checked>
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> CM 
                                        </label>
                                    </div>
                                    <div class="radio" style="margin-top: 10px;margin-bottom: 10px;float: left;padding-right: 30px">
                                        <label class="hover">
                                            <div class="iradio_flat-green hover" style="position: relative;">
                                                <input type="radio" class="flat" name="select_unit" style="position: absolute; opacity: 0;" value="2">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> INCH
                                        </label>
                                    </div>
                                    <div class="radio" style="margin-top: 10px;margin-bottom: 10px;float: left;">
                                        <label class="hover">
                                            <div class="iradio_flat-green hover" style="position: relative;">
                                                <input type="radio" class="flat" name="select_unit" style="position: absolute; opacity: 0;" value="2">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> MM
                                        </label>
                                    </div>
                                </div>
                                @if($errors->has('unit'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('unit') }}</strong>
                                    </span>
                                @enderror
                            </div> 

                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="dpi">DPI</label>
                                <input type="text" class="form-control" name="dpi"  placeholder="Enter DPI">
                                @if($errors->has('dpi'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('dpi') }}</strong>
                                    </span>
                                @enderror
                            </div>  
                        </div>

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
                                        <input type="text" name="displaysize[]" id="displaysize" class="form-control" placeholder="Extra Page/ Sheet/ Quantity Price" required="">
                                    </div>
                                </div>    
                               <button type="button" class="btn btn-info" id="addsize" name="addsize" onclick="addMoreSize()">+ Add More</button> 
                            </div>
                        </div>

                        <div class="form-row mb-10">
                            <div class="form-group sheet">
                                <label class="col-sm-12 control-label">Product Type</label>                   
                                <div class="col-sm-12 type">
                                    <div class="radio">
                                        <label class="hover">
                                            <div class="iradio_flat-green hover" style="position: relative;">
                                                <input type="radio" class="flat" checked="" name="sheet_type" style="position: absolute; opacity: 0;" value="1" checked id="page_radio_btn">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> Page 
                                        </label>
                                    </div>
                                    <div id="page-input">
                                        <input type="text" class="form-control" placeholder="Display Name" name="page_display" value="Page" id="page_1">
                                        <input type="text" class="form-control" placeholder="number of pages" name="number_of_pages" id="page_2">
                                        <input type="text" class="form-control" placeholder="Price" name="page_value" id="page_3">
                                    </div>                                
                                </div>
                                <div class="col-sm-12 type">
                                    <div class="radio">
                                        <label class="hover">
                                            <div class="iradio_flat-green hover" style="position: relative;">
                                                <input type="radio" class="flat" name="sheet_type" style="position: absolute; opacity: 0;" value="2" id="sheet_type_radio_btn">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> Spread 
                                        </label>
                                    </div>
                                    <div id="spread-div">
                                        <input type="text" class="form-control" placeholder="Display Name" value="Spread" name="spread_display" id="sheet_type_1">
                                        <input type="text" class="form-control" placeholder="number of spread" name="number_of_pages" disabled id="sheet_type_2">
                                        <input type="text" class="form-control" placeholder="Price" name="spread_value" disabled id="sheet_type_3">
                                    </div>                                
                                </div>
                                <div class="col-sm-12 type">
                                    <div class="radio">
                                        <label class="hover">
                                            <div class="iradio_flat-green hover" style="position: relative;">
                                                <input type="radio" class="flat" name="sheet_type" style="position: absolute; opacity: 0;" value="3">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> Quantity
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Display Name" value="Quantity" name="quantity_display">
                                    <input type="text" class="form-control" placeholder="Enter Quantity" name="number_of_pages" disabled>
                                    <input type="text" class="form-control" placeholder="Price" name="quantity_value" disabled>
                                </div>  	
                            </div> 
                        </div>                       
                    </div>

                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10" id="option-div">
                            <div class="col-md-7 col-sm-12 col-xs-12 mb-3">
                                <label for="option">Option Name</label>
                                <br>
                                <input type="text" class="form-control" name="option[]"  placeholder="Enter Product name" id="name" style="width:80%;float:left" required>
                                <button type="button" class="btn btn-info" style="float:right" onclick="moreOption()">+ Add More</button>
                            </div>                                                  
                        </div>
                       
                    </div>


                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                              <label for="shot_desc">Short Description</label>
                              <textarea type="text" class="form-control" name="shot_desc"></textarea>
                               @if($errors->has('shot_desc'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('shot_desc') }}</strong>
                                    </span>
                                @enderror
                            </div>                                                                                 
                        </div>

                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                              <label for="desc_title">Description Title</label>
                              <input type="text" class="form-control" name="desc_title"></input>
                               @if($errors->has('desc_title'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('desc_title') }}</strong>
                                    </span>
                                @enderror
                            </div>                                                                                 
                        </div>

                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                              <label for="long_desc">Long Description</label>
                              <textarea type="text" class="form-control" name="long_desc" id="desc"></textarea>
                               @if($errors->has('long_desc'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('long_desc') }}</strong>
                                    </span>
                                @enderror
                            </div>                                                                                 
                        </div>
                    </div>

                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="seo_page_title">SEO Page Title</label>
                                <input type="text" class="form-control" name="seo_page_title"  placeholder="Enter Product Title" >
                                  @if($errors->has('seo_page_title'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('seo_page_title') }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="seo_meta_desc">SEO Meta Description</label>
                                <input type="text" class="form-control" name="seo_meta_desc"  placeholder="Enter Tag Name" >
                                @if($errors->has('seo_meta_desc'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('seo_meta_desc') }}</strong>
                                    </span>
                                @enderror
                            </div>  
                                                        
                        </div>
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                              <label for="seo_meta_tag">SEO Meta Tag</label>
                              <textarea type="text" class="form-control" name="seo_meta_tag" id="desc"></textarea>
                              @if($errors->has('seo_meta_tag'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('seo_meta_tag') }}</strong>
                                    </span>
                                @enderror
                            </div>                                                                                 
                        </div>
                    </div>

                    
                    <div class="form-group">    	            	
                        {{ Form::submit('Next', array('class'=>'btn btn-success')) }}  
                    {{-- <a href="{{route('admin.products.add_product_option')}}" class="btn btn-primary">Next</a> --}}
                    </div>
	            	{{ Form::close() }}
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

 <script src="{{ asset('admin/ckeditor4/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'desc', {
        height: 400,
        filebrowserUploadUrl: "{{route('admin.ck_editor_image_upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    } );
</script>

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

$(document).ready(function(){
    $('#name').keyup(function(){
        var str = $('#name').val();
        var d = str.replace(/\s+/g, '-').toLowerCase();
        $('#slug').val(d);
    });

    $('#sheet_type_radio_btn').click(function(){
        alert('gjyug');
    });
});
</script>

<script src="{{ asset('admin/admin_product.js')}}"></script>
 @endsection