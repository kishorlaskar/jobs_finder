@extends('layout.candidate_cv_layout')
@section('post_resume11')
<script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
                     
                        <div class="tab-pane active" id="home">
                            <div class="col-md-11 cv-body-bg-another">
                                <div id="exTab1">
                                    <ul class="nav nav-pills">
                                        <li class="active" onclick="disable_all_input_fields()"> <a href="#1a" data-toggle="tab"><i class="fa fa-address-book-o" aria-hidden="true"></i>Personal</a> </li>
                                        <li onclick="disable_all_input_fields()"><a href="#2a" data-toggle="tab"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Education</a> </li>
                                        <li onclick="disable_all_input_fields()"><a href="#3a" data-toggle="tab"><i class="fa fa-pie-chart" aria-hidden="true"></i>Skill</a> </li>
                                        <li onclick="disable_all_input_fields()"><a href="#5a" data-toggle="tab"><i class="fa fa-language" aria-hidden="true"></i>Language</a> </li>
                                        <li onclick="disable_all_input_fields()"><a href="#6a" data-toggle="tab"><i class="fa fa-registered" aria-hidden="true"></i>Reference</a> </li>
                                        <li onclick="disable_all_input_fields()"><a href="#7a" data-toggle="tab"><i class="fa fa-picture-o" aria-hidden="true"></i>Image</a> </li>
                                        
                                        <li>
    

    
    
                                            <div class="edit-cv btn btn-success" style="border-radius: 20px !important;" onclick="enable_all_input_fields()"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</div>
                                    

                            </li>

                                    </ul>
                                    <div class="tab-content clearfix">
                                        <!--===================
                                                personal part 
                                                ================-->
                                        <div class="tab-pane active" id="1a">
                                            <form id="parsonal_form">
                                                    {{ csrf_field() }}
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th>First Name </th>
                                                            <td>
                                                                <input type="text" name="firstname" class="form-control cv-table-color" value="{{$candidate_info->firstname}}" disabled maxlength="20"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Last Name </th>
                                                            <td>
                                                                <input type="text" name="lastname" class="form-control cv-table-color" value="{{$candidate_info->lastname}}" disabled maxlength="20">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Father Name </th>
                                                            <td>
                                                                <input type="text" name="fathername" class="form-control cv-table-color" value="{{$candidate_info->fathername}}" disabled maxlength="50"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Mother Name </th>
                                                            <td>
                                                                <input type="text" name="mothername" class="form-control cv-table-color" value="{{$candidate_info->mothername}}" disabled maxlength="50">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date Of Birth </th>
                                                            <td>
                                                                <input type="date" name="DOB" class="form-control cv-table-color" value="{{$candidate_info->DOB}}" disabled maxlength="20">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Gendar </th>
                                                            <td>
                                                                <input type="text" name="gender" class="form-control cv-table-color" value="{{$candidate_info->gender}}" disabled maxlength="10"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Religion </th>
                                                            <td>
                                                                <input type="text" name="religion" class="form-control cv-table-color" value="{{$candidate_info->religion}}" disabled maxlength="20"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Marital Status </th>
                                                            <td>
                                                                <input type="text" name="marital_status" class="form-control cv-table-color" value="{{$candidate_info->marital_status}}" disabled maxlength="15">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Nationality </th>
                                                            <td>
                                                                <input type="text" name="nationality" class="form-control cv-table-color" value="{{$candidate_info->nationality}}" disabled maxlength="50"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Present Address</th>
                                                            <td>
                                                                <input type="text" name="present_address" class="form-control cv-table-color" value="{{$candidate_info->present_address}}" disabled maxlength="254"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Permanent Address </th>
                                                            <td>
                                                                <input type="text" name="permanent_address" class="form-control cv-table-color" value="{{$candidate_info->permanent_address}}" disabled maxlength="254"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Mobile No</th>
                                                            <td>
                                                                <input type="text" name="mobile" class="form-control cv-table-color" value="{{$candidate_info->mobile}} " disabled maxlength="15" pattern="\d*">
                                                            </td>
                                                        </tr>
                                                        
                                                
                                                        <tr>
                                                            <th>Optional Email</th>
                                                            <td>
                                                                <input type="email" name="optional_email" class="form-control cv-table-color" value="{{$candidate_info->optional_email}}" disabled maxlength="254"> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="save-edit-22feb">
                                                <button class="save-button" onclick="update_personal_info('#parsonal_form')" type="button">Save</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!--===================
                                                    Accoridin Education part 
                                            ================-->
                                            
                                        <div class="tab-pane" id="2a">
                                            <?php $education_row_count=0; ?><script type="text/javascript"> var a=0;</script>
                                                <form id="education_info_form">
                                                    {{ csrf_field() }}
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <table class="table table-bordered" id="dynamic_field"> 
                                    @foreach ($education_infos as $education_info) 
                                <tr>  <script type="text/javascript">a++; if (a !=1) { document.getElementById("table_last_child<?php echo $education_row_count-1; ?>").innerHTML=''; } </script>
                                    @php ($education_row_count++)
                                        <input type="hidden" name="id{{$education_row_count}}" value="{{$education_info->id}}">
                                        <td width="90%">

                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="button" data-toggle="collapse" data-parent="#accordion" href="#{{$education_row_count}}" aria-expanded="true" aria-controls="{{$education_row_count}}">
                                                        <h4 class="panel-title">
                                                        Academic #{{$education_row_count}}</h4> </div>
                                                    <div id="{{$education_row_count}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    
                                                                        <tr>
                                                                            <th>SL</th>
                                                                            <td>{{$education_row_count}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Title</th>
                                                                            <td>
                                                                                <input type="text" name="education_title{{$education_row_count}}" class="form-control cv-table-color" value="{{$education_info->education_title}}" disabled maxlength="100"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Major</th>
                                                                            <td>
                                                                                <input type="text" name="education_major{{$education_row_count}}" class="form-control cv-table-color" value="{{$education_info->education_major}}" disabled maxlength="200"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>University</th>
                                                                            <td><input type="text" name="education_institute_name{{$education_row_count}}" class="form-control cv-table-color" value="{{$education_info->education_institute_name}}" disabled maxlength="254"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Result</th>
                                                                            <td><input type="text" name="education_result{{$education_row_count}}" class="form-control cv-table-color" value="{{$education_info->education_result}}" disabled maxlength="10"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Passing Year</th>
                                                                            <td><input type="text" name="passing_year{{$education_row_count}}" class="form-control cv-table-color" value="{{$education_info->passing_year}}" disabled maxlength="10"></td>
                                                                        </tr>
                                                                    
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </td>  
                                        <td id="table_last_child{{$education_row_count}}"><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                </tr> 
                                @endforeach
                                <script type="text/javascript">document.getElementById("table_last_child<?php echo $education_row_count-1; ?>").innerHTML='';  </script>
                                @if($education_row_count < 1)
                                <tr>  <script type="text/javascript">a++;</script>
                                        <td width="90%">
                                                <input type="hidden" name="id1" value="">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="button" data-toggle="collapse" data-parent="#accordion" href="#{{$education_row_count}}" aria-expanded="true" aria-controls="{{$education_row_count}}">
                                                        <h4 class="panel-title">
                                                        Academic #1</h4> </div>
                                                    <div id="{{$education_row_count}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    
                                                                        <tr>
                                                                            <th>SL</th>
                                                                            <td>1</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Title</th>
                                                                            <td>
                                                                                <input type="text" n name="education_title1" class="form-control cv-table-color" value="" disabled maxlength="100"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Major</th>
                                                                            <td>
                                                                                <input type="text" name="education_major1" class="form-control cv-table-color" value="" disabled maxlength="200" ></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>University</th>
                                                                            <td><input type="text" name="education_institute_name1" class="form-control cv-table-color" value="" disabled maxlength="254"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Result</th>
                                                                            <td><input type="text" name="education_result1" class="form-control cv-table-color" value="" disabled maxlength="10"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Passing Year</th>
                                                                            <td><input type="text" name="passing_year1" class="form-control cv-table-color" value="" disabled maxlength="10"></td>
                                                                        </tr>
                                                                    
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </td>  
                                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                </tr>
                                @endif
                            </table>

                                            </div> <input type="hidden" id="row_count_input" name="row_count" value="{{$education_row_count}}">
                                            <div class="save-edit-22feb">
                                                <button class="save-button" onclick="update_jobseeker_education_info('#education_info_form')" type="button">Save</button>
                                            </div>
                                            </form>
                                        </div>

                                        <!--===================
                                                    Skill part 
                                            ================-->
                                            <?php $education_row_count=0; ?><script type="text/javascript"> var b=0;</script>

                                        <div class="tab-pane" id="3a">
                                            <form id="skill_info_form">
                                                    {{ csrf_field() }}
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                                

                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">Skill </a> </h4> </div>
                                                    <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            <div class="table-responsive skill-3a">
                                                                    <table class="table table-bordered" id="dynamic_field_skill"> 
                                                                    <thead>
                                                                        <tr>
                                                                            <th>SL</th>
                                                                            <th>Skill</th>
                                                                            <th>Experience</th>
                                                                            <th>Proficiency</th>
                                                                            <th>Add More</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($skill_infos as $skill_info) 

                                                                        <tr>
                                                                            <script type="text/javascript">b++; </script>
                                    @php ($education_row_count++)
                                        <input type="hidden" name="id{{$education_row_count}}" value="{{$skill_info->id}}">

                                                                            <td>{{$education_row_count}}</td>
                                                                            <td><input type="text" class="form-control cv-table-color"  name="skill{{$education_row_count}}" value="{{$skill_info->skill}}" disabled maxlength="100"></td>
                                                                            <td><input type="text" class="form-control cv-table-color" name="skill_experiance{{$education_row_count}}" value="{{$skill_info->skill_experiance}}" disabled maxlength="50"></td>
                                                                            <td><input type="text" class="form-control cv-table-color" name="skill_proficency{{$education_row_count}}" value="{{$skill_info->skill_proficency}}" disabled maxlength="100"></td>
                                                                            @if($education_row_count==1)
                                                                                <td id="table_last_child{{$education_row_count}}"><button type="button" name="add" id="add_skill" class="btn btn-success">Add More</button></td> 
                                                                                @else
                                                                                <td></td>
                                                                                @endif 
                                                                        </tr> 
                                                                            @endforeach
                                                                            @if($education_row_count < 1)
                                                                            <tr>
                                                                            <script type="text/javascript">b++; </script>
                                    
                                        <input type="hidden" name="id1" value="">

                                                                            <td>1</td>
                                                                            <td><input type="text" class="form-control cv-table-color"  name="skill1" value="" disabled maxlength="100"></td>
                                                                            <td><input type="text" class="form-control cv-table-color" name="skill_experiance1" value="" disabled maxlength="50"></td>
                                                                            <td><input type="text" class="form-control cv-table-color" name="skill_proficency1" value="" disabled maxlength="100"></td>
                                                                            
                                                                                <td id="table_last_child{{$education_row_count}}"><button type="button" name="add" id="add_skill" class="btn btn-success">Add More</button></td> 
                                                                                
                                                                        </tr> 
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <input type="hidden" id="row_count_input2" name="row_count" value="{{$education_row_count}}">
                                                <div class="save-edit-22feb">
                                                <button class="save-button" onclick="update_jobseeker_skill_info('#skill_info_form')" type="button">Save</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!--===================
                                                    Language part 
                                            ================-->
                                            <?php $education_row_count=0; ?><script type="text/javascript"> var l=0;</script>
                                        <div class="tab-pane" id="5a">
                                                <form id="language_info_form">
                                                    {{ csrf_field() }}
                                            <div class="table-responsive language-5a">
                                                <table class="table table-bordered" id="dynamic_field_language"> 
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Language</th>
                                                            <th>Spoken</th>
                                                            <th>Written</th>
                                                            <th>Reading</th>
                                                            <th>Add More</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($language_infos as $language_info)
                                                        <script type="text/javascript">l++; </script>
                                                        <tr>
                                                            @php ($education_row_count++)
                                        <input type="hidden" name="id{{$education_row_count}}" value="{{$language_info->id}}">
                                                            <td>{{$education_row_count}}</td>
                                                            <td><input type="text" class="form-control cv-table-color" name="language{{$education_row_count}}" value="{{$language_info->language}}" disabled maxlength="20"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="language_spoken_type{{$education_row_count}}" value="{{$language_info->language_spoken_type}}" disabled maxlength="10"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="language_writting_type{{$education_row_count}}"  value="{{$language_info->language_writting_type}}" disabled maxlength="10"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="language_reading_type{{$education_row_count}}" value="{{$language_info->language_reading_type}}" disabled maxlength="10"></td>
                                                        @if($education_row_count==1)
                                                                                <td id="table_last_child{{$education_row_count}}"><button type="button" name="add" id="add_language" class="btn btn-success">Add More</button></td> 
                                                                                @else
                                                                                <td></td>
                                                                                @endif 
                                                                        </tr> 
                                                            @endforeach
                                                        @if($education_row_count < 1)
                                                        <script type="text/javascript">l++; </script>
                                                            <tr>
                                                            
                                        <input type="hidden" name="id1" value="">
                                                            <td>1</td>
                                                            <td><input type="text" class="form-control cv-table-color" name="language1" value="" disabled maxlength="20"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="language_spoken_type1" value="" disabled maxlength="10"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="language_writting_type1"  value="" disabled maxlength="10"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="language_reading_type1" value="" disabled maxlength="10"></td>
                                                        
                                                                                <td id="table_last_child{{$education_row_count}}"><button type="button" name="add" id="add_language" class="btn btn-success">Add More</button></td> 
                                                                                
                                                                        </tr>
                                                                @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            <input type="hidden" id="row_count_input3" name="row_count" value="{{$education_row_count}}">
                                            <div class="save-edit-22feb">
                                                <button class="save-button" onclick="update_jobseeker_language_info('#language_info_form')" type="button">Save</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!--===================
                                                    Reference part 
                                            ================-->
                                            <?php $education_row_count=0; ?><script type="text/javascript"> var r=0;</script>
                                        <div class="tab-pane" id="6a">
                                                <form id="reference_info_form">
                                                    {{ csrf_field() }}
                                            <div class="table-responsive reference-6a">
                                                <table class="table table-bordered" id="dynamic_field_ref">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Designation</th>
                                                            <th>Relation Ship</th>
                                                            <th>Phone</th>
                                                            <th>Email</th>
                                                            <th>Add More</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            @foreach ($ref_infos as $ref_info)
                                                        <script type="text/javascript">r++; </script>
                                                        <tr>
                                                            @php ($education_row_count++)
                                        <input type="hidden" name="id{{$education_row_count}}" value="{{$ref_info->id}}">
                                                            <td><input type="text" class="form-control cv-table-color" name="ref_name{{$education_row_count}}" value="{{$ref_info->ref_name}}" disabled maxlength="100"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="ref_designation{{$education_row_count}}" value="{{$ref_info->ref_designation}}" disabled maxlength="50"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="ref_relationship{{$education_row_count}}" value="{{$ref_info->ref_relationship}}" disabled maxlength="50"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="ref_phone{{$education_row_count}}" value="{{$ref_info->ref_phone}}" disabled maxlength="20" pattern="\d*"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="ref_email{{$education_row_count}}" value="{{$ref_info->ref_email}}" disabled maxlength="100"></td>
                                                            @if($education_row_count==1)
                                                                                <td id="table_last_child{{$education_row_count}}"><button type="button" name="add" id="add_ref" class="btn btn-success">Add More</button></td> 
                                                                                @else
                                                                                <td></td>
                                                                                @endif 
                                                                        </tr> 
                                                            @endforeach
                                                        @if($education_row_count < 1)
                                                        <tr>
                                                            <script type="text/javascript">r++; </script>
                                        <input type="hidden" name="id1" value="">
                                                            <td><input type="text" class="form-control cv-table-color" name="ref_name1" value="" disabled maxlength="100"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="ref_designation1" value="" disabled maxlength="50"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="ref_relationship1" value="" disabled maxlength="50"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="ref_phone1" value="" disabled maxlength="20" pattern="\d*"></td>
                                                            <td><input type="text" class="form-control cv-table-color" name="ref_email1" value="" disabled maxlength="100"></td>
                                                        
                                                                                <td id="table_last_child{{$education_row_count}}"><button type="button" name="add" id="add_ref" class="btn btn-success">Add More</button></td> 
                                                                                
                                                                        </tr> 
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                                <input type="hidden" id="row_count_input4" name="row_count" value="{{$education_row_count}}">
                                            <div class="save-edit-22feb">
                                                <button class="save-button" onclick="update_jobseeker_ref_info('#reference_info_form')" type="button">Save</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!--===================
                                                    Resume part 
                                            ================-->
                                        <div class="tab-pane" id="7a">
                                                <form id="resume_info_form" method="post" enctype="multipart/form-data" action="submit_candidate_image" onsubmit="return validate_candidate_image_submit()">
                                                    {{ csrf_field() }}
                                            <div class="table-responsive">
                                                <div class="resume-image">
                                                @if($candidate_info->candidate_image)
                                                    <img src="storage/uploaded_candidate_image/{{$candidate_info->jobseekeremail}}.jpg" id="blah" style="width:20%;height: 20%;" alt="image">
                                                    @else
                                                    <img src="image/resum-image.jpg" id="blah" style="width:20%;height: 20%;" alt="image">
                                                    @endif
                                                    <input type="file" id="candidate_photo" name="candidate_image" class="resume-personal-image22feb" onchange="readURL(this);" accept=".jpg,.png,.jpeg" required> </div>
                                            </div>
                                                <div class="save-edit-22feb">
                                                <button class="save-button" type="submit" >Save</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--===================
                                                    Edit/delete part 
                                            ================-->
                            
                        </div>
@endsection

@section('side_navber')
  <ul class="nav nav-tabs tabs-left" >
     <li class="active" style="float: none;"><a href="{{url('candidate_cv')}}"><i class="fa fa-file-pdf-o"></i>Post Resume</a></li>
                           
      <li class="" style="float: none;"><a href="{{url('project_work_info')}}"><i class="fa fa-file-video-o"></i>Project/Work</a></li>

      <li class="" style="float: none;"><a href="{{url('/academic_transcript_info')}}"><i class="fa fa-file-video-o"></i>Academic Transcript</a></li>

      <li style="float: none;"><a href="{{url('general_cv')}}"><i class="fa fa-file-pdf-o"></i>General CV</a></li>

      <li id="input" style="float: none;"><a href="{{url('skill_test_result_info')}}"><i class="fa fa-text-width"></i>Skill Test Result</a></li>  
       
      <li style="float: none;"><a href="{{url('applied_job_list')}}" ><i class="fa fa-eye"></i>Applyed Job</a></li>
   </ul>
@endsection
