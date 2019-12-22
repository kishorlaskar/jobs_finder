      <!--===== top nav ====-->
    <section class="top-nav">
        <div class="container">
            <div class="row">
                 <div class="col-md-6">
                    <div class="left-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!--    ===== menu navbar ====-->
        <section id="menu-navbar">
        <div class="nav-bar">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="{{ url('/')}}"><img src="{{url('image/../image/logo.png')}}"></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                                <li><a href="{{ url('/')}}">Home</a></li>
                                <li><a href="#">Tranning</a></li>
                                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Resource <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Career Guide</a></li>
                                        <li><a href="{{url('interview_tips')}}">Interview Tips</a></li>
                                        <li><a href="#">Resume Tips</a></li>
                                    </ul>
                                </li>
                            </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                    <p class="text-center"><a href="#" class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#login-modal">sign in</a></p>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-primary btn-lg btlg-2" data-toggle="modal" data-target="#myModal"> create account</button>
                                </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
    </section>

        <!--menu navbar end-->
        <!--  ======>Sign In id<=====-->
        <section class="sign-in-id">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" align="center"> <img class="img-circle" id="img_logo" src="{{url('image/logo.png')}}" alt="image">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>
                                    </div>
                                    <!--  radio Button -->
                                        
                                           <p class="help-block" style="color: red" id="error"></p>
                                       
                                    <form action="{{url('loginpage')}}" method="post" >
                                              {{ csrf_field() }}
                                        <div class="modal-body">
                                            <select name="name_combo" id="name_combo" style="padding:5px;height:10%;width:50%;font-size:16px;">
                                               <option value="jobseeker_info">Candidate</option>
                                                <option value="jobholder_info">Job Holder</option>
                                            </select>
                                            <input id="login_username" required name="email_or_username" class="form-control" type="text"  placeholder="Email or Username "pattern=".{6,}">
                                            <input id="login_password" required name="password" class="form-control" type="password" placeholder="Password" pattern=".{8,}">
                                            <span style="color:red;"> </span>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="rememberme"> Remember me </label>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" id="login_submit" name="submit" class="btn btn-primary btn-lg btn-block pr-button" value="Sign In">
                                               <button id="login_lost_btn" type="button" class="btn btn-link">Forget Password?</button>
                                        </div> 
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript">
    $(document).ready(function() {
            $('#login_submit').click(function() { 
                document.getElementById('error').innerHTML='';
     if (document.getElementById('login_username').value.length>0 && document.getElementById('login_password').value.length>7) {
         var name_combo = document.getElementById('name_combo').value;
         var email_or_username = document.getElementById('login_username').value;
         var password = document.getElementById('login_password').value;
          /* $.ajaxSetup({
                headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                       });*/

                    $.ajax({
                        url: '{{url('loginpage')}}' ,
                        type: 'POST',
                        data: {
                            "_token" : $('meta[name=_token]').attr('content'),
                            email_or_username: email_or_username,
                            password: password,
                            name_combo: name_combo

                        },
                        success: function(msg) {      
                           if (msg=='jobholder_123') {      
                                     window.location.href = "<?php echo URL::to('/jobholder_home'); ?>";  
                                    }
                            else if(msg=='jobseeker_123'){
                                    window.location.href = "<?php echo URL::to('/candidate_home'); ?>"; 
                                    }
                            else {
                               document.getElementById('error').innerHTML=msg;
                            }
                            //document.getElementById('error').innerHTML=msg;
                        }
                    });        
         } 
     });

        });
    </script>

        <!--=======> create account option <=======-->
        <section class="craeate-account-id">
            <div class="container">
                <div class="banner-inner text-center">
                    <div class="row">
                        <!--  Craeate modal-->
                        <div class="col-md-12">
                            <div class="login-wrapper">
                                <!-- Button trigger modal -->
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content model-content-feb5">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Create Your Account</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="jobseeker"> <i class="fa fa-user-secret" aria-hidden="true"></i>
                                                            <h3>Job Seeker</h3>
                                                            <p>Post/Manage resume and apply to right jobs in the easiest way</p>
                                                            <h5 class="lead"><a 
                                                           href="{{ url('/jobseeker_registration')}}"> Create Account </a></h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="jobseeker"> <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                            <h3>Job Holder</h3>
                                                            <p>Post/Manage resume and apply to right jobs in the easiest way</p>
                                                            <h5 class="lead"><a href="{{ url('/jobholder_registration')}}">Create Account </a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>