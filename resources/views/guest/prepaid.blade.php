<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<title>GOENERGEE:::Prepaid Elctricity</title>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	<link rel="stylesheet" href="/css/izi.css">
	<link rel="stylesheet" href="/css/custom/vertical-tab.css">
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


		<!-- main div -->
		<div class="row">
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
						{{-- Categories --}}


						{{-- Meter Payment --}}
						<div class="meter-payment" id="meter_payment">
							<p class="text-center"><img src="/images/ekedc.jpg" width="80" /></p>
							<br>

							<form class="meter" method="post" action="">
								<div class="form-group">
									<label for="Meter_number"><b>Prepaid Meter Number</b></label>
									<input id="meterno" type="text" class="form-control meterno" placeholder="Enter Your PrePaid Meter Number"
									 required autofocus name="meter_no">
								</div>
								<div class="form-group">
									<label for="convinience_fee"><b>Convenience Fee</b></label>
									<input type="number" class="form-control" value="100.00" readonly>
								</div>
								<div class="form-group">
									<label for="amount"><b>Amount</b></label>
									<input type="text" class="form-control meter-amount" placeholder="0.00" required name="amount" id="amount">
								</div>
								<p class="text-center"><button class="btn btn-success pay-meter" type="submit">Continue</button></p>
							</form>
						</div>

					</div>
					<!---make payments ends-->

				</div>
				<!---col-md-7 ends -->
			</div>
			<div class="col-md-5" style="padding: 3px 16px 8px 5px;">
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
	<div class="modal fade" tabindex="-1" role="dialog" style="" id="confirm-payment">
		<div class="modal-dialog " role="document">
			<div class="modal-content">
					<div id="payment-modal">
							{{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
							<!------ Include the above in your HEAD tag ---------->
							
							<div class="container">
								<div class="row">
									<div class="col-lg-5 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
										<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
											<div class="list-group">
											<a href="#" class="list-group-item active text-center">
												<h4 class="fa fa-credit-card"></h4><br/>Card Payment
											</a>
											<a href="#" class="list-group-item text-center">
												<h4 class="fa fa-university"></h4><br/>Bank to Bank
											</a>
											{{-- <a href="#" class="list-group-item text-center">
												<h4 class="glyphicon glyphicon-road"></h4><br/>Train
											</a>
											<a href="#" class="list-group-item text-center">
												<h4 class="glyphicon glyphicon-home"></h4><br/>Hotel
											</a>
											<a href="#" class="list-group-item text-center">
												<h4 class="glyphicon glyphicon-cutlery"></h4><br/>Restaurant
											</a> --}}
											</div>
										</div>
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
											<!-- card section -->
											<div class="bhoechie-tab-content active">
												<center>
													<button class="btn btn-primary btn-lg">Continue to Card Payment</button>
												</center>
											</div>
											<!-- bank section -->
											<div class="bhoechie-tab-content">
												<center>
													<div class="form-group">
														<label>Please Select Your Bank</label>
														<select class="form-control" name="bank_payment" id="bank_payment">
															<option value="Diamond">Diamond Bank</option>
															<option value="Zenith">Zenith Bank</option>
														</select>
													</div>
													<div class="other">
														<div class="form-group">
															<label>Please Enter Your Account Number</label>
															<input type="text" class="form-control" name="account">
														</div>
													</div>
												</center>
											</div>
								
											<!-- hotel search -->
											<div class="bhoechie-tab-content">
												<center>
													<h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>
													<h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
													<h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
												</center>
											</div>
											<div class="bhoechie-tab-content">
												<center>
													<h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
													<h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
													<h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
												</center>
											</div>
											<div class="bhoechie-tab-content">
												<center>
													<h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
													<h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
													<h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
												</center>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				<div class="modal-header headermodal text-center">
					<br>
					<img src="/images/ekedc.jpg" width="60" />
					<span style="font-size: 16px"> </span>
				</div>
				<div class="modal-body">
					<h3 class="modal-title text-center ">Confirm Details</h3>
					<br>
					<form id="payForm" method="POST" action="">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<p><label>Meter No</label>
										<input class="form-control" value="" id="meter_no" name="meter_no" readonly />
									</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Total Amount</label>
									<input class="form-control" value="" id="total" name="amount" readonly />
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Firstname</label>
									<input class="form-control" value="" id="firstname" name="first_name" readonly />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>lastname</label>
									<input class="form-control" value="" id="lastname" name="last_name" readonly />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" value="" id="emailret" name="email" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Phone Number</label>
									<input class="form-control" value="" id="phoneret" name="mobile" />
								</div>
							</div>
							<div class="col-md-12">
							{{-- <p class="text-center form-group"> --}}
								<input type="button" class="btn btn-primary" id="ctnPay" value="Continue to Payment">
								<input type="button" value="Cancel Payment" class="btn btn-outline-danger" onclick="window.location.reload()">
							{{-- </p> --}}
							</div>
						</div>
				</div>
				</form>
			</div>
		</div>
	</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->



	</div>
	</div>

	</div>
	<!--main div ends-->
	</div>
	

	<div class="footi">Powered by GOENERGEE</div>
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
	@include('partials._search-component')
	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>
	<script src="/js/izi.js"></script>
	<script src="https://js.paystack.co/v1/inline.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	<script>
		$(".pay-meter").click((e) => {
			e.preventDefault();
			$(".pay-meter").prop('disabled',true);
			if (navigator.onLine) {
				let amount = $("#amount").val();

				if (parseInt(amount) < 900) {
					$.alert({
						title: 'Invalid Amount!',
						content: `Amount Cannot be lesser than N900`,
						type: 'red',
						buttons: {
							gotit: {
								text: 'Got It!',
								btnClass: 'btn-red'
							}
						}
					});
					$(".pay-meter").prop('disabled',false);
				} else {
					$('.pay-meter').html('Validating....');
					let meter_no = $('#meterno').val();
					
					fetch(`/ekedc/validate-customer/OFFLINE_PREPAID/${meter_no}`)
						.then(res => res.json())
						.then(result => {
							console.log(result);
							if (result.response.retn !== 0) {
								$.alert({
									title: 'Ooops!',
									content: `${result.response.error} <br> Please Ensure your enter the correct <b>Meter Number</b>`,
									type: 'red',
									buttons: {
										ok: {
											text: 'Try Again',
											btnClass: 'btn-red'
										}
									}
								});
								$('.pay-meter').html('Continue');
								$(".pay-meter").prop('disabled',false);
							} else {
								console.log(result);
								let {
									name
								} = result.response.customerInfo;
								let names = name.split(' ', 2);
								console.log(names[0]);
								$("#firstname").val(names[0]);
								$("#lastname").val(names[1]);
								$("#emailret").val('');
								$("#phoneret").val('');
								$("#meter_no").val($("#meterno").val());
								$("#total").val(parseInt($(".meter-amount").val()) + 100);
								setTimeout(() => {
									$('.pay-meter').html('Validated');
									toggleMod();
								}, 2000);
							}
						})
						.catch(err => {
							// alert('Sorry Something Went Wrong');
							console.log(err);
							$.alert({
								title: 'Ooops!',
								content: 'Something Bad Went Wrong',
								type: 'red',
								buttons: {
									ok: {
										text: 'Got It',
										btnClass: 'btn-red'
									}
								}
							});
							$('.pay-meter').html('Continue');
							$(".pay-meter").prop('disabled',false);
						});
				}
			} else {
				$.alert({
					title: 'Ooops!',
					content: 'Seems you"re disconnected',
					type: 'red',
					buttons: {
						ok: {
							text: 'Got It',
							btnClass: 'btn-red'
						}
					}
				});
				$(".pay-meter").prop('disabled',false);
			}
		})
		$("#ctnPay").click((e) => {
			$("#ctnPay").html('Connecting to Gateway..').prop('disables', true);
			e.preventDefault();
			if ($("#emailret").val() == "") {
				alert('Please Enter an email address');
			}else {
				let payload = {
					'meter_no': '' + $("#meterno").val() + '',
					'first_name': '' + $('#firstname').val() + '',
					'last_name': '' + $('#lastname').val() + '',
					'email': '' + $('#emailret').val() + '',
					'mobile': '' + $('#phoneret').val() + '',
					'amount': '' + $('.meter-amount').val() + '',
				};
				continuePay(payload);
			}
		});

		function continuePay(payload) {
			$.ajax({
				url: '/payment/hold',
				method: 'POST',
				data: payload,
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
			let meterNo = "{{ session('payment_details')['meter_no']}}";
			var chargedAmount = parseInt(amountMeter) + 100;
			var handler = PaystackPop.setup({
				key: "{{ env('PS_KEY') }}",
				email: document.querySelector('#emailret').value,
				amount: chargedAmount + "00",
				ref: "GOEPRE" + Math.floor((Math.random() * 1000000000) + 1),
				callback: function (response) {
					// charge wallet
					let dataBack;
					fetch(`/ekedc/charge-wallet/${amountMeter}/OFFLINE_PREPAID/${meterNo}`)
						.then(res => res.json())
						.then(result => {
							console.log(result);
							dataBack = result;
						})
						.catch(err => console.log(err));
					// generate token

					// setTimeout(() => {
					// 	window.location.href = '/payment/' + response.reference + '/success';
					// }, 1000);
				},
				onClose: function () {
					alert('Payment Cancelled');
					$('.pay-meter').html('Continue');
					window.location.reload();
				}
			});
			handler.openIframe();
		}

		function toggleMod() {
			$('#confirm-payment').modal('toggle');
		}
	</script>
	<script>
		$(document).ready(function() {
			$(".other").css({"display":"none"});
			$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
				e.preventDefault();
				$(this).siblings('a.active').removeClass("active");
				$(this).addClass("active");
				var index = $(this).index();
				$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
				$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
			});

			$("#bank_payment").change(function() {
				$(".other").css({
					"transition":"all .2s cubic-bezier(0, 0.01, 0.35, 0.91)",
					// "display":"block"
				});
			});

			$("#payment-modal").iziModal('open');
		});
	</script>
</body>

</html>