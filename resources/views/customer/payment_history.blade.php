@extends('customer.master')

@section('customer-section')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
<div class="row">
    <!--stats card-->
    <div class="col-lg-4 col-md-4">

        <div class="stat">

            <div class="stat__icon-wrapper stat--bg-green">
                <i data-feather="archive" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Previous Payment</h1>
                <p class="stat__subheader"> <span>&#8358;</span>5,000</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4">
        <div class="stat stat">
            <div class="stat__icon-wrapper stat--bg-blue">
                <i data-feather="activity" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Energy Purchased</h1>
                <p class="stat__subheader"><span>&#8358;</span>100</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4">
        <div class="stat stat">
            <div class="stat__icon-wrapper stat--bg-dark_grey">
                <i data-feather="eye" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Transaction Channel </h1><br>
                <p class="stat__subheader">Web</p>
            </div>
        </div>
    </div>
    

</div>
<!--End Stats card -->
<!-- 
<div class="col-lg-3 col-md-3">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
           
            <h5>Sum all Previous Payment</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins"><span>&#8358;</span>25,800</h1>
            <small>Cummulation of my Transactions</small>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-3">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            {{-- <span class="label label-primary pull-right">Year</span>
            <span class="label label-primary pull-right">Month</span>
            <span class="label label-primary pull-right">Week</span>
            <span class="label label-primary pull-right">Today</span> --}}
            <h5>Sum all Energy Purchased</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins"><span>&#8358;</span>120</h1>
            Average spent on Energy </small>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-3">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            {{-- <span class="label label-success pull-right">Year</span>
            <span class="label label-success pull-right">Quater</span>
            <span class="label label-success pull-right">Month</span> --}}
            <h5>Transaction Type</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">Web</h1>
            {{-- <div class="stat-percent font-bold text-success">5%<i class="fa fa-level-down"></i></div> --}}
            <small> Preferred payment channel</small>
        </div>
    </div>
</div> -->

<div class="row" style="margin-top : 20px;">
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Payment History
        </div>
        <div class="ibox-content m-b-sm border-bottom">
            <div class="row">
                <div class="col-md-4">
                    <h4>Filter By Date</h4>
                    <div class="input-group input-daterange">

                        <input type="text" id="min-date" class="form-control date-range-filter" data-date-format="dd/mm/yyyy"
                            placeholder="From:">

                        <div class="input-group-addon">to</div>
                        <input type="text" id="max-date" class="form-control date-range-filter" data-date-format="dd/mm/yyyy"
                            placeholder="To:">
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
                            <option value="POSTPAID">Postpaid</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label" for="amount">Filter By Acc / Meter</label>
                        <input type="text" class="form-control" id="meter_account">
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-responsive" id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Trans Date</th>
                                <th>Trans Ref</th>
                                <th>Trans type</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Meter #</th>
                                <th>Amount</th>
                                <th>PIN</th>
                                <th>Units (KwH)</th>
                                <th>Receipt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $pay)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ date('d/m/Y',strtotime($pay->created_at)) }}</td>
                                <td>{{ $pay->transaction_ref }}</td>
                                <td>Web</td>
                                <td><span class="label label-info">Successful</label></td>
                                <td>{{ str_replace('OFFLINE_','',$pay->user_type) }}</td>
                                <td>{{ $pay->meter_no }}</td>
                                <td>N{{ number_format($pay->transaction->total_amount) }}</td>
                                <td>{{ $pay->token_data }}</td>
                                <td>{{ round($pay->value_of_kwh,2) }}</td>
                                <th><a href="{{ route('download-reciept',$pay->payment_ref) }}" class="btn btn-info">Receipt</a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <center>{{ $payments->links()}}</center>
                    
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{asset('js/index.js')}}"></script>
    {{-- <script src="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/dt-1.10.15/datatables.min.js"></script> --}}
    <script src="https://www.bubt.edu.bd/assets/back/backend/DataTables-1.10.13/DataTables-1.10.13/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script>
        const tabili = $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
                order: [['1','asc']],
                // searching: false
        });
    </script>
    <script>
        $(document).ready(function () {
            //const tabili = $('#myTable').DataTable();

            $('.input-daterange input').each(function() {
                $(this).datepicker('clearDates');
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
                    .columns(3)
                    .search($('#channel').val(), false, true)
                    .draw();
            });
            $('#bank').on('change', function() {
                tabili
                    .columns(8)
                    .search($('#bank').val(), false, true)
                    .draw();
            });
            $('#type').change( function() {
                tabili
                    .columns(5)
                    .search($('#type').val(), false, true)
                    .draw();
            });



            // Extend dataTables search
            $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#min-date').val();
                var max = $('#max-date').val();
                var createdAt = data[1] || 0; // Our date column in the table

                //createdAt=createdAt.split(" ");
                var startDate   = moment(min, "DD/MM/YYYY");
                var endDate     = moment(max, "DD/MM/YYYY");
                var diffDate = moment(createdAt, "DD/MM/YYYY");

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
    @endpush
    @endsection