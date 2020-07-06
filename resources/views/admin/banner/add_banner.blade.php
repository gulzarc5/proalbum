@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">

                <div class="x_title">
                    <h2>Add Slider Image</h2>
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
                        {{ Form::open(['method' => 'post','route'=>'admin.add_banner','enctype'=>'multipart/form-data']) }}
                        <div class="well" style="overflow: auto">
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="banner">Image (1366*500)</label>
                                    <input type="file" class="form-control" name="banner"  placeholder="Enter Banner" id="banner">
                                    @if($errors->has('banner'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('banner') }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                            </div>

                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control" name="url"  placeholder="Enter URL" id="banner">
                                    @if($errors->has('url'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('url') }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                            </div>
                        </div>
                        
                        <div class="form-group">    	            	
                            {{ Form::submit('Submit', array('class'=>'btn btn-success')) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Slider Images</h2>
                    <div class="clearfix"></div>
                </div>
                <div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Slider</th>
                                <th>url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="form-text-element">
                             @if (isset($slider) && !empty($slider))
                             @php
                                 $count = 1;
                             @endphp
                                @foreach ($slider as $item)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td><img src="{{asset('assets/banner/thumb/'.$item->slider.'')}}"/></td>
                                        <td>
                                            <a href="{{$item->url}}" target="_blank">Click to View Link</a>
                                        </td>
                                        <td>
                                            @if ($item->status == '1')
                                                <button class="btn btn-sm btn-success">Enabled</button>
                                            @else
                                            <button class="btn btn-sm btn-warning">Disabled</button>
                                            @endif
                                        </td>
                                        <td>
                                            
                                            @if ($item->status == '1')
                                                <a class="btn btn-sm btn-warning" href="{{route('admin.update_banner_status',['banner_id'=>$item->id,'status'=>'2'])}}">Disable</a>
                                            @else
                                                <a class="btn btn-sm btn-info" href="{{route('admin.update_banner_status',['banner_id'=>$item->id,'status'=>'1'])}}">Enable</a>
                                            @endif      
                                            <a href="{{route('admin.edit_banner',['id'=>$item->id])}}" class="btn btn-sm btn-warning">Edit</a>                                      
                                        <a class="btn btn-sm btn-danger" href="{{route('admin.delete_banner',['id'=>$item->id])}}">Delete</a>
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
 