<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GOENERGEE | Customer Dashboard</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script src="/customer/js/jquery-3.1.1.min.js"></script>
        <link href="/customer/css/bootstrap.min.css" rel="stylesheet">
        <link href="/customer/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="/customer/css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="/customer/css/animate.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link rel="icon" href="/customer/img/favicon.png" type='image/x-icon'>
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
        {{-- <style>
            #myModal6:active {
            z-index: -10;
        }
        </style> --}}

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
                                    @if(Auth::user()->avatar == null)
                                    <img alt="image" class="img-circle" src='/images/profile_small.png' width="100" />
                                    @else
                                    <img alt="image" class="img-circle" src='/storage/{{ Auth::user()->avatar }}' width="100" />
                                    @endif
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
                        <li class="{{ Request::is('home') ? 'active' :'' }}"><a href="home"><i class="fa fa-calculator"></i>
                                <span class="nav-label">My Dashboard</span></a>
                        </li>

                        <li>
                        <li class="{{ Request::is('customer/payment-history') ? 'active' :'' }}"><a href="{{ route('payment-history') }}"><i
                                    class="fa fa-cc-visa"></i> <span class="nav-label">Payment History</span></a>
                        </li>
                        <li class="{{ Request::is('customer/prepaid-payment') ? 'active' :'' || Request::is('customer/postpaid-payment') ? 'active' :'' }}">
                            <a><i class="fa fa-money"></i> <span class="nav-label">Make Payment</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li class="{{ Request::is('customer/prepaid-payment') ? 'active' :'' }}"><a href="{{ route('customer.prepaid-payment') }}">Prepaid
                                        Payment</a></li>
                                <li><a href="{{ route('customer.postpaid-payment') }}">Postpaid Payment</a></li>
                            
                              
                                </ul>
                        </li>

                        <li class="{{ Request::is('customer/meter-request') ? 'active' :'' }}"><a href="{{ route('meter.request') }}"><i
                                    class="fa fa-table"></i> <span class="nav-label">Meter Request</span></a>
                        </li>
                        <li class="{{ Request::is('customer/tickets') ? 'active' :'' }}"><a href="{{ route('customer.tickets') }}"><i
                                    class="fa fa-envelope"></i> <span class="nav-label">My Support Tickets</span></a>
                        </li>
                        <li class="{{ Request::is('customer/profile') ? 'active' :'' }}">
                            <a href="{{ route('customer.profile') }}">
                                <i class="fa fa-podcast"></i> <span class="nav-label">My Profile</span>
                            </a>
                        </li>
                        @endif
                        <li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit()"><i
                                    class="fa fa-sign-out"></i> Logout</a>
                            {{-- <form class="logout-form" method="POST" action="{{ route('logout') }}">
                                {{ csrf_field()}}
                            </form> --}}
                        </li>
                        </li>

            </nav>
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #1e3344;">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                {{-- <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                                </a>
                                <form role="search" class="navbar-form-custom" action="search_results.html">
                                    <div class="form-group">
                                        <input type="text" placeholder="Search for something..." class="form-control"
                                            name="top-search" id="top-search">
                                    </div>
                                </form> --}}
                               <div class="row" style="margin-top: 1em">
                                  
                                        <button class="btn btn-primary" >Pay Bill
                                            </button>
                                   
                                    <button type="button" class="btn btn-primary mt-10" data-toggle="modal" data-target="#myModal6">
                            Top up Wallet Account
                        </button>
                        <button class="btn btn-default mt-10">
                            <span class="text-black-50" style="font-weight: bold">Wallet Balance: N</span></button>
                        @push('popups')
                        <div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title">Top Up Wallet</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <form id="admin_amount">
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input id="topup-amount" placeholder="Enter Amount" class="form-control">
                                                </div>
                                                <div>
                                                </div>
                                            </form>
                                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"
                                                onclick="this.innerHTML='Processing...'; diamondPay()"
                                                id="topUpBtn">
                                                <strong>Top Up Now</strong>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        @endpush
                    


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
                                                <a href="{{ route('customer.postpaid-payment') }}" target="_blank" class="btn btn-success">Postpaid</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <ul class="nav navbar-top-links navbar-right">
                                <li>
                                    <span class="m-r-sm welcome-message" style="color: #fff">  Welcome <b>{{
                                            Auth::user()->first_name}} {{ Auth::user()->last_name}} </b>| GOENERGEE
                                        Utility Platform  </span>
                                </li>
                                <li>

                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit()"
                                        onmouseover="style.background = '#1AB394'; style.color = '#fff'; " onmouseout="style.color = '#fff';style.background = 'transparent';"
                                        style="background: transparent; color: rgb(255,255,255);><i class=" fa
                                        fa-sign-out"></i> Logout</a>
                                    <form class="logout-form" method="POST" action="{{ route('logout') }}">
                                        {{ csrf_field()}}
                                    </form>
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
                <br>
                @yield('customer-section')
                <div class="footer">

                    <div>
                        Powered by<strong> GOENERGEE</strong> &copy; 2019
                    </div>
                </div>


            </div>


            <!-- Mainly scripts -->
            
            <script src="/customer/js/bootstrap.min.js"></script>
            <script src="/customer/js/plugins/metisMenu/jquery.metisMenu.js"></script>
            <script src="/customer/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

            <!-- Custom and plugin javascript -->
            <script src="/customer/js/inspinia.js"></script>
            <script src="/customer/js/plugins/pace/pace.min.js"></script>


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
