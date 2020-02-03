@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
        <a href="{{ route('admin.categoryAdd') }}" class="btn btn-primary" style="float: right;">Add Category</a>
	    <div class="x_panel">
            <div class="x_title">
                <h2>Category List</h2>
                <div class="clearfix"></div>
            </div>
            <div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                      </thead>
                      <tbody class="form-text-element">
                         @if (count($categories) > 0)

                            @foreach ($categories as $key => $item)

                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <a href="{{ route('admin.update_category_status', ['category_id' => encrypt($item->id), 'status' => encrypt(2)]) }}" style="width: 65px;" class="btn btn-xs btn-success">Active</a>
                                        @else
                                            <a href="{{ route('admin.update_category_status', ['category_id' => encrypt($item->id), 'status' => encrypt(1)]) }}" style="width: 65px;" class="btn btn-xs btn-warning">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edit_category', ['category_id' => encrypt($item->id)]) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-pencil" style="color: #3273F4; font-size: 18px;"></i>
                                        </a>
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