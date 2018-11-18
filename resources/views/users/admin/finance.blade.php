@extends('layouts.admin') @section('content')
<link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
{{-- <div class="row">

    <div class="col-sm-4">
        <h1 class="m-b-xs">
            <span>&#8358;</span>
            {{$data['salesthismonth']}}
        </h1>
        <small>
            Sales in current month
        </small>
        <div id="sparkline1" class="m-b-sm"></div>
        <div class="row">
            <div class="col-xs-4">
                <small class="stats-label">Pages / Visit</small>
                <h4>236,321</h4>
            </div>

            <div class="col-xs-4">
                <small class="stats-label">% New Visits</small>
                <h4>46.11%</h4>
            </div>
            <div class="col-xs-4">
                <small class="stats-label">Last week</small>
                <h4>432</h4>
            </div>
        </div>

    </div>
    <div class="col-sm-4">
        <h1 class="m-b-xs">
            <span>&#8358;</span>
            {{$data['salestoday']}}
        </h1>
        <small>
            Sales in last 24h
        </small>
        <div id="sparkline2" class="m-b-sm"></div>
        <div class="row">
            <div class="col-xs-4">
                <small class="stats-label">Pages / Visit</small>
                <h4>166,781</h4>
            </div>

            <div class="col-xs-4">
                <small class="stats-label">% New Visits</small>
                <h4>22.45%</h4>
            </div>
            <div class="col-xs-4">
                <small class="stats-label">Last week</small>
                <h4>862</h4>
            </div>
        </div>



    </div>
    <div class="col-sm-4">

        <div class="row m-t-xs">
            <div class="col-xs-6">
                <h5 class="m-b-xs">Income last month</h5>
                <h1 class="no-margins">
                    <span>&#8358;</span>{{$data['incomelastmonth']}}</h1>
                <div class="font-bold text-navy">98%
                    <i class="fa fa-bolt"></i>
                </div>
            </div>
            <div class="col-xs-6">
                <h5 class="m-b-xs">Sales current year</h5>
                <h1 class="no-margins">
                    <span>&#8358;</span>{{$data['salescurrentyear']}}</h1>
                <div class="font-bold text-navy">98%
                    <i class="fa fa-bolt"></i>
                </div>
            </div>
        </div>


        <table class="table small m-t-sm">
            <tbody>
                <tr>
                    <td>
                        <strong>{{$data['registeredcustomers']}}</strong> Customers

                    </td>
                    <td>
                        <strong>22</strong> Messages
                    </td>

                </tr>
                <tr>
                    <td>
                        <strong>61</strong> Comments
                    </td>
                    <td>
                        <strong>3</strong> Reported issues
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{$data['registeredagents']}}</strong> Agents
                    </td>
                    <td>
                        <strong>3</strong> Payment Channels
                    </td>
                </tr>
            </tbody>
        </table>



    </div>

</div> --}}

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{-- <span class="label label-primary pull-right">Year</span>
                    <span class="label label-primary pull-right">Month</span> --}}
                    <h5>Income</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦{{ number_format($data['income']) }}</h1>
                    <!--<div class="stat-percent font-bold text-success">98%
                        <i class="fa fa-bolt"></i>
                    </div>-->
                    <small>Total income</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{-- <span class="label label-primary pull-right">Year</span>
                    <span class="label label-primary pull-right">Month</span> --}}
                    <h5>Avg Earning</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦{{number_format($data['avg_earn'])}}</h1>
                    <!--<div class="stat-percent font-bold text-info">20%
                        <i class="fa fa-level-up"></i>
                    </div>-->
                   <small>Average Income for GOENERGEE</small>
                </div>
            </div>
        </div>



        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    
                    Wallet Balance

                    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
                    {{-- <script src="https://js.paystack.co/v1/inline.js"></script> --}}
                    <script src="app.js"></script>

                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">
                        <span>&#8358;</span> {{ number_format($data['wallet_balance']) }}</h1>
                    
                    
                    <small>Operating Wallet Amount Left  with EKEDC</small>
                       
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-14">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Financial Performance - GOENERGEE Admin Report</h4>
            </div>
            
                {{-- <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="customer">Pre Paid</label>
                            <input type="number" id="meter#" name="Meter#" value="" placeholder="Pre Paid Customers" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="amount">Amount</label>
                            <input type="text" id="amount" name="amount" value="" placeholder="Amount" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="amount">District</label>
                            <input type="text" id="district" name="district" value="" placeholder="District" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-md">Search</button>

            </div>  --}}
            {{-- <div class="form-group" id="data_5">
                <label class="font-noraml">Range select</label>
                <div class="input-daterange input-group" id="datepicker">
                    <input type="text" class="input-sm form-control" name="start" value="05/14/2014"/>
                    <span class="input-group-addon">to</span>
                    <input type="text" class="input-sm form-control" name="end" value="05/22/2014" />
                </div>
            </div> --}}
            
            
            <div class="row">
                <div class="col-lg-12">
                        <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                   
                                    <div class="ibox-content">
        
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                        <tr>

                                                                <th>S/N</th>
                                                                <th data-hide="phone"># Customer base</th>
                                                                <th data-hide="phone"># of Agents</th>
                                                                <th data-hide="phone">Average Transaction</th>
                                                                <th data-hide="phone">Average Daily Energy Usage</th>
                                                                <th data-hide="phone"># of Post Paid Users</th>
                                                                <th data-hide="phone"># of Prepaid Users</th>
                                                                <th data-hide="phone">Avg Daily Profit</th>
                                                                <th data-hide="phone">Avg Previous Monthly Sales</th>
                                                                {{-- <th data-hide="phone"># Issues Reported</th>
                                                                <th data-hide="phone">% of Issue Resolved</th> --}}
                        
                        
                                                            </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="gradeX">
                                                            <td>
                                                                    1
                                                                </td>
                                                                <td>
                                                                   {{ $data['customers'] }}
                                                                </td>
                                                                <td>
                                                                    {{ $data['agents']}}
                                                                </td>
                                                                <td>
                                                                    ₦{{ round($data['avg_transaction'],2)}}
                                                                </td>
                                                                <td>
                                                                    140KwH
                                                                </td>
                                                                <td>
                                                                    {{ $data['postpaid_users']}}
                                                                </td>
                        
                                                                <td>
                                                                        {{ $data['prepaid_users']}}
                                                                </td>
                                                                <td>
                                                                    {{ number_format($data['avg_daily_p'])}}
                                                                </td>
                                                                <td>
                                                                    {{ number_format($data['avgMonthlySales'])}}
                                                                </td>
                                                                {{-- <td>
                                                                    3
                                                                </td>
                                                                <td>
                                                                    98%
                                                                </td> --}}
                                                    </tr>
                                                   
                                                </tfoot>
                                            </table>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    <div class="footer">

        <div>
            <strong>Copyright</strong> GOENERGEE &copy; 2018
        </div>
    </div>
</div>

</div>
@endsection
@push('scripts')

    <script>
        let token = "{{ csrf_token() }}";
        postData(`/login-api`, {
            email:"admin@goenergee.com",
            passowrd: "admin",
            _token: token
        })
        .then(data => console.log(JSON.stringify(data))) // JSON-string from `response.json()` call
        .catch(error => console.error(error));

        function postData(url = ``, data = {}) {
        // Default options are marked with *
            return fetch(url, {
                method: "POST", // *GET, POST, PUT, DELETE, etc.
                mode: "no-cors", // no-cors, cors, *same-origin
                cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                // credentials: "same-origin", // include, same-origin, *omit
                headers: {
                    "Content-Type": "application/json; charset=utf-8",
                    // "Content-Type": "application/x-www-form-urlencoded",
                },
                // redirect: "follow", // manual, *follow, error
                referrer: "no-referrer", // no-referrer, *client
                body: JSON.stringify(data), // body data type must match "Content-Type" header
            })
            .then(response => response.json()); // parses response to JSON
        }
        // $.ajax({
        //     url: "http://localhost:8000/login-api",
        //     method: "POST",
        //     crossDomain: true,
        //     headers: {
        //         'Access-Control-Allow-Origin':'*',
        //         'Content-type'
        //     },
        //     data: {
        //         "email":"admin@goenergee.com",
        //         "passowrd": "admin",
        //         "_token": token
        //     },
        //     success: (data) => {
        //         console.log(data);
        //     },
        //     error: (err) => {
        //         console.log(err);
        //     }
        // });
    
    </script>
     <!-- Mainly scripts -->
     <script src="js/jquery-2.1.1.js"></script>
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
 
     <script>
         $(document).ready(function(){
 
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
 
 
         });
         var config = {
                 '.chosen-select'           : {},
                 '.chosen-select-deselect'  : {allow_single_deselect:true},
                 '.chosen-select-no-single' : {disable_search_threshold:10},
                 '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                 '.chosen-select-width'     : {width:"95%"}
                 }
             for (var selector in config) {
                 $(selector).chosen(config[selector]);
             }
 
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
 
         $("#basic_slider").noUiSlider({
             start: 40,
             behaviour: 'tap',
             connect: 'upper',
             range: {
                 'min':  20,
                 'max':  80
             }
         });
 
         $("#range_slider").noUiSlider({
             start: [ 40, 60 ],
             behaviour: 'drag',
             connect: true,
             range: {
                 'min':  20,
                 'max':  80
             }
         });
 
         $("#drag-fixed").noUiSlider({
             start: [ 40, 60 ],
             behaviour: 'drag-fixed',
             connect: true,
             range: {
                 'min':  20,
                 'max':  80
             }
         });
 
 
     </script>
 
@endpush