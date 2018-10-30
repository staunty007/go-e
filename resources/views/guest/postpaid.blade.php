<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<title>GOENERGEE:::Post Paid Billing System</title>
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<!--Start Calculation script-->
<script type="text/javascript">
	function num(id) {
		var e = document.getElementById(id);
		if (e != null) {
			var v = e.value;
			if (/^\\d+$/.test(v)) {
				return parseInt(v, 10);
			}
		}
		return 0;
	}
	function sum() {
		var subtotal1 = num("subtotal1");
		var subtotal2 = num("subtotal2");
		var subtotal3 = num("subtotal3");
		var subtotal4 = num("subtotal4");
		var r = document.getElementById("result");
		if (r != null) {
			r.value = subtotal1 + subtotal2 + subtotal3 + subtotal4;
		}
	}
	function addHandler(element, eventName, handler) {
		if (element.addEventListener) {
			element.addEventListener(eventName, handler, false);
		} else if (element.attachEvent) {
			element.attachEvent("on" + eventName, handler);
		}
	}
</script>

<!--End calculation Script-->

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

			<li class="nav-item item">
				<i class="fas fa-user-plus"></i>
				<a class="nav-link" href="{{ route('guest.signup') }}">Sign Up</a>
			</li>
			<li class="nav-item item">
				<i class="fas fa-user-circle"></i>
				<a class="nav-link" href="{{ route('guest.login') }}">Login</a>
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


		<!-- main div -->			<div class="row">
					<div class="col-md-7 col-sm-12 col-xs-12" style="z-index:20;">
							<!--divide col-->
							<div class="row">
								<div class="col-md-5 col-sm-12 col-xs-12" style="margin-top:-2px ">
									<!--divide col for buttons-->
									<div class="row" style="margin-top:2px;">
										<div class="col-md-6 col-xs-6" style="padding:0px 2px;">
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
											<a href="{{ route('guest.login') }}">
												<button type="button" id="login_btn" class="grad-box" style="padding:50px 32px">
													<i class="fas fa-user-circle"></i>
													Login
												</button></a>
											@endif
										</div>
										<div class="col-md-6 col-xs-6" style="padding:0px 2px;">
											<a href="{{ route('guest.login') }}"><button type="button" id="sign_up_btn" class="grad-box" style="padding:50px 32px">
													<i class="fas fa-user-plus"></i>
													Sign Up
												</button></a>
										</div>
									</div>
									<div class="row" style="padding:0px;">
										<div class="col-md-12 col-sm-12" style="padding:0px 2px;">
											<div style="text-align:center;">
												<a href="{{ route('guest.services') }}"><button type="button" id="payment_btn" style="margin:0px 0px; background-color: #fff !important; padding:40px 40px; color: #8CC74E;"
													 class="grad-boxa">
														<i class="far fa-credit-card"></i>
														Make Payment
													</button></a>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-6" style="padding:0px 2px;">
											<a href="{{ route('guest.support') }}"><button type="button" class="grad-box" id="support_btn" style="padding:50px 32px">
													<i class="fas fa-cogs"></i>
													Support
												</button></a>
										</div>
										<div class="col-md-6 col-xs-6" style="padding:0px 2px;">
												<a href="{{ route('guest.faq') }}">
												<button type="button" class="grad-box" style="padding:50px 52px">
													<i class="fas fa-question-circle"></i>
													FAQ
												</button>
											</a>
										</div>
									</div>
								</div>
					<!--col-6 ends -->

					<div id="make_payments">
						
						<div id="postpaid">
							<form class="postpay" action="" method="POST">
								<div class="row">
									<div class="col-md-12">
											<p class="text-center"><img src="/images/ekedc.jpg" width="80"/></p>
											<input type="text" name="meter_no" class="meterno form-control" placeholder="Account or Meter Number" value="">
									</div>
									{{-- <div class="col-md-6">
										<div class="form-group">
											<label for="">Firstname</label>
											<input type="text" name="first_name" class="meterno form-control" value="">
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Lastname</label>
											<input type="text" name="last_name" class="meterno form-control" value="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Email Address</label>
											<input type="email" name="email" class="email form-control" value="">
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Phone Number</label>
											<input type="text" name="mobile" class="mobile form-control" value="">
										</div>
									</div> --}}

									<div class="clearfix"></div>
									<div class="col-md-12">
										{{-- <div class="form-group">
											<label for="">Amount</label>
											<input type="text" name="amount" placeholder="0.00" class="amount form-control">
										</div> --}}
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="name2">
												<input type="checkbox" id="postPaidPaymentCheckbox" />
												Postpaid Payment
											</label>
											<input id="postPaidPaymentInput" id="v1" placeholder="0.00" class="prc" name="name2" type="text"
											 disabled="disabled"/>
											<span class="form-msg" id="form-msg"></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="reconnection">
												<input type="checkbox" id="reconnectionPaymentCheckbox" />
												Reconnection Fee
											</label>

											<input id="reconnectionPaymentInput" placeholder="0.00" class="prc" name="reconnection" type="text"
											 disabled="disabled" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="penalties">
												<input type="checkbox" id="penaltiesPaymentCheckbox" />
												Penalties
											</label>
											<input id="penaltiesPaymentInput" placeholder="0.00" class="prc" name="penalties" type="text"
											 disabled="disabled"/>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="revenuee">
												<input type="checkbox" id="revenuePaymentCheckbox" />
												Loss of Revenue
											</label>
											<input id="revenuePaymentInput" placeholder="0.00" class="prc" name="revenue" type="text"
											 disabled="disabled" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Convenience Fee</label>
											<input type="text" name="conv_fee" value="100.00" id="conv_fee"  class="prc" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Total</label>
											<output type="number" readonly name="result" id="result"></output>
										</div>
									</div>
									{{-- <div class="form-group">
										<label for="total">
											Total
										</label>
										<input id="totalPayment" class="form-control" name="total" type="text" />
									</div> --}}
								</div>
								<input type="hidden" id="payType" value="" />
								<div class="col-md-12">
									<div class="form-group">
										<p class="text-center"><button class="btn btn-success" id="payPostpaid">Continue</button></p>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
			<!---col-md-7 ends -->
		
		<div class="col-md-5" style="padding: 3px 16px 8px 5px;">
			<img src="/images/12.png" class='img-responsive side-img'>
		</div>
	</div>
	</div>
	<!-- row ends -->




	</div>
	</div>

	</div>
	<!--main div ends-->
	</div>
	<div class="footi">
		Powered by <b>GOENERGEE</b>
	</div>
	</div>
	{{-- <script>
	let totalSum = 0;
	$('.form-group').on('input','.prc',function(){
		$('.form-group .prc').each(function(){
			var inputVal = $(this).val();
			if($.isNumeric(inputVal)){
				totalSum += parseFloat(inputVal);
			}
		});
		$('#result').text(totalSum)
	});

	let paypostpaid = document.querySelector("#payPostpaid");
	let total = document.querySelector("#result").value;
	paypostpaid.addEventListener('click',function (e){
		e.preventDefault();
		alert(totalSum);
	});
	</script> --}}


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
	<script src="{{ asset('js/app.js') }}"></script>
	@include('partials._search-component')
	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>
	<script src="https://js.paystack.co/v1/inline.js"></script>
	<script>
		// Payment Handler
	</script>
	
</body>

</html>