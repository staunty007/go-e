<link rel="stylesheet" href="/css/jquery-confirm.css">
<link rel="stylesheet" href="/css/custom/vertical-tab.css">
<!-- jQuery library -->
<div class="modal fade" tabindex="-1" role="dialog" style="" id="confirm-payment"
     style="display: block;padding-left: 15px;background: rgba(0, 0, 0, 0.77);">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header headermodal text-center">
                <br>
                <img src="/images/ekedc.jpg" width="60"/>
                <span style="font-size: 16px"> </span>
            </div>
            <div class="modal-body">
                <h3 class="modal-title text-center ">Confirm Details</h3>
                <br>
                <form id="payForm" method="POST" action="">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p><label>Meter No</label>
                                    <input class="form-control" value="" id="meter_no" name="meter_no" readonly/>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Amount</label>
                                <input class="form-control" value="" id="total" name="amount" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Firstname</label>
                                <input class="form-control" value="" id="firstname" name="first_name" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Othername(s)</label>
                                <input class="form-control" value="" id="othername" name="last_name" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" id="emailret" name="email" value="{{ auth()->check() ? auth()->user()->email : ''}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input class="form-control" id="phoneret" name="mobile" value="{{ auth()->check() ? auth()->user()->mobile : '' }}"/>
                            </div>
                        </div>
                        @if(auth()->check() && auth()->id() == 2)
                            <input type="hidden" name="is_agent" value="1" id="is_agent">
                            <input type="hidden" name="agent_id" value="{{ auth()->id() }}" id="agent_id">
                        @endif
                        <div class="col-md-12">

                            <input type="button" class="btn btn-primary" id="ctnPay" value="Continue to Payment">
                            <input type="button" value="Cancel Payment" class="btn btn-outline-danger"
                                   onclick="window.location.reload()">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- /.modal-content -->
<div class="modal fade" tabindex="-1" role="dialog" style="" id="payment-options"
     style="display: block;background: rgba(0, 0, 0, 0.77);">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header headermodal text-center">
                <button onclick="prevModalPaymentOptions()" class="btn btn-danger pull-right">Back</button>
            </div>
            <div id="payment-modal">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container"
                             style="margin-bottom: 1.5em">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                                <div class="list-group">
                                    <a href="#" class="list-group-item active text-center">
                                        <h4 class="fa fa-credit-card"></h4><br/>Card Payment
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h4 class="fa fa-university"></h4><br/>Bank to Bank
                                    </a>
                                    <a href="#" id="qrd" class="list-group-item text-center">
                                        <h4 class="fa fa-university"></h4><br/>mVisa
                                    </a>
                                    @auth
                                        {{-- <a href="#" class="list-group-item text-center">
                                            <h4 class="fa fa-money"></h4><br/>My Wallet
                                        </a> --}}
                                    @endauth

                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                                <!-- card section -->
                                <div class="bhoechie-tab-content active">
                                    <center>
                                        <button class="btn btn-primary btn-lg" onclick="payWithPaystack();">Continue to
                                            Card Payment
                                        </button>
                                    </center>
                                </div>
                                <!-- bank section -->
                                <div class="bhoechie-tab-content">
                                    <center>
                                        <div id="bank_details">
                                            <div class="form-group">
                                                <label>Please Select Your Bank</label>
                                                <select class="form-control" name="bank_payment" id="bank-i"></select>
                                            </div>
                                            <div class="other">
                                                <div class="form-group">
                                                    <label>Please Enter Your Account Number</label>
                                                    <input type="text" value="5050007512" class="form-control" id="nuban" name="account_number">
                                                </div>
                                                <div class="form-group">
                                                    <label>Please Enter Your Account Name</label>
                                                    <input type="text" value="OKOLI CHUKWUMA PAUL" class="form-control" id="acc_name" name="account_name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Enter Amount</label>
                                                    <input type="text" class="form-control" id="payWithBank_amount" name="payWithBank_amount" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-block btn-primary" id="payWithBank">
                                                        Pay With Bank
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="otp-details">
                                            <div class="form-group">
                                                <label>Enter OTP Code Received</label>
                                                <input type="tel" class="form-control" id="otp-reg" />
                                            </div>
                                            <div class="form-group">
                                                <button id="validate-otp" class="btn btn-primary btn-block">Validate OTP</button>
                                            </div>
                                        </div>
                                        <div id="otp-payment">
                                            <div class="form-group">
                                                <label>Please Enter OTP Code</label>
                                                <input type="tel" class="form-control" id="otp-pay" />
                                            </div>
                                            <div class="form-group">
                                                <button id="validate-otp-pay" class="btn btn-primary btn-block">Submit</button>
                                            </div>
                                        </div>
                                        <div id="success-payment">
                                            Transaction Completed
                                        </div>


                                        <img src="{{ asset('images/nibbs-logo.png') }}" width="50" />
                                    </center>


                                </div>
                                <div class="bhoechie-tab-content">
                                    <center>
                                        <h3>Please Scan the QR Code below</h3>
                                        {{-- <img src="/images/qr-code.svg" draggable="false" height="100" />
                                        <h3>Amount: N<span id="mvisa"></span></h3> --}}
                                        <div id="qr"></div>
                                        <a data-isw-payment-button data-isw-ref='7OD4h9rMEp'>
                                            <script type='text/javascript'
                                                    src='https://www.interswitchgroup.com/paymentgateway/public/js/webpay.js'
                                                    data-isw-trans-amount='40000'
                                                    data-isw-customer-ref='1543221650633'
                                                    data-isw-customer-callback='customCallback'>
                                            </script>
                                        </a>
                                    </center>
                                </div>
                                {{-- @auth
                                    {{-- Charge Customer Wallet --}
                                    <div class="bhoechie-tab-content">
                                        <center>
                                            <button class="btn btn-primary btn-lg" id="chargeMyWallet">Charge my
                                                Wallet
                                            </button>
                                        </center>
                                    </div>
                                @endauth --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="response"></div>

        </div>
    </div>
</div><!-- /.modal-content -->

    <div id="others" class="modal fade" tabindex="-1" role="dialog" style="margin-top: 35px;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-8">
                        <span class="text-center">
                            <img src="/images/ekedc.jpg" width="80" class="text-center" />
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
                                <input type="text" name="meter_no" class="form-control" placeholder="Account Number" id='order_account_number'>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Enter your Order ID</label>
                                <input type="text" name="order_id" class="form-control" placeholder="E.g 1234567" id='order_id'>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-block btn-success" id="confirm-other-order">Confirm my Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fast-xml-parser/3.10.0/parser.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="/js/jquery-confirm.js"></script>
<script src="/js/nibbs.js"></script>
<script>

    $("#confirm-other-order").click((e) => {
        e.preventDefault();
        alert('Yeee'); return;
        let accountNo = $("$order_account_number").val();
        let otherOrder = $("#order_id").val();

        payOtherOrders(accountNo, otherOrder);
    });

    
    const payOtherOrders = (accountNo, orderId) => {

        $.ajax({
            url: '/pay-order',
            method: 'POST',
            data: {
                account: accountNo,
                order: orderId
            },
            success = (response) => {
                console.log(response);
            },
            error = (err) => console.error(err)
        });

    };

</script>


<script>

    let meter_no = '';
    let accountType = "{{ $accountType }}"; // Account Type Passed as a component
    let amount, total; //
    const addedFee = 100;
    
    const convertToKobo = (amount = 1000) => parseInt(amount);

    $(".pay-meter").click((e) => {
        e.preventDefault();
      
        $(".pay-meter").prop('disabled', true).html('<div class="loader-css"></div>');
        if (navigator.onLine) {
            {{-- amount = convertToKobo($("#amount").val()); --}}
            amount = $("#amount").val();
            
            if (accountType === "PREPAID" && amount < 1000) {
                alert('Amount Cannot be lesser than 1000NGN')
                $(".pay-meter").prop('disabled', false).html('Continue');
                return;
            } else {
                // alert('nooo');
                if (amount < 100) {
                    alert('Amount cannot be lesser than 100NGN')
                    $(".pay-meter").prop('disabled', false).html('Continue');
                    return;
                } else {
                    continuePayment();
                }
            }
        } else {
            alert('Please Check your internet connection');
            $(".pay-meter").prop('disabled', false).html('Continue');
        }
    })


    $("#ctnPay").click((e) => {

        $("#ctnPay").html('Connecting to Gateway..').prop('disabled', true);
        e.preventDefault();
        if ($("#emailret").val() == "") {
            alert('Please Enter an email address');
            $("#ctnPay").html('Continue').prop('disabled', false);
        } else {
            let payload;
            if (document.body.contains(document.getElementById("is_agent"))) {
                payload = {
                    'meterno': '' + $("#meterno").val() + '',
                    'firstname': '' + $('#firstname').val() + '',
                    'lastname': '' + $('#othername').val() + '',
                    'email': '' + $('#emailret').val() + '',
                    'mobile': '' + $('#phoneret').val() + '',
                    'amount': total,
                    'is_agent': '1',
                };
            } else {
                payload = {
                    'meterno': '' + $("#meterno").val() + '',
                    'firstname': '' + $('#firstname').val() + '',
                    'lastname': '' + $('#othername').val() + '',
                    'email': '' + $('#emailret').val() + '',
                    'mobile': '' + $('#phoneret').val() + '',
                    'amount': total,
                };
            }
            continuePay(payload);
        }
    });


    function continuePay(payload) {
        // Hold the payment information in a session
        $.ajax({
            url: '/payment/hold',
            method: 'POST',
            data: { payload, _token: "{{ csrf_token() }}" },
            success: (response) => {
                if (response.code == "ok") {
                    openOptions();
                }
            },
            error: (err) => {
                alert('Somethig went wrong.. Please Try Again');
                $('.pay-meter').html('Continue');
            }
        });
    }


    function payWithPaystack() {

        var chargedAmount = total;
        
        let reff = null;
        switch (accountType) {
            case 'POSTPAID':
                reff = "GOEPOS" + Math.floor((Math.random() * 1000000000) + 1)
                break;
            default:
                reff = "GOEPRE" + Math.floor((Math.random() * 1000000000) + 1)
                break;
        }

        var handler = PaystackPop.setup({
            key: "{{ env('PS_KEY') }}",
            email: document.querySelector('#emailret').value,
            amount: `${chargedAmount}00`,
            ref: reff,
            callback: function (response) {
                // charge wallet
                chargeWallet();
            },
            onClose: function () {
                alert('Payment Cancelled');
                $('.pay-meter').html('Continue');
                window.location.reload();
            }
        });
        handler.openIframe();
    }

    const retryTokenGenerate = (ref,id) => {
        document.querySelector("#response").innerHTML = `<div class="modal-footer">
            <h2 class="text-center">Regenerating Token.....</h2>
        </div>`;
        console.log(`Your Reference is ${ref} and your id is ${id}`);
        fetch(`/ekedc/generate-token/${ref}/${id}`)
            .then(res => res.json())
            .then(generateTokenResult => {
                let tokenResponse = generateTokenResult.response;
                if(tokenResponse.response.orderDetails.status == "CONFIRMED" || tokenResponse.response.orderDetails.status == "EXPIRED") {
                    
                    // Get the token data and redirect to receipt page
                    document.querySelector("#response").innerHTML = `<div class="modal-footer">
                            <h2>Transaction Completed</h2>
                            <p>Redirecting... <div class="loader-css"></div></p>
                        </div>`;
                    $.ajax({
                        url: '/gtk',
                        method: "POST",
                        data: tokenResponse.response,
                        success: (result) => {
                            if (result == "ok") {
                                window.location.href = `/transaction/success/${accountType}/${ref}`;
                            }else {
                                
                            }
                        },
                        error: (err) => {
                            alert('Something Bad Went Wrong, Please log a complain to support@goenergee.com');
                        }
                    });
                }else {
                    // Token Generation Failed
                    document.querySelector("#response").innerHTML = `<div class="modal-footer">
                        <h4 class="text-center">There was an error while generating Your Meter Token, Please click on the button below to try again</h4>
                        <button onclick="retryTokenGenerate('${ref}',${id})" class="btn btn-success">Generate Token Again</button>
                    </div>`;
                }
            })
            .catch(err => console.log(err));
    }

    // Generate Token
    const generateToken = (ref,id) => {
        fetch(`/ekedc/generate-token/${ref}/${id}`)
            .then(res => res.json())
            .then(generateTokenResult => {
                let tokenResponse = generateTokenResult.response;
                if(tokenResponse.response.orderDetails.status == "CONFIRMED" || tokenResponse.response.orderDetails.status == "EXPIRED") {
                    // console.log(tokenResponse.response);
                    // return;
                    // Get the token data and redirect to receipt page
                    document.querySelector("#response").innerHTML = `<div class="modal-footer">
                            <h2>Transaction Completed</h2>
                            <p>Redirecting... <div class="loader-css"></div></p>

                        </div>`;
                    $.ajax({
                        url: '/gtk',
                        method: "POST",
                        data: generateTokenResult.response,
                        success: (result) => {
                            if (result == "ok") {
                                console.log(result);
                                // return;
                                window.location.href = `/transaction/success/${accountType}/${ref}`;
                            }else {
                                
                            }
                        },
                        error: (err) => {
                            alert('Something Bad Went Wrong, Please log a complain');
                        }
                    });
                }else {
                    // Token Generation Failed
                    // retryTokenGenerate(ref, id);
                    document.querySelector("#response").innerHTML = `<div class="modal-footer">
                        <h4 class="text-center">There was an error while generating Your Meter Token, Please click on the button below to try again</h4>
                        <button onclick="retryTokenGenerate('${ref}',${id})" class="btn btn-success">Generate Token Again</button>
                    </div>`;
                }
            })
            .catch(err => console.log(err));
    }

    // confirm payment details
    const confirmDetails = () => {
        $('#confirm-payment').modal({
            backdrop: 'static',
            keyboard: false
        });
    }
    // payment options
    const openOptions = () => {

        $(".modal").modal('hide');
        $("#payment-options").modal({
            backdrop: 'static',
            keyboard: false
        });
    }
    const prevModalPaymentOptions = () => {
        $("#ctnPay").prop('disabled', false);
        $("#payment-options").modal('toggle');
        // $('.modal').hide();
        confirmDetails();
    }

    function continuePayment() {
        $('.pay-meter').html('<div class="loader-css"></div>');
        meter_no = $('#meterno').val();

        fetch(`/ekedc/validate-customer/${accountType}/${meter_no}`)
            .then(res => res.json())
            .then(result => {
                if (result.response.retn !== 0) {
                    alert('Cannot Validate Customer, Please Try Again');
                    $('.pay-meter').html('Continue');
                    $(".pay-meter").prop('disabled', false);
                } else {
                    // Validate Payment
                    const customerInfo = result.response;
                    // console.log(customerInfo.customerInfo.name);
                    
                    fetch(`/ekedc/validate-payment/${accountType}/${meter_no}`)
                        .then(res => res.json())
                        .then(result => {
                            // console.log(result.response.desc);
                            // return;
                            if (result.result.response.desc !== "No record" && result.result.response.retn !== '310') {
                                let {
                                    name
                                } = customerInfo.customerInfo;
                                let names = name.split(' ', 2);
                                $("#firstname").val(names[0]);
                                $("#othername").val(names[1]);

                                total = convertToKobo($(".meter-amount").val()) + addedFee;

                                $("#meter_no").val($("#meterno").val());
                                $("#total, #payWithBank_amount").val(total);
                                setTimeout(() => {
                                    $('.pay-meter').html('Validated');
                                    $("#mvisa").html(total);
                                    confirmDetails();
                                }, 2000);
                            } else {
                                // you have a debt
                            }
                        })
                        .catch(err => console.log(err));

                }
            })
            .catch(err => {
                $('.pay-meter').html('Continue');
                $(".pay-meter").prop('disabled', false);

                alert('Ooops!, Server Caught Up in Traffic.. Its Us not you, Kindly give it another Try');
            });
    }

    // Pay With Wallet
    $("#chargeMyWallet").click(function () {
        $(this).html('<div class="loader-css"></div>').prop('disabled', true);
        const authId = "{{ auth()->id() }}";

        // Fetch Wallet Balance
        fetch(`/profile/user/wb/${authId}/${amount}`)
            .then(res => res.json())
            .then(result => {
                console.log(result);
            })
    });

    const chargeWallet = () => {
        document.querySelector("#response").innerHTML = `<div class="modal-footer">
                        <h2>Validating Transaction... <div class=" bg-darrk loader-css"></div></h2>
                    </div>`;
        console.log('charging Wallet...');
        let amountCommission = amount - amount * 0.02;
        fetch(`/ekedc/charge-wallet/${amountCommission}/${accountType}/${meter_no}`)
            .then(res => res.json())
            .then(chargeWalletResult => {
                console.log('Generating Token...');
                if(chargeWalletResult.response.result.orderDetails) {
                    const payRef = chargeWalletResult.response.result.orderDetails.paymentReference;
                    const orderId = chargeWalletResult.response.result.orderId;
                    document.querySelector("#response").innerHTML = `<div class="modal-footer">
                            <h2>Completing Transaction... <div class="loader-css"></div></h2> 
                    </div>`;
                    generateToken(payRef, orderId);
                }else {
                document.querySelector("#response").innerHTML = `<div class="modal-footer">
                    <h4 class="text-center">There was an error while generating Your Meter Token, Please click on the button below to try again</h4>
                    <button onclick="retryTokenGenerate('${ref}',${id})" class="btn btn-success">Generate Token Again</button>
                </div>`;
                }
            })
            .catch(err => console.log(err));
    };


</script>
<script>
    $(document).ready(function () {
        $(".other").css({
            "transition": "all .2s cubic-bezier(0, 0.01, 0.35, 0.91)",
            "display": "none"
        });


        $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });

        $("#payOption").change(function () {
        var vall = $(this).val();
            if (vall !== "POSTPAID") {
                $(`#${vall}`).modal('show');
                $("#payOption").val('');
            }
        });


    });
</script>