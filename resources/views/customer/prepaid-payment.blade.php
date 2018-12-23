@extends('customer.master')

@section('customer-section')
<style>
    #forSelf, #forOthers, #ifAdmin {
        display: none;
    }

    #forOthers > .panel , #forOthers > .panel-body, #forOthers > .ibox-content {
        min-height: 800px !important;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins" style="height: 100%;">
                <div class="ibox-title">
                    {{-- <span class="label label-info pull-right">Instant Top Up</span> --}}
                    <h5>Current Meter Balance</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><span>&#8358;</span>25,800</h1>
                    <small>Your Current Meter Balance is 25,800</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{-- <span class="label label-primary pull-right">Year</span>
                    <span class="label label-primary pull-right">Month</span>
                    <span class="label label-primary pull-right">Week</span>
                    <span class="label label-primary pull-right">Today</span> --}}
                    <h5>Average Daily Charge</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><span>&#8358;</span>120</h1>
                    {{-- <div class="stat-percent font-bold text-navy">4% <i class="fa fa-level-up"></i></div> --}}
                    <small>Average Cost of Electricity Per day</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{-- <span class="label label-success pull-right">Year</span>
                    <span class="label label-success pull-right">Quater</span>
                    <span class="label label-success pull-right">Month</span> --}}
                    <h5>Average Electrical Consumption</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">4.2KwH</h1>
                    {{-- <div class="stat-percent font-bold text-success">5%<i class="fa fa-level-down"></i></div> --}}
                    <small>Avg Daily Electrical Power Consumed</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Purchase Prepaid Meter Token
                </div>

                <div class="ibox-content">
                    {{-- @if(isset($before)) --}}
                    <p class="text-center"><img src="/images/ekedc.jpg" width="80" /></p>
                    <br>
                    
                    <form class="meter" method="post" action="">
                        <div class="form-group">
                            <label for="Meter_number"><b>Prepaid Meter Number</b></label>
                            
                            <input id="meterno" type="text" class="form-control meterno" placeholder="Enter Your PrePaid Meter Number" required autofocus name="meter_no">
                            
                        </div>
                        <div class="form-group">
                            <label for="convinience_fee"><b>Convenience Fee</b></label>
                            
                            <div class="input-group m-b"><span class="input-group-addon">₦</span> <input type="text" required name="conv_fee" class="form-control conv_fee" id="conv_fee" value="100.00" readonly> <span class="input-group-addon">.00</span></div>
                        </div>
                       
                        <div class="form-group">
                            <label for="amount"><b>Amount</b></label>
                            
                            <div class="input-group m-b"><span class="input-group-addon">₦</span> <input type="text" required name="amount" class="form-control meter-amount" id="amount"> <span class="input-group-addon">.00</span></div>
                        </div>
                        <p class="text-center"><button class="btn btn-success pay-meter" type="submit">Continue</button></p>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
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
                                <img alt="image" class="img-responsive" src="/customer/img/p_big1.png" style="height: 320px">
                            </div>
                            <div class="item">
                                <img alt="image" class="img-responsive" src="/customer/img/p_big2.jpg" style="height: 320px">

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
        <div class="col-lg-4 text-center" id="ifAdmin">
            <div class="alert alert-danger">
                <h2>Please Contact Admin</h2>
                <h5>
                    <b>Phone:</b> 08052313815
                </h5>
                <h5>
                    <b>Email:</b> customersupport@goenergee.com
                </h5>
            </div>
        </div>

    </div>

</div>

@endsection
@push('scripts')
<script>
    $(function () {
        $("#forSelf").hide();
        $("#forOthers").hide();

        $("#tFS").click(() => {
            $("#forSelf").show().fadeIn('normal');
            $("#group-pay").hide();
        });

        $("#tFO").click(() => {
            $("#forOthers").show().fadeIn('normal');
            $("#group-pay").hide();
        });
    })
</script>
@pay(['accountType' => "PREPAID"])
@endpay
@endpush