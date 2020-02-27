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

        <section class="section" style="border-top: 1px solid #e3e3e3;">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-md-12 col-sm-12 single-blog">
                        <div class="row">
                            <div class="blog-wrapper col-md-12">
                                <div class="">
                                    <img style="width: 80%;margin: auto;" src="{{asset('web/upload/about-top.png')}}" alt="" class="img-responsive">
                                </div><!-- end media -->

                                <div class="blog-desc">
                                    <h2 style="margin-bottom: 0">About Premiun Photobook</h2>
                                    <p style="opacity: .8;padding-bottom: 0;">a little bit of our story</p>
                                    <hr style="margin-top: 10px;border-color: #bbb;">
                                    <p>ProAlbums is focused on the premium quality printing needs of today’s professional wedding, portrait, lifestyle, commercial and landscape photographers.</p>

                                    <p>We utilize the latest technology and software, ensuring the best possible prints.</p> 

                                    <p>Our caring staff bind each album by hand taking the time needed to deliver a quality product consistently.</p> 

                                    <p>ProAlbums is an international printing company, currently distributing to 13 countries. We are a family run business with over 50 years of experience in the printing industry.</p> 

                                    <p>Our team has procedures in place that ensure efficient and quick service from once the order is placed to final delivery to your doorstep.</p> 

                                    <p>All of this will give you, the professional photographer, more time to focus on your clients and most importantly your photography.</p>

                                    <blockquote>
                                        <h4 style="margin-bottom: 15px;text-decoration: underline;"><strong>Group Of Company</strong></h4>
                                        <footer style="margin-bottom: 10px;"><cite>PREMIUM PHOTOBOOKS</cite></footer>
                                        <footer style="margin-bottom: 10px;"><cite>PRINT FOR PROFISSIONAL</cite></footer>
                                        <footer style="margin-bottom: 10px;"><cite>PHOTO GEAR DIRECT - COMING SOON</cite></footer>
                                        <footer style="margin-bottom: 10px;"><cite>ADMIRED IN AFRICA</cite></footer>
                                        <footer style="margin-bottom: 10px;"><cite>ADMIRED IN AFRICA AWARDS </cite></footer>
                                        <footer style="margin-bottom: 10px;"><cite>PHOTO PLUS AFRICA - EXPO</cite></footer>
                                        <footer style="margin-bottom: 10px;"><cite>PHOTO FAIR AFRICA</cite></footer>
                                    </blockquote>
                                </div><!-- end desc -->
                            </div><!-- end blog-wrapper -->
                        </div><!-- end blog-list row -->
                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
            <!-- end container -->
        </section>

    @endsection   