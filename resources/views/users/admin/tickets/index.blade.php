@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

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
                    <th>Category</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                    <tr>
                        <td>
                            #{{ $ticket->ticket_id }}
                        </td>
                        <td>
                            <a href="{{ route('admin.show-ticket',$ticket->ticket_id) }}">
                                {{ $ticket->title }}
                            </a>
                        </td>
                        <td>
                            {{ $ticket->category->name }}
                        </td>
                        <td>
                            @if ($ticket->status === 'Open')
                            <span class="badge badge-success">{{ $ticket->status }}</span>
                            @else
                            <span class="badge badge-danger">{{ $ticket->status }}</span>
                            @endif
                        </td>
                        <td>{{ $ticket->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.show-ticket',$ticket->ticket_id) }}" class="btn btn-primary">Comment</a>
                        </td>
                        <td>
                            <form action="{{ route('close-ticket', $ticket->ticket_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Close</button>
                            </form>
                        </td>
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
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endpush
