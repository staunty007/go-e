import React, { Component , Fragment } from 'react';
import Slider from '../Slider';
import Rodal from 'rodal';
import { FormValidation } from "calidation";
import PayStack from '../Payment';
import axios from 'axios';
import { Redirect } from 'react-router-dom';

import { AppConfig } from '../../config';

export default class Postpaid extends Component {
	constructor() {
		super();
		this.state = {
			visible: false,
			continuePay:  false,
			otherErrors: '',
			customerInfo: undefined,
			paymentInfo: '',
			showPaymentModal: false,
			transactionProgress: false,
			transactionProgressMessage: {
				status: 'success',
				message: ''
			},
			transactionDone: false,
			redirTo: null,
			showOrderId: false
		}

		this.showModal = this.showModal.bind(this);
		this.hide = this.hide.bind(this);
		this.close = this.close.bind(this);
		this.hideEmailFormModal = this.hideEmailFormModal.bind(this);
		this.onSubmit = this.onSubmit.bind(this);
		this.finishPayment = this.finishPayment.bind(this);
		this.callback = this.callback.bind(this);
		this.generateToken = this.generateToken.bind(this);
		this.decideField = this.decideField.bind(this);
	}

	showModal() {
		this.setState({ visible: true })
	}

	hide() {
		this.setState({ visible: false})
	}

	hideEmailFormModal() {
		this.setState({ continuePay: false})
	}

	onSubmit({ fields, errors, isValid }){
		if (isValid) {
			// This is where we'd handle our submission...
			// `fields` is an object, { field: value }
			let { meter_no, recharge_amount } = fields;
			this.setState({ visible: true });
			// Validate Customer
			fetch(`/ekedc/validate-customer/POSTPAID/${meter_no}`)
				.then(res => res.json())
				.then(callback => {
					console.log(callback);
					if (callback.response.retn == 0) {
						// Valid Customer
						const customer = callback.response.customerInfo;
						// let { name } = customer;
						this.setState({
							customerInfo: {
								name: customer.name,
								meterNo: callback.response.customerInfo.accountNumber,
								amount: parseInt(recharge_amount) + 100
							},
							visible: false,
							continuePay: true
						})
						console.log(this.state.customerInfo);
					} else {
						this.setState({ visible: false, otherErrors: callback.response.error });
						// return (<Rerror message={callback.response.desc} />);
						
					}
				})
				.catch(err => console.log(err));
			
		} else {
			// `errors` is also an object!
			console.log('Something is wrong:', errors);
		}
	};

	callback(response){
		// alert('Payment Successfull');
		// Card Charged Successfully
		this.setState({
			// Hide and Show Necessary Modals
			continuePay: false,
			showPaymentModal: false,
			// Show Progress Modal
			transactionProgress: true
		});
		// generate Token
		console.log(response);
		this.generateToken(this.state.paymentInfo, response);
	}

	close(){
		console.log("Payment Cancelled");
		this.setState({
			customerInfo: null,
			paymentInfo: null,
			continuePay: false,
			showPaymentModal: false
		})
	}
	finishPayment({ fields, errors, isValid }) {
	
		if (isValid) {
			this.setState((state) => ({
				customerInfo: {
					name: state.customerInfo.name,
					meter: state.customerInfo.meterNo,
					amount: state.customerInfo.amount,
					email: fields.email,
					phone: fields.phone
				},
				paymentInfo: {
					name: state.customerInfo.name,
					meter: state.customerInfo.meterNo,
					amount: state.customerInfo.amount,
					email: fields.email,
					phone: fields.phone
				},
			}));
			setTimeout(() => {		
				this.setState((state) => ({
					showPaymentModal: true,
					// paymentInfo: state.customerInfo
				}));
				// hold payment
				let { name, meter, email, phone, amount } = this.state.customerInfo;
				const names = name.split(' ',2);
				const payload = {
					meterno: meter,
					firstname: names[0],
					lastname: names[1],
					email: email,
					mobile: phone,
					amount: amount
				}
				axios.post('/payment/hold', {
					data: payload
				})
				.then(response => {
					console.log(response.data);
				})
				.catch(err => console.log(err));
				// console.log(this.state.paymentInfo);
			}, 500);
				
			// );
		} else {
			console.log(errors);
		}

		// console.log(this.state.customerInfo);
	}

	generateToken(data, paystack) {
		this.setState({ transactionProgressMessage: { message: 'Validating Transaction...'}});
		console.log(data);
		let amountCommission = data.amount - 100;
		console.log(amountCommission);
		// console.log(amountCommission * 0.02);
		fetch(`/ekedc/charge-wallet/${amountCommission - amountCommission * 0.02}/POSTPAID/${data.meter}`)
			.then(res => res.json())
			.then(chargeWalletResult => {
				console.log('Generating Token...');
				const payRef = chargeWalletResult.response.result.orderDetails.paymentReference;
				const orderId = chargeWalletResult.response.result.orderId;
				this.setState({
					transactionProgressMessage: {
						message: 'Completing Transaction...'
					}
				});
				fetch(`/ekedc/generate-token/${payRef}/${orderId}`)
					.then(res => res.json())
					.then(generateTokenResult => {
						console.log(generateTokenResult.response);
						// Get the token data and redirect to receipt page
						this.setState({
							transactionProgressMessage: {
								message: 'Transaction Completed..'
							}
						});
						let tokenn = document.getElementsByName('csrf')
						axios.post('/gtk', {
							data: generateTokenResult.response,
						})
						.then(result=> {
							// console.log('Finishing ...', result);
							if(result.data == "ok") {
								// alert('done');
								// Send Get request to store data in the database
								fetch(`/mobile-transaction/success/POSTPAID/${paystack.reference}`)
								.then(res => res.json())
								.then(response => {
									// console.log(response);
									this.setState({ 
										redirTo: {
											order: response.order,
											user: response.user
										},
										transactionDone: true
									 });
									// console.log(this.state.paymentInfo);
									// redirect to receipt
								})
								.catch(err => console.log(err));
								// return window.location.href = `/transaction/success/${accountType}/${reff}`;
								// this.setState({ redirTo: `/mobile/transaction/success/PREPAID/${paystack.reference}` });
							}
						})
						.catch(err => {
							alert('Something Bad Went Wrong, Please log a complain', err);
						})
					})
					.catch(err => console.log(err));
			})
			.catch(err => console.log(err));
	}

	decideField(e) {
		const valuu = e.target.value;
		valuu == "other" ? this.setState({ showOrderId: true}) : this.setState({ showOrderId: false});
	}
	render() {
		const config = {
			meter_no: {
				isRequired: "Account Number field is required!",
				isMinLength: {
					message: "Please Enter a valid meter no",
					length: 10
				}
			},
			recharge_amount: {
				isRequired: "Amount field required!",
				isGreaterThan: {
					message: 'Minimum amount is 100',
					value: 100
				}
			}
		};
		const paymentConfig = {
			email: {
				isRequired: "Email field is required!",
				isEmail: {
					message: "Please Enter a valid Email",
					length: 10
				}	
			},
			phone: {
				isRequired: "Phone field required!",
			}
		}
		return (
			<div>
				{this.state.showPaymentModal && 
					<PayStack
						callback={this.callback}
						close={this.close}
						reference={"GOEPRE" + Math.floor((Math.random() * 1000000000) + 1)}
						email={this.state.paymentInfo.email}
						amount={this.state.paymentInfo.amount}
						paystackkey={AppConfig.PS_KEY}
						embed={false}
					/>
				}
				<Slider />
				{this.state.errors && <p>{this.state.errors}</p>}
				<h4 className="text-center text-muted p-3">Enter Your Postpaid Details</h4>
				<div className="card">
					<div className="card-body">
						<p>
							{this.state.otherErrors.length > 0 ? <div className='alert alert-danger'>{this.state.otherErrors}</div> : ''}
						</p>
						<FormValidation onSubmit={this.onSubmit} config={config}>
							{({ errors, submitted }) => (
								<Fragment>
									<div className="form-group">
										<label htmlFor="payment_type">Select Payment Type</label>
										<select id="payment_type" className="form-control" onChange={this.decideField}>
											<option value="postpaid">Postpaid Meter Payment</option>
											<option value="other">Other Postpaid Meter Payment</option>
										</select>
										
									</div>
									<div className="form-group">
										<label htmlFor="meter_no">Enter Your Account No</label>
										<input className="form-control" type="text" id="meter_no" name="meter_no" />
										{submitted && errors.meter_no &&
											<span className="help-text text-danger">{errors.meter_no}</span>
										}
									</div>
									{this.state.showOrderId && 
									
										<div>
											<div className="form-group">
												<label htmlFor="amount">Enter Order ID</label>
												<input className="form-control" type="text" name="order_id" />
												
											</div>
										</div>
									}
									{
										!this.state.showOrderId && 
										<div>
											<div className="form-group">
												<label htmlFor="amount">Enter Amount</label>
												<input className="form-control" type="text" name="recharge_amount" placeholder="Minimum is 100 NGN" />
												{submitted && errors.recharge_amount &&
													<span className="help-text text-danger">{errors.recharge_amount}</span>
												}
											</div>
										</div>
									}
									
									<div className="form-group">
										<label htmlFor="conv_fee">Convenience Fee</label>
										<input className="form-control" id="conv_fee" value="100.00" readOnly={true} />
									</div>
									<div className="form-group">
										<button className="btn btn-success btn-block" >Continue Payment</button>
									</div>
								</Fragment>
							)}
						</FormValidation>
					</div>
				</div>

				<Rodal
					visible={this.state.visible}
					onClose={this.hide}
					animation="fade"
					customStyles={
						{
							width: '100%',
							height: '100vh',
							background: 'rgba(0,0,0,0.5)',
							textAlign: 'center',

						}}
					duration={300}
					showCloseButton={true}
				>
					<div className="la-ball-scale-ripple-multiple la-2x" style={{
						position: 'absolute',
						top: '40vh',
						left: '42vw'
					}}>
						<div></div>
						<div></div>
						<div></div>
					</div>
				</Rodal>
				{/*  */}
				<Rodal
					visible={this.state.continuePay}
					onClose={this.hideEmailFormModal}
					animation="slideRight"
					customStyles={
						{
							width: '80vw',
							// height: 'auto',
							minHeight: '60vh',
							// background: 'rgba(0,0,0,0.5)',
							textAlign: 'center',

						}}
					duration={600}
					showCloseButton={true}
				>
					<h5>Continue Payment</h5>
					<hr />
					<FormValidation onSubmit={this.finishPayment} config={paymentConfig}>
						{({ fields, errors, submitted }) => (
							<Fragment>
								
								{/* Welcome {this.state.continuePay && 
								<p style={{ fontWeight: '500'}}>
									Welcome {this.state.customerInfo.name}
								</p>
								}
								 */}
								<div className="form-group">
									<label htmlFor="meter_no">Enter Your Email Address</label>
									<input className="form-control" type="text" id="email" name="email" />
									{submitted && errors.email &&
										<span className="help-text text-danger">{errors.email}</span>
									}
								</div>
								<div className="form-group">
									<label htmlFor="amount">Enter Your Phone Number</label>
									<input className="form-control" type="text" name="phone" placeholder="e.g 08012345678" />
									{submitted && errors.phone &&
										<span className="help-text text-danger">{errors.phone}</span>
									}
								</div>
								<div className="form-group">
									<button className="btn btn-success btn-block" onFocus={() => {
										this.innerHTML = `<div class="la-ball-clip-rotate la-sm">
										<div></div>
									</div>`;
									}}>Finish Transaction</button>
								</div>
							</Fragment>
						)}
					</FormValidation>
					
				</Rodal>
				{/* Transaction Progress Modal */}
				<Rodal
					visible={this.state.transactionProgress}
					animation="fade"
					customStyles= {{
						textAlign: 'center',
						height: '20vh',
						width: '80vw',
						color: '#222'
					}}
				>
					<h6>{this.state.transactionProgressMessage.message}</h6> <br />
					<center>
					<div class="la-ball-fall la-dark text-center">
						<div></div>
						<div></div>
						<div></div>
					</div>
					</center>
				</Rodal>
				{this.state.transactionDone && <Redirect to={`/mobile/receipt/${this.state.redirTo.order}/${this.state.redirTo.user}`} /> }
			</div>
		);
	}
}