import React, { Component } from 'react';
import Carousel from 'nuka-carousel';

export default class Slider extends Component {

	render() {
		return (
			<Carousel>
				<img src="/mobile-sys/images/2.png" height="200" style={{ width: '100%', objectFit: 'cover' }}/>
				<img src="/mobile-sys/images/7.png" height="200" style={{ width: '100%', objectFit: 'cover' }}/>
				{/* <img src="/mobile-sys/images/slide1.jpg" height="200" style={{ width: '100%' }}/>
				<img src="/mobile-sys/images/slide1.jpg" height="200" style={{ width: '100%' }}/>
				<img src="/mobile-sys/images/slide1.jpg" height="200" style={{ width: '100%' }}/> */}
			</Carousel>
		);
	}
}