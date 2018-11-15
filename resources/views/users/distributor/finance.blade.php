@extends('layouts.distributor') @section('content')
<link rel="stylesheet" href="/css/classic.css">
<link rel="stylesheet" href="/css/classic.date.css">

<script src="/js/picker.js"></script>
<script src="/js/picker.date.js"></script>

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
                <div class="row">
                    <form action="filter-by-date" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="row">
                                <h3 class="text-center">Filter By Date</h3>
                                <div class="col-md-5">
                                    <input class="form-control pickadate" name="from" placeholder="Date From" style="background-color: #fff; border: 1px soild #222; cursor: pointer">
                                </div>
                                <div class="col-md-5">
                                    <input class="form-control pickadate" name="to" placeholder="Date To" style="background-color: #fff; border: 1px soild #222; cursor: pointer">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="amount">District</label>
                            <input type="text" id="district" name="district" value="" placeholder="District" class="form-control">
                        </div>
                    </div>
                </div> <!-- Row ends -->
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
                                    <th>BSSD Token</th>
                                    <th>KwH</th>
                                    <th>Amount Paid</th>
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
                                    <td>{{ str_replace('OFFLINE_','',$d->user_type)}} </td>
                                    <td>{{ $d->first_name." ". $d->last_name }}</td>
                                    <td>{{ $d->customer_address }}</td>
                                    <td>{{ $d->district }}</td>
                                    <td>Bank</td>
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
                                        {{ number_format($d->transaction->initial_amount)}}
                                    </td>
                                    <td>
                                        {{ number_format($d->transaction->total_amount)}}
                                    </td>
                                    <td>
                                        {{ number_format($d->transaction->commission)}}
                                    </td>
                                    <td>
                                        {{ number_format($d->transaction->wallet_bal)}}
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

<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            order: [['1','desc']],
        });
        $(".pickadate").pickadate();
    });
</script>
@endpush
@endsection