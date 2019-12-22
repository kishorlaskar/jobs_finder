<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Final Year Project</title>
    <!--<meta http-equiv="refresh" content="30"/>-->

   <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/contest_style.css')}}">
     <link rel="stylesheet" type="text/css" href="{{url('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/style2.css')}}">
    <script src="{{url('js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <style type="text/css">
        .top-nav {
            padding: 0px !important;
        }
    </style>
    <script>
        //Reload Table every 30s.... 
        $(document).ready(function() {  
            setInterval(function() {
                $('#update_div').load('exam_control.php')
            },10000 );
         
         setInterval(function() {
                $('#exam_complete').load('exam_complete.php',['keyword' => "answer_show"])
            },10000 );

        });
    </script>
<script type="text/javascript">
$(document).ready(function(){
  
            setInterval(function(){
                //$('#time').load('Create_Watch/time');
               $('#time').load('time.php');
            },1000);
   
       var home=document.getElementById('home');     
       var complete=document.getElementById('completed');
       var practice=document.getElementById('practice');
            $("#completed").click(function(){
                
             complete.className='nav-link active';//alert(complete.className);
             home.className='nav-link';
             practice.className='nav-link';
            
             $("#completed_exam").css("display","block");
             $("#Exam_home").css("display","none");
             $("#arcive").css("display","none");
           });
            $("#home").click(function(){
             complete.className='nav-link ';
             home.className='nav-link active';
             practice.className='nav-link ';
            $("#Exam_home").css("display","block");
             $("#completed_exam").css("display","none");
             $("#arcive").css("display","none");
          });
            $("#practice").click(function(){
             complete.className='nav-link ';
             home.className='nav-link';
             practice.className='nav-link active';
            $("#Exam_home").css("display","none");
             $("#completed_exam").css("display","none");
             $("#arcive").css("display","block");
          });
       });
</script>
</head>

<body>
     @include('layout.auth_jobseeker_header');
    <div id="time">
        00 : 00 : 00 PM
    </div>
    <!-- nav bar...-->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" id="home" href="#">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="completed" href="#">Completed</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="practice" href="#">Practice</a>
        </li>
    </ul>
    <div id="Exam_home" style="display:block;">
        <div class="heading-page divider">
            <div class="container-fluid">
                <div class="heading-details">
                    <h3>Skill Tests Topics</h3>
                    <p>Prove your skills</p>

                </div>
            </div>
        </div>
        <!--<div class="test-subject-list divider">-->
        <div class="container-fluid">
            <div id="update_div">
              @include ('contest.exam_control')
            </div>
        </div>
        <!-- </div>-->
        
    </div>


    <div id="completed_exam" style=" display:none">
        <!--Complete Exam List-->
        <div class="heading-page divider">
            <div class="container-fluid">
                <div class="heading-details">
                    <h3>Completed Exam List</h3>
                    <p>You Can Only See This List Now..</p>

                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div id="exam_complete">
                @include('contest.exam_complete', ['keyword' => "answer_show"])
            </div>
        </div>
    </div>
    {{-- Archive--}}
    <div id="arcive" style="display:none ">    
            <section class="user-cv-7jan">     
            <div class="mian-body-cv">
                <div class="row">
                    <div class="col-md-2">
                        
                        <!-- required for floating -->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-left" style="margin-top: 20%">
                            <div class="vertical-menu" id="vartical_div">
                    <?php 
                        $years=DB::table('complete_contest')->distinct()->orderBy('year', 'desc')->get(['year']);
            
                         foreach($years as $year ) { 
                      ?>

                            <li style="padding: 10px;" id="{{$year->year}}" onclick="show_their_div({{$year->year}})" ><a style="text-decoration: none" href="#home" data-toggle="tab">{{$year->year}}</a></li>

                 <?php
                        
                  }
                  ?>
                           
                            </div>  
                        </ul>
                    </div>
                    <div class="col-md-10">
                        <div id="practice_main_div">
                      <?php foreach ($years as $year) { 
                         if($year->year== date("Y")){
                        ?>      
                        <div id="{{$year->year}}_div" style="display: block;">
                         <?php } 
                           else { ?>
                               <div id="{{$year->year}}_div" style="display: none;">
                       <?php    } ?>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                             <h2 style="display: inline-block;margin-left: 40%"> {{$year->year}}</h2>
                   @include('contest.exam_complete', ['keyword' => $year->year])
            </div>
        </div>
 
                  </div> <?php } ?>
                    </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
         
        </section>
    
  </div> 
  <div style="margin-top: 50px;"></div>
     @include('layout.footer'); 
</body>
<script src="{{url('js/main.js')}}"></script>
</html>
<script type="text/javascript">
    function show_their_div(year){
        var year_div='#'+year+'_div';
        $('#practice_main_div').children().hide();
        $(year_div).css("display","block");
    }
</script>
