@extends('layouts.agent')

@section('content')
<style>
    #forSelf,#forOthers {
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
    <style>
        #mtrR {
                            display: none;
                        }
                    </style>
    @endif --}}
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
                           
                        required autofocus name="meter_no">
                        
                    </div>
                    <div class="form-group">
                        <label for="postpaid_category"><b>Select POSTPAID Service Category</b></label>
                        <select class="form-control m-b" name="postpaid_category">
                            <option>Reconnection Fee</option>
                            <option>Loss of Revenues</option>
                            <option>Penalties</option>
                            
                        </select>
                        
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
        // $(function() {
        //     $("#forSelf").hide();
        //     $("#forOthers").hide();

        //     $("#tFS").click(() => {
        //         $("#forSelf").css({'display':'block'});
        //         $("#group-pay").hide();
        //     });

        //     $("#tFO").click(() => {
        //         $("#forOthers").css({'display':'block'});
        //         $("#group-pay").hide();
        //     });
        // })
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>


    <script>
        var isCustomer = false;

        var agentValue = document.querySelector('.meter-email').value;

        var newMeterValue = "";

        $(".pay-meter").click((e) => {
            e.preventDefault();
            $(this).prop('disabled', true);
            $('.pay-meter').html('Making Payment');

            var formdata = $('.meterSelf').serialize();
            newMeterValue = document.querySelector('.meter-email').value;

            var payUri = $('.meterSelf').attr('action');

            $.ajax({
                url: "{{ url('meter/api') }}",
                method: "POST",
                data: {
                    'meter_no': $('input[name=meter_no]').val(),
                    '_token': "{{ csrf_token() }}"

                },
                success: (response) => {
                    if (response.code == 419) {
                        swal('Oops!', 'Invalid Meter No', 'error');

                        $('.pay-meter').html('Make Payment');
                    } else {
                        continueToPay();
                    }
                }
            })

            function continueToPay() {
                $.ajax({
                    url: payUri,
                    method: 'POST',
                    data: formdata,
                    success: (response) => {
                        if (response.code == "ok") {
                            payPrepaidMeter();
                        } else if (response.code == "no") {
                            swal('Ooops!',
                                'Sorry, Payment Cannot be made at the moment, Please Contact Admin to resolve your issues\n\nPhone: 08052313815\n\nEmail: customersupport@goenergee.com',
                                'danger');
                            $("#ifAdmin").css({
                                'display': 'block'
                            });
                        } else {
                            swal('Ooops', '' + response.errorText + '', 'error');
                        }
                    }
                })
            }
        })

        function payPrepaidMeter() {
            var amountMeter = document.querySelector('.meter-amount').value;
            var reference = "GOEPRE" + Math.floor((Math.random() * 1000000000) + 1);
            // var chargedAmount = parseInt(amountMeter) + 100;
            // console.log(chargedAmount);
            // var handler = PaystackPop.setup({
            // key: 'pk_test_120bd5b0248b45a0865650f70d22abeacf719371',
            // email: document.querySelector('.meter-email').value,
            // amount: chargedAmount+"00",
            // ref: Math.floor((Math.random() * 1000000000) + 1)+"GOEPAY", // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

            // callback: function(response){
            //     //   swal('Yay!','Payment Successfull','success');
            setTimeout(() => {
                // if(agentValue !== newMeterValue) {
                window.location.href = '/agent/payment-agent/' + reference + '/success';
                // }else {
                //   /  window.location.href='/payment-agent-customer/'+response.reference+'/success';
                // }

            }, 1000);
            // },
            // onClose: function(){
            //     alert('Payment Cancelled');
            // }
            // });
            // handler.openIframe();
        }
    </script>

    @endpush