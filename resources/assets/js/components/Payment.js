import React, { Component } from "react";
import PropTypes from "prop-types";

class PayStack extends Component {
  constructor(props) {
    super(props);
    this.payWithPaystack = this.payWithPaystack.bind(this);
    this.loadScript = this.loadScript.bind(this);
    this.state = {
      scriptLoaded: null,
      text: this.props.text || "Make Payment",
      class: this.props.class || this.props.className || "",
      metadata: this.props.metadata || {},
      currency: this.props.currency || "NGN",
      plan: this.props.plan || "",
      quantity: this.props.quantity || "",
      subaccount: this.props.subaccount || "",
      transaction_charge: this.props.transaction_charge || 0,
      bearer: this.props.bearer || "",
      disabled: this.props.disabled || false
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
    script.src = "https://js.paystack.co/v1/inline.js";
    document.getElementsByTagName("head")[0].appendChild(script);
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
        let paystackOptions = {
          key: this.props.paystackkey,
          email: this.props.email,
          amount: `${this.props.amount}00`,
          ref: this.props.reference,
          metadata: this.state.metadata,
          callback: response => {
            this.props.callback(response);
          },
          onClose: () => {
            this.props.close();
          },
          currency: this.state.currency,
          plan: this.state.plan,
          quantity: this.state.quantity,
          subaccount: this.state.subaccount,
          transaction_charge: this.state.transaction_charge,
          bearer: this.state.bearer
        };
        if (this.props.embed) {
          paystackOptions.container = "paystackEmbedContainer";
        }
        const handler = window.PaystackPop.setup(paystackOptions);
        // if (!this.props.embed) {
          handler.openIframe();
        // }
      });
  }

  render() {
    return this.props.embed ? (
      <div id="paystackEmbedContainer" />
    ) : (
		<span>
			{this.payWithPaystack()}	
        {/* <button
          type="button"
          className={this.state.class}
          onClick={this.payWithPaystack}
          disabled={this.state.disabled}
        >
          {this.state.text}
        </button> */}
      </span>
    );
  }
}

PayStack.propTypes = {
  embed: PropTypes.bool,
  text: PropTypes.string,
  class: PropTypes.string,
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
  disabled: PropTypes.bool
};

export default PayStack;