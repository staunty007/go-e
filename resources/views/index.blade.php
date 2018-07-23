<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>GOENERGEE</title>
	<link href="/images/favicon.png" rel="shortcut icon" type="image/png">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="/css/goenergee.css" rel='stylesheet' type='text/css'>
</head>
<body>
	<nav class="navbar navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand">
				<img src="/images/logo.png" alt="logo">
			</a>
			<form class="form-inline">
				<div class="input-group">
					<input type="text" class="form-control rounded" placeholder="Search for Services" aria-label="Search for Services" aria-describedby="basic-addon2">
					<div class="input-group-append">
						<button class="btn btn-danger btn-rounded rounded custom-btn-search"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>	
	</nav>
	<div class="clearfix"></div>
	{{-- Carousel --}}
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
				<div class="carousel-container">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100 img-fluid" src="/images/rev_image/1.png" alt="First slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="/images/rev_image/2.png" alt="Second slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="/images/rev_image/3.png" alt="Third slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="/images/rev_image/4.png" alt="Third slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="/images/rev_image/7.png" alt="Third slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="/images/rev_image/8.png" alt="Third slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="/images/rev_image/9.png" alt="Third slide">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<div class="col-2">
				<div class="box">
					Login
				</div>
				<div class="box">
					Register
				</div>
			</div>
		</div>
		
	</div>
	




	{{-- Scripts--}}

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>