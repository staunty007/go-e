import React, { Component } from 'react';
import { Route, Switch } from 'react-router-dom';
import Homepage from './components/Homepage';
import Services from './components/Services';
import Receipt from './components/Receipt';
import NotFound from './components/NotFound';
import Login from './components/Login';
import Register from './components/Register';

const Routes = () => {
	return (
		<div>
			<Switch>
				<Route path='/mobile/' component={Homepage} exact={true} />
				<Route path='/mobile/services/:biller/:service?' component={Services} />
				<Route path="/mobile/receipt/:order/:user" component={Receipt} />
				<Route path="/mobile/login" component={Login} />
				<Route path="/mobile/register" component={Register} />
				<Route component={NotFound} />
			</Switch>
		</div>
	)
}

export default Routes;