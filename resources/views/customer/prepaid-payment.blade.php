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
                                        {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                                        
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
                
                <div class="col-lg-5" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Purchase Prepaid Meter Token
                        </div>
                      
                        <div class="ibox-content">
                            {{-- @if(isset($before)) --}}
                            <img src="/images/ekedc.jpg" width="80"/> 
                            <span style="font-size: 16px"> Eko Electric Distribution Company </span>
                            <br><br>
                            <form action="" method="POST" class="meterSelf">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label>Meter No.</label>
                                    <input type="text" name="meter_no" id="meter_no" class="form-control" value="{{ $bio->customer->meter_no }}" />
                                </div>
                                {{-- <div class="form-group">
                                    <label>Meter Owner's Name</label>
                                    <input type="text" name="meter_owner" disabled class="form-control" value="{{ $bio->customer->meter_owner }}" />
                                </div> --}}
                                
                                <div class="form-group">
                                    <label>Your FirstName</label>
                                    <input type="text" name="first_name" class="form-control" value="{{Auth::user()->first_name }}" />
                                </div>
                                <div class="form-group">
                                        <label>Your LastName</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}" />
                                    </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" name="email" class="form-control meter-email" value="{{ Auth::user()->email }}"  />
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" name="mobile" class="form-control" value="{{ Auth::user()->mobile }}"  />
                                </div>
                                <div class="form-group">
                                    <label>Convienience Fee</label>
                                    <input type="text" value="100.00" readonly class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="text" name="amount" class="form-control meter-amount" />
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-block btn-primary pay-meter1">Make Payment</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
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
                                        <img alt="image"  class="img-responsive" src="/customer/img/p_big1.png">
                                        
                                    </div>
                                    <div class="item ">
                                        <img alt="image"  class="img-responsive" src="/customer/img/p_big2.jpg">
                                        
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
    $(function() {
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
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script>
        $(".pay-meter1").click((e) => {
            e.preventDefault();
            $(".pay-meter1").prop('disabled',true).html('Validating  ....');
            let amount = "";
            let meterNo = document.querySelector("#meter_no").value;

            if(meterNo.length == 0 && meterNo.length > 6) {
                $.alert({
                    title: 'Ooops!',
                    content: 'Meter No Field is Required',
                    type: 'red',
                    buttons: {
                        ok: {
                            text: 'Okay',
                            btnClass: 'btn-red'
                        }
                    }
                });
                $(".pay-meter1").prop('disabled',false).html('Make Payment');
            }else {
                fetch(`/in-app/api/soap/validate-customer/${meterNo}`)
                    .then(res => res.json())
                    .then(response => {
                        console.log(response);
                        if(response.response.retn !== 0) {
                            $.alert({
                                title: 'Ooops!',
                                content: 'Invalid Meter No!',
                                type: 'red',
                                buttons: {
                                    ok: {
                                        text: 'Try Again',
                                        btnClass: 'btn-red'
                                    }
                                }
                            });
                            $(".pay-meter1").prop('disabled',false).html('Make Payment');
                        }else {
                            // Valid Meter no
                            continuePay();
                        }
                    })
                    .catch(err => {
                        // alert('Sorry Something Went Wrong');
                        $.alert({
                            title: 'Ooops!',
                            content: 'Something Bad Went Wrong',
                            type: 'red',
                            buttons: {
                                ok: {
                                    text: 'Got It',
                                    btnClass: 'btn-red'
                                }
                            }
                        });
                        $(".pay-meter1").prop('disabled',false).html('Make Payment');
                    });
                
            }
            function continuePay() {
                var formdata = $('.meterSelf').serialize();
                $.ajax({
                    url: "{{ url('payment/hold') }}",
                    method: 'POST',
                    data: formdata,
                    success: (response) => {
                        if(response.code == "ok") {
                            payWithPaystack();
                        }else {
                            $.alert({
                                title: 'Ooops!',
                                content: 'Sorry, Payment Cannot be made at the moment, Please Contact Admin to resolve your issues\n\nPhone: 08052313815\n\nEmail: customersupport@goenergee.com',
                                type: 'red',
                                buttons: {
                                    ok: {
                                        text: 'Got It',
                                        btnClass: 'btn-red'
                                    }
                                }
                            });
                            $(".pay-meter1").prop('disabled',false).html('Make Payment');
                        $("#ifAdmin").css({'display':'block'});
                        }
                    },error: (err) => {
                        $(".pay-meter1").prop('disabled',false).html('Make Payment');
                    }
                });
            }
            
        });
        function payWithPaystack(){
            var amountMeter = document.querySelector('.meter-amount').value;
            var chargedAmount = parseInt(amountMeter) + 100;
            console.log(chargedAmount);
            var handler = PaystackPop.setup({
            key: 'pk_test_120bd5b0248b45a0865650f70d22abeacf719371',
            email: document.querySelector('.meter-email').value,
            amount: chargedAmount+"00",
            ref: "GOEPRE"+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            
            callback: function(response){
                //   swal('Yay!','Payment Successfull','success');
                setTimeout(() => {
                    window.location.href='/payment/'+response.reference+'/success';
                },1000);
            },
            onClose: function(){
                alert('Payment Cancelled');
                $(".pay-meter1").prop('disabled',false).html('Make Payment');
            }
            });
            handler.openIframe();
        }
    </script>
@endpush