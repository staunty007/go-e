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

<div class="row">


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

    <div class="col-lg-5">
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

                        <input id="meterno" type="text" class="form-control meterno" placeholder="Enter Your Prepaid Meter Number"
                            required autofocus name="meter_no">

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
                                required name="amount" class="form-control meter-amount" id="amount"></span></div>
                    </div>
                    <p class="text-center"><button class="btn btn-success pay-meter" type="submit">Continue</button></p>
                </form>
            </div>
        </div>
    </div>


    <div class="col-lg-7">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Customer Energy Utilization Report</h4>
            </div>



            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                        <tr>
                            <th>Trans ref #</th>
                            <th>Date </th>
                            <th>BSSD Token</th>
                            <th>Amount Paid</th>
                            <th>Meter Type</th>





                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>G0-01</td>
                            <td>2/5/2018</td>
                            <td>620</td>
                            <td>500</td>
                            <td>750</td>
                        </tr>
                        <tr>
                            <td>G0-01</td>
                            <td>2/5/2018</td>
                            <td>620</td>
                            <td>500</td>
                            <td>750</td>
                        </tr>
                        <tr>
                            <td>G0-01</td>
                            <td>2/5/2018</td>
                            <td>620</td>
                            <td>500</td>
                            <td>750</td>
                        </tr>
                        <tr>
                            <td>G0-01</td>
                            <td>2/5/2018</td>
                            <td>620</td>
                            <td>500</td>
                            <td>750</td>
                        </tr>
                        <tr>
                            <td>G0-01</td>
                            <td>2/5/2018</td>
                            <td>620</td>
                            <td>500</td>
                            <td>750</td>
                        </tr>
                        <tr>
                            <td>G0-01</td>
                            <td>2/5/2018</td>
                            <td>620</td>
                            <td>500</td>
                            <td>750</td>
                        </tr>
                        <tr>
                            <td>G0-01</td>
                            <td>2/5/2018</td>
                            <td>620</td>
                            <td>500</td>
                            <td>750</td>
                        </tr>
                        <tr>
                            <td>G0-01</td>
                            <td>2/5/2018</td>
                            <td>620</td>
                            <td>500</td>
                            <td>750</td>
                        </tr>

                    </tbody>
                </table>

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
<script src="{{asset('js/index.js')}}"></script>
<script src="https://unpkg.com/feather-icons"></script>
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