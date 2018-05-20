<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GOENERGEE | FINANCIAL REPORT</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <!-- c3 Charts -->
    <link href="/css/plugins/c3/c3.min.css" rel="stylesheet">
	
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
	<link rel="icon" href="/img/favicon.png" type='/image/x-icon'>
	
	    <!-- orris -->
    <link href="/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"><span>
                        <img alt="image" class="img-circle" src="{{asset('images/profile_small.png')}}" />
                    </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Patrick Chigbata</strong>
                             </span> <span class="text-muted text-xs block">GOENERGEE - AGENT<b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                           
                            <li class="divider"></li>
                            <li><a href="./index">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        GO
                    </div>
                </li>
                <li class="{{ Request::is('home') ? 'active': '' }}"><a href="{{ route('agent.dashboard') }}"><span>&#8358;</span></i> <span class="nav-label">&nbsp;My Dashboard</span></a>
                </li>
                <li class="{{ Request::is('agent/payment-history') ? 'active': '' }}">
                    <a href="{{ route('agent.payHistory') }}"><i class="fa fa-cc-visa"></i> <span class="nav-label">Payment History</span></a>
                </li>
				<li class="{{ Request::is('agent/meter-management') ? 'active': '' }}">
                   <a href="{{ route('agent.meter') }}"><i class="fa fa-table"></i> <span class="nav-label">Meter Request</span></a>
                </li>
                 <li class="{{ Request::is('agent/profile') ? 'active': '' }}"> 
                    <a href="{{ route('agent.profile') }}"><i class="fa fa-podcast"></i> <span class="nav-label">Agent Profile</span></a>
                </li>
                
                
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="btn btn-primary mt-10" data-toggle="modal" data-target="#myModal6">
                Top up Wallet Account
            </button>
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
                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" onclick="payWithPaystack()" id="topUpBtn">
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
                    <span class="m-r-sm text-muted welcome-message">Welcome to GOENERGEE Utility Meter platform.</span>
                </li>
                


                <li>

                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit()">
                        <i class="fa fa-sign-out"></i>logout</a>
                    <form class="logout-form" method="POST" action="{{ route('logout') }}">
                        {{ csrf_field()}}
                    </form>
                </li>

                
            </ul>

        </nav>
        </div>

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
	
	<!-- ChartJS-->
    <script src="/js/plugins/chartJs/Chart.min.js"></script>
    <script src="/js/demo/chartjs-demo.js"></script>
	
	<!-- d3 and c3 charts -->
    <script src="/js/plugins/d3/d3.min.js"></script>
    <script src="/js/plugins/c3/c3.min.js"></script>

	
	
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    

    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>
    <script src="/js/plugins/pace/pace.min.js"></script>

    <!-- Sparkline -->
    <script src="/js/plugins/sparkline/jquery.sparkline.min.js"></script>
	
	<!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>
    <script src="/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

	
	
    <script>

        $(document).ready(function () {

            c3.generate({
                bindto: '#lineChart',
                data:{
                    columns: [
                        ['data1', 30, 200, 100, 400, 150, 250],
                        ['data2', 50, 20, 10, 40, 15, 25]
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    }
                }
            });

            c3.generate({
                bindto: '#slineChart',
                data:{
                    columns: [
                        ['Web', 30, 200, 100, 400, 150, 250],
						['Mcash', 39, 120, 120, 300, 250, 150],
                        ['POS', 130, 100, 140, 200, 150, 50]
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    },
                    type: 'spline'
                }
            });

            c3.generate({
                bindto: '#scatter',
                data:{
                    xs:{
                        data1: 'data1_x',
                        data2: 'data2_x'
                    },
                    columns: [
                        ["data1_x", 3.2, 3.2, 3.1, 2.3, 2.8, 2.8, 3.3, 2.4, 2.9, 2.7, 2.0, 3.0, 2.2, 2.9, 2.9, 3.1, 3.0, 2.7, 2.2, 2.5, 3.2, 2.8, 2.5, 2.8, 2.9, 3.0, 2.8, 3.0, 2.9, 2.6, 2.4, 2.4, 2.7, 2.7, 3.0, 3.4, 3.1, 2.3, 3.0, 2.5, 2.6, 3.0, 2.6, 2.3, 2.7, 3.0, 2.9, 2.9, 2.5, 2.8],
                        ["data2_x", 3.3, 2.7, 3.0, 2.9, 3.0, 3.0, 2.5, 2.9, 2.5, 3.6, 3.2, 2.7, 3.0, 2.5, 2.8, 3.2, 3.0, 3.8, 2.6, 2.2, 3.2, 2.8, 2.8, 2.7, 3.3, 3.2, 2.8, 3.0, 2.8, 3.0, 2.8, 3.8, 2.8, 2.8, 2.6, 3.0, 3.4, 3.1, 3.0, 3.1, 3.1, 3.1, 2.7, 3.2, 3.3, 3.0, 2.5, 3.0, 3.4, 3.0],
                        ["data1", 1.4, 1.5, 1.5, 1.3, 1.5, 1.3, 1.6, 1.0, 1.3, 1.4, 1.0, 1.5, 1.0, 1.4, 1.3, 1.4, 1.5, 1.0, 1.5, 1.1, 1.8, 1.3, 1.5, 1.2, 1.3, 1.4, 1.4, 1.7, 1.5, 1.0, 1.1, 1.0, 1.2, 1.6, 1.5, 1.6, 1.5, 1.3, 1.3, 1.3, 1.2, 1.4, 1.2, 1.0, 1.3, 1.2, 1.3, 1.3, 1.1, 1.3],
                        ["data2", 2.5, 1.9, 2.1, 1.8, 2.2, 2.1, 1.7, 1.8, 1.8, 2.5, 2.0, 1.9, 2.1, 2.0, 2.4, 2.3, 1.8, 2.2, 2.3, 1.5, 2.3, 2.0, 2.0, 1.8, 2.1, 1.8, 1.8, 1.8, 2.1, 1.6, 1.9, 2.0, 2.2, 1.5, 1.4, 2.3, 2.4, 1.8, 1.8, 2.1, 2.4, 2.3, 1.9, 2.3, 2.5, 2.3, 1.9, 2.0, 2.3, 1.8]
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    },
                    type: 'scatter'
                }
            });

            c3.generate({
                bindto: '#stocked',
                data:{
                    columns: [
                        ['data1', 30,200,100,400,150,250],
                        ['data2', 50,20,10,40,15,25]
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    },
                    type: 'bar',
                    groups: [
                        ['data1', 'data2']
                    ]
                }
            });

            c3.generate({
                bindto: '#gauge',
                data:{
                    columns: [
                        ['data', 91.4]
                    ],

                    type: 'gauge'
                },
                color:{
                    pattern: ['#1ab394', '#BABABA']

                }
            });

            c3.generate({
                bindto: '#pie',
                data:{
                    columns: [
                        ['data1', 30],
                        ['data2', 120]
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    },
                    type : 'pie'
                }
            });

        });

    </script>

<script>
        $(document).ready(function() {

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
        $(document).ready(function() {

            var sparklineCharts = function(){
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

                $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16,8], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1C84C6',
                    fillColor: "transparent"
                });
            };

            var sparkResize;

            $(window).resize(function(e) {
                clearTimeout(sparkResize);
                sparkResize = setTimeout(sparklineCharts, 500);
            });

            sparklineCharts();




            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,20],[11,10],[12,13],[13,4],[14,7],[15,8],[16,12]
            ];
            var data2 = [
                [0,0],[1,2],[2,7],[3,4],[4,11],[5,4],[6,2],[7,5],[8,11],[9,5],[10,4],[11,1],[12,5],[13,2],[14,5],[15,2],[16,0]
            ];
            $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
                        data1,  data2
                    ],
                    {
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
                        xaxis:{
                        },
                        yaxis: {
                        },
                        tooltip: false
                    }
            );

        });
    </script>
	<script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        
        function payWithPaystack() {
            alert('This payment is not yet completed');
            var amount = document.querySelector('#topup-amount').value;
            var handler = PaystackPop.setup({
                key: 'pk_test_120bd5b0248b45a0865650f70d22abeacf719371',
                email: "admin@goenergee.com",
                amount: amount + "00",
                ref: 'GOENERGEE' + Math.floor((Math.random() * 1000000000) + 1) + "TOPUPADMIN", // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

                callback: function (response) {
                    // swal('Yay!', 'Payment Successfull', 'success');
                    setTimeout(() => {
                        window.location.href = '/backend/topup-agent/success/'+amount;
                    }, 1000);
                },
                onClose: function () {
                    alert('Payment Cancelled');
                    $('#topUPBtn').html('Top up');
                }
            });
            handler.openIframe();
        }
    </script>
    @stack('popups') @stack('scripts')
</body>
</html>
