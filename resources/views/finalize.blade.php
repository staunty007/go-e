<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Payment Details</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <style>
            body {
                background-color: #FDFDFD;
            }

            
            .alert-success {
                color: #fafafa;
                background-color: #46db3c;
                border-color: #46db3c;
            }
            .content {

            }
        </style>
    </head>
    <body>
        <div id="app">
            <input type="hidden" value="{{ session('smsNumber') }}" id='number'/>
            <input type="hidden" value="{{ session('smsRef') }}" id='ref'/>
            <input type="hidden" value="{{ session('payment_type') }} " id="paymentType">
            <input type="hidden" value="{{ session('paid_amount') }}" id="paidAmount">
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <div class="title text-center" v-if="loading">
                        <p style="margin-top: 5em; font-size: 2em"> @{{ statusTitle }}</p>
                        <img src='/images/gii.gif' alt="Please Wait" title="Please Wait"/>
                    </div>
                    <div v-else>   
                        <div v-if="sent" style="margin-top: 1em">                     
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="alert alert-success">
                                        Your Payment Was Successful
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-striped table-bordered">
                                                <tr>
                                                    <td>From: </td>
                                                    <td>EKEDC</td>
                                                </tr>
                                                <tr>
                                                    <td>Date: </td>
                                                    <td>{{ date('D-M-Y @ h:i:s a') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Transaction Ref.: </td>
                                                    <td>{{ session('smsRef') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
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
                                                        <th>Meter Type.</th>
                                                        @if(session('payment_type') == 'Prepaid')
                                                        <th>Meter No.</th>
                                                        @else
                                                        <th>Meter No.</th>
                                                        @endif
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>EKEDC {{ session('payment_type') }} Electricity Payment</td>
                                                        <td>{{ session('payment_type')}}
                                                        <td>{{ session('meter_no')}}</td>
                                                        <td>
                                                            <span class="label label-success">Successful</span>
                                                        </td>
                                                </tbody>
                                            </table>
                                            <div class="pull-right">
                                                <p>Amount: ₦{{ session('paid_amount') - 100 }}</p>
                                                <p>Convenience Fee: ₦100</p>
                                                <div>Total Amount: <span style="font-size: 2em">₦{{ session('paid_amount') }}</span></div>
                                                <br>
                                                <div style="margin-top: 1em">
                                                    <a href="{{ url()->previous() }}" class="btn btn-success">Pay Another</a>
                                                    <button class="btn-danger btn" onclick="window.print()">Print Receipt</button>
                                                    <a href="" class="btn btn-info">Refer a Friend</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if='redir'>
                        @if (Auth::check())
                            <p><a href="/home"><small> Back to Home</small></a></p>
                        @else
                            <h5><a href="/">Back to Home</a></h5>
                        @endif
                        {{-- <a href="/home">Back to Home</a> --}}
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
            var app = new Vue({
                el :'#app',
                data: {
                    smsNumber: document.querySelector('#number').value,
                    smsRef: document.querySelector('#ref').value,
                    paymentType: document.querySelector("#paymentType").value,
                    textMsg: "",
                    paidAmount: document.querySelector("#paidAmount").value,
                    apiReq: "",
                    error: false,
                    sent: false,
                    loading: true,
                    redir: false,
                    statusTitle: 'Preparing Your Receipt',
                },
                mounted: function() {
                    // this.loading = false
                    this.sendSMS()
                },
                methods: {
                    sendSMS: function() {

                    this.textMsg = "Meter Token: 424289848298928.\nYour Eko Electricity Distribution Company Plc. " + this.paymentType+" payment of NGN "+this.paidAmount+" was successfull.\nREF: "+this.smsRef+". \nFor support call 0700 000000000";
                    
                    this.apiReq = "http://portal.bulksmsnigeria.net/api/?username=codergab@gmail.com&password=Ayomideg@7&message="+this.textMsg+"&sender=GOENERGEE&mobiles="+this.smsNumber+"";
                    // this.apiReq = 'http://localhost:8000';

                    axios.get(this.apiReq, { crossdomain: true })
                        .then(response => {
                            this.sent = true
                            this.loading = false
                            this.statusTitle = "Done."
                            // this.paymentTitle = 'Payment Successfull'
                            // console.log
                        })
                        .catch(err => {
                            console.log(err);
                        })
                        .finally(() => {
                            this.sent = true
                            this.loading = false                            // setTimeout(() => {
                            //     window.location.href="{{ url('home') }}"
                            // },1000)
                        })
                    }
                }
            })
        </script>
    </body>
</html>

