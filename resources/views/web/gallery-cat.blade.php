  @extends('web.templet.master')

    {{-- META --}}
    @section('meta')
      <title>Premium Photobooks | Making Albums For South Africa</title>
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="">
      <style>.singlephoto {background: #fff;}</style>
    @endsection
      <!-- end header -->
       {{-- EXTRA STYLESHEET --}}
    @section('stylesheet')
        <link rel="stylesheet" type="text/css" href="{{asset('web/css/prettyPhoto.css')}}">
    @endsection
      <!-- end header -->

    @section('content')

    <section class="catagory-section gallery-container" style="background-color: #c1bebe36;">
        <div class="container">
            <div class="section-title text-center clearfix">
                <h4>Gallery</h4>
                <hr>
            </div><!-- end title -->

            <div class="row">
              @if (isset($album) && !empty($album))
              @foreach ($album as $item)
              <div class="col-md-4">
                <div class="singlephoto">
                  <a href="{{route('web.gallery_images',['id'=>encrypt($item->id)])}}">
                    <img src="{{asset('assets/gallery/thumb/'.$item->image.'')}}">
                    <h4 class="img-tittle text-center">{{$item->name}} </h4>
                    <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              @endforeach
              @endif
            </div>
        </div><!-- end container -->
      </section>

    @endsection
    @section('script')
        <!-- prettyPhoto STYLES -->
    @endsection 