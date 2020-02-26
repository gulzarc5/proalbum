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
                            @if (Session::has('message'))
                               <div class="alert alert-success" >{{ Session::get('message') }}</div>
                            @endif
                            @if (Session::has('error'))
                               <div class="alert alert-danger" >{{ Session::get('error') }}</div>
                            @endif
                        </div>
                        <form action="{{ url('update-password') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="inputState">Current Password</label>
                                <input type="password" class="form-control" id="inputState" name="current_password" placeholder="Enter Old Password">
                                @if($errors->has('current_password'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputCity">New Password</label>
                                <input type="password" class="form-control" id="inputCity" name="new_password" placeholder="Enter New Password">
                                @if($errors->has('new_password'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputState">Confirm New Password</label>
                                <input type="password" class="form-control" id="inputState" name="confirm_password" placeholder="Enter Confirm New Password">
                                @if($errors->has('confirm_password'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="flex form-group pl-0 col-md-6">
                                <a href="{{route('web.index')}}" class="btn btn-cancel" title="">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>                                
                            </div>
                        </form>
                    </div><!-- end content -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
    @endsection   