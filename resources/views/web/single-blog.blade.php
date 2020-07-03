  @extends('web.templet.master')

  @if (isset($blog) && !empty($blog))
     
    {{-- META --}}
    @section('meta')
      <title>Premium Photobooks | Making Albums For South Africa</title>
      <!-- Open Graph data -->
      <meta property="og:title" content="{{$blog->title}}" />
      <meta property="og:type" content="article" />
      <meta property="og:url" content="{{route('web.single-blog',['slug'=>$blog->slug,'b_id'=>$blog->id])}}" />
      <meta property="og:image" content="{{asset('assets/blog/'.$blog->image.'')}}" />
      <meta property="og:description" content="{!!$blog->title!!}" />
    @endsection
      <!-- end header -->
       {{-- EXTRA STYLESHEET --}}
    @section('stylesheet')
        <link rel="stylesheet" type="text/css" href="{{asset('web/css/prettyPhoto.css')}}">
    @endsection
      <!-- end header -->

    @section('content')

    <section class="section lb">
        <div class="container">

            <div class="row">
                <div id="content" class="col-md-12 col-sm-12 single-blog">
                    <div class="row">
                        <div class="blog-wrapper col-md-12">
                            <div class="blog-media">
                                <img src="{{asset('assets/blog/'.$blog->image.'')}}" alt="" class="img-responsive">
                            </div><!-- end media -->

                            <div class="blog-desc">
                                <span class="post-date">{{$blog->created_at}}</span>
                                <h3 style="margin-bottom: 20px"><a title="">{{$blog->title}}</a></h3>
                                <div>                                  
                                  {!!$blog->body!!}
                                
                                </div>
                                
                                <div id="share">
                                  <h4>Share it on :</h4>
                                  <!-- facebook -->
                                  <a class="facebook" href="https://www.facebook.com/share.php?u={{route('web.single-blog',['slug'=>$blog->slug,'b_id'=>$blog->id])}}&title={{$blog->title}}" target="blank"><i class="fa fa-facebook"></i></a> 
                                  <!-- twitter -->
                                   <a class="twitter" href="https://twitter.com/share?url={{route('web.single-blog',['slug'=>$blog->slug,'b_id'=>$blog->id])}}&text={{$blog->title}}" target="blank"><i class="fa fa-twitter"></i></a> 
                                  <!-- whatsapp -->
                                  <a class="whatsapp" rel="noopener noreferrer" target="_blank" title="share on whatsapp" href="https://web.whatsapp.com:/send?text={{route('web.single-blog',['slug'=>$blog->slug,'b_id'=>$blog->id])}}&" data-text="{{$blog->title}}" data-href="{{route('web.single-blog',['slug'=>$blog->slug,'b_id'=>$blog->id])}}&"><i class="fa fa-whatsapp"></i></a>
                                  
                                </div>
                            </div><!-- end desc -->
                        </div><!-- end blog-wrapper -->
                    </div><!-- end blog-list row -->
                </div><!-- end content -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    @endsection
     
  @endif


    @section('script')

    @endsection 