@extends('mobile.master')
@section('mobile-content')
<!--main section starts here-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a  href="{{ route('mobile.home') }}" class="btn btn-danger btn-block">Homepage</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Login to your Account</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="login-form">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="remember">Remember Me
                                        <input type="checkbox" id="remember" name="remember">
                                    </label>
                                </div>
                                <div class="col">
                                    <a href="" class="text-warning">Forgot Password</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn-success btn btn-block login-btn">Login</button>
                        </div>
                    </form>
                    <br>
                    <p style="text-align:center; font-size:13px;margin-top:1px;"> Or Login with:</p>
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
