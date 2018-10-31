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
                        <th>Reciept</th>
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
                                <td>
                                    @if($pay->user_type == 1) 
                                        Prepaid
                                    @else
                                        Postpaid
                                    @endif
                                </td>
                                <td>{{ $pay->meter_no }}</td>
                                <td>N{{ number_format($pay->transaction->total_amount) }}</td>
                                <td></td>
                                <td>{{ $pay->recharge_pin }}</td>
                                <td>{{ round($pay->value_of_kwh,2) }}</td>  
                                <th><a href="{{ route('view-pay-history',$pay->id) }}" class="btn btn-info">Reciept</a></th>               
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