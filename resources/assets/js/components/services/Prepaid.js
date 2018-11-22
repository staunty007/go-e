import React, { Component , Fragment } from 'react';
import Slider from '../Slider';
import Rodal from 'rodal';
import { FormValidation } from "calidation";
import Rerror from '../states/Rerror';
import PayStack from '../Payment';

import { AppConfig } from '../../config';

export default class Prepaid extends Component {
	constructor() {
		super();
		this.state = {
			visible: false,
			continuePay:  false,
			otherErrors: '',
			customerInfo: undefined,
			paymentInfo: '',
			showPaymentModal: false
		}

		this.showModal = this.showModal.bind(this);
		this.hide = this.hide.bind(this);
		this.close = this.close.bind(this);
		this.hideEmailFormModal = this.hideEmailFormModal.bind(this);
		this.onSubmit = this.onSubmit.bind(this);
		this.finishPayment = this.finishPayment.bind(this);
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
			fetch(`/ekedc/validate-customer/PREPAID/${meter_no}`)
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
								meterNo: callback.response.customerInfo.meterNumber,
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
		console.log(response); // card charged successfully, get reference here
	}

	close(){
		console.log("Payment Canced");
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
			}));
			setTimeout(() => {
				
				this.setState((state) => ({
					showPaymentModal: true,
					paymentInfo: state.customerInfo
				}));
				console.log(this.state.paymentInfo);
			}, 1000);
			// console.log(this.state.paymentInfo);
			// return <PayStack />
			// return (
				
			// );
		} else {
			console.log(errors);
		}

		// console.log(this.state.customerInfo);
	}

	generateToken(value) {

	}
	render() {
		const config = {
			meter_no: {
				isRequired: "Meter field is required!",
				isMinLength: {
					message: "Please Enter a valid meter no",
					length: 10
				}
			},
			recharge_amount: {
				isRequired: "Amount field required!",
				isGreaterThan: {
					message: 'Minimum amount is 500',
					value: 500
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
				<h4 className="text-center text-muted p-3">Enter Your Prepaid Details</h4>
				<div className="card">
					<div className="card-body">
						<p>
							{this.state.otherErrors.length > 0 ? <div className='alert alert-danger'>{this.state.otherErrors}</div> : ''}
						</p>
						<FormValidation onSubmit={this.onSubmit} config={config}>
							{({ errors, submitted }) => (
								<Fragment>
									<div className="form-group">
										<label htmlFor="meter_no">Enter Your Meter No</label>
										<input className="form-control" type="text" id="meter_no" name="meter_no" />
										{submitted && errors.meter_no &&
											<span className="help-text text-danger">{errors.meter_no}</span>
										}
									</div>
									<div className="form-group">
										<label htmlFor="amount">Enter Amount</label>
										<input className="form-control" type="text" name="recharge_amount" placeholder="Minimum is 1000NGN" />
										{submitted && errors.recharge_amount &&
											<span className="help-text text-danger">{errors.recharge_amount}</span>
										}
									</div>
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
					duration={300}
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
			</div>
		);
	}
}