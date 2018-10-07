@extends('layouts.distributor') @section('content')


<div class="col-lg-14">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Customer Payment History
        </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="order_id">Transaction Reference</label>
                            <input type="text" id="order_id" name="order_id" value="" placeholder="Order ID" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="status">Channel</label>
                            <input type="text" id="channel" name="channel" value="" placeholder="Payment Channel" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="customer">Customer</label>
                            <input type="text" id="customer" name="customer" value="" placeholder="Customer" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Date From</label>
                            <div class="input-group date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input id="date_added" type="text" class="form-control" value="03/04/2018">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="date_modified">Date To</label>
                            <div class="input-group date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input id="date_modified" type="text" class="form-control" value="03/06/2018">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="amount">Amount</label>
                            <input type="text" id="amount" name="amount" value="" placeholder="Amount" class="form-control">
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <table style="border: 1px solid black;">
                                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="5">

                                    <thead>
                                        <tr>

{{-- 
                                            <th>Timestamp</th>
                                            <th>Trans Ref</th>
                                            <th>Channel</th>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Meter #</th>
                                            <th>District</th>
                                            <th>Amount Paid</th>
                                            <th>TOKEN</th>
                                            <th>KwH</th>
                                            <th>Conv. Fee</th>
                                            <th>Commission</th>
                                            <th>Total</th> --}}



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                2/5/2018
                                            </td>
                                            <td>
                                                3WQ
                                            </td>
                                            <td>
                                                Web
                                            </td>
                                            <td>
                                                Pre-Paid
                                            </td>
                                            <td>
                                                Emeka Chig
                                            </td>

                                            <td>
                                                <span class="label label-primary">Successfull</span>
                                            </td>

                                            <td>
                                                45897421
                                            </td>
                                            <td>
                                                Lekki
                                            </td>
                                            <td>
                                                ₦5,000.00
                                            </td>
                                            <td>
                                                9807 2676
                                            </td>
                                            <td>
                                                254
                                            </td>
                                            <td>
                                                ₦100
                                            </td>
                                            <td>
                                                ₦270
                                            </td>
                                            <td>
                                                ₦4,630
                                            </td>



                                        </tr>
                                        <tr>
                                            <td>
                                                2/5/2018
                                            </td>
                                            <td>
                                                3WQ
                                            </td>
                                            <td>
                                                Web
                                            </td>
                                            <td>
                                                Pre-Paid
                                            </td>
                                            <td>
                                                Green Allen
                                            </td>

                                            <td>
                                                <span class="label label-primary">Successfull</span>
                                            </td>

                                            <td>
                                                45897421
                                            </td>
                                            <td>
                                                Lekki
                                            </td>
                                            <td>
                                                ₦5,000.00
                                            </td>
                                            <td>
                                                9807 2676
                                            </td>
                                            <td>
                                                254
                                            </td>
                                            <td>
                                                ₦100
                                            </td>
                                            <td>
                                                ₦270
                                            </td>
                                            <td>
                                                ₦4,630
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                2/5/2018
                                            </td>
                                            <td>
                                                3WQ
                                            </td>
                                            <td>
                                                Web
                                            </td>
                                            <td>
                                                Pre-Paid
                                            </td>
                                            <td>
                                                Nebo Hill
                                            </td>

                                            <td>
                                                <span class="label label-primary">Successfull</span>
                                            </td>

                                            <td>
                                                45897421
                                            </td>
                                            <td>
                                                Lekki
                                            </td>
                                            <td>
                                                ₦5,000.00
                                            </td>
                                            <td>
                                                9807 2676
                                            </td>
                                            <td>
                                                254
                                            </td>
                                            <td>
                                                ₦100
                                            </td>
                                            <td>
                                                ₦270
                                            </td>
                                            <td>
                                                ₦4,630
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                2/5/2018
                                            </td>
                                            <td>
                                                3WQ
                                            </td>
                                            <td>
                                                Web
                                            </td>
                                            <td>
                                                Pre-Paid
                                            </td>
                                            <td>
                                                Amaka Green
                                            </td>

                                            <td>
                                                <span class="label label-primary">Successfull</span>
                                            </td>

                                            <td>
                                                45897421
                                            </td>
                                            <td>
                                                Lekki
                                            </td>
                                            <td>
                                                ₦5,000.00
                                            </td>
                                            <td>
                                                9807 2676
                                            </td>
                                            <td>
                                                254
                                            </td>
                                            <td>
                                                ₦100
                                            </td>
                                            <td>
                                                ₦270
                                            </td>
                                            <td>
                                                ₦4,630
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                2/5/2018
                                            </td>
                                            <td>
                                                3WQ
                                            </td>
                                            <td>
                                                Web
                                            </td>
                                            <td>
                                                Pre-Paid
                                            </td>
                                            <td>
                                                Robin
                                            </td>

                                            <td>
                                                <span class="label label-primary">Successfull</span>
                                            </td>

                                            <td>
                                                45897421
                                            </td>
                                            <td>
                                                Lekki
                                            </td>
                                            <td>
                                                ₦5,000.00
                                            </td>
                                            <td>
                                                9807 2676
                                            </td>
                                            <td>
                                                254
                                            </td>
                                            <td>
                                                ₦100
                                            </td>
                                            <td>
                                                ₦270
                                            </td>
                                            <td>
                                                ₦4,630
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                2/5/2018
                                            </td>
                                            <td>
                                                3WQ
                                            </td>
                                            <td>
                                                Web
                                            </td>
                                            <td>
                                                Pre-Paid
                                            </td>
                                            <td>

                                            </td>

                                            <td>
                                                <span class="label label-primary">Successfull</span>
                                            </td>

                                            <td>
                                                45897421
                                            </td>
                                            <td>
                                                Lekki
                                            </td>
                                            <td>
                                                ₦5,000.00
                                            </td>
                                            <td>
                                                9807 2676
                                            </td>
                                            <td>
                                                254
                                            </td>
                                            <td>
                                                ₦100
                                            </td>
                                            <td>
                                                ₦270
                                            </td>
                                            <td>
                                                ₦4,630

                                        </tr>
                                        <tr>
                                            <td>
                                                2/5/2018
                                            </td>
                                            <td>
                                                3WQ
                                            </td>
                                            <td>
                                                Web
                                            </td>
                                            <td>
                                                Pre-Paid
                                            </td>
                                            <td>

                                            </td>

                                            <td>
                                                <span class="label label-primary">Successfull</span>
                                            </td>

                                            <td>
                                                45897421
                                            </td>
                                            <td>
                                                Lekki
                                            </td>
                                            <td>
                                                ₦5,000.00
                                            </td>
                                            <td>
                                                9807 2676
                                            </td>
                                            <td>
                                                254
                                            </td>
                                            <td>
                                                ₦100
                                            </td>
                                            <td>
                                                ₦270
                                            </td>
                                            <td>
                                                ₦4,630
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                2/5/2018
                                            </td>
                                            <td>
                                                3WQ
                                            </td>
                                            <td>
                                                Web
                                            </td>
                                            <td>
                                                Pre-Paid
                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <span class="label label-primary">Successfull</span>
                                            </td>

                                            <td>
                                                45897421
                                            </td>
                                            <td>
                                                Lekki
                                            </td>
                                            <td>
                                                ₦5,000.00
                                            </td>
                                            <td>
                                                9807 2676
                                            </td>
                                            <td>
                                                254
                                            </td>
                                            <td>
                                                ₦100
                                            </td>
                                            <td>
                                                ₦270
                                            </td>
                                            <td>
                                                ₦4,630
                                            </td>

                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <ul class="pagination pull-right"></ul>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
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

        <div class="footer">

            <div>

                <strong>Copyright</strong> GOENERGEE &copy; 2018
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script src="js/plugins/chartJs/Chart.min.js"></script>
<script src="js/demo/chartjs-demo.js"></script>

@endpush @endsection