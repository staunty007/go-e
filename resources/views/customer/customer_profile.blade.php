@extends('customer.master')
@section('customer-section')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<style>
    .jconfirm .jconfirm-box-container.jconfirm-no-transition {
        width: 100%;
    }
</style>
<div class="wrapper wrapper-content">
    @if(Auth::user()->is_completed == 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger">
                Please Complete Your Profile below
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-5 col-md-5">
            <div class="widget-head-color-box navy-bg p-lg text-center">

                {{-- <img src="/customer/img/a4.jpg" class="img-circle circle-border m-b-md" alt="profile"> --}}
                <ul class="list-unstyled m-t-md">
                    <div class="text-left">
                        <li>
                            <span class="fa fa-envelope m-r-xs"></span>
                            <label>Email:</label>
                            {{ Auth::user()->email }}
                        </li>
                        <li>
                            <span class="fa fa-home m-r-xs"></span>
                            <label>Address:</label>
                            @if(Auth::user()->is_completed == 1)
                            {{ $profile->customer->address}}
                            @endif
                        </li>
                        <li>
                            <span class="fa fa-phone m-r-xs"></span>
                            <label>Contact:</label>
                            {{ $profile->mobile}}
                        </li>
                        <li>
                            <span class="fa fa-table m-r-xs"></span>
                            <label>Meter Number:</label>
                            @if(Auth::user()->is_completed == 1)
                            {{ $profile->customer->meter_no }}
                            @endif
                        </li>
                        <li>
                            <span class="fa fa-map-marker m-r-xs"></span>
                            <label>District:</label>
                            ((Name?))
                        </li>
                </ul>
            </div>
            @if(auth()->user()->refer_id !== null)
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Customer Referral Link</h5>
                </div>
                <div class="ibox-content">
                    Here is your Unique Referral Link ( URL )
                    <div class="input-group">
                        <input type="text" id="refLink" readonly value='{{ url('') }}/signup/r/{{ auth()->user()->refer_id }}'
                            class="form-control">
                        <span class="input-group-addon input-group-sm">
                            <button data-clipboard-target="#refLink" id="copy-link" class="btn btn-primary btn-sm"><i
                                    class=" fa fa-clipboard"></i></button>
                        </span>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="ibox">
                        <div class="ibox-title">
                            <div class="pull-left">
                                <h5>Wallet</h5>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-success btn-xs add-fund">Add Fund</button>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h2><span>&#8358;</span>{{ number_format($profile->customer->wallet_balance) }} </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Referral Bonus</h5>
                        </div>
                        <div class="ibox-content">
                            <h2><span>&#8358;</span>{{ number_format($profile->customer->refer_bonus) }} </h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-7 col-md-7">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Customer Profile Update</h5>
                </div>
                <div class="ibox-content">
                    <form id="profile-update" action="{{ route('customer.update-profile') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset style="box-shadow: 0px 0px 3px 4px #f3f3f48a; padding: 2em">

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="fullname" class="form-control" value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number <span style="color: red">*</span></label>
                                        <input id="phone" name="phone" type="text" class="form-control" required
                                            value="{{ $profile->mobile }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Meter or Account Number <span style="color: red">*</span></label>
                                        <input id="meter_no" name="meter_no" type="text" class="form-control"
                                            required @if(Auth::user()->is_completed == 1)value="{{
                                        $profile->customer->meter_no
                                        }}"@endif>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Change Password</label>
                                        <input type="password" class="form-control" name="password" />
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" required rows="2" style="resize:none">@if(Auth::user()->is_completed == 1){{ $profile->customer->address }}@endif</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        @if(Auth::user()->avatar !== NULL)
                                        <label>Change Profile Picture</label>
                                        @else
                                        <label>Profile Picture Update</label>
                                        @endif
                                        <input id="profile_pic" name="profile_pic" type="file">
                                    </div>
                                    <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}" />
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <button class="btn btn-primary" id="profileUpdate">Update Profile</button>
                                    </div>
                                </div>
                                </div>
                                </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    // Copy to clipboard
    let clippy = new ClipboardJS('#copy-link');

    clippy.on('success', function (e) {
        if (typeof '$.alert' === undefined) {
            alert(`Copied: ${e.text}`);
        }
        $.alert({
            title: 'Copied',
            content: `<p>Your Unique Referral is: <p>${e.text}</p>`,
            type: 'green',
            buttons: {
                ok: {
                    text: 'Okay',
                    btnClass: 'btn-green'
                }
            }
        });
    });
    
    const baseUrl = "{{ url('/') }}";
    let profileUpdate = document.querySelector("#profileUpdate");
    profileUpdate.addEventListener('click', (e) => {
        e.preventDefault();
        profileUpdate.innerHTML = "Updating Profile...";
        let meterNo = document.querySelector("#meter_no").value;

        if (meterNo.length == 0 && meterNo.length > 6) {
            $.alert({
                title: 'Ooops!',
                content: 'Meter No Field is Required',
                type: 'red',
                buttons: {
                    ok: {
                        text: 'Okay',
                        btnClass: 'btn-red'
                    }
                }
            });
            profileUpdate.innerHTML = "Update Profile";
        } else {
            fetch(`/validate-customer-meter/${meterNo}`)
                .then(res => res.json())
                .then(response => {
                    console.log(response);
                    let responseCode = response.response.retn;
                    switch (responseCode) {
                        case 0:
                            $("form#profile-update").submit();
                            break;
                        default:
                            $.alert({
                                title: 'Ooops!',
                                content: `${response.response.error}`,
                                type: 'red',
                                buttons: {
                                    ok: {
                                        text: 'Try Again',
                                        btnClass: 'btn-red'
                                    }
                                }
                            });
                            profileUpdate.innerHTML = "Update Profile";
                            // setTimeout(() => {
                            //     $("form#profile-update").submit();
                            // },2000);
                            break;
                    }
                })
                .catch(err => {
                    // alert('Sorry Something Went Wrong');
                    $.alert({
                        title: 'Ooops!',
                        content: 'Something Bad Went Wrong',
                        type: 'red',
                        buttons: {
                            ok: {
                                text: 'Got It',
                                btnClass: 'btn-red'
                            }
                        }
                    });
                    profileUpdate.innerHTML = "Update Profile";
                });


        }
    });
    // prompt to add fund
    $('.add-fund').on('click', function () {
        $.confirm({
            title: 'Enter Amount to Proceed',
            content: `<input type='text' id='input-amount' class='form-control' placeholder='0.00' />`,
            buttons: {
                fundWallet: {
                    text: 'Fund Wallet',
                    btnClass: 'btn-green',
                    action: function () {
                        var input = this.$content.find('input#input-amount');
                        var errorText = this.$content.find('.text-danger');
                        if (!input.val()) {
                            $.alert({
                                content: "Please don't keep the name field empty.",
                                type: 'red'
                            });
                            return false;
                        } else {
                            payWithPaystack(input);
                            // Call Paystack
                        }
                    }
                },
                later: function () {
                    // do nothing.
                }
            }
        });
    });
    
    // PayWithPaystack
    function payWithPaystack(amount) {
        let amountFund = document.querySelector('#input-amount').value;
        let chargedAmount = parseInt(amountFund);
        console.log(chargedAmount);
        let handler = PaystackPop.setup({
            key: "{{ env('PS_KEY') }}",
            email: "{{ auth()->user()->email }}",
            amount: chargedAmount+"00",
            ref: 'customer_top_up_'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            
            callback: function(response){
                fetch(`/customer/update-wallet/${chargedAmount}`)
                    .then(res => res.json())
                    .then(result => {
                        if(result.msg == "success") {
                            $.alert({
                                content: "Payment Successful",
                                type: 'green'
                            });
                            setTimeout(() => {
                                window.location.reload();
                            },2000);
                        }
                    })
                    .catch(err => {
                        $.alert({
                            content: "Something Bad Went Wrong, Please Contact Support to update your funds",
                            type: 'red'
                        });
                    })
                
            },
            onClose: function(){
                alert('Payment Cancelled');
            }
        });
        handler.openIframe();
    }
</script>

@endpush
@endsection