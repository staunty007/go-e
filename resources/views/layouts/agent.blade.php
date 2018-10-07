<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GOENERGEE | AGENT</title>
    <meta name="csrf_token" content="{{ csrf_token() }}">


    <link href="/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="{{asset('//code.jquery.com/jquery-1.11.1.min.js')}}"></script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/tab.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{asset('css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/table1.css')}}" rel="stylesheet">

    <link href="{{asset('css/plugins/footable/footable.core.css')}}" rel="stylesheet">

    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('images/favicon.png')}}" type='image/x-icon'>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"><span>
                                @if(Auth::user()->avatar == null)
                                <img alt="image" class="img-circle" src='/images/profile_small.png' width="100" />
                                @else
                                <img alt="image" class="img-circle" src='/storage/{{ Auth::user()->avatar }}' width="100" />
                                @endif
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{
                                            Auth::user()->first_name." ".Auth::user()->last_name }}</strong>
                                    </span>
                                    {{-- <span class="text-muted text-xs block">GOENERGEE - AGENT<b class="caret"></b></span> --}}
                                </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">

                                <li class="divider"></li>
                                <li><a href="./index">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            GO
                        </div>
                    </li>
                    @if(Auth::user()->is_completed == 0)
                    <li class="{{ Request::is('agent/profile') ? 'active': '' }}">
                        <a href="{{ route('agent.profile') }}"><i class="fa fa-podcast"></i> <span class="nav-label">Agent
                                Profile <span style='color:red'>*</span></a>
                    </li>
                    @else
                    <li class="{{ Request::is('home') ? 'active': '' }}"><a href="{{ route('agent.dashboard') }}"><span>&#8358;</span></i>
                            <span class="nav-label">&nbsp;My Dashboard</span></a>
                    </li>
                    <li class="{{ Request::is('agent/payment-history') ? 'active': '' }}">
                        <a href="{{ route('agent.payHistory') }}"><i class="fa fa-cc-visa"></i> <span class="nav-label">Payment
                                History</span></a>
                    </li>
                    {{-- <li class="{{ Request::is('agent/buy-token') ? 'active': '' }}">
                        <a href="{{ route('agent.buy-token') }}"><i class="fa fa-money"></i> <span class="nav-label">Buy
                                Token</span></a>
                    </li> --}}
                    <li class="{{ Request::is('agent/prepaid-token') ? 'active' :'' || Request::is('agent/postpaid-token') ? 'active' :'' }}">
                        <a><i class="fa fa-money"></i> <span class="nav-label"> Buy Token</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{ Request::is('agent/prepaid-token') ? 'active' :'' }}"><a href="{{ route('agent.prepaid-token') }}">Prepaid
                                    Token</a></li>


                            <li class="{{ Request::is('agent/postpaid-token') ? 'active' :'' }}"><a href="{{ route('postpaid') }}"
                                    target="_blank">Postpaid Token</a></li>
                        </ul>
                    </li>

                    <!--men-->
                    {{-- <li class="{{ Request::is('backend/admin-topup-trackers') ? 'active' :'' || Request::is('backend/agent-topup-trackers') ? 'active' :'' }}">
                        <a><i class="fa fa-clone"></i> <span class="nav-label">Topup Trackers</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{ Request::is('backend/admin-topup-trackers') ? 'active' :'' }}"><a href="{{ route('admin.admin-topup-track') }}">Admin
                                    Topup</a></li>
                            <li class="{{ Request::is('backend/agent-topup-trackers') ? 'active' :'' }}"><a href="{{ route('admin.agent-topup-track') }}">Agent
                                    Topup</a></li>
                        </ul>
                    </li>

                    </li> --}}
                    <!--end menu-->
                    <li class="{{ Request::is('agent/meter-management') ? 'active': '' }}">
                        <a href="{{ route('agent.meter') }}"><i class="fa fa-table"></i> <span class="nav-label">Meter
                                Request</span></a>
                    </li>
                    <li class="{{ Request::is('agent/profile') ? 'active': '' }}">
                        <a href="{{ route('agent.profile') }}"><i class="fa fa-podcast"></i> <span class="nav-label">Agent
                                Profile</span></a>
                    </li>
                    @endif


        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <button type="button" class="btn btn-primary mt-10" data-toggle="modal" data-target="#myModal6">
                            Top up Wallet Account
                        </button>
                        {{-- @push('popups') --}}
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
                                                onclick="topupWallet();" id="topUpBtn">
                                                <strong>Top Up Now</strong>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- @endpush --}}

                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to GOENERGEE Utility Meter
                                platform.</span>
                        </li>



                        <li>

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit()"
                                onmouseover="style.background = '#1AB394'; style.color = '#fff'; " onmouseout="style.color = '#666';style.background = 'transparent';">
                                <i class="fa fa-sign-out"></i>logout</a>
                            <form class="logout-form" method="POST" action="{{ route('logout') }}">
                                {{ csrf_field()}}
                            </form>
                        </li>


                    </ul>

                </nav>
            </div>
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $e)
                {{ $e }}
                @endforeach
            </div>
            @endif
            @yield('content')


        </div>



        <div class="footer">

            <div>
                <strong>Copyright</strong> GOENERGEE &copy; 2018
            </div>
        </div>
    </div>

    </div>

    </div>
    </div>

    </div>



    </div>
    </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>
    <script src="js/demo/chartjs-demo.js"></script>


    @if(session('success'))
    <script>
        var textt = "{{ session('success') }}";
        Snackbar.show({
            text: textt,
            pos: 'top-right'
        });
        let tBtn = document.querySelector('#topUpBtn');
        tBtn.addEventListener('click', () => {
            tBtn.innerHTML = "<strong>Working</strong>";
        });
    </script>
    @endif
    <script src="js/demo/chartjs-demo.js"></script>
    <!-- jQuery UI -->
    <script src="/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <script src="{{ asset('js/agent.js') }}"></script>
    @stack('popups') @stack('scripts')
    <script src="js/demo/chartjs-demo.js"></script>
    <!--chart-->

</body>

</html>