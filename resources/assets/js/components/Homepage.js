import React, { Component } from 'react';
import MaterialIcon from 'material-icons-react';
import Slider from './Slider';
import Search from './Search';

export default class Homepage extends Component {
	constructor(props) {
		super(props);

		this.login = this.login.bind(this);
		this.register = this.register.bind(this);
	}

	login() {
		this.props.history.push('/mobile/login');
	}

	register() {
		this.props.history.push('/mobile/register');
	}

	render() {
		return (
			<div>
				<div className="jumbotron-fluid">
					<Slider />
				</div>
				<div className="container">
					<div className="row justify-content-center">
						<div className="col-md-12 m-t-md" style={{ marginTop: '1em' }}>
							<Search />
						</div>
					</div>
					<div className="grid">
						
						<div className="grid-child">
							<div className="text-right">
								<h4 className="card-title text-white" style={{ fontSize: '18px' }}>QR</h4>
								<h6 className="card-subtitle mb-2 text-white" style={{ fontSize: '10px'}}>Easy Payment via QR Code</h6>
								<h6 className="text-white" style={{ fontSize: '10px'}}>Coming Soon </h6>
							</div>
						</div>
						
						<div className="grid-child">
							<div className="text-right">
								<h4 className="card-title text-white" style={{ fontSize: '18px' }}>POS</h4>
								<h6 className="card-subtitle mb-2 text-white" style={{ fontSize: '10px'}}>Our agents are readily available</h6>
								<h6 className="text-white" style={{ fontSize: '10px'}}>Coming Soon</h6>
							</div>
						</div>
						
						<div className="grid-child">
							<div className="text-right">
								<h4 className="card-title text-white" style={{ fontSize: '18px' }}>CASH</h4>
								<h6 className="card-subtitle mb-2 text-white" style={{ fontSize: '10px'}}>Visit any of our sales outlets</h6>
								<h6 className="text-white" style={{ fontSize: '10px'}}>Coming Soon</h6>
							</div>
						</div>
						
					</div>
				</div>
				{/* <div className="container">
					<div className="row">
						<div className="col-12">
							<div className="card card-gradient-green" onClick={this.login}>
								<div className="card-body" onClick={this.showModal}>
									<div className="row">
										
										<div className="col-4 text-left">
											<MaterialIcon icon="account_circle" size={60} color='#92CA40' />
										</div>
										<div className="col-8 text-right">
											<h4 className="card-title" style={{ color: '#92CA40' }}>Sign In</h4>
											<h6 className="text-muted">Login to your daashboard</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div className="col-12">
							<div className="card card-gradient-green" onClick={this.register}>
								<div className="card-body" onClick={this.showModal}>
									<div className="row">
										<div className="col-8">
											<h5 className="card-title" style={{ color: '#92CA40' }}>Create an Account</h5>
											<h6 className="text-muted">Sign up a new account</h6>
										</div>
										<div className="col-4 text-right">
											<MaterialIcon icon="supervisor_account" size={60} color='#92CA40' />
										</div>
									</div>
								</div>
							</div>
						</div>

						<div className="col-12">
							<Search />
						</div>
					</div>
					{/* Services Coming Soon *
					<div className="row">
						<div className="col-12 mt-3 mb-2">
							<h4 className="text-muted">Coming Soon...</h4>
						</div>
						<div className="col-12">
							<button className="btn btn-primary btn-block" disabled>
								QR
								<br />
								Easy Payment Via QR Code
							</button>
							<button className="btn btn-primary btn-block" disabled>
								POS
								<br />
								Our Agents are Readily Available
							</button>
							<button className="btn btn-primary btn-block" disabled>
								CASH<br />
								Visit Any of Our Sales Outlet
							</button>
						</div>
					</div>
				</div> */}
			</div>
		);
	}
}
