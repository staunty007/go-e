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
                                <label>lastname</label>
                                <input class="form-control" value="" id="lastname" name="last_name" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" value="" id="emailret" name="email"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input class="form-control" value="" id="phoneret" name="mobile"/>
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
                                    <a href="#" class="list-group-item text-center">
                                        <h4 class="fa fa-university"></h4><br/>mVisa
                                    </a>
                                    @auth
                                        <a href="#" class="list-group-item text-center">
                                            <h4 class="fa fa-money"></h4><br/>My Wallet
                                        </a>
                                    @endauth
                                    {{-- <a href="#" class="list-group-item text-center">
                                        <h4 class="glyphicon glyphicon-road"></h4><br />Train
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h4 class="glyphicon glyphicon-home"></h4><br />Hotel
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h4 class="glyphicon glyphicon-cutlery"></h4><br />Restaurant
                                    </a> --}}
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
                                        <div class="form-group">
                                            <label>Please Select Your Bank</label>
                                            <select class="form-control" name="bank_payment" id="bank_payment">
                                                <option value="">Select your bank</option>

                                            </select>
                                        </div>
                                        <div class="other">
                                            <div class="form-group">
                                                <label>Please Enter Your Account Number</label>
                                                <input type="text" class="form-control" id="nuban" name="account">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-block btn-primary" id="make-btn" disabled>Make
                                                    Payment
                                                </button>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                                <div class="bhoechie-tab-content">
                                    <center>
                                        <h3>Please Scan the QR Code below</h3>
                                        {{-- <img src="/images/qr-code.svg" draggable="false" height="100" />
                                        <h3>Amount: N<span id="mvisa"></span></h3> --}}
                                        <a data-isw-payment-button data-isw-ref='7OD4h9rMEp'>
                                            <script type='text/javascript'
                                                    src='https://www.interswitchgroup.com/paymentgateway/public/js/webpay.js'
                                                    data-isw-trans-amount='10000'
                                                    data-isw-customer-ref='1543221650633'
                                                    data-isw-customer-callback='customCallback'>
                                            </script>
                                        </a>
                                    </center>
                                </div>
                                @auth
                                    {{-- Charge Customer Wallet --}}
                                    <div class="bhoechie-tab-content">
                                        <center>
                                            <button class="btn btn-primary btn-lg" id="chargeMyWallet">Charge my
                                                Wallet
                                            </button>
                                        </center>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="response"></div>

        </div>
    </div>
</div><!-- /.modal-content -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="/js/jquery-confirm.js"></script>
<script>
    let meter_no = '';
    let accountType = "{{ $accountType }}";
    let amount;

    $(".pay-meter").click((e) => {
        e.preventDefault();
        $(".pay-meter").prop('disabled', true).html('<div class="loader-css"></div>');
        if (navigator.onLine) {
            amount = $("#amount").val();
            if (accountType === "PREPAID" && parseFloat(amount) < 1000) {
                $.alert({
                    title: 'Invalid Amount!',
                    content: `Amount Cannot be lesser than N1000`,
                    type: 'red',
                    buttons: {
                        gotit: {
                            text: 'Got It!',
                            btnClass: 'btn-red'
                        }
                    }
                });
                $(".pay-meter").prop('disabled', false).html('Continue');
            } else {
                // alert('nooo');
                if (amount < 100) {
                    $.alert({
                        title: 'Invalid Amount!',
                        content: `Amount Cannot be lesser than N100`,
                        type: 'red',
                        buttons: {
                            gotit: {
                                text: 'Got It!',
                                btnClass: 'btn-red'
                            }
                        }
                    });
                    $(".pay-meter").prop('disabled', false).html('Continue');
                } else {
                    continuePayment();
                }
            }
        } else {
            $.alert({
                title: 'Ooops!',
                content: 'Seems you"re disconnected',
                type: 'red',
                buttons: {
                    ok: {
                        text: 'Got It',
                        btnClass: 'btn-red'
                    }
                }
            });
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
                    'lastname': '' + $('#lastname').val() + '',
                    'email': '' + $('#emailret').val() + '',
                    'mobile': '' + $('#phoneret').val() + '',
                    'amount': '' + $('.meter-amount').val() + '',
                    'is_agent': '1',
                };
            } else {
                payload = {
                    'meterno': '' + $("#meterno").val() + '',
                    'firstname': '' + $('#firstname').val() + '',
                    'lastname': '' + $('#lastname').val() + '',
                    'email': '' + $('#emailret').val() + '',
                    'mobile': '' + $('#phoneret').val() + '',
                    'amount': '' + $('.meter-amount').val() + '',
                };
            }
            continuePay(payload);
        }
    });

    function continuePay(payload) {
        $.ajax({
            url: '/payment/hold',
            method: 'POST',
            data: payload,
            success: (response) => {
                if (response.code == "ok") {
                    openOptions();
                }
            },
            error: (err) => {
                $('.pay-meter').html('Continue');
            }
        });
    }

    function payWithPaystack() {
        var chargedAmount = parseInt(amount) + 100;
        let reff;
        switch (accountType) {
            case 'POSTPAID':
                reff = "GOEPOS" + Math.floor((Math.random() * 1000000000) + 1)
                break;
            default:
                reff = "GOEPRE" + Math.floor((Math.random() * 1000000000) + 1)
                break;
        }
        var handler = PaystackPop.setup({
            key: "pk_test_120bd5b0248b45a0865650f70d22abeacf719371",
            email: document.querySelector('#emailret').value,
            amount: chargedAmount + "00",
            ref: reff,
            callback: function (response) {
                console.log(response);
                // charge wallet
                let dataBack;
                document.querySelector("#response").innerHTML = `<div class="modal-footer">
								<h2>Validating Transaction... <div class=" bg-darrk loader-css"></div></h2>
							</div>`;
                console.log('charging Wallet...');
                let amountCommission = amount - amount * 0.02;
                fetch(`/ekedc/charge-wallet/${amountCommission}/${accountType}/${meter_no}`)
                    .then(res => res.json())
                    .then(chargeWalletResult => {
                        console.log('Generating Token...');
                        const payRef = chargeWalletResult.response.result.orderDetails.paymentReference;
                        const orderId = chargeWalletResult.response.result.orderId;
                        document.querySelector("#response").innerHTML = `<div class="modal-footer">
								<h2>Completing Transaction... <div class="loader-css"></div></h2> 
						</div>`;
                        fetch(`/ekedc/generate-token/${payRef}/${orderId}`)
                            .then(res => res.json())
                            .then(generateTokenResult => {
                                // console.log(generateTokenResult.response);
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
                                            window.location.href = `/transaction/success/${accountType}/${reff}`;
                                        }
                                    },
                                    error: (err) => {
                                        alert('Something Bad Went Wrong, Please log a complain');
                                    }
                                })
                            })
                            .catch(err => console.log(err));
                    })
                    .catch(err => console.log(err));
                // generate token

                // setTimeout(() => {
                // 	window.location.href = '/payment/' + response.reference + '/success';
                // }, 1000);
            },
            onClose: function () {
                alert('Payment Cancelled');
                $('.pay-meter').html('Continue');
                window.location.reload();
            }
        });
        handler.openIframe();
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
                    $.alert({
                        title: 'Ooops!',
                        content: `${result.response.error} <br> Please Ensure your enter the correct <b>Meter Number</b>`,
                        type: 'red',
                        buttons: {
                            ok: {
                                text: 'Try Again',
                                btnClass: 'btn-red'
                            }
                        }
                    });
                    $('.pay-meter').html('Continue');
                    $(".pay-meter").prop('disabled', false);
                } else {
                    // Validate Payment
                    const customerInfo = result.response;
                    console.log(customerInfo);
                    fetch(`/ekedc/validate-payment/${accountType}/${meter_no}`)
                        .then(res => res.json())
                        .then(result => {
                            // console.log(result.response.desc);
                            if (result.result.response.desc !== "No record" && result.result.response.retn !== '310') {
                                let {
                                    name
                                } = customerInfo.customerInfo;
                                let names = name.split(' ', 2);
                                console.log(names[0]);
                                $("#firstname").val(names[0]);
                                $("#lastname").val(names[1]);
                                $("#emailret").val('');
                                $("#phoneret").val('');
                                $("#meter_no").val($("#meterno").val());
                                $("#total").val(parseInt($(".meter-amount").val()) + 100);
                                setTimeout(() => {
                                    $('.pay-meter').html('Validated');
                                    $("#mvisa").html(parseInt($(".meter-amount").val()) + 100);
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
                // alert('Sorry Something Went Wrong');
                console.log(err);
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
                $('.pay-meter').html('Continue');
                $(".pay-meter").prop('disabled', false);
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
                // if(result.success == 'OK') {
                // 	// Sufficient funds
                // document.querySelector("#response").innerHTML =`<div class="modal-footer">
                // 				<h2>Validating Transaction... <div class=" bg-darrk loader-css"></div></h2>
                // 			</div>`;
                // console.log('charging Wallet...');
                // let amountCommission = amount - amount * 0.02;
                // fetch(`/ekedc/charge-wallet/${amountCommission}/${accountType}/${meter_no}`)
                // 	.then(res => res.json())
                // 	.then(chargeWalletResult => {
                // 		console.log('Generating Token...');
                // 		const payRef = chargeWalletResult.response.result.orderDetails.paymentReference;
                // 		const orderId = chargeWalletResult.response.result.orderId;
                // 		document.querySelector("#response").innerHTML = `<div class="modal-footer">
                // 				<h2>Completing Transaction... <div class="loader-css"></div></h2>
                // 		</div>`;
                // 		fetch(`/ekedc/generate-token/${payRef}/${orderId}`)
                // 			.then(res => res.json())
                // 			.then(generateTokenResult => {
                // 				// console.log(generateTokenResult.response);
                // 				// Get the token data and redirect to receipt page
                // 				document.querySelector("#response").innerHTML = `<div class="modal-footer">
                // 						<h2>Transaction Completed</h2>
                // 						<p>Redirecting... <div class="loader-css"></div></p>

                // 					</div>`;
                // 				$.ajax({
                // 					url: '/gtk',
                // 					method: "POST",
                // 					data: generateTokenResult.response,
                // 					success: (result) => {
                // 						if(result == "ok") {
                // 							window.location.href = '/transaction/success';
                // 						}
                // 					},
                // 					error: (err) => {
                // 						alert('Something Bad Went Wrong, Please log a complain');
                // 					}
                // 				})
                // 			})
                // 			.catch(err => console.log(err));
                // 	})
                // 	.catch(err => console.log(err));
                // }else {
                // 	// Insufficiient Funds
                // 	$("#chargeMyWallet").html('Charge My Wallet');
                // 	$("#error-wallet").html('Insufficient funds, Please Top up and try again');
                // }
            })
    })

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
        loadBanks();
        $("#bank_payment").change(function () {
            let fetchUrl = "/bp/";
            const bankVal = $(this).val();
            switch (bankVal) {
                case 'diamond':
                    fetchUrl = fetchUrl + "diamond/c-mandate"
                    break;
                case 'zenith':
                    break;
                default:
                    break;
            }
            if ($(this).val() !== "") {
                $(".other").css({
                    "display": "block"
                });
            }
        });

        let nuban = document.querySelector("#nuban");
        nuban.addEventListener('keyup', () => {

            if (nuban.value.length !== 0) {
                document.querySelector('#make-btn').disabled = false;
            }
        });

        function loadBanks() {
            fetch('/nibbs/all-banks')
                .then(res => res.json())
                .then(response => {
                    let innerDom = document.querySelector('#bank_payment');
                    for (const banks in response) {
                        const bank = response[banks];
                        innerDom.innerHTML += `<option value="${bank.bankCode}" valueName="${bank.bankName}">${bank.bankName}</option>`;
                    }
                })
                .catch(err => console.log(err));
        }
    });
</script>
<script>
    $("#payOption").change(function () {
        var vall = $(this).val();
        if (vall !== "POSTPAID") {
            window.location = `/guest/postpaid-service-type/${vall}`;
        }
    })
</script>

<script>
    function customCallback(response) {
        console.log(response);
    }
</script>