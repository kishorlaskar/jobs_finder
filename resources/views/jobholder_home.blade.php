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
    </head>

<body>
    @php if(isset($successful_message)){
    echo '<div class="row" id="show_success_message">
     <div class="col-md-4 animated fadeInDown" style="background-color: green; height: 55px; color:white;position: absolute; z-index: 1; right: 0; top:5px; text-align: center;"><h5>'.$successful_message.'</h5></div>
    </div>';
} @endphp
     @include ('layout.auth_jobholder_header');
    <div class="candidate-jobs-bg">
        <h2 class="text-center">Recommended Candidate List</h2>
    </div>
    <section class="featured">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading-17-03">
                        <h2>Recommended Candidate List</h2> </div>
                </div>
            </div>
           

    <div class="row">
      @php if(isset($all_recomonded_candidate_lists)){ @endphp
      @foreach($all_recomonded_candidate_lists as $apply_candidate_info)
         <div class="col-md-6">
                               <div class="resume-large">
                                   
                                   <div class="row">
                                       <div class="col-md-3">
                                           <div class="media-image">
                                              @if(!empty($apply_candidate_info->image_path))
                                               <img width="20px" height="20px" src="{{url(url('storage/uploaded_candidate_image/'.$apply_candidate_info->candidate_email.'.jpg'))}}" alt="img" class="img-responsive">
                                               @else
                                               <img src="{{url('image/resum-image.jpg')}}">
                                               @endif
                                           </div>
                                       </div>
                                       <div class="col-md-5">
                                           <div class="media-middle">
                                               <h3 class="resume-title"><a>{{$apply_candidate_info->first_name}} {{$apply_candidate_info->last_name}}</a></h3>
                                               <h3 class="resume-category">{{$apply_candidate_info->present_address}}</h3>
                                           </div>
                                       </div>
                                       <div class="col-md-4">
                                           
                                           <div class="media-buton">
                                            <form method="post" action="{{url('view_candidate_info')}}">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="jobseekeremail" value="{{$apply_candidate_info->candidate_email}}">
                                              <button class="btn btn-primary">View profile</button>
                                            </form>
                                            
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               
                      </div>
              @endforeach
            @php } @endphp

            </div>   
        </div>
    </section>


   
    <!--======FOOTER=====-->
    @include('layout.footer');
    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <script type="text/javascript">
    setTimeout(function () {
    $("#show_success_message").fadeOut(2000)
}, 3000);
</script>
</body>

</html>