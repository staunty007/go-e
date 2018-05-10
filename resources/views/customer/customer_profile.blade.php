@extends('customer.master')

@section('customer-section')
            
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                    <div class="widget-head-color-box navy-bg p-lg text-center">
                        <div class="m-b-md">
                        <h2 class="font-bold no-margins">
                            Administrator
                        </h2>
                            <small>GOENERGEE </small>
                        </div>
                        <img src="/customer/img/a4.jpg" class="img-circle circle-border m-b-md" alt="profile">
                        <ul class="list-unstyled m-t-md">
                        <div class="text-left">
                         <li>
                             <span class="fa fa-address-card-o m-r-xs"></span>
                             <label>Company Name:</label>
                             GOENERGEE
                         </li>
                         <li>
                             <span class="fa fa-user-o m-r-xs"></span>
                             <label>Position:</label>
                             Director
                         </li>
                         <li>
                             <span class="fa fa-user-circle-o m-r-xs"></span>
                             <label>Staff Strength:</label>
                             33
                         </li>
                         <li>
                             <span class="fa fa-envelope m-r-xs"></span>
                             <label>Email:</label>
                             info@goenergee.com
                         </li>
                         <li>
                             <span class="fa fa-home m-r-xs"></span>
                             <label>Address:</label>
                             18A Fatai Idowu, Arobieke Street, Lekki,
                         </li>
                         <li>
                             <span class="fa fa-phone m-r-xs"></span>
                            <label>Contact 1:</label>
                             (+234) 803 343 6905
                         </li>
                         <li>
                             <span class="fa fa-phone m-r-xs"></span>
                            <label>Contact 2:</label>
                             (+234) 805 341 8292
                         </li>
                         <li>
                             <span class="fa fa-table m-r-xs"></span>
                            <label>Meter Number:</label>
                             (+234) 123 456 7890
                         </li>
                         <li>
                             <span class="fa fa-map-marker m-r-xs"></span>
                            <label>District:</label>
                             Lekki
                         </li>
                         <li>
                             <span class="fa fa-puzzle-piece m-r-xs"></span>
                            <label>Business Areas:</label>
                             Business Owner 
                         </li>
                        </ul>
                    </div>
                    </div>
                   
                <div class="col-lg-9">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Customer Profile Update</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h2>
                                Profile Validation Wizard Form
                            </h2>
                            <p>
                                Please provide valid information to update your profile.
                            </p>

                            <form id="form" action="#" class="wizard-big">
                                <h1>Account</h1>
                                <fieldset>
                                    <h2>Account Information</h2>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Meter/Account Number *</label>
                                                <input id="userName" name="userName" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input id="password" name="password" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
											
                                                <label>Profile Picture Update</label>
                                                <input id="profile_pic" name="profile_pic" type="file">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            
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
                                    <h2>Meter Update</h2>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input id="userName" name="userName" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Position</label>
                                                <input id="password" name="password" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Number of Staff</label>
                                                <input id="confirm" name="confirm" type="text" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            
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

                                <h1>Contact Details Update</h1>
                                <fieldset>
                                    <h2>Profile Update</h2>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input id="userName" name="userName" type="Email" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input id="password" name="password" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile phone</label>
                                                <input id="confirm" name="confirm" type="Number" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            
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

                                <h1>Meter</h1>

                                <fieldset>
                                    <h2>Meter Update</h2>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>New Meter Number</label>
                                                <input id="userName" name="userName" type="Number" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>District</label>
                                                
                                                <select class="form-control m-b" name="account">
                                                    <option>Ajele</option>
                                                    <option>Ojo</option>
                                                    <option>Mushin</option>
                                                    <option>Lekki</option>
                                                    <option>Isolo  </option>
                                                    <option>Festac</option>
                                                    <option>Ibeju</option>
                                                    <option>Orile</option>
                                                    <option>Agbara</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Business Area</label>
                                                <input id="confirm" name="confirm" type="text" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            
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
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
@endsection