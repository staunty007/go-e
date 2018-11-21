import React, { Component } from 'react';
import { Link } from 'react-router-dom';

export default class NotFound extends Component {
	render() {
		return (
			<div>
				<h3 className="text-center">Page Not Found</h3>
				<p>
					<Link to="/mobile/" className="btn btn-success">Go Back Home</Link>
				</p>
			</div>
		);
	}
}