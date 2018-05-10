<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GOENERGEE | Meter Request Form</title>
 <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://js.paystack.co/v1/paystack.js"></script>

  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

    <link href="css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
<link rel="icon" href="img/favicon.png" type='image/x-icon'>
 


</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Patrick Chigbata</strong>
                             </span> <span class="text-muted text-xs block">Developer <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        GO
                    </div>
                </li>
                <li>
                    <li><a href="customer_report.html"><i class="fa fa-calculator"></i> <span class="nav-label">My Dashboard</span></a>
                </li>
				
                <li>
                     <li><a href="Payment_history.html"><i class="fa fa-cc-visa"></i> <span class="nav-label">Payment History</span></a>
                </li>
				<li>
                   <li class="active"><a href="meter_request.html"><i class="fa fa-table"></i> <span class="nav-label">Meter Request</span></a>
                </li>  
                 <li>
                    <li><a href="customer_Profile.html"><i class="fa fa-podcast"></i> <span class="nav-label">My Profile</span></a>
                </li>
                
    </nav>
    <div id="page-wrapper" class="gray-bg">
        
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to GOENERGEE Utility Platform.</span>
                </li>
                


                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>

            
    <div class="wrapper wrapper-content">
         <div class="row">
                                        <div class="col-lg-12">
                                        <div class="panel panel-success">
                                        <div class="panel-heading">
                                            Meter Request Form
                                        </div>
                                            
                                                <div class="ibox-content">
                                                    <form method="get" class="form-horizontal">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">First Name</label>
                                                            <div class="col-sm-3"><input type="text" class="form-control"></div>
                                                            <label class="col-sm-2 control-label">Last Name</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control"> 
                                                        </div></div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Address</label> 
                                                            <div class="col-sm-9"><input type="text" class="form-control"></div><div class="form-group">
                                                            </div>

                                                            <label class="col-sm-2 control-label">Closest Bus stop</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control"> 
                                                        </div>
                                                        <label class="col-sm-2 control-label">Email Address</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control"> 
                                                        </div></div>
                                                        <label class="col-sm-2 control-label">Distribution Company</label>
                                                            <div class="col-sm-3">
                                                                <select class="form-control m-b" name="account">
                                                                    <option>EKEDC</option>
                                                                    <option>Others</option>
                                                                   
                                                                </select>
                                                        </div>
                                                        <label class="col-sm-2 control-label">District/Location</label>
                                                            <div class="col-sm-3">
                                                                <select class="form-control m-b" name="account">
                                                                    <option>Ajele</option>
                                                                    <option>Ojo</option>
                                                                    <option>Mushin</option>
                                                                    <option>Lekki</option>
                                                                    <option>Isolo  </option>
                                                                    <option>Festac</option>
                                                                    <option>Ibeju</option>
                                                                    <option>Orile</option>
                                                                    <option>Agbara</option>
                                                                    
                                                                </select>
                                                            </div>
                                                       
                                                       
                                                    
                                                    <div class="hr-line-dashed"></div>
                                                        <div class="form-group">
                                                            <div class="hr-line-dashed"></div>
                                                              <label class="col-sm-2 control-label">Gender<br /></label>
                                                                 <div class="col-sm-2">
                                                                <div class="i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> Male </label></div>
                                                                <div class="i-checks"><label> <input type="radio" checked="" value="option2" name="a"> <i></i> Female</label></div>
                                                                 </div>


                                                        <label class="col-sm-2 control-label">House Type<br /></label>
                                                           <div class="col-sm-2">
                                                          <div class="i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> Residential </label></div>
                                                          <div class="i-checks"><label> <input type="radio" checked="" value="option2" name="a"> <i></i> Commercial </label></div>
                                                           </div>


                                                    <label class="col-sm-2 control-label">Meter Type<br /></label>
                                                       <div class="col-sm-2">
                                                      <div class="i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> Post paid </label></div>
                                                      <div class="i-checks"><label> <input type="radio" checked="" value="option2" name="a"> <i></i> Prepaid </label></div>
                                                       </div>
                                                        </div>

                                                        
                                                        <div class="hr-line-dashed"></div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">
                                                                Declaration <br />
                                                               
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <div><label> <input type="checkbox" value=""> 
                                                                <li> I, the undersigned, in my capacity as the owner detailed above, do hereby declare that the information supplied is to the best of my knowledge, true and correct.  </li>

                                                                <li> I hereby apply for the retrofitting of a credit electricity system or meter to a prepayment meter. I also affirm to pay every outstanding electricity bill/account which is in arrears.  </li>

                                                                <li> I acknowledge that I will pay the full cost of the smart prepayment meter, including but not limited to installation & commissioning costs, associated add-ons as may be required by the utility company or her representatives.  </li>

                                                                <li> Conversion to the prepayment electricity meter does not inhibit the application of the various bylaws.   </li>

                                                                <li> I acknowledge that in terms of the Electricity Supply Bylaws currently in place, only one electricity meter is allowed per single residential property. Any internal metering on the property is not covered under this application.    </li>

                                                                <li>  I acknowledge that there is a lag in the billing of electricity consumed on the credit meter and that once the installation of the prepayment meter has been performed, I, or my tenant where applicable, will still be responsible for the payment of the electricity consumed up to this date.   </li>

                                                                <li> I acknowledge that if my prior credit account for the basic electricity charge and other services charges is not settled within the stipulated timeframe, access to the electricity supply will be terminated. Further to this, I will not be able to purchase any prepayment tokens until the receipt is processed by the Utility service provider or her representative.    </li>
                                                                

                                                                <li>   I will update the meter users with regard to the retrofitting of the credit meter with a prepayment meter and ensure every outstanding bills or energy consumed is paid for..   </li></div>
                                                                <div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="hr-line-dashed"></div>
                                                        <div class="form-group">
                                                        <div class="col-sm-4 col-sm-offset-2">
                                                                <button class="btn btn-white" type="submit">Cancel</button>
                                                                <button class="btn btn-primary" type="submit">Submit</button>
                                                        </div>
                                                        
                                                        
                                                        
                                                      
                                                        
                                                        
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                    

                </div>
            </div>
        <div class="footer">
            
            <div>
                <strong>Powered by</strong> GOENERGEE &copy; 2018
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chosen -->
    <script src="js/plugins/chosen/chosen.jquery.js"></script>

   <!-- JSKnob -->
   <script src="js/plugins/jsKnob/jquery.knob.js"></script>

   <!-- Input Mask-->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <!-- Data picker -->
   <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

   <!-- NouSlider -->
   <script src="js/plugins/nouslider/jquery.nouislider.min.js"></script>

   <!-- Switchery -->
   <script src="js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Clock picker -->
    <script src="js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Image cropper -->
    <script src="js/plugins/cropper/cropper.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Tags Input -->
    <script src="js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Dual Listbox -->
    <script src="js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>

    <script>
        $(document).ready(function(){

            $('.tagsinput').tagsinput({
                tagClass: 'label label-primary'
            });

            var $image = $(".image-crop > img")
            $($image).cropper({
                aspectRatio: 1.618,
                preview: ".img-preview",
                done: function(data) {
                    // Output the result data for cropping image.
                }
            });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                            files = this.files,
                            file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }

            $("#download").click(function() {
                window.open($image.cropper("getDataURL"));
            });

            $("#zoomIn").click(function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function() {
                $image.cropper("rotate", -45);
            });

            $("#setDrag").click(function() {
                $image.cropper("setDragMode", "crop");
            });

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });

            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });

            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1AB394' });

            var elem_2 = document.querySelector('.js-switch_2');
            var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

            var elem_3 = document.querySelector('.js-switch_3');
            var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

            var elem_4 = document.querySelector('.js-switch_4');
            var switchery_4 = new Switchery(elem_4, { color: '#f8ac59' });
                switchery_4.disable();

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            $('.demo1').colorpicker();

            var divStyle = $('.back-change')[0].style;
            $('#demo_apidemo').colorpicker({
                color: divStyle.backgroundColor
            }).on('changeColor', function(ev) {
                        divStyle.backgroundColor = ev.color.toHex();
                    });

            $('.clockpicker').clockpicker();

            $('input[name="daterange"]').daterangepicker();

            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: { days: 60 },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-primary',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });

            $(".select2_demo_1").select2();
            $(".select2_demo_2").select2();
            $(".select2_demo_3").select2({
                placeholder: "Select a state",
                allowClear: true
            });


            $(".touchspin1").TouchSpin({
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $(".touchspin2").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%',
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $(".touchspin3").TouchSpin({
                verticalbuttons: true,
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $('.dual_select').bootstrapDualListbox({
                selectorMinimalHeight: 160
            });


        });

        $('.chosen-select').chosen({width: "100%"});

        $("#ionrange_1").ionRangeSlider({
            min: 0,
            max: 5000,
            type: 'double',
            prefix: "$",
            maxPostfix: "+",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_2").ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " carats",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_3").ionRangeSlider({
            min: -50,
            max: 50,
            from: 0,
            postfix: "°",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_4").ionRangeSlider({
            values: [
                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"
            ],
            type: 'single',
            hasGrid: true
        });

        $("#ionrange_5").ionRangeSlider({
            min: 10000,
            max: 100000,
            step: 100,
            postfix: " km",
            from: 55000,
            hideMinMax: true,
            hideFromTo: false
        });

        $(".dial").knob();

        var basic_slider = document.getElementById('basic_slider');

        noUiSlider.create(basic_slider, {
            start: 40,
            behaviour: 'tap',
            connect: 'upper',
            range: {
                'min':  20,
                'max':  80
            }
        });

        var range_slider = document.getElementById('range_slider');

        noUiSlider.create(range_slider, {
            start: [ 40, 60 ],
            behaviour: 'drag',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });

        var drag_fixed = document.getElementById('drag-fixed');

        noUiSlider.create(drag_fixed, {
            start: [ 40, 60 ],
            behaviour: 'drag-fixed',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });


    </script>
    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
</body>

</html>
