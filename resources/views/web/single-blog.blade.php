  @extends('web.templet.master')

    {{-- META --}}
    @section('meta')
      <title>Premium Photobooks | Making Albums For South Africa</title>
      <!-- Open Graph data -->
      <meta property="og:title" content="Green Corner" />
      <meta property="og:type" content="article" />
      <meta property="og:url" content="http://www.example.com/" />
      <meta property="og:image" content="{{asset('web/upload/page_banner_blog.jpg')}}" />
      <meta property="og:description" content="Morbi congue leo et est sodales consequat a quis est. Nunc aliquam ut massa et accumsan. Donec cursus pretium porta. Maecenas vehicula pellentesque eros, non consectetur massa finibus quis. Ut ut rpat. Praesent lorem nisi vehicula fringilla rutrum facilisis, tempus sed ipsum. Mauris commodo mattis ante, at consequat lectus blandit nec. Nulla facilisut magna fringilla vulputate quis non ante. Integer bibendum velit dui. Sed consequat nisi id convallis eleifend. Proin rhoncus dapibus vulputate. Phasellus eget fringilla justo. Aliquam erat volutpat. Praesent lorem nisi vehicula fringilla ruhoncus purus. Donec varius ultricies dapibus. Aliquam facilisis lacus purus, sit amet maximus lectus auctor et. Nam vehicula eget leo sed gravida." />
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
                                <img src="{{asset('web/upload/page_banner_blog.jpg')}}" alt="" class="img-responsive">
                            </div><!-- end media -->

                            <div class="blog-desc">
                                <span class="post-date">May 13, 2016</span>
                                <h3 style="margin-bottom: 20px"><a title="">Green Corner</a></h3>
                                <div>                                  
                                  <p>Morbi congue leo et est sodales consequat a quis est. Nunc aliquam ut massa et accumsan. Donec cursus pretium porta. Maecenas vehicula pellentesque eros, non consectetur massa finibus quis. Ut ut rpat. Praesent lorem nisi vehicula fringilla rutrum facilisis, tempus sed ipsum. Mauris commodo mattis ante, at consequat lectus blandit nec. Nulla facilisut magna fringilla vulputate quis non ante. Integer bibendum velit dui. Sed consequat nisi id convallis eleifend. Proin rhoncus dapibus vulputate. Phasellus eget fringilla justo. Aliquam erat volutpat. Praesent lorem nisi vehicula fringilla ruhoncus purus. Donec varius ultricies dapibus. Aliquam facilisis lacus purus, sit amet maximus lectus auctor et. Nam vehicula eget leo sed gravida.</p>

                                  <p><img src="upload/alignleft.png" alt="" class="alignleft">Phasellus eget fringilla justo. Aliquam erat volutpat. <a href="#">Praesent lorem nisi</a> vehicula fringilla rutrum facilisis, tempus sed ipsum. Mauris commodo mattis ante, at consequat lectus blandit nec. Nulla facilisi. Phasellus aliquet est ac faucibus iaculis. <strong>Sed non lorem in quam placerat</strong> facilisis necut magna fringilla vulputate quis non ante. Integer bibendum velit dui. Sed consequat nisi id convallis eleifend. Proin rhoncus dapibus vulputate. Phasellus eget fringilla justo. Aliquam erat volutt ante. Integer bibendum velit dui. Sed consequat nisi id convallis eleifend. Proin rhoncus dapibus vulputate. Phasellus eget fringilla justo. Aliquam erat volutpat. Praesent lorem nisi vehicula fringilla rutrum facilisis, tempus sed ipsum. Mauris commodo mattis ante, at consequat lectus blandit nec. Nulla facilisut magna fringilla vulputate quis non ante. Integer bibendum velit dui. Sed consequat nisi id convallis eleifend. Proin rhoncus dapibus vulputate. Phasellus eget fringilla justo. Aliquam erat volutpat. Praesent lorem nisi vehicula fringilla rutrum facilisis, tempus sed ipsum. Mauris commodo mattis ante, at consequat lectus blandit nec. Nulla facilis eu quam. Etirum facilisis, tempus sed ipsum. Mauris commodo mattis ante, at consequat lectus blandit nec. Nulla facilis eu quam. Etiam at tincidunt felis, et posuere eros. Nulla dictum id enim vitae fermentum. </p>

                                  <blockquote>
                                      <p>Love can travel a thousand miles. Life has no limit. Go where you want to go. Reach the height you want to reach. It is all in your heart and in your hands.</p>
                                      <footer><cite title="Source Title">Steave Jobs</cite></footer>
                                  </blockquote>

                                  <p><img src="upload/alignright.png" alt="" class="alignright">Suspendisse quis dignissim diam, id faucibus sapien. Integer et egestas elit. Suspendisse pretium neque congue auctor consequat. Nulla tincidunt justo tortor, volutpat placerat nisl pharetra vitae. Cras rhoncus ante et leo commodo fermentum. In consequat elit tristique orci scelerisque pretium. Pellentesque placerat at tortor et vehicula. Praesent egestas efficitur auctor. Suspendisse vel finibus lectus. Maecenas ligula leo, aliquam non odio et, tincidunt congue nulla. Maecenas aliquam interdum erat ac convallis. In consequat elit tristique orci scelerisque pretium. Pellentesque placerat at tortor et vehicula. Praesent egestas efficitur auctor. Suspendisse vel finibus lectus. Maecenas ligula leo, aliquam non odio et, tincidunt congue nulla. Maecenas aliquam interdum erat ac convallis.In consequat elit tristique orci scntesque placerat at tortor et vehicula. Praesent egestas efficitur auctor. Suspendisse vel finibus lectus. Maecenas ligula leo, aliquam non odio et, tincidunt congue nulla. Maecenas aliquam interdum erat ac convallis. </p>

                                  <p> In dignissim feugiat gravida. <em>Proin feugiat quam sed gravida fringilla.</em> Proin quis mauris ut magna fringilla vulputate quis non ante. Integer bibendum velit dui. Sed co <mark>et posuere eros</mark> rhoncus dapibus vulputate. Phasellus eget fringilla justo. Aliquam erat volutpat. Praesent lorem nisi, vehicula fringilla rutrum facilisis, tempus sed ipsum. Mauris commodo mattis ante, at consequat lectus blandit nec. Nulla facilisi. Phasellus <small>aliquet est ac faucibus iaculis.</small> Sed non lorem in quam placerat facilisis nec eu quam. Etiam at tincidunt felis,. Nulla dictum id enim vitae fermentum. </p>
                                
                                </div>
                                
                                <div id="share">
                                  <h4>Share it on :</h4>
                                  <!-- facebook -->
                                  <a class="facebook" href="" target="blank"><i class="fa fa-facebook"></i></a>
                                  <!-- twitter -->
                                  <a class="twitter" href="" target="blank"><i class="fa fa-twitter"></i></a>
                                  <!-- google plus -->
                                  <a class="whatsapp" href="" target="blank"><i class="fa fa-whatsapp"></i></a>
                                  
                                </div>
                            </div><!-- end desc -->
                        </div><!-- end blog-wrapper -->
                    </div><!-- end blog-list row -->
                </div><!-- end content -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    @endsection
    @section('script')

    @endsection 
    {{-- <a class="facebook" href="https://www.facebook.com/share.php?u={{url}}&title={{title}}" target="blank"><i class="fa fa-facebook"></i></a>

  <!-- twitter -->
  <a class="twitter" href="https://twitter.com/intent/tweet?status={{title}}+{{url}}" target="blank"><i class="fa fa-twitter"></i></a>
  <a rel="noopener noreferrer" target="_blank" title="share on whatsapp" href="https://web.whatsapp.com:/send?text=Ayush%20ministry%20allows%20sale%20of%20Patanjali%27s%20Coronil%20as%20immunity%20booster%20https%3A%2F%2Fwww.indiatoday.in%2Findia%2Fstory%2Fayush-ministry-allows-sale-of-patanjali-s-coronil-as-immunity-booster-1695911-2020-07-01%3Futm_content%3D%26utm_term%3D%20%0A%0ADownload%20the%20India%20Today%20app%20now%20to%20read%20our%20latest%20stories.%0Ahttps%3A%2F%2Findiatoday.app.link%2FTrK1ggqhLT" data-text="Ayush ministry allows sale of Patanjali's Coronil as immunity booster" data-href="https://www.indiatoday.in/india/story/ayush-ministry-allows-sale-of-patanjali-s-coronil-as-immunity-booster-1695911-2020-07-01?utm_content=&amp;utm_term="><i class="fa fa-whatsapp"></i></a>
  --}}