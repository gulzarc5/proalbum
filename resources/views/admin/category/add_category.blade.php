@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
        <a href="{{ route('admin.category_list') }}" class="btn btn-primary" style="float: right;">Category List</a>
	    <div class="x_panel">

	        <div class="x_title">
	            <h2>Add Category</h2>
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
                                <label for="name">Category name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Enter Product name" id="name">
                                  @if($errors->has('name'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="slug">URL Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"  placeholder="Enter Tag Name" readonly>
                                @if($errors->has('slug'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @enderror
                            </div>                   
                        </div>
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                              <label for="desc">Category Description</label>
                              <textarea type="text" class="form-control" name="desc" id="desc"></textarea>
                               @if($errors->has('desc'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                @enderror
                            </div>                                                                                 
                        </div>
                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                              <label for="img">Category Banner</label>
                              <input type="file" onchange="readURL(this)" class="form-control" name="img"></input>
                              <span>Image Size Should Be 500 X 600 Pixels</span>
                               @if($errors->has('img'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @enderror
                            </div>   
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="page_banner">Category Page Banner</label>
                                <input type="file" onchange="readURL(this)" class="form-control" name="page_banner"></input>
                                <span>Image Size Should Be 2000 X 400 Pixels</span>
                                 @if($errors->has('page_banner'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('page_banner') }}</strong>
                                      </span>
                                  @enderror
                            </div>   
                        </div>
                    </div>

                    {{-- <div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="page_title">Page Title</label>
                                <input type="text" class="form-control" name="page_title"  placeholder="Enter Product Title" >
                                  @if($errors->has('page_title'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('page_title') }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="meta_desc">Meta Description</label>
                                <input type="text" class="form-control" name="meta_desc"  placeholder="Enter Tag Name" >
                                @if($errors->has('meta_desc'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('meta_desc') }}</strong>
                                    </span>
                                @enderror
                            </div>  
                                                        
                        </div>
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                              <label for="meta_tag">Meta Tag</label>
                              <textarea type="text" class="form-control" name="meta_tag" id="desc"></textarea>
                              @if($errors->has('meta_tag'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('meta_tag') }}</strong>
                                    </span>
                                @enderror
                            </div>                                                                                 
                        </div>
                    </div> --}}

                    
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

        $('#slug').val(str.toLowerCase());
    });
});
</script>
 @endsection