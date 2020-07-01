@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
        <a href="{{ route('admin.blog_list') }}" class="btn btn-primary" style="float: right;">Blog List</a>
	    <div class="x_panel">

	        <div class="x_title">
	            <h2>{{$blog->title}}</h2>
	            <div class="clearfix"></div>
	        </div>
	        <div>
	            <div class="x_content">
                    <div class="col-md-12" style="text-align: center">
                    <img class="img-responsive" src="{{asset('assets/blog/'.$blog->image.'')}}" alt="">
                    </div>
                    <div class="col-md-12" style="text-align: center">
                        {!!$blog->body!!}
                    </div>
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