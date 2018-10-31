import React, { Component } from "react";
import ReactDOM from "react-dom";

export default class Example extends Component {
  constructor(props) {
    super(props);
  }

  componentDidMount() {
    console.log(jsVars.data);
  }
  render() {
    return (
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-md-8">
            <div className="card">
              <div className="card-header">Example Component</div>

              <div className="card-body">
                {this.props.dataFrom}
                <br />
                {jsVars.data}
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

if (document.getElementById("app")) {
  ReactDOM.render(<Example dataFrom="5" />, document.getElementById("app"));
}
