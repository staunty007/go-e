import React, { Component } from 'react';

import Slider from './Slider';
import Search from './Search';

export default class Homepage extends Component {
	render() {
		return (
			<div>
				
				<div className="jumbotron-fluid">
					<Slider />
				</div>

				<div className="container">
					<div className="row justify-content-center">
						<div className="col-md-12 m-t-md" style={{ marginTop: '1em'}}>
							<Search />
						</div>
					</div>

					<div className="card1">
						<div className="cards">
							<p className="text-success text-bold">More Power Options to Recharge!</p>
						</div>
					</div>
					<div className="card card-gradient">
						<div className="card-body text-right">
							<h4 className="card-title">mVisa</h4>
							<h6 className="card-subtitle mb-2 text-muted">Easy Payment via QR Code</h6>
						</div>
					</div>
					<div className="card card-gradient">
						<div className="card-body text-right">
							<h4 className="card-title">POS</h4>
							<h6 className="card-subtitle mb-2 text-muted">Our agents are readily available</h6>
						</div>
					</div>
					<div className="card card-gradient">
						<div className="card-body text-right">
							<h4 className="card-title">CASH</h4>
							<h6 className="card-subtitle mb-2 text-muted">Visit any of our sales outlets</h6>
						</div>
					</div>
				</div>
			</div>
		);
	}
}