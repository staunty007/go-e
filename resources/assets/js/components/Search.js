import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import MaterialIcon, { colorPalette } from 'material-icons-react';
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
			services: undefined,
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
			fetch(`lists/services/${input}`)
				.then(res => res.json())
				.then(result => {
					if(result && result.length > 0) {
						console.log(result);
						this.setState({ services: result, searching: false, loaded: true});
						this.setState({  });
					}else {
						this.setState({ searching: false, emptySearch: true, loaded: false});
					}
					// this.setState({ services: result });
					// console.log(result);
				});
			 
			
		}else {
			this.setState({ searching: false, loaded: false, emptySearch: false});
		}
	}

	render() {
		return (
			<div>
				{/* <h4 className="text-center">Quick Search</h4> */}
				{/* <div className="form-group">
					<input type="text" className="form-control .form-control-lg" placeholder="Search For a Biller. E.g EKEDC" onChange={this.filterInput} />
				</div> */}
				{this.state.searching &&
					<div>
						<p className="text-center">Loading</p>
					</div>
				}
				{this.state.loaded && this.state.services &&
					
					<div style={{ border: '1px solid #f00'}}>
						{this.state.services.map((service, i) => {
							return (
								
								<p key={i}>{service.title}</p>
							
							);
						})}
					</div>
				}
				{this.state.emptySearch && <p className="text-center" style={{ color: 'white', textAlign: 'center', backgroundColor: 'red', padding: '1em'}}>No Results Found</p>}

				{/* <div className="card card-gradient-red">
					<div className="card-body" onClick={this.showModal}>
						<div className="row">
							<div className="col-8">
								<h4 className="card-title" style={{ color: '#EE262B' }}>Quick Payment</h4>
								<h6 className="text-muted">Quickly Recharge your meters</h6>
							</div>
							<div className="col-4 text-right">
								<MaterialIcon icon="credit_card" size={60} color='#EE262B' />
							</div>
						</div>
					</div>
				</div> */}
				<div className="row">
						<div className="col-md-12">
							<div className="card text-white bg-success" onClick={this.showModal}>
								{/* <Link to="/mobile/services/ekedc" className="text-white"> */}
									<div className="card-body text-center">
										Make Payment
									</div>
								{/* </Link> */}
							</div>
						</div>
						<br />
					</div>
				

				<Rodal
					visible={this.state.visible}
					onClose={this.hide}
					animation="slideUp"
					customStyles={{ width: '80%' }}
					duation={400}
					showCloseButton={true}
				>
					<h6 style={{ marginBottom: '2rem'}} className="text-muted">Select a Service Type</h6>
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