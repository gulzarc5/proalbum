@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12" style="margin-top:50px;">
    	    <div class="x_panel">
    	        <div class="x_title">
    	            <h2>Order List</h2>
    	            <div class="clearfix"></div>
    	        </div>
    	        <div>
    	            <div class="x_content">
                        <table id="size_list" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th style="text-align: center;">Sl</th>
                              <th style="text-align: center;">User Name</th>
                              <th style="text-align: center;">User Email</th>
                              <th style="text-align: center;">Total Item</th>                              
                              <th style="text-align: center;">Sub Total</th>                              
                              <th style="text-align: center;">VAT @ 15%</th>
                              <th style="text-align: center;">Total Amount</th>
                              <th style="text-align: center;">Status</th>
                              <th style="text-align: center;">Action</th>
                            </tr>
                          </thead>
                          <tbody>                       
                          </tbody>
                        </table>
    	            </div>
    	        </div>
    	    </div>
    	</div>
    </div>
	</div>


 @endsection

@section('script')
     
     <script type="text/javascript">
         $(function () {
    
            var table = $('#size_list').DataTable({                
                iDisplayLength: 50,
                processing: true,
                serverSide: true,
                ajax: "{{route('admin.order_list_ajax')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'user_name', name: 'user_name',searchable: true},
                    {data: 'user_email', name: 'user_email' ,searchable: true}, 
                    {data: 'total_quantity', name: 'total_quantity',searchable: true},  
                    {data: 'sub_total', name: 'sub_total',searchable: true},  
                    {data: 'vat', name: 'vat',searchable: true},           
                    {data: 'total_price', name: 'total_price',searchable: true},           
                    {data: 'status_tab', name: 'status_tab',orderable: false, searchable: false},                    
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            
        });
     </script>
    
 @endsection