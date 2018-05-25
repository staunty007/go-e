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
            <div class="col-lg-3">
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
                             {{ $profile->customer->address}}
                         </li>
                         <li>
                            <span class="fa fa-phone m-r-xs"></span>
                            <label>Contact 1:</label>
                            {{ $profile->mobile}}
                         </li>
                         <li>
                             <span class="fa fa-table m-r-xs"></span>
                            <label>Meter Number:</label>
                            {{ $profile->customer->meter_no }}
                         </li>
                         <li>
                             <span class="fa fa-map-marker m-r-xs"></span>
                            <label>District:</label>
                             Lekki
                         </li>
                        </ul>
                    </div>
                    </div>
                   
                <div class="col-lg-9">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Customer Profile Update</h5>
                        </div>
                        <div class="ibox-content">
                            <h2>
                                    Please provide valid information to update your profile.
                            </h2>
                            

                            <form id="profile-update" action="{{ route('customer.update-profile') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <fieldset style="box-shadow: 0px 0px 3px 4px #f3f3f48a; padding: 2em">
                                    <h2>Account Information</h2>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Meter or Account Number *</label>
                                            <input id="meter_no" name="meter_no" type="text" class="form-control" required value="{{ $profile->customer->meter_no }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" class="form-control" required rows="4" style="resize:none">{{ $profile->customer->address }}</textarea>
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
                                                <button class="btn btn-primary" id="profileUpdate">Update Account</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="carousel slide" id="carousel2">
                                                <ol class="carousel-indicators">
                                                    <li data-slide-to="0" data-target="#carousel2"  class="active"></li>
                                                    <li data-slide-to="1" data-target="#carousel2"></li>
                                                    <li data-slide-to="2" data-target="#carousel2" class=""></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="item active">
                                                        <img alt="image"  class="img-responsive" src="/customer/img/1.png">
                                                        
                                                    </div>
                                                    <div class="item ">
                                                        <img alt="image"  class="img-responsive" src="/customer/img/2.png">
                                                        
                                                    </div>
                                                    
                                                    <div class="item ">
                                                        <img alt="image"  class="img-responsive" src="/customer/img/4.png">
                                                        
                                                    </div>
                                                
                                                
                                                    <div class="item ">
                                                        <img alt="image"  class="img-responsive" src="/customer/img/7.png">
                                                        
                                                    </div>
                                                    <div class="item ">
                                                        <img alt="image"  class="img-responsive" src="/customer/img/8.png">
                                                        
                                                    </div>
                                                    <div class="item ">
                                                        <img alt="image"  class="img-responsive" src="/customer/img/9.png">
                                                        
                                                    </div>
                                                    <div class="item ">
                                                        <img alt="image"  class="img-responsive" src="/customer/img/10.png">
                                                        
                                                    </div>

                                                </div>
                                                {{-- <a data-slide="prev" href="#carousel2" class="left carousel-control">
                                                    <span class="icon-prev"></span>
                                                </a>
                                                <a data-slide="next" href="#carousel2" class="right carousel-control">
                                                    <span class="icon-next"></span>
                                                </a> --}}
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