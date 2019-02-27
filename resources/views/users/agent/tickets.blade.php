@extends('layouts.agent')
@section('content')

<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<br>
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('agent.open-ticket') }}" class="btn btn-primary">Open New Ticket</a>
    </div>
</div>
<div class="clearfix"></div><br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                All Tickets
            </div>
            <div class="ibox-content">
                <table class="table table-responsive" id="myTable">
                    <thead>
                        <tr>
                            <th>ID #</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->ticket_id }}</td>
                            <td>
                                <a href="{{ route('agent.show-ticket',$ticket->ticket_id) }}">
                                    {{ $ticket->title }}
                                </a>
                            </td>
                            <td>
                                <span class="label label-{{ $ticket->status == 'Open' ? 'success' : 'danger' }}">
                                    {{ $ticket->status }}
                                </span>
                            </td>
                            <td>{{ $ticket->category->name}} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <center>{{ $payments->links()}}</center> --}}
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
@endpush