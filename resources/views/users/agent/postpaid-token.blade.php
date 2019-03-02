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
                Pay for PostPaid Services
            </div>

            <div class="ibox-content" id="post001">
                {{-- @if(isset($before)) --}}
                <form class="meter" method="post" action="">
                    <div class="form-group">
                        <label for="payOption"><b>Select POSTPAID Service Category</b></label>
                        <select class="form-control m-b" name="postpaid_category" id="payOption">
                            <option value="POSTPAID">Postpaid Payment</option>
                            <option value="others">Other Postpaid Payments</option>

                        </select>

                    </div>
                    <div class="form-group">
                        <label for="Meter_number"><b>PostPaid Account or Meter Number</b></label>
                        
                        <input id="meterno" type="text" class="form-control meterno" placeholder="Enter Your PostPaid Account or Meter Number"
                           
                        required autofocus name="meter_no">
                        
                    </div>

                    <div class="form-group">
                        <label for="convinience_fee"><b>Convenience Fee</b></label>
                        
                        <div class="input-group m-b"><span class="input-group-addon">₦</span> <input type="text" required name="conv_fee" class="form-control conv_fee" id="conv_fee" value="100.00" readonly></div>
                    </div>
                   
                    <div class="form-group">
                        <label for="amount"><b>Amount</b></label>
                        
                        <div class="input-group m-b"><span class="input-group-addon">₦</span> <input type="text" required name="amount" class="form-control meter-amount" id="amount"></div>
                    </div>
                    <p class="text-center"><button class="btn btn-success pay-meter" type="submit">Continue</button></p>
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
            $("#post002").hide();
            $("#payOption").change(function () {
                var vall = $(this).val();
                if (vall !== "POSTPAID") {
                     window.location = `{{ route('agent.other-postpaid') }}`;
                    // $("#post001").hide();
                    // $("#post002").show();
                }
            })
        </script>
    {{--@pay(['accountType' => "POSTPAID"])@endpay--}}

    @endpush
