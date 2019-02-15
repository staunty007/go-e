@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">

    <div class="wrapper wrapper-content">
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
                        <form action="{{ route('users.store') }}" method="post">
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
                                <label for="">Location / Address</label>
                                <input type="text" class="form-control location" name="address" value="{{ old('address') }}">
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
                                    <th>Address</th>
                                    <th>Meter No</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->first_name. " ". $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->customer->address }}</td>
                                        <td>{!! $user->customer->meter_no or "<span class='label label-warning'>Not Available</span>" !!}</td>
                                        <td>
                                            @if(!empty($user->customer->meter_no))
                                            <a href="{{ route('users.payment',$user->customer->meter_no) }}" class="btn btn-warning btn-sm">Payments</a>
                                            @else
                                            <a href="#" class="btn btn-warning btn-sm">No Payments</a>
                                            @endif
                                            <a type="button" data-toggle="modal" data-target="#edit{{$user->id}}" class="btn btn-primary btn-sm">Edit</a>

                                            <form id="delete-form-{{$user->id}}" method="post" action="{{ route('users.destroy',$user->id) }}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            </form>
                                            <a href="" onclick="
                                            if(confirm('Are you sure, You want to delete ??'))
                                                {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$user->id}}').submit();
                                                }
                                            else
                                                {
                                                event.preventDefault();
                                                }" class="btn btn-danger btn-sm">Delete</a>
                                            
                                        </td>                                        
                                    </tr>


                                    <div class="modal fade" id="edit{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h3 class="modal-title" id="modalLabelLarge">Update User Info</h3>
                                                </div>
                                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                                                @method('PATCH')
                                                @csrf
                                                <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                            <label for="firstName">First Name</label>
                                                            <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}" id="firstName" placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                            <label for="LastName">Last Name</label>
                                                            <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}" id="LastName" placeholder="Password">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                            <label for="EmailAddress">Email Address</label>
                                                            <input type="email" class="form-control" name="email" value="{{$user->email}}" id="EmailAddress" placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                            <label for="mobile">Phone Number</label>
                                                            <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}" id="mobile" placeholder="Password">
                                                            </div>
                                                            <div class="form-group col-md-8">
                                                                <label for="inputAddress">Address</label>
                                                            <input type="text" class="form-control" name="address" value="{{ $user->customer->address }}" id="inputAddress" placeholder="1234 Main St">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <div class="form-check">
                                                                    <label class="form-check-label" for="gridCheck"> Activate User</label>
                                                                    <input class="form-check-input" name="is_activated" {{ $user->is_activated == 1 ? 'checked' : '' }} value="1" type="checkbox" id="gridCheck">
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