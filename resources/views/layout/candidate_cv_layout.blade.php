<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Final Year Project</title>
    <meta name="description" content="">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
     <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/style2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/candidate_cv.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/responsive.css')}}">
    <link rel="stylesheet" href="{{url('css/jQuery-plugin-progressbar.css')}}">
    

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet"> 
    <script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
 <script src="{{url('js/jQuery-plugin-progressbar.js')}}"> </script>
 <script> var project=0; var a=0; var b=0; var l=0; var r=0;</script>
    </head>
 
   
<body>

     @php if(session('success')){
    echo '<div class="row" id="show_success_message">
     <div class="col-md-4 animated fadeInDown" style="background-color: green; height: 55px; color:white;position: absolute; z-index: 1; right: 0; top:5px; text-align: center;"><h5>'.session('success').'</h5></div>
    </div>';
} 
  elseif(session('error')){
  echo '<div class="row" id="show_success_message">
     <div class="col-md-4 animated fadeInDown" style="background-color: red; height: 55px; color:white;position: absolute; z-index: 1; right: 0; top:5px; text-align: center;"><h5>'.session('error').'</h5></div>
    </div>';
}
else{ }
@endphp

    <!--===== top nav ====-->
    @include('layout.auth_jobseeker_header');
    <!--    Cv Header BackGround-->
    <div class="cv-header">
        <div class="container">
            <h1 class="text-center">Make Your CV</h1> </div>
    </div>
    <!--======> USER PROFLIE PAGE/CV PAGE <=========-->
    <section class="user-cv-7jan">
        <div class="container-fluid">
            <div class="mian-body-cv">
                <div class="row">
                    <div class="col-md-3" id="side_navbar">
                        <!-- required for floating -->
                        <!-- side Nav tabs -->
                        @yield('side_navber')
  
                    </div>

                    <div class="col-md-9 cv-body-bg"> 
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!--===================
                                Horizontal Tab Menu FOr Poat Resume Part 
                            ================-->
                            @yield('post_resume11')
                            <!--============
                            Upload Academic Trascript... 
                             ===============-->
                            @yield('academic_transcript')
                            <!--===========
                            Project/Work.... 
                          ===================-->
                           @yield('project_work')
                            <!--===========
                           Skill test result 
                        ===================-->    
                            @yield('skill_test_Result_info')
                            
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
    <!--======FOOTER=====-->
    @include('layout.footer');

</body>
 
<script src="{{url('js/my_ajax.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>

</html>
<script type="text/javascript">
    setTimeout(function () {
    $("#show_success_message").fadeOut(2000)
}, 3000);
    </script>