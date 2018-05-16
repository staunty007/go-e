<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>GOENERGEE | Meter Administration</title>

        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

        <link href="{{asset('css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

        <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

        <link href="{{asset('css/plugins/footable/footable.core.css')}}" rel="stylesheet">

        <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
        <link rel="icon" href="{{asset('images/favicon.png')}}" type='image/x-icon'>

    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element">
                                <span>
                                    <img alt="image" class="img-circle" src="{{asset('images/profile_small.jpg')}}" />
                                </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear">
                                        <span class="block m-t-xs">
                                            <strong class="font-bold">Patrick Chigbata</strong>
                                        </span>
                                        <span class="text-muted text-xs block">Developer
                                            <b class="caret"></b>
                                        </span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li>
                                        <a href="{{route('admin.profile')}}">Profile</a>
                                    </li>
                                    <li>
                                        <a href="contacts.html">Contacts</a>
                                    </li>
                                    <li>
                                        <a href="mailbox.html">Mailbox</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="login.html">Logout</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="logo-element">
                                GO
                            </div>
                        </li>

                        <li class="active">
                            <a href="{{route('admin.finance')}}">
                                <span>&#8358;</span>
                                </i>
                                <span class="nav-label">&nbsp;Financial</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.customer_report')}}">
                                <i class="fa fa-user"></i>
                                <span class="nav-label">Customer Report</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.payment_history')}}">
                                <i class="fa fa-cc-visa"></i>
                                <span class="nav-label">Payment History</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.demographics')}}">
                                <i class="fa fa fa-yelp"></i>
                                <span class="nav-label">Energy Consumption</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.meter_admin')}}">
                                <i class="fa fa-table"></i>
                                <span class="nav-label">Meter Management</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.profile')}}">
                                <i class="fa fa-podcast"></i>
                                <span class="nav-label">Admin Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.settings')}}">
                                <i class="fa fa-address-card"></i>
                                <span class="nav-label">User Manager</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.sms')}}">
                                <i class="fa fa-envelope"></i>
                                <span class="nav-label">SMS Gateway</span>
                            </a>
                        </li>
                    </ul>


            </nav>

            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                                <i class="fa fa-bars"></i>
                            </a>
                            <form role="search" class="navbar-form-custom" action="search_results.html">
                                <div class="form-group">
                                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                                </div>
                            </form>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">Welcome to GOENERGEE Utility Meter platform.</span>
                            </li>



                            <li>
                                <a href="login.html">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>

                        </ul>

                    </nav>
                </div>

                <div class="wrapper wrapper-content animated fadeIn">
                    <div class="p-w-md m-t-sm">
                        @yield('content')
                    </div>
                </div>

            </div>




            </div>
        </div>

        <!-- Mainly scripts -->

        <!-- Data picker -->
        <script src="{{asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

        <!-- FooTable -->
        <script src="{{asset('js/plugins/footable/footable.all.min.js')}}"></script>


        <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
        <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

        <!-- Flot -->
        <script src="{{asset('js/plugins/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('js/plugins/flot/jquery.flot.spline.js')}}"></script>
        <script src="js/plugins/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('js/plugins/flot/jquery.flot.symbol.js')}}"></script>
        <script src="{{asset('js/plugins/flot/jquery.flot.time.js')}}"></script>

        <!-- Custom and plugin javascript -->
        <script src="{{asset('js/inspinia.js')}}"></script>
        <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

        <!-- Sparkline -->
        <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

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

    </body>

</html>