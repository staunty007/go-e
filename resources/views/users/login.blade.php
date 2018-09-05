<!DOCTYPE HTML>
<html>

	<head>
		<title>Login - GOENERGEE</title>
		<!-- Meta-Tags -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<script>
			addEventListener("load", function () {
				setTimeout(hideURLbar, 0);
			}, false);

			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
		<link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
		<link href="{{asset('css/animate.css')}}" rel="stylesheet">
		<link href="{{asset('css/style.css')}}" rel="stylesheet">
		<link rel="icon" href="img/favicon.png" type='image/x-icon'>
	</head>

	<body class="gray-bg">
		<div class="middle-box text-center loginscreen   animated fadeInDown">
			<div>
				<div>

					<h1 class="logo-name">
						<img src="/images/logo.png" />
					</h1>

				</div>
				<h3>Agents And Administrator Login</h3>
				<p></p>

				<form action="#" method="post" class="m-t">
					{{ csrf_field()}}
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email" required="">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" required="">
					</div>
					<div class="form-group">
						<div class="checkbox i-checks">
							<label>
								<input type="checkbox">
								<i></i> Agree the terms and policy </label>
						</div>
					</div>
					<button type="submit" class="btn btn-primary block full-width m-b">Login</button>
				</form>
				<p class="m-t">
					<small>&copy; 2018 GOENERGEE</small>
				</p>
			</div>
		</div>
		<!-- Mainly scripts -->
		<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<!-- iCheck -->
		<script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
		<script>
			$(document).ready(function () {
				$('.i-checks').iCheck({
					checkboxClass: 'icheckbox_square-green',
					radioClass: 'iradio_square-green',
				});
			});
		</script>
		<script>
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		</script>
		<script src="{{asset('js/sweetalert.min.js')}}"></script>
		<script>
			$(function () {
				$('#loggin').click((e) => {
					e.preventDefault();
					$('#loggin').addClass('disabled');
					$('#loggin').val('Logging In...');

					var formData = $('.login-form').serialize();

					$.ajax({
						url: "{{ route('backend-login') }}",
						method: 'POST',
						data: formData,
						success: (response) => {
							if (response.data == 1) {
								window.location.href = '/backend/administrator';
							} else if (response.data == 2) {
								window.location.href = '/backend/agent';
							} else {
								swal('Ooops!', '' + response.data + '', 'error');
								//$("#error").html(response.data);
								//console.log(response);
								$('#loggin').val('Login');
							}
						},
						error: (err) => {
							$('#loggin').addClass('disabled');
							$('#loggin').val('Login');
						}
					});


				})
			})
		</script>
	</body>

</html>