
				<div class="col-md-11 col-sm-12 col-xs-12"  style="z-index:20;">
					<!--divide col-->
					<div class="row">
						<div class="col-md-4 col-sm-12 col-xs-12" id="static-section" style="margin-top:-5px ">
							<!--divide col for buttons-->
							<div class="row">
								<div class="col-md-6 col-xs-6" style="padding:0px 5px;">
									@if (Auth::check())
									<button type="button" class="grad-box" id="lg-btn" style="padding: 50px 50px;">
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
									<a href="{{ route('guest.login') }}"><button type="button" id="login_btn" class="grad-box" style="padding: 50px 50px;">
										<i class="fas fa-user-circle"></i>
										Login
									</button></a>							
									@endif
								</div>
								<div class="col-md-6 col-xs-6" style="padding:0px 5px;">
									<a href="{{ route('guest.signup') }}"><button type="button" id="sign_up_btn" class="grad-box" style="padding: 50px 50px;">
										<i class="fas fa-user-plus"></i>
										<div>SignUp</div>
									</button></a>
								</div>
							</div>
							<div class="row" style="padding:0px;">
								<div class="col-md-12 col-sm-12" style="padding:0px 5px;">
									<div style="text-align:center;">
										<a href="{{ route('guest.services') }}"><button type="button" id="payment_btn" style="margin:0; background-color: #fff !important; padding:40px 40px; color: #8CC74E;" class="grad-boxa">
												<i class="far fa-credit-card"></i>
												Make Payment
										</button></a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-xs-6" style="padding:0px 5px;">
									<a href="{{ route('guest.support') }}"><button type="button" class="grad-box" id="support_btn" style="padding: 50px 50px;">
										<i class="fas fa-cogs"></i>
										Support
									</button></a>
								</div>
								<div class="col-md-6 col-xs-6" style="padding:0px 5px;">
									<a href="faq">
										<button type="button" class="grad-box" style="padding: 50px 50px;">
											<i class="fas fa-question-circle"></i>
											FAQ
										</button>
									</a>
								</div>
							</div>
						</div>
						
