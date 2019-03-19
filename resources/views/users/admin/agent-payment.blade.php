@extends('layouts.admin') @section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">
<div class="row">
    <div class="col-lg-4 col-md-4">

        <div class="stat">

            <div class="stat__icon-wrapper stat--bg-green">
                <i data-feather="users" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Total Customers<span class="pull-right">{{ $customers }}</span></h1>
                <p class="stat__subheader">

                    <h4 class="no-margins">10 <span class="pull-right">15</span></h4>
                    <small>Registrered<span class="pull-right">Unregistered</span></small>
                 </p>
            </div>
         </div>
    </div>

<div class="col-lg-4 col-md-4">
    <div class="stat stat--has-icon-right">
        <div class="stat__icon-wrapper stat--bg-dark_grey">
            <i data-feather="server" class="stat__icon stat--color-white"></i>
        </div>
        <div class="stat__data">
            <h1 class="stat__header">Prepaid <span class="pull-right">{{ $prepaids }}</span></h1>
            <p class="stat__subheader">

                <h4 class="no-margins">2 <span class="pull-right">2</span></h4>
                <small>Registrered<span class="pull-right">Unregistered</span></small>
                </p>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4">
    <div class="stat stat--has-icon-right">
        <div class="stat__icon-wrapper stat--bg-orange">
            <i data-feather="sliders" class="stat__icon stat--color-white"></i>
        </div>
        <div class="stat__data">
            <h1 class="stat__header">Postpaid <span class="pull-right">{{ $postpaids }}</span></h1>
            <p class="stat__subheader">

                <h4 class="no-margins">0 <span class="pull-right">0</span></h4>
                <small>Registrered<span class="pull-right">Unregistered</span></small>
                </p>
        </div>
    </div>
</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    {{-- <div class="row">
        <div class="col-lg-4">


            <div class="widget yellow-bg p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-thumbs-up fa-4x"></i>
                    <h1 class="m-xs">Wallet Deposit</h1>
                    <h3 class="font-bold no-margins">
                        Current Balance is
                    </h3>
                    <span>&#8358;</span>
                </div>
            </div>


        </div>
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Customer Meter Type Profile - Pre & Post Paid</h5>
                </div>
                <div class="ibox-content">
                    <div>
                        <canvas id="barChart" height="140"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}




    <div class="col-lg-14" style="width:100%">
        <div class="panel panel-primary">
            <div class="panel-heading">
                GOENERGEE Customer Transaction
            </div>
            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Filter By Date</h4>
                        <div class="input-group input-daterange">
                    
                            <input type="text" id="min-date" class="form-control date-range-filter" data-date-format="dd/mm/yy" placeholder="From:">
                    
                            <div class="input-group-addon">to</div>
                            <input type="text" id="max-date" class="form-control date-range-filter" data-date-format="dd/mm/yy" placeholder="To:">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row"> 
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="amount">Filter By District</label>
                            <select id="district" class="form-control">
                                <option value="">All</option>
                                <option value="Agbara">Agbara</option>
                                <option value="Ojo">Ojo</option>
                                <option value="Festac">Festac</option>
                                <option value="Ijora">Ijora</option>
                                <option value="Mushin">Mushin</option>
                                <option value="Apapa">Apapa</option>
                                <option value="Lekki">Lekki</option>
                                <option value="Island">Island</option>
                                <option value="Ibeju">Ibeju</option>
                                <option value="Orile">Orile</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="amount">Filter By Channel</label>
                            <select id="channel" class="form-control">
                                <option value="">All</option>
                                <option value="Web">Web</option>
                                <option value="POS">POS</option>
                                <option value="Mobile">Ussd</option>
                                <option value="Mobile">mVisa</option>
                                <option value="Mobile">Agency</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="amount">Filter By Bank</label>
                            <select id="bank" class="form-control">
                                <option value="">All Banks</option>
                                <option value="Access Bank Plc">Access Bank Plc</option>
                                <option value="Citibank Nigeria Limited">Citibank Nigeria Limited</option> 
                                <option value="Diamond Bank Plc">Diamond Bank Plc</option>
                                <option value="Ecobank Nigeria Plc">Ecobank Nigeria Plc</option>
                                <option value="Fidelity Bank Plc">Fidelity Bank Plc</option>
                                <option value="FIRST BANK NIGERIA LIMITED">FIRST BANK NIGERIA LIMITED</option>
                                <option value="First City Monument Bank Plc">First City Monument Bank Plc</option>
                                <option value="Guaranty Trust Bank Plc">Guaranty Trust Bank Plc</option>
                                <option value="Heritage Banking Company Ltd">Heritage Banking Company Ltd</option> 
                                <option value="Key Stone Bank">Key Stone Bank</option>
                                <option value="Polaris Bank">Polaris Bank</option>
                                <option value="Providus Bank">Providus Bank</option> 
                                <option value="Stanbic IBTC Bank Ltd">Stanbic IBTC Bank Ltd</option> 
                                <option value="Standard Chartered Bank Nigeria Ltd">Standard Chartered Bank Nigeria Ltd</option>
                                <option value="Sterling Bank Plc">Sterling Bank Plc</option>
                                <option value="SunTrust Bank Nigeria Limited">SunTrust Bank Nigeria Limited</option>
                                <option value="Union Bank of Nigeria Plc">Union Bank of Nigeria Plc</option>
                                <option value="United Bank For Africa Plc">United Bank For Africa Plc</option> 
                                <option value="Unity Bank Plc">Unity Bank Plc</option>
                                <option value="Wema Bank Plc">Wema Bank Plc</option>
                                <option value="Zenith Bank Plc">Zenith Bank Plc</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="amount">Filter By Type</label>
                            <select id="type" class="form-control">
                                <option value="">All</option>
                                <option value="PREPAID">Prepaid</option>
                                <option value="Postpaid">Postpaid</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="amount">Filter By Acc / Meter</label>
                            <input type="text" class="form-control" id="meter_account">
                        </div>
                    </div>
               
                <!-- Row ends -->
            
            <div class="ibox-content m-b-sm border-bottom">
                
            <div style="overflow-x:auto;">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="tablo">
                            <thead>
                                <tr>
                                    <th data-hide="phone">Trans Date</th>
                                    <th data-hide="phone">Trans Ref</th>
                                    <th data-hide="phone">Trans type</th>
                                    <th data-hide="phone">Status</th>
                                    <th data-hide="phone">Customer Name</th>
                                    <th data-hide="phone">Meter Type</th>
                                    <th data-hide="phone">Agent Name</th>
                                    <th data-hide="phone">Agent ID</th>
                                    <th data-hide="phone">District</th>
                                    <th data-hide="phone">Meter #</th>
                                    <th data-hide="phone">Value Purchased</th>
                                    {{-- <th data-hide="phone">PIN</th> --}}
                                    <th data-hide="phone">KwH</th>
                                    <th data-hide="phone">Conv. Fee</th>
                                    <th data-hide="phone">Commission</th>
                                    <th data-hide="phone">Amount Chrgd</th>
                                    
                                    <th data-hide="phone">PGP</th>
                                    <th data-hide="phone">Agent #</th>
                                    {{-- <th>BAL</th> --}}
                                    <th data-hide="phone">SPEC</th>
                                    <th data-hide="phone">RKL</th>
                                    <th data-hide="phone">Total</th>
                                    <th data-hide="phone">Net Amt</th>
                                    <th data-hide="phone">Wallet Balance</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($payment as $p)
                                <tr>
                                    <td>{{ date('d/m/Y', strtotime($p->created_at)) }}</td>
                                    <td>{{ $p->transaction_ref }}</td>
                                    <td>{{ $p->transaction_type }}</td>
                                    <td>
                                        <span class="label label-primary">Successful</span>
                                    </td>
                                    <td>{{ $p->first_name }} {{ $p->last_name }}</td>
                                    <td>
                                        @if ($p->user_type == 1)
                                        {{ 'Prepaid' }}
                                        @else
                                        {{ 'Postpaid' }}
                                        @endif
                                    </td>

                                    <td>{{ $p->a_fname .' '. $p->a_lname }}</td>
                                    <td>{{ $p->agent_id }}</td>
                                    <td>Lekki</td>
                                    <td>{{ $p->meter_no }}</td>
                                    <td>₦{{$p->initial_amount }}</td>

                                    {{-- <td>{{ $p->recharge_pin }}</td> --}}
                                    <td>{{ round($p->value_of_kwh,1) }}</td>
                                    <td>₦{{ $p->conv_fee }}</td>
                                    <td>₦{{ $p->commission }}</td>
                                    <td>₦{{ $p->total_amount }}</td>
                                    
                                    <td>₦{{ $p->pgp }}</td>
                                    <td>₦{{ $p->agent }}</td>
                                    <td>₦{{ $p->spec }}</td>
                                    <td>₦{{ $p->ralmuof }}</td>
                                    <td>₦{{ $p->total_split }}</td>
                                    <td>₦{{ $p->net_amount }}</td>
                                    <td>₦{{ $p->wallet_bal }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>


            </div>




        </div>
    </div>

</div>

</div>
@push('scripts')

<script src="js/plugins/chartJs/Chart.min.js"></script>
<script src="js/demo/chartjs-demo.js"></script>
<script>
    $(document).ready(function () {
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
            [gd(2012, 1, 1), 7],
            [gd(2012, 1, 2), 6],
            [gd(2012, 1, 3), 4],
            [gd(2012, 1, 4), 8],
            [gd(2012, 1, 5), 9],
            [gd(2012, 1, 6), 7],
            [gd(2012, 1, 7), 5],
            [gd(2012, 1, 8), 4],
            [gd(2012, 1, 9), 7],
            [gd(2012, 1, 10), 8],
            [gd(2012, 1, 11), 9],
            [gd(2012, 1, 12), 6],
            [gd(2012, 1, 13), 4],
            [gd(2012, 1, 14), 5],
            [gd(2012, 1, 15), 11],
            [gd(2012, 1, 16), 8],
            [gd(2012, 1, 17), 8],
            [gd(2012, 1, 18), 11],
            [gd(2012, 1, 19), 11],
            [gd(2012, 1, 20), 6],
            [gd(2012, 1, 21), 6],
            [gd(2012, 1, 22), 8],
            [gd(2012, 1, 23), 11],
            [gd(2012, 1, 24), 13],
            [gd(2012, 1, 25), 7],
            [gd(2012, 1, 26), 9],
            [gd(2012, 1, 27), 9],
            [gd(2012, 1, 28), 8],
            [gd(2012, 1, 29), 5],
            [gd(2012, 1, 30), 8],
            [gd(2012, 1, 31), 25]
        ];

        var data3 = [
            [gd(2012, 1, 1), 800],
            [gd(2012, 1, 2), 500],
            [gd(2012, 1, 3), 600],
            [gd(2012, 1, 4), 700],
            [gd(2012, 1, 5), 500],
            [gd(2012, 1, 6), 456],
            [gd(2012, 1, 7), 800],
            [gd(2012, 1, 8), 589],
            [gd(2012, 1, 9), 467],
            [gd(2012, 1, 10), 876],
            [gd(2012, 1, 11), 689],
            [gd(2012, 1, 12), 700],
            [gd(2012, 1, 13), 500],
            [gd(2012, 1, 14), 600],
            [gd(2012, 1, 15), 700],
            [gd(2012, 1, 16), 786],
            [gd(2012, 1, 17), 345],
            [gd(2012, 1, 18), 888],
            [gd(2012, 1, 19), 888],
            [gd(2012, 1, 20), 888],
            [gd(2012, 1, 21), 987],
            [gd(2012, 1, 22), 444],
            [gd(2012, 1, 23), 999],
            [gd(2012, 1, 24), 567],
            [gd(2012, 1, 25), 786],
            [gd(2012, 1, 26), 666],
            [gd(2012, 1, 27), 888],
            [gd(2012, 1, 28), 900],
            [gd(2012, 1, 29), 178],
            [gd(2012, 1, 30), 555],
            [gd(2012, 1, 31), 993]
        ];


        var dataset = [{
            label: "Unit of Electricity Consumed",
            data: data3,
            color: "#1ab394",
            bars: {
                show: true,
                align: "center",
                barWidth: 24 * 60 * 60 * 600,
                lineWidth: 0
            }

        }, {
            label: "Payments received",
            data: data2,
            yaxis: 2,
            color: "#1C84C6",
            lines: {
                lineWidth: 1,
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
        }];


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
            }],
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

        var previousPoint = null,
            previousLabel = null;

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
<script src="https://www.bubt.edu.bd/assets/back/backend/DataTables-1.10.13/DataTables-1.10.13/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <script>
        $(document).ready(function () {
        let tabili =  $('#tablo').DataTable({
                order: [
                    [0, 'desc']
                ]
            });
            
        $('#meter_account').on('keyup change', function() {
        tabili
            .search($('#meter_account').val(), false, true)
            .draw();
        });
        $('#district').on('change', function() {
            tabili
                .search($('#district').val(), false, true)
                .draw();
        });
        $('#channel').on('change', function() {
            tabili
                .columns(3)
                .search($('#channel').val(), false, true)
                .draw();
        });
        $('#bank').on('change', function() {
            tabili
                .columns(8)
                .search($('#bank').val(), false, true)
                .draw();
        });
        $('#type').change( function() {
            tabili
                .columns(2)
                .search($('#type').val(), false, true)
                .draw();
        });

        $('.input-daterange input').each(function() {
            $(this).datepicker('clearDates');
        });


        // Extend dataTables search
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#min-date').val();
                var max = $('#max-date').val();
                var createdAt = data[0] || 0; // Our date column in the table
            //createdAt=createdAt.split(" ");
                var startDate   = moment(min, "DD/MM/YYYY");
                var endDate     = moment(max, "DD/MM/YYYY");
                var diffDate = moment(createdAt, "DD/MM/YYYY");

                if ( (min == "" || max == "") || diffDate.isBetween(startDate, endDate, 'days'))
                {  return true;  }
                
                return false;
            }
        );

        // Re-draw the table when the a date range filter changes
        $('.date-range-filter').change(function() {
            tabili.draw();
        });
        });
    </script>
    <script src="{{asset('js/index.js')}}"></script>
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
    @endpush
    @endsection