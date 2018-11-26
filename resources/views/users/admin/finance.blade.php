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
                Financial Performance for GOENERGEE
            </div>
            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Filter By Date</h4>
                        <div class="input-group input-daterange">
                    
                            <input type="text" id="min-date" class="form-control date-range-filter" data-date-format="dd/mm/yy" placeholder="From:">
                    
                            <div class="input-group-addon">to</div>
                            <input type="text" id="max-date" class="form-control date-range-filter" data-date-format="dd/mm/yy" placeholder="To:">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row"> 
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="amount">Filter By District</label>
                            <select id="district" class="form-control">
                                <option value="">All</option>
                                <option value="Agbara">Agbara</option>
                                <option value="Ojo">Ojo</option>
                                <option value="Festac">Festac</option>
                                <option value="Ijora">Ijora</option>
                                <option value="Mushin">Mushin</option>
                                <option value="Apapa">Apapa</option>
                                <option value="Lekki">Lekki</option>
                                <option value="Island">Island</option>
                                <option value="Ibeju">Ibeju</option>
                                <option value="Orile">Orile</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="amount">Filter By Channel</label>
                            <select id="channel" class="form-control">
                                <option value="">All</option>
                                <option value="Web">Web</option>
                                <option value="POS">POS</option>
                                <option value="Mobile">Ussd</option>
                                <option value="Mobile">mVisa</option>
                                <option value="Mobile">Agency</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="amount">Filter By Bank</label>
                            <select id="bank" class="form-control">
                                <option value="">All Banks</option>
                                <option value="Access Bank Plc">Access Bank Plc</option>
                                <option value="Citibank Nigeria Limited">Citibank Nigeria Limited</option> 
                                <option value="Diamond Bank Plc">Diamond Bank Plc</option>
                                <option value="Ecobank Nigeria Plc">Ecobank Nigeria Plc</option>
                                <option value="Fidelity Bank Plc">Fidelity Bank Plc</option>
                                <option value="FIRST BANK NIGERIA LIMITED">FIRST BANK NIGERIA LIMITED</option>
                                <option value="First City Monument Bank Plc">First City Monument Bank Plc</option>
                                <option value="Guaranty Trust Bank Plc">Guaranty Trust Bank Plc</option>
                                <option value="Heritage Banking Company Ltd">Heritage Banking Company Ltd</option> 
                                <option value="Key Stone Bank">Key Stone Bank</option>
                                <option value="Polaris Bank">Polaris Bank</option>
                                <option value="Providus Bank">Providus Bank</option> 
                                <option value="Stanbic IBTC Bank Ltd">Stanbic IBTC Bank Ltd</option> 
                                <option value="Standard Chartered Bank Nigeria Ltd">Standard Chartered Bank Nigeria Ltd</option>
                                <option value="Sterling Bank Plc">Sterling Bank Plc</option>
                                <option value="SunTrust Bank Nigeria Limited">SunTrust Bank Nigeria Limited</option>
                                <option value="Union Bank of Nigeria Plc">Union Bank of Nigeria Plc</option>
                                <option value="United Bank For Africa Plc">United Bank For Africa Plc</option> 
                                <option value="Unity Bank Plc">Unity Bank Plc</option>
                                <option value="Wema Bank Plc">Wema Bank Plc</option>
                                <option value="Zenith Bank Plc">Zenith Bank Plc</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="amount">Filter By Type</label>
                            <select id="type" class="form-control">
                                <option value="">All</option>
                                <option value="PREPAID">Prepaid</option>
                                <option value="Postpaid">Postpaid</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="amount">Filter By Acc / Meter</label>
                            <input type="text" class="form-control" id="meter_account">
                        </div>
                    </div>
                </div> <!-- Row ends -->
            </div>

        </div>

                                <div class="ibox">

            <div class="ibox" style="overflow-x:auto;">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Ref</th>
                                    <th>Channel</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>District</th>
                                    <th>Bank</th>
                                    <th>Status</th>
                                    <th>Meter #</th>
                                    <th>Standard Token</th>
                                    <th>BSST Token</th>
                                    <th>KwH</th>
                                    <th>Amount Paid</th>
                                    <th>Commission</th>
                                    <th>Net Total</th>
                                    <th>Wallet Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($finances as $d)
                                <tr>
                                    <td>{{ date('d/m/y h:i:s', strtotime($d->created_at) ) }}</td>
                                    <td>{{ $d->payment_ref }}</td>
                                    <td>Web</td>
                                    <td>{{ str_replace('OFFLINE_','',$d->user_type)}} </td>
                                    <td>{{ $d->first_name." ". $d->last_name }}</td>
                                    <td>{{ $d->customer_address }}</td>
                                    <td>{{ $d->district }}</td>
                                    <td>Bank</td>
                                    <td>
                                        <span class="label label-primary">Successful</span>
                                    </td>
                                    <td>
                                        {{ $d->meter_no }}
                                    </td>
                                    <td>
                                        {{ $d->token_data }}
                                    </td>
                                    <td> {{ $d->bonus_token }}</td>
                                    <td>
                                        {{ round($d->value_of_kwh,2)}}
                                    </td>
                                    <td>
                                        {{ number_format($d->transaction->initial_amount)}}
                                    </td>
                                    <td>
                                        {{ number_format($d->transaction->commission)}}
                                    </td>
                                    <td>
                                        {{ number_format($d->transaction->initial_amount - $d->transaction->commission)}}
                                    </td>
                                    <td>
                                        {{ number_format($d->transaction->wallet_bal)}}
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script>
    $(document).ready(function () {
        const tabili = $('#myTable').DataTable({
            order: [['0','desc']],
            // searching: false
        });

        $('.dataTables_filter').hide();

        $('#meter_account').on('keyup', function() {
           tabili
                .search($('#meter_account').val(), false, true)
                .draw();
        });
        $('#district').on('change', function() {
            tabili
                .search($('#district').val(), false, true)
                .draw();
        });
        $('#channel').on('change', function() {
            tabili
                .columns(2)
                .search($('#channel').val(), false, true)
                .draw();
        });
        $('#bank').on('change', function() {
            tabili
                .columns(7)
                .search($('#bank').val(), false, true)
                .draw();
        });
        $('#type').on('change', function() {
            tabili
                .columns(3)
                .search($('#type').val(), false, true)
                .draw();
        });

        // $(".pickadate").pickadate();
        $('.input-daterange input').each(function() {
            $(this).datepicker('clearDates');
        });


        // Extend dataTables search
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#min-date').val();
                var max = $('#max-date').val();
                var createdAt = data[0] || 0; // Our date column in the table
            //createdAt=createdAt.split(" ");
                var startDate   = moment(min, "DD/MM/YY");
                var endDate     = moment(max, "DD/MM/YY");
                var diffDate = moment(createdAt, "DD/MM/YY");

                if ( (min == "" || max == "") || diffDate.isBetween(startDate, endDate, 'days'))
                {  return true;  }
                
                return false;
            }
        );

        // Re-draw the table when the a date range filter changes
        $('.date-range-filter').change(function() {
            tabili.draw();
        });

    });
</script>


    {{-- <script>
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
 
 
     </script> --}}
 
@endpush