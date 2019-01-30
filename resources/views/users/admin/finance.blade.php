@extends('layouts.admin') @section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">




<!-- <div class="container">
        <div class="stat stat--bg-blue stat--has-icon-right">
            <div class="stat__icon-wrapper">
                <i data-feather="server" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header stat--color-white">3,700</p>
                <p class="stat__subheader stat--color-white">Servers Started</p>
            </div>
        </div>
        <div class="stat stat--bg-green">
            <div class="stat__icon-wrapper">
                <i data-feather="search" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header">7.85 M</p>
                <p class="stat__subheader">Searches</p>
            </div>
        </div>
        <div class="stat stat--bg-yellow stat--has-icon-right">
            <div class="stat__icon-wrapper">
                <i data-feather="file-plus" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header">38</p>
                <p class="stat__subheader">Files Made</p>
            </div>
        </div>
        <div class="stat stat--bg-orange">
            <div class="stat__icon-wrapper">
                <i data-feather="eye" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data stat--has-text-right">
                <p class="stat__header stat--color-white">4,058,201</p>
                <p class="stat__subheader stat--color-white">Page Views</p>
            </div>
        </div>
    </div> -->
<div class="row">
    <div class="col-lg-4">

        <div class="stat">

            <div class="stat__icon-wrapper stat--bg-green">
                <i data-feather="shopping-cart" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Total Income</h1>
                <p class="stat__subheader"> <span>&#8358;</span>{{ number_format($data['income']) }}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="stat stat--has-icon-right">
            <div class="stat__icon-wrapper stat--bg-blue">
                <i data-feather="users" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Avg Earning</h1>
                <p class="stat__subheader">{{number_format($data['avg_earn'])}}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="stat stat--has-icon-right">
            <div class="stat__icon-wrapper stat--bg-dark-red">
                <i data-feather="credit-card" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header"> Wallet Balance</h1>
                <p class="stat__subheader"> <span>&#8358;</span>{{ number_format($data['wallet_balance']) }}</p>
            </div>
        </div>
    </div>
</div>
<!-- <div class="col-lg-4">
        <div class="stat__icon-wrapper stat--bg-red">
            <i data-feather="headphones" class="stat__icon"></i>
        </div>
        <div class="stat__data stat--has-text-right">
            <h1 class="stat__header">8.21 B</h1>
            <p class="stat__subheader">Songs Played</p>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="stat stat--has-icon-right">
            <div class="stat__icon-wrapper stat--bg-yellow">
                <i data-feather="image" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">458</h1>
                <p class="stat__subheader">Images Viewed</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="stat stat--has-icon-right">
            <div class="stat__icon-wrapper">
                <i data-feather="message-square" class="stat__icon stat--color-blue"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header stat--color-blue">230</h1>
                <p class="stat__subheader">Messages Sent</p>
            </div>
        </div>
        <div class="stat">
            <div class="stat__icon-wrapper">
                <i data-feather="pie-chart" class="stat__icon stat--color-red"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">38 M</h1>
                <p class="stat__subheader">Pies Charted</p>
            </div>
        </div>
        <div class="stat stat--has-icon-right">
            <div class="stat__icon-wrapper">
                <i data-feather="moon" class="stat__icon stat--color-green"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">85.28%</h1>
                <p class="stat__subheader">Moons Witnessed</p>
            </div>
        </div>
        <div class="stat">
            <div class="stat__icon-wrapper">
                <i data-feather="package" class="stat__icon stat--color-orange"></i>
            </div>
            <div class="stat__data stat--has-text-right">
                <h1 class="stat__header stat--color-orange">Packages Received</h1>
                <p class="stat__subheader"><strong>32</strong> (7 Day Average)</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="stat stat--bg-yellow">
            <div class="stat__icon-wrapper stat--bg-dark-yellow">
                <i data-feather="printer" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header">4,800</p>
                <p class="stat__subheader">Pages Printed</p>
            </div>
        </div>
        <div class="stat stat--bg-red stat--has-icon-right">
            <div class="stat__icon-wrapper stat--bg-dark-red">
                <i data-feather="shopping-bag" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header stat--color-white">487</p>
                <p class="stat__subheader stat--color-white">Products Purchased</p>
            </div>
        </div>
        <div class="stat stat--bg-blue">
            <div class="stat__icon-wrapper stat--bg-dark-blue">
                <i data-feather="star" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header stat--color-white">81 M</p>
                <p class="stat__subheader stat--color-white">Fallen Stars</p>
            </div>
        </div>
        <div class="stat stat--bg-green stat--has-icon-right">
            <div class="stat__icon-wrapper stat--bg-dark-green">
                <i data-feather="thumbs-up" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header">2,001</p>
                <p class="stat__subheader">Likes Received</p>
            </div>
        </div> -->

<!-- <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{-- <span class="label label-primary pull-right">Year</span>
                    <span class="label label-primary pull-right">Month</span> --}}
                    <h5>Income</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦</h1> -->
<!--<div class="stat-percent font-bold text-success">98%
                        <i class="fa fa-bolt"></i>
                    </div>-->
<!-- <small>Total income</small>
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
                    <h1 class="no-margins">₦</h1> -->
<!--<div class="stat-percent font-bold text-info">20%
                        <i class="fa fa-level-up"></i>
                    </div>-->
<!-- <small>Average Income for GOENERGEE</small>
                </div>
            </div>
        </div>



        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    Wallet Balance

                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">
                        <span>&#8358;</span> </h1>


                    <small>Operating Wallet Amount Left with EKEDC</small>

                </div>
            </div>
        </div> -->


    
        <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h4>POSTPAID VS PREPAID</h4>
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
        <!-- <div class="ibox-content m-b-sm border-bottom">
            <div class="row">
                <div class="col-md-4">
                    <h4>Filter By Date</h4>
                    <div class="input-group input-daterange">

                        <input type="text" id="min-date" class="form-control date-range-filter" data-date-format="dd/mm/yy"
                            placeholder="From:">

                        <div class="input-group-addon">to</div>
                        <input type="text" id="max-date" class="form-control date-range-filter" data-date-format="dd/mm/yy"
                            placeholder="To:">
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
                            <option value="Apapa">Apapa</option>
                            <option value="Festac">Festac</option>
                            <option value="Ibeju">Ibeju</option>
                            <option value="Ijora">Ijora</option>
                            <option value="Island">Island</option>
                            <option value="Lekki">Lekki</option>
                            <option value="Mushin">Mushin</option>
                            <option value="Ojo">Ojo</option>
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
                            <option value="Mobile">USSd</option>
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
            </div>
           

            <div class="ibox">

                <div class="ibox" style="overflow-x:auto;">
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Ref</th>
                                        <th>Channel</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>District</th>
                                        <th>Bank</th>
                                        <th>Status</th>
                                        <th>Meter #</th>
                                        <th>Standard Token</th>
                                        <th>BSST Token</th>
                                        <th>KwH</th>
                                        <th>Amount Paid</th>
                                        <th>Commission</th>
                                        <th>Net Total</th>
                                        <th>Wallet Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($finances as $d)
                                    <tr>
                                        <td>{{ date('d/m/y H:i:s A', strtotime($d->created_at) ) }}</td>
                                        <td>{{ $d->payment_ref }}</td>
                                        <td>{{ $d->is_agent == 1 ? 'Agent-'.$d->transaction_type : $d->transaction_type
                                            }}</td>
                                        <td>{{ $d->transaction_type }}</td>
                                        <td>{{ $d->first_name." ". $d->last_name }}</td>
                                        {{--<td>{{ $d->is_agent == 1 ? 'Agent-'.$d->transaction_type :
                                            $d->transaction_type }}</td>--}}
                                        {{--<td>{{ str_replace('OFFLINE_','',$d->user_type)}} </td>--}}
                                        <td>{{ $d->customer_address }}</td>
                                        <td>{{ $d->district }}</td>
                                        <td>
                                            @if( $d->bank === NULL)
                                            BANK
                                            @else
                                            {{ $d->bank }}
                                            @endif
                                        </td>
                                        <td>
                                            <span class="label label-primary">Successful</span>
                                        </td>
                                        <td>
                                            {{ $d->meter_no }}
                                        </td>
                                        <td>
                                            {{ $d->token_data }}
                                        </td>
                                        <td> {{ $d->bonus_token }}</td>
                                        <td>
                                            {{ round($d->value_of_kwh,2)}}
                                        </td>
                                        <td>
                                            {{
                                            $d->transaction ? number_format($d->transaction->initial_amount) :
                                            number_format($d->agent_transaction->initial_amount) }}
                                        </td>
                                        <td>
                                            {{
                                            $d->transaction ? number_format((0.2 * $d->transaction->initial_amount)) :
                                            number_format((0.2 * $d->agent_transaction->initial_amount))
                                            }}
                                        </td>
                                        <td>
                                            {{
                                            $d->transaction ? number_format($d->transaction->net_amount) :
                                            number_format($d->agent_transaction->net_amount)
                                            }}
                                        </td>
                                        <td>
                                            {{ number_format($d->transaction ? $d->transaction->wallet_bal :
                                            $d->agent_transaction->wallet_bal )}}
                                        </td>

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


            </div> -->
        </div>

    </div>
</div>
                                         

@push("scripts")





<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.19/sorting/date-dd-MMM-yyyy.js"></script>

<script>
    $(document).ready(function () {
        $('#table').DataTable({
            order: [
                [0, 'desc']
            ]
        });
    });
</script>
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
@endpush
@endsection