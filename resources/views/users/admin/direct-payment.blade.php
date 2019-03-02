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
                    <small>Registered<span class="pull-right">Unregistered</span></small>
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
                <small>Registered<span class="pull-right">Unregistered</span></small>
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
                <small>Registered<span class="pull-right">Unregistered</span></small>
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
                    <span>&#8358;</span>42343
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
                </div> 
                <!-- Row ends -->
            
            
               

            <div class="ibox" style="overflow-x:auto;">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th data-hide="phone">Trans Date</th>
                                    <th data-hide="phone">Trans Ref</th>
                                    <th data-hide="phone">Customer Name</th>
                                    <th data-hide="phone">Trans type</th>
                                    <th data-hide="phone">Status</th>
                                    <th data-hide="phone">Meter Type</th>
                                    <th data-hide="phone">District</th>

                                    <th data-hide="phone">Meter #</th>
                                    <th data-hide="phone">Value Purchased</th>
                                    <th data-hide="phone">Token</th>
                                    <th data-hide="phone">Bonus Token</th>
                                    <th data-hide="phone">KwH</th>
                                    <th data-hide="phone">Conv. Fee</th>
                                    <th data-hide="phone">Commission</th>
                                    <th data-hide="phone">Amount Chrgd</th>

                                    <th data-hide="phone">PGP</th>
                                    {{-- <th data-hide="phone">Agent #</th> --}}
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
                                    <td>{{ date('d/m/Y h:i:s A', strtotime($p->created_at)) }}</td>
                                    <td>{{ $p->transaction_ref }}</td>
                                    <td>{{ $p->first_name }} {{ $p->last_name }}</td>
                                    <td>{{ $p->transaction_type }}</td>
                                    <td>
                                        <span class="label label-primary">Successful</span>
                                    </td>
                                    <td>
                                        {{ str_replace('OFFLINE_','',$p->user_type)}}
                                    </td>

                                    <td>{{ $p->district }}</td>
                                    <td>{{ $p->meter_no }}</td>
                                    <td>₦{{$p->transaction->initial_amount }}</td>

                                    <td>
                                        {{ $p->token_data }}
                                    </td>
                                    <td> {{ $p->bonus_token }}</td>
                                    <td>{{ round($p->value_of_kwh,1) }}</td>
                                    <td>₦{{ $p->transaction->conv_fee }}</td>
                                    <td>₦{{ $p->transaction->commission }}</td>
                                    <td>₦{{ $p->transaction->total_amount }}</td>

                                    <td>₦{{ $p->transaction->pgp }}</td>
                                    <td>₦{{ $p->transaction->spec }}</td>
                                    <td>₦{{ $p->transaction->ralmuof }}</td>
                                    <td>₦{{ $p->transaction->total_split }}</td>
                                    <td>₦{{ $p->transaction->net_amount }}</td>
                                    <td>₦{{ $p->transaction->wallet_bal }}</td>
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

<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
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