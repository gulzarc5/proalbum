<!DOCTYPE html>
    <html lang="en-US">
    	<head>
    		<meta charset="utf-8">
    	</head>
    	<body>
		<h2>Hello, {{$user->name}}</h2>
			<p>Please Click The Password Reset Link To Reset Your Password</p>
			<a href="{{url('reset_password/'.$user->email."/".$code)}}">Reset Password</a>
    	</body>
    </html>