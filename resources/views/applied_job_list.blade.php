<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Final Year Project</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=.5">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.icon">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <style>
     .sidenav {
    width: 0;
    position: fixed;
    z-index: 1;
    top: 20;
    left: 0;
    background-color: #16A085;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    padding-bottom:10px;
}


.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
.sidenav > ul >li >a{
  color:black;
}
     </style>
    </head>

<body> 

   @include ('layout.auth_jobseeker_header');

<span style="font-size:30px;cursor:pointer;position: fixed; margin-top: 200px; margin-left: 10px;" onclick="openNav()">&#9776;</span>

<div class="sidenav" id="mySidenav">        
      <ul class="nav nav-tabs tabs-left" style="border-color: #16A085 !important; " >
                        <li class="closebtn" style="float: none;"><a href="javascript:void(0)" data-toggle="tab" onclick="closeNav()" style="border-color: #16A085 !important; color:black; ">&times;</a></li>

                        <li class="" style="float: none; color:black;"><a href="{{url('candidate_cv')}}"><i class="fa fa-file-pdf-o"></i>Post Resume</a></li>
                       
                       <li class="" style="float: none;"><a href="{{url('project_work_info')}}"><i class="fa fa-file-video-o"></i>Project/Work</a></li>
                 
                       <li class="" style="float: none;"><a href="{{url('/academic_transcript_info')}}"><i class="fa fa-file-video-o"></i>Academic Transcript</a></li>
                 
                       <li style="float: none;"><a href="{{url('general_cv')}}"><i class="fa fa-file-pdf-o"></i>General CV</a></li>
                 
                       <li class="" id="input" style="float: none;"><a href="{{url('skill_test_result_info')}}"><i class="fa fa-text-width"></i>Skill Test Result</a></li>  
                        
                       <li style="float: none;"><a href="{{url('applied_job_list')}}" ><i class="fa fa-eye"></i>Applyed Job</a></li> 
             </ul>    
</div>


    <div class="candidate-jobs-bg">
        <h2 class="text-center">Find Your Applied Jobs</h2>
    </div>
 <!--=================featured-jobd-->
    <section class="featured">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading-17-03">
                        <h2>Applied Jobs List</h2> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="table-bg">
                        <table class="table">
                            <tbody>
                                @foreach($JobLists as $JobList )
                                  <tr>
                                    @foreach($JobholderInfo_CompanyTypes as $JobholderInfo_CompanyType)
                                     @if($JobList->client_user_name == $JobholderInfo_CompanyType->username)
                                    <td>
                                        <div class="tab-image"><img src="image/feature-jobs/img1.jpg" alt="" class="img-responsive"></div>
                                        <h1>{{$JobList->designation_name}} <p><a href="">{{$JobholderInfo_CompanyType->industry_type}}</a></p></h1>
                                    </td>
                                    <td><span class="work-time" style="vertical-align: middle;">{{$JobList->job_type}}</span></td>
                                    <td><span class="ti-location-pin"></span>   
                                        {{$JobholderInfo_CompanyType->company_area}}, {{$JobholderInfo_CompanyType->company_city}},{{$JobholderInfo_CompanyType->company_country}}</td>
                                        
                                    <td><a href="{{ route('candidate_view_job_details',['name' => $JobList->id]) }}" class="table-btn-default">View Job</a></td>
                                    @php break 1; @endphp
                                        @endif
                                        @endforeach
                                </tr>
                              
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12"> 
        <!-- Side Bar start -->
        <div class="sidebar"> 

        </div>
        <!-- Side Bar end --> 
      </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-left">
                       <nav aria-label="Page navigation">
  <ul class="pagination">   
    {{$JobLists->links()}}
  </ul>
</nav>
                </div>
            </div>
        </div>
    </section>


   
    <!--======FOOTER=====-->
    @include('layout.footer');

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>