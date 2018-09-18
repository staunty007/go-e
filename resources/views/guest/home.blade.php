<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
<body class="bg-img" id="banner">
	    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class="container">
			<div class="row" style="margin: 1em 0 3em 0">
				<div class="col-xs-12 col-md-3 col-lg-3 col-sm-12">
				<a href="{{ url('/')}}">
						<img src="/images/logo.png" class="media-query-logo" height="20" style="margin-top: 1em;">
					</a>
				</div>
				<div class="col-xs-12 col-md-9 media-query-body col-lg-9 col-sm-12">	
					<div class="row media-query-row">
						<div class="col-md-8 col-lg-9 media-query-search">
							<div class="input-group media-input-group "  style="width: 100%; text-align: right;">
								<input type="text" class="form-control media-query-input" placeholder="Search" aria-describedby="basic-addon1" style="
								width: 60%;
								float:  right;
								padding: 1.5em;
								border-radius:  0;
								text-align: center;
								" onkeyup="listServices()" id="searchForm">
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
			
			<div class="row media-query-a" style="margin-bottom: 10px;">
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
			<!-- main div -->
			<div class="row">
				<div class="col-md-7 col-sm-12 col-xs-12" style="z-index:20;">
					<!--divide col-->
					<div class="row">
						<div class="col-md-5 col-sm-12 col-xs-12" style="margin-top:-5px ">
							<!--divide col for buttons-->
							<div class="row">
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
									<a href="{{ route('guest.login') }}">
									<button type="button" id="login_btn" class="grad-box" style="padding:50px 32px">
									<i class="fas fa-user-circle"></i>
										Login
									</button></a>						
									@endif
								</div>
								<div class="col-md-6 col-xs-6" style="padding:0px 5px;">
									<a href="{{ route('guest.login') }}"><button type="button" id="sign_up_btn" class="grad-box" style="padding:50px 32px">
									<i class="fas fa-user-plus"></i>
										Sign Up
									</button></a>
								</div>
							</div>
							<div class="row" style="padding:0px;">
								<div class="col-md-12 col-sm-12" style="padding:0px 5px;">
									<div style="text-align:center;">
										<a href="{{ route('guest.services') }}" ><button type="button" id="payment_btn" style="margin:0; background-color: #fff !important; padding:40px 40px; color: #8CC74E;" class="grad-boxa">
												<i class="far fa-credit-card"></i>
												Make Payment
										</button></a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-xs-6" style="padding:0px 5px;">
									<a href="{{ route('guest.support') }}"><button type="button" class="grad-box" id="support_btn" style="padding:50px 32px">
									<i class="fas fa-cogs"></i>
										Support
									</button></a>
								</div>
								<div class="col-md-6 col-xs-6" style="padding:0px 5px;">
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
										<b>SALES</b> outlets closest to you and transact with our Agent.
									</h5>
								</div>
								<img src="/images/banne.jpg" class="img-responsive" style="width:100%; border-radius:10px; max-height:180px;">
							</div>
							</div>
						</div><!---col-md-7 ends -->
					</div>
					<div class="col-md-5" style="padding: 3px 16px 8px 5px;">
							<div class="slider">
									<ul class="slider-main">
										<li class="slider-list">
											<img src="/images/12.png" class='img-responsive side-img'>
										</li>
										<a href="{{ route('guest.services') }}"><li>
											<img src="/images/side-img-2.jpeg" class='img-responsive side-img'>
										</li></a>
										{{-- <li>
											<img src="./images/3.jpg" alt="">
										</li>
										<li>
											<img src="./images/4.jpg" alt="">
										</li> --}}
									</ul>
								</div>
						{{-- <img src="/images/12.png" class='img-responsive side-img'> --}}
					</div>
				</div>
			</div>
			<!-- row ends -->
			<br>
			<div class="modal fade prepaid-modal" tabindex="-1" role="dialog"  data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<img src="/images/ekedc.jpg" width="80"/> 
							<span style="font-size: 16px"> Eko Electric Distribution Company </span>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label for="Meter_number"><b>Prepaid Meter Number</b></label>
									<input type="text" class="form-control" placeholder="Enter Your PrePaid Meter Number" required autofocus name="meter_no">
								</div>
								<div class="form-group">
									<label for="convinience_fee"><b>Convenience Fee</b></label>
									<input type="number" class="form-control" value="100.00" readonly>
								</div>
								<div class="form-group">
									<label for="amount"><b>Amount</b></label>
									<input type="text" class="form-control" placeholder="0.00" required name="amount">
								</div>
								<button class="btn btn-success btn-block" onclick="alert('Thanks for testing it out, we are still working on it.')" type="submit">Continue</button>
							</form>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel Payment</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

			<div class="modal fade" tabindex="-1" role="dialog" id="confirm-payment">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Confirm Details</h4>
							<br>
							<img src="/images/ekedc.jpg" width="80"/> 
							<span style="font-size: 16px"> Eko Electric Distribution Company </span>
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
							<button type="button" class="btn btn-danger" onclick="window.location.reload()">Cancel Payment</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			
			

		</div>
		</div>

		</div>
		<!--main div ends-->
		</div>
		<div class="footi">
				Powered by GOENERGEE
			</div>
		</div>
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="/js/sweetalert.min.js"></script>
		<script src="https://js.paystack.co/v1/inline.js"></script>
		<script src="/js/osSlider.js"></script>
		<script type="text/javascript">
			var slider = new osSlider({ 
				pNode:'.slider',
				cNode:'.slider-main li',
				speed:3000, 
				autoPlay:true 
			});
		</script>
		<script type="text/javascript">
		
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-36251023-1']);
		  _gaq.push(['_setDomainName', 'jqueryscript.net']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>		
		@include('partials._search-component')

		<script>
			$('document').ready(function () {
					if (window.location.hash == "#prepaid-meter") {
						$('.prepaid-modal').modal('toggle', {
							backdrop: false
						});
						// console.log(window.location.hash);
					}
				});	
			// fetch('in-app/api/soap/start-session')
			// 	.then(res => res.json())
			// 	.then(result => {
			// 		// Gets the response and format it as json
			// 		let newResult = JSON.parse(result);

			// 		console.log(`Session started ${newResult.response.session}`);
			// 		// Sends a login request to the server with the session obtained 
			// 		fetch(`in-app/api/soap/login-session/${newResult.response.session}`)
			// 		.then(res => res.json())
			// 		.then(response => {
			// 			// Login successful
			// 			response = JSON.parse(response);

			// 			if(response.response.retn == 0) {
			// 				console.log(`Session Logged in ${response}`);
			// 				// sends a store session to the server
			// 				fetch(`in-app/api/soap/store-session/${newResult.response.session}`)
			// 				.then(res => res.json())
			// 				.then(resulta => {
			// 					// store successful,
			// 					// stores session also in the local storage
			// 					localStorage.setItem('TAMSES', newResult.response.session);
			// 				})
			// 				.catch(err => alert('Error Storing Session'));
			// 			}
			// 			let result = JSON.parse(response);
			// 			// if loggin sends back error;
			// 			if(result.response.retn !== 0) {
			// 				alert('Something Really Bad Went Wrong');
			// 			}
			// 		})
			// 		.catch(err => alert('Something Bad Went Wrong here'));
			// 	}).catch(err => alert('Something Bad Went Wrong'));
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


			// Slider script ends here

			// Setup ajax for Ajax in-app requests
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			// Setup Ajax Ends


    alert('Welcome');
    /**
     * Fetches the list of services here
     */
    // Hide the overlay div by default
	
   // Register Ajax Requests
    $(".registerBtn").click(function(e) {
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
                    swal('Successful', 'Account Registration Successful, We\'ve sent you an email for confirmation to activate your account', 'success');
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
        });
    });

    // Login Ajax Request
    $(".login-btn").click(function(e){
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
                    swal('Ooops!', '' + response.err + '', 'error');
                    $('.login-btn').prop('disabled', false);
                    $('.login-btn').html('Login');
                }
            },
            error: (err) => {
                $('.login-btn').prop('disabled', false);
                $('.login-btn').html('Login');
            }
        });
    });

    /**
     * Paystack Payment Integration
     * This handles payment for prepaid users
     */
    $(".pay-meter").click(function(e){
        e.preventDefault();
        $('.pay-meter').html('Validating....');
        var meter_no = $('#meterno').val();
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

        // $('.pay-meter').html('Continue');
        //$('.pay-meter').prop('disabled', false);
    });
    // Continue
// start session for transactions to Payment Modal
    $("#ctnPay").click(function(e) {
        $("#ctnPay").html('Connecting to Gateway..').prop('disables',true);
        e.preventDefault();
        let toBeTransported = {
            'meter_no': ''+$("#meterno").val()+'',
            'first_name': ''+$('#firstname').val()+'',
            'last_name': ''+$('#lastname').val()+'',
            'email': ''+$('#emailret').val()+'',
            'mobile': ''+$('#phoneret').val()+'',
            'amount': ''+$('.meter-amount').val()+'',
        };
        continuePay(toBeTransported);
    }); 


// Continue to Pay Function Declared
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
// Paystack Payment Handler
function payWithPaystack() {
    var amountMeter = document.querySelector('.meter-amount').value;
    var chargedAmount = parseInt(amountMeter) + 100;
    var handler = PaystackPop.setup({
        key: "{{ env('PS_KEY') }}",
        email: document.querySelector('#emailret').value,
        amount: chargedAmount + "00",
        ref: Math.floor((Math.random() * 1000000000) + 1) + "TRANSREF",
        callback: function (response) {
            setTimeout(() => {
                window.location.href = '/payment/' + response.reference + '/success';
            }, 1000);
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
	</body>

	</html>