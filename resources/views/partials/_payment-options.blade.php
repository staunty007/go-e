<div class="modal fade" tabindex="-1" role="dialog" style="" id="payment-options">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header headermodal text-center">
                <button onclick="prevModalPaymentOptions()" class="btn btn-danger pull-right">Back</button>
            </div>
            <div id="payment-modal">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                                <div class="list-group">
                                    <a href="#" class="list-group-item active text-center">
                                        <h4 class="fa fa-credit-card"></h4><br />Card Payment
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h4 class="fa fa-university"></h4><br />Bank to Bank
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h4 class="fa fa-university"></h4><br />mVisa
                                    </a>
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
                                        <button class="btn btn-primary btn-lg" onclick="payWithPaystack();">Continue to Card Payment</button>
                                    </center>
                                </div>
                                <!-- bank section -->
                                <div class="bhoechie-tab-content">
                                    <center>
                                        <div class="form-group">
                                            <label>Please Select Your Bank</label>
                                            <select class="form-control" name="bank_payment" id="bank_payment">
                                                <option value="">Select your bank</option>
                                                <option value="Diamond">Diamond Bank</option>
                                                <option value="Zenith">Zenith Bank</option>
                                            </select>
                                        </div>
                                        <div class="other">
                                            <div class="form-group">
                                                <label>Please Enter Your Account Number</label>
                                                <input type="text" class="form-control" id="nuban" name="account">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-block btn-primary" id="make-btn" disabled>Make Payment</button>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                                <div class="bhoechie-tab-content">
                                    <center>
                                        <h3>Please Scan the QR Code below</h3>
                                        <img src="/images/qr-code.svg" draggable="false" height="100" />
                                        <h3>Amount: N<span id="mvisa"></span></h3>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="response">

            </div>
            
        </div>
    </div>
</div><!-- /.modal-content -->
<script src="https://js.paystack.co/v1/inline.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	<script>
		let meter_no = '';
		$(".pay-meter").click((e) => {
			e.preventDefault();
			$(".pay-meter").prop('disabled',true);
			if (navigator.onLine) {
				let amount = $("#amount").val();

				if (parseInt(amount) < 900) {
					$.alert({
						title: 'Invalid Amount!',
						content: `Amount Cannot be lesser than N900`,
						type: 'red',
						buttons: {
							gotit: {
								text: 'Got It!',
								btnClass: 'btn-red'
							}
						}
					});
					$(".pay-meter").prop('disabled',false);
				} else {
					$('.pay-meter').html('Validating....');
					meter_no = $('#meterno').val();
					
					fetch(`/ekedc/validate-customer/OFFLINE_PREPAID/${meter_no}`)
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
								$(".pay-meter").prop('disabled',false);
							} else {
								// Validate Payment
								const customerInfo = result.response;
								console.log(customerInfo);
								fetch(`/ekedc/validate-payment/PREPAID/${meter_no}`)
									.then(res => res.json())
									.then(result => {
										// console.log(result.response.desc);
										if(result.result.response.desc !== "No record" && result.result.response.retn !== '310') {
											let { name } = customerInfo.customerInfo;
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
										}else {
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
							$(".pay-meter").prop('disabled',false);
						});
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
				$(".pay-meter").prop('disabled',false);
			}
		})
		$("#ctnPay").click((e) => {
			$("#ctnPay").html('Connecting to Gateway..').prop('disabled', true);
			e.preventDefault();
			if ($("#emailret").val() == "") {
				alert('Please Enter an email address');
			}else {
				let payload = {
					'meterno': '' + $("#meterno").val() + '',
					'firstname': '' + $('#firstname').val() + '',
					'lastname': '' + $('#lastname').val() + '',
					'email': '' + $('#emailret').val() + '',
					'mobile': '' + $('#phoneret').val() + '',
					'amount': '' + $('.meter-amount').val() + '',
				};
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
						console.log(response.text);
						openOptions();
					}
				},
				error: (err) => {
					$('.pay-meter').html('Continue');
				}
			});
		}

		function payWithPaystack() {
			var amount = document.querySelector('.meter-amount').value;
			
			var chargedAmount = parseInt(amount) + 100;
			var handler = PaystackPop.setup({
				key: "{{ env('PS_KEY') }}",
				email: document.querySelector('#emailret').value,
				amount: chargedAmount + "00",
				ref: "GOEPRE" + Math.floor((Math.random() * 1000000000) + 1),
				callback: function (response) {
					// charge wallet
					// let dataBack;
					document.querySelector("#response").innerHTML =`<div class="modal-footer">
									<h2>Validating Transaction...</h2>
								</div>`;
					console.log('charging Wallet...');
					fetch(`/ekedc/charge-wallet/${amount}/OFFLINE_PREPAID/${meter_no}`)
						.then(res => res.json())
						.then(chargeWalletResult => {
							console.log('Generating Token...');
							const payRef = chargeWalletResult.response.result.orderDetails.paymentReference;
							const orderId = chargeWalletResult.response.result.orderId;
							document.querySelector("#response").innerHTML = `<div class="modal-footer">
									<h2>Completing Transaction...</h2>
							</div>`;
							fetch(`/ekedc/generate-token/${payRef}/${orderId}`)
								.then(res => res.json())
								.then(generateTokenResult => {
									// Get the token data and redirect to receipt page
									document.querySelector("#response").innerHTML = `<div class="modal-footer">
											<h2>Transaction Completed</h2>
											<p>Redirecting...</p>
											
										</div>`;
									$.ajax({
										url: '/gtk',
										method: "POST",
										data: generateTokenResult.response,
										success: (result) => {
											if(result == "ok") {
												window.location.href = '/transaction/success';
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
			$('#confirm-payment').modal('show');
		}
		// payment options
		const openOptions = () => {
			$(".modal").modal('hide');
			$("#payment-options").modal('toggle');
		}
		const prevModalPaymentOptions = () => {
			$("#ctnPay").prop('disabled',false);
			$("#payment-options").modal('toggle');
			// $('.modal').hide();
			confirmDetails();
		}

	</script>
	<script>
		$(document).ready(function() {
			$(".other").css({"display":"none"});
			$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
				e.preventDefault();
				$(this).siblings('a.active').removeClass("active");
				$(this).addClass("active");
				var index = $(this).index();
				$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
				$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
			});

			$("#bank_payment").change(function() {
				if($(this).val() !== "") {
					$(".other").css({
						"transition":"all .2s cubic-bezier(0, 0.01, 0.35, 0.91)",
						"display":"block"
					});
				}
			});
			
			let nuban = document.querySelector("#nuban");
			nuban.addEventListener('keyup', () => {

				if(nuban.value.length !== 0) {
					document.querySelector('#make-btn').disabled = false;
				}
			})
		});
	</script>