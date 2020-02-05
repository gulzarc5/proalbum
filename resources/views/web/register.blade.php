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
                        <form action="{{ route('web.registration') }}" autocomplete="off">
                            @csrf
                            <div class="form-group pl-0">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="inputname4" placeholder="Name" name="name">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group pr-0">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group pl-0 col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group pr-0 col-md-6">
                                <label for="inputPassword4">Confirm Password</label>
                                <input type="password" class="form-control" id="inputConfirmpassword4" placeholder="Password" name="confirm_password">
                                @error('confirm_password')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group pl-0 col-md-6">
                                <label for="inputPassword4">Profile</label><br>
                                <input type="radio" name="profile" value="1" id="profile1"> Lab Owner<br>
                                <input type="radio" name="profile" value="2" id="profile2"> Distributor<br>
                                <input type="radio" name="profile" value="3" id="profile3"> Studio/Photographer
                                @error('profile')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group pr-0 col-md-6">
                                <input type="text" class="form-control" id="lab_owner" placeholder="Lab Owner" name="lab_owner">
                                <br>
                                <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact person">
                                @error('contact_person')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Address</label>
                                <textarea type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address"></textarea>
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group pl-0 col-md-5">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" name="city" id="inputCity">
                                @error('city')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <input type="text" name="state" class="form-control" id="inputState">
                                @error('state')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group pr-0 col-md-3">
                                <label for="inputZip">Zip Code</label>
                                <input type="text" class="form-control" name="zip_code" id="inputZip">
                                @error('zip_code')
                                    {{ $message }}
                                @enderror
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>                            
                            <div class="form-group form-check mt-20">
                                <a href="#" class="form-check-label" for="exampleCheck1">Already have an registred to our website? Login </a>
                            </div>
                        </form>
                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
    @endsection   

@section('script')
<script type="text/javascript">
$(document).ready(function(){
    $("input[type='radio']").click(function(){
        var radioValue = $("input[name='profile']:checked").val();
        if(radioValue == 1){
            $('#lab_owner').show();
        } else {
            $('#lab_owner').hide();
        }
    });
});
</script>
@endsection