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
                @if (isset($album_id) && !empty($album_id))
                <div class="row">                
                  {{ Form::open(['method' => 'post','route'=>'admin.add_image','enctype'=>'multipart/form-data']) }}
                    <input type="hidden" name="album_id" value="{{$album_id}}">
                    <div class="well" style="overflow: auto;">
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="name">Choose Image</label>
                                    <input type="file" class="form-control" name="img" placeholder="Enter Name" value="" id="name" multiple>
                                </div> 
                            </div>

                            <div class="form-row mb-10">
                              <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                  <label for="name">Caption</label>
                                  <input type="text" class="form-control" name="name" placeholder="Enter Album Name" value="" id="name" multiple>
                              </div> 
                            </div>
                        </div>
                        
                        <div class="form-group">    	            	
                            <input class="btn btn-success" type="submit" value="Submit">
                            <a href="#"  class="btn btn-danger" onclick="imageAddDivClose()">Cancel</a>  
                        </div>
                  {{Form::close()}}
                </div>
                @endif
              </div>
          </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Gallery Images Of Album</h2>
              <a href="#" class="btn btn-warning" style="float:right;" onclick="imageAddDivOpen()">+ Add More</a>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 imgview">
                  @if (isset($images) &&  !empty($images))
                      @foreach ($images as $item)
              
                        <div class="col-md-4 col-sm-4 col-xs-12 actualimg">   
                        <a class="removeitem" href="{{route('admin.delete_image',['id'=>$item->id])}}"><i class="fa fa-trash"></i></a>                   
                            <a>
                              <img src="{{asset('assets/gallery/thumb/'.$item->image.'')}}" alt="..." />
                            </a>
                          {{-- <a href="{{route('admin.add_image_form',['album_id'=>$item->id])}}" class="btn btn-success imgaction">Add Image In Album</a>        --}}
                          <h3 style="text-align: center">{{$item->caption}}</h3>         
                        </div> 
                       
                      @endforeach
                  @endif                  
                  
                </div>
              </div> 
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