@extends('customer.master')

@section('customer-section')

            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Instant Top Up</span>
                                <h5>Current Balance</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><span>&#8358;</span>25,800</h1>
                                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                <small>Customers</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Year</span>
                                 <span class="label label-primary pull-right">Month</span>
                                  <span class="label label-primary pull-right">Week</span>
                                  <span class="label label-primary pull-right">Today</span>
                                <h5>Average Daily Charge</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><span>&#8358;</span>120</h1>
                                <div class="stat-percent font-bold text-navy">4% <i class="fa fa-level-up"></i></div>
                                <small>Average Cost of Electricity Per day</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Year</span>
                                <span class="label label-success pull-right">Quater</span>
                                <span class="label label-success pull-right">Month</span>
                                <h5>Utility Spend to date</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><span>&#8358;</span>10,000</h1>
                                <div class="stat-percent font-bold text-success">5%<i class="fa fa-level-down"></i></div>
                                <small>Cumulative Amount Spend on Electricity</small>
                            </div>
                        </div>
                    </div>
            </div>
 
            <div class="row">
                <div class="col-md-12 text-center"  id="group-pay">
                    <h1>Who are you paying For? </h1>
                    <div class="btn-group">
                        <button id='tFS' class="btn btn-primary btn-md">Myself</button>
                        <button id="tFO" class="btn btn-warning btn-md">For Others</button>
                    </div>
                </div>

               
                <div class="col-lg-6" id="forSelf">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Make new bill payment
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">

                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            {{-- @if(isset($before)) --}}
                            <form action="" method="POST" class="meterSelf">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label>Meter No.</label>
                                    <input type="text" name="meter_no" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control"  value="{{ Auth::user()->first_name }}" />
                                </div>
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}"  />
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" name="email" class="form-control meter-email" value="{{ Auth::user()->email }}"  />
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" name="mobile" class="form-control" value="{{ Auth::user()->mobile }}"  />
                                </div>
                                <div class="form-group">
                                    <label>Convienience Fee</label>
                                    <input type="text" value="100.00" readonly class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="text" name="amount" class="form-control meter-amount" />
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-block btn-primary pay-meter1">Make Payment</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6" id="forOthers">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Make new bill payment
                        </div>
                    <div class="ibox float-e-margins">
    
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">

                <li><a href="#">Config option 1</a>
                </li>
                <li><a href="#">Config option 2</a>
                </li>
            </ul>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">

        <form action="" method="POST" class="meterOthers">
            {{ csrf_field()}}
            <div class="form-group">
                <label>Meter No.</label>
                <input type="text" name="meter_no" class="form-control" />
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" />
            </div>
            <div class="form-group">
                <label>Lastname</label>
                <input type="text" name="last_name" class="form-control" />
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="email" class="form-control meter-email-2" />
            </div>
            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" name="mobile" class="form-control" />
            </div>
            <div class="form-group">
                <label>Convienience Fee</label>
                <input type="text" value="100.00" readonly class="form-control" />
            </div>
            <div class="form-group">
                <label>Amount</label>
                <input type="text" name="amount" class="form-control meter-amount-2" />
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-primary pay-meter2">Make Payment</button>
            </div>
        </form>

    </div>
</div>

    </div>
      <!-- Mainly scripts -->
    <script src="/customer/js/jquery-3.1.1.min.js"></script>
    <script src="/customer/js/bootstrap.min.js"></script>
    <script src="/customer/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/customer/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/customer/js/inspinia.js"></script>
    <script src="/customer/js/plugins/pace/pace.min.js"></script>

    <!-- ChartJS-->
    <script src="/customer/js/plugins/chartJs/Chart.min.js"></script>
    <script src="/customer/js/demo/chartjs-demo.js"></script>

    <!-- Mainly scripts -->
    <script src="/customer/js/jquery-3.1.1.min.js"></script>
    <script>
            $(function() {
                $("#forSelf").hide();
                $("#forOthers").hide();

                $("#tFS").click(() => {
                    $("#forSelf").show().fadeIn('normal');
                    $("#group-pay").hide();
                });

                $("#tFO").click(() => {
                    $("#forOthers").show().fadeIn('normal');
                    $("#group-pay").hide();
                });
            })
    
            </script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="https://js.paystack.co/v1/inline.js"></script>
	
		   
            <script>
              $(".pay-meter1").click((e) => {
                  e.preventDefault();
                  $(this).prop('disabled',true);
  
                  var formdata = $('.meterSelf').serialize();
  
                  $.ajax({
                      url: 'payment/hold',
                      method: 'POST',
                      data: formdata,
                      success: (response) => {
                          if(response.code == "ok") {
                              payWithPaystack();
                          }
                      }
                  })
              })
              $(".pay-meter2").click((e) => {
                  e.preventDefault();$('.pay-meter2').prop('disabled',true).html('Loading...');
  
                  var formdata = $('.meterOthers').serialize();
  
                  $.ajax({
                      url: 'payment/hold',
                      method: 'POST',
                      data: formdata,
                      success: (response) => {
                          if(response.code == "ok") {
                              payWithPaystack2();
                          }
                      }
                  })
              })
              function payWithPaystack(){
                  var amountMeter = document.querySelector('.meter-amount').value;
                  
                  var chargedAmount = parseInt(amountMeter) + 100;
                    console.log(chargedAmount);
                var handler = PaystackPop.setup({
                  key: 'pk_test_120bd5b0248b45a0865650f70d22abeacf719371',
                  email: document.querySelector('.meter-email').value,
                  amount: chargedAmount+"00",
                  ref: 'GOENERGEE'+Math.floor((Math.random() * 1000000000) + 1)+"TRANSREF", // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                  
                  callback: function(response){
                      swal('Yay!','Payment Successfull','success');
                      setTimeout(() => {
                          window.location.href='/payment/'+response.reference+'/success';
                      },3000);
                  },
                  onClose: function(){
                      alert('Payment Cancelled');
                  }
                });
                handler.openIframe();
              }
              function payWithPaystack2(){
                  var amountMeter = document.querySelector('.meter-amount-2').value;
                  
                  var chargedAmount = parseInt(amountMeter) + 100;
                    console.log(chargedAmount);
                var handler = PaystackPop.setup({
                  key: 'pk_test_120bd5b0248b45a0865650f70d22abeacf719371',
                  email: document.querySelector('.meter-email-2').value,
                  amount: chargedAmount+"00",
                  ref: 'GOENERGEE'+Math.floor((Math.random() * 1000000000) + 1)+"TRANSREF", // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                  
                  callback: function(response){
                      swal('Yay!','Payment Successfull','success');
                      setTimeout(() => {
                          window.location.href='/payment/'+response.reference+'/success';
                      },3000);
                  },
                  onClose: function(){
                      alert('Payment Cancelled');
                  }
                });
                handler.openIframe();
              }
            </script>
    <script src="/customer/js/bootstrap.min.js"></script>
    <script src="/customer/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/customer/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="/customer/js/plugins/flot/jquery.flot.js"></script>
    <script src="/customer/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/customer/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="/customer/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/customer/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="/customer/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="/customer/js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="/customer/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/customer/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/customer/js/inspinia.js"></script>
    <script src="/customer/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="/customer/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="/customer/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/customer/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="/customer/js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="/customer/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="/customer/js/demo/sparkline-demo.js"></script>

  
    <script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Unit of Electricity Consumed",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments received",
                    data: data2,
                    yaxis: 2,
                    color: "#1C84C6",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.4
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>
</body>
</html>
@endsection