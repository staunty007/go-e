
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOENERGEE </title>
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

    <link href="{{asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/table1.css')}}" rel="stylesheet">

    <link href="{{asset('css/plugins/footable/footable.core.css')}}" rel="stylesheet">

       <link href="{{asset('css/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet">

    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('images/favicon.png')
    
    }}" type='image/x-icon'>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
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




        </div>
    </div>

    <!-- Mainly scripts -->


    <script src="{{asset('js/table.js')}}"></script>
    <script src="{{asset('js/tab.js')}}"></script>
    <script src="{{asset('js/table1.js')}}"></script>
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


    <!-- Peity -->
    <script src="{{asset('js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('js/demo/peity-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <script src="{{asset('js/plugins/footable/footable.all.min.js')}}"></script>

t>
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
                        title: 'Data-Excel'
                    },
                    {
                        extend: 'pdf',
                        title: 'Data-Pdf'
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

</body>



</html>
















