@extends('customer.master')

@section('customer-section')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Payment History
            </div>
            <div class="ibox-content">
                <table class="table table-responsive" id="myTable">
                    <thead>
                    <tr>
                        <th>ID #</th>
                        <th>Trans Date</th>
                        <th>Trans Ref</th>
                        <th>Trans type</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Meter #</th>
                        <th>Amount</th>
                        <th>PIN</th>
                        <th>Units (KwH)</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $pay)
                            <tr>
                                <td>{{ $pay->id }}</td>
                                <td>{{ $pay->created_at }}</td>
                                <td>{{ $pay->transaction_ref }}</td>
                                <td>Web</td>
                                <td>Successful</td>
                                <td>Pre-Paid</td>
                                <td>{{ $pay->meter_no }}</td>
                                <td>N{{ number_format($pay->total_amount) }}</td>
                                <td>3500 6584 8754 1254</td>
                                <td>650</td>                 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <center>{{ $payments->links()}}</center>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    @endpush
@endsection