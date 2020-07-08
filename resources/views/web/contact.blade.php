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

    
        <section class="section">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3590.8928984448935!2d28.10335504432705!3d-25.84007425530538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e957b29cadbefc3%3A0x4a7e9c2e2b4a1718!2sPremium%20Photobooks!5e0!3m2!1sen!2sza!4v1582800682122!5m2!1sen!2sza" width="100%" height="450" frameborder="0" style="border-radius: 10px;border: 3px solid #8f969c;" allowfullscreen=""></iframe>
                    </div>
                </div><!-- end googlemap -->

                <hr class="invis">

                <div class="row">
                    <div class="col-md-5">
                        <div class="widget">
                            <p>If you need help before, during or after your purchase, this is the place to be. Please use below contact details to get in touch with us</p>
                            <hr class="invis" style="border-color: #8f969c;">
                            <ul class="contact-details">
                                <li><i class="fa fa-link"></i> <a href="#">premiumphotobooks.co.za</a></li>
                                <li><i class="fa fa-home"></i>Unit 04, C/o, 2 Van Tonder Street, Rudolph St, Sunderland Ridge, Centurion, 0157.</li>
                                <li><i class="fa fa-envelope-o"></i> <a>info@premiumphotobooks.co.za</a></li>
                                <li><i class="fa fa-phone"></i> 012 666 7037</li>
                            </ul>
                            <hr class="invis" style="border-color: #8f969c;">
                            <div class="social-icons"style="margin-bottom: 20px;">
                                <p><strong>STAY CONNECTED</strong></p>
                                <ul class="list-inline">
                                    <li class="facebook"><a target="_blank" data-tooltip="tooltip" data-placement="top" href="https://www.facebook.com/ProAlbumsSA/" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li class="google"><a target="_blank" data-tooltip="tooltip" data-placement="top" href="https://www.instagram.com/proalbumssa/" data-original-title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                    <li class="twitter"><a target="_blank" data-tooltip="tooltip" data-placement="top" href="https://twitter.com/Proalbums_sa" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li class="whatsapp"><a target="_blank" data-tooltip="tooltip" data-placement="top" href="https://api.whatsapp.com/send?phone=+27 73 287 7622&text=Hi.. I need your help.. please contact me soon" data-original-title="Whatsapp"><i class="fa fa-whatsapp"></i></a></li>
                                    <li class="linkedin"><a target="_blank" data-tooltip="tooltip" data-placement="top" href="https://za.linkedin.com/in/pro-albums-sa-a3b5361aa" data-original-title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div><!-- end social icons -->
                        </div><!-- end widget -->
                    </div>   
                    <div class="col-md-7">
                        <div class="contact_form">
                            <div>
                                @if (Session::has('message'))
                                    <div class="alert alert-success" >{{ Session::get('message') }}</div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-danger" >{{ Session::get('error') }}</div>
                                @endif
                            </div>
                            <form id="contactform" class="row" action="{{route('web.contact_submit')}}" name="contactform" method="post">
                                @csrf;
                                <div class="col-md-12">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name"> 
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email"> 
                                <input type="text" name="mobile" id="phone" class="form-control" placeholder="Phone"> 
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject"> 
                                <textarea class="form-control" name="message" id="comments" rows="6" placeholder="Message Below"></textarea>
                                <button type="submit" value="SEND" id="submit" class="btn btn-primary"> Send enquiry</button>
                                </div>
                            </form> 
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->   
            </div><!-- end container -->
        </section><!-- end section -->

    @endsection
    @section('script')

    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    @endsection 