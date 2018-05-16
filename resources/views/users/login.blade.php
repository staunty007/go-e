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
	<!-- //Meta-Tags -->
	<!-- Stylesheets -->
	<link href="/ba/css/font-awesome.css" rel="stylesheet">
	<link href="/ba/css/style.css" rel='stylesheet' type='text/css' />
	<!--// Stylesheets -->
	<!--fonts-->
	<!-- title -->
	<link href="//fonts.googleapis.com/css?family=Niconne" rel="stylesheet">
	<!-- body -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
	<!--//fonts-->
</head>

<body>
	<h1>Agents And Administrator Login</h1>
	<img src="/images/logo.png" />
	<div class="w3ls-login box box--big">
		<!-- form starts here -->
		<form action="#" method="post" class="login-form">
            {{ csrf_field()}}
            <div class="agile-field-txt">
                <label>
                    <i class="fa fa-square"></i> Category</label>
                    <select class="form-control" name="role_id">
                        <option value="2">Agent</option>
                        <option value="1">Administrator</option>
                    </select>
            </div>

			<div class="agile-field-txt">
				<label>
					<i class="fa fa-user" aria-hidden="true"></i> Email Address :</label>
				<input type="text" name="email" placeholder=" " />
			</div>
			<div class="agile-field-txt">
				<label>
					<i class="fa fa-envelope" aria-hidden="true"></i> password :</label>
				<input type="password" name="password" placeholder=" " id="myInput" />
				{{-- <div class="agile_label">
					<input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
					<label class="check" for="check3">Show password</label>
				</div> --}}
			</div>
			<!-- script for show password -->
			<script>
				function myFunction() {
					var x = document.getElementById("myInput");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
			</script>
			<!-- //script ends here -->
			<div class="w3ls-bot">
				<div class="switch-agileits">
					<label class="switch">
						<input type="checkbox">
						<span class="slider round"></span>
						keep me signed in
					</label>
				</div>
				<div class="form-end">
					<input type="submit" value="LOGIN" id="loggin">
				</div>
				<div class="clearfix"></div>
			</div>
		</form>
	</div>
	<!-- //form ends here -->
	<!--copyright-->
	<div class="copy-wthree">
		<p>© 2018 GOENERGEE
		</p>
	</div>
    <!--//copyright-->
    <script src="/ba/js/jquery-3.1.1.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="/js/sweetalert.min.js"></script>
    <script>
        $(function() {
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
                        if(response.data == 1) {
                            window.location.href='/backend/administrator';
                        }else if(response.data == 2) {
                            window.location.href='/backend/agent';
                        }else {
                            swal('Ooops!',''+response.data+'','error');
                            //$("#error").html(response.data);
                            //console.log(response);
                            $('#loggin').val('Login');
                        }
                    },error: (err) => {
                        $('#loggin').addClass('disabled');
                        $('#loggin').val('Login');
                    }
                });


            })
        })
    </script>
</body>

</html>