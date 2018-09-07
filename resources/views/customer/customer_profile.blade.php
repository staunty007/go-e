@extends('customer.master')

@section('customer-section')

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
            <div class="col-lg-5">
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
                             Lekki
                         </li>
                        </ul>
                    </div>
                    </div>
                   
                <div class="col-lg-7">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Customer Profile Update</h5>
                        </div>
                        <div class="ibox-content">
                          
                            

                            <form id="profile-update" action="{{ route('customer.update-profile') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <fieldset style="box-shadow: 0px 0px 3px 4px #f3f3f48a; padding: 2em">
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Meter or Account Number <span style="color: red">*</span></label>
                                            <input id="meter_no" name="meter_no" type="text" class="form-control" required @if(Auth::user()->is_completed == 1)value="{{ $profile->customer->meter_no }}"@endif>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number <span style="color: red">*</span></label>
                                                <input id="phone" name="phone" type="text" class="form-control" required value="{{ $profile->mobile }}">
                                                </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" class="form-control" required rows="2" style="resize:none">@if(Auth::user()->is_completed == 1){{ $profile->customer->address }}@endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                @if(Auth::user()->avatar !== NULL)
                                                <label>Change Profile Picture</label>
                                                @else
                                                <label>Profile Picture Update</label>
                                                @endif
                                                <input id="profile_pic" name="profile_pic" type="file">
                                            </div>
                                            <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}" />
                                            <div class="form-group">
                                                <label>Change Password</label>
                                                <input type="password" class="form-control" name="password" />
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" id="profileUpdate">Update Account</button>
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
                
                <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
                <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
                <script>
                    $("#profileUpdate").click((e) => {
                        e.preventDefault();
                        $(this).html("Updating Profile");

                        var meterNo = $('#meter_no').val();
                        

                        $.ajax({
                            url: '/meter/api',
                            method: 'POST',
                            data: { 
                                'meter_no': meterNo, 
                                '_token': '{{ csrf_token() }}'
                            },
                            success: (response) => {
                                if(response.code == 419) {
                                    // Invalid Meter
                                    toastr.error('Invalid Meter Number!');
                                    $("#profileUpdate").html("Update Profile");
                                }else {
                                    $("#profile-update").submit();
                                }
                            }
                        });

                        $("#profileUpdate").html("Update Profile");
                    })
                </script>
                
            @endpush
@endsection