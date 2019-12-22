<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Final Year Project</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=.5">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.icon">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    </head>
<body>
	 @php if(isset($error)){
    echo '<div class="row" id="show_success_message">
     <div class="col-md-4 animated fadeInDown" style="background-color: red; height: 55px; color:white;position: absolute; z-index: 1; right: 0; top:5px; text-align: center;"><h5>'.$error.'</h5></div>
    </div>';
} @endphp
    <!--===== top nav ====-->
    @include ('layout.auth_jobholder_header');
    <div class="client-post-header-bg">
        <h2 class="text-center">Post Your Job</h2> </div>
    <!--     client input -->
 <form action="{{url('update_job_post')}}" method="Post" >
 	<input type="hidden" name="job_id" value="{{isset($JobInfo->job_id)?$JobInfo->job_id:$JobInfo->id}}">
    {{ csrf_field() }}
    <section class="client-input">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="client-input-wrapper">
                  
                         <!--  company email field-->
                        <div id="field">
                            <label for="name" class="f-size">Enter Your Email</label>
                            <input type="email" name="company_email" class="form-control re-width" placeholder="e.g. Company Email.." required value="{{$JobInfo->company_email}}">
                         </div>
                        <!-- JOb Type field-->
                        <div id="field">
                            <label for="name" class="f-size">Enter Your Job Designation</label>
                            <input type="text" class="form-control re-width" name="job_designation" list="job_list" placeholder="e.g. Laravel Developer" required value="{{$JobInfo->designation_name}}">
                            <datalist id="job_list">
                                <option value="Front End Developer">
                                    <option value="Back-End Developer">
                                        <option value=" Accountancy and financialmanagemen">
                                            <option value="IT & Telecommunication">
                                                <option value="Laravel Developer">
                            </datalist>
                        </div>
                       
                        <!--  Vacancies field-->
                        <div id="field">
                            <label for="name" class="f-size">Number Of Vacancies</label>
                            <input type="number" class="form-control re-width" name="number_of_vacancies" placeholder="e.g. 5" required value="{{$JobInfo->number_of_vacancies}}"> </div>
                       
                        <!--=========Job publish============-->
                        <div id="field">
                            <label class=" f-size">Avilability Day </label>
                            <input type="number" class="form-control re-width" name="avilability_day" min="1" placeholder="Number of day...." required value="{{$JobInfo->avilability_day}}">
                         </div>
                        <!-- age -->
                        <div id="field">
                            <label class=" f-size">Candidate Minimum Age </label>
                            <input type="number" name="candidate_age" class="form-control re-width" placeholder="e.g. 21 " required value="{{$JobInfo->candidate_min_age}}"> </div>
                        <!--=========Job Requirments============-->
                        <table id="job_requirment" class="table">

                        	 @php $i=1; @endphp
                        	@foreach($job_requirments as $JobRequirment)
                             @if($i==1)
                            <tr>
                                <td>       
                            <label for="name" class=" f-size">Job Requirments</label>
                            <input type="text" class="form-control re-width" name="job_jequirments[]"  placeholder="Job Requirments" required value="{{$JobRequirment->job_requirment_name}}" > <span><button type="button" class="add-more-button" onclick="add_job_requirment('job_requirment')">Add More</button></span>
                                </td>
                            </tr> @php $i++; @endphp
                            @else
                            <tr>
                            	<td>
                            		<input type="text" class="form-control re-width" name="job_jequirments[]"  placeholder="Job Requirments" required value="{{$JobRequirment->job_requirment_name}}" >
                            	</td>
                            </tr>
                            @endif
                            @endforeach
                        </table>
                       
                        <!--=========Job- Description============-->
                        <table class="table" id="job_description">
                        		 @php $i=1; @endphp
                        	@foreach($job_description as $JobDescription)
                             @if($i==1)
                            <tr>
                                <td>
                            <label for="name" class=" f-size">Job-Description</label>
                            <input type="text" class="form-control re-width" name="job_description[]" tabindex="1" placeholder="Job Description" required value="{{$JobDescription->job_description_details}}"> <span><button type="button" class="add-more-button" onclick="add_job_description('job_description')">Add More</button></span>
                                </td>
                            </tr>
                            @php $i++; @endphp
                            @else
                            <tr>
                            	<td>
                            <input type="text" class="form-control re-width" name="job_description[]" tabindex="1" placeholder="Job Description" value="{{$JobDescription->job_description_details}}" >
                            </td>
                            </tr>
                            @endif
                            @endforeach
                        </table>
                        
                        <!--========= Educational Requirements============-->
                        <table class="table" id="educational_requirment">
                        	 @php $i=1; @endphp
                        	@foreach($educational_requirments as $EducationalRequirments)
                             @if($i==1)
                            <tr>
                                <td>
                            <label for="name" class=" f-size f-size"> Educational Requirements</label>
                            <input type="text" class="form-control re-width" name="educational_requirment[]" tabindex="1" placeholder="Educational Requirements" required value="{{$EducationalRequirments->education_requirment_name}}"> <span><button type="button" class="add-more-button" onclick="add_educational_requirment('educational_requirment')">Add More</button></span> 
                                </td>
                            </tr>
                             @php $i++; @endphp
                            @else
                            <tr>
                            	<td>
                            		<input type="text" class="form-control re-width" name="educational_requirment[]" tabindex="1" placeholder="Educational Requirements" value="{{$EducationalRequirments->education_requirment_name}}">
                            	</td>
                            </tr>
                              @endif
                            @endforeach
                        </table>
                        
                        <!--=========  Other Benefits============-->
                        <table class="table" id="other_benifits">
                        	@php $i=1; @endphp
                        	@foreach($other_benifits as $OtherBenifits)
                             @if($i==1)
                            <tr>
                                <td>
                            <label for="name" class=" f-size"> Other Benefits</label>
                            <input type="text" class="form-control re-width" name="other_benifits[]" tabindex="1" placeholder="Other Benefits" value="{{$OtherBenifits->other_benifit_name}}" required="true"> <span><button type="button" class="add-more-button" onclick="add_other_benifits('other_benifits')">Add More</button></span> 
                                </td>
                            </tr>
                            @php $i++; @endphp
                            @else
                            <tr>
                            	<td>
                            		<input type="text" class="form-control re-width" name="other_benifits[]" tabindex="1" required="true" placeholder="Other Benefits" value="{{$OtherBenifits->other_benifit_name}}">
                            	</td>
                            </tr>
                             @endif
                            @endforeach
                        </table>
                          <!--=========   Job-Source============-->
                        <table class="table" id="job_source">
                        	@php $i=1; @endphp
                        	@foreach($job_sources as $JobSources)
                             @if($i==1)
                            <tr>
                                <td>
                            <label for="name" class=" f-size"> Job Sources</label>
                            <input type="text" class="form-control re-width" required="true" name="job_source[]" tabindex="1" placeholder="e.g : Company Website" value="{{$JobSources->job_source_name}}"> <span><button type="button" class="add-more-button" onclick="add_job_source('job_source')">Add More</button></span>
                                </td>
                            </tr>
                            @php $i++; @endphp
                            @else
                            <tr>
                            	<td>
                            		<input type="text" required="true" class="form-control re-width" name="job_source[]" tabindex="1" placeholder="e.g : Company Website" value="{{$JobSources->job_source_name}}">
                            	</td>
                            </tr>
                              @endif
                            @endforeach
                        </table> 
                </div>
            </div>
        </div>
    </section>
    <section class="job-nature-wrapper">
        <!-- Jobs By Experience -->
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="job-nature-widget">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget">
                                <h4 class="widget-title">Jobs Type</h4>
                                <ul class="optionlist">
                                    @php 
                                       $JobNames = DB::table('job_types')->get(); $i=1;
                                    @endphp
                                    @foreach($JobNames as $JobName)
                                      <li>
                                      	@if($JobInfo->job_type == $JobName->job_name)
                                        <input type="radio" class="" name="job_type" id="{{$i}}" value="{{$JobName->job_name}}" checked="true">
                                        <label for="{{$i}}"></label> {{$JobName->job_name}}</li>
                                        @else
                                        <input type="radio" class="" name="job_type" id="{{$i}}" value="{{$JobName->job_name}}">
                                        <label for="{{$i}}"></label> {{$JobName->job_name}}</li>
                                        @endif
                                        
                                    @php $i++; @endphp
                                    @endforeach
                                  
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget">
                                <h4 class="widget-title">Salary Range</h4>
                               <input type="text" name="salary_range" class="form-control" placeholder="$0 to $10000 " required value="{{$JobInfo->salary_range}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget">
                                <h4 class="widget-title text-center">Experience Of Years</h4>
                                <input type="number" name="experience_of_years" min="0" class="form-control" placeholder="e.g : 2" required value="{{$JobInfo->experience_of_years}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="submit-button">
        <div class="container">
            <div class="col-md-2 col-md-offset-9">
                <button type="submit" class="btn btn-client">Update Post</button>
            </div>
        </div>
    </div>
</form>
    <!--======FOOTER=====-->
    @include('layout.footer');

    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/job_post.js"></script>
   <script type="text/javascript">
    setTimeout(function () {
    $("#show_success_message").fadeOut(2000)
}, 3000);
    </script>
</body>

</html>

