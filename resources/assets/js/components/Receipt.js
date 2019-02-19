import React, { Component, Fragment } from 'react';
import ContentLoader from 'react-content-loader';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import * as moment from 'moment';
// import * as jsPDF from 'jspdf';

export default class Receipt extends Component {
    constructor(props) {
        super(props);

        this.state = {
            loading: true,
            receipt: null,
        };

        this.saveAsPdf = this.saveAsPdf.bind(this);
    }
    componentDidMount() {
        console.log('Mounted');
        fetch(`/fetch/${this.props.match.params.order}/${this.props.match.params.user}`)
            .then(res => res.json())
            .then(result => {
                this.setState({ receipt: result, loading: false});
            })

        // console.log('rECEIPT', this.state.receipt);
    }

    saveAsPdf() {
        if(!this.state.loading) {
            // const pdfView = new jsPDF();
            let specialElementHandlers = {
                '#editor': function(element, renderer){
                    return true;
                },
            };

            const htmlView = document.querySelector("#app-root").innerHTML;
            // console.log(htmlView);
            pdfView.fromHTML(htmlView, 15, 15, {
                'width': 170,
                'elementHandlers': specialElementHandlers
            });

            pdfView.save('GOENERGEE_PAYMENT_RECEIPT.pdf');       
        }else {
            console.log('Not Done with rendering.... Waiting');
        }
    }
    
    render() {
        return (
            <Fragment>
                <div>
                <div id="editor"></div>
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
                                        <h6><u>Receipt Details</u></h6>
                                        <p>
                                            <h6>Date: </h6><span>{
                                            moment(new Date(Date.parse(this.state.receipt.created_at))).format('llll')
                                            
                                            }</span>
                                        </p>
                                        <p>
                                            <h6>Transaction Ref: </h6>
                                            
                                            <span>{this.state.receipt.payment_ref}</span>
                                        </p>
                                       <h6><u>Transaction Details</u></h6>
                                       <p>
                                            <h6>Service Paid For:</h6>
                                           <span>EKEDC {
                                               
                                               this.state.receipt.user_type.split('_',2)[1]
                                            } Electricity Payment
                                            </span>
                                       </p>
                                       <p>
                                           <h6>Meter / Acc. No.</h6>
                                           {this.state.receipt.meter_no}
                                       </p>
                                    
                                        {
                                            this.state.receipt.token_data && 
                                            <p>
                                                <h6>Standard Token: </h6>
                                                { this.state.receipt.token_data }
                                            </p>
                                        }
                                           
                                       
                                       {
                                            this.state.receipt.bsst_token &&
                                            <p>
                                                <h6>Bsst Token</h6>
                                                { this.state.receipt.bsst_token }
                                            </p>
                                       }
                                       <p>
                                           <span className="pulled-left">
                                            <strong>Status</strong>
                                            </span>
                                            <span className="pulled-right badge badge-success">Successful</span>
                                       </p>
                                       {
                                           this.state.receipt.bsst_token && <span className="text-warning">Please Enter the Bsst Token Before the Standard</span>
                                       }
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-md-6">
                            <Link to='/mobile' className='btn btn-primary'>Make Another Payment</Link>
                        </div>
                        <div className="col-md-6">
                            <button className="btn btn-success" onClick={window.print}>Download Receipt</button>
                        </div>
                    </div>
                </Fragment>
            }
            </div>
            </Fragment>
        );
    }
}