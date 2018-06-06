@extends('layouts.distributor') @section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">
<div class="row">

    <div class="col-lg-14">
        <div class="col-lg-14">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Meter Administration - GOENERGEE
                </div>
                <div class="ibox-content m-b-sm border-bottom">
                    {{-- <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label" for="order_id">Request ID</label>
                                <input type="number" id="request_id" name="request_id" value="" placeholder="request ID" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label" for="status">Order status</label>
                                <select name="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="">Installation Date</option>
                                    <option value="">Not Available</option>
                                    <option value="">Installed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label" for="customer">Customer Name</label>
                                <input type="text" id="customer" name="customer" value="" placeholder="Customer Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label" for="customer">Meter Number</label>
                                <input type="number" id="meter#" name="Meter#" value="" placeholder="Meter Number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label" for="date_added">Preferred date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input id="date_added" type="text" class="form-control" value="03/04/2018">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label" for="date_modified">Date To</label>
                                <div class="input-group date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input id="date_modified" type="text" class="form-control" value="03/06/2018">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label" for="amount"># of Meters </label>
                                <input type="text" id="amount" name="amount" value="" placeholder="Enter Amount" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label" for="amount">District</label>
                                <input type="text" id="district" name="district" value="" placeholder="Enter District" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-md">Search</button> --}}


                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-content" style="overflow-x:auto">

                                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="4" id="myTable">
                                    <thead>
                                        <tr>

                                            <th>Request ID</th>
                                            <th data-hide="phone">Name</th>
                                            <th data-hide="phone">Address</th>
                                            <th data-hide="phone">Tel</th>
                                            <th data-hide="phone">Email</th>
                                            <th data-hide="phone">Status</th>
                                            <th data-hide="phone">Change Status</th>
                                            <th data-hide="phone"># of Meters</th>
                                            <th data-hide="phone">District</th>
                                            <th data-hide="phone">Meter Type</th>
                                            <th data-hide="phone">House Type</th>
                                            <th data-hide="phone">Date Requested</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <h3>
                                            <u>Meter Request Data</u>
                                        </h3>
                                        @foreach ($requests as $req)
                                        <tr>
                                            <td>
                                                {{ $req->id }}
                                            </td>
                                            <td>
                                                {{ $req->first_name ." ". $req->last_name }}
                                            </td>
                                            
                                            <td>
                                                {{ $req->home_address}}
                                            </td>
                                            <td>
                                                {{ $req->phone_number}}
                                            </td>
                                            <td>
                                                {{ $req->email_address}}
                                            </td>
                                            <td>
                                                @switch($req->status)
                                                    @case(1)
                                                        <span class="label label-info">Processing</span>
                                                        @break
                                                    @case(2)
                                                    <span class="label label-danger">Not Available</span>
                                                        @break
                                                    @case(3)
                                                    <span class="label label-success">Delivered</span>
                                                        @break
                                                    @default
                                                    <span class="label label-warning">Pending</span>
                                                @endswitch
                                                
                                            </td>

                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('meter.change',$req->id) }}" class="btn btn-sm btn-danger">Change status</a>
                                                </div>
                                            </td>
                                            <td>
                                                2
                                            </td>
                                            <td>
                                                {{ $req->district }}
                                            </td>
                                            <td>
                                                {{ $req->meter_type}}
                                            </td>
                                            <td>
                                                {{ $req->house_type}}
                                            </td>
                                            <td> {{ date('d/m/Y', strtotime($req->created_at ))}}
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
</div>


@push('scripts')
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
            label: "Unit of Electricity Consumped",
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
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>


<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endpush @endsection