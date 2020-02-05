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
                            <h4>Profile Edit</h4>
                            <p>Edit your profile detail with few basic information</p>
                        </div>
                        @if(!empty($my_account) && (count($my_account) > 0))
                        <form action="{{ route('web.update_my_profile') }}" method="POST" autocomplete="off">
                             @csrf
                            <div class="form-group pl-0">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="inputname4" placeholder="Name" name="name" value="{{ $my_account->name }}">
                            </div>
                            <div class="form-group">
                                 <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $my_account->email }}" name="email" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group pl-0 col-md-6">
                                <label for="inputProfile">Profile</label><br>
                                @if($my_account->profile_type == 1)
                                <input type="radio" name="profile" value="{{ $my_account->profile_type }}" id="profile1" checked> Lab Owner<br>
                                <input type="radio" name="profile" value="2" id="profile2"> Distributor<br>
                                <input type="radio" name="profile" value="3" id="profile3"> Studio/Photographer
                                @elseif($my_account->profile_type == 2)
                                <input type="radio" name="profile" value="1" id="profile1"> Lab Owner<br>
                                <input type="radio" name="profile" value="{{ $my_account->profile_type }}" id="profile2" checked> Distributor<br>
                                <input type="radio" name="profile" value="3" id="profile3"> Studio/Photographer
                                @else
                                <input type="radio" name="profile" value="1" id="profile1"> Lab Owner<br>
                                <input type="radio" name="profile" value="2" id="profile2"> Distributor<br>
                                <input type="radio" name="profile" value="3" id="profile3" checked> Studio/Photographer
                                @endif
                            </div>
                            <div class="form-group pr-0 col-md-6">
                                <input type="text" class="form-control" value="{{ $my_account->lab_owner }}" id="lab_owner" name="lab_owner" placeholder="Lab Owner">
                                <br>
                                <input type="text" class="form-control" value="{{ $my_account->contact_person }}" id="contact_person" name="contact_person" placeholder="Contact person">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Address</label>
                                <textarea type="text" class="form-control" id="inputAddress2" placeholder="Apartment, home, or floor" name="address">{{ $my_account->address }}</textarea>
                            </div>
                            <div class="form-group pl-0 col-md-5">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" value="{{ $my_account->city }}" name="city" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <input type="text" name="state" class="form-control" value="{{ $my_account->state }}" id="inputState">
                            </div>
                            <div class="form-group pr-0 col-md-3">
                                <label for="inputZip">Zip</label>
                                <input type="text" name="zip_code" class="form-control" value="{{ $my_account->zip_code }}" id="inputZip">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        </form>
                        @endif
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