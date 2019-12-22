<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <title>Final Year Project</title>
    <meta name="description" content="">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/style2.css')}}">

</head>
<body>
	 @include ('layout.auth_jobseeker_header');
	<div class="container">
		<div class="row">
			<div class="col-md-11 offset-md-1">
			<h1 style="color: blue;margin-top: 3%;">			
<?php 

echo 'You are successfully answer ';
echo $count_correct_answer .'  !!';
?>
</h1>
</div>
	</div>
	</div>
	<h1 style="color: blue;margin-top: 10%;"></h1>
	@include('layout.footer');
</body>
</html>