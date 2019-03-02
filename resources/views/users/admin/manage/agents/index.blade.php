@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12" style="margin-top: -30px;">
            {{-- <a href="{{ route('agents.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Create New Agent</a> --}}
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
                <div style="margin-top: 10px;"></div>
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Create New Agents
                    </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <form action="{{ route('agents.store') }}" method="post">
                            {{ csrf_field()}}
                            <div class="form-group">
                                <label for="">Firstname</label>
                                <input type="text" class="form-control" name="first_name">
                            </div>
                            <div class="form-group">
                                <label for="">Lastname</label>
                                <input type="text" class="form-control" name="last_name">
                            </div>
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="mobile">
                            </div>
                            <div class="form-group">
                                <label for="">Location / Address</label>
                                <input type="text" class="form-control location" name="address">
                            </div>
                            <div class="form-group">
                                <label for="">Agent ID</label>
                                <input type="text" class="form-control" name="agent_id" readonly id="agentId">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="is_activated" value="1" id="">
                                <label class="form-check-label" for="exampleCheck1">Activate Agent</label>
                            </div>
                            <div class="form-group"><button class="btn btn-primary">Add Agent</button></div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>




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
                                    <th>Status</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($agents as $agent)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $agent->first_name. " ". $agent->last_name }}</td>
                                        <td>{{ $agent->agent->agent_id or ''}}</td>
                                        <td>{{ $agent->agent->address }}</td>
                                        <td>{!! $agent->is_activated == 0 ? "<span class='label label-danger'>Inactive</span>" : "<span class='label label-success'>Active</span>" !!}</td>
                                        <td>
                                            {{-- <a href="{{ route('agents.edit',$agent->id) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                                            <a type="button" data-toggle="modal" data-target="#edit{{$agent->id}}" class="btn btn-primary btn-sm">Edit</a>
                                            
                                            <form id="delete-form-{{$agent->id}}" method="post" action="{{ route('agents.destroy',$agent->id) }}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            </form>
                                            <a href="" onclick="
                                            if(confirm('Are you sure, You want to delete ??'))
                                                {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$agent->id}}').submit();
                                                }
                                            else
                                                {
                                                event.preventDefault();
                                                }" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="edit{{$agent->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h3 class="modal-title" id="modalLabelLarge">Update Agent Info</h3>
                                                </div>
                                            <form method="POST" action="{{ route('agents.update', $agent->id) }}">
                                                @method('PATCH')
                                                @csrf
                                                <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                            <label for="firstName">First Name</label>
                                                            <input type="text" class="form-control" name="first_name" value="{{$agent->first_name}}" id="firstName" placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                            <label for="LastName">Last Name</label>
                                                            <input type="text" class="form-control" name="last_name" value="{{$agent->last_name}}" id="LastName" placeholder="Password">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                            <label for="EmailAddress">Email Address</label>
                                                            <input type="email" class="form-control" name="email" value="{{$agent->email}}" id="EmailAddress" placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                            <label for="mobile">Phone Number</label>
                                                            <input type="text" class="form-control" name="mobile" value="{{$agent->mobile}}" id="mobile" placeholder="Password">
                                                            </div>
                                                            <div class="form-group col-md-8">
                                                                <label for="inputAddress">Address</label>
                                                            <input type="text" class="form-control" name="address" value="{{ $agent->agent->address }}" id="inputAddress" placeholder="1234 Main St">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label" for="gridCheck"> Activate Agent</label>
                                                                    <input class="form-check-input" name="is_activated" {{ $agent->is_activated == 1 ? 'checked' : '' }} value="1" type="checkbox" id="gridCheck">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                      </div> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>
    @push('scripts')
    <script>
        (function(){
            var location = document.querySelector('.location');
            var agentId = document.querySelector('#agentId');
            location.addEventListener('keyup', function(){
                var sliced = this.value.slice(0,3);
                var agentval = "GO-"+sliced + ""+Math.floor((Math.random() * 12345) + 1);
                agentId.value = agentval.toUpperCase();
            });
        })();
    </script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>


        <script>
            $(document).ready(function () {
                $('.data-table').DataTable();
            });
        </script>
        @endpush

        @endsection