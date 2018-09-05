<!DOCTYPE html>

<head>

<title>GoEnergee</title>

<link href="/images/favicon.png" rel="shortcut icon" type="image/png">

<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
<link href="main.css" rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	function tally (selector) {
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
          var r  = document.getElementById("result");
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

      addHandler(window, "load",
                 function() {
                   addHandler(document.getElementById("subtotal1"), "keyup", sum);
                   addHandler(document.getElementById("subtotal2"), "keyup", sum);
                   addHandler(document.getElementById("subtotal3"), "keyup", sum);
				    addHandler(document.getElementById("subtotal4"), "keyup", sum);
                 });
    <title>GoEnergee</title>

    <link href="images/favicon.png" rel="shortcut icon" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="/css/main.css" rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
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

        addHandler(window, "load",
            function () {
                addHandler(document.getElementById("subtotal1"), "keyup", sum);
                addHandler(document.getElementById("subtotal2"), "keyup", sum);
                addHandler(document.getElementById("subtotal3"), "keyup", sum);
                addHandler(document.getElementById("subtotal4"), "keyup", sum);
            });
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
                <div class="" style="padding:40px 70px 30px, 30px;">



                    <img src="images/logo.png" style="margin-top:20px; padding:4px;">
                    <br>
                    <br>
                    <h4>Fill in the details to make your
                        <span style="color:#80c636">Postpaid payments</span> here!</h4>

                    <div class="hr-line-dashed"></div>
                    <table id="data">
                        <table width="68%" border="1" bgcolor="#ffffff">
                            <tr>

                                <tr>
                                    <td width="8%">Postpaid</td>
                                    <td width="12%">
                                        <input type="number" placeholder="Account Number" class="form-control" name="account_number1" id="account_number1">
                                    </td>
                                    <td width="20%">
                                        <input type="text" placeholder="Email Address" class="form-control" name="email_1" id="email_1">
                                    </td>
                                    <td width="10%">
                                        <input type="number" placeholder="Mobile Number" class="form-control" name="mobile_1" id="mobile_1">
                                    </td>
                                    <td width="7%">
                                        <input type="number" placeholder="Amount" name="amount1" id="amount1" class="form-control">
                                    </td>
                                    <td width="8%">
                                        <input type="text" placeholder="Convenience Fee" value="100.00" placeholder="N100.00" id="convientFee1" readonly>
                                    </td>
                                    <td width="7%">
                                        <input type="text" placeholder="Sub Total" name="subtotal" id="subtotal1">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="8%">Penalties</td>
                                    <td width="12%">
                                        <input type="number" placeholder="Account Number" class="form-control" name="account_number2" id="account_number2">
                                    </td>
                                    <td width="20%">
                                        <input type="text" placeholder="Email Address" class="form-control" name="email_2" id="email_2">
                                    </td>
                                    <td width="10%">
                                        <input type="number" placeholder="Mobile Number" class="form-control" name="mobile2" id="mobile2">
                                    </td>
                                    <td width="7%">
                                        <input type="number" placeholder="Amount" name="amount2" id="amount2" class="form-control">
                                    </td>
                                    <td width="8%">
                                        <input type="text" placeholder="Convenience Fee" id="convientFee2" value="100.00" placeholder="N100.00" class="sum" readonly>
                                    </td>
                                    <td width="7%">
                                        <input type="text" placeholder="Sub Total" name="subtotal" id="subtotal2">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="8%">Loss of Revenue</td>
                                    <td width="12%">
                                        <input type="number" placeholder="Account Number" class="form-control" name="account_number3" id="account_number3">
                                    </td>
                                    <td width="20%">
                                        <input type="text" placeholder="Email Address" class="form-control" name="email_3" id="email_3">
                                    </td>
                                    <td width="10%">
                                        <input type="number" placeholder="Mobile Number" class="form-control" name="mobile3" id="mobile3">
                                    </td>
                                    <td width="7%">
                                        <input type="number" placeholder="Amount" name="amount3" id="amount3" class="form-control">
                                    </td>
                                    <td width="8%">
                                        <input type="text" placeholder="Convenience Fee" id="convientFee3" value="100.00" placeholder="N100.00" class="sum" readonly>
                                    </td>
                                    <td width="7%">
                                        <input type="text" placeholder="Sub Total" name="subtotal" id="subtotal3">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="8%">Reconnection Fee</td>
                                    <td width="12%">
                                        <input type="number" placeholder="Account Number" class="form-control" name="account_number4" id="account_number4">
                                    </td>
                                    <td width="20%">
                                        <input type="text" placeholder="Email Address" class="form-control" name="email_4" id="email_4">
                                    </td>
                                    <td width="10%">
                                        <input type="number" placeholder="Mobile Number" class="form-control" name="mobile4" id="mobile4">
                                    </td>
                                    <td width="7%">
                                        <input type="number" placeholder="Amount" name="amount4" id="amount4" class="form-control">
                                    </td>
                                    <td width="8%">
                                        <input type="text" placeholder="Convenience Fee" id="convientFee4" value="100.00" placeholder="N100.00" class="sum" readonly>
                                    </td>
                                    <td width="7%">
                                        <input type="text" placeholder="Sub Total" name="subtotal" id="subtotal4">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align:right;">Total Fee</td>
                                    <td>(Total)
                                        <input type="number" name="totalPayblleAmount" name="totalPayblleAmount" id="totalPayblleAmount" placeholder="N" disabled>
                                    </td>
                                </tr>

                        </table>
                        <table width="68%" border="0" bgcolor="#ffffff">
                            <tr>
                                <td width="7%">
                                    <button type="submit" class="btn btn-success" style="float:right;">Pay Now</button>
                                </td>

                            </tr>
                        </table>





                </div>

            </div>
            <!--main div ends--->
        </div>
    </div>

    <footer>
        Powered by GOENERGEE
    </footer>

    <script>
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
            //iterate through each textboxes and add the values
            $(".txt").each(function () {

                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }

            });
            //.toFixed() method will roundoff the final sum to 2 decimal places
            $("#sum").html(sum.toFixed(2));
        }
    </script>


    <script type="text/javascript">
        $('#amount1').keyup(function () {
            var x = 100;
            var total_amount = Number($(this).val()) + Number(x)
            $("#subtotal1").val(total_amount);
            total_amount_paid = total_amount1;
            $("#totalPayblleAmount").val(total_amount);

            //.toFixed() method will roundoff the final sum to 2 decimal places
            $("#sum").html(sum.toFixed(2));
        });
        $('#amount2').keyup(function () {
            var x = 100;
            var total_amount = Number($(this).val()) + Number(x)
            $("#subtotal2").val(total_amount);
            total_amount_paid2 = Number(total_amount) + Number(total_amount_paid);
            $("#totalPayblleAmount").val(total_amount);
        });
        $('#amount3').keyup(function () {
            var x = 100;
            var total_amount = Number($(this).val()) + Number(x)
            $("#subtotal3").val(total_amount);
            total_amount_paid3 = Number(total_amount) + Number(total_amount_paid2);
            $("#totalPayblleAmount").val(total_amount);
        });
        $('#amount4').keyup(function () {
            var x = 100;
            var total_amount = Number($(this).val()) + Number(x)
            $("#subtotal4").val(total_amount);
            total_amount_paid4 = Number(total_amount) + Number(total_amount_paid3);
            $("#totalPayblleAmount").val(total_amount);

        });


        //.toFixed() method will roundoff the final sum to 2 decimal places
        $("#sum").html(sum.toFixed(2));


        function payWithPaystack() {

            var meter_number1 = document.getElementById("meter_number1").value;
            var email1 = document.getElementById("email1").value;
            var mobile1 = document.getElementById("mobile1").value;
            var amount1 = document.getElementById("amount1").value;

            var meter_number2 = document.getElementById("meter_number2").value;
            var email2 = document.getElementById("email2").value;
            var mobile2 = document.getElementById("mobile2").value;
            var amount2 = document.getElementById("amount2").value;

            var meter_number3 = document.getElementById("meter_number3").value;
            var email3 = document.getElementById("email3").value;
            var mobile3 = document.getElementById("mobile3").value;
            var amount3 = document.getElementById("amount3").value;

            var meter_number4 = document.getElementById("meter_number4").value;
            var email4 = document.getElementById("email4").value;
            var mobile4 = document.getElementById("mobile4").value;
            var amount4 = document.getElementById("amount4").value;
            var NRI = 100;
            var amount_to_be_paid = Number(total_amount_paid4) * Number(NRI);
            //alert(amount_to_be_paid);

            // if (meter_number != '' && pay_email != '' && mobile_number != '' && amount != '') {
            //  if (meter_number == 12345) {

            var handler = PaystackPop.setup({
                key: 'pk_test_aa1d1b69173f8f90d1804d178f640ab40f208693',
                email: "siteshranjan39@gmail.com",
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

                    $.ajax({
                        // url: 'http://localhost.utilitybills.com/apiPayStackPostPiad',
                        url: 'http://login.goenergee.com/apiPayStackPostPiad',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            meter_number1: meter_number1,
                            email1: email1,
                            mobile_number1: mobile1,
                            amount1: amount1,
                            meter_number2: meter_number2,
                            email2: email2,
                            mobile_number2: mobile2,
                            amount2: amount2,
                            meter_number3: meter_number3,
                            email3: email3,
                            mobile_number3: mobile3,
                            amount3: amount3,
                            meter_number4: meter_number4,
                            email4: email4,
                            mobile_number4: mobile4,
                            amount4: amount4,
                            refId: response.reference

                        },
                        beforeSend: function () {},
                        success: function (response) {
                            console.log(response);
                            if (response.code == 200) {
                                alert(response.message);
                            } else {
                                alert(response.message);
                            }
                        }
                    });
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