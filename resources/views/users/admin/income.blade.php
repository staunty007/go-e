@extends('layouts.admin') @section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12" style="width:100%">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        INCOME REPORT
                    </div>
                    <div class="ibox-content m-b-sm border-bottom">
                                    <div style="overflow-x:auto;">
                                                    <div class="ibox-content">
                <table class="table" id="myTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-hide="phone">Trans Date</th>
                                        <th data-hide="phone">NIBBS</th>
                                        <th data-hide="phone">Interswtich</th>
                                        <th data-hide="phone">ITEX</th>
                                        <th data-hide="phone">Agent</th>
                                        <th data-hide="phone">Paystack</th>
                                        
                                        {{-- <th>BAL</th> --}}
                                        <th data-hide="phone">SPEC</th>
                                        <th data-hide="phone">RKL</th>
                                        
                                      
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($incomes as $income)
                                        <tr>
                                            <td>{{ $income->created_at }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $income->agent }}</td>
                                            <td>{{ $income->pgp}}</td>
                                            <td>{{ $income->spec }}</td>
                                            <td>{{ $income->ralmuof }}</td>
                                        </tr>
                                    @endforeach
                                        
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7"> <ul class="pagination pull-right"></ul></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <table class="table" id="myTable" style="width: 100%">
                                <thead>
                                    <tr>
                                            <th data-hide="phone">Total AMount</th>
                                            <th data-hide="phone">Null</th>
                                            <th data-hide="phone">Null</th>
                                            <th data-hide="phone">Null</th>
                                            <th data-hide="phone">N{{ $totals['agent'] }}</th>
                                            <th data-hide="phone">N{{ $totals['pgp'] }}</th>
                                            
                                            {{-- <th>BAL</th> --}}
                                            <th data-hide="phone">N{{ $totals['spec'] }}</th>
                                            <th data-hide="phone">N{{ $totals['ralmuof'] }}</th>
                                        {{-- <th colspan="20">Total</th>
                                        <th>Null</th>
                                        <th>Null</th>
                                        <th>Null</th>
                                        <th>N{{ $totals['agent'] }}</th>
                                        <th>N{{ $totals['pgp'] }}</th>
                                        <th>N{{ $totals['spec'] }}</th>
                                        <th>N{{ $totals['ralmuof'] }}</th> --}}
                                        
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>


                    </div>




                    </div>
                </div>

            </div>


            

        </div>
        @push('scripts')
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