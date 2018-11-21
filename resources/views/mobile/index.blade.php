{{-- @extends('mobile.master')
@section('mobile-content') --}}

<!--main section starts here-->
<div class="container">
    <div class="row">
        {{-- <div class="col" style="padding-right: 0px">
            <a class="btn btn-success btn-block" href="{{ route('mobile.login') }}">Login</a>
        </div>
        <div class="col" style="padding-left: 0.5rem;">
            <a class="btn btn-success btn-block" href="{{ route('mobile.sign-up') }}">SignUp</a>
        </div> --}}
    </div>
    <div class="row" style="margin-top: 0.5rem; margin-bottom: 0.5rem">
        <div class="col">
            <a class="btn btn-danger btn-block" href="{{ route('mobile.make-payment') }}">Make Payment</a>
        </div>
    </div>

        <div class="card1">
            <div class="cards">
                <p class="text-success text-bold">More Power Options to Recharge!</p>
            </div>
        </div>
        <div class="card card-gradient">
            <div class="card-body text-right">
                <h4 class="card-title">mVisa</h4>
                <h6 class="card-subtitle mb-2">Easy Payment via QR Code</h6>
            </div>
        </div>
        <div class="card card-gradient">
            <div class="card-body text-right">
                <h4 class="card-title">POS</h4>
                <h6 class="card-subtitle mb-2">Our agents are readily available</h6>
            </div>
        </div>
        <div class="card card-gradient">
            <div class="card-body text-right">
                <h4 class="card-title">CASH</h4>
                <h6 class="card-subtitle mb-2">Visit any of our sales outlets</h6>
            </div>
        </div>
        <br>
        <div class="mb-3">
            <div class="">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" class="img-fluid" src="/mobile-sys/images/11.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/mobile-sys/images/7.png" alt="Second slide">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <p class="text-success">Like and follow us on
                <a><img class="iconC" src="/mobile-sys/images/icons8-facebook-48.png"></a>
                <a><img class="iconC" src="/mobile-sys/images/if_twitter_317720.png"></a>
                <a><img class="iconC" src="/mobile-sys/images/instagram.jpg"></a>
            </p>
            <br>
            <div class="row">
                <div class="col">
                    <button class="btn-danger btn btn-danger btn-block"><a href="Support.html">Support</a></button>
                </div>
                <div class="col">
                    <button class="btn-danger btn btn-danger btn-block"><a href="#"></a>FAQ</button>
                </div>
            </div>

        </div>
</div>
    
@endsection