  @extends('web.templet.master')

    {{-- META --}}
    @section('meta')
      <title>Premium Photobooks | Making Albums For South Africa</title>
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="">
      <style>#ytplayer {display: table;margin: auto;}</style>
    @endsection
      <!-- end header -->

    @section('content')
        <section class="section paralbackground page-banner hidden-xs" style="background-image:url('{{asset('web/upload/page_banner_shop.jpg')}}');" data-img-width="2000" data-img-height="400" data-diff="100">
        </section>
        <!-- end section -->

        <section class="section lb">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-md-12 col-sm-12 single-blog">
                        <div class="row shop-list">
                            @foreach($products as $key => $item)
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="shop-item text-center">
                                    <div class="shop-thumbnail">
                                        <a href="{{ route('web.product_detail', ['slug' => $item->slug, 'product_id' => $item->id]) }}"><img src="{{asset('assets/product/thumb/'.$item->image.'')}}" alt="" class="img-responsive" height="200px"></a>
                                    </div><!-- end shop-thumbnail -->
                                    <div class="shop-desc">
                                        <h5 class="f-w-6"><a href="{{ route('web.product_detail', ['slug' => $item->slug, 'product_id' => $item->id]) }}" title="">{{ $item->name }}</a></h5>
                                        <p class="regular">Starting from <span>R 10000025</span></p>   
                                    </div><!-- end shop-desc -->

                                    <div class="shop-meta clearfix">
                                        <ul class="">
                                            <li><a href="{{ route('web.product_detail', ['slug' => $item->slug, 'product_id' => $item->id]) }}"><i class="fa fa-shopping-basket"></i> <span class="hidden-xs">Details</span></a></li>
                                        </ul><!-- end list -->
                                    </div><!-- end shop-meta --> 
                                </div><!-- end shop-item -->
                            </div><!-- end col -->
                            @endforeach
                        </div><!-- end row -->
                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="video-block" style="background-color: #fff">        
            <div class="container">
                <iframe id="ytplayer" type="text/html" width="90%" height="450" src="https://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&origin=http://example.com"  frameborder="0"></iframe>
            </div>
      </section>
    @endsection   