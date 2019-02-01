@extends('layouts.admin') @section('content')
<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #2F4050;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: #2F4050;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        color: #FFFFFF;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #FFFFFF;
        color: #FFFFFF;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #1AB394;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #1AB394;
        border-top: none;
    }
</style>

<link href="{{ asset('css/3dpie.css') }}" rel="stylesheet">
<link href="{{ asset('css/donut.css') }}" rel="stylesheet">
<link href="{{ asset('css/pie.css') }}" rel="stylesheet">
<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'disco')" id="defaultOpen">Income Report By Disco</button>
    <button class="tablinks" onclick="openCity(event, 'energy')">Energy Consumption</button>
    <button class="tablinks" onclick="openCity(event, 'meter')">Customer by Meter Type</button>
    <button class="tablinks" onclick="openCity(event, 'channel')">Performance by Channel</button>
</div>

<div id="disco" class="tabcontent">
    <div class="row">

        <div class="col-lg-4 col-md-4">

            <div class="stat">

                <div class="stat__icon-wrapper stat--bg-green">
                    <i data-feather="shopping-cart" class="stat__icon"></i>
                </div>
                <div class="stat__data">
                    <h1 class="stat__header">Total Income</h1>
                    <p class="stat__subheader"> <span>&#8358;</span>705,100</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="stat stat--has-icon-right">
                <div class="stat__icon-wrapper stat--bg-blue">
                    <i data-feather="briefcase" class="stat__icon"></i>
                </div>
                <div class="stat__data">
                    <h1 class="stat__header">Billers</h1>
                    <p class="stat__subheader">1</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="stat stat--has-icon-right">
                <div class="stat__icon-wrapper stat--bg-dark-red">
                    <i data-feather="sun" class="stat__icon stat--color-white"></i>
                </div>
                <div class="stat__data">
                    <h1 class="stat__header">Total Profit</h1>
                    <p class="stat__subheader"> <span>&#8358;</span>300</p>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h4>INCOME REPORT BY ENERGY DISTRIBUTION BILLERS</h4>
                    </div>

                    <div class="ibox-content">
                        <div class="text-center">
                            <div id="chartdiv1" height="140"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h4>INCOME REPORT BY CUSTOMER METER TYPE</h4>
                </div>

                <div class="ibox-content">
                    <div class="text-center">
                        <div id="chartdiv2" height="140"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="panel-heading text-center">
                    <h4>INCOME DISTRIBUTION PER MONTH</h4>
                </div>
                <div class="ibox-content">
                    <div>
                        <div id="income_bar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="energy" class="tabcontent">
    <div class="row">

        <div class="col-lg-4 col-md-4">

            <div class="stat">

                <div class="stat__icon-wrapper stat--bg-green">
                    <i data-feather="battery-charging" class="stat__icon"></i>
                </div>
                <div class="stat__data">
                    <h1 class="stat__header">Energy Distributed</h1>
                    <p class="stat__subheader"> 705,100 &nbsp; <span>KwH</span></p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="stat stat--has-icon-right">
                <div class="stat__icon-wrapper stat--bg-blue">
                    <i data-feather="airplay" class="stat__icon"></i>
                </div>
                <div class="stat__data">
                    <h1 class="stat__header">Districts</h1>
                    <p class="stat__subheader">10</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="stat stat--has-icon-right">
                <div class="stat__icon-wrapper stat--bg-dark-red">
                    <i data-feather="alert-triangle" class="stat__icon stat--color-white"></i>
                </div>
                <div class="stat__data">
                    <h1 class="stat__header">Highest Utilisation</h1>
                    <p class="stat__subheader"> Agbara</p>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h4>ENERGY CONSUMPTION BY DISTRICT</h4>
                    </div>

                    <div class="ibox-content">
                        <div class="text-center">
                            <div id="chartdiv" height="140"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h4>ENERGY CONSUMPTION BY METER TYPE</h4>
                </div>

                <div class="ibox-content">
                    <div class="text-center">
                        <div id="energy_consumption_by_meter" height="140"></div>
                    </div>
                </div>
            </div>
        </div>


        <!-- 
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h4>INCOME REPORT BY CUSTOMER METER TYPE</h4>
                </div>

                <div class="ibox-content">
                    <div class="text-center">
                        <div id="chartdiv2" height="140"></div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>

<div id="meter" class="tabcontent">
    <div class="row">

        <div class="col-lg-4 col-md-4">

            <div class="stat">

                <div class="stat__icon-wrapper stat--bg-green">
                    <i data-feather="square" class="stat__icon"></i>
                </div>
                <div class="stat__data">
                    <h1 class="stat__header">Prepaid Meters</h1>
                    <p class="stat__subheader"> 705,100</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="stat stat--has-icon-right">
                <div class="stat__icon-wrapper stat--bg-blue">
                    <i data-feather="speaker" class="stat__icon"></i>
                </div>
                <div class="stat__data">
                    <h1 class="stat__header">PostPaid Meters</h1>
                    <p class="stat__subheader">1</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="stat stat--has-icon-right">
                <div class="stat__icon-wrapper stat--bg-dark-red">
                    <i data-feather="trello" class="stat__icon stat--color-white"></i>
                </div>
                <div class="stat__data">
                    <h1 class="stat__header">Smart Meters</h1>
                    <p class="stat__subheader"> 300</p>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h4>POSTPAID VS PREPAID</h4>
                    </div>

                    <div class="ibox-content">
                        <div class="text-center">
                            <div id="meter_type" height="140"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="channel" class="tabcontent">
    <div class="row">

        <div class="col-lg-4 col-md-4">

            <div class="stat">

                <div class="stat__icon-wrapper stat--bg-green">
                    <i data-feather="server" class="stat__icon"></i>
                </div>
                <div class="stat__data">
                    <h1 class="stat__header">Bank to Bank Payment</h1>
                    <p class="stat__subheader"> 7,105,100</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="stat stat--has-icon-right">
                <div class="stat__icon-wrapper stat--bg-blue">
                    <i data-feather="credit-card" class="stat__icon"></i>
                </div>
                <div class="stat__data">
                    <h1 class="stat__header">Card Payment</h1>
                    <p class="stat__subheader">1,000,000</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="stat stat--has-icon-right">
                <div class="stat__icon-wrapper stat--bg-dark-red">
                    <i data-feather="hash" class="stat__icon stat--color-white"></i>
                </div>
                <div class="stat__data">
                    <h1 class="stat__header">Others</h1>
                    <p class="stat__subheader"> 12,300</p>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h4>Payment Channel Performance</h4>
                    </div>

                    <div class="ibox-content">
                        <div class="text-center">
                        <div id="funnel"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h4>INCOME REPORT BY CUSTOMER METER TYPE</h4>
                </div>

                <div class="ibox-content">
                    <div class="text-center">
                        <div id="chartdiv2" height="140"></div>
                    </div>
                </div>
            </div>
        </div> -->


       
    </div>
</div>
</div>



@push("scripts")

<script src="{{asset('js/index.js')}}"></script>
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



<script src="{{ asset('js/core.js') }}"></script>
<script src="{{ asset('js/charts.js') }}"></script>
<script src="{{ asset('js/animated.js') }}"></script>
<script src="{{ asset('js/3dpie.js') }}"></script>
<script src="{{ asset('js/donut.js') }}"></script>
<script src="{{ asset('js/cylinder.js') }}"></script>
<script src="{{ asset('js/pie.js') }}"></script>
<script src="{{ asset('js/meter_type.js') }}"></script>
<script src="{{ asset('js/energy_consumption_by_meter.js') }}"></script>
<script src="{{ asset('js/funnel.js') }}"></script>
<script src="{{ asset('js/3dfunnel.js') }}"></script>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
@endpush
@endsection