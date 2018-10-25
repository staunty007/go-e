@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <h3>Payments History</h3>

                        <table class="table data-table table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Meter No</th>
                                    <th>Recharge Pin</th>
                                    <th>Trans. Type</th>
                                    <th>Trans. Ref.</th>
                                    <th>Value Of KWH</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($customer_pay as $pay)
                                    <tr>
                                        <td>{{ $pay->id }}</td>
                                        <td>{{ $pay->created_at }}</td>
                                        <td>{{ $pay->meter_no }}</td>
                                        <td>{{ $pay->recharge_pin }}</td>
                                        <td>{{ $pay->transaction_type }}</td>
                                        <td>{{ $pay->transaction_ref }}</td>
                                        <td>{{ $pay->value_of_kwh }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
    @push('scripts')
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>


    <script>
        $(document).ready( function () {
            $('.data-table').DataTable();
        } );
    </script>
    @endpush

@endsection