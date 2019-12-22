<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Final Year Project</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
   
</head>
<body>
    <?php if (isset($error)) {
        echo "<script> alert('Your  Registration is Not Successful');</script>";
    } ?>
    @include('layout.genarel_home_header');
    <div class="client-header-bg">
              <div class="container">
            <h1 class="text-center">Create Your Account</h1> </div>
    </div>  
     <form action="submit_jobholder_info" method="Post" onsubmit="return checkForm(this);">
     {{ csrf_field() }}
    <section id="client_full_account">
        <div class="container">
            <div class="row"> 
                <!--==========Create Account================-->
                <div class="col-md-8 col-md-offset-2">
                    <div class="Account_info_16_03">
                        <h3 class="text-lead">Create Account</h3>
                       
                            <!-- user name field-->
                            <div id="field">
                                <label for="name" class="re-ml"><i class="fa fa-user" aria-hidden="true"></i></label>
                                <input type="text" class="form-control re-width" name="username" tabindex="1" placeholder="Enter Your UserName" required pattern=".{6,}"> </div>
                            <!-- password field-->
                            <div id="field">
                                <label for="password" class="re-ml"><i class="fa fa-unlock-alt" aria-hidden="true"></i></label>
                                <input type="password" class="form-control re-width" id="password" name="password" tabindex="1" placeholder="Enter Your password(More Than 8 Charecter)" pattern=".{8,}" required > </div>
                            <!-- confirm password field-->
                            <div id="field">
                                <label for="repassword" class="re-ml"><i class="fa fa-unlock-alt" aria-hidden="true"></i></label>
                                <input type="password" class="form-control re-width" id="confirm_password" name="confirm_password" tabindex="1" placeholder="Confirm Your PassWord" required > </div>
                      
                    </div>
                </div> 
              
                <!--======================Company Details=======-->
                <div class="col-md-8 col-md-offset-2">
                    <div class="company_info_16_03">
                        <h3 class="text-lead">Company Details</h3>
                        
                            <!-- Company name field-->
                            <div id="field">
                                <label for="name" class="re-ml"><i class="fa fa-address-card" aria-hidden="true"></i></label>
                                <input type="text" class="form-control re-width" name="company_name" tabindex="1" placeholder="Enter Your Company Name" required> </div>
                            <!-- Alternative Company field-->
                            <div id="field">
                                <label for="name" class="re-ml"><i class="fa fa-university" aria-hidden="true"></i></label>
                                <input type="text" class="form-control re-width" name="alternative_company_name" tabindex="1" placeholder="Enter Your Alternative Company Name"> </div>
                    
                            <!-- contact person designation-->
                            <div id="field">
                                <label for="name" class="re-ml"><i class="fa fa-address-book-o" aria-hidden="true"></i></label>
                                <input type="text" class="form-control re-width" name="contact_person_designation" tabindex="1" placeholder="Contact Person Designation" required> </div>
                            <!-- contact person Mobile-->
                            <div id="field">
                                <label for="number" class="re-ml"><i class="fa fa-mobile" aria-hidden="true"></i></label>
                                <input type="text" class="form-control re-width" name="contact_person_phone" tabindex="1" placeholder="Contact Person Mobile" required> </div>
                            <!-- contact person Email-->
                            <div id="field">
                                <label for="eamil" class="re-ml"><i class="fa fa-envelope-o" aria-hidden="true"></i></label>
                                <input type="email" class="form-control re-width" name="contact_person_email" tabindex="1" placeholder="Contact Person Email" required> </div>
                       
                    </div>
                </div>
                <!--===================INdustry Type ==================-->
                <div class="col-md-8 col-md-offset-2">
                    <div class="industry-type-list">
                        <h3 class="text-lead">Industry Type</h3>
                        <div class="row">
                            <!--   ================left side Industry list========================-->
                            @foreach($industry_types as $industry_type)
                            <div class="col-md-4">
                                <div class="item-left-16-03">
                                     <tbody>
                                        <tr class="biusnesstable-row">
                                            <td>
                                                <div class="item-details_16-03">
                                                    <label class="industry-label">
                                                        <input type="checkbox" name="buisnesstype[]" value="{{$industry_type->industry_type_name}}"> <span id="industry-type">{{$industry_type->industry_type_name}}</span> </label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>      
                                </div>
                            </div>
                            @endforeach 
                             <div class="col-md-4">
                                <div class="item-left-16-03">
                                     <tbody>
                                        <tr class="biusnesstable-row">
                                            <td>

                                                <div class="item-details_16-03">
                                                    <label class="industry-label">
                                                        <input type="checkbox" name="buisnesstype[]" value="others"> <span id="industry-type">Others</span> </label>
                                                </div>
   
                                            </td>
                                        </tr>
                                    </tbody>      
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=========Biusness Description============-->
                    <div class="biusness-description16-03">
                        <div id="field">
                            <label for="eamil" class="re-ml"><i class="fa fa-hand-o-right" aria-hidden="true"></i></label>
                            <textarea type="text" class="form-control des-width" name="business_description" rows="5" placeholder="Buisness Description" required></textarea>
                        </div>
                    </div>
                </div>
                <!--======================Company Details=======-->
                <div class="col-md-8 col-md-offset-2">
                    <div class="primary_contact_16_03">
                        <h3 class="text-lead">Primary Contact Details</h3>
                      
                            <!-- Company Adress field-->
                            <div id="field">
                                <label for="name" class="re-ml"><i class="fa fa-map-marker" aria-hidden="true"></i></label>
                                <input type="text" class="form-control re-width" name="company_address" tabindex="1" placeholder="Enter Your Company Address" required> </div>
                            <!-- country field-->
                            <div id="field">
                                <label for="name" class="re-ml"><i class="fa fa-globe" aria-hidden="true"></i></label>
                                <select name="company_country" class="form-control re-width" required>
                                    <option value="1">Select Country</option>
                                    <option value="bangladesh">Bangladesh</option>
                                    <option value="pakistan">Pakistan</option>
                                    <option value="nepal">Nepal</option>
                                    <option value="australia">Australia</option>
                                </select>
                            </div>
                            <!--          city field-->
                            <div id="field">
                                <label for="name" class="re-ml"><i class="fa fa-flag" aria-hidden="true"></i></label>
                                <select name="company_city" class="form-control re-width" required>
                                    <option value="1">Select City</option>
                                    <option value="dhaka">Dhaka</option>
                                    <option value="comilla">Comilla</option>
                                    <option value="chittagong">Chittagong</option>
                                    <option value="barisal">Barisal</option>
                                </select>
                            </div>
                            <!--          area field-->
                            <div id="field">
                                <label for="name" class="re-ml"><i class="fa fa-home" aria-hidden="true"></i></label>
                                <select name="company_area" class="form-control re-width" required>
                                    <option value="1">Select Area</option>
                                    <option value="Agargaon">Agargaon</option>
                                    <option value="arambag">Arambag</option>
                                    <option value="ashulia">Ashulia</option>
                                    <option value="badda">Badda</option>
                                </select>
                            </div>
                            <!-- billing adress field-->
                            <div id="field">
                                <label for="name" class="re-ml"><i class="fa fa-money" aria-hidden="true"></i></label>
                                <input type="text" class="form-control re-width" name="billing_address" tabindex="1" placeholder="Enter Your Billing Address"> </div>
                            <!-- Website URL-->
                            <div id="field">
                                <label for="link" class="re-ml"><i class="fa fa-external-link" aria-hidden="true"></i></label>
                                <input type="text" class="form-control re-width" name="company_website" tabindex="1" placeholder="Website Address(URL)"> </div>
                       
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>

    <div class="submit-button">
    <div class="container">
        <div class="col-md-2 col-md-offset-9">
            <input type="Submit" class="btn btn-client" value="Submit">
        </div>
    </div>
</div>
</form> 
    <!--======FOOTER=====-->
     @include('layout.footer');
</body>
   <script type="text/javascript">
   $('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
        $('#confirm_password').css('border-color', 'green');
    } else 
        $('#confirm_password').css('border-color', 'red');
});
   function checkForm(form){if (form.password.value==form.confirm_password.value) { return true;} else {
   alert('Password and Repassword is not Match !!'); return false;} }
    </script>
</html>