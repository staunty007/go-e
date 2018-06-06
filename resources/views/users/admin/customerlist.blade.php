@extends('layouts.admin') @section('content')

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                   
                    <h5>Customer</h5>
                </div>
                <div class="ibox-content">
                  <h1 class="no-margins">{{ $customers['total'] }}</h1>
                   
                    <small>Total Number of Customers</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                  
                    <h5>Direct Customers</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $customers['direct'] }}</h1>
                    
                    <small>Total Number of Direct Customers</small>
                </div>
            </div>
        </div>



        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                  
                    <h5>Agent Customers</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $customers['agent'] }}</h1>
                    
                    <small>Total Number of Customers via Agent Portal</small>
                </div>
            </div>
        </div>


    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                GOENERGEE Customers
            </div>
            <div class="ibox-content m-b-sm border-bottom">
                </div> 
             <div style="overflow-x:auto;">
                  <div class="ibox-content">
                 <!-- Tab links -->
                <div class="tab">
                  <button class="tablinks" onclick="openCity(event, 'Direct_web')">Direct Web </button>
                  <button class="tablinks" onclick="openCity(event, 'Direct_US')">Direct USSD</button>
                  <button class="tablinks" onclick="openCity(event, 'Direct_mcash')">Direct Mcash</button>
                  
                  <button class="tablinks" onclick="openCity(event, 'Agent_web')">Agent Web</button>
                  <button class="tablinks" onclick="openCity(event, 'Agent_pos')">Agent POS</button>
                  <button class="tablinks" onclick="openCity(event, 'Agent_mcash')">Agent mCash</button>
                  <button class="tablinks" onclick="openCity(event, 'Agent_US')">Agent USSD</button>
                  <button class="tablinks" onclick="openCity(event, 'bank')">Bank Transfer</button>
                  
                 
                 
                </div>

                <!-- Tab content -->
                <div id="Direct_web" class="tabcontent">
                   <div class="form-group pull-right">
        <input type="text" class="search form-control" placeholder="What you looking for?">
    </div>
                  <span class="counter pull-right"></span><table class="sortable">
<table class="table table-hover table-bordered results" id="example">
    

  <thead>
    <tr>
      <th>#</th>
      <th class="col-md-2 col-xs-2">Meter or Account Number</th>
      
      <th class="col-md-2 col-xs-2">Full Name</th>
      <th class="col-md-2 col-xs-1">Telephone</th>
      <th class="col-md-2 col-xs-2">Email</th>
      <th class="col-md-2 col-xs-2">Address</th>
      <th class="col-md-2 col-xs-2">Top Up</th>
    </tr>
    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($directCollection as $direct)
      <tr>
        <th scope="row">{{ $direct->id }}</th>
        <td>{{ $direct->meter_no }}</td>
        <td>{{ $direct->first_name ." ". $direct->last_name }}</td>
        <td>{{ $direct->phone_number }}</td>
        <td>{{ $direct->email}}</td>
        <td>{{ 'Not Included' }}</td>
        <td>{{ $direct->transaction->total_amount }}</td>
      </tr>
    @endforeach
    
    
  </tbody>
</table>
                </div>

                
                
            <!-- Tab content -->
      <div id="Direct_US" class="tabcontent">
        <div class="form-group pull-right">
           <input type="text" class="search form-control" placeholder="What you looking for?">
        </div>
             <span class="counter pull-right">
                 
             </span>
             <table class="sortable">
                <table class="table table-hover table-bordered results" id="example">
                    

                  <thead>
                    <tr>
                      <th>#</th>
                      <th class="col-md-2 col-xs-2">Meter or Account Number</th>
                      
                      <th class="col-md-2 col-xs-2">Full Name</th>
                      <th class="col-md-2 col-xs-1">Telephone</th>
                      <th class="col-md-2 col-xs-2">Email</th>
                      <th class="col-md-2 col-xs-2">Address</th>
                      <th class="col-md-2 col-xs-2">Top Up</th>
                    </tr>
                    <tr class="warning no-result">
                      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      
                     
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  
                    
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      
                      
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                   
                     
                    </tr>
                  </tbody>
                </table>
        </div>
       <!-- Tab content -->
       <div id="Direct_mcash" class="tabcontent">
         <div class="form-group pull-right">
            <input type="text" class="search form-control" placeholder="What you looking for?">
        </div>
                      <span class="counter pull-right"></span><table class="sortable">
    <table class="table table-hover table-bordered results" id="example">
        

      <thead>
        <tr>
          <th>#</th>
          <th class="col-md-2 col-xs-2">Meter or Account Number</th>
          
          <th class="col-md-2 col-xs-2">Full Name</th>
          <th class="col-md-2 col-xs-1">Telephone</th>
          <th class="col-md-2 col-xs-2">Email</th>
          <th class="col-md-2 col-xs-2">Address</th>
          <th class="col-md-2 col-xs-2">Top Up</th>
        </tr>
        <tr class="warning no-result">
          <td colspan="4"><i class="fa fa-warning"></i> No result</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          
         
        </tr>
        <tr>
          <th scope="row">2</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
      
        
        </tr>
        <tr>
          <th scope="row">3</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          
          
        </tr>
        <tr>
          <th scope="row">4</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
       
         
        </tr>
      </tbody>
    </table>
                    </div>

                        <!-- Tab content -->
                        <div id="Agent_web" class="tabcontent">
                           <div class="form-group pull-right">
                <input type="text" class="search form-control" placeholder="What you looking for?">
            </div>
                          <span class="counter pull-right"></span><table class="sortable">
        <table class="table table-hover table-bordered results" id="example">
            

          <thead>
            <tr>
              <th>#</th>
              <th class="col-md-2 col-xs-2">Meter or Account Number</th>
              <th class="col-md-2 col-xs-2">Full Name</th>
              <th class="col-md-2 col-xs-1">Telephone</th>
              <th class="col-md-2 col-xs-2">Email</th>
              <th class="col-md-2 col-xs-2">Address</th>
              <th class="col-md-2 col-xs-2">Top Up</th>
            </tr>
            <tr class="warning no-result">
              <td colspan="4"><i class="fa fa-warning"></i> No result</td>
            </tr>
          </thead>
          <tbody>
            @foreach ($agentCollection as $agent)
              <tr>
                <th scope="row">{{ $agent->id }}</th>
                <td>{{ $agent->meter_no }}</td>
                <td>{{ $agent->first_name ." ". $agent->last_name }}</td>
                <td>{{ $agent->phone_number }}</td>
                <td>{{ $agent->email }}</td>
                <td>{{ 'Not Included' }}</td>
                <td>{{ $agent->agent_transaction->total_amount }}</td>
                
              </tr>
            @endforeach
            
            
          </tbody>
        </table>
                        </div>
                        <!-- Tab content -->
                        <div id="Agent_pos" class="tabcontent">
                           <div class="form-group pull-right">
                <input type="text" class="search form-control" placeholder="What you looking for?">
            </div>
                          <span class="counter pull-right"></span><table class="sortable">
        <table class="table table-hover table-bordered results" id="example">
            

          <thead>
            <tr>
              <th>#</th>
              <th class="col-md-2 col-xs-2">Meter or Account Number</th>
              
              <th class="col-md-2 col-xs-2">Full Name</th>
              <th class="col-md-2 col-xs-1">Telephone</th>
              <th class="col-md-2 col-xs-2">Email</th>
              <th class="col-md-2 col-xs-2">Address</th>
              <th class="col-md-2 col-xs-2">Top Up</th>
            </tr>
            <tr class="warning no-result">
              <td colspan="4"><i class="fa fa-warning"></i> No result</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              
             
            </tr>
            <tr>
              <th scope="row">2</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
          
            
            </tr>
            <tr>
              <th scope="row">3</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              
              
            </tr>
            <tr>
              <th scope="row">4</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
           
             
            </tr>
          </tbody>
        </table>
                        </div>
                    <!-- Tab content -->
                    <div id="Agent_mcash" class="tabcontent">
                       <div class="form-group pull-right">
            <input type="text" class="search form-control" placeholder="What you looking for?">
        </div>
                      <span class="counter pull-right"></span><table class="sortable">
    <table class="table table-hover table-bordered results" id="example">
        

      <thead>
        <tr>
          <th>#</th>
          <th class="col-md-2 col-xs-2">Meter or Account Number</th>
          
          <th class="col-md-2 col-xs-2">Full Name</th>
          <th class="col-md-2 col-xs-1">Telephone</th>
          <th class="col-md-2 col-xs-2">Email</th>
          <th class="col-md-2 col-xs-2">Address</th>
          <th class="col-md-2 col-xs-2">Top Up</th>
        </tr>
        <tr class="warning no-result">
          <td colspan="4"><i class="fa fa-warning"></i> No result</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          
         
        </tr>
        <tr>
          <th scope="row">2</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
      
        
        </tr>
        <tr>
          <th scope="row">3</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          
          
        </tr>
        <tr>
          <th scope="row">4</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
       
         
        </tr>
      </tbody>
    </table>
                    </div>
                    <!-- Tab content -->
                    <div id="Agent_US" class="tabcontent">
                       <div class="form-group pull-right">
            <input type="text" class="search form-control" placeholder="What you looking for?">
        </div>
                      <span class="counter pull-right"></span><table class="sortable">
    <table class="table table-hover table-bordered results" id="example">
        

      <thead>
        <tr>
          <th>#</th>
          <th class="col-md-2 col-xs-2">Meter or Account Number</th>
          
          <th class="col-md-2 col-xs-2">Full Name</th>
          <th class="col-md-2 col-xs-1">Telephone</th>
          <th class="col-md-2 col-xs-2">Email</th>
          <th class="col-md-2 col-xs-2">Address</th>
          <th class="col-md-2 col-xs-2">Top Up</th>
        </tr>
        <tr class="warning no-result">
          <td colspan="4"><i class="fa fa-warning"></i> No result</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          
         
        </tr>
        <tr>
          <th scope="row">2</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
      
        
        </tr>
        <tr>
          <th scope="row">3</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          
          
        </tr>
        <tr>
          <th scope="row">4</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
       
         
        </tr>
      </tbody>
    </table>
                    </div>
               
                                    <!-- Tab content -->
                                    <div id="bank" class="tabcontent">
                                       <div class="form-group pull-right">
                            <input type="text" class="search form-control" placeholder="What you looking for?">
                        </div>
                                      <span class="counter pull-right"></span><table class="sortable">
                    <table class="table table-hover table-bordered results" id="example">
                        

                      <thead>
                        <tr>
                          <th>#</th>
                          <th class="col-md-2 col-xs-2">Meter or Account Number</th>
                          
                          <th class="col-md-2 col-xs-2">Full Name</th>
                          <th class="col-md-2 col-xs-1">Telephone</th>
                          <th class="col-md-2 col-xs-2">Email</th>
                          <th class="col-md-2 col-xs-2">Address</th>
                          <th class="col-md-2 col-xs-2">Top Up</th>
                        </tr>
                        <tr class="warning no-result">
                          <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          
                         
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      
                        
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          
                          
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                       
                         
                        </tr>
                      </tbody>
                    </table>
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
                    label: "Unit of Electricity Consumed",
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
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    @endpush



@endsection