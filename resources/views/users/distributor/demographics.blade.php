@extends('layouts.distributor') @section('content')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
        window.onload = function () {
            
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
 
            axisX:{
                interval: 1
            },
            axisY2:{
                interlacedColor: "rgba(163, 225, 212,.2)",
                gridColor: "rgba(26, 179, 148,.1)",

            },
            data: [{
                type: "bar",
                name: "districts",
                axisYType: "secondary",
                color: "#014D65",
                dataPoints: [
                    { y: 3, label: "Orile" },
                    { y: 7, label: "Ojo" },
                    { y: 5, label: "Island" },
                    { y: 9, label: "Ijora" },
                    { y: 7, label: "Festac" },
                    { y: 7, label: "Apapa" },
                    { y: 9, label: "Agbara" },
                ]
            }]
        });
        chart.render();
        
        }
        </script>
<div class="row">


    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5> Sabotage Complain</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">106,120</h1>
                <div class="stat-percent font-bold text-navy">44%
                    <i class="fa fa-level-up"></i>
                </div>
                <small>Power Vandalisation Reports</small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-danger pull-right">Ojo</span>
                <span class="label label-danger pull-right">Ajele</span>
                <span class="label label-danger pull-right">Mushin</span>
                <h5>Power Outage</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">₦980,600</h1>
                <div class="stat-percent font-bold text-danger">38%
                    <i class="fa fa-level-down"></i>
                </div>
                <small>Loss in revenue</small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-danger pull-right">Aug</span>


                <h5>Meter Tamper Report</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">22,000</h1>

                <small>Number of Meters Tampered </small>
            </div>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Energy Consumption by District</h5>
                    
                </div>
                <div class="ibox-content">
                        <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                        
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Live Power Consumption</h5>
                    
                </div>
                <div class="ibox-content">

                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-line-chart-moving"></div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>


    
</div>
<style>
    a.canvasjs-chart-credit {
        display: none !important;
        visibility: hidden !important;
    }
</style>
<div class="col-lg-14">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>GOENERGEE Demographics Energy Utilization Report</h4>
        </div>

        <div class="ibox-content">

            <table class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Dates</th>
                        <th>Orile</th>
                        <th>Ojo</th>
                        <th>Island</th>
                        <th>Ijora</th>
                        <th>Festac</th>
                        <th>Apapa</th>
                        <th>Agbara</th>
                        


                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>G0-01</td>
                        <td>2/5/2018</td>
                        <td>620</td>
                        <td>500</td>
                        <td>750</td>
                        <td>900</td>
                        <td>800</td>
                        <td>600</td>
                        <td>450</td>

                    </tr>

                </tbody>
            </table>

        </div>
    </div>

</div>
@push("scripts")

<script src="{{asset('js/demo/flot-demo.js')}}"></script>

@endpush @endsection