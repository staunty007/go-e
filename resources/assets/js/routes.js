import React, { Component } from 'react';
import { Route, Switch } from 'react-router-dom';
import Homepage from './components/Homepage';
import Services from './components/Services';
import NotFound from './components/NotFound';

const Routes = () => {
	return (
		<div>
			<Switch>
				<Route path='/mobile/' component={Homepage} exact={true} />
				<Route path='/mobile/services/:biller/:service?' component={Services} />
				<Route component={NotFound} />
			</Switch>
		</div>
	)
}

export default Routes;