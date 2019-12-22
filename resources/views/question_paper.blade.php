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
    </head>

<body>  
   @include ('layout.auth_jobseeker_header');
 
    <div class="question">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <ol class="breadcrumb">
                        <h3 style=" text-align: center;">Prove Your Skill</h3>
                    </ol>
                      <form action="{{url('skill_test_result')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="subject_name" value="{{$question_paper_details->subject_name}}">
                        <input type="hidden" name="subject_id" value="{{$question_paper_details->id}}">
                    <div class="question-list7jan">
                        <h3 class="text-center">{{$question_paper_details->subject_name}}</h3>
                        <hr>
                        @php $random_question=array(1,2,3,4,5,6,7,8,9,10);
                        shuffle($random_question); $index=1; @endphp
                        @foreach ($random_question as $i) 
                        @php $question_number='question'.$i;  @endphp
                        <div class="question-html">
                            <h4>{{$index}}.{{$question_paper_details->$question_number}}</h4>
                        
                        @php 
                        
                        $question_correct_answer=$question_number.'_correct_answer';
                        $question_prob_1='question'.$i.'_prob1';
                         $question_prob_2='question'.$i.'_prob2';
                         $question_prob_3='question'.$i.'_prob3';
                        $mynewarray=array();

                 
                    $myarry=array($question_paper_details->$question_correct_answer,$question_paper_details->$question_prob_1,$question_paper_details->$question_prob_2,$question_paper_details->$question_prob_3);
                    shuffle($myarry);
                    foreach($myarry as $arraydata){
                    if($arraydata==''){}
                    else{ array_push($mynewarray,$arraydata); }
                }
                foreach ($mynewarray as $value) {
                     if($value==$question_paper_details->$question_correct_answer){
                         @endphp
                           <div class=" ">
  <input class="form-check-input" type="radio" name="{{'answer'.$i}}"  value="{{$value}}">
  <label class="form-check-label" for="inlineRadio1">{{$value}}</label>
</div>
               @php  } else{ @endphp
<div class="">
  <input class="form-check-input" type="radio" name="{{'answer'.$i}}">
  <label class="form-check-label">{{$value}}</label>
</div>
          @php }
 
                  }
                    $index++;
                    @endphp
                        @endforeach
                        
                         <div class="row" style="margin-top: 30px;">
    	<div class="col-md-9"></div>
    	<div class="col-md-2">
    		<input type="submit" class="form-control btn-primary" name="submit_question_paper" value="Submit">
    	</div>
    </div>
    </form>
                    </div>
                </div>
               
            </div>
        </div>

    </div>
   
    <script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
</body>
</html>