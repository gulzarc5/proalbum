@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
  <div class="row">
	  <div class="col-md-12">
        <a href="{{ route('admin.product_list') }}" class="btn btn-primary" style="float: right;">Product List</a>
	    <div class="x_panel">

	        <div class="x_title">
              <h5 style="margin: 0;">Add Option Detail</h5>
              @if (isset($product))
                <h2>{{$product->name}}</h2>
              @endif
	            
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
                    {{ Form::open(['method' => 'put','route'=>'admin.categoryInsert','enctype'=>'multipart/form-data']) }}
                    @if (isset($option) && !empty($option))
                        @foreach ($option as $item)
                            {{-- <div class="well" style="overflow: auto">
                                <h4 style="border-bottom: 1px solid #dddd;padding-bottom: 5px;margin: 0 0 5px;">{{$item->name}}</h4>
                                
                                <div class="form-row mb-10">
                                    <div class="col-md-8 col-sm-12 col-xs-12 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name"  placeholder="Enter Product name" id="name">
                                        @if($errors->has('name'))
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @enderror                                
                                    <label for="img">Image</label>
                                    <input type="file" onchange="readURL(this)" class="form-control" name="img">
                                    @if($errors->has('img'))
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $errors->first('img') }}</strong>
                                            </span>
                                        @enderror
                                    <label for="name">Size</label>
                                    <div class="option-size">
                                        <h4>12 X 12</h4>
                                        <input type="text" class="form-control" name="p_code"  placeholder="Enter Price">
                                        @if($errors->has('p_code'))
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $errors->first('p_code') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="option-size">
                                        <h4>20 X 20</h4>
                                        <input type="text" class="form-control" name="p_code"  placeholder="Enter Price">
                                        @if($errors->has('p_code'))
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $errors->first('p_code') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                    <img class="" src="{{asset('web/images/photos/9.jpg')}}" style="width: 150px">
                                    <button type="button" style="margin-left: 50px;position: absolute;top: 13.3%;" class="btn btn-primary">Add More</button>
                                    </div>                                                           
                                </div>                                                    
                            </div> --}}
                        @endforeach
                    @endif
	            	    
                    <div class="form-group">    	            	
                        <button type="button" onclick="last()" class="btn btn-primary">Submit</button>
                        <a href="{{route('admin.product_add_form')}}" class="btn btn-warning">Back</a>
                    </div>
	            	{{ Form::close() }}
	            </div>
	        </div>
	    </div>
        <div class="x_panel">
          <div class="x_title">
            <h2> Add Option Detail</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div style="margin-top: 30px;" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" role="tab" id="home-tab" data-toggle="tab" aria-expanded="true">Color</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Page</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Paper</a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <div class="well" style="overflow: auto">
                      <h4 style="border-bottom: 1px solid #dddd;padding-bottom: 5px;margin: 0 0 5px;">Edit</h4>
                      
                      <div class="form-row mb-10">
                          <div class="col-md-8 col-sm-12 col-xs-12 mb-30">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name"  placeholder="Enter Product name" id="name">                             
                            <label for="img">Image</label>
                            <input type="file" onchange="readURL(this)" class="form-control" name="img">
                            <label for="name">Size</label>
                            <div class="option-size">
                                <h4>12 X 12</h4>
                                <input type="text" class="form-control" name="p_code"  placeholder="Enter Price">
                            </div>
                            <div class="option-size">
                                <h4>20 X 20</h4>
                                <input type="text" class="form-control" name="p_code"  placeholder="Enter Price">
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <img class="" src="{{asset('web/images/photos/9.jpg')}}" style="width: 150px">
                          </div> 
                          <div class="form-group col-sm-12">                    
                              <button type="button" onclick="last()" class="btn btn-primary">Submit</button>
                              <a href="{{route('admin.product_add_form')}}" class="btn btn-warning">Cancel</a>
                          </div> 
                      </div>                                                   
                  </div>
                  <div class="x_title" style="margin-bottom: 0;border-bottom: 0px solid #E6E9ED;">
                    <h4 style="width: 70%;float: left;"><strong>Color List</strong></h4>
                    <button class="btn btn-sm btn-info btn-add-option">+ Add More</button>
                  </div>
                  <div class="x_content">

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="wd-150">Name</th>
                          <th class="option-size-price"><b>Size</b><b>Price</b></th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="wd-150">Mark</td>
                          <td class="wd-200">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                          </td>
                          <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                        <tr>
                          <td class="wd-150"><input type="text" name="" value="Jacob" class="name-input"></td>
                          <td class="wd-300">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ <input type="text" value="100"></b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ <input type="text" value="100"></b>
                            </div>
                          </td>
                          <td>
                            <img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon" style="float: left;">
                            <input type="file" onchange="readURL(this)" class="form-control" name="img" style="width: 50%;float: left;margin-left: 20px">
                          </td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                        <tr>
                          <td class="wd-150">Larry</td>
                          <td class="wd-300">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                          </td>
                          <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                        <tr>
                          <td class="wd-150">Jacob</td>
                          <td class="wd-300">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                          </td>
                          <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                        <tr>
                          <td class="wd-150">Mark</td>
                          <td class="wd-300">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                          </td>
                          <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <div class="well" style="overflow: auto">
                      <h4 style="border-bottom: 1px solid #dddd;padding-bottom: 5px;margin: 0 0 5px;">Page Edit</h4>
                      
                      <div class="form-row mb-10">
                          <div class="col-md-8 col-sm-12 col-xs-12 mb-30">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name"  placeholder="Enter Product name" id="name">                             
                            <label for="img">Image</label>
                            <input type="file" onchange="readURL(this)" class="form-control" name="img">
                            <label for="name">Size</label>
                            <div class="option-size">
                                <h4>12 X 12</h4>
                                <input type="text" class="form-control" name="p_code"  placeholder="Enter Price">
                            </div>
                            <div class="option-size">
                                <h4>20 X 20</h4>
                                <input type="text" class="form-control" name="p_code"  placeholder="Enter Price">
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <img class="" src="{{asset('web/images/photos/9.jpg')}}" style="width: 150px">
                          </div> 
                          <div class="form-group col-sm-12">                    
                              <button type="button" onclick="last()" class="btn btn-primary">Submit</button>
                              <a href="{{route('admin.product_add_form')}}" class="btn btn-warning">Cancel</a>
                          </div> 
                      </div>                                                   
                  </div>
                  <div class="x_title" style="margin-bottom: 0;border-bottom: 0px solid #E6E9ED;">
                    <h4 style="width: 70%;float: left;"><strong>Page List</strong></h4>
                    <button class="btn btn-sm btn-info btn-add-option">+ Add More</button>
                  </div>
                  <div class="x_content">

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="wd-150">Name</th>
                          <th class="option-size-price"><b>Size</b><b>Price</b></th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="wd-150">Mark</td>
                          <td class="wd-200">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                          </td>
                          <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                        <tr>
                          <td class="wd-150"><input type="text" name="" value="Jacob" class="name-input"></td>
                          <td class="wd-300">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ <input type="text" value="100"></b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ <input type="text" value="100"></b>
                            </div>
                          </td>
                          <td>
                            <img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon" style="float: left;">
                            <input type="file" onchange="readURL(this)" class="form-control" name="img" style="width: 50%;float: left;margin-left: 20px">
                          </td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                        <tr>
                          <td class="wd-150">Larry</td>
                          <td class="wd-300">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                          </td>
                          <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                        <tr>
                          <td class="wd-150">Jacob</td>
                          <td class="wd-300">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                          </td>
                          <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                        <tr>
                          <td class="wd-150">Mark</td>
                          <td class="wd-300">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                          </td>
                          <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                  <div class="well" style="overflow: auto">
                      <h4 style="border-bottom: 1px solid #dddd;padding-bottom: 5px;margin: 0 0 5px;">Paper Edit</h4>
                      
                      <div class="form-row mb-10">
                          <div class="col-md-8 col-sm-12 col-xs-12 mb-30">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name"  placeholder="Enter Product name" id="name">                             
                            <label for="img">Image</label>
                            <input type="file" onchange="readURL(this)" class="form-control" name="img">
                            <label for="name">Size</label>
                            <div class="option-size">
                                <h4>12 X 12</h4>
                                <input type="text" class="form-control" name="p_code"  placeholder="Enter Price">
                            </div>
                            <div class="option-size">
                                <h4>20 X 20</h4>
                                <input type="text" class="form-control" name="p_code"  placeholder="Enter Price">
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <img class="" src="{{asset('web/images/photos/9.jpg')}}" style="width: 150px">
                          </div> 
                          <div class="form-group col-sm-12">                    
                              <button type="button" onclick="last()" class="btn btn-primary">Submit</button>
                              <a href="{{route('admin.product_add_form')}}" class="btn btn-warning">Cancel</a>
                          </div> 
                      </div>                                                   
                  </div>
                  <div class="x_title" style="margin-bottom: 0;border-bottom: 0px solid #E6E9ED;">
                    <h4 style="width: 70%;float: left;"><strong>Paper List</strong></h4>
                    <button class="btn btn-sm btn-info btn-add-option">+ Add More</button>
                  </div>
                  <div class="x_content">

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="wd-150">Name</th>
                          <th class="option-size-price"><b>Size</b><b>Price</b></th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="wd-150">Mark</td>
                          <td class="wd-200">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                          </td>
                          <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                        <tr>
                          <td class="wd-150"><input type="text" name="" value="Jacob" class="name-input"></td>
                          <td class="wd-300">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ <input type="text" value="100"></b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ <input type="text" value="100"></b>
                            </div>
                          </td>
                          <td>
                            <img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon" style="float: left;">
                            <input type="file" onchange="readURL(this)" class="form-control" name="img" style="width: 50%;float: left;margin-left: 20px">
                          </td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                        <tr>
                          <td class="wd-150">Larry</td>
                          <td class="wd-300">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                          </td>
                          <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                        <tr>
                          <td class="wd-150">Jacob</td>
                          <td class="wd-300">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                          </td>
                          <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                        <tr>
                          <td class="wd-150">Mark</td>
                          <td class="wd-300">
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                            <div class="option-size-price">
                              <b>12 x 12</b>
                              <b>$ 100</b>
                            </div>
                          </td>
                          <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                          <td><button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
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
});

function last() {
    alert('Sorry We Are Working On this Page');
}
</script>
 @endsection