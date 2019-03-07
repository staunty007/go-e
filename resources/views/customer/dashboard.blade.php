@extends('customer.master')

@section('customer-section')
<div class="row">


    <div class="col-lg-3 col-md-3">

        <div class="stat">

            <div class="stat__icon-wrapper stat--bg-green">
                <i data-feather="activity" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Energy Balance</h1>
                <p class="stat__subheader"> 100 KwH</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3">
        <div class="stat stat">
            <div class="stat__icon-wrapper stat--bg-blue">
                <i data-feather="book" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Meter Balance</h1>
                <p class="stat__subheader"><span>&#8358;</span>100</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3">
    <div class="stat stat">
        <div class="stat__icon-wrapper stat--bg-dark_grey">
            <i data-feather="server" class="stat__icon stat--color-white"></i>
        </div>
        <div class="stat__data">
            <h1 class="stat__header">My Transactions </h1><br>
            <p class="stat__subheader">

                <h4 class="no-margins">2 <span class="pull-right">2</span></h4>
                <small>Month<span class="pull-right">Year</span></small>
                </p>
        </div>
    </div>
</div>
    <div class="col-lg-3 col-md-3">
        <div class="stat stat ">
            <div class="stat__icon-wrapper stat--bg-dark-yellow">
                <i data-feather="zap-off" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Avg. Energy Consumption</h1><br>
                <p class="stat__subheader"> 10<span>KwH</span></p>
            </div>
        </div>
    </div>

</div>

<!-- <div class="row">
<div class="col-lg-3 col-md-3">
    <div class="ibox float-e-margins">
        <div class="ibox-title">

            <h5>Energy Balance</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">150<span>KwH</span></h1>
            
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
             <span class="label label-info pull-right">Instant Top Up</span>
            <h5>Meter Balance</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins"><span>&#8358;</span>25,800</h1>
            
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-3">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <span class="label label-primary pull-right">Year</span>
            <span class="label label-primary pull-right">Month</span>
            <span class="label label-primary pull-right">Week</span>
            <span class="label label-primary pull-right">Today</span> 
            <h5>Average Daily Charge</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins"><span>&#8358;</span>120</h1>
           
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-3">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <span class="label label-success pull-right">Year</span>
            <span class="label label-success pull-right">Quater</span>
            <span class="label label-success pull-right">Month</span> 
            <h5>Avg Energy Consumption</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">4.2KwH</h1>
            <div class="stat-percent font-bold text-success">5%<i class="fa fa-level-down"></i></div> 
            
        </div>
    </div>
</div>

 -->

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Current Fluctuations

                    </h5>
                </div>
                <div class="ibox-content">
                    <div>
                        <canvas id="lineChart" height="140"></canvas>
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
                            <li data-slide-to="0" data-target="#carousel2" class="active"></li>
                            <li data-slide-to="1" data-target="#carousel2"></li>
                            <li data-slide-to="2" data-target="#carousel2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img alt="image" class="img-responsive" src="/customer/img/15.png">

                            </div>
                            <div class="item ">
                                <img alt="image" class="img-responsive" src="/customer/img/p_big2.jpg">

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

</div>
</div>
@stop
<!-- ChartJS-->
<script src="/customer/js/plugins/chartJs/Chart.min.js"></script>
<script src="/customer/js/demo/chartjs-demo.js"></script>
<!-- Mainly scripts -->
<script src="/customer/js/jquery-3.1.1.min.js"></script>
<script src="/customer/js/bootstrap.min.js"></script>
<script src="/customer/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/customer/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/customer/js/inspinia.js"></script>
<script src="/customer/js/plugins/pace/pace.min.js"></script>


<!-- Custom and plugin javascript -->
<script src="/customer/js/inspinia.js"></script>
<script src="/customer/js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="/customer/js/plugins/jquery-ui/jquery-ui.min.js"></script>




