@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
	    <div class="x_panel">

	        <div class="x_title">
	            <h2>Home Page Master</h2>
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
	            	{{ Form::open(['method' => 'put','route'=>'admin.home_update','enctype'=>'multipart/form-data']) }}
                    <div class="well" style="overflow: auto">
                        <h3 style="text-align: center">Logo Section</h3>

                        <div class="form-row mb-10">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                              <label for="header_logo">Header Logo</label>
                              <input type="file"  class="form-control" name="header_logo"></input>
                            </div>     
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="footer_logo">Footer Logo</label>
                                <input type="file"  class="form-control" name="footer_logo"></input>                              
                            </div> 

                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="banner">Banner</label>
                                <input type="file"  class="form-control" name="banner"></input>                              
                            </div>

                        </div>

                    </div>

                    <div class="well" style="overflow: auto">
                        <h3 style="text-align: center">Product Display Section</h3>

                        <div class="form-row mb-10">

                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="pro_heading">Heading</label>
                            <input type="text" class="form-control" name="pro_heading" value="{{$home_page->pro_cat_heading}}"  placeholder="Enter Heading" >
                            </div>

                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="pro_tag">Tag Line</label>
                                <input type="text" class="form-control" name="pro_tag"  placeholder="Enter Tag Line" value="{{$home_page->pro_cat_tag}}" >
                            </div>

                        </div>
                        
                        <div class="form-row mb-10">
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="pro_cat_1">1st Category Name</label>
                                <input type="text" class="form-control" name="pro_cat_1"  placeholder="Enter 1st Category Name" value="{{$home_page->pro_cat_1}}">
                            </div>

                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="pro_cat_2">2nd Category Name</label>
                                <input type="text" class="form-control" name="pro_cat_2"  placeholder="Enter 2nd Category Name" value="{{$home_page->pro_cat_2}}">
                            </div>

                        </div>

                        
                        <div class="form-row mb-10">
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="pro_cat_3">3rd Category Name</label>
                                <input type="text" class="form-control" name="pro_cat_3"  placeholder="Enter 3rd Category Name" value="{{$home_page->pro_cat_3}}">
                            </div>

                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="pro_cat_4">4th Category Name</label>
                                <input type="text" class="form-control" name="pro_cat_4"  placeholder="Enter 4th Category Name" value="{{$home_page->pro_cat_4}}">
                            </div>

                        </div>
                    </div>

                    <div class="well" style="overflow: auto">
                        <h3 style="text-align: center">Category Display Section</h3>

                        <div class="form-row mb-10">

                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="top_heading">Heading</label>
                                <input type="text" class="form-control" name="top_heading"  placeholder="Enter Heading" value="{{$home_page->top_cat_heading}}">
                            </div>

                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="top_tag">Tag Line</label>
                                <input type="text" class="form-control" name="top_tag"  placeholder="Enter Tag Line" value="{{$home_page->top_cat_tag}}">
                            </div>

                        </div>
                        
                    </div>

                    <div class="well" style="overflow: auto">
                        <h3 style="text-align: center">Video</h3>

                        <div class="form-row mb-10">

                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                <label for="video">Youtube Video Id</label>
                                <input type="text" class="form-control" name="video"  placeholder="Enter Youtube Video ID" value="{{$home_page->home_video}}">
                            </div>

                        </div>
                        
                    </div>

                    <div class="well" style="overflow: auto">
                        <h3 style="text-align: center">Order Section</h3>

                        <div class="form-row mb-10">

                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="order_heading">Heading</label>
                                <input type="text" class="form-control" name="order_heading"  placeholder="Enter Heading" value="{{$home_page->order_heading}}">
                            </div>

                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="order_tag">Tag Line</label>
                                <input type="text" class="form-control" name="order_tag"  placeholder="Enter Tag Line" value="{{$home_page->order_tag}}">
                            </div>

                        </div>
                        
                    </div>

                    <div class="well" style="overflow: auto">
                        <h3 style="text-align: center">Footer Section</h3>

                        <div class="form-row mb-10">

                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address"  placeholder="Enter Address" value="{{$home_page->footer_address}}">
                            </div>

                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone"  placeholder="Enter Phone Number" value="{{$home_page->footer_phone}}">
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email"  placeholder="Enter Email Id" value="{{$home_page->footer_email}}">
                            </div>

                        </div>
                        
                    </div>
                    
                    <div class="form-group">    	            	
                        {{ Form::submit('Update', array('class'=>'btn btn-success')) }}  
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