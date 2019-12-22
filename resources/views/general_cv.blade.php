<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Final Year Project</title>
    <meta name="description" content="">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link rel="stylesheet" type="text/css" href="{{url('css/animate.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/style2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/candidate_cv.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('css/jQuery-plugin-progressbar.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <style type="text/css">
        th{
            width: 0%;
            font-size: 15px !important;
        }
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
}


.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
    </style>
 </head>
 
   
<body>
    <!--===== top nav ====-->
    @if(Session::has('jobseeker_email'))
    @include('layout.auth_jobseeker_header');

    <span style="font-size:30px;cursor:pointer;position: fixed; margin-top: 200px; margin-left: 10px;" onclick="openNav()">&#9776;</span>

    <div class="sidenav" id="mySidenav">        
                <ul class="nav nav-tabs tabs-left" style="border-color: none !important; " >
                            <li class="closebtn" style="float: none;"><a href="javascript:void(0)" data-toggle="tab" onclick="closeNav()">&times;</a></li>

                            <li class="" style="float: none;"><a href="{{url('candidate_cv')}}"><i class="fa fa-file-pdf-o"></i>Post Resume</a></li>
                           
                           <li class="" style="float: none;"><a href="{{url('project_work_info')}}"><i class="fa fa-file-video-o"></i>Project/Work</a></li>
                     
                           <li class="" style="float: none;"><a href="{{url('/academic_transcript_info')}}"><i class="fa fa-file-video-o"></i>Academic Transcript</a></li>
                     
                           <li style="float: none;"><a href="{{url('general_cv')}}"><i class="fa fa-file-pdf-o"></i>General CV</a></li>
                     
                           <li class="" id="input" style="float: none;"><a href="{{url('skill_test_result_info')}}"><i class="fa fa-text-width"></i>Skill Test Result</a></li>  
                            
                           <li style="float: none;"><a href="{{url('applied_job_list')}}" ><i class="fa fa-eye"></i>Applyed Job</a></li> 
                 </ul>    
    </div>


     <div class="container">
    <div class="row">
      <div class="col-md-4">
        <a class="btn btn-lg btn-primary" style="width: 115px;" href="{{url('Download_general_cv')}}">Download CV</a>
    </div>

    @elseif(Session::has('jobholder_username'))
    @include ('layout.auth_jobholder_header');
   
   <div class="container">
    <div class="row">
      <div class="col-md-4">
        <form method="post" action="{{url('Download_candidate_cv')}}">
          {{ csrf_field() }}
           <input type="hidden" name="candidate_email" value="{{$candidate_info->jobseekeremail}}">
           <button type="submit" class="btn btn-lg btn-primary" style="width: 115px;"> Download CV </button>
        </form>
    </div>
     @endif
    <div class="col-md-4"><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Curriculum vitae</h2><hr>
      <h2>Personal Information</h2>
    </div>
   <div class="col-md-2"></div>
    <div class="col-md-2"> 
      @if($candidate_info->candidate_image)
             <img class="" style="height: 137px;width: 100%;" src= "{{url('storage/uploaded_candidate_image/'.$candidate_info->jobseekeremail.'.jpg')}}" > 
      @else
              <img src="{{url('image/resum-image.jpg')}}" style="height: 137px;width: 100%;">
      @endif
    </div>
  </div>
       <div class="row">
           <div class="col-md-6">
            <h4>Name : {{$candidate_info->firstname}} {{$candidate_info->lastname}}</h4>
            <h4>Father Name : {{$candidate_info->fathername}}</h4>
            <h4>Mother Name : {{$candidate_info->mothername}}</h4>
            <h4>Date Of Birth : {{$candidate_info->DOB}}</h4>
            <h4>Marital Status : {{$candidate_info->marital_status}}</h4>
            <h4>Gender : {{$candidate_info->gender}}</h4>  
           </div>
           <div class="col-md-6">
            <h4>Religion : {{$candidate_info->religion}}</h4>
            <h4>Parmanent Address : {{$candidate_info->permanent_address}}</h4>
            <h4>Prasent Address : {{$candidate_info->present_address}}</h4>
            <h4>Nationality : {{$candidate_info->nationality}}</h4>
            <h4>Mobile Number : {{$candidate_info->mobile}}</h4>
            <h4>Email : {{$candidate_info->jobseekeremail}} , {{$candidate_info->optional_email}}</h4>
           </div>
       </div>
       <div class="row"><div class="col-md-4"> 
       </div><div class="col-md-8"><h2>&nbsp;&nbsp;&nbsp;&nbsp;Educational Information
</h2></div></div>
         <div class="row">
           <div class="col-md-12">
          <table class="table">
              <tr>
                  <th>Title</th>
                  <th>Major</th>
                  <th>Institute</th>
                  <th>Passing Year</th>
                  <th>Result</th>
              </tr>
               @foreach($education_infos as $education_info)
              <tr>
                  <td>{{$education_info->education_title}}</td>
                  <td>{{$education_info->education_major}}</td>
                  <td>{{$education_info->education_institute_name}}</td>
                  <td>{{$education_info->passing_year}}</td>
                  <td>{{$education_info->education_result}}</td>  
              </tr>
             @endforeach
          </table>
           </div>
       </div>

        <div class="row"><div class="col-md-4"></div><div class="col-md-8"><h2>&nbsp;&nbsp;&nbsp;&nbsp;Skill Information
</h2></div></div>
         <div class="row">
           <div class="col-md-12">
          <table class="table">
              <tr>
                  <th>Skill Name</th>
                  <th>Experiance</th>
                  <th>Proficiency</th>
              </tr>
                 @foreach($skill_infos as $skill_info)
              <tr>
                <td>{{$skill_info->skill}}</td>
                <td>{{$skill_info->skill_experiance}}</td>
                <td>{{$skill_info->skill_proficency}}</td>
              </tr>
              @endforeach
          </table>
           </div>
       </div> 


       <div class="row"><div class="col-md-4"></div><div class="col-md-8"><h2>&nbsp;&nbsp;&nbsp;&nbsp;Language Information
</h2></div></div>
         <div class="row">
           <div class="col-md-12">
          <table class="table">
              <tr>
                  <th>Language</th>
                  <th>Spoken</th>
                  <th>Written</th>
                  <th>Reading</th>
              </tr>
               @foreach($language_infos as $language_info)
              <tr>
                <td>{{$language_info->language}}</td>
                <td>{{$language_info->language_spoken_type}}</td>
                <td>{{$language_info->language_writting_type}}</td>
                <td>{{$language_info->language_reading_type}}</td>
              </tr>
              @endforeach
          </table>
           </div>
       </div>
        @foreach($project_infos as $project_info)
        <div class="row"><div class="col-md-4"></div><div class="col-md-8"><h2>&nbsp;&nbsp;&nbsp;&nbsp;Project/Work Information
</h2></div></div>
         <div class="row">
           <div class="col-md-12">
          <table class="table">
              <tr>
                  <th>Project/Work Name</th>
                  <th>Discription</th>
                  <th>Link</th>
              </tr>
              @foreach($project_infos as $project_info)
              <tr>
                <td>{{$project_info->project_name}}</td>
                <td>{{$project_info->project_discription}}</td>
                <td><a target="_blank" href="{{ route('external_link',['name' => $project_info->project_link]) }}">{{$project_info->project_link}}</a></td>
              </tr>
              @endforeach
          </table>
           </div>
       </div>
       @php  break; @endphp
       @endforeach
       @foreach($skill_test_results as $skill_test_result)
        <div class="row"><div class="col-md-4"></div><div class="col-md-8"><h2>&nbsp;&nbsp;&nbsp;&nbsp;Skill Test Result
</h2></div></div>
         <div class="row">
           <div class="col-md-12">
          <table class="table">
              <tr>
                  <th>SL</th>
                  <th>Test Name</th>
                  <th>Result</th>
              </tr>
              @php($sl=0)
              @foreach($skill_test_results as $skill_test_result)
              @php($sl++)
              <tr>
                <td>{{$sl}}</td>
                <td>{{$skill_test_result->subject_name}}</td>
                <td>{{$skill_test_result->result}}</td>
              </tr>
              @endforeach
          </table>
           </div>
       </div>
       @php break; @endphp
       @endforeach
        @foreach($live_contest_results as $live_contest_result)
        <div class="row"><div class="col-md-4"></div><div class="col-md-8"><h2>&nbsp;&nbsp;&nbsp;&nbsp;Live Contest Result
</h2></div></div>
         <div class="row">
           <div class="col-md-12">
          <table class="table">
              <tr>
                  <th>SL</th>
                  <th>Test Name</th>
                  <th>Result</th>
              </tr>
               @php($sl=0)
              @foreach($live_contest_results as $live_contest_result)
              @php($sl++)
              <tr>
                <td>{{$sl}}</td>
                <td>{{$live_contest_result->subject_name}}</td>
                <td>{{$live_contest_result->result}}</td>
              </tr>
              @endforeach
          </table>
           </div>
       </div>
        @php break; @endphp
       @endforeach
       @foreach($ref_infos as $ref_info)
       <div class="row"><div class="col-md-4"></div><div class="col-md-8"><h2>&nbsp;&nbsp;&nbsp;&nbsp;Reference Information
</h2></div></div>
         <div class="row">
           <div class="col-md-12">
          <table class="table">
              <tr>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Relation Ship</th>
                  <th>Phone</th>
                  <th>Email</th>
              </tr>
               @foreach($ref_infos as $ref_info)
               <tr>
                 <td>{{$ref_info->ref_name}}</td>
                 <td>{{$ref_info->ref_designation}}</td>
                 <td>{{$ref_info->ref_relationship}}</td>
                 <td>{{$ref_info->ref_phone}}</td>
                 <td>{{$ref_info->ref_email}}</td>
               </tr>
               @endforeach
          </table>
           </div>
       </div>
       @php break; @endphp
       @endforeach

        @if(!empty($transcriptions))
    <div class="row"><div class="col-md-4"></div><div class="col-md-8"><h2>&nbsp;&nbsp;&nbsp;&nbsp;Transcription Information
</h2></div></div>
  <div class="row">
    @foreach($transcriptions as $transcription)
    <div class="col-md-4">
       <h3> <a href="{{url('storage/uploaded_candidate_file/'.$candidate_info->jobseekeremail.'_'.$transcription->transcription_name.'.'.$transcription->transcript_file_ext)}}"> <i class="fa fa-angle-double-right"></i>{{$transcription->transcription_name}}</a> </h3>
    </div>
    @endforeach
  </div>
    @endif


    @if(Session::has('jobholder_username'))
    @endif

    <div class="row" style="margin-top: 50px;">
      <div class="col-md-5">
        <form>
        <div class="col-md-12">
          <textarea rows="8" cols="60" required="true" placeholder="Please Write Interview date and Address.." style="padding: 10px;"></textarea>
        </div>
        <div class="col-md-2 col-md-offset-8">
          <button type="submit" class="btn btn-lg btn-success">Accept</button>
        </div>
        </form>
      </div>

      <div class="col-md-5">
        <form>
        <div class="col-md-12">
          <textarea rows="8" cols="60" style="padding: 10px;" placeholder="Please Write Reject Cause..."></textarea>
        </div>
        <div class="col-md-2 col-md-offset-8">
          <button type="submit" class="btn btn-lg btn-danger" style="background-color: #dc3545;">Reject</button>
        </div>
        </form>
      </div>
      <div class="col-md-2" style="margin-top: 45px;">
        <button class="btn btn-lg btn-primary">Message</button>
      </div>
    </div>
    

   </div>
    
   

   <h1 style="margin-top: 10%;"></h1>
    @include('layout.footer');
</body>
</html>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function gototab()
   {
    window.location.hash = 'video-profile';
    window.location.href='candidate_cv';
   }
</script>