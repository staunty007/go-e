@extends('layouts.admin') @section('content')







<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                   
                    <h5>Customer</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"></h1>
                   
                    <small>Total Number of Customers</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                  
                    <h5>Direct Customers</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"></h1>
                    
                    <small>Total Number of Direct Customers</small>
                </div>
            </div>
        </div>



        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                  
                    <h5>Direct Customers</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"></h1>
                    
                    <small>Total Number of Direct Customers</small>
                </div>
            </div>
        </div>

</div>
    <div class="col-lg-14">
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

            </div>
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