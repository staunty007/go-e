import React, { Component, Fragment } from 'react';
import { FormValidation } from 'calidation';
import axios from 'axios';

export default class Register extends Component {
	constructor() {
		super();
		this.state = {
			error: null,
			success: null,
			emailError: false,
			user: {}
		};

		this.onSubmit = this.onSubmit.bind(this);
		this.resendEmail = this.resendEmail.bind(this);
	}

	onSubmit({ fields, isValid, errors }) {
		if (isValid) {
			// Send Ajax Request
			const regBtn = document.querySelector('.regi');
			regBtn.classList.add('disabled');
			regBtn.innerHTML = 'Creating Account...';
			axios
				.post(`/account/register`, fields)
				.then((response) => {
					console.log(response.data);
					if (!response.data.sus) {
						if (response.data.is_email_error) {
							this.setState({ error: response.data.err, emailError: true, user: response.data.user });
							// regBtn.classList.remove('disabled');
							regBtn.innerHTML = 'Registered';
							// this.setState({ error: 'Something Went Wrong, Please  Try Again' });
							alert('Something Went Wrong, Please Try Again');
							return;
						}
						this.setState({ error: response.data.err });
						regBtn.classList.remove('disabled');
						regBtn.innerHTML = 'Register';
						alert('Something Went Wrong, Please Try Again');
						this.setState({ error: 'Something Went Wrong, Please Try Again' });
					} else {
						this.setState({ success: 'Please Confirm your email address to complete the registration' });
						alert('Please Confirm your email address to complete the registration');
					}
				})
				.catch((error) => {
					console.error(error);
					regBtn.classList.remove('disabled');
					regBtn.innerHTML = 'Register';
					this.setState({ error: 'Something Went Wrong, Please Reload and Try Again' });
				});
		} else {
			console.error(`Something Went Wrong `, errors);
		}
	}

	resendEmail() {
		const user = this.state.user;
		const reBtn = document.querySelector('.resender');
		reBtn.classList.add('disabled');
		reBtn.innerHTML = 'Sending Activation Link..';
		// console.log(user);
		axios
			.post('/account/email/resend', { user })
			.then((response) => {
				if (!response.data.sus) {
					if (response.data.is_email_error) {
						this.setState({ error: response.data.err, emailError: true });
						reBtn.classList.remove('disabled');
						reBtn.innerHTML = 'Resend My Activation';
						return;
					}
					this.setState({ error: response.data.err });
					reBtn.classList.remove('disabled');
					reBtn.innerHTML = 'Resend My Activation..';
				} else {
					this.setState({ success: 'Please Confirm your email address to complete the registration' });
					alert('Please Confirm your email address to complete the registration');
				}
			})
			.catch((error) => {
				this.setState({ error: response.data.err });
				reBtn.classList.remove('disabled');
				reBtn.innerHTML = 'Resend My Activation..';
			});
	}

	render() {
		const config = {
			first_name: {
				isRequired: 'Firstname field is Required'
			},
			last_name: {
				isRequired: 'Lastname field is Required'
			},
			email: {
				isRequired: 'Email field is Required',
				isEmail: 'Please Enter a Valid Email'
			},
			mobile: {
				isRequired: 'Please Enter a Phone Number'
			},
			password: {
				isRequired: 'Please Enter a Password'
			},
			password_confirmation: {
				isRequired: 'Please fill out the password a second time',
				isEqual: ({ fields }) => ({
					message: 'The two password must match',
					value: fields.password
				})
			}
		};
		return (
			<Fragment>
				<div className="row justify-content-center mt-3">
					<div className="col-md-8">
						{this.state.error && <div className="alert alert-danger">{this.state.error}</div>}
						{this.state.success && <div className="alert alert-success">{this.state.success}</div>}
						{/* {this.state.emailError && (
							<Fragment>
								<div className="row">
									<div className="col-md-12">
										<button
											onClick={this.resendEmail}
											className="btn btn-block btn-primary resender"
										>
											Resend My Activation
										</button>
									</div>
								</div>
							</Fragment>
						)} */}
						<h4 className="text-center text-muted   ">Create a new Account</h4>
						<div className="card">
							<div className="card-header" />
							<div className="card-body">
								<FormValidation config={config} onSubmit={this.onSubmit}>
									{({ fields, errors, submitted }) => (
										<Fragment>
											<div className="form-group">
												<label htmlFor="first_name">Firstname</label>
												<input className="form-control" name="first_name" id="first_name" />
												{submitted &&
												errors.first_name && (
													<div className="help-text text-danger">{errors.first_name}</div>
												)}
											</div>
											<div className="form-group">
												<label htmlFor="last_name">Lastname</label>
												<input className="form-control" name="last_name" id="last_name" />
												{submitted &&
												errors.last_name && (
													<div className="help-text text-danger">{errors.last_name}</div>
												)}
											</div>
											<div className="form-group">
												<label htmlFor="login-email">Email Address</label>
												<input className="form-control " name="email" id="login-email" />
												{submitted &&
												errors.email && (
													<div className="help-text text-danger">{errors.email}</div>
												)}
											</div>
											<div className="form-group">
												<label htmlFor="login-phone">Phone Number</label>
												<input className="form-control" name="mobile" id="login-phone" />
												{submitted &&
												errors.mobile && (
													<div className="help-text text-danger">{errors.mobile}</div>
												)}
											</div>
											<div className="form-group">
												<label htmlFor="login-pass">Password</label>
												<input
													className="form-control"
													type="password"
													name="password"
													id="login-pass"
												/>
												{submitted &&
												errors.password && (
													<div className="help-text text-danger">{errors.password}</div>
												)}
											</div>
											<div className="form-group">
												<label htmlFor="login-cpass">Confirm Password</label>
												<input
													className="form-control"
													type="password"
													name="password_confirmation"
													id="login-cpass"
												/>
												{submitted &&
												errors.password_confirmation && (
													<div className="help-text text-danger">
														{errors.password_confirmation}
													</div>
												)}
											</div>
											<div className="form-group">
												<button className="btn btn-block btn-success regi">Register</button>
											</div>
										</Fragment>
									)}
								</FormValidation>
								{this.state.emailError && (
									<Fragment>
										<div className="row">
											<div className="col-md-12">
												<button
													onClick={this.resendEmail}
													className="btn btn-block btn-primary resender"
												>
													Resend My Activation
												</button>
											</div>
										</div>
									</Fragment>
								)}
								<hr />

								<button className="loginBtn loginBtn--facebook" onClick={this.loginFacebook}>
									{' '}
									Register using Facebook
								</button>
								<br />
								<button className="loginBtn loginBtn--twitter" onClick={this.loginTwitter}>
									Register using Twitter
								</button>

								<div className="m-5" />
							</div>
						</div>
					</div>
				</div>
			</Fragment>
		);
	}
}
