<!DOCTYPE html>
<html lang="en">

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
  @include ('layout.auth_jobseeker_header');
    <section>
     <div class="container">
        <div class="row">
          
          <div class="col-md-12">
            <table class="table">
              <tr>
                <th style="width: 5%"><h4>SL</h4></th>
                <th><h4>Category</h4></th>
                <th><h4>Testing Name</h4></th>
                <th class=""><h4>Start Your Test</h4></th>
                </tr>
                @foreach($test_lists as $test_list)
                <tr>
                <td style="width: 5%">1</td>
                <td><b>{{$test_list->category}}</b></td>
                <td><b>{{$test_list->subject_name}}</b></td>
                <td class=""><a href="{{ route('question_paper',['name' => $test_list->id]) }}" class="btn btn-primary btn-lg"style="width:85%;color:white;margin-left: 0px" >Start Your Test</a></td>
                </tr>
                @endforeach
              </table>
            </div>
          
         </div>
        </div>
    </section>
    <div style="margin-top: 50px;"></div>
     @include('layout.footer');
  
</body>
</html>