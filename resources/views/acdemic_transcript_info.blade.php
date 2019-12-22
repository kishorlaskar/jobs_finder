
@extends('layout.candidate_cv_layout')
@section('academic_transcript')

  <section id="menu-navbar">
            <nav class="navbar navbar-default">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                          <li class="active"><a href="#your_transcript" data-toggle="tab">Your Transcript</a></li>
                           
                            <li><a href="#upload_transcript" data-toggle="tab">Upload Transcript</a></li>
                        </ul>
                    </div>
            </nav>
    </section>
           <div class="row tab-pane active"  id="your_transcript">
            <div class="col=md-12">
              <div class="col-md-1"></div>
              <div class="col-md-11">
                  <h1>Your Transcripts</h1>
              </div>
            </div>
           
             <div class="col=md-12">
               <div class="row">  
                
             @if(!empty($transcriptions))
             @foreach($transcriptions as $transcription)
                 <div class="col-md-1"></div>  
                 <div class="col-md-11">
                 <h3> <a href="{{url('storage/uploaded_candidate_file/'.$candidate_info->jobseekeremail.'_'.$transcription->transcription_name.'.'.$transcription->transcript_file_ext)}}"> <i class="fa fa-angle-double-right"></i>{{$transcription->transcription_name}}</a>&nbsp;&nbsp; <a href="{{route('delete_transcription',['name'=>$transcription->id])}}" style="color: red"><i class="fa fa-trash">delete</i></a></h3>
                 </div>
             @endforeach
             @endif
              </div>
             </div>
           </div>

            <div class="row tab-pane" id="upload_transcript">
               <form method="post" action="{{url('submit_transcripttion')}}"  enctype="multipart/form-data">
                {{csrf_field()}}
              <h1>Upload Your Transcript</h1>
                 <div class="col-md-4">
                    <div class="offline-resume"> 
                      <h3>Name Of Your Transcript</h3>       
                        <input type="text" name="transcript_name" class="form-control" required="true"> 
                    </div>
                </div>
                <div class="col-md-4">
                      <input type="file" name="transcript_file" class="uplaod-option" style="padding: 1em 1em;margin-top: 40px;" required="true" accept=".doc, .docx, .pdf" >   
                </div>
                <div class="col-md-4" >
                    <div class="online-resume" style="margin-top: 43px; margin-left: 42px;font-size: 14px;" >
                      <input type="Submit" class="form-control btn btn-primary" style="height: 45px;" name="submit_transcripttion" value="Submit Transcript">
                     
                    </div>
                </div>
                </form>

            </div>
@endsection

@section('side_navber')
  <ul class="nav nav-tabs tabs-left" >
     <li class="" style="float: none;"><a href="{{url('candidate_cv')}}"><i class="fa fa-file-pdf-o"></i>Post Resume</a></li>
                           
      <li class="" style="float: none;"><a href="{{url('project_work_info')}}"><i class="fa fa-file-video-o"></i>Project/Work</a></li>

      <li class="active" style="float: none;"><a href="{{url('/academic_transcript_info')}}"><i class="fa fa-file-video-o"></i>Academic Transcript</a></li>

      <li style="float: none;"><a href="{{url('general_cv')}}"><i class="fa fa-file-pdf-o"></i>General CV</a></li>

      <li id="input" style="float: none;"><a href="{{url('skill_test_result_info')}}"><i class="fa fa-text-width"></i>Skill Test Result</a></li>  
       
      <li style="float: none;"><a href="{{url('applied_job_list')}}" ><i class="fa fa-eye"></i>Applyed Job</a></li>
   </ul>
@endsection