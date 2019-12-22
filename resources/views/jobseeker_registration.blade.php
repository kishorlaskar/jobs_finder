<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Final Year Project</title>
    <meta name="_token" content="{{ csrf_token() }}">
<!--<meta name="description" content="">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/registration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">

</head>

<body>
     @include('layout.genarel_home_header');
    <!--======REGISTRATION HTML=======-->
    <?php $part1="modal-body modal-body-step-1 is-showing";
          $part2="modal-body modal-body-step-2";
    $emailErr='';
    $email='';
    ?> 
<!-- email -->

<!-- Email Verify and chacking with database..-->

<div class="modal-wrap">
    <div class="modal-header"><span class="is-active"></span><span></span></div>
    <div class="modal-bodies">

            <div id="part1" class="modal-body modal-body-step-1 is-showing">
                <div class="title">Step 1</div>
                <div id="emailerror" class="description">Enter Your Email.</div>

                 <p id="email_error_message" style="color:red;"></p>
              <!--  <form method="post" id="emailform"> -->
                    <input type="email" name="email" id="email" placeholder="Email" required/>
                    <div class="text-center">
                        <input type="button" onclick="email_submit()" class="button" name="emailsubmit" value="Next">

                    </div>
                <!--</form>-->



</div>

<!-- part 2-------->
<div id="part2" class="modal-body modal-body-step-2">
    <div class="title">Step 2</div>
  <!--  <form action="" method="post">-->
        <div class="row">
            <div class="col-md-6">
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last name" required>
                            </div>
                        </div>
                        

                        <input type="password" name="password" id="password" placeholder="Password" data-placement="left" data-trigger="manual" data-toggle="popover" title="" data-content="Choose at least 8 charecter" data-html="true" data-original-title="Password" required>
                        <input type="password" name="repassword" id="repassword" placeholder="Re-Password" data-placement="left" data-trigger="manual" data-toggle="popover" title="" data-content="Password Not Match" data-original-title="Re-Password" required>
                        <p id="error_print" style="color:red;"></p>
                        <div class="text-center fade-in">
                            <input type="button" id="name_password_submit" class="button" name="name_password_submit" value="Sign Up">

                        </div>
                <!--    </form>-->
                </div>
        </div>
    </div>


    <script>
        //Email check ......
        function email_submit() {
            var email = document.getElementById('email').value;
            var email_reset = document.getElementById('email');
            var part1=document.getElementById('part1');
            var part2=document.getElementById('part2');
            var email_error_message=document.getElementById('email_error_message');
            if (email != '') {
                var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (!email.match(filter)) {
                    alert('Please provide a valid email address1');
                    email.focus;
                } else {
  $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') } });
                    $.ajax({
                        url: 'email_verify',
                        type: 'POST',
                        data: {
                            email: email

                        },
                        success: function(msg) {
                           
                            if (msg == "confirm") {
                                part1.className = "modal-body modal-body-step-2";
                                part2.className = "modal-body modal-body-step-1 is-showing";
                                
                            } else {
                                   email_error_message.innerHTML="This Email is Already Registerd !!";
                                email_reset.value='';
                            }
                        }
                    });
                }
            } else {
                alert("Please provide a valid email address !!");
            }

        }
        //submit username_password_submit form without reloding........
        $(document).ready(function() {
            $('#name_password_submit').click(function() {     
             var password = document.getElementById('password').value;
                var passwordlenght = password.length;
                var repassword = document.getElementById('repassword').value;
                var firstname = document.getElementById('firstname').value;
                var lastname = document.getElementById('lastname').value;
                
                if (firstname != '' && lastname != '' && password != '' && repassword != '') {
                    if (passwordlenght > 7) {
                        if (password == repassword) {
                            var emailpass = document.getElementById('email').value;
                          
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') } });
                            $.ajax({
                                url: 'pass_candidate_register_info',
                                type: 'POST',
                                data: {
                                    email: emailpass,
                                    password: password,
                                    firstname: firstname,
                                    lastname: lastname
                                },
                                success: function(msg) {
                                    alert (msg);
                                    if (msg=='Your Registration is Successful') {
                                       // alert(msg);
                             window.location.href = "<?php echo URL::to('/candidate_home'); ?>";  
                                    }
                                    
                         
                                }
                            });
                        } else {
                            document.getElementById("error_print").innerHTML = 'password and Re-Password is not Match';
                        }
                    } else {

                        document.getElementById("error_print").innerHTML = 'Choose Password at least 8 charecter';
                    }
                } else {
                    document.getElementById("error_print").innerHTML = 'Every field data is required';
                }

            });

        });
    </script>


    <!--script for input popover till click another area-->
    <script>
        var passlength, repassvalue, passvalue;
        $('[data-trigger="manual"]').click(function() {
            $(this).popover('toggle');
            $("#password").keyup(function() {
                //$("#password").attr('data-content','kkkkkkkkkk');
                //$('.popover-title').css("color", "green");
                passvalue = document.getElementById('password').value;
                passlength = passvalue.length;
                if (passlength > 7) {
                    $('.popover').css("color", "green");
                    $('#password').css("border-color", "black");

                } else {
                    $('.popover').css("color", "red");
                    $('#password').css("border-color", "red");
                }
                $(this).popover('show');
            });
            $("#repassword").keyup(function() {
                //$("#password").attr('data-content','kkkkkkkkkk');
                //$('.popover-title').css("color", "green");
                repassvalue = document.getElementById('repassword').value;
                if (repassvalue == passvalue) {
                    $('.popover').css("color", "green");
                    $('#repassword').css("border-color", "black");
                    $("#repassword").attr('data-content', 'Password Match');
                } else {
                    $('.popover').css("color", "red");
                    $('#repassword').css("border-color", "red");
                    $("#repassword").attr('data-content', 'Password Not Match');
                }
                $(this).popover('show');
            });

        }).blur(function() {
            $(this).popover('hide');
        });
    </script>

</body>

</html>