@extends('mobile.master')
@section('mobile-content')
<!--main section starts here-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('mobile.home') }}" class="btn btn-danger btn-block">Homepage</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Create Account</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="signup-form">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first_name">
                                        <b>First Name</b>
                                    </label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="last_name">
                                        <b>Last Name</b>
                                    </label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">
                                        <b>Email</b>
                                    </label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="mobile">
                                        <b>Phone Number</b>
                                    </label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">
                                        <b>Password</b>
                                    </label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password_confirmation">
                                        <b>Confirm Password</b>
                                    </label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <label>
                            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px">
                            Remember me
                        </label>
                        
                        <input type="submit" value="Register" class="btn btn-success btn-block registerBtn">

                    </form>
                    <br>
                    <p style="text-align:center; font-size:13px;margin-top:1px;"> Sign Up with:</p>
                        <p style="text-align:center; margin-top:-5px;">
                            <a class="btn btn-primary social-login-btn " href="http://localhost:9000/login/facebook"
                                style="background-color:#3d578e;">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a class="btn btn-primary social-login-btn " href="http://localhost:9000/login/twitter"
                                style="background-color:#28a9e0;">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a class="btn btn-primary social-login-btn " href="http://localhost:9000/login/linkedin"
                                style="background-color:#0b78b6;">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a class="btn btn-primary social-login-btn " href="http://localhost:9000/login/google"
                                style="background-color:#d52727;">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </p>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 1em">
        <div class="col">
            <button class="btn-danger btn btn-danger btn-block"><a href="Support.html">Support</a></button>
        </div>
        <div class="col">
            <button class="btn-danger btn btn-danger btn-block"><a href="#"></a>FAQ</button>
        </div>
    </div>

</div>
@endsection
@push('scripts')
<script src="/js/sweetalert.min.js"></script>
@endpush