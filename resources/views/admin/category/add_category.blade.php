@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
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
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                              <label for="name">Product name</label>
                              <input type="text" class="form-control" name="name"  placeholder="Enter Product name" >
                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                              <label for="tag_name">Tag Name</label>
                              <input type="text" class="form-control" name="tag_name"  placeholder="Enter Tag Name" >

                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                              <label for="size_wearing">Size Wearing</label>
                              <input type="text" class="form-control" name="size_wearing"  placeholder="Enter Size Wearing" >
                            </div> 
                                                        
                        </div>
                        <div class="form-row mb-10">
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                              <label for="name">Product name</label>
                              <input type="text" class="form-control" name="name"  placeholder="Enter Product name" >
                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                              <label for="tag_name">Tag Name</label>
                              <input type="text" class="form-control" name="tag_name"  placeholder="Enter Tag Name" >

                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                              <label for="size_wearing">Size Wearing</label>
                              <input type="text" class="form-control" name="size_wearing"  placeholder="Enter Size Wearing" >
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

	<div class="col-md-2"></div>
	</div>


 @endsection