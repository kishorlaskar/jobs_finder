<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Final Year Project</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=.5">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.icon">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/style2.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
     <script src="{{url('js/jquery-3.1.1.min.js')}}"></script>

     <script src="{{url('js/bootstrap.min.js')}}"></script>
</head>

<body>
    @php if(session('success')){
    echo '<div class="row" id="show_success_message">
     <div class="col-md-4 animated fadeInDown" style="background-color: green; height: 55px; color:white;position: absolute; z-index: 1; right: 0; top:5px; text-align: center;"><h5>'.session('success').'</h5></div>
    </div>';
} 
  elseif(session('error')){
  echo '<div class="row" id="show_error_message">
     <div class="col-md-4 animated fadeInDown" style="background-color: red; height: 55px; color:white;position: absolute; z-index: 1; right: 0; top:5px; text-align: center;"><h5>'.session('error').'</h5></div>
    </div>';
}
else{ }
@endphp
   
   @include ('layout.auth_jobholder_header');

   @php
   if ($Jobcounts) {
      foreach($Jobcounts as $Jobcount){
     $Frequencys[] = $Jobcount->job_id;
   }
   $Frequencys = array_count_values($Frequencys);

   foreach($job_designations as $job_designation){
      $designation[] = $job_designation->designation_id;
 }
   $designation = array_count_values($designation);
   }
  
   @endphp
    
<div class="candidate-jobs-bg">
        <h2 class="text-center">Find Your Posting Jobs</h2>
    </div>
   <!--=================featured-jobd-->
    <section class="featured">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="page-heading-17-03">
                        <h2>Find Your Posting Jobs</h2> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 ">
                    @foreach($JobList as $job_list)
                    <div class="client-post-job">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="tab-image">
                                <img src="{{url('image/feature-jobs/img1.jpg')}}" alt="Company Logo" class="img-responsive"></div>
                           
                                <h4 ><a href="#" style="color: green">{{$job_list->designation_name}}</a></h4>
                                <p><a href="#">{{$JobHolderInfo->company_name}}</a></p>
                                <p><a href="#">
                                    @foreach($CompanyTypes as $CompanyType)
                                    {{$CompanyType->industry_type}}
                                    @endforeach
                                </a></p>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5">
                                <div class="jobs-ti-location" style="margin-left: -15px;">
                                    {{$JobHolderInfo->company_area}}
                                    {{ $JobHolderInfo->company_city}} 
                                    {{ $JobHolderInfo->company_country}} 
                                </div>
                            </div> 

                               <div class="col-md-3">
                                <div class="work-time-jobs">{{$job_list->job_type}}</div>
                            </div>
                               <div class="col-md-2">
                                <a href="{{ route('view_job_details',['name' => $job_list->id]) }}" class="works-btn-default">View Job</a>
                            </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                              <div style="margin-top: 10px;">
                                @if(!empty($designation[$job_list->job_designation_id]))
                              <a href="{{ route('recomondation_id',['name' => $job_list->job_designation_id]) }}"><span style="background-color: red;color: white;margin-top: 10px;">&nbsp;Recomonded({{$designation[$job_list->job_designation_id]}})&nbsp;</span></a>

                                @else
                                <span style="background-color: red;color: white;margin-top: 10px;">&nbsp;Recomonded(0)&nbsp;</span>
                                @endif
                            </div><br>
                                <a style="margin-top: 40px; margin-left: 30%;" class="btn btn-success btn-edit" data-toggle="tooltip" data-placement="left" title="Edit" href="{{ route('job_id',['name' => $job_list->id]) }}" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-md-2">
                                @if( !empty($Frequencys[$job_list->id]))
                                <div style="margin-top: 10px;">
                               <a href="{{ route('apply_job_id',['name' => $job_list->id]) }}"><span style="background-color: red;color: white;margin-top: 10px;">&nbsp;Apply({{$Frequencys[$job_list->id]}})&nbsp;</span></a> </div>
                                @else
                                <div style="margin-top: 10px;">
                                <span style="background-color: red;color: white;">&nbsp;Apply(0)&nbsp;</span></div>
                                @endif
                                <form action="{{ route('job_delete',['name' => $job_list->id]) }}" method="get" onsubmit="return confirm_delete()">
                              <button style="margin-top: 60px;margin-left: 30%;" type="submit" class="btn btn-danger btn-edit" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                              </form>
                            </div>   
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-2">
                  <ul class="list-group">
                      <li class="list-group-item active">Archive List</li>
                      @if($archive_job_years)
                        @foreach($archive_job_years as $archive_job_year)
                        <li class="list-group-item"><a href="{{route('archive_job',['name'=>$archive_job_year->year])}}">{{$archive_job_year->year}}</a></li>
                        @endforeach
                      @endif
                      

                </ul>
                </div>   
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-left">
                       <nav aria-label="Page navigation">
  <ul class="pagination">   
    {{$JobList->links()}}
  </ul>
</nav>
                </div>
            </div>
        </div>
    </section>
 
  <!--======FOOTER=====-->
    @include('layout.footer');
    <script type="text/javascript">
    setTimeout(function () {
    $("#show_success_message").fadeOut(2000)
}, 3000);
    setTimeout(function () {
    $("#show_error_message").fadeOut(2000)
}, 3000);
    function confirm_delete(){
         var confirm_value = confirm("Are You Want To Delete This Post !!");
         if (confirm_value == true) {
             return true;
        } else {
           return false;
         }
    }
    </script>
</body>

</html>