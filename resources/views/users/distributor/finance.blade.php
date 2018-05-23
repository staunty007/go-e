  @extends('layouts.distributor') @section('content')

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-4">
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
        
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                   
                    <h5>Remaining Amount in GOENERGEE Wallet</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦530,000</h1>
                   
                    {{-- <small>5 days before next Top Up</small> --}}
                </div>
          
        </div>    
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                        Financial Performance – Distribution Company
                </div>
                <div class="ibox-content m-b-sm border-bottom">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="order_id">Transaction ID</label>
                                <input type="number" id="transaction_id" name="transaction_id" value="" placeholder="Transaction ID" class="form-control">
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
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-content" style="overflow-x: auto">
                                
                                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="10">
    
                                        <thead>
                                            <tr>
    
    
                                                <th>Timestamp</th>
                                                <th>Trans Ref</th>
                                                <th>Channel</th>
                                                <th>Customer Type</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Meter #</th>
                                                <th>District</th>
                                                <th>Amount Paid</th>
                                                <th>TOKEN</th>
                                                <th>KwH</th>
                                                <th>Conv. Fee</th>
                                                <th>Commission</th>
                                                <th>Total</th>
    
    
    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                            <tr>
                                                <td>{{ date('d/m/y', strtotime($d->created_at) ) }}</td>
                                                <td>{{ $d->transaction_ref }}</td>
                                                <td>Web</td>
                                                <td>{{ $d->payment_type }}</td>
                                                <td>{{ $d->first_name." ". $d->last_name }}</td>
    
                                                <td>
                                                    <span class="label label-primary">Successfull</span>
                                                </td>
    
                                                <td>
                                                    {{ $d->meter_no }}
                                                </td>
                                                <td>
                                                    Lekki
                                                </td>
                                                <td>
                                                    ₦{{ number_format($d->amount)}}
                                                </td>
                                                <td>
                                                    9807 2676
                                                </td>
                                                <td>
                                                    254
                                                </td>
                                                <td>
                                                    ₦100
                                                </td>
                                                <td>
                                                    ₦{{ (2/100) * $d->amount }}
                                                </td>
                                                <td>
                                                    ₦{{ number_format($d->total_amount)}}
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


@endsection