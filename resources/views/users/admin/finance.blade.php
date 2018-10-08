@extends('layouts.admin') @section('content')

{{-- <div class="row">

    <div class="col-sm-4">
        <h1 class="m-b-xs">
            <span>&#8358;</span>
            {{$data['salesthismonth']}}
        </h1>
        <small>
            Sales in current month
        </small>
        <div id="sparkline1" class="m-b-sm"></div>
        <div class="row">
            <div class="col-xs-4">
                <small class="stats-label">Pages / Visit</small>
                <h4>236,321</h4>
            </div>

            <div class="col-xs-4">
                <small class="stats-label">% New Visits</small>
                <h4>46.11%</h4>
            </div>
            <div class="col-xs-4">
                <small class="stats-label">Last week</small>
                <h4>432</h4>
            </div>
        </div>

    </div>
    <div class="col-sm-4">
        <h1 class="m-b-xs">
            <span>&#8358;</span>
            {{$data['salestoday']}}
        </h1>
        <small>
            Sales in last 24h
        </small>
        <div id="sparkline2" class="m-b-sm"></div>
        <div class="row">
            <div class="col-xs-4">
                <small class="stats-label">Pages / Visit</small>
                <h4>166,781</h4>
            </div>

            <div class="col-xs-4">
                <small class="stats-label">% New Visits</small>
                <h4>22.45%</h4>
            </div>
            <div class="col-xs-4">
                <small class="stats-label">Last week</small>
                <h4>862</h4>
            </div>
        </div>



    </div>
    <div class="col-sm-4">

        <div class="row m-t-xs">
            <div class="col-xs-6">
                <h5 class="m-b-xs">Income last month</h5>
                <h1 class="no-margins">
                    <span>&#8358;</span>{{$data['incomelastmonth']}}</h1>
                <div class="font-bold text-navy">98%
                    <i class="fa fa-bolt"></i>
                </div>
            </div>
            <div class="col-xs-6">
                <h5 class="m-b-xs">Sales current year</h5>
                <h1 class="no-margins">
                    <span>&#8358;</span>{{$data['salescurrentyear']}}</h1>
                <div class="font-bold text-navy">98%
                    <i class="fa fa-bolt"></i>
                </div>
            </div>
        </div>


        <table class="table small m-t-sm">
            <tbody>
                <tr>
                    <td>
                        <strong>{{$data['registeredcustomers']}}</strong> Customers

                    </td>
                    <td>
                        <strong>22</strong> Messages
                    </td>

                </tr>
                <tr>
                    <td>
                        <strong>61</strong> Comments
                    </td>
                    <td>
                        <strong>3</strong> Reported issues
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{$data['registeredagents']}}</strong> Agents
                    </td>
                    <td>
                        <strong>3</strong> Payment Channels
                    </td>
                </tr>
            </tbody>
        </table>



    </div>

</div> --}}

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{-- <span class="label label-primary pull-right">Year</span>
                    <span class="label label-primary pull-right">Month</span> --}}
                    <h5>Income</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦{{ number_format($data['income']) }}</h1>
                    <!--<div class="stat-percent font-bold text-success">98%
                        <i class="fa fa-bolt"></i>
                    </div>-->
                    <small>Total income</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{-- <span class="label label-primary pull-right">Year</span>
                    <span class="label label-primary pull-right">Month</span> --}}
                    <h5>Avg Earning</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦{{number_format($data['avg_earn'])}}</h1>
                    <!--<div class="stat-percent font-bold text-info">20%
                        <i class="fa fa-level-up"></i>
                    </div>-->
                   <small>Average Income for GOENERGEE</small>
                </div>
            </div>
        </div>



        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    
                    Wallet Balance

                    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
                    {{-- <script src="https://js.paystack.co/v1/inline.js"></script> --}}
                    <script src="app.js"></script>

                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">Balance =
                        <span>&#8358;</span> {{ number_format($data['wallet_balance']) }}</h1>
                    
                    
                    <small>Operating Wallet Amount Left  with EKEDC</small>
                       
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-14">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Financial Performance - GOENERGEE Admin Report</h4>
            </div>
            <div class="ibox-content m-b-sm border-bottom">
                {{-- <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="order_id">Transaction Reference</label>
                            <input type="number" id="order_id" name="transaction_ref" value="" placeholder="Transaction Reference" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="status">Energy Usage</label>
                            <input type="text" id="status" name="status" value="" placeholder="Energy Usage" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="customer">Post Paid</label>
                            <input type="number" id="meter#" name="Meter#" value="" placeholder="Post Paid Customers" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="customer">Pre Paid</label>
                            <input type="number" id="meter#" name="Meter#" value="" placeholder="Pre Paid Customers" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="amount">Amount</label>
                            <input type="text" id="amount" name="amount" value="" placeholder="Amount" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="amount">District</label>
                            <input type="text" id="district" name="district" value="" placeholder="District" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-md">Search</button>

            </div> --}}
            <div class="row">
                <div class="col-lg-12">
                        <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                   
                                    <div class="ibox-content">
        
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                        <tr>

                                                                <th>S/N</th>
                                                                <th data-hide="phone"># Customer base</th>
                                                                <th data-hide="phone"># of Agents</th>
                                                                <th data-hide="phone">Average Transaction</th>
                                                                <th data-hide="phone">Average Daily Energy Usage</th>
                                                                <th data-hide="phone"># of Post Paid Users</th>
                                                                <th data-hide="phone"># of Prepaid Users</th>
                                                                <th data-hide="phone">Avg Daily Profit</th>
                                                                <th data-hide="phone">Avg Previous Monthly Sales</th>
                                                                {{-- <th data-hide="phone"># Issues Reported</th>
                                                                <th data-hide="phone">% of Issue Resolved</th> --}}
                        
                        
                                                            </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="gradeX">
                                                            <td>
                                                                    1
                                                                </td>
                                                                <td>
                                                                   {{ $data['customers'] }}
                                                                </td>
                                                                <td>
                                                                    {{ $data['agents']}}
                                                                </td>
                                                                <td>
                                                                    ₦{{ round($data['avg_transaction'],2)}}
                                                                </td>
                                                                <td>
                                                                    140KwH
                                                                </td>
                                                                <td>
                                                                    {{ $data['postpaid_users']}}
                                                                </td>
                        
                                                                <td>
                                                                        {{ $data['prepaid_users']}}
                                                                </td>
                                                                <td>
                                                                    ₦{{ number_format($data['avg_daily_p'])}}
                                                                </td>
                                                                <td>
                                                                    ₦ {{ number_format($data['avgMonthlySales'])}}
                                                                </td>
                                                                {{-- <td>
                                                                    3
                                                                </td>
                                                                <td>
                                                                    98%
                                                                </td> --}}
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
    <div class="footer">

        <div>
            <strong>Copyright</strong> GOENERGEE &copy; 2018
        </div>
    </div>
</div>

</div>
@endsection
@push('scripts')

    <script>
        let token = "{{ csrf_token() }}";
        postData(`http://localhost:8000/login-api`, {
            email:"admin@goenergee.com",
            passowrd: "admin",
            _token: token
        })
        .then(data => console.log(JSON.stringify(data))) // JSON-string from `response.json()` call
        .catch(error => console.error(error));

        function postData(url = ``, data = {}) {
        // Default options are marked with *
            return fetch(url, {
                method: "POST", // *GET, POST, PUT, DELETE, etc.
                mode: "no-cors", // no-cors, cors, *same-origin
                cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                // credentials: "same-origin", // include, same-origin, *omit
                headers: {
                    "Content-Type": "application/json; charset=utf-8",
                    // "Content-Type": "application/x-www-form-urlencoded",
                },
                // redirect: "follow", // manual, *follow, error
                referrer: "no-referrer", // no-referrer, *client
                body: JSON.stringify(data), // body data type must match "Content-Type" header
            })
            .then(response => response.json()); // parses response to JSON
        }
        // $.ajax({
        //     url: "http://localhost:8000/login-api",
        //     method: "POST",
        //     crossDomain: true,
        //     headers: {
        //         'Access-Control-Allow-Origin':'*',
        //         'Content-type'
        //     },
        //     data: {
        //         "email":"admin@goenergee.com",
        //         "passowrd": "admin",
        //         "_token": token
        //     },
        //     success: (data) => {
        //         console.log(data);
        //     },
        //     error: (err) => {
        //         console.log(err);
        //     }
        // });
    
    </script>
    
@endpush