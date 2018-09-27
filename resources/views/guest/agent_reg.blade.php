<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head> 
	<title>GOENERGEE: AGENT SIGN UP</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="/images/favicon.png" rel="shortcut icon" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
	<link href="/css/main.css" rel='stylesheet' media="screen, projection" type='text/css'>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	{{-- <script src="{{ asset('js/goenergee.js') }}"></script> --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="/css/animate.css" rel="stylesheet">
	<!-- <link href="/css/application.css" rel="stylesheet"> -->
	<link href="/css/emojione.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="{{asset('css/custom.css')}}" rel="stylesheet">
	<link href="{{asset('css/osSlider.css')}}" rel="stylesheet">
	<link href="{{asset('css/media-query.css')}}" rel="stylesheet">


	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API = Tawk_API || {},
			Tawk_LoadStart = new Date();
		(function () {
			var s1 = document.createElement("script"),
				s0 = document.getElementsByTagName("script")[0];
			s1.async = true;
			s1.src = 'https://embed.tawk.to/5af6719a227d3d7edc253853/default';
			s1.charset = 'UTF-8';
			s1.setAttribute('crossorigin', '*');
			s0.parentNode.insertBefore(s1, s0);
		})();
	</script>
	<!--End of Tawk.to Script-->
	<style>
		.input-group-addon {
			background-color: transparent;
			border: none;
			border-radius: 0;
			line-height: 0;
			padding: 0;
			
		}
	</style>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
<div class="user-page">
<br><br>
<div class="user-details">

<form action="/action_page.php" style="border:1px solid #ccc">
  <div class="container">
  <img src="images/logo.png" alt="logo" class="img-responsive" style="width:100%; padding:40px; margin-bottom:10px; margin:0 auto;">
    <h4 style="text-align:center">Sign Up</h4>
    <p style="text-align:center">Please fill in this form to create an account.</p>
	<hr>
	<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
		<label for="first_name"><b>First Name</b></label>
<input type="text" name="first_name" id="first_name" class=" input-sm" placeholder="First Name">
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
		<label for="last_name"><b>Last Name</b></label>
			<input type="text" name="last_name" id="last_name" class=" input-sm" placeholder="Last Name">
		</div>
	</div>
</div>
 <div class="form-group">
   <label for="address"><b>Address</b></label>
	<input type="text" name="address" id="address" class="input-sm" placeholder="Address">
 </div>
  <div class="form-group">
   <label for="email"><b>Email</b></label>
	<input type="email" name="email" id="email" class="input-sm" placeholder="Email Address">
 </div>
 <div class="form-group">
   <label for="mobile"><b>Phone Number</b></label>
	<input type="text" name="mobile" id="mobile" class="input-sm" placeholder="Phone Number">
 </div>
 
 
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
		<label for="password"><b>Password</b></label>
			<input type="password" name="password" id="password" class="input-sm" placeholder="Password">
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
		<label for="password_confirmation"><b>Confirm Password</b></label>
			<input type="password" name="password_confirmation" id="password_confirmation" class="input-sm" placeholder="Confirm Password">
		</div>
	</div>
</div>

    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

   	<input type="submit" value="register" class="btn btn-info btn-block">
  </div>
</form>

</div>

</div>
<body>
</html>
