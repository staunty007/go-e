@extends('layouts.agent')

@section('content')
<style>
    #forSelf,#forOthers {
        display: none;
    }
</style>
            <div class="row">
                @if($violated == "Yes")
                    <div class="col-md-12 text-center">
                        <div class="alert alert-danger">
                            Please Contact Admin to Buy Token or Make Payment
                        </div>
                        <h5>
                            <b>Phone:</b> 08052313815</h5>
                        <h5>
                            <b>Email:</b> customersupport@goenergee.com</h5>
                    </div>
                @else
                <div class="col-md-12 text-center"  id="group-pay">
                    <h1>Who are you paying For? </h1>
                    <div class="btn-group">
                        <button id='tFS' class="btn btn-primary btn-md">Prepaid Self</button>
                        <button id="tFO" class="btn btn-warning btn-md">Prepaid Customers</button>
                    </div>
                </div>
                @endif
                

               
                <div class="col-lg-6" id="forSelf">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Buy New Token
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">

                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            {{-- @if(isset($before)) --}}
                            <form action="" method="POST" class="meterSelf">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label>Meter No.</label>
                                    <input type="text" name="meter_no" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control"  value="{{ Auth::user()->first_name }}" />
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
                                    <button class="btn btn-block btn-primary pay-meter1">Make Payment</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6" id="forOthers">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Make new bill payment
                        </div>
                    <div class="ibox float-e-margins">
    
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">

                <li><a href="#">Config option 1</a>
                </li>
                <li><a href="#">Config option 2</a>
                </li>
            </ul>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">

        <form action="" method="POST" class="meterOthers">
            {{ csrf_field()}}
            <div class="form-group">
                <label>Meter No.</label>
                <input type="text" name="meter_no" class="form-control" />
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" />
            </div>
            <div class="form-group">
                <label>Lastname</label>
                <input type="text" name="last_name" class="form-control" />
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="email" class="form-control meter-email-2" />
            </div>
            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" name="mobile" class="form-control" />
            </div>
            <div class="form-group">
                <label>Convienience Fee</label>
                <input type="text" value="100.00" readonly class="form-control" />
            </div>
            <div class="form-group">
                <label>Amount</label>
                <input type="text" name="amount" class="form-control meter-amount-2" />
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-primary pay-meter2">Make Payment</button>
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
              $(".pay-meter1").click((e) => {
                  e.preventDefault();
                  $(this).prop('disabled',true);
  
                  var formdata = $('.meterSelf').serialize();
  
                  $.ajax({
                      url: 'payment/hold',
                      method: 'POST',
                      data: formdata,
                      success: (response) => {
                          if(response.code == "ok") {
                              payWithPaystack();
                          }
                      }
                  })
              })
              $(".pay-meter2").click((e) => {
                  e.preventDefault();$('.pay-meter2').prop('disabled',true).html('Loading...');
  
                  var formdata = $('.meterOthers').serialize();
  
                  $.ajax({
                      url: 'payment/hold',
                      method: 'POST',
                      data: formdata,
                      success: (response) => {
                          if(response.code == "ok") {
                              payWithPaystack2();
                          }
                      }
                  })
              })
              function payWithPaystack(){
                  var amountMeter = document.querySelector('.meter-amount').value;
                  
                  var chargedAmount = parseInt(amountMeter) + 100;
                    console.log(chargedAmount);
                var handler = PaystackPop.setup({
                  key: 'pk_test_120bd5b0248b45a0865650f70d22abeacf719371',
                  email: document.querySelector('.meter-email').value,
                  amount: chargedAmount+"00",
                  ref: 'GOENERGEE'+Math.floor((Math.random() * 1000000000) + 1)+"TRANSREF", // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                  
                  callback: function(response){
                    //   swal('Yay!','Payment Successfull','success');
                      setTimeout(() => {
                          window.location.href='/payment-agent/'+response.reference+'/success';
                      },1000);
                  },
                  onClose: function(){
                      alert('Payment Cancelled');
                  }
                });
                handler.openIframe();
              }
              function payWithPaystack2(){
                  var amountMeter = document.querySelector('.meter-amount-2').value;
                  var chargedAmount = parseInt(amountMeter) + 100;
                    console.log(chargedAmount);
                var handler = PaystackPop.setup({
                  key: 'pk_test_120bd5b0248b45a0865650f70d22abeacf719371',
                  email: document.querySelector('.meter-email-2').value,
                  amount: chargedAmount+"00",
                  ref: 'GOENERGEE'+Math.floor((Math.random() * 1000000000) + 1)+"TRANSREF", // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                  
                  callback: function(response){
                      swal('Yay!','Payment Successfull','success');
                      setTimeout(() => {
                          window.location.href='/payment-agent-customer/'+response.reference+'/success';
                      },1000);
                  },
                  onClose: function(){
                      alert('Payment Cancelled');
                  }
                });
                handler.openIframe();
              }
            </script>
    <script src="/customer/js/bootstrap.min.js"></script>

</body>
</html>
@endsection