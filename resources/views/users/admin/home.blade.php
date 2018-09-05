@extends('layouts.admin') @section('content')


    <div class="wrapper wrapper-content">
            <div class="row">
                        <div class="col-lg-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <span class="label label-primary pull-right">Year</span>
                                    <span class="label label-primary pull-right">Month</span>
                                    <h5>Income</h5>
                                </div>
                                <div class="ibox-content">
                                    <h1 class="no-margins">₦40 886,200</h1>
                                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                                    <small>Total income</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <span class="label label-primary pull-right">Year</span>
                                    <span class="label label-primary pull-right">Month</span>
                                    <h5>Avg Energy Charge</h5>
                                </div>
                                <div class="ibox-content">
                                    <h1 class="no-margins">₦230</h1>
                                    <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                    <small>Daily cost of Power</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <span class="label label-primary pull-right">Year</span>
                                    <span class="label label-primary pull-right">Month</span>
                                    <h5>Unpaid Bills</h5>
                                </div>
                                <div class="ibox-content">
                                    <h1 class="no-margins">(₦2,106,120)</h1>
                                    <div class="stat-percent font-bold text-navy">14% <i class="fa fa-level-up"></i></div>
                                    <small>High Financial exposure</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <span class="label label-success pull-right">Top Up Now</span>
                                    <h5>Wallet Balance</h5>
                                </div>
                                <div class="ibox-content">
                                    <h1 class="no-margins">₦{{ number_format($balance) }}</h1>
                                    <div class="stat-percent font-bold text-success">5 days<i class="fa fa-bolt"></i></div>
                                    <small>Remaining days to finish</small>
                                </div>
                            </div>
                </div>
            </div>
            <div class="row">
                        <div class="col-lg-8">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Total Electrical Consumption</h5>
                                    <div class="pull-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-xs btn-white active">Today</button>
                                            <button type="button" class="btn btn-xs btn-white">Monthly</button>
                                            <button type="button" class="btn btn-xs btn-white">Annual</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                    <div class="col-lg-9">
                                        <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <ul class="stat-list">
                                            <li>
                                                <h2 class="no-margins">2,346</h2>
                                                <small>Total orders in period</small>
                                                <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: 48%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h2 class="no-margins ">4,422</h2>
                                                <small>Orders in last month</small>
                                                <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: 60%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h2 class="no-margins ">9,180</h2>
                                                <small>Monthly income from orders</small>
                                                <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: 22%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
    
                                </div>
                            </div>
    
    
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Profit Channels</h5>
                                    
                                </div>
                                <div class="ibox-content">
                                  
                                    <div class="ibox-content">
                                <div>
                                    <canvas id="doughnutChart" height="160"></canvas>
                                </div>
                            </div>
                                    
                                    </div>
                                    </div>
    
                                </div>
                            </div>
    
    
                        </div>
    
    
         
    
                    <div class="col-lg-14">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                Transaction Details: Agent Performance
                                            </div>
                                        <div class="ibox float-e-margins">
                        
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
    
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ajele</th>
                                    <th>Mushin</th>
                                    <th>Isolo</th>
                                    <th>Lekki</th>
                                    <th>Festac</th>
                                    <th>Ibeju</th>
                                    <th>Orile</th>
                                    <th>Apapa</th>
                                    <th>Ojo</th>
                                    <th>Agbara</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>₦521,124</td>
                                    <td>₦458,477</td>
                                    <td>₦784,457</td>
                                    <td>₦856,145</td>
                                    <td>₦475,254</td>
                                    <td>₦785,145</td>
                                    <td>₦142,532</td>
                                    <td>₦561,125</td>
                                    <td>₦965,142</td>
                                    <td>₦65,132</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>₦521,124</td>
                                    <td>₦458,477</td>
                                    <td>₦784,457</td>
                                    <td>₦856,145</td>
                                    <td>₦475,254</td>
                                    <td>₦785,145</td>
                                    <td>₦142,532</td>
                                    <td>₦561,125</td>
                                    <td>₦965,142</td>
                                    <td>₦65,132</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                   <td>₦521,124</td>
                                    <td>₦458,477</td>
                                    <td>₦784,457</td>
                                    <td>₦856,145</td>
                                    <td>₦475,254</td>
                                    <td>₦785,145</td>
                                    <td>₦142,532</td>
                                    <td>₦561,125</td>
                                    <td>₦965,142</td>
                                    <td>₦65,132</td>
                                </tr>
                                </tbody>
                            </table>
    
                        </div>
                    </div>
                    <div class="col-lg-14">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                Wallet Transaction History
                                            </div>
                                        <div class="ibox float-e-margins">
                        
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
    
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>RKL-Admin</th>
                                    <th>Ajele</th>
                                    <th>Mushin</th>
                                    <th>Isolo</th>
                                    <th>Lekki</th>
                                    <th>Festac</th>
                                    <th>Ibeju</th>
                                    <th>Orile</th>
                                    <th>Apapa</th>
                                    <th>Ojo</th>
                                    <th>Agbara</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>₦1,221,124</td>
                                    <td>₦521,124</td>
                                    <td>₦458,477</td>
                                    <td>₦784,457</td>
                                    <td>₦856,145</td>
                                    <td>₦475,254</td>
                                    <td>₦785,145</td>
                                    <td>₦142,532</td>
                                    <td>₦561,125</td>
                                    <td>₦965,142</td>
                                    <td>₦65,132</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>₦1,221,124</td>
                                    <td>₦521,124</td>
                                    <td>₦458,477</td>
                                    <td>₦784,457</td>
                                    <td>₦856,145</td>
                                    <td>₦475,254</td>
                                    <td>₦785,145</td>
                                    <td>₦142,532</td>
                                    <td>₦561,125</td>
                                    <td>₦965,142</td>
                                    <td>₦65,132</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                   <td>₦1,221,124</td>
                                    <td>₦521,124</td>
                                    <td>₦458,477</td>
                                    <td>₦784,457</td>
                                    <td>₦856,145</td>
                                    <td>₦475,254</td>
                                    <td>₦785,145</td>
                                    <td>₦142,532</td>
                                    <td>₦561,125</td>
                                    <td>₦965,142</td>
                                    <td>₦65,132</td>
                                </tr>
                                </tbody>
                            </table>
    
                        </div>
                    </div>
            </div>
        </div>
        <div class="footer">

            <div>
                <strong>Copyright</strong> GOENERGEE &copy; 2018
            </div>
        </div>
    </div>

</div>

<script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Unit of Electricity Consumped",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments received",
                    data: data2,
                    yaxis: 2,
                    color: "#1C84C6",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.4
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>
@endsection