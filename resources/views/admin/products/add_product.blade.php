@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
        <a href="{{ route('admin.category_list') }}" class="btn btn-primary" style="float: right;">Category List</a>
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
	            	{{ Form::open(['method' => 'put','route'=>'admin.categoryInsert','enctype'=>'multipart/form-data']) }}
	            	<div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Enter Product name" id="name">
                                  @if($errors->has('name'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="slug">URL Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" readonly>
                                @if($errors->has('slug'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @enderror
                            </div>                                                          
                        </div>

                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="p_code">Product Code</label>
                                <input type="text" class="form-control" name="p_code"  placeholder="Enter Product Code" value="PRO-">
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
                                <select class="form-control" name="unit" >
                                    <option value="">--Select Unit--</option>
                                    @if (isset($unit) && !empty($unit))
                                        @foreach ($unit as $item)
                                        <option value="{{$item->id}}">{{$item->units}}</option>
                                        @endforeach                                        
                                    @endif
                                </select>
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

                        
                        <div class="form-group col-md-6" id="size-div">
                            <label class="col-sm-12 control-label">Size</label>
                            <div class="col-sm-2" style="width:150px;">
                                <input type="text" name="swidth[]" id="swidth" class="form-control" placeholder="Width" required="">
                            </div>
                            <div class="col-sm-2" style="width:auto;line-height: 40px;">X</div>
                            <div class="col-sm-2" style="width:150px;">
                                <input type="text" name="sheigth[]" id="sheigth" class="form-control" placeholder="Height" required="">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="displaysize[]" id="displaysize" class="form-control" placeholder="Display Size" required="">
                            </div>
                           <button type="button" class="btn btn-primary" id="addsize" name="addsize" onclick="addMoreSize()">Add</button> 
                        </div>

                        <div class="form-group col-md-6 sheet" >        
                            <label class="col-sm-12 control-label">Sheet Type</label>                   
                            <div class="col-sm-12 type">
                                <div class="radio">
                                    <label class="hover">
                                        <div class="iradio_flat-green hover" style="position: relative;">
                                            <input type="radio" class="flat" checked="" name="sheet_type" style="position: absolute; opacity: 0;" value="1" checked>
                                            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div> Page 
                                    </label>
                                </div>
                                <div id="page-input">
                                    <input type="text" class="form-control" placeholder="Display Name" name="page_display" value="Page">
                                    <input type="text" class="form-control" placeholder="Value" name="page_value">
                                </div>                                
                            </div>
                            <div class="col-sm-12 type">
                                <div class="radio">
                                    <label class="hover">
                                        <div class="iradio_flat-green hover" style="position: relative;">
                                            <input type="radio" class="flat" name="sheet_type" style="position: absolute; opacity: 0;" value="2">
                                            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div> Spread 
                                    </label>
                                </div>
                                <div id="spread-div">
                                    <input type="text" class="form-control" placeholder="Display Name" value="Spread" name="spread_display">
                                    <input type="text" class="form-control" placeholder="Value" name="spread_value">
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
                                <input type="text" class="form-control" placeholder="Value" name="quantity_value">
                            </div>  	
                        </div>                        
                    </div>

                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10" id="option-div">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="option">Option Name</label>
                                <br>
                                <input type="text" class="form-control" name="option[]"  placeholder="Enter Product name" id="name" style="width:80%;float:left" required>
                                <button type="button" class="btn btn-sm btn-info" style="float:right" onclick="moreOption()">Add More</button>
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
                        {{ Form::submit('Submit', array('class'=>'btn btn-success')) }}  
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
});
</script>

<script src="{{ asset('admin/admin_product.js')}}"></script>
 @endsection