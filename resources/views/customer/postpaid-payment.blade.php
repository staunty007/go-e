@extends('customer.master')

@section('customer-section')
<style>
    #forSelf,#forOthers {
        display: none;
    }
    #mtrR {
                            display: none;
                        }
</style>
<div class="row">
    {{-- @if($violated == "Yes")
    <div class="col-md-12 text-center">
        <div class="alert alert-danger">
            Please Contact Admin to Buy Token or Make Payment
        </div>
        <h5>
            <b>Phone:</b> 08052313815</h5>
        <h5>
            <b>Email:</b> customersupport@goenergee.com</h5>
    </div>
</div>

@endif --}}



    <div class="col-lg-4 col-md-4">

        <div class="stat">

            <div class="stat__icon-wrapper stat--bg-custom">
                <i data-feather="activity" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Energy Balance</h1>
                <p class="stat__subheader"> 25<span>KwH</span></p>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4">
        <div class="stat stat--has-icon-left">
            <div class="stat__icon-wrapper stat--bg-blue">
                <i data-feather="trello" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Meter balance</h1>
                <p class="stat__subheader"><span>&#8358;</span>600</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="stat stat--has-icon-left">
            <div class="stat__icon-wrapper stat--bg-dark-red">
                <i data-feather="thumbs-up" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Previous Top Up</h1>
                <p class="stat__subheader"> <span>&#8358;</span> 10,005</p>
            </div>
        </div>
    </div>
</div>

    
<div class="row">
    <div class="col-md-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Pay for PostPaid Services
            </div>

            <div class="ibox-content">
                {{-- @if(isset($before)) --}}
                <form class="meter" method="post" action="">
                    <div class="form-group">
                        <label for="Meter_number"><b>PostPaid Account or Meter Number</b></label>

                        <input id="meterno" type="text" class="form-control meterno" placeholder="Enter Your PostPaid Account or Meter Number"
                            required autofocus name="meter_no">

                    </div>
                    <div class="form-group">
                        <label for="postpaid_category"><b>Select POSTPAID Service Category</b></label>
                        <select class="form-control m-b" name="postpaid_category" id="payOption">
                            <option value="POSTPAID">Postpaid Payment</option>
                            <option data-target="#others" value="others">Other Postpaid Payments</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="convinience_fee"><b>Convenience Fee</b></label>

                        <div class="input-group m-b"><span class="input-group-addon">₦</span> <input type="text"
                                required name="conv_fee" class="form-control conv_fee" id="conv_fee" value="100.00"
                                readonly> </div>
                    </div>

                    <div class="form-group">
                        <label for="amount"><b>Amount</b></label>

                        <div class="input-group m-b"><span class="input-group-addon">₦</span> <input type="text"
                                required name="amount" class="form-control meter-amount" id="amount"> </div>
                    </div>
                    <p class="text-center"><button class="btn btn-success pay-meter" type="submit">Continue</button></p>
                </form>
            </div>
        </div>
    </div>
    




</div>
@endsection
@push('scripts')
<script src="{{asset('js/index.js')}}"></script>
<script src="https://unpkg.com/feather-icons"></script>
@pay(['accountType' => "POSTPAID"])@endpay
@endpush