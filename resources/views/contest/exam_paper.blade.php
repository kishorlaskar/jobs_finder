<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Final Year Project</title>
    <!--<meta http-equiv="refresh" content="30"/>-->

    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/contest_style.css')}}">
    
    <script src="{{url('js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
$(document).ready(function(){
  
            setInterval(function(){
                //$('#time').load('Create_Watch/time');
               $('#show_exam_time').load('time.php');
            },1000);
        });
</script>
</head>
<body>
<div class="container">
@php
$exist_exam_list=DB::table('question_contest')->where('subject_name',$subject_name)->exists();
$exist_completed_list=DB::table('complete_contest')->where('subject_name',$subject_name)->exists();
if ($exist_exam_list==true){
   $values=DB::table('question_contest')->where('subject_name',$subject_name)->first();
	date_default_timezone_set("Asia/Dhaka");
    $current_date = date("Y-m-d");
    $current_time = date("h:i:s a");
    $current_datetime = strtotime($current_date . ' ' . $current_time);
    $start_date=$values->start_date;
    $start_time=$values->start_time;
    $start_datetime = strtotime($start_date . ' ' . $start_time);
    $end_date=$values->end_date;
    $end_time=$values->end_time;
    $end_datetime = strtotime($end_date . ' ' . $end_time);
    if($current_datetime >=  $start_datetime && $current_datetime <= $end_datetime){
   @endphp
    <div class="row">
    	<div class="col-md-9">
    		{{Form::open(array('url' => 'contest/result', 'method' => 'POST'))}}

    	{{--Create Question Show Tamplate--}}
    @php	
    $question_data=DB::table('make_question')->where('subject_name',$subject_name)->first();
    	@endphp
      <input type="hidden" name="subject_name" value="{{$question_data->subject_name}}">
                        <input type="hidden" name="subject_id" value="{{$question_data->question_id}}">
    	<table  class="table" ><?php
    		for($i=1;$i<3;$i++){
    		 $question_title='question_'.$i.'_title';
    		 ?>
    		 <tr>
    			<td> <h4><?php echo $i." . ".$question_data->$question_title; ?></h4>
    				@php	
    				$mynewarray=array();
    				$question_correct_answer='question_'.$i.'_correct_answer';
    				$question_prob_1='question_'.$i.'_prob_1';
    				$question_prob_2='question_'.$i.'_prob_2';
    				$question_prob_3='question_'.$i.'_prob_3';
    				$question_prob_4='question_'.$i.'_prob_4';
    				$myarry=array($question_data->$question_correct_answer,$question_data->$question_prob_1,$question_data->$question_prob_2,$question_data->$question_prob_3,$question_data->$question_prob_4);
    				shuffle($myarry);
    				foreach($myarry as $arraydata){
    				if($arraydata==''){}
    				else{ array_push($mynewarray,$arraydata); }
    			}
    			foreach ($mynewarray as $value) {
   	                 if($value==$question_data->$question_correct_answer){
   	                 @endphp
   	                  <div class="form-check ">
  <input class="form-check-input" type="radio" name="{{'answer'.$i}}"  value="{{$value}}">
  <label class="form-check-label" for="inlineRadio1">{{$value}}</label>
</div>
   	           @php  } else{ @endphp
<div class="form-check">
  <input class="form-check-input" type="radio" name="{{'answer'.$i}}">
  <label class="form-check-label">{{$value}}</label>
</div>
   	      @php }
 
                  }
              
    				@endphp
                
    			</td>
    		</tr>
    		@php } @endphp
          <tr>
          	<td><input class="form-control btn-primary" type="submit" name="submit_exam_paper" value="submit"></td></tr>
    	</table>
      {{ Form::close() }}
    </div>
    	<div class="col-md fixed-right"  style="margin-top:10%;">
    		<div class="card" style="width: 100%; padding: 10px;">
     
            <h4 style="display: inline-block;color: black;">End Time:</h4>
            <h4 style="display: inline-block;color: black;">{{$values->end_time}}</h4>
            <h4 style="display: inline-block;color: black;">Current Time:</h4>
    		<h4 id="show_exam_time" style="color: blue;">00 : 00 : 00 pm</h4>
    	</div>
    	 </div>
    </div>
@php}
else{ @endphp
<div class="row" style="margin-top:10%;color: green">
 <div class="col-md-12">
 <h1>	{{"This Exam Start Date : ".$values->start_date." and Time : ".$values->start_time}}</h1>
 </div>
 </div>
	
@php
}
}
elseif($exist_completed_list==true){
    $completed_paper=DB::table('make_question')->where('subject_name',$subject_name)->first();
	@endphp

    <table  class="table" ><?php
            for($i=1;$i<3;$i++){
             $question_title='question_'.$i.'_title';
             $question_correct_answer='question_'.$i.'_correct_answer';
             ?>
             <tr>
                <td> <h4><?php echo $i." . ". $completed_paper->$question_title; ?></h4>
                    {{'Answer : '}}
                    {{ $completed_paper-> $question_correct_answer}}       
                </td>
            </tr>
            @php } @endphp
  </table>



@php
}
else{
 @endphp
<div class="row" id="error" style="margin-top:10%;color: red">
 <div class="col-md-10 offset-md-2">
 <h1>	{{"Opps !! This Topic Is Not Assign !!!".$subject_name}}</h1>
 </div>
 </div>
@php }
@endphp
</div>
	</body>
</html>

