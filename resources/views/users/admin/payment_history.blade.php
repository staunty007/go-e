@extends('layouts.admin') @section('content')

<div class="row">
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-primary pull-right">Year</span>
                                <span class="label label-primary pull-right">Month</span> --}}
                                <h5>Income</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">₦40 886,200</h1>
                                {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                {{-- <small>Total income</small> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-primary pull-right">Year</span>
                                <span class="label label-primary pull-right">Month</span> --}}
                                <h5>Avg Energy Charge</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">₦230</h1>
                                {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                <small>Daily cost of Power</small> --}}
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal6">
                                    Top up Wallet Account
                                </button>

                                <div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title">Top Up Wallet</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <form id="admin_amount">
                                                      <div class="form-group"><label>Amount</label> <input id="amount" placeholder="Enter Amount" class="form-control"></div>
                                                 <div>
                                                </div>
                                                    </form>
                                                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" onclick="payWithPaystack()"><strong>Top Up Now</strong></button>
                                                        </div>
                                </div>
                                            </div>

                                        </div>
                                    </div>


                                 <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
                                     <script src="https://js.paystack.co/v1/inline.js"></script>
                                     <script src="app.js"></script>

                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">₦86,200</h1>
                                <div class="stat-percent font-bold text-success">5 days<i class="fa fa-bolt"></i></div>
                                <small>Remaining days to finish</small>
                            </div>
                        </div>
            </div>
        </div>
        <div class="col-lg-14">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Payment History
                                </div>




        <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="order_id">Order ID</label>
                            <input type="text" id="order_id" name="order_id" value="" placeholder="Order ID" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="status">Channel</label>
                            <input type="text" id="channel" name="channel" value="" placeholder="Payment Channel" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="customer">Customer</label>
                            <input type="text" id="customer" name="customer" value="" placeholder="Customer" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Date From</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added" type="text" class="form-control" value="03/04/2018">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="date_modified">Date To</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_modified" type="text" class="form-control" value="03/06/2018">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="amount">Amount</label>
                            <input type="text" id="amount" name="amount" value="" placeholder="Amount" class="form-control">
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                        <table style="border: 1px solid black;">
                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="5">

                                <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Channel</th>
                                    <th colspan="2">EKO Distribution Offer</th>
                                    <th>Transaction Size</th>
                                      <th colspan="2">Paystack Gateway</th>
                                      <th colspan="2">NIBBS Switching</th>
                                      <th colspan="2">Interswitch </th>
                                      <th colspan="2">ITEX Services</th>
                                      <th colspan="2">Agents Commissions</th>
                                      <th colspan="2">Vendor Commissions</th>


                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                       1
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        Min
                                    </td>
                                    <td>
                                        Max
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       Min
                                    </td>
                                    <td>
                                        Max
                                    </td>
                                    <td>
                                        Min
                                    </td>
                                    <td>
                                        Max
                                    </td>
                                    <td>
                                        Min
                                    </td>
                                     <td>
                                       Max
                                    </td>
                                    <td>
                                        Min
                                    </td>
                                    <td>
                                        Max
                                    </td>
                                    <td>
                                        Min
                                    </td>
                                     <td>
                                       Max
                                    </td>
                                    <td>
                                        SPEC
                                    </td>
                                    <td>
                                        Ralmouf
                                    </td>

                                </tr>
                                </tr>
                                <tr>
                                    <td>
                                       2
                                    </td>
                                    <td>
                                        POS
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       3
                                    </td>
                                    <td>
                                        mCash
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                      4
                                    </td>
                                    <td>
                                        USSD
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       5
                                    </td>
                                    <td>
                                        mVisa
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       6
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       7
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       8
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                      9
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       10
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       11
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       12
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       13
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       14
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       15
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       16
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       17
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       18
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       19
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       20
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                       21
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        2%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        <=2,000
                                    </td>
                                     <td>
                                       1.5%
                                    </td>
                                    <td>
                                        2000
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                     <td>
                                       0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0.85%
                                    </td>
                                     <td>
                                       0.85%
                                    </td>
                                    <td>
                                        0.1%
                                    </td>
                                    <td>
                                        0.90%
                                    </td>

                                </tr>




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
@endsection