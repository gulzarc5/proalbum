  @extends('web.templet.master')

    {{-- META --}}
    @section('meta')
      <title>Premium Photobooks | Making Albums For South Africa</title>
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="">
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
                <h4>Blog</h4>
                <hr>
            </div>
            <div class="blog-list blog-page row">
                <div class="blog-wrapper col-md-4 col-sm-6">
                    <div class="blog-media">
                        <img src="{{asset('web/upload/blog_08.jpg')}}" alt="" class="img-responsive">
                    </div><!-- end media -->

                    <div class="blog-desc">
                        <span class="post-date">May 13, 2016</span>
                        <h3><a href="{{route('web.single-blog')}}" title="">Green Corner</a></h3><br>

                        <p>Feel alive! So if you’re looking for, here is a list of some of the most popular and fiestas the Mardin has to offer thisfiestas the Mardin has to offer!</p>
                    </div><!-- end desc -->

                    <div class="blog-bottom clearfix">
                        <a href="{{route('web.single-blog')}}" class="button button--aylen btn">Read More</a>
                    </div><!-- end blog-bottom -->
                </div><!-- end blog-wrapper -->
                
                <div class="blog-wrapper col-md-4 col-sm-6">
                    <div class="blog-media">
                        <img src="{{asset('web/upload/blog_08.jpg')}}" alt="" class="img-responsive">
                    </div><!-- end media -->

                    <div class="blog-desc">
                        <span class="post-date">May 13, 2016</span>
                        <h3><a href="{{route('web.single-blog')}}" title="">Green Corner</a></h3><br>

                        <p>Feel alive! So if you’re looking for, here is a list of some of the most popular and fiestas the Mardin has to offer thisfiestas the Mardin has to offer!</p>
                    </div><!-- end desc -->

                    <div class="blog-bottom clearfix">
                        <a href="{{route('web.single-blog')}}" class="button button--aylen btn">Read More</a>
                    </div><!-- end blog-bottom -->
                </div><!-- end blog-wrapper -->
                
                <div class="blog-wrapper col-md-4 col-sm-6">
                    <div class="blog-media">
                        <img src="{{asset('web/upload/blog_08.jpg')}}" alt="" class="img-responsive">
                    </div><!-- end media -->

                    <div class="blog-desc">
                        <span class="post-date">May 13, 2016</span>
                        <h3><a href="{{route('web.single-blog')}}" title="">Green Corner</a></h3><br>

                        <p>Feel alive! So if you’re looking for, here is a list of some of the most popular and fiestas the Mardin has to offer thisfiestas the Mardin has to offer!</p>
                    </div><!-- end desc -->

                    <div class="blog-bottom clearfix">
                        <a href="{{route('web.single-blog')}}" class="button button--aylen btn">Read More</a>
                    </div><!-- end blog-bottom -->
                </div><!-- end blog-wrapper -->
                

            </div><!-- end blog-list row -->

            <div class="row">
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
            </div>
        </div><!-- end container -->
    </section>

    @endsection
    @section('script') 
    @endsection 