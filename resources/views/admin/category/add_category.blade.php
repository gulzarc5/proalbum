@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12" style="margin-top:50px;">
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
	            	{{ Form::open(['method' => 'post','route'=>'admin.categoryInsert','enctype'=>'multipart/form-data']) }}
	            	<div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="name">Category name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Enter Product name" >
                                  @if($errors->has('name'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="slug">URL Slug</label>
                                <input type="text" class="form-control" name="slug"  placeholder="Enter Tag Name" >
                                @if($errors->has('slug'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @enderror
                            </div>  
                                                        
                        </div>
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                              <label for="name">Category Description</label>
                              <textarea type="text" class="form-control" name="desc" id="desc"></textarea>
                            </div>                                                                                 
                        </div>
                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                              <label for="name">Image</label>
                              <input type="file" onchange="readURL(this)" class="form-control" name="desc"></input>
                            </div>       
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <img src="" height="300px" id="preview" style="padding: 12px;">
                            </div>                                                                                 
                        </div>
                    </div>

                    <div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="name">Page Title</label>
                                <input type="text" class="form-control" name="name"  placeholder="Enter Product name" >
                                  @if($errors->has('name'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="slug">Meta Description</label>
                                <input type="text" class="form-control" name="slug"  placeholder="Enter Tag Name" >
                                @if($errors->has('slug'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @enderror
                            </div>  
                                                        
                        </div>
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                              <label for="name">Meta Tag</label>
                              <textarea type="text" class="form-control" name="desc" id="desc"></textarea>
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
 {{-- <script src="{{ asset('admin/ckeditor5/ckeditor.js')}}"></script> --}}
 <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
 <script>
    ClassicEditor
            .create( document.querySelector( '#desc' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
 {{-- <script>
    ClassicEditor
        .create( document.querySelector( '#desc' ))
        .then( editor => {
            editor.ui.view.editable.editableElement.style.height = '300px';
        })
        .catch( error => {
            console.error( error );
        });
</script> --}}

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