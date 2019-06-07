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
                font-family: "Nunito Sans", sans-serif;
                /* text-align: center; */
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
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="title text-center" v-if="loading">
                        <p style="margin-top: 5em; font-size: 2em"> @{{ statusTitle }}</p>
                        <iframe width="500" height="500" src="https://lottiefiles.com/iframe/693-skeleton-loading" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div v-else>   
                        <div v-if="sent" style="margin-top: 1em">                     
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
                                                    <td>@{{ orderDate }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Transaction Ref.: </td>
                                                    <td>
                                                        @{{ details.payment_ref }}
                                                        @guest
                                                            <small>Please Note Down the Transaction Reference</small>
                                                        @endguest
                                                    </td>
                                                </tr>
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
                                                        <th>@{{ details.user_type === "OFFLINE_PREPAID" ? 'Meter No.': 'Account Number' }}</th>
                                                        <th v-if="!tokenError">Token Data</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>EKEDC @{{ details.user_type === "OFFLINE_PREPAID" ? 'Prepaid': 'Postpaid' }} Electricity Payment</td>
                                                        <td>@{{ details.meter_no }}</td>
                                                        <td v-if="!tokenError">
                                                            <span v-if="bsst">
                                                                <b>Std Token:</b> <b><big>@{{ details.token_data}}</big></b><br>
                                                                <span class="text-danger"><b>Bsst Token:</b> <b><big>@{{ details.bonus_token }}</big></b></span>
                                                            </span>
                                                            <span v-else>
                                                                <b><big>@{{ details.token_data}}</big></b>
                                                            </span>

                                                        </td>
                                                        <td>
                                                            <span class="label label-info">
                                                                <span class="badge badge-info">
                                                                    @{{ details.payment_status === "CONFIRMED" ? 'Successful' : details.payment_status }}</span>

                                                            </span>
                                                        </td>
                                                </tbody>
                                            </table>
                                            <div class="pull-right">
                                                <p v-if="bsst">
                                                    <span style="color: green;font-weight: bold; font-size: 1.5em;">
                                                        Note: Enter the Bsst Token before the Std Token
                                                <p v-if="tokenError">
                                                    <span style="color:red; font-weight: bold; font-size: 1em;">
                                                        @{{ details.token_data }}
                                                    </span>
                                                </p>
                                                <p>Amount: ₦@{{ details.transaction !== null ? details.transaction.initial_amount : details.agent_transaction.initial_amount }}</p>
                                                <p>Convenience Fee: ₦100</p>
                                                <div>Total Amount: 
                                                    <span style="font-size: 2em">
                                                        ₦@{{ details.transaction !== null ? details.transaction.total_amount : details.agent_transaction.total_amount }}
                                                    </span>
                                                </div>
                                                <br>
                                                <div style="margin-top: 1em">
                                                    <a href="{{ url()->previous() == url()->current() ? '/guest/each-service-type' : url()->previous() }}" class="btn btn-success">Pay Another</a>
                                                    <a :href="'/download-reciept/' + details.payment_ref" class="btn-danger btn">Print Receipt</a>
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
        </center>
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="/js/moment.js"></script>
        <script src="/js/moment-locals.js"></script>
        <script>
            let orderId = "{{ $orderId }}";

            var app = new Vue({
                el :'#app',
                data: {
                    apiReq: "",
                    error: false,
                    sent: false,
                    loading: true,
                    redir: false,
                    statusTitle: 'Preparing Your Receipt..',
                    orderid: orderId,
                    details: [],
                    bsst: false,
                    tokenError: false,
                    orderDate: '',
                    user_type: "{{ $user_type }}",
                    
                },
                mounted: function() {
                    this.fetchOrderDetails()
                    this.sendSMS()
                },
                methods: {
                    fetchOrderDetails: function() {
                        // let app = this;
                        axios.get(`/fetch/${this.orderid}/${this.user_type}`)
                            .then(res => {
                                this.details = res.data;
                                if(this.details.bonus_token !== "" && this.details.bonus_token.length > 10) {
                                    this.bsst = true;
                                }

                                if(
                                    !this.details.token_data || 
                                    this.details.token_data.length > 20 
                                    || this.details.user_type == "OFFLINE_POSTPAID"
                                ) {
                                        this.tokenError = true;
                                }

                                this.orderDate = new Date(Date.parse(res.data.created_at));
                                this.orderDate = moment(this.orderDate).format('llll');
                            })
                            .catch(err => {
                                this.error = true;
                                console.log(err);
                            });
                    },
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
                            setTimeout(() => {
                                this.loading = false                            // setTimeout(() => {
                            },5000)
                            //     window.location.href="{{ url('home') }}"
                            // },1000)
                        })
                    }
                }
            })
        </script>
    </body>
</html>

