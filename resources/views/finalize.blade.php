
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
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
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    Finalizing Your Payment   
                    <div v-if="loading">
                        Connecting.... 
                    </div>
                    <div v-else>   
                        <div v-if="sent">
                            Sms Sent Successfully.
                        </div>
                        <div v-else>
                            <div v-if="!sent">
                                Sending sms...
                            </div>
                        </div>
                    </div>

                    <div v-if='redir'>
                        <a href="/">Back to Home</a>
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
                        //var app = this
                    axios.get("http://api.ebulksms.com:8080/sendsms?username=codergab@gmail.com&apikey=13c346d8195b64ae915347fac6e4249d9ca668f2&sender=GOENERGEE&messagetext=Your Electricty Transaction was successfull, Your Payment Referense is "+this.smsRef+"&flash=0&recipients="+this.smsNumber+"")
                        .then(response => {
                            this.sent = true
                            console.log
                        })
                        .catch(err => {
                            console.log(err);
                        })
                        .finally(() => this.redir = true)
                    }
                }
            })
        </script>
    </body>
</html>

