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
                            <h4>Profile</h4>
                            <p>Profile Detail with few basic information</p>
                        </div>
                        @if(!empty($my_account))
                        <form>
                            <div class="form-group pl-0">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="inputname4" placeholder="Name" value="{{ $my_account->name }}" disabled>
                            </div>
                            <div class="form-group">
                                 <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $my_account->email }}" placeholder="Enter email" disabled>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group pl-0 col-md-6">
                                <label for="inputProfile">Profile</label><br>
                                @if($my_account->profile_type == 1)
                                <input type="radio" name="profile" checked disabled> Lab Owner<br>
                                <input type="radio" name="profile" disabled> Distributor<br>
                                <input type="radio" name="profile" disabled> Studio/Photographer
                                @elseif($my_account->profile_type == 2)
                                <input type="radio" name="profile" disabled> Lab Owner<br>
                                <input type="radio" name="profile" checked disabled> Distributor<br>
                                <input type="radio" name="profile" disabled> Studio/Photographer
                                @else
                                <input type="radio" name="profile" disabled> Lab Owner<br>
                                <input type="radio" name="profile" disabled> Distributor<br>
                                <input type="radio" name="profile" checked disabled> Studio/Photographer
                                @endif
                            </div>
                            <div class="form-group pr-0 col-md-6">
                                @if($my_account->profile_type == 1)
                                <input type="text" class="form-control" value="{{ $my_account->lab_owner }}" id="inputLabowner" placeholder="Lab Owner" disabled>
                                <br>
                                @endif
                                <input type="text" class="form-control" value="{{ $my_account->contact_person }}" id="inputContactperson" placeholder="Contact person" disabled>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Address</label>
                                <textarea type="text" class="form-control" id="inputAddress2" placeholder="Apartment, home, or floor" disabled>{{ $my_account->address }}</textarea>
                            </div>
                            <div class="form-group pl-0 col-md-5">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" value="{{ $my_account->city }}" id="inputCity" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <input type="text" class="form-control" value="{{ $my_account->state }}" id="inputState" disabled>
                            </div>
                            <div class="form-group pr-0 col-md-3">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" value="{{ $my_account->zip_code }}" id="inputZip" disabled>
                            </div>
                            <a href="{{ route('web.edit_my_profile') }}" type="button" class="btn btn-primary">Edit Profile</a>
                        </form>
                        @endif
                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
    @endsection   