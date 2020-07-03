@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
	<div class="col-md-12">
	    <div class="x_panel">
            <div class="x_title">
                <h2>Order Contacts</h2>
                <div class="clearfix"></div>
            </div>
            <div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Date</th>
                        </tr>
                      </thead>
                      <tbody class="form-text-element">
                         @if (isset($contact) && count($contact) > 0)
                        @php
                            $count=1;
                        @endphp
                            @foreach ($contact as $key => $item)

                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td>{{ $item->created_at }}</td>
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