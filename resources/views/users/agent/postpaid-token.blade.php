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
                            <option data-toggle="modal" data-target="#otherPostpaid" value="others">Other Postpaid Payments</option>

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
                        {{-- <ol class="carousel-indicators">
                            <li data-slide-to="0" data-target="#carousel2" class="active"></li>
                            <li data-slide-to="1" data-target="#carousel2"></li>
                            <li data-slide-to="2" data-target="#carousel2" class=""></li>
                        </ol> --}}
                        {{-- <div class="carousel-inner">
                            <div class="item active"> --}}
                                <img alt="image" class="img-responsive" src="/customer/img/41.png" >

                            {{-- </div> --}}
                            {{-- <div class="item ">
                                <img alt="image" class="img-responsive" src="/customer/img/p_big2.jpg">

                            </div> --}}
{{-- 
                        </div> --}}
                        {{-- <a data-slide="prev" href="#carousel2" class="left carousel-control">
                            <span class="icon-prev"></span>
                        </a>
                        <a data-slide="next" href="#carousel2" class="right carousel-control">
                            <span class="icon-next"></span>
                        </a> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>



    
        <div id="otherPostpaid" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-8">
                            <span class="text-center">
                                <img src="/images/ekedc.jpg" width="80" class="text-center" />&nbsp;<span><b>OTHER POSTPAID PAYMENTS</b></span>
                            </span>
                        </div>
                        <div class="col-md-4">
                            <span class="pull-right">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Enter your Account Number</label>
                                    <input type="text" name="meter_no" class="meterno form-control" placeholder="Account Number" id='post_meterno'>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Enter your Order ID</label>
                                    <input type="text" name="order_id" class="meterno form-control" placeholder="E.g 1234567" id='order_id'>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-block btn-success" id="confirm-order">Confirm my Order</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
    </div>
      
    @endsection
    @push('scripts')
        <script>
            $("#post002").hide();
            $("#payOption").change(function () {
                // var vall = $(this).val();
                // if (vall !== "POSTPAID") {
                //      window.location = `{{ route('agent.other-postpaid') }}`;
                //     // $("#post001").hide();
                //     // $("#post002").show();
                // }
            })
        </script>
    {{--@pay(['accountType' => "POSTPAID"])@endpay--}}

    @endpush
