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
            @if (isset($blog) && !empty($blog))
            <div class="blog-list blog-page row">
                @foreach ($blog as $item)
                    <div class="blog-wrapper col-md-4 col-sm-6">
                        <div class="blog-media">
                            <a href="{{route('web.single-blog',['slug'=>$item->slug,'b_id'=>$item->id])}}"><img src="{{asset('assets/blog/'.$item->image.'')}}" alt="" class="img-responsive"></a>
                        </div><!-- end media -->
    
                        <div class="blog-desc">
                            <span class="post-date">{{$item->created_at}}</span>
                            <h3><a href="{{route('web.single-blog',['slug'=>$item->slug,'b_id'=>$item->id])}}" title="">{{$item->title}}</a></h3><br>
    
                            <div class="blog-body">{!!$item->body!!}</div>
                        </div><!-- end desc -->
    
                        <div class="blog-bottom clearfix">
                            <a href="{{route('web.single-blog',['slug'=>$item->slug,'b_id'=>$item->id])}}" class="button button--aylen btn">Read More</a>
                        </div><!-- end blog-bottom -->
                    </div><!-- end blog-wrapper -->                
                @endforeach
                </div><!-- end blog-list row -->
    
                <div class="row">
                    <div class="col-md-12">
                        <nav class="text-center">
                            @if (isset($blog) && !empty($blog))
                                {!! $blog->onEachSide(2)->links() !!}
                            @endif
                        </nav>
                    </div>
                </div>
            @endif
           
        </div><!-- end container -->
    </section>

    @endsection
    @section('script') 
    @endsection 