
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOENERGEE </title>
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/tab.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/table1.css')}}" rel="stylesheet">

    <link href="{{asset('css/plugins/footable/footable.core.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('images/favicon.png')
    
    }}" type='image/x-icon'>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <img alt="image" class="img-responsive" src="{{asset('images/ekedc_small_small.jpg')}}" height="200"/>
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs">
                                        {{-- <strong class="font-bold">EKEDC</strong> --}}
                                    </span>
                                    <span class="text-muted text-xs block">GOENERGEE
                                    | Disco
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li>
                                    <a href="{{route('admin.profile')}}">Profile</a>
                                </li>
                                {{-- <li>
                                    <a href="contacts.html">Contacts</a>
                                </li>
                                <li>
                                    <a href="mailbox.html">Mailbox</a>
                                </li> --}}
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('disco-logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit()">logout</a>
                                    <form class="logout-form" method="POST" action="{{ route('disco-logout') }}">
                                        {{ csrf_field()}}
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            GO
                        </div>
                    </li>

                    <li class="{{ Request::is('distributor/finance') ? 'active' :'' }}{{ Request::is('home') ? 'active' :'' }}">
                        <a href="{{route('distributor.finance')}}">
                            <span>&#8358;</span>
                            </i>
                            <span class="nav-label">&nbsp;Financial</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('distributor/topup-tracker') ? 'active' :'' }}{{ Request::is('top-up-tracker') ? 'active' :'' }}">
                        <a href="{{route('distributor.topup-tracker')}}">
                            <span>&#8358;</span>
                            </i>
                            <span class="nav-label">&nbsp;Top Up Tracker</span>
                        </a>
                    </li>

                    {{-- <li class="{{$current_route_name =="distributor.customer_payment" ? 'active' : ''}}">
                        <a href="{{route('distributor.customer_payment')}}">
                            <i class="fa fa-user"></i>
                            <span class="nav-label">Customer Report</span>
                        </a> 
                    </li> --}}


                    <li class="{{$current_route_name =="distributor.demographics" ? 'active' : ''}}">
                        <a href="{{route('distributor.demographics')}}">
                            <i class="fa fa fa-yelp"></i>
                            <span class="nav-label">Energy Consumption</span>
                        </a>
                    </li>

                    <li class="{{$current_route_name =="distributor.meter_admin" ? 'active' : ''}}">
                        <a href="{{route('distributor.meter_admin')}}">
                            <i class="fa fa-table"></i>
                            <span class="nav-label">Meter Management</span>
                        </a>
                    </li>


                </ul>


        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to GOENERGEE Utility Meter platform.</span>
                        </li>



                        <li>

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit()" onmouseover="style.background = '#1AB394'; style.color = '#fff'; " onmouseout="style.color = '#666';style.background = 'transparent';">
                                <i class="fa fa-sign-out"></i>logout</a>
                            <form class="logout-form" method="POST" action="{{ route('logout') }}">
                                {{ csrf_field()}}
                            </form>
                        </li>

                    </ul>

                </nav>
            </div>

            <div class="wrapper wrapper-content animated fadeIn">
                {{-- <div class="p-w-md m-t-sm"> --}}
                    @yield('content')
                {{-- </div> --}}
            </div>

        </div>

        <div class="footer">

                <div class="container text-center">
                    Powered by &nbsp;<strong> GOENERGEE</strong> &nbsp;&copy; 2019
                </div>
            </div>


        </div>
    </div>
    
    
    <!-- Mainly scripts -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="/js/dataTables.bootstrap.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>
    
    @stack('popups') @stack('scripts')
</body>



</html>
















