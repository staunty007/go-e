import React, { Component } from 'react';
import Rodal from 'rodal';

export default class Rerror extends Component {
	constructor(props) {
		super(props);
	}
	render() {
		return (
			<Rodal
				visible={true}
				animation="slideRight"
				customStyles={
					{
						width: '80vw',
						height: '10vh',
						background: 'red',
						color: '#fff',
						textAlign: 'center',

					}}
				duration={300}
				showCloseButton={true}
			>
				{this.props.message}
			</Rodal>
		);
	}
}