<!DOCTYPE html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <style type="text/css">
        .margin_left{
          margin-left: 40%;
        }
        .float_left{
        	width: 50%;
        	margin-left: 0%;
        	float: left;
        }
        .float_right{
        	width: 50%;
        	float: left;
        }
        .header_left{
        	width: 80%;
        	float: left;
        }
        .header_right{
        	width: 20%;
        	float: left;
        }
        
        .im_show{
        	width: 130px;
        	height: 150px;
        }
        table,tr,td,th{
        	width: 100%;
        	border: 1px dotted black;
        	border-collapse: collapse;
        }
        .width_28{
        	width: 28%;
        }
        .width_10{
        	width: 10%;
        }
        .width_6{
        	width: 6%;
        }
        .width_20{
        	width: 20%;
        }
        .width_60{
        	width: 60%;
        }
         .width_25{
        	width: 25%;
        }
        .width_20{
        	width: 20%;
        }
        td{
        	text-align: center;
        }
    </style>
 </head>
    
<body>
        <div class="header_left">
              <h2 class="margin_left">Curriculum vitae</h2>
    	      <hr style="width: 50%;">
             <h2 class="margin_left">Personal Information</h2>
        </div>

        <div class="header_right">
          @if($candidate_info->candidate_image)
             <img class="im_show" src= "{{public_path('storage/uploaded_candidate_image/'.$candidate_info->jobseekeremail.'.jpg')}}" > 
           @else
             <div class="im_show" >  
          @endif 
         </div>


       <div class="float_left">
            <h4>Name : {{$candidate_info->firstname}} {{$candidate_info->lastname}}</h4>
            <h4>Father Name : {{$candidate_info->fathername}}</h4>
            <h4>Mother Name : {{$candidate_info->mothername}}</h4>
            <h4>Date Of Birth : {{$candidate_info->DOB}}</h4>
            <h4>Marital Status : {{$candidate_info->marital_status}}</h4>
            <h4>Gender : {{$candidate_info->gender}}</h4>  
           </div>
           <div class="float_right">
            <h4>Religion : {{$candidate_info->religion}}</h4>
            <h4>Parmanent Address : {{$candidate_info->permanent_address}}</h4>
            <h4>Prasent Address : {{$candidate_info->present_address}}</h4>
            <h4>Nationality : {{$candidate_info->nationality}}</h4>
            <h4>Mobile Number : {{$candidate_info->mobile}}</h4>
            <h4>Email : {{$candidate_info->jobseekeremail}} , {{$candidate_info->optional_email}}</h4>
           </div>

           <h2 class="">Educational Information </h2>
          <table >
              <tr>
                  <th class="width_28">Title</th>
                  <th class="width_28">Major</th>
                  <th class="width_28">Institute</th>
                  <th class="width_10">Passing Year</th>
                  <th class="width_6">Result</th>
              </tr>
               @foreach($education_infos as $education_info)
              <tr>
                  <td class="width_28">{{$education_info->education_title}}</td>
                  <td class="width_28">{{$education_info->education_major}}</td>
                  <td class="width_28">{{$education_info->education_institute_name}}</td>
                  <td class="width_10">{{$education_info->passing_year}}</td>
                  <td class="width_6">{{$education_info->education_result}}</td>  
              </tr>
             @endforeach
          </table>

  <h2 class="">Skill Information</h2>
          <table>
              <tr>
                  <th class="width_60">Skill Name</th>
                  <th class="width_20">Experiance</th>
                  <th class="width_20">Proficiency</th>
              </tr>
                 @foreach($skill_infos as $skill_info)
              <tr>
                <td class="width_60">{{$skill_info->skill}}</td>
                <td class="width_20">{{$skill_info->skill_experiance}}</td>
                <td class="width_20">{{$skill_info->skill_proficency}}</td>
              </tr>
              @endforeach
          </table>

      <h2 class="">Language Information</h2>
          <table>
              <tr>
                  <th class="width_25">Language</th>
                  <th class="width_25">Spoken</th>
                  <th class="width_25">Written</th>
                  <th class="width_25">Reading</th>
              </tr>
               @foreach($language_infos as $language_info)
              <tr>
                <td class="width_25">{{$language_info->language}}</td>
                <td class="width_25">{{$language_info->language_spoken_type}}</td>
                <td class="width_25">{{$language_info->language_writting_type}}</td>
                <td class="width_25">{{$language_info->language_reading_type}}</td>
              </tr>
              @endforeach
          </table>

        @foreach($project_infos as $project_info)
     <h2 class="">Project/Work Information</h2>
          <table>
              <tr>
                  <th class="width_33">Project/Work Name</th>
                  <th class="width_33">Discription</th>
                  <th class="width_33">Link</th>
              </tr>
              @foreach($project_infos as $project_info)
              <tr>
                <td class="width_33">{{$project_info->project_name}}</td>
                <td class="width_33">{{$project_info->project_discription}}</td>
                <td class="width_33"><a target="_blank" href="{{ route('external_link',['name' => $project_info->project_link]) }}">{{$project_info->project_link}}</a></td>
              </tr>
              @endforeach
          </table>
       @php  break; @endphp
       @endforeach
  
       @foreach($ref_infos as $ref_info)
       <h2 class="">Reference Information</h2>
          <table>
              <tr>
                  <th class="width_20">Name</th>
                  <th class="width_20">Designation</th>
                  <th class="width_20">Relation Ship</th>
                  <th class="width_20">Phone</th>
                  <th class="width_20">Email</th>
              </tr>
               @foreach($ref_infos as $ref_info)
               <tr>
                 <td class="width_20">{{$ref_info->ref_name}}</td>
                 <td class="width_20">{{$ref_info->ref_designation}}</td>
                 <td class="width_20">{{$ref_info->ref_relationship}}</td>
                 <td class="width_20">{{$ref_info->ref_phone}}</td>
                 <td class="width_20">{{$ref_info->ref_email}}</td>
               </tr>
               @endforeach
          </table>
       @php break; @endphp
       @endforeach

</body>
</html>