<!DOCTYPE html>

<head>

    <title>GOENERGEE</title>

    <link href="images/favicon.png" rel="shortcut icon" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    {{--
    <link href="css/main.css" rel='stylesheet' type='text/css'> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    {{--
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <style>
        body {
            background-image: url(/images/transformers.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        input {
            background: none;
            border: 1px solid #dcdcdc;
        }
        .form-control {
            border-radius: 0;
        }
        .btn {
            border-radius: 0;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 1.5rem 3rem; background: transparent !important;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/images/logo.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <div class="nav-item">
                        @if(Auth::check())
                        <a class="btn btn-danger" href="/home"><i class="fas fa-home"></i> Go Home</a>
                        @else
                        <a class="btn btn-danger" href="/"><i class="fas fa-home"></i> Go Home</a>
                        @endif
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="background: #ffffffe3; min-height: 100vh; max-height: 100%">
        <br><br><br>
        <div class="row">
            <div class="col-lg-5 col-md-5 m-auto justify-content-center">
                <h5>Create A New Account With GOENERGEE</h5><br>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="first_name">
                            <b>First Name</b>
                        </label>
                        <input type="text" name="first_name" id="first_name" class=" input-sm form-control" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">
                            <b>Last Name</b>
                        </label>
                        <input type="text" name="last_name" id="last_name" class=" input-sm form-control" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="email">
                            <b>Email</b>
                        </label>
                        <input type="email" name="email" id="email" class="input-sm form-control" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="mobile">
                            <b>Phone Number</b>
                        </label>
                        <input type="text" name="mobile" id="mobile" class="input-sm form-control" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="password">
                            <b>Password</b>
                        </label>
                        <input type="password" name="password" id="password" class="input-sm form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">
                            <b>Confirm Password</b>
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="input-sm form-control"
                            placeholder="Confirm Password">
                    </div>
                    <input type="hidden" name="referred">
                    <div class="form-group">
                        <button class="btn btn-success btn-block registerBtn">Create Account</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
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
				})
				
			})	
    </script>
</body>

</html>