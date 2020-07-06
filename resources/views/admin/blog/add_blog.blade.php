@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
        <a href="{{ route('admin.blog_list') }}" class="btn btn-primary" style="float: right;">Blog List</a>
	    <div class="x_panel">

	        <div class="x_title">
	            <h2>Add Blog Form</h2>
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
	            	{{ Form::open(['method' => 'post','route'=>'admin.add_blog','enctype'=>'multipart/form-data']) }}
	            	<div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="title">Blog Title</label>
                                <input type="text" class="form-control" name="title"  placeholder="Enter Blog Title" id="name" value="{{old('title')}}">
                                  @if($errors->has('title'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('title') }}</strong>
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

                              <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="banner">Blog Banner</label>
                                <input type="file" onchange="readURL(this)" class="form-control" name="banner" value="{{old('banner')}}"></input>
                                <span>Image Size Should Be 1150 X 400 Pixels</span>
                                 @if($errors->has('banner'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('img') }}</strong>
                                      </span>
                                  @enderror
                              </div>             
                        </div>
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                              <label for="desc">Blog Body</label>
                                <textarea type="text" class="form-control" name="body" id="desc">{{old('body')}}</textarea>
                               @if($errors->has('body'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('body') }}</strong>
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
<script src="{{asset('admin/ckeditor4/plugins/videoembed')}}"></script>
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