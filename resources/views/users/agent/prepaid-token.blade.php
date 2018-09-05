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
                <div class="col-lg-8" id="mtrR">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Buy Prepaid Token
                        </div>
                        
                        <div class="ibox-content">
                            {{-- @if(isset($before)) --}}
                            <form action="{{ url('payment/hold/agent') }}" method="POST" class="meterSelf">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label>Meter No.</label>
                                    <input type="text" name="meter_no" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control" value="{{ Auth::user()->first_name }}" />
                                </div>
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}"  />
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
                                    <button class="btn btn-block btn-primary pay-meter">Make Payment</button>
                                </div>
                            </form>

                        </div>
                    </div>

                
    </div>
      <!-- Mainly scripts -->
    <script src="/customer/js/jquery-3.1.1.min.js"></script>
    <script src="/customer/js/bootstrap.min.js"></script>
    <script src="/customer/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/customer/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/customer/js/inspinia.js"></script>
    <script src="/customer/js/plugins/pace/pace.min.js"></script>

    <!-- ChartJS-->
    <script src="/customer/js/plugins/chartJs/Chart.min.js"></script>
    <script src="/customer/js/demo/chartjs-demo.js"></script>

    <!-- Mainly scripts -->
    <script src="/customer/js/jquery-3.1.1.min.js"></script>
    <script>
            $(function() {
                $("#forSelf").hide();
                $("#forOthers").hide();

                $("#tFS").click(() => {
                    $("#forSelf").css({'display':'block'});
                    $("#group-pay").hide();
                });

                $("#tFO").click(() => {
                    $("#forOthers").css({'display':'block'});
                    $("#group-pay").hide();
                });
            })
    
            </script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="https://js.paystack.co/v1/inline.js"></script>
	
		   
            <script>
                var isCustomer = false;

                var agentValue = document.querySelector('.meter-email').value;

                var newMeterValue = "";

              $(".pay-meter").click((e) => {
                    e.preventDefault();
                    $(this).prop('disabled',true);
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
                            if(response.code == 419) {
                                swal('Oops!','Invalid Meter No','error');

                                $('.pay-meter').html('Make Payment');
                            }else {
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
                            if(response.code == "ok") {
                                payPrepaidMeter();
                            }else if(response.code == "no"){
                                swal('Ooops!','Sorry, Payment Cannot be made at the moment, Please Contact Admin to resolve your issues\n\nPhone: 08052313815\n\nEmail: customersupport@goenergee.com','danger');
                                $("#ifAdmin").css({'display':'block'});
                            }else {
                                swal('Ooops',''+response.errorText+'','error');
                            }
                        }
                    })
                  }
              })
                function payPrepaidMeter(){
                    var amountMeter = document.querySelector('.meter-amount').value;
                    var reference = "GOEPRE"+Math.floor((Math.random() * 1000000000) + 1);
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
                                window.location.href='/agent/payment-agent/'+reference+'/success';
                            // }else {
                            //   /  window.location.href='/payment-agent-customer/'+response.reference+'/success';
                            // }
                            
                        },1000);
                    // },
                    // onClose: function(){
                    //     alert('Payment Cancelled');
                    // }
                    // });
                    // handler.openIframe();
              }
              
            </script>
    <script src="/customer/js/bootstrap.min.js"></script>

</body>
</html>
@endsection