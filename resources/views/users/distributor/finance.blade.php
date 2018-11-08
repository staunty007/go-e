@extends('layouts.distributor') @section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>Transaction to EKEDC</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦400,888,200</h1>

                    <small>Total Monies Paid to EKEDC</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>GOENERGEE Growth rate</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">15%</h1>

                    <small>Average Monthly Growth Rate</small>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>Wallet Balance</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦{{ number_format($balance) }}</h1>
                    <small>remaining Wallet Trading Deposit</small>
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
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">

                                <div class="ibox" style="overflow-x:auto;">
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example">
            
                                            <thead>

                                                <tr>


                                                    <th>Time</th>
                                                    <th>Ref</th>
                                                    <th>Channel</th>
                                                    <th>Type</th>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Meter #</th>
                                                    <th>TOKEN</th>
                                                    <th>KwH</th>
                                                    <th>Amount Paid</th>
                                                    <th>Conv. Fee</th>
                                                    <th>Total</th>
                                                    <th>Commission</th>
                                                    <th>Wallet Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($finances as $d)
                                                <tr>
                                                    <td>{{ date('d/m/y h:i:s', strtotime($d->created_at) ) }}</td>
                                                    <td>{{ $d->payment_ref }}</td>
                                                    <td>Web</td>
                                                    <td>
                                                        {{ str_replace('OFFLINE_','',$d->user_type)}}
                                                    </td>
                                                    <td>{{ $d->first_name." ". $d->last_name }}</td>
                                                    <td>
                                                        <span class="label label-primary">Successful</span>
                                                    </td>
                                                    <td>
                                                        {{ $d->meter_no }}
                                                    </td>
                                                    <td>
                                                        {{ $d->token_data }} {{ ', '.$d->bsst_token  }}
                                                    </td>
                                                    <td>
                                                        {{ round($d->value_of_kwh,2)}}
                                                    </td>
                                                    <td>
                                                        ₦{{ number_format($d->transaction->initial_amount)}}
                                                    </td>
                                                    <td>
                                                        ₦{{ $d->transaction->conv_fee }}
                                                    </td>
                                                    <td>
                                                        ₦{{ number_format($d->transaction->total_amount)}}
                                                    </td>
                                                    <td>
                                                        ₦{{ number_format($d->transaction->commission)}}
                                                    </td>
                                                    <td>

                                                        ₦{{ number_format($d->transaction->wallet_bal)}}

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