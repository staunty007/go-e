@extends('layouts.admin') @section('content')
<!-- <div class="row">


    <div class="col-lg-4 col-md-4">

        <div class="stat">

            <div class="stat__icon-wrapper stat--bg-dark-yellow">
                <i data-feather="activity" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Energy Distributed</h1>
                <p class="stat__subheader"> 705<span>KwH</span></p>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4">
        <div class="stat stat--has-icon-right">
            <div class="stat__icon-wrapper stat--bg-blue">
                <i data-feather="trending-up" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Energy Paid</h1>
                <p class="stat__subheader">600<span>KwH</span></p>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="stat stat--has-icon-right">
            <div class="stat__icon-wrapper stat--bg-dark-red">
                <i data-feather="battery-charging" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
                <h1 class="stat__header">Energy Theft</h1>
                <p class="stat__subheader"> 105<span>KwH</span></p>
            </div>
        </div>
    </div>
</div>

<div class="row">


    <div class="col-lg-4 col-md-4">
        <div class="stat stat--bg-yellow">
            <div class="stat__icon-wrapper stat--bg-dark-yellow">
                <i data-feather="wind" class="stat__icon"></i>
            </div>
            <div class="stat__data">
                <p class="stat__header">4,800</p>
                <p class="stat__subheader">Power Vandalisation Reports</p>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-4">
        <div class="stat stat--bg-blue">
            <div class="stat__icon-wrapper stat--bg-dark-blue">
                <i data-feather="trending-down" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
       
                <p class="stat__header stat--color-white">Lowest Uptime District</p>
                <p class="stat__subheader stat--color-white">Ibeju</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="stat stat--bg-red stat--has-icon-right">
            <div class="stat__icon-wrapper stat--bg-dark-red">
                <i data-feather="zap-off" class="stat__icon stat--color-white"></i>
            </div>
            <div class="stat__data">
            <h1 class="stat__header">Power Outage</h1>
                <p class="stat__header stat--color-white"> <span>&#8358;</span>487</p>
                <p class="stat__subheader stat--color-white">Loss in revenue  </p>
            </div>
        </div>
    </div>


</div> -->

<div class="col-lg-14">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>Customer Energy Utilization Report</h4>
        </div>

        <div class="ibox-content">

            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox-content m-b-sm border-bottom">
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Filter By Date</h4>
                                <div class="input-group input-daterange">

                                    <input type="text" id="min-date" class="form-control date-range-filter"
                                        data-date-format="dd/mm/yy" placeholder="From:">

                                    <div class="input-group-addon">to</div>
                                    <input type="text" id="max-date" class="form-control date-range-filter"
                                        data-date-format="dd/mm/yy" placeholder="To:">
                                </div>
                           
                        <!-- <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label" for="amount">Filter By District</label>
                                    <select id="district" class="form-control">
                                        <option value="">All</option>
                                        <option value="">All</option>
                                        <option value="Agbara">Agbara</option>
                                        <option value="Apapa">Apapa</option>
                                        <option value="Festac">Festac</option>
                                        <option value="Ibeju">Ibeju</option>
                                        <option value="Ijora">Ijora</option>
                                        <option value="Island">Island</option>
                                        <option value="Lekki">Lekki</option>
                                        <option value="Mushin">Mushin</option>
                                        <option value="Ojo">Ojo</option>
                                        <option value="Orile">Orile</option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-2">
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
                                    <label class="control-label" for="amount">Filter By Type</label>
                                    <select id="type" class="form-control">
                                        <option value="">All</option>
                                        <option value="PREPAID">Prepaid</option>
                                        <option value="Postpaid">Postpaid</option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label" for="amount">Filter By Acc / Meter</label>
                                    <input type="text" class="form-control" id="meter_account">
                                </div>
                            </div> -->
                        </div>
                        <!-- Row ends -->



            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Customer Name</th>
                        <th>Meter owner</th>
                        <th>Email</th>
                        <th>Meter No</th>
                        <th>Meter Type</th>
                        <th>Energy Consumed</th>
                        <th>Avg daily Consumption</th>
                        <th>Customer District</th>




                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>G0-01</td>
                        <td>2/5/2018</td>
                        <td>620</td>
                        <td>500</td>
                        <td>750</td>
                        <td>900</td>
                        <td>800</td>
                        <td>600</td>
                        <td>800</td>
                        <td>800</td>
                        <td>600</td>
                      





                    </tr>

                </tbody>
            </table>

        </div>
    </div>

</div>
</div>
@push("scripts")
<!-- Morris -->
<script src="{{asset('js/index.js')}}"></script>
<!-- Flot demo data -->
<script src="{{asset('js/demo/flot-demo.js')}}"></script>
<script src="{{asset('js/plugins/morris/raphael-2.1.0.min.js')}}"></script>
<script src="{{asset('js/plugins/morris/morris.js')}}"></script>
<script src="{{asset('js/demo/morris-demo.js')}}"></script>
<script src="{{asset('app-assets/js/tab.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/tab.js')}}" type="text/javascript"></script>
@endpush
@endsection