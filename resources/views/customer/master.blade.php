<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GOENREGEE | Customer Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <style>
        #myModal6:active {
            z-index: -10;
        }
        </style>

    @stack('style')
</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                            <img alt="image" class="img-circle" src='/storage/{{ Auth::user()->avatar }}' width="100"/>
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> 
                                <strong class="font-bold">
                                    Welcome, {{ ucfirst(Auth::user()->first_name) }}
                                </strong>
                            </span>
                           
                        </a>
                        
                    </div>
                    <div class="logo-element">
                        GO
                    </div>
                </li>
                 @if(Auth::user()->is_completed == 0)
				<li>
                    <li class="{{ Request::is('customer/profile') ? 'active' :'' }}">
                        <a href="{{ route('customer.profile') }}">
                            <i class="fa fa-podcast"></i> <span class="nav-label">My Profile <span class="badge badge-danger">*</span>
                        </a>
                    </li>
                </li>
                 @else
                 <li>
                    <li class="{{ Request::is('home') ? 'active' :'' }}"><a href="home"><i class="fa fa-calculator"></i> <span class="nav-label">My Dashboard</span></a>
                </li>
				
                <li>
                    <li class="{{ Request::is('customer/payment-history') ? 'active' :'' }}"><a href="{{ route('payment-history') }}"><i class="fa fa-cc-visa"></i> <span class="nav-label">Payment History</span></a>
                </li>
                <li class="{{ Request::is('customer/prepaid-payment') ? 'active' :'' || Request::is('customer/postpaid-payment') ? 'active' :'' }}">
                    <a><i class="fa fa-money"></i> <span class="nav-label">Make Payment</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{{ Request::is('customer/prepaid-payment') ? 'active' :'' }}"><a href="{{ route('customer.prepaid-payment') }}">Prepaid Payment</a></li>
                        <li><a href="{{ route('postpaid') }}" target="_blank">Postpaid Payment</a></li>
                    </ul>
                </li>
                
                <li class="{{ Request::is('customer/meter-request') ? 'active' :'' }}"><a href="{{ route('meter.request') }}"><i class="fa fa-table"></i> <span class="nav-label">Meter Request</span></a>
                </li>
                <li class="{{ Request::is('customer/profile') ? 'active' :'' }}">
                    <a href="{{ route('customer.profile') }}">
                        <i class="fa fa-podcast"></i> <span class="nav-label">My Profile</span>
                    </a>
                </li>
                 @endif
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
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal6">Buy Token</button>
                </div>
                <div class="col-md-8">
                    <p style="margin-top: 0.7em; font-size: 16px">
                        Welcome, <b>{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</b>
                    </p>
                </div>
                
            </div>
            <div class="modal inmodal fade" id="myModal6" tabindex="9999" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h6 class="modal-title">Choose Meter Option</h6>
                        </div>
                        <div class="modal-body">
                            <a href="{{ route('customer.prepaid-payment') }}" class="btn btn-primary">Prepaid</a>
                            <a href="{{ route('postpaid') }}" target="_blank" class="btn btn-success">Postpaid</a>
                        </div>
                    </div>

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
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissable" role="alert">
                @foreach ($errors->all() as $e)
                    <p>{{ $e }}</p>
                @endforeach
            </div>
        @endif
        @yield('customer-section')
        <div class="footer">
            
            <div>
                <strong>Powered by</strong> GOENERGEE &copy; 2018
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')

</body>

</html>
