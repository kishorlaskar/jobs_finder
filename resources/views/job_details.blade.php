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

    <script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
        </head>

<body>
 @if(\Session::has('error'))
    <div class="row" id="show_success_message">
     <div class="col-md-4 animated fadeInDown" style="background-color: red; height: 55px; color:white;position: absolute; z-index: 1; right: 0; top:5px; text-align: center;"><h5>{!! \Session::get('error') !!}</h5></div>
    </div>;

@elseif(\Session::has('success'))
 <div class="row" id="show_success_message">
     <div class="col-md-4 animated fadeInDown" style="background-color: green; height: 55px; color:white;position: absolute; z-index: 1; right: 0; top:5px; text-align: center;"><h5>{!! \Session::get('success') !!}</h5></div>
    </div>;
@endif

 @if(session()->get('jobseeker_email'))
@include ('layout.auth_jobseeker_header');
@elseif(session()->get('jobholder_username')) 
@include ('layout.auth_jobholder_header');
@else
 @include('layout.all_user_header');
 @endif
<!--    ========FEATURED JOB DETAILS=============-->
    
    <section id="job-details-page">
        <div class="inner-heading-deatils">
        <div class="container">
         <h1>Job Details</h1>
            </div>
        </div>
    </section>
   
    <section class="details-desc-19-03">
        <div class="container">
           <div class="white-shadow">
            <div class="row">
                <div class="details-pic">
                    <img src="{{url('image/Laravel-four-icon.png')}}" alt="image" class="img-responsive">
                </div>
                <div class="details-status">
                <span> @php  
                 $dStart = new DateTime($JobInfo->published_on);
                 $dEnd  = new DateTime(date('Y-m-d'));
                 $dDiff = $dStart->diff($dEnd);
                 echo $dDiff->format('%R'); 
                 echo $dDiff->days;
                  @endphp Days Ago</span>
                </div>
               </div>
               <div class="row">
                   <div class="col-md-8">
                       <div class="details-desc-caption">
                           <h3>{{$CompanyInfo->company_name}}</h3>
                           <h4 class="">{{$JobInfo->designation_name}}</h4>
                           <p>{{$CompanyInfo->business_description}}</p>
                           
                           <ul>
                               <li><i class="fa fa-briefcase" aria-hidden="true"></i><span> {{$JobInfo->job_type}}</span></li>
                               <li><i class="fa fa-hourglass-start" aria-hidden="true"></i><span> {{$JobInfo->experience_of_years}} Year Experience</span></li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="get-in-touch">
                           <h4>Get In Touch</h4>
                           <ul>
                               <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{$CompanyInfo->company_area}},{{$CompanyInfo->company_city}},{{$CompanyInfo->company_country}}</span></li>
                               <li><i class="fa fa-envelope-o" aria-hidden="true"></i><span>{{$JobInfo->company_email}}</span></li>
                               <li><i class="fa fa-globe" aria-hidden="true"></i><span><a href="{{ route('external_link',['name' => $CompanyInfo->website_address]) }}" target="_blank">{{$CompanyInfo->website_address}}</a></span></li>
                               <li><i class="fa fa-phone" aria-hidden="true"></i><span>{{$CompanyInfo->contact_person_phone}}</span></li>
                           </ul>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="detail-pannel-footer">
                      <div class="detail-border"></div>
                       <div class="col-md-5">
                          
                           <ul class="detail-panel-social-icon">
                               <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                  <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                      <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                               
                               
                           </ul>
                       </div>
                       @if(session()->get('jobseeker_email'))
                       <div class="col-md-7 text-right">
                         <a class="btn btn-success apply-button" href="{{route('apply_job',['name' => $JobInfo->id])}}">Apply</a>
                       </div>
                       @endif
                   </div>
               </div>
            </div>
        </div>
    </section>
  
    <section class="full-details-description">
        <div class="container">
           <div class="jobs-details-inner">
            <div class="row">
                <div class="col-md-8">
                    <!--====Job Description / Responsibility====
  }
  }
-->
                <div id="job-responsibility-20-03">
                  <p class="all-job-info"><strong><i class="fa fa-check-square-o" aria-hidden="true"></i> Job Requirements</strong></p>
                   <ul>
                    @foreach($job_requirments as $job_requirment)
                       <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>{{$job_requirment->job_requirment_name}}</li>
                       @endforeach
                   </ul>
                </div>
                   <!--====Job Requirements====-->
                <div id="Job-Requirements-20-03">
                  <p class="all-job-info"><strong><i class="fa fa-check-square-o" aria-hidden="true"></i> Job- Description / Responsibility</strong></p>
                   <ul>
                    @foreach($job_description as $JobDescription)
                       <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>{{$JobDescription->job_description_details}}</li>
                    @endforeach                    
                   </ul>
                </div>
                    <!--====Educational Requirements====-->
                <div id="Educational-Requirements">
                  <p class="all-job-info"><strong><i class="fa fa-check-square-o" aria-hidden="true"></i> Educational Requirements </strong></p>
                   <ul>
                    @foreach($educational_requirments as $educational_requirment)
                       <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>{{$educational_requirment->education_requirment_name}}</li>
                    @endforeach
                   </ul>
                </div>
                   <!--====Educational Requirements====-->
                <div id="Other-Benefits">
                  <p class="all-job-info"><strong><i class="fa fa-check-square-o" aria-hidden="true"></i> Other Benefits</strong></p>
                   <ul>
                    @foreach($other_benifits as $other_benifit)
                       <li><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$other_benifit->other_benifit_name}}</li>
                    @endforeach
                   </ul>
                </div>
                           <!--====Job Source====-->
                 <div id="Job-Source">
                  <p class="all-job-info"><strong><i class="fa fa-check-square-o" aria-hidden="true"></i> Job-Source</strong></p>
                   <ul>
                    @foreach($job_sources as $job_source)
                       <li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="{{ route('external_link',['name' => $job_source->job_source_name]) }}">{{$job_source->job_source_name}}</a></li>
                     @endforeach
                    
                       
                   </ul>
                </div>
                </div>
<!---============side bar job summary-->
                <div class="col-md-4">
                   
                   <div class="job-summary">
                     <h5 class="summary-heading">Job Summary</h5>
                       <ul>
                           <li><strong>Published on:</strong> {{$JobInfo->published_on}}</li>  
                           <li><strong>Vacancy:</strong> {{$JobInfo->number_of_vacancies}}</li> 
                            <li><strong>Job Nature:</strong>  {{$JobInfo->job_type}}</li> 
                             <li><strong>Experience: </strong> {{$JobInfo->experience_of_years}} Years</li>
                             <li><strong>Age: </strong> {{$JobInfo->candidate_min_age}} </li>
                             <li><strong>Job Location: </strong> {{$CompanyInfo->company_area}},{{$CompanyInfo->company_city}},{{$CompanyInfo->company_country}}</li>
                                 <li><strong>Salary Range: </strong>{{$JobInfo->salary_range}} </li>
                                 <li><strong>Application Deadline: </strong>  {{$JobInfo->deadline}}</li>
                       </ul>
                   </div>
                   
<!-- panel action-->
                       <div class="default-panel-action">
                       <ul>
                           <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> Share by Email</a></li>
                           <li><a href="#"><i class="fa fa-print" aria-hidden="true"></i> Print this job</a></li>
                           <li><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i> View all jobs of this company</a></li>
                        
                       </ul>
                   </div>
                    
                </div>
               </div>
            </div>
        </div>
    </section> 

    <!--======FOOTER=====-->
   @include('layout.footer');
  
</body>
 <script src="{{url('js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
    setTimeout(function () {
    $("#show_success_message").fadeOut(2000)
}, 3000);
    </script>
</html>