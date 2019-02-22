@extends('customer.master')

@section('customer-section')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <div class="row">
    <div class="col-lg-3 col-md-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
              
                <h5>Transaction Count</h5>
            </div>
            
            <div class="ibox-content">
                <h1 class="no-margins">15 <span class="pull-right">25</span></h1>
                <small>Month<span class="pull-right">Year</span></small>

               
          
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                {{-- <span class="label label-info pull-right">Instant Top Up</span> --}}
                <h5>Sum all Previous Payment</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><span>&#8358;</span>25,800</h1>
                <small>Cummulation of  my Transactions</small>
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
                Average spent on Energy  </small>
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
    </div>
    

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
                                <td>{{ $loop->index }}</td>
                                <td>{{ $pay->created_at }}</td>
                                <td>{{ $pay->transaction_ref }}</td>
                                <td>Web</td>
                                <td>Successful</td>
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
    @push('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


    @endpush
    @push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script>
    $(document).ready(function () {
        const tabili = $('#myTable').DataTable({
            dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
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
        $('#type').on('change', function() {
            tabili
                .columns(4)
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
@endpush
@endsection