@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
        
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$home_page->pro_cat_2}} List</h2>
                    <div class="clearfix"></div>
                </div>
                <div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Product Code</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="form-text-element">
                             @if (isset($second_cat) && !empty($second_cat))
                             @php
                                 $count = 1;
                             @endphp
                                @foreach ($second_cat as $item)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$item->product_code}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>                                   
                                            <a class="btn btn-sm btn-danger" href="{{route('admin.product_home_page_cat_update',['id'=>$item->id,'status'=>'1','type'=>'2'])}}">Remove</a>
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
    });
</script>
 @endsection
 