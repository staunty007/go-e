@extends('layouts.admin') @section('content')


<style>
    .error {
        color: crimson;
    }
</style>
<link href="{{asset('css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
<div class="row">
    <div class="col-lg-4">
        <div class="widget-head-color-box navy-bg p-lg text-center">
            <div class="m-b-md">
                <h2 class="font-bold no-margins">
                    Administrator
                </h2>
                <small>GOENERGEE </small>
            </div>
            <img src="@if(Storage::disk('public')->exists(Auth::user()->avatar)) {{asset('storage/'.Auth::user()->avatar)}} @else {{asset('images/avatar.jpg')}} @endif"
                class="img-circle circle-border m-b-md" alt="profile" width="120px">
            <ul class="list-unstyled m-t-md">
                <div class="text-left">
                    <li>
                        <span class="fa fa-address-card-o m-r-xs"></span>
                        <label>Company:</label>
                        GOENERGEE
                    </li><br>
                    <li>
                        <span class="fa fa-user m-r-xs"></span>
                        <label>Name: {{Auth::user()->first_name}} {{Auth::user()->last_name}}</label>
                    </li><br>
                    <li>
                        <span class="fa fa-envelope m-r-xs"></span>
                        <label>Email: {{Auth::user()->email}}</label>
                    </li><br>

                    <li>
                        <span class="fa fa-mobile m-r-xs"></span>
                        <label>Mobile Tel: {{Auth::user()->mobile}}</label>
                    </li>
                </div>
            </ul>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="ibox">
            <div class="ibox-title">
                <h5>ADMIN PROFILE UPDATE</h5>

            </div>
            <div class="ibox-content">


                Please provide valid information to update your profile.

                <form id="form" action="{{route('admin.updateprofile')}}" class="wizard-big" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>
                        <h2>Account Information</h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input id="email" name="email" value="{{$data->email}}" type="text" class="form-control required">
                                    @if ($errors->has('email'))
                                    <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input id="password" name="password" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password *</label>
                                    <input id="confirm" name="confirm" type="text" class="form-control required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input id="first_name" name="first_name" value="{{$data->first_name}}" type="text"
                                        class="form-control required"> @if ($errors->has('first_name'))
                                    <div class="error">{{ $errors->first('first_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input id="last_name" name="last_name" value="{{$data->last_name}}" type="text"
                                        class="form-control required"> @if ($errors->has('last_name'))
                                    <div class="error">{{ $errors->first('last_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Phone No</label>
                                    <input id="phone" name="phone" value="{{$data->mobile}}" type="text"
                                        class="form-control required"> @if ($errors->has('phone'))
                                    <div class="error">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                            <h2>Bio Data</h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input id="avatar" name="avatar" value="{{$data->avatar}}" type="file"
                                            class="form-control required"> @if ($errors->has('avatar'))
                                        <div class="error">{{ $errors->first('avatar') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I
                                            agree with the Terms and Conditions.</label>
                                            <button type="submit" class="btn btn-primary btn-block"><b>UPDATE PROFILE</b></button>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                        <div class="text-center">
        
                                            <img alt="image" class="img-responsive"  src="{{asset('images/15.png')}}">
        
                                        </div>
                                </div> --}}
                            </div>
                                    
                        </fieldset>
                </form>

                {{-- <form id="form" action="{{route('admin.updateprofile')}}" class="wizard-big" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <h1>Account</h1>
                    <fieldset>
                        <h2>Account Information</h2>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="email" name="email" value="{{$data->email}}" type="text" class="form-control required">
                                    @if ($errors->has('email'))
                                    <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input id="phone" name="phone" value="{{ $data->mobile }}" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input id="password" name="password" type="text" class="form-control">
                                </div>

                            </div>
                            <div class="col-lg-9">

                                <div class="carousel slide" id="carousel2">
                                    <ol class="carousel-indicators">
                                        <li data-slide-to="0" data-target="#carousel2" class="active"></li>
                                        <li data-slide-to="1" data-target="#carousel2"></li>
                                        <li data-slide-to="2" data-target="#carousel2" class=""></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img alt="image" class="img-responsive" src="{{asset('images/1.png')}}">

                                        </div>
                                        <div class="item ">
                                            <img alt="image" class="img-responsive" src="{{asset('images/2.png')}}">

                                        </div>

                                        <div class="item ">
                                            <img alt="image" class="img-responsive" src="{{asset('images/4.png')}}">

                                        </div>


                                        <div class="item ">
                                            <img alt="image" class="img-responsive" src="{{asset('images/7.png')}}">

                                        </div>
                                        <div class="item ">
                                            <img alt="image" class="img-responsive" src="{{asset('images/8.png')}}">

                                        </div>
                                        <div class="item ">
                                            <img alt="image" class="img-responsive" src="{{asset('images/9.png')}}">

                                        </div>
                                        <div class="item ">
                                            <img alt="image" class="img-responsive" src="{{asset('images/10.png')}}">

                                        </div>

                                    </div>
                                    <a data-slide="prev" href="#carousel2" class="left carousel-control">
                                        <span class="icon-prev"></span>
                                    </a>
                                    <a data-slide="next" href="#carousel2" class="right carousel-control">
                                        <span class="icon-next"></span>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </fieldset>
                    <h1>Profile</h1>
                    <fieldset>
                        <h2>Update</h2>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input id="first_name" name="first_name" value="{{$data->first_name}}" type="text"
                                        class="form-control required"> @if ($errors->has('first_name'))
                                    <div class="error">{{ $errors->first('first_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input id="last_name" name="last_name" value="{{$data->last_name}}" type="text"
                                        class="form-control required"> @if ($errors->has('last_name'))
                                    <div class="error">{{ $errors->first('last_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">

                                    <label>Profile Picture Update</label>
                                    <input name="avatar" type="file" />
                                </div>
                            </div>
                            <div class="col-lg-9">

                                <div class="carousel slide" id="carousel2">
                                    <ol class="carousel-indicators">
                                        <li data-slide-to="0" data-target="#carousel2" class="active"></li>
                                        <li data-slide-to="1" data-target="#carousel2"></li>
                                        <li data-slide-to="2" data-target="#carousel2" class=""></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img alt="image" class="img-responsive" src="{{asset('images/1.png')}}">

                                        </div>
                                        <div class="item ">
                                            <img alt="image" class="img-responsive" src="{{asset('images/2.png')}}">

                                        </div>

                                        <div class="item ">
                                            <img alt="image" class="img-responsive" src="{{asset('images/4.png')}}">

                                        </div>


                                        <div class="item ">
                                            <img alt="image" class="img-responsive" src="{{asset('images/7.png')}}">

                                        </div>
                                        <div class="item ">
                                            <img alt="image" class="img-responsive" src="{{asset('images/8.png')}}">

                                        </div>
                                        <div class="item ">
                                            <img alt="image" class="img-responsive" src="{{asset('images/9.png')}}">

                                        </div>
                                        <div class="item ">
                                            <img alt="image" class="img-responsive" src="{{asset('images/10.png')}}">

                                        </div>

                                    </div>
                                    <a data-slide="prev" href="#carousel2" class="left carousel-control">
                                        <span class="icon-prev"></span>
                                    </a>
                                    <a data-slide="next" href="#carousel2" class="right carousel-control">
                                        <span class="icon-next"></span>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </fieldset>


                </form> --}}
            </div>
        </div>
    </div>


    @push("scripts")
  

    <!-- Steps -->
    <script src="js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function () {
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex) {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex) {
                        return true;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex) {
                    // Suppress (skip) "Warning" step if the user is old enough.

                },
                onFinishing: function (event, currentIndex) {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex) {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                errorPlacement: function (error, element) {
                    element.before(error);
                },
                rules: {

                }
            });
        });
    </script>
    @endpush @endsection