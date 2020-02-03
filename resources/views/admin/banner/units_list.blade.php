@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
        <a href="{{ route('admin.units_add_form') }}" class="btn btn-primary" style="float: right;">Add Units</a>
	    <div class="x_panel">
            <div class="x_title">
                <h2>Units List</h2>
                <div class="clearfix"></div>
            </div>
            <div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>Units</th>
                            <th>Option</th>
                        </tr>
                      </thead>
                      <tbody class="form-text-element">
                         @if (count($units) > 0)

                            @foreach ($units as $key => $item)

                                <tr>
                                    <td>{{ $item->units }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit_units', ['units_id' => encrypt($item->id)]) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-pencil" style="color: #3273F4; font-size: 16px;"></i>
                                        </a>
                                        <a href="{{ route('admin.delete_units', ['units_id' => encrypt($item->id)]) }}" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fa fa-trash-o" style="color: #3273F4; font-size: 16px; margin-left: 10px;"></i>
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