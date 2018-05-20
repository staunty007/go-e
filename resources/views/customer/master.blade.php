<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GOENREGEE | Customer profile Update</title>

    <link href="/customer/css/bootstrap.min.css" rel="stylesheet">
    <link href="/customer/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/customer/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/customer/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="/customer/css/animate.css" rel="stylesheet">
    <link href="/customer/css/style.css" rel="stylesheet">
	<link rel="icon" href="/customer/img/favicon.png" type='image/x-icon'>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5af6719a227d3d7edc253853/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <span>
                                    <img alt="image" class="img-circle" src="{{asset('images/profile_small.png')}}" />
                                </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Welcome, {{ ucfirst(Auth::user()->first_name) }}</strong>
                        </span></span></a>
                        {{-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul> --}}
                    </div>
                    <div class="logo-element">
                        GO
                    </div>
                </li>
               <li>
                 
				<li>
                    <li class="{{ Request::is('home') ? 'active' :'' }}"><a href="home"><i class="fa fa-calculator"></i> <span class="nav-label">My Dashboard</span></a>
                </li>
				
                <li>
                    <li class="{{ Request::is('payment-history') ? 'active' :'' }}"><a href="payment-history"><i class="fa fa-cc-visa"></i> <span class="nav-label">Payment History</span></a>
                </li>
				<li>
                    <li class="{{ Request::is('make-payment') ? 'active' :'' }}"><a href="make-payment"><i class="fa fa-money"></i> <span class="nav-label">Make Payment</span></a>
                 </li>
                
                <li>
                   <li class="{{ Request::is('meter-request') ? 'active' :'' }}"><a href="meter-request"><i class="fa fa-table"></i> <span class="nav-label">Meter Request</span></a>
                </li>
				<li>
                     <li class="{{ Request::is('customer-profile') ? 'active' :'' }}"><a href="customer-profile"><i class="fa fa-podcast"></i> <span class="nav-label">My Profile</span></a>
                </li>
                <li>
                    <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit()"><i class="fa fa-sign-out"></i> Logout</a>
                    <form class="logout-form" method="POST" action="{{ route('logout') }}">
                        {{ csrf_field()}}
                    </form>
                    </li>
                </li>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            {{-- <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form> --}}
            <div class="row" style="margin-top: 1em">
                <div class="col-md-4">
                    <button class="btn btn-primary">Buy Token</button>
                </div>
                <div class="col-md-8">
                    <p style="margin-top: 0.7em; font-size: 16px">
                        Welcome, <b>{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</b>
                    </p>
                </div>
                
            </div>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to GOENERGEE Utility Payment Platform.</span>
                </li>
                


                <li>
                      
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit()"><i class="fa fa-sign-out"></i> Logout</a>
                        <form class="logout-form" method="POST" action="{{ route('logout') }}">
                            {{ csrf_field()}}
                        </form>
                </li>
                    
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('customer-section')
        <div class="footer">
            
            <div>
                <strong>Powered by</strong> GOENERGEE &copy; 2018
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="/customer/js/jquery-3.1.1.min.js"></script>
    <script src="/customer/js/bootstrap.min.js"></script>
    <script src="/customer/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/customer/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/customer/js/inspinia.js"></script>
    <script src="/customer/js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="/customer/js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="/customer/js/plugins/validate/jquery.validate.min.js"></script>
    
    @stack('scripts')

    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>

</body>

</html>
