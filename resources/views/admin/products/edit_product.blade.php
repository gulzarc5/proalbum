@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
	    <div class="x_panel">
	        <div class="x_title">
	            <h2>Product Info Edit</h2>
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
                @if (isset($product) && !empty($product))
	            <div class="x_content">
                    {{ Form::open(['method' => 'post','route'=>'admin.new_product_update','enctype'=>'multipart/form-data']) }}
                    <input type="hidden" name="p_id" value="{{$product->id}}">
                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Enter Product name" id="name" value="{{$product->name}}">
                                  @if($errors->has('name'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @enderror
                              </div>    
                              
                              <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                <label for="p_code">Product Code</label><br>
                                <input type="text" class="form-control" name="p_code"  placeholder="Enter Prefix" value="{{$product->product_code}}">
                                @if($errors->has('p_code'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('p_prefix') }}</strong>
                                    </span>
                                @enderror
                                  
                              </div>

                              <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                <label for="p_starting">Price Starting From</label>
                                <input type="text" class="form-control" name="p_starting"  placeholder="Enter Price Starting From" id="p_starting"  value="{{$product->price}}" required>
                                  @if($errors->has('p_starting'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('p_starting') }}</strong>
                                      </span>
                                  @enderror
                            </div>   
                        </div>

                        <div class="form-row mb-10">                            
                              <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="category">Category</label>
                                <select class="form-control" name="category" >
                                    <option value="">--Select Category--</option>
                                    @if (isset($category) && !empty($category))
                                        @foreach ($category as $item)
                                        @if ($product->category_id == $item->id)
                                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                        @else  
                                            <option  value="{{$item->id}}">{{$item->name}}</option>
                                        @endif
                                           
                                        @endforeach                                        
                                    @endif
                                </select>
                                @if($errors->has('category'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @enderror
                            </div>   
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="video">Video  </label>
                                <input type="text"  class="form-control" name="video" value="{{$product->video}}"></input>
                                 @if($errors->has('video'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('video') }}</strong>
                                      </span>
                                  @enderror
                            </div>  

                        </div>   
                        
                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="banner">Banner  
                                  <span>(  Size Should Be 2000 X 400 Pixels )</span></label>
                                <input type="file"  class="form-control" name="banner" ></input>
                                 @if($errors->has('banner'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('banner') }}</strong>
                                      </span>
                                  @enderror
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <img src="{{ asset('assets/product/'.$product->banner) }}" class="img-responsive" height="300px" id="preview" style="padding: 12px;">
                            </div> 
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="video_thumb">Video Thumbnail  
                                  <span>(  Size Should Be 100 X 130 Pixels )</span></label>
                                <input type="file"  class="form-control" name="video_thumb" ></input>
                                 @if($errors->has('video_thumb'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('video_thumb') }}</strong>
                                      </span>
                                  @enderror
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <img src="{{ asset('assets/product/'.$product->video_thumb) }}" class="img-responsive" height="300px" id="preview" style="padding: 12px;">
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
                                                <input type="radio" class="flat" name="unit" style="position: absolute; opacity: 0;" value="CM" {{ $product->unit == 'CM' ? 'checked' : '' }}>
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> CM 
                                        </label>
                                    </div>
                                    <div class="radio" style="margin-top: 10px;margin-bottom: 10px;float: left;padding-right: 30px">
                                        <label class="hover">
                                            <div class="iradio_flat-green hover" style="position: relative;">
                                                <input type="radio" class="flat" name="unit" style="position: absolute; opacity: 0;" value="INCH" {{ $product->unit == 'INCH' ? 'checked' : '' }}>
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> INCH
                                        </label>
                                    </div>
                                    <div class="radio" style="margin-top: 10px;margin-bottom: 10px;float: left;">
                                        <label class="hover">
                                            <div class="iradio_flat-green hover" style="position: relative;">
                                                <input type="radio" class="flat" name="unit" style="position: absolute; opacity: 0;" value="MM" {{ $product->unit == 'MM' ? 'checked' : '' }}>
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
                        </div>

                        <div class="form-row mb-10">
                            <div class="form-group sheet">
                                <label class="col-sm-12 control-label">Product Type</label>                   
                                <div class="col-sm-12 type">
                                    <div class="radio">
                                        <label class="hover" onclick="showInput(1)">
                                            <div class="iradio_flat-green hover" style="position: relative;">
                                                <input type="radio" class="flat" checked="" name="sheet_type" style="position: absolute; opacity: 0;" value="1" {{ $product->sheet_type == '1' ? 'checked' : '' }} id="page_radio_btn">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> Page 
                                        </label>
                                    </div>
                                    <div id="page-input">
                                        <input type="text" class="form-control" placeholder="Display Name" name="page_display" value="Page" id="page_1" >
                                        <input type="text" class="form-control" placeholder="number of pages" name="page_value" id="page_2" {{ $product->sheet_type == '1' ? '' : 'disabled' }} value="{{ $product->sheet_type == '1' ? $product->sheet_value : '' }}">
                                        <input type="text" class="form-control" placeholder="Price" name="page_price" id="page_3" {{ $product->sheet_type == '1' ? '' : 'disabled' }} value="{{ $product->sheet_type == '1' ? $product->sheet_price : '' }}">
                                    </div>                                
                                </div>
                                <div class="col-sm-12 type">
                                    
                                    <div class="radio">
                                        <label class="hover" onclick="showInput(2)">
                                            <div class="iradio_flat-green hover" style="position: relative;">
                                                <input type="radio" class="flat" name="sheet_type" style="position: absolute; opacity: 0;" value="2"  {{ $product->sheet_type == '2' ? 'checked' : '' }}>
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> Spread 
                                        </label>
                                    </div>
                                    <div id="spread-div">
                                        <input type="text" class="form-control" placeholder="Display Name" value="Spread" name="spread_display" id="spread_1">
                                        <input type="text" class="form-control" placeholder="number of spread" name="spread_value"  id="spread_2" {{ $product->sheet_type == '2' ? '' : 'disabled' }}  value="{{ $product->sheet_type == '2' ? $product->sheet_value : '' }}">
                                        <input type="text" class="form-control" placeholder="Price" name="spread_price"  id="spread_3" {{ $product->sheet_type == '2' ? '' : 'disabled' }} value="{{ $product->sheet_type == '2' ? $product->sheet_price : '' }}">
                                    </div>                                
                                </div>
                                <div class="col-sm-12 type">
                                    <div class="radio">
                                        <label class="hover" onclick="showInput(3)">
                                            <div class="iradio_flat-green hover" style="position: relative;">
                                                <input type="radio" class="flat" name="sheet_type" style="position: absolute; opacity: 0;" value="3" {{ $product->sheet_type == '3' ? 'checked' : '' }}>
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> Quantity
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Display Name" value="Quantity" name="quantity_display" id="quantity_1">
                                    <input type="text" class="form-control" placeholder="Enter Quantity" name="quantity_value"  id="quantity_2" {{ $product->sheet_type == '3' ? '' : 'disabled' }} value="{{ $product->sheet_type == '3' ? $product->sheet_value : '' }}">
                                    <input type="text" class="form-control" placeholder="Price" name="quantity_price"  id="quantity_3" {{ $product->sheet_type == '3' ? '' : 'disabled' }} value="{{ $product->sheet_type == '3' ? $product->sheet_price : '' }}">
                                </div>  	
                            </div> 
                        </div>                       
                    </div>
                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                              <label for="shot_desc">Short Description</label>
                              <textarea type="text" class="form-control" name="shot_desc">{{$product->p_short_desc}}</textarea>
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
                              <input type="text" class="form-control" name="desc_title" value="{{$product->p_long_description_title}}">
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
                              <textarea type="text" class="form-control" name="long_desc" id="desc">{{$product->p_long_description}}</textarea>
                               @if($errors->has('long_desc'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('long_desc') }}</strong>
                                    </span>
                                @enderror
                            </div>                                                                                 
                        </div>
                    </div>                    
                    <div class="form-group">    	            	
                        {{ Form::submit('Save', array('class'=>'btn btn-success')) }}  
                        <a href="{{route('admin.product_single_view',['p_id'=>encrypt($product->id)])}}" class="btn btn-warning">Back</a>
                    </div>
	            	{{ Form::close() }}
                </div>
                @endif
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

<script>
    function showInput(sheet_type) {
    if(sheet_type == 1) {
        $('#page_2').prop('disabled', false);
        $('#page_3').prop('disabled', false);

        $('#spread_2').prop('disabled', true);
        $('#spread_3').prop('disabled', true);

        $('#quantity_2').prop('disabled', true);
        $('#quantity_3').prop('disabled', true);
    }

    if(sheet_type == 2) {
        $('#page_2').prop('disabled', true);
        $('#page_3').prop('disabled', true);

        $('#spread_2').prop('disabled', false);
        $('#spread_3').prop('disabled', false);

        $('#quantity_2').prop('disabled', true);
        $('#quantity_3').prop('disabled', true);
    }

    if(sheet_type == 3) {
        $('#page_2').prop('disabled', true);
        $('#page_3').prop('disabled', true);

        $('#spread_2').prop('disabled', true);
        $('#spread_3').prop('disabled', true);

        $('#quantity_2').prop('disabled', false);
        $('#quantity_3').prop('disabled', false);
    }
}
</script>
 @endsection