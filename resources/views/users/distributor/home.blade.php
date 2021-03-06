@extends('layouts.distributor') @section('content')


<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Year</span>
                    <span class="label label-primary pull-right">Month</span>
                    <h5>Income</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦40 886,200</h1>
                    <div class="stat-percent font-bold text-success">98%
                        <i class="fa fa-bolt"></i>
                    </div>
                    <small>Total income</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Year</span>
                    <span class="label label-primary pull-right">Month</span>
                    <h5>Avg Daily Earning</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦230,000</h1>
                    <div class="stat-percent font-bold text-info">20%
                        <i class="fa fa-level-up"></i>
                    </div>
                    <small>Average Daily Transaction per customer</small>
                </div>
            </div>
        </div>



        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal6">
                        Top up Wallet Account
                    </button>

                    <div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title">Top Up Wallet</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <form id="admin_amount">
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <input id="amount" placeholder="Enter Amount" class="form-control">
                                            </div>
                                            <div>
                                            </div>
                                        </form>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" onclick="payWithPaystack()">
                                            <strong>Top Up Now</strong>
                                        </button>
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
                    <h1 class="no-margins">Balance =
                        <span>&#8358;</span>886,200</h1>
                    <div class="stat-percent font-bold text-success">5 days
                        <i class="fa fa-bolt"></i>
                    </div>
                    <small>Remaining days to finish</small>
                </div>
            </div>
       
   
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Financial Performance - GOENERGEE Admin Report
            </div>
            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="order_id">Order ID</label>
                            <input type="number" id="order_id" name="order_id" value="" placeholder="Order ID" class="form-control">
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

          
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="5">
                                <thead>
                                    <tr>

                                        <th>S/N</th>
                                        <th data-hide="phone"># Customer base</th>
                                        <th data-hide="phone"># of Agents</th>
                                        <th data-hide="phone">Average Daily Transaction</th>
                                        <th data-hide="phone">Average Daily Energy Usage</th>
                                        <th data-hide="phone"># of Post Paid Users</th>
                                        <th data-hide="phone"># of Prepaid Users</th>
                                        <th data-hide="phone">Avg Daily Profit</th>
                                        <th data-hide="phone">Avg Monthly Sales</th>
                                        <th data-hide="phone"># Issues Reported</th>
                                        <th data-hide="phone">% of Issue Resolved</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            230
                                        </td>
                                        <td>
                                            12
                                        </td>
                                        <td>
                                            ₦50,000.00
                                        </td>
                                        <td>
                                            140KwH
                                        </td>
                                        <td>
                                            100
                                        </td>

                                        <td>
                                            130
                                        </td>
                                        <td>
                                            ₦10,000.00
                                        </td>
                                        <td>
                                            ₦10,000,000.00
                                        </td>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            98%
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
    </div>
    <div class="footer">

        <div>
            <strong>Copyright</strong> GOENERGEE &copy; 2018
        </div>
    </div>
</div>

</div>
@endsection