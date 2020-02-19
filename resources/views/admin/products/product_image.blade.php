@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">

    <div class="">
      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6" style="display: none;" id="add_new_image_div">
          <div class="x_panel">
              <h3>Add New Image</h3>
              <div class="x_content">
                <div class="row">                
                  {{ Form::open(['method' => 'post','route'=>'admin.product_more_image_add','enctype'=>'multipart/form-data']) }}
                    @if (isset($main_image) && !empty($main_image))
                      <input type="hidden" name="p_id" value="{{$main_image->id}}">
                    @endif
                    <div class="well" style="overflow: auto;">
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="name">Choose Image</label>
                                    <input type="file" class="form-control" name="img[]" placeholder="Enter Name" value="" id="name" multiple>
                                </div> 
                            </div>
                        </div>
                        
                        <div class="form-group">    	            	
                            <input class="btn btn-success" type="submit" value="Submit">
                            <a href="#"  class="btn btn-danger" onclick="imageAddDivClose()">Cancel</a>  
                        </div>
                  {{Form::close()}}
                </div>
              </div>
          </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Product Images</h2>
              <a href="#" class="btn btn-warning" style="float:right;" onclick="imageAddDivOpen()">+ Add More</a>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              @if (isset($main_image) && !empty($main_image))
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="product-image">
                      <img src="{{asset('assets/product/thumb/'.$main_image->image.'')}}" alt="..." />
                    
                  </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 imgview">
                  @if (isset($all_image) &&  !empty($all_image))
                      @foreach ($all_image as $item)
                        @if ($main_image->image == $item->images)
                            
                        @else
                        <div class="col-md-4 col-sm-4 col-xs-12 actualimg">   
                        <a class="removeitem" href="{{route('admin.product_image_delete',['id'=>encrypt($item->id)])}}"><i class="fa fa-trash"></i></a>                   
                            <a>
                              <img src="{{asset('assets/product/thumb/'.$item->images.'')}}" alt="..." />
                            </a>
                          <a href="{{route('admin.product_image_set_cover',['p_id'=>encrypt($main_image->id),'image_id'=>encrypt($item->id)])}}" class="btn btn-success imgaction">Choose as cover</a>                
                        </div> 
                        @endif
                       
                      @endforeach
                  @endif                  
                  
                </div>
              </div> 
              @endif   
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
  <!-- /page content -->

 @endsection

 @section('script')
     <script>
       function imageAddDivOpen() {
         $("#add_new_image_div").show();
       }
       function imageAddDivClose() {
         $("#add_new_image_div").hide();
       }
     </script>
 @endsection