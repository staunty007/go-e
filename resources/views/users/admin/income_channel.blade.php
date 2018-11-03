@extends('layouts.admin') @section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">


        <div class="col-lg-6 col-md-6" style="width:100%">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    INCOME CHANNEL REPORT


                </div>


                <div class="ibox-content m-b-sm border-bottom">
                    <div class="row">
                        <div class="col.md-6">
                            <label>Advanced Date range Search</label>
                            <input type="text" name="datetimes" />

                        </div>
                        <div class="col.md-6"></div>

                    </div>
                    <div style="overflow-x:auto;">
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example">


                                    <thead>
                                        <tr>
                                            <th data-hide="phone">Trans Date</th>
                                            <th data-hide="phone">Web</th>
                                            <th data-hide="phone">Mobile</th>
                                            <th data-hide="phone">USSD</th>
                                            <th data-hide="phone">POS</th>
                                            <th data-hide="phone">Mvisa</th>




                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

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

                            </div>
                        </div>


                    </div>




                </div>

            </div>




        </div>
        @push('scripts')

        <script src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="js/plugins/fullcalendar/moment.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#myTable').DataTable({
                    order: [
                        [0, 'desc']
                    ]
                });
            });
        </script>
        <script>
            $(function () {
                $('input[name="datetimes"]').daterangepicker({
                    timePicker: true,
                    startDate: moment().startOf('hour'),
                    endDate: moment().startOf('hour').add(32, 'hour'),
                    locale: {
                        format: 'M/DD hh:mm A'
                    }
                });
            });
        </script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>


<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
@endpush
@endsection
      