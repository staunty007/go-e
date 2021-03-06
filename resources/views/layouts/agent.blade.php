<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>GOENERGEE ::: Agent </title>
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

    {{--
    <link href="{{asset('css/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet"> --}}

    {{--
    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet"> --}}
    <link rel="icon" href="{{asset('images/favicon.png') }}" type='image/x-icon'>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <style>
        /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
        
        @import url("https://fonts.googleapis.com/css?family=Lato:400,400i,700");
        @import url("https://fonts.googleapis.com/css?family=Raleway:400,400i,700");
       
        
        
        .header,
        .closing,
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .header {
            margin-top: 2vh;
            text-align: center;
        }
        
        .header h1 {
            color: #333;
            font-family: Raleway, sans-serif;
            font-size: 2.5em;
            text-transform: uppercase;
        }
        
        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        
        .closing {
            font-family: Raleway, sans-serif;
            margin: 1em 0;
            text-align: center;
            flex-wrap: wrap;
        }
        
        .closing__icon {
            margin: 0 0.3em;
            color: #D90429;
            transition: all 0.3s ease;
            fill: transparent;
        }
        
        .closing__icon:hover {
            fill: #D90429;
            cursor: pointer;
        }
        
        .closing__icon:active {
            animation: rotate 2s infinite;
        }
        
        .closing a {
            text-decoration: none;
            color: #EF233C;
            border-bottom: 1px solid transparent;
            transition: border 0.3s ease-in;
        }
        
        .closing a:hover {
            border-bottom: 1px solid;
        }
        
        .container {
            flex-wrap: wrap;
        }
        
        .container .stat {
            margin-right: 1em;
            margin-bottom: 1em;
        }
        
        .stat {
            min-width: 280px;
            height: 90px;
            background: #fff;
            display: flex;
            font-family: Lato, sans-serif;
            cursor: pointer;
            box-shadow: none;
            transition: box-shadow 0.1s ease-in;
        }
        
        .stat:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.12), 0 2px 4px 0 rgba(0, 0, 0, 0.08);
        }
        
        .stat:active {
            box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.11), 0 5px 15px 0 rgba(0, 0, 0, 0.08);
        }
        
        .stat--has-icon-right {
            flex-direction: row-reverse;
        }
        
        .stat__icon-wrapper {
            width: 90px;
            min-height: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .stat__icon {
            color: #2A3036;
            width: 45px;
            height: 45px;
        }
        
        .stat__data {
            flex: 1 0 90px;
            height: 45px;
            align-self: center;
            padding: 0 1em;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .stat__header {
            margin: 0;
            color: #2A3036;
            font-size: 1.2em;
            font-weight: bold;
        }
        
        .stat__subheader {
            color: #373E45;
            margin: 0;
            font-size: 1em;
        }
        
        .stat--bg-white {
            background: #F7FFF7;
        }
        
        .stat--bg-dark-white {
            background: #deffde;
        }
        
        .stat--color-white {
            color: #F7FFF7;
        }
        
        .stat--bg-green {
            background: #9BC53D;
        }
        
        .stat--bg-dark-green {
            background: #8cb336;
        }
        
        .stat--color-green {
            color: #9BC53D;
        }
        
        .stat--bg-yellow {
            background: #FDE74C;
        }
        
        .stat--bg-dark-yellow {
            background: #fde433;
        }
        
        .stat--color-yellow {
            color: #FDE74C;
        }
        
        .stat--bg-orange {
            background: #FA7921;
        }
        
        .stat--bg-dark-orange {
            background: #f96a08;
        }
        
        .stat--color-orange {
            color: #FA7921;
        }
        
        .stat--bg-blue {
            background: #5BC0EB;
        }
        
        .stat--bg-dark-blue {
            background: #44b7e8;
        }
        
        .stat--color-blue {
            color: #5BC0EB;
        }
        
        .stat--bg-red {
            background: #E55934;
        }
        
        .stat--bg-dark-red {
            background: #e2471d;
        }
        
        .stat--color-red {
            color: #E55934;
        }
        
        .stat--has-text-right {
            text-align: right;
        }
    </style>
    <script src="https://unpkg.com/feather-icons"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <img alt="image" class="img-circle nav-image" src="@if(Storage::disk('public')->exists(Auth::user()->avatar)) {{asset('storage/'.Auth::user()->avatar)}} @else {{asset('images/avatar.jpg')}} @endif" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs">
                                        <strong class="font-bold"> {{Auth::user()->first_name}}
                                            {{Auth::user()->last_name}}</strong>
                                    </span>
                                    <span class="text-muted text-xs block">
                                        <b class="caret"></b>
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li>
                                    <a href="{{route('admin.profile')}}">Profile</a>
                                </li>

                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit()">logout</a>
                                    <form class="logout-form" method="POST" action="{{ route('logout') }}">
                                        {{ csrf_field()}}
                                    </form>
                                </li>
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
                            <span class="nav-label">&nbsp My Dashboard</span></a>
                    </li>
                    <li class=""><a href="#"><span><i class="fa fa-balance-scale"></i></span></i>
                            <span class="nav-label">&nbsp Top-up Tracker</span></a>
                    </li>
                    <li class="{{ Request::is('agent/payment-history') ? 'active': '' }}">
                        <a href="{{ route('agent.payHistory') }}"><i class="fa fa-cc-visa"></i> <span class="nav-label">Payment
                                History</span></a>
                    </li>

                    <li class="{{ Request::is('agent/prepaid-token') ? 'active' :'' || Request::is('agent/postpaid-token') ? 'active' :'' }}">
                        <a><i class="fa fa-money"></i> <span class="nav-label"> Buy Token</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{ Request::is('agent/prepaid-token') ? 'active' :'' }}"><a href="{{ route('agent.prepaid-token') }}">Prepaid
                                    Token</a></li>


                            <li class="{{ Request::is('agent/postpaid-token') ? 'active' :'' }}"><a href="{{ route('agent.postpaid-token') }}">Postpaid Token</a></li>
                        </ul>
                    </li>

                    <li class="{{ Request::is('agent/tickets') ? 'active' :'' }}"><a href="{{ route('agent.tickets') }}"><i class="fa fa-envelope"></i> <span class="nav-label">My Support Tickets</span></a>
                    </li>
                    <li class="{{ Request::is('agent/meter-management') ? 'active': '' }}">
                        <a href="{{ route('agent.meter') }}"><i class="fa fa-table"></i> <span class="nav-label">Meter
                                Request</span></a>
                    </li>
                    <li class="{{ Request::is('agent/profile') ? 'active': '' }}">
                        <a href="{{ route('agent.profile') }}"><i class="fa fa-podcast"></i> <span class="nav-label">Agent
                                Profile</span></a>
                    </li>
                    @endif

                    {{-- <li>
                        <a href="{{ env('TICKETING_ADMIN_URL') }}">
                            <i class="fa fa-envelope"></i>
                            <span class="nav-label">CRM</span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="{{ route('admin.tickets' )}}">
                            <i class="fa fa-ticket"></i>
                            <span class="nav-label">Support Tickets</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">

                        <a class="btn btn-info mt-10" href="{{ route('agent.prepaid-token') }}">
                            Buy Token
                        </a>
                        <button type="button" class="btn btn-primary mt-10" data-toggle="modal" data-target="#myModal6">
                            Top up Wallet Account
                        </button>
                        <button class="btn btn-default mt-10">
                            <span class="text-black-50" style="font-weight: bold">Wallet Balance: N{{ number_format($agent_details->agent->wallet_balance) }}</span></button>
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
                                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" onclick="diamondPay(event)" id="topUpBtn">
                                                Top Up Now
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        @endpush
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome <strong class="font-bold"> {{Auth::user()->first_name}}
                                    {{Auth::user()->last_name}}</strong> | GOENERGEE Utility
                                platform.</span>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit()" onmouseover="style.background = '#1AB394'; style.color = '#fff'; " onmouseout="style.color = '#666';style.background = 'transparent';">
                                <i class="fa fa-sign-out"></i>Logout</a>
                            <form class="logout-form" method="POST" action="{{ route('logout') }}">
                                {{ csrf_field()}}
                            </form>
                        </li>

                    </ul>
                </nav>
            </div>
            <div class="wrapper wrapper-content animated fadeIn">
                @yield('content')
            </div>
        </div>

    </div>
    <div class="footer">
        <div class="container text-center">
            Powered by &nbsp;<strong> GOENERGEE</strong> &nbsp;&copy; 2019
        </div>
    </div>
    </div>
    <!-- Mainly scripts -->


    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

    <!-- ChartJS-->
    <script src="{{asset('js/plugins/chartJs/Chart.min.js')}}"></script>
    <script src="{{asset('js/demo/chartjs-demo.js')}}"></script>
    <script src="{{asset('js/demo/income_channel_chart.js')}}"></script>

    <!-- Flot -->
    <script src="{{asset('js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.symbol.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.time.js')}}"></script>

    <!-- Peity -->
    <script src="{{asset('js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('js/demo/peity-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>
    <!-- jQuery UI -->
    <script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Jvectormap -->
    <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- EayPIE -->
    <script src="{{asset('js/plugins/easypiechart/jquery.easypiechart.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('js/plugins/footable/footable.all.min.js')}}"></script>
    <!-- Sparkline demo data  -->
    <script src="{{asset('js/demo/sparkline-demo.js') }}"></script>
    <script src="{{asset('js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="/js/dataTables.bootstrap.min.js"></script>
    <script src="/js/agent.js"></script>
    <script>
        $(document).ready(function () {

            $('.footable').footable();

            $('#date_added').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#date_modified').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

        });
    </script>
    {{-- <script src="https://js.paystack.co/v1/inline.js"></script> --}}
    <script>
        function diamondPay(event) {
            var amount = document.querySelector('#topup-amount').value;
            if (amount.length == 0 || amount == "") {
                alert('Please Enter an Amount');
                return;
            }
            const parente = event.target;
            updateButton();
            // Connect to diamond API to deduct amount fro agent's Account
            $.get(`/diamond/debit/${amount}`, function(dataBack, status){
                console.log(dataBack);
                if(dataBack.data == "") {
                    alert('There was a glitch, Please try again');
                    updateButton('Top up');
                    return;
                }

                if(dataBack.success == true) {
                    const parsedResponse = JSON.parse(dataBack.data);
                    const walletData = [parsedResponse.result.transactionReference, amount];
                    let agentCredit = creditWallets(walletData);
                    if (agentCredit == true) {
                        alert('Transaction Completed');
                        setTimeout(() => {
                            location.href = "{{ route('home') }}";
                        }, 5000);
                    }
                }else {
                    alert(dataBack.errors);
                    updateButton('Top Up');
                    return;
                }
                
            }).fail((err) => {
                console.log(err.responseJSON.data);
                let { data } = err.responseJSON;
                alert(data);
                updateButton('Top Up');
            });

            return;
            fetch(`/diamond/debit/${amount}/diamond/debit/${amount}`)
             
        }

        const creditWallets = (response) => {

            console.log('Crediting Agent Wallet...');
            updateButton('Updating Your Wallet ...');
            if (!response) return;

            $.ajax({
                url: '/wallets/credit',
                type: 'POST',
                data: {
                    response
                },
                success: (result) => {
                    if (!result.successful || !result.successful == true) {
                        return false;
                        updateButton('Top up Wallet');
                    }
                    setTimeout(() => {
                        alert('Wallet Updated...');
                    },2000)
                },
                error: (err) => {
                    console.log(err);
                    return false;
                }
            });

            return true;
        }

        function updateButton(string = 'Processing....') {
            document.querySelector("#topUpBtn").innerHTML = string;
        }
    </script>
    <script>
        $(document).ready(function () {

            var sparklineCharts = function () {
                $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1ab394',
                    fillColor: "transparent"
                });

                $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1ab394',
                    fillColor: "transparent"
                });

                $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16, 8], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1C84C6',
                    fillColor: "transparent"
                });
            };

            var sparkResize;

            $(window).resize(function (e) {
                clearTimeout(sparkResize);
                sparkResize = setTimeout(sparklineCharts, 500);
            });

            sparklineCharts();




            var data1 = [
                [0, 4],
                [1, 8],
                [2, 5],
                [3, 10],
                [4, 4],
                [5, 16],
                [6, 5],
                [7, 11],
                [8, 6],
                [9, 11],
                [10, 20],
                [11, 10],
                [12, 13],
                [13, 4],
                [14, 7],
                [15, 8],
                [16, 12]
            ];
            var data2 = [
                [0, 0],
                [1, 2],
                [2, 7],
                [3, 4],
                [4, 11],
                [5, 4],
                [6, 2],
                [7, 5],
                [8, 11],
                [9, 5],
                [10, 4],
                [11, 1],
                [12, 5],
                [13, 2],
                [14, 5],
                [15, 2],
                [16, 0]
            ];
            $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
                data1, data2
            ], {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,

                    borderWidth: 2,
                    color: 'transparent'
                },
                colors: ["#1ab394", "#1C84C6"],
                xaxis: {},
                yaxis: {},
                tooltip: false
            });

        });
    </script>
    {{--
    <!-- Page-Level Scripts -->--}}
    <script>

    </script>
    @stack('popups') @stack('scripts')
</body>



</html>