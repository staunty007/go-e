import React, { Component } from 'react';
import Postpaid from './services/Postpaid';
import Prepaid from './services/Prepaid';

export default class Services extends Component {
	constructor(props) {
		super(props);
		
		this.state = {
			paymentType: props.match.params.service
		}
	}

	handlePrepaid() {
		return <Prepaid />
	}

	handlePostpaid() {
		return <Postpaid />
	}
	render() {
		console.log(this.state.paymentType);
		return (
			<div>
				{this.state.paymentType == "prepaid" ? this.handlePrepaid() : this.handlePostpaid()}
				{/* {this.state.paymentType == undefined && 
					<div className="row">
						<div className="col-md-6">
							<button className="btn btn-success">Prepaid Payment</button>
						</div>
						<div className="col-md-6">
							<button className="btn btn-danger">Postpaid Payment</button>
						</div>
					</div>
				} */}
			</div>
		);
	}
}