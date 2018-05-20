@extends('layouts.agent') @section('content')

    <div class="wrapper wrapper-content">
        <div class="row">

                  
                   
                    
                  </DIV>
                    
            
                       <div class="row">
                        <div class="col-lg-12">
                                        <div class="panel panel-success">
                                        <div class="panel-heading">
                                            Meter Request Form
                                        </div>
                                            
                                                <div class="ibox-content">
                                                    <form method="get" class="form-horizontal">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">First Name</label>
                                                            <div class="col-sm-3"><input type="text" class="form-control"></div>
                                                            <label class="col-sm-2 control-label">Last Name</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control"> 
                                                        </div></div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Address</label> 
                                                            <div class="col-sm-9"><input type="text" class="form-control"></div><div class="form-group">
                                                            </div>

                                                            <label class="col-sm-2 control-label">Closest Bus stop</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control"> 
                                                        </div>
                                                        <label class="col-sm-2 control-label">Email Address</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control"> 
                                                        </div></div>
                                                        <label class="col-sm-2 control-label">Distribution Company</label>
                                                            <div class="col-sm-3">
                                                                <select class="form-control m-b" name="account">
                                                                    <option>EKEDC</option>
                                                                    <option>Others</option>
                                                                   
                                                                </select>
                                                        </div>
                                                        <label class="col-sm-2 control-label">District/Location</label>
                                                            <div class="col-sm-3">
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
                                                       
                                                       
                                                    
                                                    <div class="hr-line-dashed"></div>
                                                        <div class="form-group">
                                                            <div class="hr-line-dashed"></div>
                                                              <label class="col-sm-2 control-label">Gender<br /></label>
                                                                 <div class="col-sm-2">
                                                                <div class="i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> Male </label></div>
                                                                <div class="i-checks"><label> <input type="radio" checked="" value="option2" name="a"> <i></i> Female</label></div>
                                                                 </div>


                                                        <label class="col-sm-2 control-label">House Type<br /></label>
                                                           <div class="col-sm-2">
                                                          <div class="i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> Residential </label></div>
                                                          <div class="i-checks"><label> <input type="radio" checked="" value="option2" name="a"> <i></i> Commercial </label></div>
                                                           </div>


                                                    <label class="col-sm-2 control-label">Meter Type<br /></label>
                                                       <div class="col-sm-2">
                                                      <div class="i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> Post paid </label></div>
                                                      <div class="i-checks"><label> <input type="radio" checked="" value="option2" name="a"> <i></i> Prepaid </label></div>
                                                       </div>
                                                        </div>

                                                        
                                                        <div class="hr-line-dashed"></div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">
                                                                Declaration <br />
                                                               
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <div><label> <input type="checkbox" value=""> 
                                                                <li> I, the undersigned, in my capacity as the owner detailed above, do hereby declare that the information supplied is to the best of my knowledge, true and correct.  </li>

                                                                <li> I hereby apply for the retrofitting of a credit electricity system or meter to a prepayment meter. I also affirm to pay every outstanding electricity bill/account which is in arrears.  </li>

                                                                <li> I acknowledge that I will pay the full cost of the smart prepayment meter, including but not limited to installation & commissioning costs, associated add-ons as may be required by the utility company or her representatives.  </li>

                                                                <li> Conversion to the prepayment electricity meter does not inhibit the application of the various bylaws.   </li>

                                                                <li> I acknowledge that in terms of the Electricity Supply Bylaws currently in place, only one electricity meter is allowed per single residential property. Any internal metering on the property is not covered under this application.    </li>

                                                                <li>  I acknowledge that there is a lag in the billing of electricity consumed on the credit meter and that once the installation of the prepayment meter has been performed, I, or my tenant where applicable, will still be responsible for the payment of the electricity consumed up to this date.   </li>

                                                                <li> I acknowledge that if my prior credit account for the basic electricity charge and other services charges is not settled within the stipulated timeframe, access to the electricity supply will be terminated. Further to this, I will not be able to purchase any prepayment tokens until the receipt is processed by the Utility service provider or her representative.    </li>
                                                                

                                                                <li>   I will update the meter users with regard to the retrofitting of the credit meter with a prepayment meter and ensure every outstanding bills or energy consumed is paid for..   </li></div>
                                                                <div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="hr-line-dashed"></div>
                                                        <div class="form-group">
                                                        <div class="col-sm-4 col-sm-offset-2">
                                                                <button class="btn btn-white" type="submit">Cancel</button>
                                                                <button class="btn btn-primary" type="submit">Submit</button>
                                                        </div>
                                                        
                                                        
                                                        
                                                      
                                                        
                                                        
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                    

                </div>
            </div>
       
        </div>
       
@endsection