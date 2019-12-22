<!DOCTYPE html lang="en">

<head>
    <meta charset="utf-8">
    <title>Final Year Project</title>
    <meta name="description" content="">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" type="text/css" href="css/candidate_cv.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    </head>

<body>
   
  @include('layout.auth_jobseeker_header');
    <div class="candidate-jobs-bg">
        <h2 class="text-center">Find Your Recommended Jobs</h2>
    </div>
 <!--=================featured-jobd-->
    <section class="featured">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading-17-03">
                        <h2>Recommend Jobs</h2> </div>
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



        <!-- Side Bar start -->
        @include('layout.side_search_bar')
        <!-- Side Bar end --> 

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

 @include('layout.footer');

</html>