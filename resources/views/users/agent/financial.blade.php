@extends('layouts.agent') @section('content')

             <!-- <div class="wrapper wrapper-content animated fadeIn">
             
                <div class="p-w-md m-t-sm">
                    <div class="row">
             
                        <div class="col-sm-4">
                            <h1 class="m-b-xs"><span>&#8358;</span>
                                26,900
                            </h1>
                            <small>
                                Sales in current month
                            </small>
                            <div id="sparkline1" class="m-b-sm"></div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <small class="stats-label">Pages / Visit</small>
                                    <h4>236 321</h4>
                                </div>
             
                                <div class="col-xs-4">
                                    <small class="stats-label">% New Visits</small>
                                    <h4>46.11%</h4>
                                </div>
                                <div class="col-xs-4">
                                    <small class="stats-label">Last week</small>
                                    <h4>432</h4>
                                </div>
                            </div>
             
                        </div>
                        <div class="col-sm-4">
                            <h1 class="m-b-xs"><span>&#8358;</span>
                                98,100
                            </h1>
                            <small>
                                Sales in last 24h
                            </small>
                            <div id="sparkline2" class="m-b-sm"></div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <small class="stats-label">Pages / Visit</small>
                                    <h4>166 781</h4>
                                </div>
             
                                <div class="col-xs-4">
                                    <small class="stats-label">% New Visits</small>
                                    <h4>22.45%</h4>
                                </div>
                                <div class="col-xs-4">
                                    <small class="stats-label">Last week</small>
                                    <h4>86</h4>
                                </div>
                            </div>
             
             
                        </div>
                        <div class="col-sm-4">
             
                            <div class="row m-t-xs">
                                <div class="col-xs-6">
                                    <h5 class="m-b-xs">Income last month</h5>
                                    <h1 class="no-margins"><span>&#8358;</span>160,000</h1>
                                    <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                                </div>
                                <div class="col-xs-6">
                                    <h5 class="m-b-xs">Sales current year</h5>
                                    <h1 class="no-margins"><span>&#8358;</span>42,120</h1>
                                    <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                                </div>
                            </div>
             
                                 
                            <table class="table small m-t-sm">
                                <tbody>
                                <tr>
                                    <td>
                                        <strong>230</strong> Customers
             
                                    </td>
                                    <td>
                                        <strong>22</strong> Messages
                                    </td>
             
                                </tr>
                                <tr>
                                    <td>
                                        <strong>61</strong> Comments
                                    </td>
                                    <td>
                                        <strong>3</strong> Reported issues
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>12</strong> Agents
                                    </td>
                                    <td>
                                        <strong>3</strong> Payment Channels
                                    </td>
                                </tr>
                                </tbody>
                            </table>
             
             
             
                        </div>
             
                  
                             
                    <div class="row">
                                 
                        
                    </div> -->
<div class="wrapper wrapper-content">
        <div class="row">
        <div class="col-lg-4">
                <div class="widget yellow-bg p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-thumbs-up fa-4x"></i>
                        <h1 class="m-xs">Wallet Deposit</h1>
                        <h3 class="font-bold no-margins">
                            Current Balance is
                        </h3>
                        <span>&#8358;</span>{{ $details->wallet_balance}}
                    </div>
                </div>
		</div>
            <div class="col-lg-4">
                <div class="widget lazur-bg p-lg text-Center">
                    <div class="m-b-md">
                        <!--<i class="fa fa-thumbs-up fa-4x"></i>-->
                        <h1 class="m-xs">AGENT INFO</h1>
                        <ul class="list-unstyled m-t-md">
                            <li>
                                <span class="fa fa-envelope m-r-xs text-left"></span>
                                <label>Agent ID</label>
                                GO-OJO1254
                            </li>
                            <li>
                                <span class="fa fa-home m-r-xs"></span>
                                <label>Star:</label>
                                2 Star
                            </li>
                            <li>
                                <span class="fa fa-phone m-r-xs"></span>
                                <label>Points Earned:</label>
                                500
                            </li>
                        </ul>
                    </div>
                </div>
		</div>
            <div class="col-lg-4">
                    <div class="widget navy-bg p-lg text-center">
                        <div class="m-b-md">
                            <h1><span>&#8358;</span></h1>
                            <h1 class="m-xs">Profit Realised </h1>
                            <h3 class="font-bold no-margins">
                                From Inception to date
                            </h3><span>&#8358;</span>
                           10,000,000
                        </div>
                    </div>
            
                </div>
              
					
      
	<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Wallet Refill Gauge
                              
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <div>
                                 <div id="gauge"></div>
                            </div>
                        </div>
                    </div>
					
					 <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Agent Extra Features
                              
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <button data-toggle="button" class="btn btn-primary btn-outline" type="button">Register Complain</button>
								<button data-toggle="button" class="btn btn-primary btn-outline" type="button">Wallet Refund</button>
								  
                            </div>
                        </div>
                        
                    </div>
					
                </div>
				<div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Payment Channel Performance 
                              
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <div id="slineChart" ></div>
                            </div>
                        </div>
                    </div>
					
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Information Portal</h5>
                        </div>
                        <div class="ibox-content ">
                            <div class="carousel slide" id="carousel2">
                                <ol class="carousel-indicators">
                                    <li data-slide-to="0" data-target="#carousel2"  class="active"></li>
                                    <li data-slide-to="1" data-target="#carousel2"></li>
                                    <li data-slide-to="2" data-target="#carousel2" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img alt="image"  class="img-responsive" src="/images/12.png">
                                        
                                    </div>
                                    <div class="item ">
                                        <img alt="image"  class="img-responsive" src="/images/banne.jpg">
                                        
                                    </div>
                                    
                                </div>
                                <a data-slide="prev" href="#carousel2" class="left carousel-control">
                                    <span class="icon-prev"></span>
                                </a>
                                <a data-slide="next" href="#carousel2" class="right carousel-control">
                                    <span class="icon-next"></span>
                                </a>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
    
@endsection