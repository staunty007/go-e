<!DOCTYPE html>

<head>
	<title>GOENERGEE</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="/images/favicon.png" rel="shortcut icon" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
	<link href="/css/main.css" rel='stylesheet' media="screen, projection" type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/css/animate.css" rel="stylesheet">
	<!-- <link href="/css/application.css" rel="stylesheet"> -->
	<link href="/css/emojione.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="{{asset('css/custom.css')}}" rel="stylesheet">
	<!---Bootstrap CDN-->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>

		const baseUrl = "https://certify.diamondbank.com/diamondconnecttest/";
		let accessToken = "";
		
		// Connect to Diamond Initialization
		const payload = { 
			'grant_type': 'client_credentials', 
			'client_id': '4E6979C7F4E140E',
			'client_secret' : 'QUEzQjY4MTctQkJDOS00NkRGLTgyRTUtN0QyQjkzQzA3MzUw'
		};
		

		// Get Access token and store
		$.ajax({
			url: `${baseUrl}oauth/token`,
			method: 'POST',
			data: payload,
			headers: {
				'Content-Type':'application/x-www-form-urlencoded',
			},
			success: (response) => {
				accessToken = response.access_token;
				// Store Access token for later use
				localStorage.setItem('access_token',accessToken);
			},
			error: (err) => {
				console.error(err);
			}
		});

	</script>
	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>
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
</head>

<body class="bg-img">

	<style type="text/css">
		/* @media only screen and (min-width: 480px) { */

		.bg-img {
			background: linear-gradient(rgba(0, 0, 0, 0.10), rgba(0, 0, 0, 0.20)), url('/images/transformers.jpg') no-repeat;
		}

		/* For mobile phones: */

		#boot_msg {
			width: 60% !important;
			z-index: 1028 !important;
			position: fixed !important;
			text-align: center !important;
			top: 120px !important;
			left: 20% !important;
			right: 20% !important;
		}

		#boot_msg {
			width: 25%;
			z-index: 1028;
			position: fixed;
			text-align: center;
			top: 90px;
			left: 38%;
			right: 33%
		}

		.bootstrap_msg .alert {
			/*margin: 0 auto;*/
			padding: 6px 28px 8px 13px;
			margin-bottom: 0px;
		}
	</style>


		<!-- header navbar -->
		
		<div class="container">
			<div class="row">
				<div class="col-xs-5 col-md-3 col-lg-3">
					<a href="http://GOENERGEE.com/">
						<img src="/images/logo.png">
					</a>
				</div>
				<div class="col-xs-7 col-md-3 col-lg-9">
					<div class="navbar headernav1">
						<ul>
							<li style="border-color:#28a9e0; background:#28a9e0;">
								<a href="#">
									<i class="fab fa-twitter" style="color:#ffffff;"></i>
								</a>
							</li>
							<li style="border-color:#0b78b6; background:#0b78b6;">
								<a href="#">
									<i class="fab fa-linkedin-in" style="color:#ffffff;"></i>
								</a>
							</li>
							<li style="border-color:#f20951; background:#f20951;">
								<a href="#">
									<i class="fab fa-instagram" style="color:#ffffff;"></i>
								</a>
							</li>
							<li style="border-color:#3d578e; background:#3d578e;">
								<a href="#">
									<i class="fab fa-facebook-f" style="color:#ffffff;"></i>
								</a>
							</li>

							<li style="border:0px;">
								<form>
									<input type="search" style="border:0px; padding:4px; border-radius: 10px 0 0 10px; width:86%;" placeholder="Search.." name="search">
									<button type="submit" style="background-color:#a1c844; border-radius: 0 10px 10px 0px; border:0px; padding:4px; margin-left:-5px;">
										<a href="#" style="color:white;">
											<i class="fas fa-search"></i>
										</a>
									</button>
								</form>
							</li>
							@if (Auth::check())
							<li style="border: none; color: #fff;">
								<p style="font-size: 1.5em">Welcome {{ Auth::user()->first_name}}</p>
							</li>
							@endif
						</ul>

					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
							<li data-target="#myCarousel" data-slide-to="3"></li>
							<li data-target="#myCarousel" data-slide-to="4"></li>

							<li data-target="#myCarousel" data-slide-to="5"></li>
							<li data-target="#myCarousel" data-slide-to="6"></li>
							<li data-target="#myCarousel" data-slide-to="7"></li>
							<li data-target="#myCarousel" data-slide-to="8"></li>
							<li data-target="#myCarousel" data-slide-to="9"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<img src="images/rev_image/1.png">
							</div>

							<div class="item">
								<img src="images/rev_image/2.png">
							</div>

							<div class="item">
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
							</div>
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


			<!-- main div -->
			<div class="row">
				<div class="col-md-7 col-sm-12 col-xs-12" style="z-index:20;">

					<!--divide col-->
					<div class="row">
						<div class="col-md-5 col-sm-12 col-xs-12" style="margin-top:-5px ">
							<!--divide col for buttons-->
							<div class="row">
								<div class="col-md-6 col-xs-6" style="padding:0px 5px;">

									<button type="button" id="login_btn" class="grad-box" style="padding: 32px 20px;">

										<i class="fas fa-user-circle"></i>
										Login

									</button>

								</div>

								<div class="col-md-6 col-xs-6" style="padding:0px 5px;">
									<button type="button" id="sign_up_btn" class="grad-box" style="padding: 32px 20px;">

										<i class="fas fa-user-plus"></i>
										Sign Up

									</button>
								</div>

							</div>

							<div class="row" style="padding:0px;">
								<div class="col-md-12 col-sm-12" style="padding:0px 5px;">
									<div style="text-align:center;">

										<button type="button" id="payment_btn" style="margin:0; background-color:white; padding:40px 40px;" class="grad-boxa shake">
											<a href="#" style="color:#80c636">
												<i class="far fa-credit-card"></i>
												Make Payment
											</a>
										</button>

									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-md-6 col-xs-6" style="padding:0px 5px;">


									<button type="button" class="grad-box" id="support_btn" style="padding: 32px 20px;">
										<i class="fas fa-cogs"></i>
										Support
									</button>

								</div>

								<div class="col-md-6 col-xs-6" style="padding:0px 5px;">
									<a href="faq">
										<button type="button" class="grad-box" style="padding: 32px 20px;">
											<i class="fas fa-question-circle"></i>

											FAQ


										</button>
									</a>
								</div>

							</div>

						</div>
						<!--col-6 ends -->

						<div class="col-md-7 col-sm-12 col-xs-12" style="padding:3px">

							<!--Default div -->
							<div id="news">
								<div class="text-insert" style="margin-bottom:10px;">
									<h4 style="margin-bottom:10px; color:#80c636">More Power Options to Recharge!</h4>

									<h5 style="">
										<b>GOENERGEE</b> is available on these alternative channels.</h5>
									<h5 style="">
										<b>mCASH: </b>Simply dial
										<b>*402*00009130*Amount#</b> and dial our customer helpdesk.</h5>
									<h5 style="">
										<b>POS: </b>Take advantage of our POS terminals available closest to you with our Agent.</h5>
									<h5 style="">
										<b>CASH: </b>Take advantage of our
										<b>SALES</b> outlets closest to you and transact with our Agent.</h5>



								</div>
								<img src="/images/banne.jpg" class="img-responsive" style="width:100%; border-radius:10px; max-height:180px;">
							</div>
							<!--Default div ends -->


							<!--Login div -->
							<div class="user-details" id="login" style="">
								<div style="">
									<div class="text-center login-title">
										<h4>LOGIN TO</h4>
										<img src="/images/logo.png"> </div>

									<div class="account-wall" style="text-align:center;">
										<hr>
										<form class="login-form" action="" method="POST">
											<div class="form-group">
												<input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
											</div>
											<div class="form-group">
												<input type="password" class="form-control" placeholder="Password" name="password" required>
											</div>
											<button class="btn btn-info btn-block login-btn" type="submit">
												Login</button>
											<label class="checkbox">
												<input type="checkbox" value="remember-me"> Remember me
											</label>
										</form>
									</div>


									<p style="text-align:center; font-size:13px;margin-top:15px;"> You can also login with:</p>

									<p style="text-align:center; margin-top:-5px;">
										<a class="btn btn-primary social-login-btn " href="{{ url('/login/facebook') }}" style="background-color:#3d578e;">
											<i class="fab fa-facebook-f"></i>
										</a>
										<a class="btn btn-primary social-login-btn " href="{{ url('/login/twitter') }}" style="background-color:#28a9e0;">
											<i class="fab fa-twitter"></i>
										</a>
										<a class="btn btn-primary social-login-btn " href="{{ url('/login/linkedin') }}" style="background-color:#0b78b6;">
											<i class="fab fa-linkedin-in"></i>
										</a>
										<a class="btn btn-primary social-login-btn " href="{{ url('/login/google') }}" style="background-color:#d52727;">
											<i class="fab fa-google-plus-g"></i>
										</a>




								</div>
							</div>
							<!---log in ends-->

							<!---sign-up starts-->
							<div class="user-details" id="sign-up" style="">

								<form class="form-signin" action="signup.php" method="POST" style="border:1px solid #ccc">
									<div style="padding:10px;">
										<div class="text-center login-title">
											<h4>SIGN UP ON</h4>
											<img src="/images/logo.png"> </div>
										<p style="text-align:center">Please fill in this form to create an account.</p>
										<hr>
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
										</div>

										<div class="form-group">
											<label for="email">
												<b>Email</b>
											</label>
											<input type="email" name="email" id="email" class="input-sm" placeholder="Email Address">
										</div>
										<div class="form-group">
											<label for="mobile">
												<b>Phone Number</b>
											</label>
											<input type="text" name="mobile" id="mobile" class="input-sm" placeholder="Phone Number">
										</div>


										<div class="row">
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

										<!--<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>-->

										<p style="text-align:center; font-size:13px;margin-top:1px;"> Sign Up with:</p>

										<p style="text-align:center; margin-top:-5px;">
											<a class="btn btn-primary social-login-btn " href="{{ url('/login/facebook') }}" style="background-color:#3d578e;">
												<i class="fab fa-facebook-f"></i>
											</a>
											<a class="btn btn-primary social-login-btn " href="{{ url('/login/twitter') }}" style="background-color:#28a9e0;">
												<i class="fab fa-twitter"></i>
											</a>
											<a class="btn btn-primary social-login-btn " href="{{ url('/login/linkedin') }}" style="background-color:#0b78b6;">
												<i class="fab fa-linkedin-in"></i>
											</a>
											<a class="btn btn-primary social-login-btn " href="{{ url('/login/google') }}" style="background-color:#d52727;">
												<i class="fab fa-google-plus-g"></i>
											</a>
										</p>
										<input type="submit" value="Register" class="btn btn-info btn-block registerBtn">
									</div>
								</form>

							</div>
							<!--Sign up ends -->

							<!---make payments starts-->
							<div id="make_payments" style="">
								<div class="text-center login-title">
									<img src="/images/logo.png"> </div>
								<h4>Your Next Electricity Bill Payment</h4>
								<h5>is just a few clicks away</h5>
								<br>

								<form>
									<div class="radio" id="one">
										<label>
											<input type="radio" name="one">EKEDC Meter Payment
										</label>
									</div>
									<div class="radio" id="two">
										<label>
											<input type="radio" name="two">AEDC Meter Payment
										</label>
									</div>
									<div class="radio" id="two">
										<label>
											<input type="radio" name="two">BEDC Meter Payment
										</label>
									</div>
									<div class="radio" id="two">
										<label>
											<input type="radio" name="two">EEDC Meter Payment
										</label>
									</div>
									<div class="radio" id="two">
										<label>
											<input type="radio" name="two">IBEDC Meter Payment
										</label>
									</div>
									<div class="radio" id="two">
										<label>
											<input type="radio" name="two">IKEDC Meter Payment
										</label>
									</div>
									<div class="radio" id="two">
										<label>
											<input type="radio" name="two">JEDC Meter Payment
										</label>
									</div>
									<div class="radio" id="two">
										<label>
											<input type="radio" name="two">KNEDC Meter Payment
										</label>
									</div>
									<div class="radio" id="two">
										<label>
											<input type="radio" name="two">KEDC Meter Payment
										</label>
									</div>
									<div class="radio" id="two">
										<label>
											<input type="radio" name="two">PHEDC Meter Payment
										</label>
									</div>
									<div class="radio" id="two">
										<label>
											<input type="radio" name="two">YEDC Meter Payment
										</label>
									</div>
									
								</form>

								<button class="btn btn-rounded" id="three">Prepaid</button>
								<a href="{{ route('postpaid') }}" target="_blank" id="postPaid">
									<button class="btn btn-rounded" id="four">Postpaid</button>
								</a>


								<div class="row form-section" style=" margin:6px auto; padding:4px;">
									<div class="">
										<form class="meter" method="post" action="">
											<div class="form-group">
												<label for="Meter_number">
													<b>Meter Number</b>
												</label>
												<input id="meterno" type="text" class="form-control" placeholder="Enter Your Pre Paid Meter Number" required autofocus name="meter_no">
											</div>
											<div class="form-group">
												<label for="convinience_fee">
													<b>Convenience Fee</b>
												</label>
												<input type="number" class="form-control" value="100.00" readonly>
											</div>
											<div class="form-group">
												<label for="amount">
													<b>Amount</b>
												</label>
												<input type="text" class="form-control meter-amount" placeholder="0.00" required name="amount" id="amount">
											</div>

											<button class="btn btn-success btn-block pay-meter" type="submit">
												Continue</button>
											<label style="padding:20px;" class="checkbox ">
												<input type="checkbox" value="remember-me"> Remember me
											</label>

									</div>
								</div>
							</div>
							<!---make payments ends-->
							<div id="support">
								<div class="text-center login-title">
									<img src="images/logo.png"> </div>
								<h4 style="color:#80c636">
									<b>
										<div class="text-center login-title">Customer Support Service</b>
								</h4>
								<h5 style="color:#80c636">
									<b>Head Office</b>
								</h5>
								<h5>
									<b>Contact Address:</b> Plot 18 Fatai Idowu Arobieke, off Admiralty road, Lekki Phase 1, Lagos</h5>
								<h5>
									<b>Phone:</b> 08052313815</h5>
								<h5>
									<b>Email:</b> customersupport@goenergee.com</h5>

								</div>

							</div>
							<!---col-md-7 ends--->

						</div>
					</div>


					<div class="col-md-5" style="padding: 3px 16px 8px 5px;">
						<img src="/images/12.png" class='img-responsive side-img'>

					</div>
				</div>
			</div>
			<!-- row ends -->
			<br>

			<script>
				$('document').ready(function () {
					$(".hidden-button").fadeOut();
					$(".form-section").fadeOut();
					$(".table-section").fadeOut();


					$("#three").hide();
					$("#four").hide();

					$("#one").click(function () {
						$(".hidden-button").fadeToggle(500);
						$("#one").hide();
						$("#two").hide();
						$("#three").show();
						$("#four").show();
					});

					$("#two").click(function () {
						$(this).addClass('disabled');
					});

					$("#three").click(function () {
						$(".table-section").fadeOut();
						$(".form-section").fadeToggle(500);
						$("#one").hide();
						$("#two").hide();
						$("#postPaid").hide();

					});

					$("#four").click(function () {
						$(".form-section").fadeOut();
						$(".table-section").fadeToggle(500);
						$("#one").hide();
						$("#two").hide();


					});
					$("#login").hide();
					$("#sign-up").hide();
					$("#make_payments").hide();
					$("#support").hide();


					$("#login_btn").click(function () {

						$("#login").show(500);
						$("#sign-up").hide();
						$("#news").hide();
						$("#make_payments").hide();
						$("#support").hide();

					});

					$("#sign_up_btn").click(function () {
						$("#sign-up").show(400);
						$("#news").hide();
						$("#login").hide();
						$("#make_payments").hide();
						$("#support").hide();

					});

					$("#payment_btn").click(function () {
						$("#make_payments").show(600);
						$("#news").hide();
						$("#login").hide();
						$("#sign-up").hide();
						$("#support").hide();


					});

					$("#support_btn").click(function () {

						$("#support").show(400);
						$("#news").hide();
						$("#login").hide();
						$("#sign-up").hide();
						$("#make_payments").hide();

					});

				});
			</script>
			<div class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						{{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
						<h4 class="modal-title">Confirm Details</h4>
					</div>
					<div class="modal-body">
						<form id="payForm" method="POST" action="">
							<div class="form-group">
								<label>Meter No</label>
								<input class="form-control" value="" id="meter_no" name="meter_no" readonly/>
							</div>
							<div class="form-group">
								<label>Firstname</label>
								<input class="form-control" value="" id="firstname" name="first_name" readonly/>
							</div>
							<div class="form-group">
								<label>lastname</label>
								<input class="form-control" value="" id="lastname" name="last_name" readonly/>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" value="" id="emailret" name="email" readonly/>
							</div>
							<div class="form-group">
								<label>Phone Number</label>
								<input class="form-control" value="" id="phoneret" name="mobile" readonly/>
							</div>
							<div class="form-group">
								<label>Total Amount</label>
								<input class="form-control" value="" id="total" name="amount" readonly/>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						
						<button type="button" class="btn btn-primary" id="ctnPay">Continue to Payment</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel Payment</button>
					</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

			<footer>
				Powered by GOENERGEE
			</footer>

		</div>
		</div>

		</div>
		<!--main div ends-->
		</div>
		</div>



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
			$(".registerBtn").click((e) => {
				e.preventDefault();
				$('.registerBtn').prop('disabled', true);
				$('.registerBtn').html('Creating Account...');
				var formdata = $(".form-signin").serialize();

				$.ajax({
					url: "account/register",
					method: "POST",
					data: formdata,
					success: (response) => {
						if (response.sus == 1) {
							swal('Successful', 'Account Registration Successful', 'success');
							$(this).prop('disabled', false);
							setTimeout(() => {
								window.location.href = '/registration/verify';
							}, 2000);

						} else {
							//console.log(response);
							swal('Ooops!', '' + response.err + '', 'error');
							$('.registerBtn').prop('disabled', false);
							$('.registerBtn').html('Sign Up');
						}
					},
					error: (err) => {
						console.log(err);
					}
				})
				$('.registerBtn').prop('disabled', false);
				$('.registerBtn').html('Sign Up');
			})

			$(".login-btn").click((e) => {
				e.preventDefault();
				$('.login-btn').html('Logging In...');
				var formData = $(".login-form").serialize();

				$.ajax({
					url: '/account/login',
					method: 'POST',
					data: formData,
					success: (response) => {
						if (response.sus == 1) {
							setTimeout(() => {
								swal('Successful', 'Login Successful', 'success');
								$(this).prop('disabled', false);
								setTimeout(() => {
									window.location.href = '/home';
								}, 2000);
							})
						} else {
							//console.log(response);
							swal('Ooops!', '' + response.err + '', 'error');
							$('.login-btn').prop('disabled', false);
						}
					}
				})
				$('.login-btn').prop('disabled', false);
			})
		</script>

		<!---modal-->
		<script src="https://js.paystack.co/v1/inline.js"></script>
		<script>
			
			$(".pay-meter").click((e) => {
				e.preventDefault();
				$('.pay-meter').html('Validating....');
				// var formdata = $('.meter').serialize();
				var meter_no = $('#meterno').val();
				//toggleMod();	
				$.ajax({
					url: 'meter/api',
					method: 'GET',
					data: { meter_no: meter_no},
					success: (res) => {
						if(res.code == 419) {
							swal('Ooops','Invalid Meter No.','error');
							$('.pay-meter').html('Continue');
						}else {
							console.log(res);
							$("#firstname").val(res.first_name);
							$("#lastname").val(res.last_name);
							$("#emailret").val(res.email);
							$("#phoneret").val(res.phone);
							$("#meter_no").val($("#meterno").val());
							$("#total").val(parseInt($(".meter-amount").val()) + 100);
							toggleMod();
							
						}
						// console.log(res);
					}
				});

				
				//$('.pay-meter').prop('disabled', false);
			})
			$("#ctnPay").click((e) => {
				$("#ctnPay").html('Connecting to Gateway..').prop('disables',true);
				e.preventDefault();
				var toBeTransported = {
					'meter_no': ''+$("#meterno").val()+'',
					'first_name': ''+$('#firstname').val()+'',
					'last_name': ''+$('#lastname').val()+'',
					'email': ''+$('#emailret').val()+'',
					'mobile': ''+$('#phoneret').val()+'',
					'amount': ''+$('.meter-amount').val()+'',
				};
				continuePay(toBeTransported);
			});

				function continuePay(toBeTransported) {
				$.ajax({
					url: 'payment/hold',
					method: 'POST',
					data: toBeTransported,
					success: (response) => {
						if (response.code == "ok") {
							console.log(response.text);
							payWithPaystack();
						}
					},
					error: (err) => {
						$('.pay-meter').html('Continue');
					}
				});
				}
			function payWithPaystack() {
				var amountMeter = document.querySelector('.meter-amount').value;

				var chargedAmount = parseInt(amountMeter) + 100;

				var handler = PaystackPop.setup({
					key: 'pk_test_120bd5b0248b45a0865650f70d22abeacf719371',
					email: document.querySelector('#emailret').value,
					amount: chargedAmount + "00",
					ref: Math.floor((Math.random() * 1000000000) + 1) + "TRANSREF",
					callback: function (response) {
						// swal('Yay!', 'Payment Successful', 'success');
						setTimeout(() => {
							window.location.href = '/payment/' + response.reference + '/success';
						}, 1000);
					},
					onClose: function () {
						alert('Payment Cancelled');
						$('.pay-meter').html('Continue');
					}
				});
				handler.openIframe();
			}
			function toggleMod() {
				$('.modal').modal('toggle');
			}
		</script>
	</body>

	</html>