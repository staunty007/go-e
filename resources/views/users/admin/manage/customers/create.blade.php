@extends('layouts.admin')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-8">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $e)
                        <p>{{ $e }}</p>
                    @endforeach
                </div>
                @endif
                
                <div class="ibox">
                    <div class="ibox-content">
                        <h2>Add New Customer</h2>
                        <hr>
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
    </div>

@stop

    

