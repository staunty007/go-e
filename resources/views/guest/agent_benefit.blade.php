<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <title>GOENERGEE:::Agent Benefit</title>
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                            <input type="text" class="form-control media-query-input" placeholder="Search"
                                aria-describedby="basic-addon1" style="
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
								"><i
                                    class="fas fa-search"></i></button>

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


        <div class="row">

            <div class="col-xs-4 col-md-2">


                <a href="{{ route('guest.become_agent') }}"><button type="button" class="grad-box" id="support_btn"
                        style="padding:50px 32px">
                        <i class="fas fa-question-circle"></i>
                        Why be an Agent
                    </button></a>
                <a href="{{ route('guest.agent_signup') }}"><button type="button" class="grad-box" id="support_btn"
                        style="padding:50px 32px">
                        <i class="fas fa-id-card"></i>
                        Agent Sign Up
                    </button></a>
               
                    
				<a href="{{ route('guest.agent_benefit') }}"><button type="button" id="payment_btn" style=" background-color: #fff !important; padding:30px 31px; color: #8CC74E;"
                    class="grad-boxa">
                       <i class="fas fa-cart-plus"></i>
                       Agent benefits
                   </button></a>

                    <a href="/"><button type="button" class="grad-box" id="support_btn"
                        style="padding:50px 32px">
                        <i class="fas fa-home"></i>
                        Back to Home
                    </button></a>

            </div>


            <div class="col-xs-8 col-md-10" style="padding:0px 0px;">

                <div class="user-details" id="login1" style="border-radius:3%">

                    <div style="padding:10px 30px;">
                        <div class="text-center login-title">
                            <h4>THE BENEFITS TO OUR AGENTS</h4>

                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <hr>

                                <h4>
                                    <li>Platform & Content</li>
                                </h4>

                                <ul>
                                    <li> Huge content from GOENERGEE and other products</li>
                                    <li>Ever Growing billers & merchants</li>
                                    <li> Innovator and industry enabler</li>
                                </ul>
                                </li>

                                <h4>
                                    <li>Marketing & Branding</li>
                                </h4>

                                <ul>
                                    <li> Huge content from GOENERGEE and other products</li>
                                    <li>Comprehensive, all-year round and targeted marketing communications support
                                    </li>
                                    <li> Improved brand association</li>
                                </ul>
                                </li>

                                <h4>
                                    <li> Coordinated Support Structure</li>
                                </h4>

                                <ul>
                                    <li> FIPs & TPs</li>
                                    <li>Back Office</li>
                                    <li> BSPs</li>
                                    <li> Call Centre</li>
                                    <li>Report Portal</li>
                                    <li> Monitoring app</li>
                                    <li> CUG</li>
                                </ul>



                            </div>
                            <div class="col-md-6">
                                <hr>
                                <h4>
                                    <li> Effective Agent Training</li>
                                </h4>

                                <ul>
                                    <li>Onsite Training</li>
                                    <li>Weekly Visitation</li>
                                    <li> Monthly Training</li>
                                    <li> Quarterly Forum</li>

                                </ul>

                                <h4>
                                    <li>Guaranteed Successful Entrepreneurs</li>
                                </h4>

                                <ul>
                                    <li> It pays more to be GOENERGEE agent</li>
                                    <li>More commissions and incentives</li>
                                    <li> More services</li>
                                    <li> More support</li>

                                </ul>



                            </div>
                        </div>
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



                <div class="footi">Powered by GOENERGEE</div>
        </div>
        @include('partials._search-component');
        <script src="/js/sweetalert.min.js"></script>

</body>

</html>