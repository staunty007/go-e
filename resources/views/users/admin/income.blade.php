@extends('layouts.admin') @section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">




<!-- <div class="container">
        <div class="stat stat--bg-blue stat--has-icon-right">
            <div class="stat__icon-wrapper">
                <i data-feather="server" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header stat--color-white">3,700</p>
                <p class="stat__subheader stat--color-white">Servers Started</p>
            </div>
        </div>
        <div class="stat stat--bg-green">
            <div class="stat__icon-wrapper">
                <i data-feather="search" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header">7.85 M</p>
                <p class="stat__subheader">Searches</p>
            </div>
        </div>
        <div class="stat stat--bg-yellow stat--has-icon-right">
            <div class="stat__icon-wrapper">
                <i data-feather="file-plus" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header">38</p>
                <p class="stat__subheader">Files Made</p>
            </div>
        </div>
        <div class="stat stat--bg-orange">
            <div class="stat__icon-wrapper">
                <i data-feather="eye" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data stat--has-text-right">
                <p class="stat__header stat--color-white">4,058,201</p>
                <p class="stat__subheader stat--color-white">Page Views</p>
            </div>
        </div>
    </div> -->
    @include('includes.totals')
<!-- <div class="col-lg-4">
        <div class="stat__icon-wrapper stat--bg-red">
            <i data-feather="headphones" class="stat__icon"></i>
        </div>
        <div class="stat__data stat--has-text-right">
            <h1 class="stat__header">8.21 B</h1>
            <p class="stat__subheader">Songs Played</p>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="stat stat--has-icon-right">
            <div class="stat__icon-wrapper stat--bg-yellow">
                <i data-feather="image" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">458</h1>
                <p class="stat__subheader">Images Viewed</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="stat stat--has-icon-right">
            <div class="stat__icon-wrapper">
                <i data-feather="message-square" class="stat__icon stat--color-blue"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header stat--color-blue">230</h1>
                <p class="stat__subheader">Messages Sent</p>
            </div>
        </div>
        <div class="stat">
            <div class="stat__icon-wrapper">
                <i data-feather="pie-chart" class="stat__icon stat--color-red"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">38 M</h1>
                <p class="stat__subheader">Pies Charted</p>
            </div>
        </div>
        <div class="stat stat--has-icon-right">
            <div class="stat__icon-wrapper">
                <i data-feather="moon" class="stat__icon stat--color-green"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">85.28%</h1>
                <p class="stat__subheader">Moons Witnessed</p>
            </div>
        </div>
        <div class="stat">
            <div class="stat__icon-wrapper">
                <i data-feather="package" class="stat__icon stat--color-orange"></i>
            </div>
            <div class="stat__data stat--has-text-right">
                <h1 class="stat__header stat--color-orange">Packages Received</h1>
                <p class="stat__subheader"><strong>32</strong> (7 Day Average)</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="stat stat--bg-yellow">
            <div class="stat__icon-wrapper stat--bg-dark-yellow">
                <i data-feather="printer" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header">4,800</p>
                <p class="stat__subheader">Pages Printed</p>
            </div>
        </div>
        <div class="stat stat--bg-red stat--has-icon-right">
            <div class="stat__icon-wrapper stat--bg-dark-red">
                <i data-feather="shopping-bag" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header stat--color-white">487</p>
                <p class="stat__subheader stat--color-white">Products Purchased</p>
            </div>
        </div>
        <div class="stat stat--bg-blue">
            <div class="stat__icon-wrapper stat--bg-dark-blue">
                <i data-feather="star" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header stat--color-white">81 M</p>
                <p class="stat__subheader stat--color-white">Fallen Stars</p>
            </div>
        </div>
        <div class="stat stat--bg-green stat--has-icon-right">
            <div class="stat__icon-wrapper stat--bg-dark-green">
                <i data-feather="thumbs-up" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header">2,001</p>
                <p class="stat__subheader">Likes Received</p>
            </div>
        </div> -->

<!-- <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{-- <span class="label label-primary pull-right">Year</span>
                    <span class="label label-primary pull-right">Month</span> --}}
                    <h5>Income</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">₦</h1> -->
<!--<div class="stat-percent font-bold text-success">98%
                        <i class="fa fa-bolt"></i>
                    </div>-->
<!-- <small>Total income</small>
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
                    <h1 class="no-margins">₦</h1> -->
<!--<div class="stat-percent font-bold text-info">20%
                        <i class="fa fa-level-up"></i>
                    </div>-->
<!-- <small>Average Income for GOENERGEE</small>
                </div>
            </div>
        </div>



        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    Wallet Balance

                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">
                        <span>&#8358;</span> </h1>


                    <small>Operating Wallet Amount Left with EKEDC</small>

                </div>
            </div>
        </div> -->


<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>INCOME REPORT</h4>
            </div>
            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Filter By Date</h4>
                        <div class="input-group input-daterange">

                            <input type="text" id="min-date" class="form-control date-range-filter" data-date-format="dd/mm/yy"
                                placeholder="From:">

                            <div class="input-group-addon">to</div>
                            <input type="text" id="max-date" class="form-control date-range-filter" data-date-format="dd/mm/yy"
                                placeholder="To:">
                        </div>
                    </div>
                </div>
                <br>
                <!-- Row ends -->

                <div class="ibox-content">


                    <div class="table-responsive">
                        <table id="table" class="display" style="width:100%">
                        <table class="table table-striped table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th width="16%" data-hide="phone">Trans Date</th>
                                        <th width="12%" data-hide="phone">NIBBS</th>
                                        <th width="12%" data-hide="phone">Interswitch</th>
                                        <th width="12%" data-hide="phone">ITEX</th>
                                        <th width="12%" data-hide="phone">Agent</th>
                                        <th width="12%" data-hide="phone">Paystack</th>

                                        {{-- <th>BAL</th> --}}
                                        <th width="12%" data-hide="phone">SPEC</th>
                                        <th width="12%" data-hide="phone">RKL</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($incomes as $income)
                                    <tr>
                                        {{-- <td width="16%">{{ date('d-m-Y, h:i:s A', strtotime($income->created_at)) }}</td> --}}
                                        <td width="16%">{{ date('d/m/Y', strtotime($income->created_at)) }}</td>
                                        <td width="12%"></td>
                                        <td width="12%"></td>
                                        <td width="12%"></td>
                                        <td width="12%">{{ $income->agent }}</td>
                                        <td width="12%">{{ $income->pgp}}</td>
                                        <td width="12%">{{ $income->spec }}</td>
                                        <td width="12%">{{ $income->ralmuof }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th width="16%" data-hide="phone">Total Amount</th>
                                        <th width="12%" data-hide="phone"><span>&#8358;</span></th>
                                        <th width="12%" data-hide="phone"><span>&#8358;</span></th>
                                        <th width="12%" data-hide="phone"><span>&#8358;</span></th>
                                        <th width="12%" data-hide="phone"><span>&#8358;</span>{{ $totals['agent'] }}</th>
                                        <th width="12%" data-hide="phone"><span>&#8358;</span>{{ $totals['pgp'] }}</th>


                                        <th width="12%" data-hide="phone"><span>&#8358;</span>{{ $totals['spec'] }}</th>
                                        <th width="12%" data-hide="phone"><span>&#8358;</span>{{ $totals['ralmuof'] }}</th>


                                    </tr>
                                </thead>
                            </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Income Report </h5>

            </div>
            <div class="ibox-content">
                <div>
                    <canvas id="doughnutChart" height="140"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>




</div>
@push("scripts")
<!-- Morris -->



<script src="https://www.bubt.edu.bd/assets/back/backend/DataTables-1.10.13/DataTables-1.10.13/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script>
    $(document).ready(function () {
        const tabili = $('#myTable').DataTable({
            "order": [[ 0, "desc" ]]
        });

        $('.input-daterange input').each(function () {
                $(this).datepicker('clearDates');
            });


        // Extend dataTables search
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = $('#min-date').val();
                var max = $('#max-date').val();
                var createdAt = data[0] || 0; // Our date column in the table
                //createdAt=createdAt.split(" ");
                var startDate = moment(min, "DD/MM/YYYY");
                var endDate = moment(max, "DD/MM/YYYY");
                var diffDate = moment(createdAt, "DD/MM/YYYY");

                if ((min == "" || max == "") || diffDate.isBetween(startDate, endDate, 'days')) {
                    return true;
                }

                return false;
            }
        );

        // Re-draw the table when the a date range filter changes
        $('.date-range-filter').change(function () {
            tabili.draw();
        });

    });

    

</script>
<script src="{{asset('js/index.js')}}"></script>
<!-- Mainly scripts -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>
<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

<!-- ChartJS-->
<script src="{{asset('js/plugins/chartJs/Chart.min.js')}}"></script>
<script src="{{asset('js/demo/chartjs-demo.js')}}"></script>
@endpush
@endsection