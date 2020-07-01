@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
	    <div class="x_panel">
	        
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
	            	{{ Form::open(['method' => 'post','route'=>'admin.about_us_add']) }}


                    <div class="well" style="overflow: auto">
                        <h1 style="text-align: center">About Us Page</h1>
                        <div class="form-row mb-10">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                              <label for="about">Long Description</label>
                            <textarea type="text" class="form-control" name="about" id="desc">{{$about->about_us}}</textarea>
                               @if($errors->has('about'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                @enderror
                            </div>                                                                                 
                        </div>
                    </div>                    
                    <div class="form-group">    	            	
                        {{ Form::submit('Update', array('class'=>'btn btn-success')) }}  
                    {{-- <a href="{{route('admin.products.add_product_option')}}" class="btn btn-primary">Next</a> --}}
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

    $('#sheet_type_radio_btn').click(function(){
        alert('gjyug');
    });
});
</script>

<script src="{{ asset('admin/admin_product.js')}}"></script>
 @endsection