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

        <div class="stat__icon-wrapper stat--bg-yellow">
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
            <p class="stat__subheader"> <span>&#8358;</span> {{ $prev_tops != '' ? number_format($prev_tops) : 0 }}</p>
        </div>
    </div>
</div>
</div>


<div class="row" style="margin-top : 20px;">
    <div class="col-md-6">
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
                            required autofocus name="meter_no" value="{{ Auth::user()->customer->meter_no }}">

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


    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            {{-- <div class="ibox-title">
                <h5>Information Portal</h5>
            </div> --}}
            <div class="ibox-content ">
                <div class="carousel slide" id="carousel2">
                    <ol class="carousel-indicators">
                        <li data-slide-to="0" data-target="#carousel2" class="active"></li>
                        <li data-slide-to="1" data-target="#carousel2"></li>
                        <li data-slide-to="2" data-target="#carousel2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img alt="image" class="img-responsive " src="/customer/img/p_big2.jpg">

                        </div>
                        <div class="item ">
                            <img alt="image" class="img-responsive " src="/customer/img/15.png">

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
<script src="{{asset('js/index.js')}}"></script>
<script src="https://unpkg.com/feather-icons"></script>
@pay(['accountType' => "POSTPAID"])@endpay
@endpush