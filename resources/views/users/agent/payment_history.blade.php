@extends('layouts.agent') @section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">
             <div class="wrapper wrapper-content">
        <div class="row">
                   <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                               
                                <h5>Wallet Balance</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><span>&#8358;</span>{{ number_format($balance) }}</h1>
                                <!--<div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>-->
                                {{-- <small>Customers</small> --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                
                                <h5>Last Topup Amount</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><span>&#8358;</span>{{ number_format($theLast) }}</h1>
                                {{-- <div class="stat-percent font-bold text-navy">4% <i class="fa fa-level-up"></i></div> --}}
                                {{-- <small>Average daily amount received</small> --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                               
                                <h5>Total Year to date Transaction</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><span>&#8358;</span>{{ number_format($allSold) }}</h1>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox" style="overflow-x: auto">
                        <div class="ibox-content">
						<table class="table table-striped">
                            <table class="footable table table-stripped toggle-arrow-tiny" id="myTable">
							 
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
                                    @foreach ($history as $h)
                                    <tr>
                                        <td>{{ $h->created_at}}</td>
                                        <td>{{ $h->transaction_ref }}</td>
                                        <td>{{ $h->transaction_type }}</td>
                                        <td>
                                            @if($h->user_type == 1)
                                                {{ 'Prepaid'}} 
                                            @else 
                                                {{ 'Postpaid '}}
                                            @endif
                                        </td>
                                        <td>{{ $h->first_name." ".$h->last_name }}</td>
                                        
                                        <td>
                                            <span class="label label-primary">Successful</span>
                                        </td>
                                        
                                        <td>{{ $h->meter_no }}</td>
                                        <td>GET API</td>
                                        <td>
                                            <span>&#8358;</span>{{ $h->agent_transaction->initial_amount }}	
                                        </td>
                                        <td>
                                            {{ $h->recharge_pin }}
                                        </td>
                                        <td>
                                            {{ $h->agent_transaction->initial_amount / 12.85}}
                                        </td>
                                        <td>
                                            <span>&#8358;</span>100
                                        </td>
                                        
                                        <td>
                                            <span>&#8358;</span>{{ $h->agent_transaction->total_amount }}
                                        </td>    
                                    </tr>
                                    @endforeach
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
        
        @push('scripts')
        <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        
        
        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
        @endpush

        @endsection