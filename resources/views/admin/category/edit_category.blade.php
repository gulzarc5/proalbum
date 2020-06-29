@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
        <a href="{{ route('admin.category_list') }}" class="btn btn-primary" style="float: right;">Category List</a>
	    <div class="x_panel">

	        <div class="x_title">
	            <h2>Edit Category</h2>
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
	            	{{ Form::open(['method' => 'put', 'route'=>'admin.update_category','enctype'=>'multipart/form-data']) }}
                    <input type="hidden" value="{{encrypt($category_record->id)}}" name="category_id">
	            	<div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                <label for="name">Category name</label>
                                <input type="text" value="{{ $category_record->name }}" class="form-control" name="name"  placeholder="Enter Product name" id="name">
                                  @if($errors->has('name'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                <label for="slug">URL Slug</label>
                                <input type="text" class="form-control" value="{{ $category_record->url_slug }}" id="slug" name="slug"  placeholder="Enter Tag Name" readonly>
                                @if($errors->has('slug'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                <label for="sort">Sort</label>
                                <input type="number" min="1" class="form-control" id="sort" name="sort" placeholder="Enter Sort" value="{{$category_record->sort}}">
                                @if($errors->has('slug'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('sort') }}</strong>
                                    </span>
                                @enderror
                            </div>  
                                                        
                        </div>
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                              <label for="desc">Category Description</label>
                              <textarea type="text" class="form-control" name="desc" id="desc">{{ $category_record->description }}</textarea>
                               @if($errors->has('desc'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                @enderror
                            </div>                                                                                 
                        </div>
                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                              <label for="img">Image</label>
                              <input type="file"  class="form-control" name="img"></input>
                               @if($errors->has('img'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @enderror
                            </div>       
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <img src="{{ asset('assets/category/thumbnail/'.$category_record->image) }}" class="img-responsive" height="300px" id="preview" style="padding: 12px;">
                            </div>                                                                                 
                        </div>

                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                              <label for="img">Page Banner</label>
                              <input type="file"  class="form-control" name="page_banner"></input>
                               @if($errors->has('img'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @enderror
                            </div>       
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <img src="{{ asset('assets/category/thumbnail/'.$category_record->page_banner) }}" class="img-responsive" height="300px" id="preview" style="padding: 12px;">
                            </div>                                                                                 
                        </div>
                    </div>

                    {{-- <div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="page_title">Page Title</label>
                                <input type="text" class="form-control" value="{{ $category_record->seo_page_title }}" name="page_title"  placeholder="Enter Product Title" >
                                  @if($errors->has('page_title'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('page_title') }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="meta_desc">Meta Description</label>
                                <input type="text" class="form-control" value="{{ $category_record->seo_meta_desc }}" name="meta_desc"  placeholder="Enter Tag Name" >
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
                              <textarea type="text" class="form-control" name="meta_tag" id="desc">{{ $category_record->seo_meta_keward }}</textarea>
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
                        <a href="{{ route('admin.category_list') }}" class="btn btn-default">Cancel</a> 
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