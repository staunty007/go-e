@extends('layouts.agent') @section('content')

<div class="row">

    <div class="col-lg-3">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-wallet fa-5x" style="color: white;">&#8358;</i>

                </div>
                <div class="col-xs-8 text-right">
                    <span>Wallet Deposit </span>
                    <h2 class="font-bold">{{ $details->wallet_balance}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-battery-half fa-5x" style="color: white;"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Points Earned </span>
                    <h2 class="font-bold">0</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 yellow-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-key fa-5x" style="color: white;"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Total Profit </span>
                    <h2 class="font-bold">{{ $profit }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 blue-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-signal fa-5x" style="color: white;"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Total Transaction</span>
                    <h2 class="font-bold">0</h2>
                </div>
            </div>
        </div>
    </div>
</div>


    {{-- <div class="p-w-md m-t-sm">
        <div class="row">

            <div class="col-sm-4">
                <h1 class="m-b-xs"><span>&#8358;</span>
                    26,900
                </h1>
                <small>
                    Sales in current month
                </small>
                <div id="sparkline1" class="m-b-sm"></div>
                <div class="row">
                    <div class="col-xs-4">
                        <small class="stats-label">Pages / Visit</small>
                        <h4>236 321</h4>
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
                <h1 class="m-b-xs"><span>&#8358;</span>
                    98,100
                </h1>
                <small>
                    Sales in last 24h
                </small>
                <div id="sparkline2" class="m-b-sm"></div>
                <div class="row">
                    <div class="col-xs-4">
                        <small class="stats-label">Pages / Visit</small>
                        <h4>166 781</h4>
                    </div>

                    <div class="col-xs-4">
                        <small class="stats-label">% New Visits</small>
                        <h4>22.45%</h4>
                    </div>
                    <div class="col-xs-4">
                        <small class="stats-label">Last week</small>
                        <h4>86</h4>
                    </div>
                </div>


            </div>
            <div class="col-sm-4">

                <div class="row m-t-xs">
                    <div class="col-xs-6">
                        <h5 class="m-b-xs">Income last month</h5>
                        <h1 class="no-margins"><span>&#8358;</span>160,000</h1>
                        <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                    </div>
                    <div class="col-xs-6">
                        <h5 class="m-b-xs">Sales current year</h5>
                        <h1 class="no-margins"><span>&#8358;</span>42,120</h1>
                        <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                    </div>
                </div>


                <table class="table small m-t-sm">
                    <tbody>
                        <tr>
                            <td>
                                <strong>230</strong> Customers

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
                                <strong>12</strong> Agents
                            </td>
                            <td>
                                <strong>3</strong> Payment Channels
                            </td>
                        </tr>
                    </tbody>
                </table>



            </div>

            --}}


            {{-- <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="widget yellow-bg p-lg text-center">
                            <div class="m-b-md">
                                <i class="fa fa-thumbs-up fa-4x"></i>
                                <h1 class="m-xs">Wallet Deposit</h1>
                                <h3 class="font-bold no-margins">
                                    Current Balance is
                                </h3>
                                <span>&#8358;</span>{{ $details->wallet_balance}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="widget lazur-bg p-lg text-Center">
                            <div class="m-b-md">
                                <!--<i class="fa fa-thumbs-up fa-4x"></i>-->
                                <h1 class="m-xs">AGENT INFO</h1>
                                <ul class="list-unstyled m-t-md">
                                    <li>
                                        <span class="fa fa-envelope m-r-xs text-left"></span>
                                        <label>Agent ID</label>
                                        {{ $details->agent_id}}
                                    </li>
                                    <li>
                                        <span class="fa fa-home m-r-xs"></span>
                                        <label>Star:</label>
                                        2 Star
                                    </li>
                                    <li>
                                        <span class="fa fa-phone m-r-xs"></span>
                                        <label>Points Earned:</label>
                                        500
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="widget navy-bg p-lg text-center">
                            <div class="m-b-md">
                                <h1><span>&#8358;</span></h1>
                                <h1 class="m-xs">Profit Realised </h1>
                                <h3 class="font-bold no-margins">
                                    From Inception to date
                                </h3><span>&#8358;</span>
                                {{ $profit }}
                            </div>
                        </div>

                    </div>
                    --}}


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                            
                                <div class="ibox-content">
                                    <div>
                                        <canvas id="bar-chart" width="100" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                        {{-- {{ $details->all()}} --}}
                        <!-- ChartJS-->

                        @endsection
                        @push('scripts')
                        <script>
                            let agentDetails = {!!json_encode(session('agentDetails')) !!
                            };
                            localStorage.setItem('ga_d', JSON.stringify(agentDetails));
                        </script>

                        <!-- ChartJS-->
               

                      <script>
                      // Bar chart
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Electricity", "TV Subscription", "Internet/Data", "LCC", "Water Bills"],
      datasets: [
        {
          label: "Sales (Thousands)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Business Performance across all service Offerings'
      }
    }
});
                      </script>
                        @endpush