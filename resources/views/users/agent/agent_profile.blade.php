@extends('layouts.agent') @section('content')
            
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-4">
                    <div class="widget-head-color-box navy-bg p-lg text-center">
                        <center>
                            @if(Auth::user()->avatar == null)
                            <img alt="image" class="img-circle" src='/images/profile_small.png' width="100"/>
                            @else
                            <img alt="image" class="img-circle" src='/storage/{{ Auth::user()->avatar }}' width="100"/>
                            @endif
                        </center>
                        <div class="m-b-md">
                        <h2 class="font-bold no-margins">
                            {{ $profile->agent_id}}
                        </h2>
                            <small>GOENERGEE - AGENT</small>
                        </div>
                        <!--<img src="/images/face-head-man-icon-1.png" class="img-circle circle-border m-b-md" alt="profile">-->
                        <ul class="list-unstyled m-t-md">
                        <div class="text-left">
                         <li>
                             <span class="fa fa-address-card-o m-r-xs"></span>
                             <label> FullName:</label>
                             {{ $profile->user->first_name." ".$profile->user->last_name }}
                         </li>
                         <li>
                             <span class="fa fa-envelope m-r-xs"></span>
                             <label>Email:</label>
                             {{ $profile->user->email }}
                         </li>
                         <li>
                             <span class="fa fa-home m-r-xs"></span>
                             <label>Address:</label>
                             {{ $profile->address}}
                         </li>
                         <li>
                             <span class="fa fa-phone m-r-xs"></span>
                            <label>Contact:</label>
                             {{ $profile->user->mobile}}
                         </li>
                         
                        </ul>
                    </div>
                    </div>
                   
                <div class="col-lg-8">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Agent Profile Update</h5>
                        </div>
                        <div class="ibox-content">
                            
                            <p>
                                Please provide valid information to update your profile.
                            </p>

                            <form id="form" action="{{ route('agent.update') }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="meter_no">Meter No</label>
                                            <input id="meter_no" type="text" class="form-control" name="meter_no" value="{{ $profile->meter_no }}">
                                        </div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input type="text" class="form-control" name="first_name" value="{{ $profile->user->first_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input type="text" class="form-control" name="last_name" value="{{ $profile->user->last_name }}">
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="text" readonly class="form-control" name="email" value="{{ $profile->user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="mobile" value="{{ $profile->user->mobile }}">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Agent ID</label>
                                            <input type="text" name="agent_id" class="form-control" value="{{ $profile->agent_id }}" readonly>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Your Diamond Account Number</label>
                                            <input type="text" name="account_no" class="form-control" value="{{ $profile->account_number }}">
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Update Password</label>
                                            <input type="text" class="form-control" name="password">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <textarea class="form-control" name="address" rows="4">{{ $profile->address }}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Choose Profile Picture</label>
                                            <input type="file" name="avatar">
                                        </div>   
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" id="profileUpdate">Update Profile</button>
                                        </div>
                                    </div>
                                    
                            </form>
                        </div>
                    </div>
                </div>

            </div>

@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    const baseUrl = "{{ url('/') }}";
    let profileUpdate = document.querySelector("#profileUpdate");
    profileUpdate.addEventListener('click',(e) => {
        e.preventDefault();
        let meterNo = document.querySelector("#meter_no").value;

        if(meterNo.length == 0 && meterNo.length > 6) {
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
        }else {
            fetch(`/in-app/api/soap/validate-customer/${meterNo}`)
                .then(res => res.json())
                .then(response => {
                    console.log(response);
                    if(response.response.retn !== 0) {
                        $.alert({
                            title: 'Ooops!',
                            content: 'Invalid Meter No!',
                            type: 'red',
                            buttons: {
                                ok: {
                                    text: 'Try Again',
                                    btnClass: 'btn-red'
                                }
                            }
                        });
                    }else {
                        // Valid Meter no
                        $('#form').submit();
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
                });
            
        }
    });
</script>
@endpush