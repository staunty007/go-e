import React, { Component } from "react";
import PropTypes from "prop-types";

class PayStack extends Component {
  constructor(props) {
    super(props);
    this.payWithPaystack = this.payWithPaystack.bind(this);
    this.loadScript = this.loadScript.bind(this);
    this.state = {
      scriptLoaded: null,
    //   text: this.props.text || "Make Payment",
    //   class: this.props.class || this.props.className || "",
      metadata: this.props.metadata || {},
      currency: this.props.currency || "NGN",
      plan: this.props.plan || "",
      quantity: this.props.quantity || "",
      subaccount: this.props.subaccount || "",
      transaction_charge: this.props.transaction_charge || 0,
      bearer: this.props.bearer || "",
    //   disabled: this.props.disabled || false
    };
  }

  componentDidMount() {
    this.setState(
      {
        scriptLoaded: new Promise(resolve => {
          this.loadScript(() => {
            resolve();
          });
        })
      },
      () => {
        if (this.props.embed) {
          this.payWithPaystack();
        }
      }
    );
  }

  loadScript(callback) {
	  const script = document.createElement("script");
	  script.innerHTML = `
	  <script src='https://js.paystack.co/v1/inline.js'></script>
	  var handler = PaystackPop.setup({
		key: 'pk_test_86d32aa1nV4l1da7120ce530f0b221c3cb97cbcc',
		email: 'customer@email.com',
		amount: 10000,
		ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
		metadata: {
		   custom_fields: [
			  {
				  display_name: "Mobile Number",
				  variable_name: "mobile_number",
				  value: "+2348012345678"
			  }
		   ]
		},
		callback: function(response){
			alert('success. transaction ref is ' + response.reference);
		},
		onClose: function(){
			alert('window closed');
		}
	  });
	  handler.openIframe();
		}
	  `;
    document.getElementsByTagName("body")[0].appendChild(script);
    if (script.readyState) {
      // IE
      script.onreadystatechange = () => {
        if (
          script.readyState === "loaded" ||
          script.readyState === "complete"
        ) {
          script.onreadystatechange = null;
          callback();
        }
      };
    } else {
      // Others
      script.onload = () => {
        callback();
      };
    }
  }

  payWithPaystack() {
    this.state.scriptLoaded &&
      this.state.scriptLoaded.then(() => {
        
      });
  }

  render() {
	  return (<React.Fragment>
		{this.payWithPaystack()}
	  </React.Fragment>);
  }
}

PayStack.propTypes = {
  metadata: PropTypes.object,
  currency: PropTypes.string,
  plan: PropTypes.string,
  quantity: PropTypes.string,
  subaccount: PropTypes.string,
  transaction_charge: PropTypes.number,
  bearer: PropTypes.string,
  reference: PropTypes.string.isRequired,
  email: PropTypes.string.isRequired,
  amount: PropTypes.number.isRequired, //in kobo
  paystackkey: PropTypes.string.isRequired,
  callback: PropTypes.func.isRequired,
  close: PropTypes.func.isRequired,
//   disabled: PropTypes.bool
};

export default PayStack;
