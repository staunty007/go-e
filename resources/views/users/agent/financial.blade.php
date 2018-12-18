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
                    <h2 class="font-bold">{{ number_format($details->wallet_balance)}}</h2>
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
                    <h2 class="font-bold">{{ $totalTransaction }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

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
</div>

    <!-- ChartJS-->

@endsection
@push('scripts')
<script>
    let agentDetails = `{!!json_encode(session('agentDetails')) !!}`;
    localStorage.setItem('ga_d', JSON.stringify(agentDetails));
</script>

<!-- ChartJS-->
<script>
    // Bar chart
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: ["Electricity", "TV Subscription", "Internet/Data", "LCC", "Water Bills"],
            datasets: [{
                label: "Sales (Thousands)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                data: [2478, 5267, 734, 784, 433]
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Business Performance across all service Offerings'
            }
        }
    });
</script>
@endpush