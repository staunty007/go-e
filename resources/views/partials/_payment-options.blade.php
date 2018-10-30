<div class="modal fade" tabindex="-1" role="dialog" style="" id="payment-options">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header headermodal text-center">
                <button onclick="prevModalPaymentOptions()" class="btn btn-danger pull-right">Back</button>
            </div>
            <div id="payment-modal">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                                <div class="list-group">
                                    <a href="#" class="list-group-item active text-center">
                                        <h4 class="fa fa-credit-card"></h4><br />Card Payment
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h4 class="fa fa-university"></h4><br />Bank to Bank
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h4 class="fa fa-university"></h4><br />mVisa
                                    </a>
                                    {{-- <a href="#" class="list-group-item text-center">
                                        <h4 class="glyphicon glyphicon-road"></h4><br />Train
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h4 class="glyphicon glyphicon-home"></h4><br />Hotel
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h4 class="glyphicon glyphicon-cutlery"></h4><br />Restaurant
                                    </a> --}}
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                                <!-- card section -->
                                <div class="bhoechie-tab-content active">
                                    <center>
                                        <button class="btn btn-primary btn-lg" onclick="payWithPaystack();">Continue to Card Payment</button>
                                    </center>
                                </div>
                                <!-- bank section -->
                                <div class="bhoechie-tab-content">
                                    <center>
                                        <div class="form-group">
                                            <label>Please Select Your Bank</label>
                                            <select class="form-control" name="bank_payment" id="bank_payment">
                                                <option value="">Select your bank</option>
                                                <option value="Diamond">Diamond Bank</option>
                                                <option value="Zenith">Zenith Bank</option>
                                            </select>
                                        </div>
                                        <div class="other">
                                            <div class="form-group">
                                                <label>Please Enter Your Account Number</label>
                                                <input type="text" class="form-control" id="nuban" name="account">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-block btn-primary" id="make-btn" disabled>Make Payment</button>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                                <div class="bhoechie-tab-content">
                                    <center>
                                        <h3>Please Scan the QR Code below</h3>
                                        <img src="/images/qr-code.svg" draggable="false" height="100" />
                                        <h3>Amount: N<span id="mvisa"></span></h3>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="response">

            </div>
            
        </div>
    </div>
</div><!-- /.modal-content -->