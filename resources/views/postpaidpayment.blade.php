<!DOCTYPE html>

<head>

    <title>GoEnergee</title>

    <link href="images/favicon.png" rel="shortcut icon" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="css/main.css" rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> -->
    <style>
        table .error {
            font-size: 12px;
            color: #e21709;
        }
    </style>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript">
        $(function () {
            function tally(selector) {
                $(selector).each(function () {
                    var total = 0,
                        column = $(this).siblings(selector).andSelf().index(this);
                    $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                        total += parseFloat($('td.sum:eq(' + column + ')', this).html()) || 0;
                    })
                    $(this).html(total);
                });
            }
            tally('td.subtotal');
            tally('td.total');
        });
    </script>



    <script type="text/javascript">
        function num(id) {
            var e = document.getElementById(id);
            if (e != null) {
                var v = e.value;
                if (/^\\d+$/.test(v)) {
                    return parseInt(v, 10);
                }
            }
            return 0;
        }

        function sum() {
            var subtotal1 = num("subtotal1");
            var subtotal2 = num("subtotal2");
            var subtotal3 = num("subtotal3");
            var subtotal4 = num("subtotal4");
            var r = document.getElementById("result");
            if (r != null) {
                r.value = subtotal1 + subtotal2 + subtotal3 + subtotal4;
            }
        }

        function addHandler(element, eventName, handler) {
            if (element.addEventListener) {
                element.addEventListener(eventName, handler, false);
            } else if (element.attachEvent) {
                element.attachEvent("on" + eventName, handler);
            }
        }
    </script>
    <style>
        @media only screen and (min-width: 1500px) {
            .body-container {
                height: 97vh;
            }
        }
    </style>

</head>

<body>
    <div style="height:100%;">
        <div class="body-container">


            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <a href="{{ url('/')}}">
                        <img src="images/logo.png" style="float:left;margin-top:6px; padding:4px;">
                    </a>
                    <div class="navbar" style="margin-top:6px;right:23px;">
                        <a href="/">
                            <button type="button" id="support_btn" class="grad-box">
                                <i class="fas fa-home"></i> Back to Home
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="" style="padding:40px 70px 30px, 30px;">
                        <h4>Fill in the details to make your
                            <span style="color:#80c636">Postpaid payments</span> here!</h4>
                        <div class="hr-line-dashed"></div>
                        <form action="POST" class="meter">
                            <table class="table table-bordered table-responsive" id="postpaiditems" style="width:100%;">
                                <thead>
                                    <tr>

                                        <th colspan="8">Postpaid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>Postpaid</td>
                                        <td>
                                            <input type="hidden" name="payment_type[]" value="Postpaid" />
                                            <input type="text" name="account_number[]" id="meter_number1" placeholder="Account Number">
                                        </td>
                                        <td>
                                            <input type="email" name="email[]" id="email_1" size="35" placeholder="Email Address">
                                        </td>
                                        <td>
                                            <input type="text" name="mobile[]" id="mobile_1" placeholder="Mobile Number">
                                        </td>
                                        <td>
                                            <input type="text" class="txt" name="amount[]" id="amount_1" placeholder="Amount">
                                        </td>
                                        <td>Convienience Fee
                                            <input type="text" name="convienience" placeholder="N100.00" disabled="">
                                        </td>
                                        <td>Subtotal
                                            <input type="text" name="subtotal_1" id="subtotal_1" placeholder="" disabled="">
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Penalties</td>
                                        <td>
                                            <input type="hidden" name="payment_type[]" value="Penalties" />
                                            <input type="text" name="account_number[]" id="meter_number2" placeholder="Account Number">
                                        </td>
                                        <td>
                                            <input type="email" name="email[]" id="email_2" size="35" placeholder="Email Address">
                                        </td>
                                        <td>
                                            <input type="text" name="mobile[]" id="mobile_2" placeholder="Mobile Number">
                                        </td>
                                        <td>
                                            <input type="text" name="amount[]" class="txt" id="amount_2" placeholder="Amount">
                                        </td>
                                        <td>Convienience Fee
                                            <input type="text" name="convienience" placeholder="N100.00" disabled="">
                                        </td>
                                        <td>Subtotal
                                            <input type="text" name="subtotal_2" id="subtotal_2" placeholder="" disabled="">
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Loss of Revenue</td>
                                        <td>
                                            <input type="hidden" name="payment_type[]" value="Loss of Revenue" />
                                            <input type="text" name="account_number[]" id="meter_number3" placeholder="Account Number">
                                        </td>
                                        <td>
                                            <input type="email" name="email[]" id="email_3" size="35" placeholder="Email Address">
                                        </td>
                                        <td>
                                            <input type="text" name="mobile[]" id="mobile_3" placeholder="Mobile Number">
                                        </td>
                                        <td>
                                            <input type="text" name="amount[]" class="txt" id="amount_3" placeholder="Amount">
                                        </td>
                                        <td>Convienience Fee
                                            <input type="text" name="convienience" placeholder="N100.00" disabled="">
                                        </td>
                                        <td>Subtotal
                                            <input type="text" name="subtotal_3" id="subtotal_3" placeholder="" disabled="">
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Reconnection Fee</td>
                                        <td>
                                            <input type="hidden" name="payment_type[]" value="Reconnection Fee" />
                                            <input type="text" name="account_number[]" id="meter_number4" placeholder="Account Number">
                                        </td>
                                        <td>
                                            <input type="email" name="email[]" id="email_4" size="35" placeholder="Email Address">
                                        </td>
                                        <td>
                                            <input type="text" name="mobile[]" id="mobile_4" placeholder="Mobile Number">
                                        </td>
                                        <td>
                                            <input type="text" name="amount[]" class="txt" id="amount_4" placeholder="Amount">
                                        </td>
                                        <td>Convienience Fee
                                            <input type="text" name="convienience" placeholder="N100.00" disabled="">
                                        </td>
                                        <td>Subtotal
                                            <input type="text" name="subtotal_4" id="subtotal_4" placeholder="" disabled="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" style="text-align:right;">Total Fee</td>
                                        <td>(Sum of the subtotal)
                                            <input type="text" name="sum" id="sum" placeholder="" disabled="">
                                            <input type="hidden" name="totalPayblleAmount" id="totalPayblleAmount" value=" ">
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <table width="100%" border="0" bgcolor="#ffffff">
                                <tr>
                                    <td width="7%">
                                        <button type="submit" class="btn btn-success " id="paynow" style="float:right;">Pay Now</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Information Portal</h5>
                        </div>
                        <div class="ibox-content ">
                            <div class="carousel slide" id="carousel2">
                                <ol class="carousel-indicators">
                                    <li data-slide-to="0" data-target="#carousel2" class="active"></li>
                                    <li data-slide-to="1" data-target="#carousel2"></li>
                                    <li data-slide-to="2" data-target="#carousel2" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item ">
                                        <img alt="image" class="img-responsive" src="{{asset('images/advert.jpg')}}">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="/js/sweetalert.min.js"></script>

    <footer>
        Powered by GOENERGEE
    </footer>

    <script>
        var sum = 0;
        $(document).ready(function () {

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
        // $('#amount1').keyup(function () {
        //     var x = 100;
        //     var total_amount = Number($(this).val()) + Number(x)
        //     $("#subtotal1").val(total_amount);
        //     total_amount_paid = total_amount1;
        //     $("#totalPayblleAmount").val(total_amount);

        //     //.toFixed() method will roundoff the final sum to 2 decimal places
        //     $("#sum").html(sum.toFixed(2));
        // });
        // $('#amount2').keyup(function () {
        //     var x = 100;
        //     var total_amount = Number($(this).val()) + Number(x)
        //     $("#subtotal2").val(total_amount);
        //     total_amount_paid2 = Number(total_amount) + Number(total_amount_paid);
        //     $("#totalPayblleAmount").val(total_amount);
        // });
        // $('#amount3').keyup(function () {
        //     var x = 100;
        //     var total_amount = Number($(this).val()) + Number(x)
        //     $("#subtotal3").val(total_amount);
        //     total_amount_paid3 = Number(total_amount) + Number(total_amount_paid2);
        //     $("#totalPayblleAmount").val(total_amount);
        // });
        // $('#amount4').keyup(function () {
        //     var x = 100;
        //     var total_amount = Number($(this).val()) + Number(x)
        //     $("#subtotal4").val(total_amount);
        //     total_amount_paid4 = Number(total_amount) + Number(total_amount_paid3);
        //     $("#totalPayblleAmount").val(total_amount);

        // });


        //.toFixed() method will roundoff the final sum to 2 decimal places
        // $("#sum").html(sum.toFixed(2));
        $("#paynow").click((e) => {
            e.preventDefault();
            $('#paynow').prop('disabled', true);
            var formdata = $('.meter').serialize();

            $.ajax({
                url: 'payment/hold',
                method: 'POST',
                data: formdata,
                success: (response) => {
                    if (response.code == "ok") {
                        payWithPaystack();
                    }
                },
                error: (err) => {
                    $('#paynow').prop('disabled', false);
                }
            });
            $('#paynow').prop('disabled', false);
        })

        function validEmail(email) {
            var re =
                /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        function payWithPaystack() {
            jQuery("#postpaiditems").find('.error').remove();

            document.getElementById("paynow").disabled = true;
            document.getElementById("paynow").innnerHTML = "Processing..";
            var errors = false;
            var meter_number1 = document.getElementById("meter_number1").value;
            var email1 = document.getElementById("email_1").value;
            var mobile1 = document.getElementById("mobile_1").value;
            var amount1 = document.getElementById("amount_1").value;
            if (document.getElementById("amount_1").value > 0) {
                if (!validEmail(email1)) {
                    jQuery("#email_1").parent().append('<span class="error">Please enter valid email</span>');
                    errors = true;
                } else {
                    jQuery("#email_1").parent().find('.error').remove();
                }
                if (!mobile1.length) {
                    jQuery("#mobile_1").parent().append('<span class="error">Please enter valid mobile number</span>');
                    errors = true;
                } else {
                    jQuery("#mobile_1").parent().find('.error').remove();
                }
                if (!meter_number1.length) {
                    jQuery("#meter_number1").parent().append(
                        '<span class="error">Please enter valid meter number</span>');
                    errors = true;
                } else {
                    jQuery("#meter_number1").parent().find('.error').remove();
                }
            }
            var meter_number2 = document.getElementById("meter_number2").value;
            var email2 = document.getElementById("email_2").value;
            var mobile2 = document.getElementById("mobile_2").value;
            var amount2 = document.getElementById("amount_2").value;

            if (meter_number2 > 0) {
                if (!validEmail(email2)) {
                    jQuery("#email_2").parent().append('<span class="error">Please enter valid email</span>');
                    errors = true;
                } else {
                    jQuery("#email_2").parent().find('.error').remove();
                }
                if (!mobile2.length) {
                    jQuery("#mobile_2").parent().append('<span class="error">Please enter valid mobile number</span>');
                    errors = true;
                } else {
                    jQuery("#mobile_2").parent().find('.error').remove();
                }
                if (!meter_number2.length) {
                    jQuery("#meter_number2").parent().append(
                        '<span class="error">Please enter valid meter number</span>');
                    errors = true;
                } else {
                    jQuery("#meter_number2").parent().find('.error').remove();
                }
            }
            var meter_number3 = document.getElementById("meter_number3").value;
            var email3 = document.getElementById("email_3").value;
            var mobile3 = document.getElementById("mobile_3").value;
            var amount3 = document.getElementById("amount_3").value;
            if (meter_number3 > 0) {
                if (!validEmail(email3)) {
                    jQuery("#email_3").parent().append('<span class="error">Please enter valid email</span>');
                    errors = true;
                } else {
                    jQuery("#email_3").parent().find('.error').remove();
                }
                if (!mobile3.length) {
                    jQuery("#mobile_3").parent().append('<span class="error">Please enter valid mobile number</span>');
                    errors = true;
                } else {
                    jQuery("#mobile_3").parent().find('.error').remove();
                }
                if (!meter_number3.length) {
                    jQuery("#meter_number3").parent().append(
                        '<span class="error">Please enter valid meter number</span>');
                    errors = true;
                } else {
                    jQuery("#meter_number3").parent().find('.error').remove();
                }
            }
            var meter_number4 = document.getElementById("meter_number4").value;
            var email4 = document.getElementById("email_4").value;
            var mobile4 = document.getElementById("mobile_4").value;
            var amount4 = document.getElementById("amount_4").value;
            if (meter_number4 > 0) {
                if (!validEmail(email4)) {
                    jQuery("#email_4").parent().append('<span class="error">Please enter valid email</span>');
                    errors = true;
                } else {
                    jQuery("#email_4").parent().find('.error').remove();
                }
                if (!mobile4.length) {
                    jQuery("#mobile_4").parent().append('<span class="error">Please enter valid mobile number</span>');
                    errors = true;
                } else {
                    jQuery("#mobile_4").parent().find('.error').remove();
                }
                if (!meter_number4.length) {
                    jQuery("#meter_number4").parent().append(
                        '<span class="error">Please enter valid meter number</span>');
                    errors = true;
                } else {
                    jQuery("#meter_number4").parent().find('.error').remove();
                }
            }
            if (errors) {
                document.getElementById("paynow").disabled = false;
                document.getElementById("paynow").innnerHTML = "Pay Now";
                return false;
            }
            var NRI = 100;
            var amount_to_be_paid = Number($("#totalPayblleAmount").val()) * Number(NRI);;
            console.log(amount_to_be_paid);
            //alert(amount_to_be_paid);

            // if (meter_number != '' && pay_email != '' && mobile_number != '' && amount != '') {
            //  if (meter_number == 12345) {

            var handler = PaystackPop.setup({
                key: 'pk_test_aa1d1b69173f8f90d1804d178f640ab40f208693',
                email: email1,
                amount: amount_to_be_paid,
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                metadata: {
                    custom_fields: [{
                        display_name: "Sitesh Ranjan",
                        variable_name: "test",
                        value: "+918553459324"
                    }]
                },
                callback: function (response) {
                    swal('Yay!', 'Payment Successfull', 'success');
                    setTimeout(() => {
                        window.location.href = '/postpaidpayment/' + response.reference +
                            '/success';
                    }, 3000);
                    // $.ajax({
                    //     url: '/payment/' + response.reference + '/success',
                    //     // url: 'http://localhost.utilitybills.com/apiPayStackPostPiad',
                    //     // url: 'http://login.goenergee.com/apiPayStackPostPiad',
                    //     type: 'post',
                    //     dataType: 'json',
                    //     data: {
                    //         meter_number1: meter_number1,
                    //         email1: email1,
                    //         mobile_number1: mobile1,
                    //         amount1: amount1,
                    //         meter_number2: meter_number2,
                    //         email2: email2,
                    //         mobile_number2: mobile2,
                    //         amount2: amount2,
                    //         meter_number3: meter_number3,
                    //         email3: email3,
                    //         mobile_number3: mobile3,
                    //         amount3: amount3,
                    //         meter_number4: meter_number4,
                    //         email4: email4,
                    //         mobile_number4: mobile4,
                    //         amount4: amount4,
                    //         refId: response.reference

                    //     },
                    //     beforeSend: function () {},
                    //     success: function (response) {
                    //         console.log(response);
                    //         if (response.code == 200) {
                    //             document.getElementById("paynow").disabled = false;
                    //             document.getElementById("paynow").innnerHTML = "Pay Now";
                    //         } else {
                    //             document.getElementById("paynow").disabled = false;
                    //             document.getElementById("paynow").innnerHTML = "Pay Now";
                    //         }
                    //     }
                    // });
                },
                onClose: function () {
                    alert('Payment cancel Thank you');
                }
            });
            handler.openIframe();
            //  } else {
            //    alert('please enter valid meter number');
            // }
            /* } else {
                 alert('please enter all the details');
             } */
        }
    </script>



</body>

</html>