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
        <section class="section lb">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-md-6 col-sm-6 col-md-offset-3 login">
                        <div class="login-head">
                            <h4>Change Password</h4>
                            <p>Change your old password with new password</p>
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="inputCity">New Password</label>
                                <input type="text" class="form-control" id="inputCity" placeholder="Enter New Password">
                            </div>
                            <div class="form-group">
                                <label for="inputState">Confirm New Password</label>
                                <input type="text" class="form-control" id="inputState" placeholder="Enter Confirm New Password">
                            </div>
                            <div class="flex form-group pl-0 col-md-6">
                                <a href="{{route('web.login')}}" class="btn btn-cancel" title="">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>                                
                            </div>
                        </form>
                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
    @endsection   