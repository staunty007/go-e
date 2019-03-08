@extends('customer.master')

@section('customer-section')



<div class="row">


    <!-- <div class="col-lg-3 col-md-3">

        <div class="stat">

            <div class="stat__icon-wrapper stat--bg-green">
                <i data-feather="activity" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Energy Balance</h1>
                <p class="stat__subheader"> 100 KwH</p>
            </div>
        </div>
    </div> -->

    <div class="col-lg-4 col-md-4">
        <div class="stat stat">
            <div class="stat__icon-wrapper stat--bg-blue">
                <i data-feather="book" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header"> My Transactions</h1><br>
                <p class="stat__subheader">

                    <h4 class="no-margins">2 <span class="pull-right">2</span></h4>
                    <small>Month<span class="pull-right">Year</span></small>
                </p>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4">
        <div class="stat stat">
            <div class="stat__icon-wrapper stat--bg-dark_grey">
                <i data-feather="server" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Meter Balance </h1><br>
                <p class="stat__subheader">

                    <h4 class="no-margins">&#8358;<span class="pull-right"> KwH</span></h4>
                    <small>25,800<span class="pull-right">20</span></small>
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="stat stat ">
            <div class="stat__icon-wrapper stat--bg-dark-yellow">
                <i data-feather="zap-off" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Avg. Daily Consumption</h1><br>
                <h4 class="no-margins">&#8358;<span class="pull-right"> KwH</span></h4>
                <small>25<span class="pull-right">0.5</span></small>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <h4>My Energy Consumption Trend</h4>
                        </div>

                        <div class="ibox-content">
                            <div class="text-center">
                                    <div id="chartdiv"></div>
                            </div>
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



@push("scripts")
<!-- ChartJS-->
<script src="{{asset('js/plugins/chartJs/Chart.min.js')}}"></script>
<script src="{{asset('js/demo/chartjs-demo.js')}}"></script>


<script src="{{asset('js/index.js')}}"></script>


<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>
<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>


<script src="{{ asset('js/core.js') }}"></script>
<script src="{{ asset('js/charts.js') }}"></script>
<script src="{{ asset('js/animated.js') }}"></script>
<script src="{{ asset('js/barchart.js') }}"></script>


@endpush
@endsection