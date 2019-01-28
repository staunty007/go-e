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
    <link href="{{asset('css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/table1.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/footable/footable.core.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">

    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type='image/x-icon'>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api(),
                        data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column(4)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(4, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(4).footer()).html(
                        '$' + pageTotal + ' ( $' + total + ' total)'
                    );
                }
            });
        });
    </script>

    <script type="text/javascript" class="init">
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
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

                    <li class="{{$current_route_name =="admin.finance" ? 'active' : ''}}{{ Request::is('home') ? 'active' :'' }}">
                        <a><i class="fa fa-credit-card"></i> <span class="nav-label">Dashboard</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{ Request::is('backend/direct-transactions') ? 'active' :'' }}"><a href="{{ route('admin.finance') }}">Finance</a></li>
                            <li class="{{ Request::is('backend/income') ? 'active' :'' }}"><a href="{{ route('admin.income') }}">Income
                                    Report</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('backend/admin-topup-trackers') ? 'active' :'' || Request::is('backend/agent-topup-trackers') ? 'active' :'' }}">
                        <a><i class="fa fa-clone"></i> <span class="nav-label">Topup Trackers</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{ Request::is('backend/admin-topup-trackers') ? 'active' :'' }}"><a href="{{ route('admin.admin-topup-track') }}">Admin
                                    Topup</a></li>
                            <li class="{{ Request::is('backend/agent-topup-trackers') ? 'active' :'' }}"><a href="{{ route('admin.agent-topup-track') }}">Agent
                                    Topup</a></li>
                        </ul>
                    </li>

                    </li>

                    <li class="{{ Request::is('backend/direct-transactions') ? 'active' :'' || Request::is('backend/agent-transactions') ? 'active' :'' }}">
                        <a><i class="fa fa-credit-card"></i> <span class="nav-label">Payment History</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{ Request::is('backend/direct-transactions') ? 'active' :'' }}"><a href="{{ route('admin.direct-transactions') }}">Direct
                                    Transactions</a></li>
                            <li class="{{ Request::is('backend/agent-transactions') ? 'active' :'' }}"><a href="{{ route('admin.agent-transactions') }}">Agent
                                    Transactions</a></li>
                            <li class="{{ Request::is('backend/income_channel') ? 'active' :'' }}"><a href="{{ route('admin.income_channel') }}">Payment
                                    Channels
                                </a></li>


                        </ul>
                    </li>
                    <li class="{{ Request::is('backend/agentsales') ? 'active' :'' }}"><a href="{{ route('admin.agentsales') }}">
                            <i class="fa fa-money"></i>
                            <span class="nav-label">Agent Sales</span>
                        </a>
                    </li>
                    <li class="{{$current_route_name =="admin.payment_history" ? 'active' : ''}}">
                        <a href="{{route('admin.payment_history')}}">
                            <i class="fa fa-cc-visa"></i>
                            <span class="nav-label">Commission Split</span>
                        </a>
                    </li>

                    <li class="{{$current_route_name =="admin.demographics" ? 'active' : ''}}">
                        <a href="{{route('admin.demographics')}}">
                            <i class="fa fa fa-yelp"></i>
                            <span class="nav-label">Energy Consumption</span>
                        </a>
                    </li>

                    <li class="{{$current_route_name =="admin.meter_admin" ? 'active' : ''}}">
                        <a href="{{route('admin.meter_admin')}}">
                            <i class="fa fa-table"></i>
                            <span class="nav-label">Meter Management</span>
                        </a>
                    </li>

                    <li class="{{$current_route_name =="admin.profile" ? 'active' : ''}}">
                        <a href="{{route('admin.profile')}}">
                            <i class="fa fa-podcast"></i>
                            <span class="nav-label">Admin Profile</span>
                        </a>
                    </li>
                    {{-- <li class="{{$current_route_name =="admin.postpaid_bill" ? 'active' : ''}}">
                        <a href="{{route('admin.postpaid_bill')}}">
                            <i class="fa fa-podcast"></i>
                            <span class="nav-label">Post Paid Bill</span>
                        </a>
                    </li> --}}
                    <li class="{{ Request::is('backend/manage/users/*') ? 'active' :'' || Request::is('backend/manage/agents/*') ? 'active' :'' }}">
                        <a><i class="fa fa-users"></i> <span class="nav-label">User Manager</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{ Request::is('backend/manage/users/*') || Request::is('backend/manage/users') ? 'active' :'' }}"><a
                                    href="{{ route('users.index') }}">Manage
                                    Users</a></li>
                            <li class="{{ Request::is('backend/manage/agents/*') || Request::is('backend/manage/agents')? 'active' :'' }}"><a
                                    href="{{ route('agents.index') }}">Manage
                                    Agents</a></li>
                            <li class="{{ Request::is('backend/manage/discos/') || Request::is('backend/manage/discos/*') ? 'active' :'' }}"><a
                                    href="{{ route('discos.index') }}">Manage
                                    Discos</a></li>
                        </ul>
                    </li>
                    <li class="{{$current_route_name =="admin.manage_referal" ? 'active' : ''}}">
                        <a href="{{route('admin.manage_referal')}}">
                            <i class="fa fa-plug"></i>
                            <span class="nav-label">Referal Manager</span>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="{{ env('TICKETING_ADMIN_URL') }}">
                            <i class="fa fa-envelope"></i>
                            <span class="nav-label">CRM</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('admin.tickets' )}}">
                            <i class="fa fa-ticket"></i>
                            <span class="nav-label">Support Tickets</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        {{-- <button type="button" class="btn btn-primary mt-10" data-toggle="modal" data-target="#myModal6">
                            Top up Wallet Account
                        </button> --}}
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
                                                onclick="this.innerHTML='Connecting to payment gateway'; payWithPaystack()"
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
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to GOENERGEE Utility Meter
                                platform.</span>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit()"
                                onmouseover="style.background = '#1AB394'; style.color = '#fff'; " onmouseout="style.color = '#666';style.background = 'transparent';">
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
        <style>
    /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
    @import url("https://fonts.googleapis.com/css?family=Lato:400,400i,700");
    @import url("https://fonts.googleapis.com/css?family=Raleway:400,400i,700");

    html,
    body {
        min-height: 100%;
        /* background: #ecf0f1; */
    }

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

    .stat--bg-dark_grey {
        background: #2F4050;
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

    .stat--bg-dark-grey {
        background: #2F4050;
    }

    .stat--color-blue {
        color: #5BC0EB;
    }

    .stat--color-light_blue {
        color: #2F4050;
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
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">

<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

    <script src="https://unpkg.com/feather-icons"></script>
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
    <script src="{{asset('js/demo/sparkline-demo.js')}}"></script>

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
        function payWithPaystack() {
            var amount = document.querySelector('#topup-amount').value;
            // var handler = PaystackPop.setup({
            // 	key: 'pk_test_120bd5b0248b45a0865650f70d22abeacf719371',
            // 	email: "admin@goenergee.com",
            // 	amount: amount + "00",
            // 	ref: 'GOENERGEE' + Math.floor((Math.random() * 1000000000) + 1) + "TOPUPADMIN", // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

            // 	callback: function (response) {
            // swal('Yay!', 'Payment Successfull', 'success');
            setTimeout(() => {
                window.location.href = '/backend/topup-admin/success/' + amount;
            }, 1000);
            // 	},
            // 	onClose: function () {
            // 		alert('Payment Cancelled');
            // 		document.querySelector('#topUpBtn').innerHTML = "Top up Now";
            // 	}
            // });
            // handler.openIframe();
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
    @stack('popups') @stack('scripts')

    <!-- Mainly scripts -->
    <script src="{{asset('js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('js/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'csv'
                    },
                    {
                        extend: 'excel',
                        title: 'ExampleFile'
                    },
                    {
                        extend: 'pdf',
                        title: 'ExampleFile'
                    },

                    {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable('../example_ajax.php', {
                "callback": function (sValue, y) {
                    var aPos = oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                },
                "submitdata": function (value, settings) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition(this)[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            });


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData([
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row"
            ]);

        }
    </script>
    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chosen -->
    <script src="js/plugins/chosen/chosen.jquery.js"></script>

    <!-- JSKnob -->
    <script src="js/plugins/jsKnob/jquery.knob.js"></script>

    <!-- Input Mask-->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- NouSlider -->
    <script src="js/plugins/nouslider/jquery.nouislider.min.js"></script>

    <!-- Switchery -->
    <script src="js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Clock picker -->
    <script src="js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Image cropper -->
    <script src="js/plugins/cropper/cropper.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <script>
        $(document).ready(function () {

            var $image = $(".image-crop > img")
            $($image).cropper({
                aspectRatio: 1.618,
                preview: ".img-preview",
                done: function (data) {
                    // Output the result data for cropping image.
                }
            });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function () {
                    var fileReader = new FileReader(),
                        files = this.files,
                        file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }

            $("#download").click(function () {
                window.open($image.cropper("getDataURL"));
            });

            $("#zoomIn").click(function () {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function () {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function () {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function () {
                $image.cropper("rotate", -45);
            });

            $("#setDrag").click(function () {
                $image.cropper("setDragMode", "crop");
            });

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });

            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });

            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, {
                color: '#1AB394'
            });

            var elem_2 = document.querySelector('.js-switch_2');
            var switchery_2 = new Switchery(elem_2, {
                color: '#ED5565'
            });

            var elem_3 = document.querySelector('.js-switch_3');
            var switchery_3 = new Switchery(elem_3, {
                color: '#1AB394'
            });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            $('.demo1').colorpicker();

            var divStyle = $('.back-change')[0].style;
            $('#demo_apidemo').colorpicker({
                color: divStyle.backgroundColor
            }).on('changeColor', function (ev) {
                divStyle.backgroundColor = ev.color.toHex();
            });

            $('.clockpicker').clockpicker();

            $('input[name="daterange"]').daterangepicker();

            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment()
                .format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                opens: 'right',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-primary',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July',
                        'August', 'September', 'October', 'November', 'December'
                    ],
                    firstDay: 1
                }
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'));
            });

            $(".select2_demo_1").select2();
            $(".select2_demo_2").select2();
            $(".select2_demo_3").select2({
                placeholder: "Select a state",
                allowClear: true
            });


            $(".touchspin1").TouchSpin({
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $(".touchspin2").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%',
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $(".touchspin3").TouchSpin({
                verticalbuttons: true,
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });


        });
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {
                allow_single_deselect: true
            },
            '.chosen-select-no-single': {
                disable_search_threshold: 10
            },
            '.chosen-select-no-results': {
                no_results_text: 'Oops, nothing found!'
            },
            '.chosen-select-width': {
                width: "95%"
            }
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

        $("#ionrange_1").ionRangeSlider({
            min: 0,
            max: 5000,
            type: 'double',
            prefix: "$",
            maxPostfix: "+",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_2").ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " carats",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_3").ionRangeSlider({
            min: -50,
            max: 50,
            from: 0,
            postfix: "°",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_4").ionRangeSlider({
            values: [
                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"
            ],
            type: 'single',
            hasGrid: true
        });

        $("#ionrange_5").ionRangeSlider({
            min: 10000,
            max: 100000,
            step: 100,
            postfix: " km",
            from: 55000,
            hideMinMax: true,
            hideFromTo: false
        });

        $(".dial").knob();

        $("#basic_slider").noUiSlider({
            start: 40,
            behaviour: 'tap',
            connect: 'upper',
            range: {
                'min': 20,
                'max': 80
            }
        });

        $("#range_slider").noUiSlider({
            start: [40, 60],
            behaviour: 'drag',
            connect: true,
            range: {
                'min': 20,
                'max': 80
            }
        });

        $("#drag-fixed").noUiSlider({
            start: [40, 60],
            behaviour: 'drag-fixed',
            connect: true,
            range: {
                'min': 20,
                'max': 80
            }
        });
    </script>
</body>

</html>