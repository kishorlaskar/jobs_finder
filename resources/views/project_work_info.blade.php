
@extends('layout.candidate_cv_layout')
@section('project_work')
  <script type="text/javascript">var project=0; </script>
      @php $project_row_count=0; @endphp
          <div class="row">
              <div class="col-md-11">
                  <form id="project_info_form">
                      {{ csrf_field() }}
                  <table class="table" id="project_table">
                      <tr>
                          <th width="0%">Project/Work Name</th>
                          <th width="0%">Project Discription</th>
                          <th width="0%">Project Link</th>
                          <th width="0%">Add More</th>
                      </tr>
                        @foreach($project_infos as $project_info)
                      <script type="text/javascript">project++; </script>
                      <tr>
                            @php ($project_row_count++) 
                    <input type="hidden" class="form-control cv-table-color" name="id{{$project_row_count}}" value="{{$project_info->id}}">
                    <td><input type="text" class="form-control cv-table-color" name="project_name{{$project_row_count}}" value="{{$project_info->project_name}}" disabled></td>
                    <td><input type="text" class="form-control cv-table-color" name="project_discription{{$project_row_count}}" value="{{$project_info->project_discription}}" disabled></td>
                    <td><input type="text" class="form-control cv-table-color" name="project_link{{$project_row_count}}" value="{{$project_info->project_link}}" disabled></td>
                    @if($project_row_count==1)
                    <td id="table_last_child{{$project_row_count}}"><button type="button" id="add_project" class="btn btn-success">Add More</button></td>
                    @else
                    <td></td>
                    @endif
                  </tr>
                    @endforeach 
                    @if($project_row_count < 1)
                    <script type="text/javascript">project++; </script>
                    <tr>
                      <input type="hidden" class="form-control cv-table-color" name="id1" value="1">
                        <td><input type="text" class="form-control cv-table-color" name="project_name1" disabled></td>
                        <td><input type="text" class="form-control cv-table-color" name="project_discription1" disabled></td>
                        <td><input type="text" class="form-control cv-table-color" name="project_link1" disabled></td>
                        
                          <td id="table_last_child{{$project_row_count}}"><button type="button" id="add_project" class="btn btn-success">Add More</button></td>
                    </tr>
                    @endif
                  </table>
                  <input type="hidden" id="project_row_count" name="project_row_count" value="{{$project_row_count}}">
                          <div class="save-edit-22feb">
                              <button class="save-button" onclick="update_jobseeker_project_info('#project_info_form')" type="button">Save</button>
                          </div>
                          </form>
                
              </div>
              <div class="col-md-1">
              <div class="edit-option">
                  <ul>
                      <li style="float: right;">
                          <div class="edit-cv btn btn-success" onclick="enable_all_input_fields()"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o" ></i>
                        </div>
                      </li>
                  </ul>
              </div>
          </div>
</div>
@endsection

@section('side_navber')
  <ul class="nav nav-tabs tabs-left" >
     <li class="" style="float: none;"><a href="{{url('candidate_cv')}}"><i class="fa fa-file-pdf-o"></i>Post Resume</a></li>
                           
      <li class="active" style="float: none;"><a href="{{url('project_work_info')}}"><i class="fa fa-file-video-o"></i>Project/Work</a></li>

      <li class="" style="float: none;"><a href="{{url('/academic_transcript_info')}}"><i class="fa fa-file-video-o"></i>Academic Transcript</a></li>

      <li style="float: none;"><a href="{{url('general_cv')}}"><i class="fa fa-file-pdf-o"></i>General CV</a></li>

      <li id="input" style="float: none;"><a href="{{url('skill_test_result_info')}}"><i class="fa fa-text-width"></i>Skill Test Result</a></li>  
       
      <li style="float: none;"><a href="{{url('applied_job_list')}}" ><i class="fa fa-eye"></i>Applyed Job</a></li>
   </ul>
@endsection