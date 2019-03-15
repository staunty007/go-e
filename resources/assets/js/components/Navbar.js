import React, { Component } from 'react';
import SideNav, { Toggle, Nav, NavItem, NavIcon, NavText } from '@trendmicro/react-sidenav';
import { Link } from 'react-router-dom';

import '@trendmicro/react-sidenav/dist/react-sidenav.css';
 const Navbar = () => {
	 return (
		<div>
			<nav className="navbar navbar-expand-lg navbar-light bg-light" style={{ backgroundImage: 'none' }}>
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

				<div className="form-inline my-2 my-lg-0">
					{/* <ul className="navbar-nav mr">
						<li className="nav-item active"> */}
						<Link className="nav-link btn btn-success" to="/mobile/login">Login</Link>
						{/* <Link className="nav-link btn btn-danger" to="#">Home <span className="sr-only">(current)</span></Link> */}
						{/* </li> */}
						{/* <li className="nav-item">
							<a className="nav-link" href="#">Features</a>
						</li>
						<li className="nav-item">
							<a className="nav-link" href="#">Pricing</a>
						</li>
						<li className="nav-item">
							<a className="nav-link" href="#">About</a>
						</li> */}
					{/* </ul> */}
				</div>
			</nav>
		</div>
	 );
}
 
export default Navbar;