<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<title>GOENERGEE: SIGN UP</title>
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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="{{ asset('js/app.js') }}"></script>

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
		<ul class="nav-ul">
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
				<i class="fas fa-user-circle"></i>
				<a class="nav-link" href="{{ route('guest.login') }}">Home</a>
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


		<!-- main div -->
		<div class="row">
			<div class="col-md-7 col-sm-12 col-xs-12" style="z-index:20;">
				<!--divide col-->
				<div class="row">
					<div class="col-md-5 col-sm-12 col-xs-12" id="static-section" style="margin-top:-5px ">
						<!--divide col for buttons-->
						<div class="row" style="margin-top:4px;">
							<div class="col-md-6 col-xs-6" style="padding:0px 5px;">
								@if (Auth::check())
								<button type="button" class="grad-box" id="lg-btn" style="padding: 32px 20px;">
									<i class="fas fa-user-circle"></i>
									Logout
								</button>
								<form method="POST" action="{{ route('logout') }}" id="logout-fm">
									@csrf
								</form>
								<script>
									let logoutBtn = document.querySelector('#lg-btn');
										let logoutForm = document.querySelector("#logout-fm");
										logoutBtn.addEventListener('click', (e) => {
											e.preventDefault();
											logoutForm.submit();
										});
									</script>
								@else
								<a href="{{ url('/')}}">
									<button type="button" id="login_btn" class="grad-box" style="padding:50px 32px">
										<i class="fas fa-user-circle"></i>
										Home
									</button> </a>
								@endif
							</div>
							<div class="col-md-6 col-xs-6" style="padding:0px 0px;">
								<a href="{{ route('guest.become_agent') }}"><button type="button" id="sign_up_btn" class="grad-box" style="padding:50px 32px">
										<i class="fas fa-user-plus"></i>
										Become An Agent
									</button></a>
							</div>
						</div>
						<div class="row" style="padding:0px;">
							<div class="col-md-12 col-sm-12" style="padding:0px 5px;">
								<div style="text-align:center;">
									<a href="{{ route('guest.services') }}"><button type="button" id="payment_btn" style="margin:0; background-color: #fff !important; padding:40px 40px; color: #8CC74E;"
										 class="grad-boxa">
											<i class="far fa-credit-card"></i>
											Make Payment
										</button></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-xs-6" style="padding:0px 0px;">
								<a href="{{ route('guest.support') }}"><button type="button" class="grad-box" id="support_btn" style="padding:50px 32px">
										<i class="fas fa-cogs"></i>
										Support
									</button></a>
							</div>
							<div class="col-md-6 col-xs-6" style="padding:0px 0px 5px 5px;">
								<a href="faq">
									<button type="button" class="grad-box" style="padding:50px 52px">
										<i class="fas fa-question-circle"></i>
										FAQ
									</button>
								</a>
							</div>
						</div>
					</div>
					<!--col-6 ends -->
					<div class="col-md-7 col-sm-12 col-xs-12 " id="signup-body" style="padding:3px">
                        
						<div class="user-details sign_up" id="sign-up" style="border-radius:3%">
							<form class="form-signin" action="{{route ('signup')}}" method="POST" style="border:1px solid #ccc">
								{{-- check if referred session is available --}}
								@if(session('referred'))
								<input type="hidden" name="referred" value="{{ session('referred') }}">
								@endif
								<div style="padding:10px;">
									<p class="text-center"><img src="/images/logo1.png"></p>
									<div class="row">
										<div class="col-xs-6 col-sm-6 col-md-6">
											<div class="form-group">
												<label for="first_name">
													<b>First Name</b>
												</label>
												<input type="text" name="first_name" id="first_name" class=" input-sm" placeholder="First Name">
											</div>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-6">
											<div class="form-group">
												<label for="last_name">
													<b>Last Name</b>
												</label>
												<input type="text" name="last_name" id="last_name" class=" input-sm" placeholder="Last Name">
											</div>
										</div>
									
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<label for="email">
												<b>Email</b>
											</label>
											<input type="email" name="email" id="email" class="input-sm" placeholder="Email Address">
										</div>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<label for="mobile">
												<b>Phone Number</b>
											</label>
											<input type="text" name="mobile" id="mobile" class="input-sm" placeholder="Phone Number">
										</div>
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<label for="password">
												<b>Password</b>
											</label>
											<input type="password" name="password" id="password" class="input-sm" placeholder="Password">
										</div>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<label for="password_confirmation">
												<b>Confirm Password</b>
											</label>
											<input type="password" name="password_confirmation" id="password_confirmation" class="input-sm" placeholder="Confirm Password">
										</div>
									</div>
								</div>
								<label>
									<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
								</label>
								
								    <p class="text-center"><input type="submit" value="Register" class="btn btn-success btn registerBtn"></p>
						  
						</form>
					</div>
					</div>
					<!--Sign up ends -->






				</div>
			</div>
			<!---col-md-7 ends -->
		</div>
		<div class="col-md-5" style="padding: 3px 16px 8px 2px;">
			<img src="/images/12.png" class='img-responsive side-img'>
		</div>
	</div>
	</div>
	<!-- row ends -->


	<script>
		$('document').ready(function () {
			if (window.location.hash == "#prepaid-meter") {
				$('.prepaid-modal').modal('toggle', {
					backdrop: false
				});
				// console.log(window.location.hash);
			}
		});
	</script>

	</div>
	</div>

	</div>
	<!--main div ends-->
	</div>
	<div class="footi">Powered by GOENERGEE</div>
	</div>
	@include('partials._search-component')
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
	<script src="/js/sweetalert.min.js"></script>
	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$(".registerBtn").click((e) => {
			e.preventDefault();
			$('.registerBtn').prop('disabled', true);
			$('.registerBtn').html('Creating Account...');
			var formdata = $(".form-signin").serialize();

			$.ajax({
				url: "/account/register",
				method: "POST",
				data: formdata,
				success: (response) => {
					if (response.sus == 1) {
						swal('Successful',
							'Account Registration Successful, We\'ve sent you an email for confirmation to activate your account',
							'success');
						$(this).prop('disabled', false);
					} else {
						swal('Ooops!', '' + response.err + '', 'error');
						$('.registerBtn').prop('disabled', false);
						$('.registerBtn').html('Sign Up');
					}
				},
				error: (err) => {
					console.log(err);
					$('.registerBtn').prop('disabled', false);
					$('.registerBtn').html('Sign Up');
				}
			})

		})
	</script>
</body>

</html>