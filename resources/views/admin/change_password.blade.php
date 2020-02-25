@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
    <div class="col-md-3"></div>
	<div class="col-md-6">
	    <div class="x_panel">

	        <div class="x_title">
	            <h2>Change Password</h2>
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
	            	{{ Form::open(['method' => 'post','route'=>'admin.change_password']) }}
	            	<div class="well" style="overflow: auto">
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                <label for="name">Current Password</label>
                                <input type="password" class="form-control" name="current_password"  placeholder="Enter Current Password" id="name">
                                  @if($errors->has('current_password'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('current_password') }}</strong>
                                      </span>
                                  @enderror
                            </div> 
                            
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                <label for="name">New Password</label>
                                <input type="password" class="form-control" name="new_password"  placeholder="Enter New Password" id="name">
                                  @if($errors->has('new_password'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('new_password') }}</strong>
                                      </span>
                                  @enderror
                            </div> 

                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                <label for="name">Re Enter Password</label>
                                <input type="password" class="form-control" name="confirm_password"  placeholder="Re Enter Password" id="name">
                                  @if($errors->has('confirm_password'))
                                      <span class="invalid-feedback" role="alert" style="color:red">
                                          <strong>{{ $errors->first('confirm_password') }}</strong>
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

   
 @endsection