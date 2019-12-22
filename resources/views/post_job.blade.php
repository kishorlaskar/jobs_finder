<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Final Year Project</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=.5">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.icon">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
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
 <form action="submit_job" method="Post" >
    {{ csrf_field() }}
    <section class="client-input">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="client-input-wrapper">
                  
                         <!--  company email field-->
                        <div id="field">
                            <label for="name" class=" f-size">Enter Your Email</label>
                            <input type="email" name="company_email" class="form-control re-width" placeholder="e.g. Company Email.." required>
                         </div>
                        <!-- JOb Type field-->
                        <div id="field">
                            <label for="name" class=" f-size">Enter Your Job Designation</label>
                            <input type="text" class="form-control re-width" name="job_designation" list="job_list" placeholder="e.g. Laravel Developer" required>
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
                            <input type="number" class="form-control re-width" name="number_of_vacancies" placeholder="e.g. 5" required> </div>
                       
                        <!--=========Job publish============-->
                        <div id="field">
                            <label class=" f-size">Avilability Day </label>
                            <input type="number" class="form-control re-width" name="avilability_day" min="1" placeholder="Number of day...." required>
                         </div>
                        <!-- age -->
                        <div id="field">
                            <label class=" f-size">Candidate Minimum Age </label>
                            <input type="number" name="candidate_age" class="form-control re-width" placeholder="e.g. 21 " required> </div>
                        <!--=========Job Requirments============-->
                        <table id="job_requirment" class="table">
                            <tr>
                                <td>       
                            <label for="name" class=" f-size">Job Requirments</label>
                            <input type="text" class="form-control re-width" name="job_jequirments[]" tabindex="1" placeholder="Job Requirments" required> <span><button type="button" class="add-more-button" onclick="add_job_requirment('job_requirment')">Add More</button></span>
                                </td>
                            
                            </tr>
                        </table>
                       
                        <!--=========Job- Description============-->
                        <table class="table" id="job_description">
                            <tr>
                                <td>
                            <label for="name" class="f-size">Job-Description</label>
                            <input type="text" class="form-control re-width" name="job_description[]" tabindex="1" placeholder="Job Description" required> <span><button type="button" class="add-more-button" onclick="add_job_description('job_description')">Add More</button></span>
                                </td>
                            </tr>
                        </table>
                        
                        <!--========= Educational Requirements============-->
                        <table class="table" id="educational_requirment">
                            <tr>
                                <td>
                            <label for="name" class=" f-size f-size"> Educational Requirements</label>
                            <input type="text" class="form-control re-width" name="educational_requirment[]" tabindex="1" placeholder="Educational Requirements" required> <span><button type="button" class="add-more-button" onclick="add_educational_requirment('educational_requirment')">Add More</button></span> 
                                </td>
                            </tr>
                        </table>
                        
                        <!--=========  Other Benefits============-->
                        <table class="table" id="other_benifits">
                            <tr>
                                <td>
                            <label for="name" class=" f-size"> Other Benefits</label>
                            <input type="text" required="true" class="form-control re-width" name="other_benifits[]" tabindex="1" placeholder="Other Benefits"> <span><button type="button" class="add-more-button" onclick="add_other_benifits('other_benifits')">Add More</button></span> 
                                </td>
                            </tr>
                        </table>
                          <!--=========   Job-Source============-->
                        <table class="table" id="job_source">
                            <tr>
                                <td>
                            <label for="name" class=" f-size"> Job Sources</label>
                            <input type="text" required="true" class="form-control re-width" name="job_source[]" tabindex="1" placeholder="e.g : Company Website"> <span><button type="button" class="add-more-button" onclick="add_job_source('job_source')">Add More</button></span>
                                </td>
                            </tr>
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
                                        <input type="radio" class="" name="job_type" id="{{$i}}" value="{{$JobName->job_name}}">
                                        <label for="{{$i}}"></label> {{$JobName->job_name}}</li>
                                    @php $i++; @endphp
                                    @endforeach
                                  
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget">
                                <h4 class="widget-title">Salary Range</h4>
                               <input type="text" name="salary_range" class="form-control" placeholder="$0 to $10000 " required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget">
                                <h4 class="widget-title text-center">Experience Of Years</h4>
                                <input type="number" name="experience_of_years" min="0" class="form-control" placeholder="e.g : 2" required>
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
                <button type="submit" class="btn btn-client">Submit</button>
            </div>
        </div>
    </div>
</form>
    <!--======FOOTER=====-->
    @include('layout.footer');

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/job_post.js"></script>
   <script type="text/javascript">
    setTimeout(function () {
    $("#show_success_message").fadeOut(2000)
}, 3000);
    </script>
</body>

</html>
