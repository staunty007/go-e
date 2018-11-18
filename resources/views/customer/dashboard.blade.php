@extends('customer.master')
@section('customer-section')
    <div class="wrapper wrapper-content">
        <h2 class="">Quick Menu</h2>
        <div class="row">
            <a href="#" data-toggle="modal" data-target="#myModal6">
                <div class="col-md-3">
                    <div class="widget navy-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-superpowers fa-4x"></i>
                            <h2 class="">Buy Token</h2>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/customer/profile">
                <div class="col-md-3">
                    <div class="widget yellow-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-user-circle-o fa-4x"></i>
                            <h2 class="">My Profile</h2>
                        </div>
                    </div>
                </div>
            </a>
            
        </div>
        <h2 class="">My Account</h2>
        <div class="row">
            {{-- <a href=""> --}}
            <div class="col-md-3">
                <div class="widget red-bg p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-money fa-4x"></i>
                        <h1 class="m-xs">{{ number_format($customer->customer->wallet_balance) }} NGN</h1>
                        <h4>Wallet Balance</h4>
                    </div>
                    <a href="/customer/profile" class="btn btn-sm btn-success btn-block">Top Up</a>
                </div>
            </div>
            {{-- </a> --}}
            
        </div>

    </div>
@endsection