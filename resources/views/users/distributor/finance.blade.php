@extends('layouts.distributor') @section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">
<div class="wrapper wrapper-content">
    <div class="row">
        {{-- <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>Sales Made by GOENERGEE</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦400,888,200</h1>

                    <small>YTD Credit to EKEDC</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>Avg Daily Transaction</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦2,530,000</h1>

                    <small>Average Daily Transaction for GOENERGEE</small>
                </div>
            </div>
        </div>
        --}}
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>Remaining Wallet Balance</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦{{ number_format($balance) }}</h1>

                    {{-- <small>5 days before next Top Up</small> --}}
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Financial Performance for GOENERGEE
                    </div>
                    <div class="ibox-content m-b-sm border-bottom">
                        {{-- <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="order_id">Transaction ID</label>
                                    <input type="number" id="transaction_id" name="transaction_id" value="" placeholder="Transaction ID"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="status">Energy Usage</label>
                                    <input type="text" id="status" name="status" value="" placeholder="Energy Usage"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="customer">Post Paid</label>
                                    <input type="number" id="meter#" name="Meter#" value="" placeholder="Post Paid Customers"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="customer">Pre Paid</label>
                                    <input type="number" id="meter#" name="Meter#" value="" placeholder="Pre Paid Customers"
                                        class="form-control">
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
                                    <input type="text" id="district" name="district" value="" placeholder="District"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-md">Search</button> --}}
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">

                                <div class="ibox" style="overflow-x:auto;">
                                    <div class="ibox-content">
                                        <table id="myTable" class="table table-striped table-responsive toggle-arrow-tiny"
                                            data-page-size="">
                                            <thead>

                                                <tr>


                                                    <th>Time</th>
                                                    <th>Ref</th>
                                                    <th>Channel</th>
                                                    <th>Type</th>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Meter #</th>
                                                    <th>District</th>
                                                    <th>Amount</th>
                                                    <th>TOKEN</th>
                                                    <th>KwH</th>
                                                    <th>Conv. Fee</th>
                                                    <th>Commission</th>
                                                    <th>Total</th>



                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($finances as $d)
                                                <tr>
                                                    <td>{{ date('d/m/y', strtotime($d->created_at) ) }}</td>
                                                    <td>{{ $d->transaction_ref }}</td>
                                                    <td>Web</td>
                                                    <td>
                                                        @if($d->user_type == 1)
                                                        {{ 'Prepaid' }}
                                                        @else
                                                        {{ 'Postpaid'}}
                                                        @endif
                                                    </td>
                                                    <td>{{ $d->first_name." ". $d->last_name }}</td>

                                                    <td>
                                                        <span class="label label-primary">Successful</span>
                                                    </td>

                                                    <td>
                                                        {{ $d->meter_no }}
                                                    </td>
                                                    <td>
                                                        Lekki
                                                    </td>
                                                    <td>

                                                        ₦{{ number_format($d->transaction->total_amount)}}

                                                    </td>
                                                    <td>
                                                        {{ $d->recharge_pin }}
                                                    </td>
                                                    <td>
                                                        {{ round($d->transaction->total_amount / 12.85,2)}}
                                                    </td>
                                                    <td>
                                                        ₦100
                                                    </td>
                                                    <td>
                                                        ₦{{ (2/100) * $d->transaction->initial_amount }}
                                                    </td>
                                                    <td>
                                                        ₦{{ number_format($d->transaction->total_amount)}}
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