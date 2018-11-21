import React, { Component } from 'react';
import { BrowserRouter as Router } from 'react-router-dom';
import Navbar from './Navbar';
import Routes from '../routes';

export default class Header extends Component {
	render() {
		return (
			<Router>
				<div>
					<Navbar />
					<Routes />
				</div>
			</Router>
			
		);
	}
}