@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('agents.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Create New Agent</a>
            </div>
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <h3>All Agents</h3>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Agent Name</th>
                                    <th>Agent ID</th>
                                    <th>Location</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($agents as $agent)
                                    <tr>
                                        <td>{{ $agent->id }}</td>
                                        <td>{{ $agent->first_name. " ". $agent->last_name }}</td>
                                        <td>{{ $agent->agent->agent_id }}</td>
                                        <td>Lekki</td>
                                        <td>
                                            <a href="{{ route('agents.edit',$agent->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('agents.destroy',$agent->id) }}" class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault(); document.querySelector('#agentDestroy').submit();"
                                                >Delete</a>
                                            <form action="{{ route('agents.destroy',$agent->id) }}" method="POST" id="agentDestroy">
                                                {{ method_field("DELETE")}}
                                                {{ csrf_field()}}
                                            </form>

                                        </td>
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