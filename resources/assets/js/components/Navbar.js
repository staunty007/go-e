import React, { Component } from 'react';
import SideNav, { Toggle, Nav, NavItem, NavIcon, NavText } from '@trendmicro/react-sidenav';
import { Link } from 'react-router-dom';

import '@trendmicro/react-sidenav/dist/react-sidenav.css';
 const Navbar = () => {
	 return (
		<div>
			<nav className="navbar navbar-expand-lg navbar-light bg-light">
				<Link className="navbar-brand align-items-center" to="/mobile">
					<img src="/images/logo.png" width="150" alt="logo" />
				</Link>
				{/* <SideNav 
					onSelect={(selected) => {
						 console.log(selected);
					}}
				>
				<SideNav.Toggle />
				<SideNav.Nav defaultSelected="home">
					<NavItem eventKey="home">
						<NavIcon>
							<i className="fa fa-fw fa-home" style={{ fontSize: '1.75em' }} />
						</NavIcon>
						<NavText>
							Home
						</NavText>
					</NavItem>
					<NavItem eventKey="charts">
						<NavIcon>
							<i className="fa fa-fw fa-line-chart" style={{ fontSize: '1.75em' }} />
						</NavIcon>
						<NavText>
							Charts
						</NavText>
						<NavItem eventKey="charts/linechart">
							<NavText>
								Line Chart
							</NavText>
						</NavItem>
						<NavItem eventKey="charts/barchart">
							<NavText>
								Bar Chart
							</NavText>
						</NavItem>
					</NavItem>
				</SideNav.Nav>
				 
				 
				</SideNav> */}
				{/* <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01"
				aria-expanded="false" aria-label="Toggle navigation">
					<span className="navbar-toggler-icon"></span>
				</button> */}

				{/* <div className="collapse navbar-collapse" id="navbarColor01">
					<ul className="navbar-nav mr-auto">
						<li className="nav-item active">
							<a className="nav-link" href="#">Home <span className="sr-only">(current)</span></a>
						</li>
						<li className="nav-item">
							<a className="nav-link" href="#">Features</a>
						</li>
						<li className="nav-item">
							<a className="nav-link" href="#">Pricing</a>
						</li>
						<li className="nav-item">
							<a className="nav-link" href="#">About</a>
						</li>
					</ul>
				</div> */}
			</nav>
		</div>
	 );
}
 
export default Navbar;