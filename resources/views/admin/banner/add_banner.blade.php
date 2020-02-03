@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
        <a href="{{ route('admin.units_list') }}" class="btn btn-primary" style="float: right;">Units List</a>
	    <div class="x_panel">

	        <div class="x_title">
	            <h2>Add Banner</h2>
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
	            	{{ Form::open(['method' => 'post','route'=>'admin.add_banner']) }}
	            	<div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Enter Name" value="{{ old('name') }}" id="name">
                                  @if($errors->has('name'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @enderror
                              </div> 

                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="banner">Banner</label>
                                <input type="file" class="form-control" name="banner"  placeholder="Enter Banner" id="banner">
                                  @if($errors->has('banner'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('banner') }}</strong>
                                      </span>
                                  @enderror
                              </div> 
                        </div>
                    </div>
                    
                    <div class="form-group">    	            	
                        {{ Form::submit('Submit', array('class'=>'btn btn-success')) }}
                        <a href="{{ route('admin.units_list') }}" class="btn btn-default">Cancel</a>  
                    </div>
	            	{{ Form::close() }}
	            </div>
	        </div>
	    </div>
    </div>
    </div>

	<div class="col-md-2"></div>
</div>
 @endsection
 