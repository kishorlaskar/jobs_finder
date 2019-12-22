<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Final Year Project</title>
     <meta name="_token" content="{{ csrf_token() }}">
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
@include ('layout.auth_jobholder_header');

<div class="container">
    <div class="row">
      @foreach($apply_candidate_infos as $apply_candidate_info)
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
                                              <input type="hidden" name="apply_job_id" value="{{$apply_candidate_info->apply_job_id}}">
                                              <input type="hidden" name="jobseekeremail" value="{{$apply_candidate_info->candidate_email}}">
                                              <button class="btn btn-primary">View profile</button>
                                            </form>
                                            
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               
                      </div>
              @endforeach
    </div>
</div>

@include('layout.footer');
</body>
 </html>