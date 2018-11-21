import React, { Component } from 'react';
import { render } from 'react-dom';
import { BrowserRouter as Router } from "react-router-dom";
import Header from './Header';
// import Routes from '../routes';
// import Error from './states/error';
class Main extends Component {
	render() {
		return (
				<div>
					<Header />
				</div>
		);
	}
}

render(<Main />, document.getElementById('app-root'));

// export default Main;
