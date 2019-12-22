
@extends('layout.candidate_cv_layout')
@section('skill_test_Result_info')
     
            <div class="row">
                  <div class="col-md-12">
                    <div class="text-left">
                        <h4>Your Average Result</h4> </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @foreach($skill_test_results as $skill_test_result)
                        <div class="col-md-4 col-sm-6">
                              <div class="progress-bar position" data-percent="{{$skill_test_result->result}}" data-duration="1000" data-color="#ccc,yellow"></div>
                              <div class="text-center">{{$skill_test_result->subject_name}}</div>      
                        </div>
                        @endforeach 
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="text-left">
                        <h4>Your Live Contest Result</h4> </div>
                        @foreach($live_contest_results as $live_contest_result)
                        <div class="col-md-4 col-sm-6">
                              <div class="progress-bar position" data-percent="{{$live_contest_result->result}}" data-duration="1000" data-color="#ccc,yellow"></div>
                              <div class="text-center">{{$live_contest_result->subject_name}}</div>      
                        </div>
                        @endforeach 
                    </div>
                </div>  
            </div>
  <script type="text/javascript">
    $(".progress-bar").loading();
        $('#input').on('click', function () {
             $(".progress-bar").loading();
        });
</script>
@endsection

@section('side_navber')
  <ul class="nav nav-tabs tabs-left" >
     <li class="" style="float: none;"><a href="{{url('candidate_cv')}}"><i class="fa fa-file-pdf-o"></i>Post Resume</a></li>
                           
      <li class="" style="float: none;"><a href="{{url('project_work_info')}}"><i class="fa fa-file-video-o"></i>Project/Work</a></li>

      <li class="" style="float: none;"><a href="{{url('/academic_transcript_info')}}"><i class="fa fa-file-video-o"></i>Academic Transcript</a></li>

      <li style="float: none;"><a href="{{url('general_cv')}}"><i class="fa fa-file-pdf-o"></i>General CV</a></li>

      <li class="active" id="input" style="float: none;"><a href="{{url('skill_test_result_info')}}"><i class="fa fa-text-width"></i>Skill Test Result</a></li>  
       
      <li style="float: none;"><a href="{{url('applied_job_list')}}" ><i class="fa fa-eye"></i>Applyed Job</a></li>
   </ul>
@endsection