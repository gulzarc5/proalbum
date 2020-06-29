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

        <section class="section" style="border-top: 1px solid #e3e3e3;padding-top: 0;">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-md-12 col-sm-12 single-blog">
                        <div class="row">
                            <div class="blog-wrapper col-md-12">

                                <div class="blog-desc">
                                   {!!$data!!}
                                </div><!-- end desc -->
                            </div><!-- end blog-wrapper -->
                        </div><!-- end blog-list row -->
                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
            <!-- end container -->
        </section>

    @endsection   