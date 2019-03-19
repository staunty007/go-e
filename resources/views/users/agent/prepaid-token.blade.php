@extends('layouts.agent')

@section('content')
<style>
    #forSelf,#forOthers {
        display: none;
    }
</style>
<div class="row">

    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Buy Prepaid Token
            </div>

            <div class="ibox-content">
                {{-- @if(isset($before)) --}}
                <form action="{{ url('payment/hold') }}" method="POST" class="meterSelf">
                    {{ csrf_field()}}
                    <p class="text-center"><img src="/images/ekedc.jpg" width="80" /></p>
                    <br>

                    <form class="meter" method="post" action="">
                        <div class="form-group">
                            <label for="Meter_number"><b>Prepaid Meter Number</b></label>
                            
                            <input id="meterno" type="text" class="form-control meterno" placeholder="Enter Your PrePaid Meter Number"
                               
                            required autofocus name="meter_no">
                            
                        </div>
                        <div class="form-group">
                            <label for="convinience_fee"><b>Convenience Fee</b></label>
                            
                            <div class="input-group m-b"><span class="input-group-addon">₦</span> <input type="text" required name="conv_fee" class="form-control conv_fee" id="conv_fee" value="100.00" readonly></div>
                        </div>
                        <input type="hidden" name="is_agent" value="1" />
                        <div class="form-group">
                            <label for="amount"><b>Amount</b></label>
                            
                            <div class="input-group m-b"><span class="input-group-addon">₦</span> <input type="text" step="any" required name="amount" class="form-control two-decimals meter-amount" id="amount" placeholder="0.00"></div>
                        </div>
                        <p class="text-center">
                            <button class="btn btn-success pay-meter" type="submit">Continue</button>
                        </p>
                    </form>
            </div>
        </div>
    </div>
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                
                <div class="ibox-content ">
                    <div class="carousel slide" id="carousel2">
                        <ol class="carousel-indicators">
                            <li data-slide-to="0" data-target="#carousel2" class="active"></li>
                            <li data-slide-to="1" data-target="#carousel2"></li>
                            <li data-slide-to="2" data-target="#carousel2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img alt="image" class="img-responsive" src="/customer/img/p_big1.png" >

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
    @endsection
    @push('scripts')
    <script>
        $(".two-decimals").change(function(){
        this.value = parseFloat(this.value).toFixed(2);
        });
    </script>
    
    @pay(['accountType' => 'PREPAID'])@endpay
    @endpush