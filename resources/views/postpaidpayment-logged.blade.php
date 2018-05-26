<!DOCTYPE html>

<head>

    <title>GOENERGEE</title>

    <link href="images/favicon.png" rel="shortcut icon" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="css/main.css" rel='stylesheet' type='text/css'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <style>
        #postpaid {
            min-width: 50%;
            max-width: 100%;
            margin: 1em auto;
            box-shadow: 0px 0px 3px 4px #e6e6e61f;
            padding: 2em;
            border-radius: 3px;
            line-height: 2.5;
            display: none;
        }
        input {
            background: none;
            border: 1px solid #dcdcdc;
        }
    </style>

    
</head>

<body>

    <div style=" min-height:100vh; max-height: 100%;">
        <div class="body-container">


            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <a href="{{ url('/')}}">
                        <img src="images/logo.png" style="float:left;margin-top:6px; padding:4px;">
                    </a>
                    <div class="navbar" style="margin-top:6px;right:23px;">
                        @if(Auth::check())
                        <a href="/home">
                            <button type="button" id="support_btn" class="grad-box">
                                <i class="fas fa-home"></i> Back to Home
                            </button>
                        </a>
                        @else
                        <a href="/">
                            <button type="button" id="support_btn" class="grad-box">
                                <i class="fas fa-home"></i> Back to Home
                            </button>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">

                    <div class="form-group">
                        <select name="" id="selectCat" class="form-control">
                            <option value="" selected>Select a Payment Category</option>
                            <option value="1">Postpaid Payment</option>
                            <option value="2">Reconnection Fee</option>
                            <option value="3">Penalties</option>
                            <option value="4">Loss of Revenue</option>
                        </select>
                    </div>

                    <div id="postpaid">
                        <h3>Provide details for <span class="holder"></span></h3>
                        <form class="postpay" action="" method="POST">
                            
                            <div class="form-group">
                                <label for="">Meter or Account Name</label>
                                <input type="text" name="meter_no" class="meterno" value="{{ $user->meter_no }}">
                            </div>
                            <div class="form-group">
                                <label for="">Account or Meter Number</label>
                                <input type="text" name="account_meter_name" disabled class="account_meter_name" disabledvalue="{{ $user->account_meter_name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input type="text" name="email" class="email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" name="mobile" class="mobile" value="{{ Auth::user()->mobile }}">
                            </div>
                            <div class="form-group">
                                <label for="">Convenience Fee</label>
                                <input type="text" name="conv_fee" value="100.00" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="text" name="amount" placeholder="0.00" class="amount">
                            </div>

                            <br>
                            <input type="hidden" id="payType" value="" />
                            @if(Auth::user()->id == 2)
                            <input type="hidden" id="is_agent" value="1" name="is_agent"/>
                            @else
                            <input type="hidden" id="is_agent" value="0" name="is_agent"/>
                            @endif
                            <div class="form-group">
                                <button class="btn btn-success btn-block" id="payPostpaid">Continue</button>
                            </div>
                    </div>


                </div>

                <div class="col-lg-7">
                  <h5>Information Portal</h5> 
                  <div id="carousel2" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                                    <li data-slide-to="0" data-target="#carousel2"  class="active"></li>
                                    <li data-slide-to="1" data-target="#carousel2"></li>
                                    <li data-slide-to="2" data-target="#carousel2" class=""></li>
                                </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <div class="item active">
                         <img alt="image"  class="img-responsive" src="/customer/img/p_big1.png" style="width:100%;">
                      </div>

                      <div class="item">
                        <img alt="image"  class="img-responsive" src="/customer/img/p_big2.jpg" style="width:100%;">
                      </div>
                    
                      
                    </div>

                    <!-- Left and right controls -->
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
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="/js/sweetalert.min.js"></script>

    <footer>
        Powered by GOENERGEE
    </footer>

    <script>
        $(document).ready(function() {
            $('#selectCat').select2();
            $("#selectCat").change(function(){
                var selected = this.value;
                console.log(selected);
                switch (selected) {
                    case '1':
                        $("#postpaid").css({'display':'block'});
                        document.querySelector('.holder').innerHTML = "Postpaid Payment";
                        $("#payType").val("Postpaid");
                        break;
                    case '2':
                        $("#postpaid").css({'display':'block'});
                        document.querySelector('.holder').innerHTML = "Reconnection Fee";
                        $("#payType").val("Reconnection");
                        break;
                    case '3':
                        $("#postpaid").css({'display':'block'});
                        document.querySelector('.holder').innerHTML = "Penalties Fee";
                        $("#payType").val("Penalties");
                        break;
                    case '4':
                        $("#postpaid").css({'display':'block'});
                        document.querySelector('.holder').innerHTML = "Loss of Revenue";
                        $("#payType").val("Loss of Revenue");
                        break;
                    default:
                    $("#postpaid").css({'display':'none'});
                        break;
                }
            });
        });

        var sum = 0;
        $(document).ready(function () {
            $('.carousel').carousel();
            //iterate through each textboxes and add keyup
            //handler to trigger sum event
            $(".txt").each(function () {

                $(this).keyup(function () {
                    calculateSum();
                });
            });

        });

        function calculateSum() {
            var sum = 0;
            $(".txt").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    var subtotal = parseFloat(this.value) + 100;
                    sum += subtotal;
                    jQuery(this).closest('tr').find("td:last input").val(subtotal);
                }
            });
            console.log(sum);
            $("#totalPayblleAmount").val(sum.toFixed(2));
            $("#sum").val(sum.toFixed(2));
        }
    </script>


    <script type="text/javascript">
        
        var payUrl = "payment/hold/postpaid";
                   
        $("#payPostpaid").click((e) => {
            e.preventDefault();
            $('#payPostpaid').prop('disabled', true);
            $('#payPostpaid').html('Verifying...');

            
            
            $.ajax({
                url: '/meter/api',
                method: "POST",
                data: { meter_no: $(".meterno").val() },
                success: (data) => {
                    if(data.code == '419') {
                        swal('Ooops!','Invalid Meter No');
                        $('#payPostpaid').prop('disabled', false);
                        $('#payPostpaid').html('Continue');
                    }else {
                        continuePay();
                    }
                }
            })
            
            function continuePay() {
                var formdata = $(".postpay").serialize();
                $.ajax({
                url: '/payment/hold/postpaid',
                method: 'POST',
                data: formdata,
                success: (response) => {
                    if (response.code == "ok") {
                        $('#payPostpaid').html('Connecting...');
                        payWithPaystack();
                    }else if(response.code == "no"){
                        swal('Ooops!','Sorry, Payment Cannot be made at the moment, Please Contact Admin to resolve your issues\n\nPhone: 08052313815\n\nEmail: customersupport@goenergee.com','danger');
                        $('#payPostpaid').prop('disabled', false);
                    }else {
                        swal('Ooops',''+response.errorText+'','error');
                    }
                },
                error: (err) => {
                    $('#payPostpaid').prop('disabled', false);
                }
            });
            $('#payPostpaid').prop('disabled', false);
            }
        })

        function payWithPaystack() {
            var handler = PaystackPop.setup({
                key: 'pk_test_120bd5b0248b45a0865650f70d22abeacf719371',
                email: document.querySelector('.email').value,
                amount: parseInt(document.querySelector('.amount').value) + 100 + "00",
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                callback: function (response) {
                    // console.log(response);
                    // var is_agent = false;
                    // var redirUrl = "";
                    // var getUser = document.querySelector('#is_agent').value;
                    
                    // if(getUser == 1) {
                        // redirUrl = 'postpaidpayment/agent/' + response.reference +'/success';
                    // }else {
                        redirUrl = 'postpaidpayment/' + response.reference +'/success';
                    // }


                    setTimeout(() => {
                        window.location.href = redirUrl;
                    }, 1000);
                    
                },
                onClose: function () {
                    alert('Payment cancelled Thank you');
                }
            });
            handler.openIframe();
                
        }
    </script>

@push('scripts')
                
                <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
                <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>