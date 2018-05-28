<!DOCTYPE html>

<head>

    <title>GOENERGEE</title>

    <link href="images/favicon.png" rel="shortcut icon" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    {{-- <link href="css/main.css" rel='stylesheet' type='text/css'> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <style>
        #postpaid {
            min-width: 50%;
            max-width: 100%;
            margin: 1em auto;
            box-shadow: 0px 0px 3px 4px #e6e6e61f;
            padding: 2em;
            border-radius: 3px;
            line-height: 2.5;
            display: none;
        }
        input {
            background: none;
            border: 1px solid #dcdcdc;
        }
        .form-control {
            border-radius: 0;
        }
    </style>

    
</head>

<body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 2rem 3rem; background: rgba(255,255,255,1) !important; border-bottom:5px solid #ED1F24">
            <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/logo.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                        
                    <div class="nav-item">
                        @if(Auth::check())
                        <a class="btn btn-danger" href="/home"><i class="fas fa-home"></i> Go Home</a>
                        @else
                        <a class="btn btn-danger" href="/"><i class="fas fa-home"></i> Go Home</a>
                        @endif
                    </div>
                </ul>
            </div>
            </div>
        </nav>
        <div class="container" style="background: white;">
            <br><br><br>
            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group">
                        <label>Select a Payment Category</label>
                        <div class="btn-group">
                            <button id="" class="btn btn-success btn-md">Postpaid Payment</button>
                        </div>
                        <select name="" id="selectCat" class="form-control">
                            <option value="" selected>Select a Payment Category</option>
                            <option value="1">Postpaid Payment</option>
                            <option value="2">Reconnection Fee</option>
                            <option value="3">Penalties</option>
                            <option value="4">Loss of Revenue</option>
                        </select>
                    </div>

                    <div id="postpaid">
                        <h4>Please fill in your details for <span class="holder"></span></h4>
                        <form class="postpay" action="" method="POST">
                            <div class="form-group">
                                <label for="">Account or Meter Number</label>
                                <input type="text" name="meter_no" class="meterno form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input type="email" name="email" class="email form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" name="mobile" class="mobile form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Convenience Fee</label>
                                <input type="text" name="conv_fee" value="100.00" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="text" name="amount" placeholder="0.00" class="amount form-control">
                            </div><br>
                            <input type="hidden" id="payType" value="" />
                            <div class="form-group">
                                <button class="btn btn-success btn-block" id="payPostpaid">Continue</button>
                            </div>
                    </div>


                </div>

                <div class="col-lg-6" id="side-banner">
                        <div class="row">
                            <div class="col-12">

                            <h5>Information Portal</h5>

                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img alt="image" class="img-responsive" src="{{asset('images/12.png')}}">
                                    </div>
                                    <div class="carousel-item">
                                        <img alt="image" class="img-responsive" src="{{asset('images/banne.jpg')}}">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                            </div> 
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="/js/sweetalert.min.js"></script>

    <footer style="padding: 1rem 2rem; background-color: #333; color: #fff; text-align: center">
        Powered by GOENERGEE
    </footer>

    <script>
        $(document).ready(function() {
            $('#selectCat').select2();
            $("#selectCat").change(function(){
                var selected = this.value;
                console.log(selected);
                switch (selected) {
                    case '1':
                        $("#postpaid").css({'display':'block'});
                        document.querySelector('.holder').innerHTML = "Postpaid Payment";
                        $("#payType").val("Postpaid");
                        break;
                    case '2':
                        $("#postpaid").css({'display':'block'});
                        document.querySelector('.holder').innerHTML = "Reconnection Fee";
                        $("#payType").val("Reconnection");
                        break;
                    case '3':
                        $("#postpaid").css({'display':'block'});
                        document.querySelector('.holder').innerHTML = "Penalties Fee";
                        $("#payType").val("Penalties");
                        break;
                    case '4':
                        $("#postpaid").css({'display':'block'});
                        document.querySelector('.holder').innerHTML = "Loss of Revenue";
                        $("#payType").val("Loss of Revenue");
                        break;
                    default:
                    $("#postpaid").css({'display':'none'});
                        break;
                }
            });
        });

        var sum = 0;
        $(document).ready(function () {
            $('.carousel').carousel();
            //iterate through each textboxes and add keyup
            //handler to trigger sum event
            $(".txt").each(function () {

                $(this).keyup(function () {
                    calculateSum();
                });
            });

        });

        function calculateSum() {
            var sum = 0;
            $(".txt").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    var subtotal = parseFloat(this.value) + 100;
                    sum += subtotal;
                    jQuery(this).closest('tr').find("td:last input").val(subtotal);
                }
            });
            console.log(sum);
            $("#totalPayblleAmount").val(sum.toFixed(2));
            $("#sum").val(sum.toFixed(2));
        }
    </script>


    <script type="text/javascript">
        
        var payUrl = "payment/hold/postpaid";
                   
        $("#payPostpaid").click((e) => {
            e.preventDefault();
            $('#payPostpaid').prop('disabled', true);
            $('#payPostpaid').html('Verifying...');

            formdata = $(".postpay").serialize();
            
            $.ajax({
                url: '/meter/api',
                method: "POST",
                data: { meter_no: $(".meterno").val() },
                success: (data) => {
                    if(data.code == '419') {
                        swal('Ooops!','Invalid Meter No');
                        $('#payPostpaid').prop('disabled', false);
                        $('#payPostpaid').html('Continue');
                    }else {
                        continuePay();
                    }
                }
            })
            
            function continuePay() {
                $.ajax({
                url: payUrl,
                method: 'POST',
                data: formdata,
                success: (response) => {
                    if (response.code == "ok") {
                        $('#payPostpaid').html('Connecting...');
                        payWithPaystack();
                    }else if(response.code == "no"){
                        swal('Ooops!','Sorry, Payment Cannot be made at the moment, Please Contact Admin to resolve your issues\n\nPhone: 08052313815\n\nEmail: customersupport@goenergee.com','danger');
                        $('#payPostpaid').prop('disabled', false);
                    }else {
                        swal('Ooops',''+response.errorText+'','error');
                    }
                },
                error: (err) => {
                    $('#payPostpaid').prop('disabled', false);
                }
            });
            $('#payPostpaid').prop('disabled', false);
            }
        })

        function payWithPaystack() {
            var handler = PaystackPop.setup({
                key: 'pk_test_120bd5b0248b45a0865650f70d22abeacf719371',
                email: document.querySelector('.email').value,
                amount: parseInt(document.querySelector('.amount').value) + 100 + "00",
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                callback: function (response) {
                    // console.log(response);
                    setTimeout(() => {
                        window.location.href = '/postpaidpayment/' + response.reference +'/success';
                    }, 1000);
                    
                },
                onClose: function () {
                    alert('Payment cancelled Thank you');
                }
            });
            handler.openIframe();
                
        }
    </script>



</body>

</html>