import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import Rodal from 'rodal';
import 'rodal/lib/rodal.css';
export default class Search extends Component {

	constructor(props) {
		super(props);
		this.filterInput = this.filterInput.bind(this);
		this.showModal = this.showModal.bind(this);
		this.hide = this.hide.bind(this);

		this.state = {
			loaded: false,
			searching: false,
			services: [
				{
					name: 'EKEDC Electricity Prepaid Meter Payment',
					linkTo: '/mobile/services/ekedc/prepaid'
				},
				{
					name: 'EKEDC Electricity Postpaid Meter Payment',
					linkTo: '/mobile/services/ekedc/postpaid'
				}
			],
			emptySearch: false,
			visible: false
		};

	}

	showModal() {
		this.setState({ visible: true })
	}

	hide() {
		this.setState({ visible: false })
	}

	filterInput(e) {
		let input = e.target.value;
		if (input !== "" && input.length >= 3) {
			// console.log(this.state.services);
			this.setState({ searching: true, emptySearch: false, loaded: false });
			// fetch(`lists/services/${input}`)
			// 	.then(res => res.json())
			// 	.then(result => {
			// 		this.setState({ services: result });
			// 		console.log(result);
			// 	})
			this.state.services.forEach(service => {
				let { name } = service;

				if (name.includes(input)) {
					console.log('Found');
					setTimeout(() => {
						this.setState({ loaded: true, searching: false, emptySearch: false })
					}, 2000);
				}else {
					// setTimeout(() => {
						this.setState({ searching: true});
					// console.log('Not Found');
					// },2000)

					setTimeout(() => {
						this.setState({ emptySearch: true, searching: false})
					}, 4000)
				}
			});
			 
			
		}else {
			this.setState({ searching: false, loaded: false, emptySearch: false});
		}
	}

	render() {
		return (
			<div>
				{/* <h4 className="text-center">Quick Search</h4> */}
				<div className="form-group">
					<input type="text" className="form-control .form-control-lg" placeholder="Search For a Biller. E.g EKEDC" onChange={this.filterInput} />
				</div>
				{this.state.searching &&
					<div>
						<p className="text-center">Loading</p>
					</div>
				}
				{this.state.loaded &&
					
					<div style={{ border: '1px solid #f00'}}>
						{this.state.services.map((res, i) => {
							return (
								<Link to={res.linkTo} key={i} className="list-group-item list-group-item-action">
									{res.name}
								</Link>
							
							);
						})}
					</div>
				}
				{this.state.emptySearch && <p className="text-center" style={{ color: 'white', textAlign: 'center', backgroundColor: 'red', padding: '1em'}}>No Results Found</p>}

				<div className="" style={{ marginTop: '1em' }}>
					<h4>Quick Menu</h4>
					<div className="row">
						<div className="col-md-12">
							<div className="card text-white bg-success" onClick={this.showModal}>
								{/* <Link to="/mobile/services/ekedc" className="text-white"> */}
									<div className="card-body">
										Make Payment <i className="fa fa-credit-card"></i>
									</div>
								{/* </Link> */}
							</div>
						</div>
						<br />
					</div>
				</div>
				<br />
				<Rodal
					visible={this.state.visible}
					onClose={this.hide}
					animation="slideUp"
					customStyles={{ width: '80%' }}
					duration="400"
					showCloseButton={true}
				>
					<h4 style={{ marginBottom: '2rem'}}>Select a Service Type</h4>
					<hr />
					<Link to="/mobile/services/ekedc/prepaid" className="btn btn-success btn-block">
						Prepaid Meter Recharge
					</Link>
					<Link to="/mobile/services/ekedc/postpaid" className="btn btn-danger btn-block">
						Postpaid Meter Recharge
					</Link>
				</Rodal>
			</div>
		);
	}
}