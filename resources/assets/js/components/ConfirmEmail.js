import React, { Component } from 'react'

export default class ConfirmEmail extends Component {
  render() {
    return (
      <div className="container m-2">
        <img src="/images/accept.svg" className="img-fluid" />
        <h3 className="m-2a text-muted">
            Yay!, You are now signed up!
        </h3>
        <h4 className="m-2 text-muted">
            Please check your email address, and we'd continue from there!
        </h4>
      </div>
    )
  }
}
