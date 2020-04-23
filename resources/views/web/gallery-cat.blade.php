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
              <div class="col-md-4">
                <div class="singlephoto">
                  <a href="{{route('web.gallery')}}">
                    <img src="{{asset('web/upload/shop_01.jpg')}}">
                    <h4 class="img-tittle text-center">Tittle 01 </h4>
                    <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="singlephoto">
                  <a href="{{route('web.gallery')}}">
                    <img src="{{asset('web/upload/shop_02.jpg')}}">
                    <h4 class="img-tittle text-center">Tittle 01 </h4>
                    <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="singlephoto">
                  <a href="{{route('web.gallery')}}">
                    <img src="{{asset('web/upload/shop_03.jpg')}}">
                    <h4 class="img-tittle text-center">Tittle 01 </h4>
                    <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="singlephoto">
                  <a href="{{route('web.gallery')}}">
                    <img src="{{asset('web/upload/shop_04.jpg')}}">
                    <h4 class="img-tittle text-center">Tittle 01 </h4>
                    <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="singlephoto">
                  <a href="{{route('web.gallery')}}">
                    <img src="{{asset('web/upload/shop_05.jpg')}}">
                    <h4 class="img-tittle text-center">Tittle 01 </h4>
                    <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="singlephoto">
                  <a href="{{route('web.gallery')}}">
                    <img src="{{asset('web/upload/shop_06.jpg')}}">
                    <h4 class="img-tittle text-center">Tittle 01 </h4>
                    <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="singlephoto">
                  <a href="{{route('web.gallery')}}">
                    <img src="{{asset('web/upload/shop_07.jpg')}}">
                    <h4 class="img-tittle text-center">Tittle 01 </h4>
                    <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="singlephoto">
                  <a href="{{route('web.gallery')}}">
                    <img src="{{asset('web/upload/shop_08.jpg')}}">
                    <h4 class="img-tittle text-center">Tittle 01 </h4>
                    <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="singlephoto">
                  <a href="{{route('web.gallery')}}">
                    <img src="{{asset('web/upload/shop_09.jpg')}}">
                    <h4 class="img-tittle text-center">Tittle 01 </h4>
                    <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="singlephoto">
                  <a href="{{route('web.gallery')}}">
                    <img src="{{asset('web/upload/shop_10.jpg')}}">
                    <h4 class="img-tittle text-center">Tittle 01 </h4>
                    <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="singlephoto">
                  <a href="{{route('web.gallery')}}">
                    <img src="{{asset('web/upload/shop_11.jpg')}}">
                    <h4 class="img-tittle text-center">Tittle 01 </h4>
                    <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="singlephoto">
                  <a href="{{route('web.gallery')}}">
                    <img src="{{asset('web/upload/shop_12.jpg')}}">
                    <h4 class="img-tittle text-center">Tittle 01 </h4>
                    <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
        </div><!-- end container -->
      </section>

    @endsection
    @section('script')
        <!-- prettyPhoto STYLES -->
    @endsection 