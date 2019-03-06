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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link href="css/plugins/cropper/cropper.min.css" rel="stylesheet">

    <link href="css/plugins/switchery/switchery.css" rel="stylesheet">




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

    <!--Start on or off switch toggle-->
    <style>
        .onoffswitch {
    position: relative; width: 90px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
    display: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 20px;
}
.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100%;
    transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 10px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    box-sizing: border-box;
}
.onoffswitch-inner:before {
    content: "Meter Top Up";
    padding-left: 2px;
    background-color: #34A7C1; color: #FFFFFF;
}
.onoffswitch-inner:after {
    content: "OFF";
    padding-right: 10px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
}
.onoffswitch-switch {
    display: block; width: 18px; margin: 6px;
    background: #FFFFFF;
    position: absolute; top: 0; bottom: 0;
    right: 56px;
    border: 2px solid #999999; border-radius: 20px;
    transition: all 0.3s ease-in 0s; 
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
}
</style>
    <!--End On or off switch toggle -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

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
                        @if(Auth::user()->customer->user_type == 1)
                        <li class="{{ Request::is('customer/prepaid-payment') ? 'active' :'' }}"><a href="{{ route('customer.prepaid-payment') }}">Prepaid
                            Payment</a></li>
                        @else
                        <li><a href="{{ route('customer.postpaid-payment') }}">Postpaid Payment</a></li>
                        @endif
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
                                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search"
                                        id="top-search">
                                </div>
                            </form> --}}
                            <div class="row" style="margin-top: 1em">

                                <button class="btn btn-primary">Pay Bill
                                </button>

                                <button type="button" class="btn btn-primary mt-10" data-toggle="modal" data-target="#myModal6">
                                    Top up Wallet
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
                                                    </form>&
                                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"
                                                        onclick="this.innerHTML='Processing...'; diamondPay()" id="topUpBtn">
                                                        <strong>Top Up Now</strong>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    @endpush
                                    <!-- &nbsp; &nbsp; &nbsp; <label type="button" class="btn btn-info mt-8">
                                Meter Auto Top-up<input type="checkbox" class="js-switch" checked /> -->
                                    <!-- <input id="toggle-one" checked type="checkbox"> <script> $(function() { $('#toggle-one').bootstrapToggle(); }) </script>
                             -->
                                    <div class="onoffswitch pull-right">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch"
                                            checked>
                                        <label class="onoffswitch-label" for="myonoffswitch">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
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
                                            @if(Auth::user()->customer->user_type == 1)
                                            <center>
                                                <a href="{{ route('customer.prepaid-payment') }}" class="btn btn-primary">Prepaid</a>
                                            </center>
                                            @else
                                            <center>
                                                <a href="{{route('customer.postpaid-payment') }}" target="_blank" class="btn btn-success">Postpaid</a>
                                            </center>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <ul class="nav navbar-top-links navbar-right">
                                <li>
                                    <span class="m-r-sm welcome-message" style="color: #fff"> Welcome <b>{{
                                            Auth::user()->first_name}} {{ Auth::user()->last_name}} </b>| GOENERGEE
                                        Utility Platform </span>
                                </li>
                                <li>

                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit()"
                                        onmouseover="style.background = '#1AB394'; style.color = '#fff'; " onmouseout="style.color = '#fff';style.background = 'transparent';"
                                        style="background: transparent; color: rgb(255,255,255);><i class=" fa
                                        fa-sign-out"></i>
                                        Logout</a>
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

                <div class="footer">

                    <div class="container text-center">
                        Powered by &nbsp;<strong> GOENERGEE</strong> &nbsp;&copy; 2019
                    </div>
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

            // feather.replace()
        </script>

        @stack('scripts')
        <script>
        $(document).ready(function(){

            
            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1AB394' });

            var elem_2 = document.querySelector('.js-switch_2');
            var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

            var elem_3 = document.querySelector('.js-switch_3');
            var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

            var elem_4 = document.querySelector('.js-switch_4');
            var switchery_4 = new Switchery(elem_4, { color: '#f8ac59' });
                switchery_4.disable();

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

           
        });

    </script>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Select2 -->
        <script src="js/plugins/select2/select2.full.min.js"></script>
        <!-- Mainly scripts -->
        <script src="js/jquery-3.1.1.min.js"></script>
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

        

        <!-- TouchSpin -->
        <script src="js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

        <!-- Tags Input -->
        <script src="js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

        <!-- Dual Listbox -->
        <script src="js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>

        <script>
            $(document).ready(function () {

                $('.tagsinput').tagsinput({
                    tagClass: 'label label-primary'
                });

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

                var elem_4 = document.querySelector('.js-switch_4');
                var switchery_4 = new Switchery(elem_4, {
                    color: '#f8ac59'
                });
                switchery_4.disable();

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

                $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' +
                    moment().format('MMMM D, YYYY'));

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
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(
                            1, 'month').endOf('month')]
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


                
            });


        });

        $('.chosen-select').chosen({width: "100%"});

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

        var basic_slider = document.getElementById('basic_slider');

        noUiSlider.create(basic_slider, {
            start: 40,
            behaviour: 'tap',
            connect: 'upper',
            range: {
                'min':  20,
                'max':  80
            }
        });

        var range_slider = document.getElementById('range_slider');

        noUiSlider.create(range_slider, {
            start: [ 40, 60 ],
            behaviour: 'drag',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });

        var drag_fixed = document.getElementById('drag-fixed');

        noUiSlider.create(drag_fixed, {
            start: [ 40, 60 ],
            behaviour: 'drag-fixed',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });

        });
    </script>
</body>

</html>