@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
        <a href="{{ route('admin.Happy_client_list') }}" class="btn btn-primary" style="float: right;">Client List</a>
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
	            	{{ Form::open(['method' => 'post','route'=>'admin.Happy_client_add','enctype'=>'multipart/form-data']) }}
                    
                    <div class="well" style="overflow: auto" id="happy_div">
                        <h3 style="text-align: center">Happy Client Section</h3>

                        <div class="form-row mb-10">

                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="happy_image">Image <span> ( Size Should Be 100 X 100 Pixels)</span></label>
                                <input type="file" class="form-control" name="happy_image[]"   required>
                            </div>

                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="happy_name">Name</label>
                                <input type="text" class="form-control" name="happy_name[]"  placeholder="Enter Name" required>
                            </div>

                        </div>

                        <div class="form-row mb-10" >

                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="happy_designation">Designation</label>
                                <input type="text" class="form-control" name="happy_designation[]"  placeholder="Enter Designation" required>
                            </div>

                            
                            <div class="col-md-10 col-sm-12 col-xs-12 mb-3">
                                <label for="happy_comment">Commet</label>
                                <textarea type="text" class="form-control" name="happy_comment[]"  placeholder="Enter Comment" required></textarea>
                            </div>

                            <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                                <label for="happy_comment"></label>
                                <button type="button" class="btn btn-warning" style="margin-top: 28px;" onclick="addHappy()">Add More</button>
                            </div>

                        </div>
                        
                    </div>

                    
                    <div class="form-group">    	            	
                        {{ Form::submit('Save', array('class'=>'btn btn-success')) }}  
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

 @section('script')
    <script>
        var count = 1;
        function addHappy() {
            var html = `<span id="more${count}">
                <div class="form-row mb-10">

                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                        <label for="happy_image">Image <span> ( Size Should Be 100 X 100 Pixels)</span></label>
                        <input type="file" class="form-control" name="happy_image[]"  required>
                    </div>


                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                        <label for="happy_name">Name</label>
                        <input type="text" class="form-control" name="happy_name[]"  placeholder="Enter Name" required>
                    </div>

                    </div>

                    <div class="form-row mb-10" >

                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                        <label for="happy_designation">Designation</label>
                        <input type="text" class="form-control" name="happy_designation[]"  placeholder="Enter Designation" required>
                    </div>


                    <div class="col-md-10 col-sm-12 col-xs-12 mb-3">
                        <label for="happy_comment">Commet</label>
                        <textarea type="text" class="form-control" name="happy_comment[]"  placeholder="Enter Comment" required></textarea>
                    </div>

                    <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                        <label for="happy_comment"></label>
                        <button type="button" class="btn btn-danger" onclick="happyRemove(${count})" style="margin-top: 28px;">Remove</button>
                    </div>

                </div>
            </span>`;
            $("#happy_div").append(html);
            count++;
        }

        function happyRemove(id) {
            $("#more"+id).remove();
        }
    </script>
 @endsection