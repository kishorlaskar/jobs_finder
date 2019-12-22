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
                        <a class="navbar-brand" href="#"><img src="{{url('image/logo.png ')}}"></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="{{url('jobholder_home')}}">Home</a></li>
                           
                            <li><a href="{{url('post_job')}}">Post Job</a></li>
                            <li><a href="{{url('job_list')}}">Job List</a></li> 
                        </ul>
          
                     <ul class="nav navbar-nav navbar-right">
                      <li><a href="#"><img src="{{url('image/candidate-profile/user-logo.png ')}}" class="img-responsive user-image-login img-circle"></a></li> 
                         <!--messageing........-->
                 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Message (<b>2</b>)</a>
          <ul class="dropdown-menu notify-drop">
            <div class="notify-drop-title">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">Bildirimler (<b>2</b>)</div>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
                </div>
            </div>
            <!-- end notify title -->
            <!-- notify content -->
            <div class="drop-content">
                <li><a href="{{url('jobholder/messanger')}}">
                    <div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
                    <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                    <p>Lorem ipsum sit dolor amet consilium.</p>
                    <p class="time">1 Saat önce</p>
                    </div>
                    </a>
                </li>
            </div>
            <div class="notify-drop-footer text-center">
                <a href=""><i class="fa fa-eye"></i> More</a>
            </div>
          </ul>
        </li>
    
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell" aria-hidden="true"></i> (<b>2</b>)</a>
          <ul class="dropdown-menu notify-drop">
            <div class="notify-drop-title">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">Bildirimler (<b>2</b>)</div>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
                </div>
            </div>
            <!-- end notify title -->
            <!-- notify content -->
            <div class="drop-content">
                <li>
                    <div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
                    <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                    <p>Lorem ipsum sit dolor amet consilium.</p>
                    <p class="time">1 Saat önce</p>
                    </div>
                </li>
            </div>
            <div class="notify-drop-footer text-center">
                <a href=""><i class="fa fa-eye"></i> More</a>
            </div>
          </ul>
        </li>
                         <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">setting <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="text-center"><a href="{{url('signout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>SignOut</a></li>
           
          </ul>
        </li>
      </ul>
   
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
    </section>