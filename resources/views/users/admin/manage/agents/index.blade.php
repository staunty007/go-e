@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('agents.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Create New Agent</a>
        </div>


        <div class="row">
            <div class="col-lg-12">

                <div class="col-lg-4 col-md-4">

                    <div class="stat">

                        <div class="stat__icon-wrapper stat--bg-green">
                            <i data-feather="user-plus" class="stat__icon"></i>
                        </div>
                        <div class="stat__data">
                            <h1 class="stat__header">Total Agents</h1>
                            <p class="stat__subheader"> 100</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="stat stat--has-icon-right">
                        <div class="stat__icon-wrapper stat--bg-blue">
                            <i data-feather="airplay" class="stat__icon"></i>
                        </div>
                        <div class="stat__data">
                            <h1 class="stat__header">Avg Monthly Sign up</h1>
                            <p class="stat__subheader">1</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="stat stat--has-icon-right">
                        <div class="stat__icon-wrapper stat--bg-dark-red">
                            <i data-feather="user-x" class="stat__icon stat--color-white"></i>
                        </div>
                        <div class="stat__data">
                            <h1 class="stat__header">Inactive Agents</h1>
                            <p class="stat__subheader"> 300</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</DIV>


        <div class="row">
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
                                        <td>{{ $agent->agent->agent_id or ''}}</td>
                                        <td>Lekki</td>
                                        <td>
                                            <a href="{{ route('agents.edit',$agent->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('agents.destroy',$agent->id) }}" class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault(); document.querySelector('#agentDestroy').submit();">Delete</a>
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
            $(document).ready(function () {
                $('.data-table').DataTable();
            });
        </script>
        @endpush

        @endsection