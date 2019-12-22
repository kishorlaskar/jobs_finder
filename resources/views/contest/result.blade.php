<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Final Year Project</title>
    <!--<meta http-equiv="refresh" content="30"/>-->

    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/contest_style.css')}}">
     <link rel="stylesheet" type="text/css" href="{{url('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/style2.css')}}">
</head>
<body>
	 @include ('layout.auth_jobseeker_header');
	<div class="container">
		<div class="row">
			<div class="col-md-11 offset-md-1">
			<h1 style="color: blue;margin-top: 10%;">			
<?php 
echo 'You are successfully answer ';
echo $count_correct_answer.'  !!';
?>
</h1>

</div>
	</div>
	</div>
	<div style="margin-top: 50px;"></div>
     @include('layout.footer');
</body>
</html>