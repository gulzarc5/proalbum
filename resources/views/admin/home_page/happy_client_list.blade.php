@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
        
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$home_page->happy_heading}} List</h2>
                    <div class="clearfix"></div>
                </div>
                <div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Designation</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="form-text-element">
                             @if (isset($happy) && !empty($happy))
                             @php
                                 $count = 1;
                             @endphp
                                @foreach ($happy as $item)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$item->name}}</td>
                                        <td><img src="{{asset('assets/home_page/'.$item->image.'')}}" alt=""></td>
                                        <td>{{$item->designation}}</td>
                                        <td>{{$item->comment}}</td>
                                        <td>                                   
                                            <a class="btn btn-sm btn-danger" href="{{route('admin.Happy_delete',['id'=>$item->id])}}">Remove</a>
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
 