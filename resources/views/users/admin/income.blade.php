@extends('layouts.admin') @section('content')

<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>INCOME REPORT</h4>
        </div>

        <div class="ibox-content">


            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                        <tr>
                            <th width="16%" data-hide="phone">Trans Date</th>
                            <th width="12%" data-hide="phone">NIBBS</th>
                            <th width="12%" data-hide="phone">Interswtich</th>
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
                                <td width="16%">{{ $income->created_at }}</td>
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
                <table class="table"  style="width: 100%">
                    <thead>
                        <tr>
                                <th  width="16%" data-hide="phone">Total AMount</th>
                                <th  width="12%" data-hide="phone">Null</th>
                                <th  width="12%" data-hide="phone">Null</th>
                                <th  width="12%" data-hide="phone">Null</th>
                                <th  width="12%" data-hide="phone">N{{ $totals['agent'] }}</th>
                                <th  width="12%" data-hide="phone">N{{ $totals['pgp'] }}</th>
                                
                                
                                <th width="12%" data-hide="phone">N{{ $totals['spec'] }}</th>
                                <th width="12%" data-hide="phone">N{{ $totals['ralmuof'] }}</th>
                          
                            
                        </tr>
                    </thead>
                </table>

            </div>
        </div>

    </div>
</div>
@push("scripts")
<!-- Morris -->



    
     <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.19/sorting/date-dd-MMM-yyyy.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                order: [[0,'desc']]
            });
        } );
    </script>
    @endpush
@endsection