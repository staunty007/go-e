import React, { Component, Fragment } from 'react';
import ContentLoader from 'react-content-loader';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";

export default class Receipt extends Component {
    constructor(props) {
        super(props);

        this.state = {
            loading: true,
            receipt: null,
        };
    }
    componentDidMount() {
        fetch(`/fetch/${this.props.match.params.order}/${this.props.match.params.user}`)
            .then(res => res.json())
            .then(result => {
                this.setState({ receipt: result, loading: false})
            })
    }
    render() {
        return (
            <Fragment>
            { this.state.loading ?
                (
                    <div className="row justify-content-center">
                        <div className="col-md-8 py-4">
                        <h5 className="text-center text-success">Preparing Your Receipt</h5>
                            <ContentLoader 
                                height={500}
                                width={400}
                                speed={2}
                                primaryColor="#f59295"
                                secondaryColor="#f7afaf"
                                // {...props}
                            >
                                <rect x="14.23" y="6.67" rx="0" ry="0" width="383.38" height="296.35" /> 
                                <rect x="35.22" y="315.37" rx="3" ry="3" width="332.5" height="6.08" /> 
                                <rect x="36.22" y="337.37" rx="3" ry="3" width="332.5" height="6.08" /> 
                                <rect x="36.22" y="360.37" rx="3" ry="3" width="332.5" height="6.08" />
                            </ContentLoader>
                            
                        </div>
                    </div>                      

                )
                :
                <Fragment>
                    <div className="jumbotron text-center" style={{ marginBottom: 0}}>Transaction Receipt</div>
                    <div className="alert alert-success">
                        Transaction Successful
                    </div>
                    <div className="container">
                        <div className="row">
                            <div className="col-md-12">
                                <p className="text-center">
                                    <img src="/mobile-sys/images/logo.png" width={150}/>
                                </p>
                                <div className="card">
                                    <div className="card-body">
                                        <h6>Receipt Details</h6>
                                        <p>
                                            <strong>Date: </strong>
                                        </p>
                                        <p>
                                            <strong>Transaction Ref: </strong>
                                        </p>
                                       <h6>Transaction Details</h6>
                                       <p>
                                           <u>Service Paid For: </u><br />
                                           EKEDC Prepaid Electricity Payment
                                       </p>
                                       <p>
                                           <strong>Meter No.</strong>
                                           
                                       </p>
                                       <p>
                                           <strong>Standard Token</strong>

                                       </p>
                                       <p>
                                           <strong>Bsst Token</strong>

                                       </p>
                                       <p>
                                           <span className="pulled-left">
                                            <strong>Status</strong>
                                            </span>
                                            <span className="pulled-right badge badge-success">Successful</span>
                                       </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </Fragment>
            }
            </Fragment>
        );
    }
}