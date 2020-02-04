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
                            <h4>Register</h4>
                            <p>Welcome! register by entering few basic detail</p>
                        </div>
                        <form>
                            <div class="form-group pl-0">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="inputname4" placeholder="Name">
                            </div>
                            <div class="form-group pr-0">
                                 <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group pl-0 col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group pr-0 col-md-6">
                                <label for="inputPassword4">Confirm Password</label>
                                <input type="password" class="form-control" id="inputConfirmpassword4" placeholder="Password">
                            </div>
                            <div class="form-group pl-0 col-md-6">
                                <label for="inputPassword4">Profile</label><br>
                                <input type="radio" name="profile"> Lab Owner<br>
                                <input type="radio" name="profile"> Distributor<br>
                                <input type="radio" name="profile"> Studio/Photographer
                            </div>
                            <div class="form-group pr-0 col-md-6">
                                <input type="text" class="form-control" id="inputPassword4" placeholder="Lab Owner">
                                <br>
                                <input type="text" class="form-control" id="inputPassword4" placeholder="Contact person">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Address</label>
                                <textarea type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"></textarea>
                            </div>
                            <div class="form-group pl-0 col-md-5">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <input type="text" class="form-control" id="inputState">
                            </div>
                            <div class="form-group pr-0 col-md-3">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>                            
                            <div class="form-group form-check mt-20">
                                <a href="{{route('web.login')}}" class="form-check-label" for="exampleCheck1">Already have an registred to our website? Login </a>
                            </div>
                        </form>
                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
    @endsection   