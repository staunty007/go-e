@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">

<div class="wrapper wrapper-content">
    <div class="row">
        {{-- <div class="col-lg-12">
            <a href="{{ route('users.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Create New Customer /
                User</a>
        </div> --}}
        <div class="row">
            <div class="col-lg-12">
                {{-- <a href="{{ route('users.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Create New Customer / User</a> --}}
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="panel panel-info">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Create New Customer
                    </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseTwo">
                    <div class="panel-body">
                        <form action="{{ route('discos.store') }}" method="post">
                            {{ csrf_field()}}
                            <div class="form-group">
                                <label for="">Firstname</label>
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Lastname</label>
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}">
                            </div>
                            <div class="form-group">
                                <label for="activate">
                                    <input type="checkbox" id="activate" name="activated" value="1" />
                                    Activate User</label>
                            </div>
                            <div class="form-group">
                                <span class="help-text help-block">Note: Default Password Generate is <b>password</b></span>
                            </div>
                            <div class="form-group"><button class="btn btn-primary">Create Customer</button></div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <h3>All Customers</h3>

                        <table class="table data-table table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Status</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($discos as $disco)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $disco->first_name. " ". $disco->last_name }}</td>
                                        <td>{{ $disco->email }}</td>
                                        <td>{!! $disco->is_activated == 0 ? "<span class='label label-danger'>Inactive</span>" : "<span class='label label-success'>Active</span>" !!}</td>
                                        <td>
                                            <a type="button" data-toggle="modal" data-target="#edit{{$disco->id}}" class="btn btn-primary btn-sm">Edit</a>

                                            <form id="delete-form-{{$disco->id}}" method="post" action="{{ route('discos.destroy',$disco->id) }}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            </form>
                                            <a href="" onclick="
                                            if(confirm('Are you sure, You want to delete ??'))
                                                {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$disco->id}}').submit();
                                                }
                                            else
                                                {
                                                event.preventDefault();
                                                }" class="btn btn-danger btn-sm">Delete</a>
                                            
                                        </td>                                        
                                    </tr>


                                    <div class="modal fade" id="edit{{$disco->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h3 class="modal-title" id="modalLabelLarge">Update disco Info</h3>
                                                </div>
                                            <form method="POST" action="{{ route('discos.update', $disco->id) }}">
                                                @method('PATCH')
                                                @csrf
                                                <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                            <label for="firstName">First Name</label>
                                                            <input type="text" class="form-control" name="first_name" value="{{$disco->first_name}}" id="firstName" placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                            <label for="LastName">Last Name</label>
                                                            <input type="text" class="form-control" name="last_name" value="{{$disco->last_name}}" id="LastName" placeholder="Password">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                            <label for="EmailAddress">Email Address</label>
                                                            <input type="email" class="form-control" name="email" value="{{$disco->email}}" id="EmailAddress" placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                            <label for="mobile">Phone Number</label>
                                                            <input type="text" class="form-control" name="mobile" value="{{$disco->mobile}}" id="mobile" placeholder="Password">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label" for="gridCheck"> Activate Disco</label>
                                                                    <input class="form-check-input" name="is_activated" {{ $disco->is_activated == 1 ? 'checked' : '' }} value="1" type="checkbox" id="gridCheck">
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

        <!-- Modal -->

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