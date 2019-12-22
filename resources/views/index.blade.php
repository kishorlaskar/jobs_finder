
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="_token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <title>Final Year Project</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.icon">
        <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/style2.css')}}">

        <script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
       <script src="{{url('js/bootstrap.min.js')}}"></script>
        <link rel="shortcut icon" type="image/x-icon" href="{{url('image/../image/logo.png')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet"> 
         <style type="text/css">
             .modal-body button{
                     background:none;
                     border:none;
                     margin-top: 10px;
             }
         </style>
    </head>

    <body>
        @if(Session::has('jobseeker_email'))
          @include('layout.auth_jobseeker_header');
      @elseif(Session::has('jobholder_username'))
          @include ('layout.auth_jobholder_header');
      @else
        @include('layout.all_user_header');
      @endif

    @php
      $i=0; $job_designations=array(); $recomonded_designations=array();
      foreach ($job_designation_id as $id) {
          $job_designations[]=$id->job_designation_id;
      }
      foreach ($recomonded_designation as $recomonded_id) {
          $recomonded_designations[]=$recomonded_id->designation_id;
      }
      $job_designations = array_count_values($job_designations);
      $recomonded_designations = array_count_values($recomonded_designations);
    @endphp

   <!--  =======Include Modals  ===========-->
    @include('index_modals');

        <!--  =======Top search Background  ===========-->
        <div class="top-bg">
            <div class="container">
                    <div class="info-group">
                      <form action="{{url('search')}}" method="get" autocomplete=off>
                        <div class="row">
                            <!-- START CATEGORY-->
                            <div class="col-md-4 col-md-offset-2">

                                <p class="list-key">Category</p>
                                <div class="list3-24-18">
                                
                                        <input type="text" name="search_category" style="color: transparent; text-shadow: 0 0 0 gray;" id="designation_category" class="selectpicker" data-toggle="modal" data-target="#category_modal" placeholder="Select a category" onkeypress="return false;" value="">
                                       
                                  
                                </div>
                            </div>
                         
                            <!-- START LOCATION-->
                            <div class="col-md-4">
                                <p class="list-key">Location</p>
                                <div class="list3-24-18">
                                    
                                        <select class="selectpicker" name="city">
                                        <optgroup label="Area">
                                            <option value="">Enter City---</option>
                                            @foreach($city as $city_name)
                                            <option value="{{$city_name->city_name}}">{{$city_name->city_name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    
                                </div>
                            </div>
                          </div>
                 
                            <!-- END LOCATION-->
                            <!-- START JOB TYPE-->

                            <div class="row">
                            <div class="col-md-4 col-md-offset-2">
                                <p class="list-key">Job Type</p>
                                <div class="list3-24-18">
                                    
                                        <select class="selectpicker" name="job_type">
                                        <optgroup label="Type">
                                            <option value="">Any Type</option>
                                            @foreach($job_types as $job_type)
                                            <option value="{{$job_type->job_name}}">{{$job_type->job_name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                   
                                </div>
                            </div>
                            <!-- END JOB TYPE-->
                            <!-- START SEARCH-->
                            <div class="col-md-4">
                                <form>
                                    <a href="#">
                                    <button type="submit" class="search-button">Search</button>
                                </a>
                                </form>
                            </div>
                            <!-- END SEARCH-->
                        </div>
                        </form>
                    </div>
            </div>
        </div>
        <!--===== top Bg End =====-->
        @php 
         $item_count=1;$count_designation=count($job_designation);
         $animation_array=array("accounted-1","it-3","agro-5","bank-6","hospitality-7","research-9","beauty-10","education-11","operator-15");
         shuffle($animation_array);
        @endphp
        <!--=====>job-sector-list <====-->
         <section id="wrapper">
    <div class="job-sector-list">
        <div class="container">
            <div class="sector-header text-center">
                <h2><i class="fa fa-briefcase" aria-hidden="true"></i> Which career interests you?</h2> </div>
            <div class="row">
                @foreach($job_designation as $job_designation_info)

                @if($item_count<10)
                <div class="col-md-4">
                    <div class="sector-name">
                         <div class="sectors-list {{$animation_array[$i]}}"> <a href="#">{{$job_designation_info->designation_name}}(
                            @if (array_key_exists($job_designation_info->id,$job_designations))
                        {{$job_designations[$job_designation_info->id]}}
                        @else 0
                        @endif
                    )</a> </div>
                    </div>
                </div>
                @else
                   @if($item_count == 10)
                   <div id="job_designation_show" style="display: none;">
                    @endif
                    <div class="col-md-4">
                    <div class="sector-name">
                         <div class="sectors-list {{$animation_array[$i]}}"> <a href="#">{{$job_designation_info->designation_name}}(
                            @if (array_key_exists($job_designation_info->id,$job_designations))
                        {{$job_designations[$job_designation_info->id]}}
                        @else 0
                        @endif
                    )</a> </div>
                    </div>
                </div>
                    @if($item_count == $count_designation)  
                   </div> 
                    @endif
                @endif


                @php $item_count++; if($i == 8) $i=0; else $i++; @endphp
                @endforeach
            </div>
            <div class="home-button text-center">
            <button class="Read_more" onclick="job_designation_show()">See More</button>
            </div>
        </div>
    </div>
    </section>
    
        <!-- END JOB SECTOR LIST -->
        
        
<!-- =====================OUR_MOTO================-->
      
     <section id="our-moto">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo1-16_03">
                       <img src="image/our-moto/desk.png" alt="">
                       <h3>FREE FOREVER</h3>
                       <p>The incredible job alerts you receive from FinderJobs.com are completely free and always will be! Over 50,000 satisfied job hunters are receiving perfectly tailored job alerts they couldn’t get anywhere else.They always happy to our Service.</p>
                       <div class="box"></div>
                        
                    </div>
                </div>
                  <div class="col-md-4">
                    <div class="logo1-16_03">
                       <img src="image/our-moto/alarm.png" alt="">
                       <h3>DAILY JOB ALERTS</h3>
                       <p>Every day we scour through every single available job posting available to find the best jobs that meet your requirements. And when we find them, we email the job postings directly to you so you can follow up on them and get hired..</p>
                       <div class="box"></div>
                        
                    </div>
                </div>
                  <div class="col-md-4">
                    <div class="logo1-16_03">
                       <img src="image/our-moto/arrow.png" alt="">
                       <h3>PERSONALIZED</h3>
                       <p>We tailor job searches to your specific requirements. You no longer have to weed through hundreds of job postings, only to wind up missing the perfect job because you are overwhelmed with so many irrelevant postings, we do all the work for you.</p>
                       <div class="box"></div>
                        
                    </div>
                </div>
            </div>
         </div>
    </section>
    
<!--===============Your candidate============-->
   
@php $item_count=1; $i=0;  @endphp
   <section id="wrapper">
    <div class="candidate-sector-list">
        <div class="container">
            <div class="sector-header text-center">
                <h2><i class="fa fa-male" aria-hidden="true"></i> Choose Your  Favourite Candidate !</h2> </div>
            <div class="row">
                  @foreach($job_designation as $job_designation_info)

                @if($item_count<10)
                <div class="col-md-4">
                    <div class="sector-name">
                         <div class="sectors-list {{$animation_array[$i]}} content-co-remove"> <a href="#">{{$job_designation_info->designation_name}}(
                            @if (array_key_exists($job_designation_info->id,$recomonded_designations))
                        {{$recomonded_designations[$job_designation_info->id]}}
                        @else 0
                        @endif
                    )</a> 
                        </div>
                        <div class="box"></div>
                    </div>
                </div>
                @else
                   @if($item_count == 10)
                   <div id="recomondate_designation_show" style="display: none;">
                    @endif
                    <div class="col-md-4">
                    <div class="sector-name">
                         <div class="sectors-list {{$animation_array[$i]}} content-co-remove"> <a href="#">{{$job_designation_info->designation_name}}(
                            @if (array_key_exists($job_designation_info->id,$recomonded_designations))
                        {{$recomonded_designations[$job_designation_info->id]}}
                        @else 0
                        @endif
                    )</a> 
                        </div>
                        <div class="box"></div>
                    </div>
                </div>
                    @if($item_count == $count_designation)   
                   </div>
                    @endif
                @endif

                @php $item_count++; if($i == 8) $i=0; else $i++; @endphp
                @endforeach
               
            </div>
        </div>
          <div class="home-button text-center">
            <button class="Read_more" onclick="recomondate_designation_show()">See More</button>
            </div>
    </div>
    </section>
    

    
<!--    ======Three Simple Step-->
<section id="wrapper">
<div class="jobs-step">
    <div class="container">
            <div class="row">
            <div class="col-md-4">
                <div class="step-box">
                    <img src="image/our-moto/we-open.svg" alt="image">
                    <div class="step-details">
                        <p>Buy the job adverts you need</p>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="step-box">
                    <img src="image/our-moto/calendar.svg" alt="image">
                     <div class="step-details">
                        <p>Write, review and post your advert for 28 days</p>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="step-box">
                    <img src="image/our-moto/ppl.svg" alt="image">
                     <div class="step-details">
                        <p>Receive applications directly to your inbox</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
    
<!--=================featured-jobd-->
   <section class="featured">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="page-heading-17-03">
                                        <h2>Featured Jobs</h2>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
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
                                        
                                    <td><a href="{{ route('feature_job_details',['name' => $JobList->id]) }}" class="table-btn-default">View Job</a></td>
                                    @php break 1; @endphp
                                        @endif
                                        @endforeach
                                </tr>
                              
                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12 text-right">
                              <ul class="pagination">   
                                  {{$JobLists->links()}}
                              </ul>
                                </div>
                            </div>
                        </div>
                    </section>
    

<!--   ====Counter js=======================-->
 <section class="wrapper">
        <div class="counterup text-center">
            <div class="container">
               <div class="row">
               <div class="col-md-3">
                <div id="coonut_box"><span class="count">{{count($job_designation_id)}}</span>
                    <br>
                    <p>Jobs</p>
                </div>
                   </div>
                    <div class="col-md-3">
                <div id="coonut_box"><span class="count">{{$company}}</span>
                    <br>
                    <p>Company</p>
                </div>
                   </div>
                    <div class="col-md-3">
                <div id="coonut_box"><span class="count">{{$candidate}}</span>
                    <br>
                    <p>Candidate</p>
                </div>
                   </div>
                    <div class="col-md-3">
                <div id="coonut_box"><span class="count">{{$resume}}</span>
                    <br>
                    <p>Resume</p>
                </div>
                   </div>
                
               
            </div>
            </div>
        </div>
    </section>

<!--========Express=============-->

   
   <section class="jobxpress">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 padding-left">
                                    <div class="left-col">
                                        <div class="col-text">
                                           <div class="page-heading heading4">
                                                <h2>Join Thousands of Companies That Realy on <span>JobsFinder</span></h2>
                    
                                                <p>Sed consequat, leo eget bibendum sodales, augue cursus nunc, quis <br> gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum <br>purus quam, scelerisque ut.</p>
                                                <a href="#" class="btn Read_more">Read More</a>
                                           </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 padding-left">
                                    <div class="right-col"></div>
                                </div>
                            </div>
                        </div>
                    </section>
    
<!--======FOOTER=====-->
 @include('layout.footer');
    
 <script>
    $('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

function job_designation_show(){
    var x =document.getElementById('job_designation_show');
        x.style.display = "block";
}

function recomondate_designation_show(){
    var y=document.getElementById('recomondate_designation_show');
    y.style.display = "block";
}
    
    
</script>
    
    
</body>

</html>