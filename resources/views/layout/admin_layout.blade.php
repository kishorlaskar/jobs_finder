<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="{{url('image/logo.png')}}>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
 
  <link href="{{url('admin/css/material-dashboard.css?v=2.1.0')}}" rel="stylesheet" />
 
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{url('admin/demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper ">
     <div class="sidebar" data-color="purple" data-background-color="black" data-image="{{url('admin/img/sidebar-2.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="" class="simple-text logo-normal">
          Jobs Finder
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="{{url('admin_dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('user_profile')}}">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('candidate_list')}}">
              <i class="material-icons">list</i>
              <p>Candidate List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('jobholder_list')}}">
              <i class="material-icons">list</i>
              <p>Jobholder List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('admin_job_list')}}">
              <i class="material-icons">list</i>
              <p>Job List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('manage_job')}}">
              <i class="material-icons">table_chart</i>
              <p>Manage Job</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('skill_test_info')}}">
              <i class="material-icons">import_contacts</i>
              <p>Skill Test</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('live_contest')}}">
              <i class="material-icons">import_contacts</i>
              <p>Live Contest</p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" href="{{url('notifications')}}">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="javascript:void(0)">Mike John responded to your email</a>
                  <a class="dropdown-item" href="javascript:void(0)">You have 5 new tasks</a>
                  <a class="dropdown-item" href="javascript:void(0)">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another Notification</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another One</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      @yield('main_panel')
    </div>
  </div>
  
 

</body>

</html>