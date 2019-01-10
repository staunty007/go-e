@extends('layouts.admin') @section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">

<div class="row">
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                {{-- <span class="label label-info pull-right">Annual</span> --}}
                <h5>Total Customers</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $customers }}</h1>
                {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                <small>Customers</small> --}}
            </div>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                {{-- <span class="label label-primary pull-right">Today</span> --}}
                <h5>Prepaid Payments</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $prepaids }}</h1>
                {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                <small>New visits</small> --}}
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">


                <h5>Postpaid Payments</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $postpaids }}</h1>
                {{-- <div class="stat-percent font-bold text-success">5%<i class="fa fa-level-down"></i></div>
                <small># of daily Customer sign Up</small> --}}
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
                {{-- <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="order_id">Transaction ID</label>
                            <input type="number" id="order_id" name="order_id" value="" placeholder="Transaction ID"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="status">Transaction status</label>
                            <input type="text" id="status" name="status" value="" placeholder="Status" class="form-control">
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
                            <label class="control-label" for="customer">Meter #</label>
                            <input type="number" id="meter#" name="Meter#" value="" placeholder="Meter Number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Date From</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                    type="text" class="form-control" value="03/04/2018">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_modified">Date To</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_modified"
                                    type="text" class="form-control" value="03/06/2018">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="amount">Amount</label>
                            <input type="text" id="amount" name="amount" value="" placeholder="Amount" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="amount">District</label>
                            <input type="text" id="district" name="district" value="" placeholder="District" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-md">Search</button>

            </div> --}}

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
@endpush
@endsection