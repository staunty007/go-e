@extends('layouts.agent') @section('content')
            <div class="wrapper wrapper-content">
        <div class="row">
                   <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                               
                                <h5>Wallet Balance</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><span>&#8358;</span>{{ number_format($balance) }}</h1>
                                <!--<div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>-->
                                {{-- <small>Customers</small> --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                
                                <h5>Last Topup Amount</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><span>&#8358;</span>{{ number_format($theLast) }}</h1>
                                {{-- <div class="stat-percent font-bold text-navy">4% <i class="fa fa-level-up"></i></div> --}}
                                {{-- <small>Average daily amount received</small> --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                               
                                <h5>Total Year to date Transaction</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><span>&#8358;</span>{{ number_format($allSold) }}</h1>
                                <!--<div class="stat-percent font-bold text-success">5%<i class="fa fa-level-down"></i></div>-->
                                {{-- <small>Cumulative Transacted Amount</small> --}}
                            </div>
                        </div>
					</div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
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
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($finances as $d)
                                        <tr>
                                            <td>{{ date('d/m/y h:i:s A', strtotime($d->created_at) ) }}</td>
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
                                                {{ number_format($d->agent_transaction->initial_amount)}}
                                            </td>
                                            <td>
                                                {{ number_format($d->agent_transaction->commission)}}
                                            </td>
                                            <td>
                                                {{ number_format($d->agent_transaction->initial_amount - $d->agent_transaction->commission)}}
                                            </td>
                                           
        
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                {{--<ul class="pagination pull-right"></ul>--}}
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

            <!-- ChartJS-->
            @endpush