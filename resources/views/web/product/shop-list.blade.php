  @extends('web.templet.master')

    {{-- META --}}
    @section('meta')
      <title>Premium Photobooks | Making Albums For South Africa</title>
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="">
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
                                        <h3><a href="{{ route('web.product_detail', ['slug' => $item->slug, 'product_id' => $item->id]) }}" title="">{{ $item->name }}</a></h3>
                                        <p class="regular">{{ $item->p_short_desc }}</p>
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

                      {{--   <div class="row">
                            <div class="col-md-12">
                                <nav class="text-center">
                                    <ul class="pagination">
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">...</a></li>
                                        <li><a href="#">5</a></li>
                                        <li>
                                          <a href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                          </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div> --}}
                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
    @endsection   