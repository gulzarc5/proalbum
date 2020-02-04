@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
  <div class="row">
	  <div class="col-md-12">
        <a href="{{ route('admin.product_list') }}" class="btn btn-primary" style="float: right;">Product List</a>
	    <div class="x_panel">

	        <div class="x_title">
              <h5 style="margin: 0;">Add Option Detail</h5>
	            <h2>Product 1 Name</h2>
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
                      <h4 style="border-bottom: 1px solid #dddd;padding-bottom: 5px;margin: 0 0 5px;">Option 1</h4>
                        <div class="form-row mb-10">
                            <div class="col-md-8 col-sm-12 col-xs-12 mb-3">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" name="name"  placeholder="Enter Product name" id="name">
                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror                                
                              <label for="img">Image</label>
                              <input type="file" onchange="readURL(this)" class="form-control" name="img">
                               @if($errors->has('img'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @enderror
                              <label for="name">Size</label>
                              <div class="option-size">
                                <h4>12 X 12</h4>
                                <input type="text" class="form-control" name="p_code"  placeholder="Enter Price">
                                  @if($errors->has('p_code'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('p_code') }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="option-size">
                                <h4>20 X 20</h4>
                                <input type="text" class="form-control" name="p_code"  placeholder="Enter Price">
                                  @if($errors->has('p_code'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('p_code') }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                              <img class="" src="{{asset('web/images/photos/9.jpg')}}" style="width: 150px">
                              <button type="button" style="margin-left: 50px;position: absolute;top: 13.3%;" class="btn btn-primary">Add More</button>
                            </div>                                                           
                        </div>
                        
                    </div>

                    <div class="form-group">    	            	
                        <button type="button" onclick="last()" class="btn btn-primary">Submit</button>
                        <a href="{{route('admin.product_add_form')}}" class="btn btn-warning">Back</a>
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

function last() {
    alert('Sorry We Are Working On this Page');
}
</script>
 @endsection