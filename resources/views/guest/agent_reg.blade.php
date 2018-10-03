<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<title>GOENERGEE</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="/images/favicon.png" rel="shortcut icon" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
	<link href="/css/main.css" rel='stylesheet' media="screen, projection" type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/css/animate.css" rel="stylesheet">
	<!-- <link href="/css/application.css" rel="stylesheet"> -->
	<link href="/css/emojione.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="{{asset('css/custom.css')}}" rel="stylesheet">
	<link href="{{asset('css/media-query.css')}}" rel="stylesheet">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
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

<body class="bg-img" id="banner">
	<!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<div class="container">
		<div class="row" style="margin: 1em 0 3em 0">
			<div class="col-xs-12 col-md-3 col-lg-3 col-sm-12">
				<a href="{{ url('/') }}">
					<img src="/images/logo.png" class="media-query-logo" height="20" style="margin-top: 1em;">
				</a>
			</div>
			<div class="col-xs-12 col-md-9 media-query-body col-lg-9 col-sm-12">
				<div class="row media-query-row">
					<div class="col-md-8 col-lg-9 media-query-search">
						<div class="input-group media-input-group " style="width: 100%; text-align: right;">
							<input type="text" class="form-control media-query-input" placeholder="Search" aria-describedby="basic-addon1"
							 style="
								width: 60%;
								float:  right;
								padding: 1.5em;
								border-radius:  0;
								text-align: center;
								"
							 onkeyup="listServices()" id="searchForm">
							<button class="btn btn-danger" style="
									padding: .7em;
									border-radius: 0;
								"><i class="fas fa-search"></i></button>

							<div class="services-list-overlay" style=""></div>
						</div>
					</div>
					<div class="col-md-4 col-lg-3 media-query-social">
						<div>
							<a href="#" class="social-top-links">
								<i class="fab fa-twitter-square"></i>
							</a>
							<a href="#" class="social-top-links">
								<i class="fab fa-linkedin"></i>
							</a>
							<a href="#" class="social-top-links">
								<i class="fab fa-instagram"></i>
							</a>
							<a href="#" class="social-top-links">
								<i class="fab fa-facebook"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="row media-query-a">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>

					</ol>
					<div class="carousel-inner">
						<div class="item active">
							<img src="/images/rev_image/2.png">
						</div>
						<div class="item">
							<img src="/images/rev_image/7.png">
						</div>
						{{-- <div class="item">
							<img src="images/rev_image/3.png">
						</div>
						<div class="item">
							<img src="images/rev_image/4.png">
						</div>
						<div class="item">
							<img src="images/rev_image/7.png">
						</div>
						<div class="item">
							<img src="images/rev_image/8.png">
						</div>
						<div class="item">
							<img src="images/rev_image/9.png">
						</div> --}}
					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		{{-- <ul class="nav-ul">
			<style>
				.nav-item {
					padding: 10px;
					background: #ed5565;
					margin-right: 20px;
					color: #fff;
					margin-bottom: 12px;
					display: flex;
					/* flex-flow: column; */
			}	
						</style>
			<li class="nav-item item">
				<i class="fas fa-user-plus"></i>
				<a class="nav-link" href="{{ route('guest.signup') }}">Sign Up</a>
			</li>
			<li class="nav-item item">
				<i class="far fa-credit-card"></i>
				<a class="nav-link" href="{{ route('guest.services') }}">Make Payment</a>
			</li>
			<li class="nav-item item">
				<i class="fas fa-cogs"></i>
				<a class="nav-link disabled" href="{{ route('guest.support') }}">Support</a>
			</li>
			<li class="nav-item item">
				<i class="fas fa-question-circle"></i>
				<a class="nav-link" href="faq">FAQ</a>
			</li>
		</ul>
		--}}

		<!-- main div -->
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" style="padding:5px border-radis:3%">

				<div class="user-details" id="login" style="">
					<div class="text-center login-title">
						<img src="/images/logo.png">
						<h4>AGENT REGISTRAION</h4>
					</div>
					<form action="" method="POST">
						{{ csrf_field() }}
					<div class="col-md-3">
						<div class="form-group">
							<label for="name">
								<b>Name</b>
							</label>
							<input type="text"  name="name" id="name" class="input-sm" placeholder="E.g John Doe" value="{{ old('name') }}">
							
						</div>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<label for="company">
								<b>Business Name</b>
							</label>
							<input type="text" name="company_name" id="company" class=" input-sm" placeholder="" value="{{ old('company_name') }}">

						</div>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<label for="district">
								<b>Business District</b>
							</label>
							<input type="text" name="district" id="district" class=" input-sm" placeholder="E.g Mushin" value="{{ old('district') }}">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="email">
								<b>Email Address </b>
							</label>
							<input type="email" name="email" id="email" class="form-control danger" placeholder="" value="{{ old('email') }}">
							@if($errors->has('email'))
							<span class="help-block text-danger">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<label for="tel">
								<b>Business Telephone</b>
							</label>
							<input type="tel" name="tel" id="tel" class="form-control" placeholder="" value="{{ old('tel') }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="address">
								<b>Business Address</b>
							</label>
							<input type="text" name="address" id="address" class="form-control" placeholder="Full Business Address" value="{{ old('address') }}">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="service_outlet">Own an Exisiting Business Outlet </label>
							<select name="service_outlet" id="service_outlet" class="form-control" required>
								<option value="" selected="selected">- Select -</option>
								<option value="1">Yes</option>
								<option value="0">No</option>

							</select>

						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="min_wallet">Can Operate a min Wallet balance of N10,000</label>
							<select name="min_wallet" id="min_wallet" required class="form-control">
								<option value="" selected="selected">- Select -</option>
								<option value="1">Yes</option>
								<option value="0">No</option>

							</select>

						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="tools">Owns Smart phone/ Computer</label>
							<select name="tools" id="tools" required class="form-control">
								<option value="" selected="selected">- Select -</option>
								<option value="1">Yes</option>
								<option value="0">No</option>

							</select>

						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="password">
								<b>Account Password</b>
							</label>
							<input type="password" name="password" id="password" class=" input-sm" placeholder="*********">
						</div>
					</div>
				
					<div class="col-md-9">
						
							<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
							<label class="form-check-label" for="defaultCheck1">
								I Agree to the terms and Conditions: (Put Terms & Conditions Here) 
							</label>
						</div>
				

					<div class="col-md-2">
						<input type="submit" value="Register" class="btn btn-success btn-block registerBtn">

					
					</div>
					<div class="col-md-1">
						<a href="/" class="btn btn-success btn-block registerBtn">Home</a>
					</div>
					
				</div>
			</div>
		</form>
			<!---log in ends-->
		</div>
	</div>

	</div>
	
	<div class="footi">Powered by <b>GOENERGEE</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	
	@if(session('success'))
	<script>
		$.alert({
			type: 'green',
			title: 'Success',
			content: "{{ session('success') }}",
			buttons: {
				okay: {
					text: 'Okay',
					btnClass: 'btn-green'
				}
			}
		})
	</script>
	@endif
	<script>
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
			showSlides(slideIndex += n);
		}

		function currentSlide(n) {
			showSlides(slideIndex = n);
		}

		function showSlides(n) {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("dot");
			if (n > slides.length) {
				slideIndex = 1
			}
			if (n < 1) {
				slideIndex = slides.length
			}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slideIndex++;
			if (slideIndex > slides.length) {
				slideIndex = 1
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex - 1].style.display = "block";
			dots[slideIndex - 1].className += " active";

			setTimeout(showSlides, 3000); // Change image every 3 seconds
		}
	</script>
	@include('partials._search-component');
	
</body>

</html>