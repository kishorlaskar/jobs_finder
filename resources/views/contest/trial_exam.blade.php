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

@php
$exist_completed_list=DB::table('complete_contest')->where('subject_name',$subject_name)->where('year',$year)->exists();
if ($exist_completed_list==true){
   $values=DB::table('question_contest')->where('subject_name',$subject_name)->first();
   @endphp
    <div class="row">
      <div class="col-md-9">
        {{Form::open(array('url' => 'contest/trial_result', 'method' => 'POST'))}}
      {{--Create Question Show Tamplate--}}
    @php  
    $question_data=DB::table('make_question')->where('subject_name',$subject_name)->first();
      @endphp
      <table  class="table" ><?php
        for($i=1;$i<3;$i++){
         $question_title='question_'.$i.'_title';
         ?>
         <tr>
          <td> <h4><?php echo $i." . ".$question_data->$question_title; ?></h4>
            <?php 
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
                     ?>
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
    </div>
@php}

else{
 @endphp
<div class="row" id="error" style="margin-top:10%;color: red">
 <div class="col-md-10 offset-md-2">
 <h1> {{"Opps !! This Topic Is Not Assign !!!".$subject_name}}</h1>
 </div>
 </div>
@php }
@endphp 
</div>
<div style="margin-top: 50px;"></div>
     @include('layout.footer');
	</body>
</html>

