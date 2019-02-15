@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css">

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('users.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Create New Customer /
                User</a>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="col-lg-4 col-md-4">

                    <div class="stat">

                        <div class="stat__icon-wrapper stat--bg-green">
                            <i data-feather="users" class="stat__icon"></i>
                        </div>
                        <div class="stat__data">
                            <h1 class="stat__header">Total Customers</h1>
                            <p class="stat__subheader"> 905,100</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="stat stat--has-icon-right">
                        <div class="stat__icon-wrapper stat--bg-blue">
                            <i data-feather="user-check" class="stat__icon"></i>
                        </div>
                        <div class="stat__data">
                            <h1 class="stat__header">Registered Customer</h1>
                            <p class="stat__subheader">1</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="stat stat--has-icon-right">
                        <div class="stat__icon-wrapper stat--bg-dark-red">
                            <i data-feather="user-minus" class="stat__icon stat--color-white"></i>
                        </div>
                        <div class="stat__data">
                            <h1 class="stat__header">Unregistered Customers</h1>
                            <p class="stat__subheader"> 300</p>
                        </div>
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
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name. " ". $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->customer->address }}</td>
                                <td>{!! $user->customer->meter_no or "<span class='label label-warning'>Not Available</span>"
                                    !!}</td>
                                <td>
                                    <a href="{{ route('users.payment',$user->customer->meter_no) }}" class="btn btn-warning btn-sm">Payments</a>
                                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('users.destroy',$user->id) }}" class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault(); document.querySelector('#agentDestroy').submit();">Delete</a>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST" id="agentDestroy">
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