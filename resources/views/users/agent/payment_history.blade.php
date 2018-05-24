@extends('layouts.agent') @section('content')

             <div class="wrapper wrapper-content">
        <div class="row">
                   <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                               
                                <h5>Current Balance</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><span>&#8358;</span>25,800</h1>
                                <!--<div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>-->
                                <small>Customers</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                
                                <h5>Average Daily Income</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><span>&#8358;</span>120</h1>
                                <div class="stat-percent font-bold text-navy">4% <i class="fa fa-level-up"></i></div>
                                <small>Average daily amount received</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                               
                                <h5>Total Year to date Transaction</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><span>&#8358;</span>100,000</h1>
                                <!--<div class="stat-percent font-bold text-success">5%<i class="fa fa-level-down"></i></div>-->
                                <small>Cumulative Transacted Amount</small>
                            </div>
                        </div>
					</div>
        </div>
        
				<div class="wrapper wrapper-content">
					
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Customer Payment History
                                </div>
        
        
         

         <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="Transaction_id">Transaction reference</label>
                            <input type="text" id="Transaction_id" name="Transaction_id" value="" placeholder="Transaction Reference" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="status">Channel</label>
							<select class="form-control m-b" name="account" id="channel" name="channel" value="" placeholder="Payment Channel">
                                 <option>Web</option>
                                  <option>POS</option>
                                  <option>mCash</option>
								   <option>USSD</option>
                                  <option>mVisa</option>
                                 
                              </select>
                            
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
                            <label class="control-label" for="customer">Meter Number</label>
                            <input type="text" id="Meter_No" name="Meter_No" value="" placeholder="Meter Number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Date From</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added" type="text" class="form-control" value="03/04/2018">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="date_modified">Date To</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_modified" type="text" class="form-control" value="03/06/2018">
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
                            <label class="control-label" for="amount">Customer Type</label>
                            <select class="form-control m-b" name="customer_type" id="customer_type" name="customer-type" value="" placeholder="Customer Type">
                                 <option>PrePaid</option>
                                  <option>Post Paid</option>
                                  
                              </select>
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

                                    
                                    <th>Transaction Time</th>
                                    <th>Trans Ref</th>
                                    <th>Channel</th>
                                   <th>Type</th>
								   <th>Name</th>
                                    <th>Status</th>
									<th>Meter #</th>
                                    <th>District</th>
                                    <th>Direct Cost</th>
									<th>TOKEN</th>
									<th>KwH</th>
									<th>Conv. Fee</th>
                                   <th>Amount Paid</th>
									
                                    

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                       2/5/2018
                                    </td>
                                    <td>
                                        3WQ
                                    </td>
                                    <td>
                                        Web
                                    </td>
                                    <td>
                                        Pre-Paid
                                    </td>
				                    <td>
                                        Emeka Chig
                                    </td>
                                    
                                    <td>
                                        <span class="label label-primary">Successful</span>
                                    </td>
                                    
									<td>
                                        45897421
                                    </td>
									<td>
                                        GET API
                                    </td>
                                    <td>
                                        <span>&#8358;</span>5,000.00	
                                    </td>
                                    <td>
                                        GET API
                                    </td>
                                    <td>
                                       GET API
                                    </td>
									<td>
                                        <span>&#8358;</span>100
                                    </td>
                                    
                                    <td>
                                        <span>&#8358;</span>5,100
                                    </td>    
                                </tr>
                                </tbody>
                                
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


        @endsection