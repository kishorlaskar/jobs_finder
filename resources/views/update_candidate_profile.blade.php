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

  @include('layout.auth_jobseeker_header');
@php $i=1; $id=1;$existing_designation=array();
   foreach($existing_designation_names as $existing_designation_name){
    $existing_designation[]=$existing_designation_name->designation_id;
}
 @endphp


<div class="container">
  <form method="post" action="submit_recomonded_designation">
    {{ csrf_field() }}
 <div class="row">
     <div class="col-md-12">
         <h1>What types of job you want to recomonded </h1>
         @foreach($designation_names as $designation_name)
         @if($i == 1)
         <div class="col-md-4">
              <div class="input-group"> 
              @if(in_array($designation_name->id, $existing_designation) == 1) 
                   <input type="checkbox" id="{{$id}}" name="designation_name[]" value="{{$designation_name->id}}" checked> &nbsp;
              @else
                   <input type="checkbox" id="{{$id}}" name="designation_name[]" value="{{$designation_name->id}}"> &nbsp;
              @endif
                   <label for="{{$id}}">{{$designation_name->designation_name}}</label>
                   @php $i=2; $id++;  @endphp
             </div>
         </div> 
         @elseif($i == 2)
         <div class="col-md-4">
              <div class="input-group">   
             @if(in_array($designation_name->id, $existing_designation) == 1) 
                  <input type="checkbox" id="{{$id}}" name="designation_name[]" value="{{$designation_name->id}}" checked> &nbsp; 
              @else
                   <input type="checkbox" id="{{$id}}" name="designation_name[]" value="{{$designation_name->id}}"> &nbsp; 
              @endif
                   <label for="{{$id}}">{{$designation_name->designation_name}}</label>
                   @php $i=3;$id++;  @endphp
             </div>
         </div>
         @elseif($i == 3)
          <div class="col-md-4">
              <div class="input-group">   
              @if(in_array($designation_name->id, $existing_designation) == 1) 
                   <input type="checkbox" id="{{$id}}" name="designation_name[]" value="{{$designation_name->id}}" checked> &nbsp;
              @else
                   <input type="checkbox" id="{{$id}}" name="designation_name[]" value="{{$designation_name->id}}"> &nbsp;
              @endif
                   <label for="{{$id}}">{{$designation_name->designation_name}}</label>
                   @php $i=1;$id++; @endphp <br><br>
             </div>
         </div>
         @endif
          @endforeach
     </div>
     <div class="col-md-12"></div>
      <div class="col-md-8"></div>
      <div class="col-md-4">
         <input type="submit" name="designation_choose" class="form-control btn btn-lg btn-primary" value="Update">
      </div>
 </div>
 </form>
</div>

 <!--======FOOTER=====-->
 <div style="margin-top: 20px;"></div>
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
 