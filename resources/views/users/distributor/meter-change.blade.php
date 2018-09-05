@extends('layouts.distributor')

@section('content')

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="ibox">
                    
                    <div class="ibox-content">
                        <h3 class="pull-left">Change Meter Status</h3>
                        <a class="btn btn-danger pull-right" href="{{ route('distributor.meter_admin') }}">Go Back</a>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Name</label>
                                <p>{{ $meter->first_name ." ". $meter->last_name }}</p>
                            </div>
                            <div class="col-md-4">
                                <label>Email Address</label>
                                <p>{{ $meter->email_address }}</p>
                            </div>
                            <div class="col-md-4">
                                <label>Phone Number</label>
                                <p>{{ $meter->phone_number }}</p>
                            </div>
                            <div class="col-md-4">
                                <label>Home Address</label>
                                <p>{{ $meter->home_address}}</p>
                            </div>
                            <div class="col-md-4">
                                <label>Dist. Company</label>
                                <p>{{ $meter->dist_company}}</p>
                            </div>
                            <div class="col-md-4">
                                <label>District</label>
                                <p>{{ $meter->district}}</p>
                            </div>
                            <div class="col-md-6">
                                <label>House Type</label>
                                <p>{{ $meter->house_type}}</p>
                            </div>
                            <div class="col-md-6">
                                <label>Meter Type</label>
                                <p>{{ $meter->meter_type}}</p>
                            </div>
                            <div class="col-md-12">
                                <label>Currrent Status</label>
                                <p>
                                    @switch($meter->status)
                                        @case(1)
                                            <span class="badge badge-info">Processing</span>
                                            @break
                                        @case(2)
                                            <span class="badge badge-danger">Not Available</span>
                                            @break
                                        @case(3)
                                            <span class="badge badge-success">Delivered</span>
                                            @break
                                        @default
                                            <span class="badge badge-warning">Pending</span>
                                    @endswitch
                                </p>
                                <hr>
                                <form action="{{ route('meter.update',$meter->id) }}" method="POST">
                                    {{ csrf_field()}}
                                    <div class="form-group">
                                        <label>Update Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1">Processing</option>
                                            <option value="2">Not Available</option>
                                            <option value="3">Delivered</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success">Update Status</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection