
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Finalizing Payment</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito Sans', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 36px;
                padding: 20px;
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
                <div class="title">
                      Finalizing Your Payment <br>
                    <div v-if="loading">
                        
                        Connecting.... 
                    </div>
                    <div v-else>   
                        <div v-if="sent || redir">
                                <p>Sms Sent successfully</p>
                                <img src="/images/mail-sent.gif" width="150"/>
                        </div>
                        <div v-else>
                            <div v-if="!sent">
                                    <p>Sending SMS</p>
                                
                                <img src="/images/loading.gif" width="150"/>
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
        </div>

        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
            var app = new Vue({
                el : '#app',
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
                    redir: false
                },
                mounted: function() {
                    this.loading = false
                    this.sendSMS()
                },
                // created:  {
                //     this.sendSMS();
                // }
                methods: {
                    sendSMS: function() {

                    this.textMsg = "Meter Token: 424289848298928.\nYour Eko Electricity Distribution Company Plc. " + this.paymentType+" payment of NGN "+this.paidAmount+" was successfull.\nREF: "+this.smsRef+". \nFor support call 0700 000000000";
                    
                    this.apiReq = "http://portal.bulksmsnigeria.net/api/?username=codergab@gmail.com&password=Ayomideg@7&message="+this.textMsg+"&sender=GOENERGEE&mobiles="+this.smsNumber+"";

                    axios.get(this.apiReq, { crossdomain: true })
                        .then(response => {
                            this.sent = true
                            console.log
                        })
                        .catch(err => {
                            console.log(err);
                        })
                        .finally(() => {
                            this.redir = true
                            // setTimeout(() => {
                            //     window.location.href="{{ url('home') }}"
                            // },1000)
                        })
                    }
                }
            })
        </script>
    </body>
</html>

