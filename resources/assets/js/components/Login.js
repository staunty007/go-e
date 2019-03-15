import React, { Component, Fragment } from 'react';
import { FormValidation } from 'calidation';
import { Link } from 'react-router-dom';
import axios from 'axios';
export default class Login extends Component {
	constructor() {
		super();

		this.state = {
			error: null,
			success: null
		};

		this.onSubmit = this.onSubmit.bind(this);
		this.loginFacebook = this.loginFacebook.bind(this);
		this.loginTwitter = this.loginTwitter.bind(this);
	}

	onSubmit({ fields, errors, isValid }) {
		if (isValid) {
			// This is where we'd handle our submission...
			// `fields` is an object, { field: value }
			const signInBtn = document.querySelector('#signin');
			signInBtn.classList.add('disabled');
			signInBtn.innerHTML = 'Signing in...';
			// Send Ajax Request
			const { email, password } = fields;
			axios
				.post(`/account/login`, { email, password })
				.then((response) => {
					console.log(response.data);
					if (!response.data.sus) {
						this.setState({ error: response.data.err });
						signInBtn.classList.remove('disabled');
						signInBtn.innerHTML = 'Login';
					} else {
						console.log(response.data);
						this.setState({ success: 'Login Successful' });
						setTimeout(() => {
							location.href = '/home';
						}, 1000);
					}
				})
				.catch((fail) => {
					signInBtn.classList.remove('disabled');
					signInBtn.innerHTML = 'Login';
					this.setState({ error: 'Ooops!, Something Went Wrong' });
					console.log('Something Failed - ' + fail);
				});
			// console.log('Everything is good:', fields);
		}
	}

	loginTwitter() {
		location.href = '/login/twitter';
	}

	loginFacebook() {
		location.href = '/login/facebook';
	}

	render() {
		const config = {
			email: {
				isRequired: 'Email field is required!',
				isEmail: 'Valid emails only, please!'
			},
			password: {
				isRequired: 'Password field required!'
			}
		};

		return (
			<Fragment>
				<div className="row justify-content-center mt-3">
					<div className="col-md-8">
						{this.state.error && <div className="alert alert-danger">{this.state.error}</div>}
						{this.state.success && <div className="alert alert-success">{this.state.success}</div>}
						<h4 className="text-center text-muted">Login to your Account</h4>
						<div className="card">
							<div className="card-body">
								<FormValidation config={config} onSubmit={this.onSubmit}>
									{({ fields, errors, submitted }) => (
										<Fragment>
											<div className="form-group">
												<label htmlFor="login-email">Email</label>
												<input
													className="form-control"
													type="email"
													name="email"
													id="login-email"
												/>
												{submitted &&
												errors.email && (
													<div className="help-text text-danger">{errors.email}</div>
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
												<button className="btn btn-block btn-success" id="signin">
													Signin
												</button>
											</div>
										</Fragment>
									)}
								</FormValidation>
								<hr />

								<button className="loginBtn loginBtn--facebook" onClick={this.loginFacebook}>
									Login with Facebook
								</button>
								<br />
								<button className="loginBtn loginBtn--twitter" onClick={this.loginTwitter}>
									Login with Twitter
								</button>

								<hr />
								<Link to="/mobile/register" className="btn btn-block btn-success btn-sm">Create a New Account</Link>

								<div className="m-5" />
							</div>
						</div>
					</div>
				</div>
			</Fragment>
		);
	}
}
