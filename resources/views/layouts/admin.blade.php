<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>GOENERGEE | Meter Administration</title>

        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
        <link href="{{asset('css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

        <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

        <link href="{{asset('css/plugins/footable/footable.core.css')}}" rel="stylesheet">

        <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
        <link rel="icon" href="{{asset('images/favicon.png')}}" type='image/x-icon'>
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
                                    <img alt="image" class="img-circle nav-image" src="@if(Storage::disk('public')->exists(Auth::user()->avatar)) {{asset('storage/'.Auth::user()->avatar)}} @else {{asset('images/avatar.jpg')}} @endif"
                                    />
                                </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear">
                                        <span class="block m-t-xs">
                                            <strong class="font-bold"> {{Auth::user()->first_name}} {{Auth::user()->last_name}}</strong>
                                        </span>
                                        <span class="text-muted text-xs block">GOENERGEE
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
                            <a href="{{route('admin.finance')}}">
                                <span>&#8358;</span>
                                </i>
                                <span class="nav-label">&nbsp;Financial</span>
                            </a>
                        </li>

                        <li class="{{$current_route_name =="admin.customer_report" ? 'active' : ''}}">
                            <a href="{{route('admin.customer_report')}}">
                                <i class="fa fa-user"></i>
                                <span class="nav-label">Payment History</span>
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
                        <li class="{{$current_route_name =="admin.settings" ? 'active' : ''}}">
                            <a href="{{route('admin.settings')}}">
                                <i class="fa fa-address-card"></i>
                                <span class="nav-label">User Manager</span>
                            </a>
                        </li>
                        <li class="{{$current_route_name =="admin.sms" ? 'active' : ''}}">
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
                                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" onclick="this.innerHTML='Connecting to payment gateway'; payWithPaystack()" id="topUpBtn">
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

                <div class="wrapper wrapper-content animated fadeIn">
                    
                        @yield('content')
                    
                </div>

            </div>




            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
        <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

        <!-- Custom and plugin javascript -->
        <script src="{{asset('js/inspinia.js')}}"></script>
        <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

        <!-- ChartJS-->
        <script src="{{asset('js/plugins/chartJs/Chart.min.js')}}"></script>
        <script src="{{asset('js/demo/chartjs-demo.js')}}"></script>


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
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <script>
            function payWithPaystack() {
				var amount = document.querySelector('#topup-amount').value;
				var handler = PaystackPop.setup({
					key: 'pk_test_120bd5b0248b45a0865650f70d22abeacf719371',
					email: "admin@goenergee.com",
					amount: amount + "00",
					ref: 'GOENERGEE' + Math.floor((Math.random() * 1000000000) + 1) + "TOPUPADMIN", // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

					callback: function (response) {
						// swal('Yay!', 'Payment Successfull', 'success');
						setTimeout(() => {
							window.location.href = '/backend/topup-admin/success/'+amount;
						}, 1000);
					},
					onClose: function () {
						alert('Payment Cancelled');
						document.querySelector('#topUpBtn').innerHTML = "Top up Now";
					}
				});
				handler.openIframe();
			}
        </script>
        @stack('popups') @stack('scripts')

    </body>
    <!-- Mainly scripts -->

 
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
     
</html>