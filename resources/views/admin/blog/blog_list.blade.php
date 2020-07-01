@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
        <a href="{{ route('admin.blog_add_form') }}" class="btn btn-primary" style="float: right;">Add Blog</a>
	    <div class="x_panel">
            <div class="x_title">
                <h2>Blog List</h2>
                <div class="clearfix"></div>
            </div>
            <div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="form-text-element">
                         @if (isset($blog) && count($blog) > 0)
                        @php
                            $count=1;
                        @endphp
                            @foreach ($blog as $key => $item)

                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit_blog', ['cid' => $item->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('admin.view_blog', ['id' => $item->id]) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('admin.delete_blog', ['id' => $item->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr> 
                            @endforeach
                        @endif
                      </tbody>
                    </table>
                </div>
            </div>
	    </div>
    </div>
    </div>

	<div class="col-md-2"></div>
</div>
 @endsection
 @section('script')

    <script type="text/javascript">
    $('#datatable').dataTable( {
    "pageLength": 50
    } );

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
 @endsection