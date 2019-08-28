<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Payment Details</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <script src="https://www.daniarlandis.es/printMe/jquery.min.js"></script>
        <script src="/js/jquery-printme.js"></script>
        <style>
            body {
                background-color: #FDFDFD;
                font-family: "Nunito Sans", sans-serif;
                /* text-align: center; */
            }
            .alert-success {
                color: #fafafa;
                background-color: #46db3c;
                border-color: #46db3c;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {
        
                $("#btn-print").click(function(){
                    $("#DivIdToPrint").printMe({
                        "path" : ["/css/app.css","https://fonts.googleapis.com/css?family=Nunito+Sans"],
                        "title" : "GoEnergee Reciept"
                    });
                });
        
        
            });
            </script>
    </head>
    <body style="font-family: "Nunito Sans", sans-serif;">
        <div id='DivIdToPrint'>
            <div class="row justify-content-center">
                <div class="col-md-10">   
                        <div style="margin-top: 1em">                     
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="alert alert-success">
                                        Your Payment Was Successful
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table class="table table-striped table-bordered">
                                                <tr>
                                                    <td>From: </td>
                                                    <td>EKEDC</td>
                                                </tr>
                                                <tr>
                                                    <td>Date: </td>
                                                    <td> {{ $reciept->created_at->format('d-m-Y H:i:A') }} </td>
                                                </tr>
                                                <tr>
                                                    <td>Transaction Ref.: </td>
                                                    <td>
                                                        {{ $reciept->transaction_ref }}
                                                        @guest
                                                            <small style="font-size: 12px; color: blue; margin-left: 2em">Please Note Down the Transaction Reference</small>
                                                        @endguest
                                                    </td>
                                                </tr>
                                                {{-- <tr v-if="details.cpay_ref !== null">
                                                    <td>CPay Ref: </td>
                                                    <td>@{{ details.cpay_ref }}</td>
                                                </tr> --}}
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-center">
                                            <img src="/images/ekedc.jpg" height="80" style="margin: 1em;"/> 
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Service Paid For.</th>
                                                        <th>{{ $reciept->user_type == "OFFLINE_PREPAID" ? "Meter No" : "Account Number" }}</th>
                                                        <th >Token Data</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>EKEDC Prepaid Electricity Payment</td>
                                                        <td>{{ $reciept->meter_no }}</td>
                                                        <td >
                                                            <span v-if="bsst">
                                                                <b>Std Token:</b> <b><big>{{ $reciept->token_data }}</big></b><br>
                                                                <span class="text-danger"><b>Bsst Token:</b> <b><big>{{ $reciept->bonus_token }}</big></b></span>
                                                            </span>

                                                        </td>
                                                        <td>
                                                            <span class="label label-info">
                                                                <span class="badge badge-info">
                                                                    {{-- @{{ details.payment_status === "CONFIRMED" ? 'Successful' : details.payment_status }} --}}
                                                                    CONFIRMED
                                                                </span>

                                                            </span>
                                                        </td>
                                                </tbody>
                                            </table>
                                            <div class="pull-right">
                                                <p v-if="bsst">
                                                    <span style="color: green;font-weight: bold; font-size: 1.5em;">
                                                        Note: Enter the Best Token before the Std Token
                                                <p v-if="tokenError">
                                                    <span style="color:red; font-weight: bold; font-size: 1em;">
                                                        {{ $reciept->token_data }}
                                                    </span>
                                                </p>
                                                <p>Amount: ₦ {{ $reciept->transaction->initial_amount }}</p>
                                                <p>Convenience Fee: ₦100</p>
                                                <div>Total Amount: 
                                                    <span style="font-size: 2em">
                                                        ₦  {{ $reciept->transaction->total_amount }}
                                                    </span>
                                                </div>
                                                <br>
                                                <div style="margin-top: 1em">
                                                    <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
                                                    <a type='button' id='btn-print' class="btn-danger btn">Print Receipt</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </center>
    </body>
</html>

