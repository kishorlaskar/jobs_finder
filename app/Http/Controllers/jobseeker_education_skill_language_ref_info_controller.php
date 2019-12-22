<?php

namespace App\Http\Controllers;
use App\Education_Info;
use App\Skill_Info;
use App\Lannguage_Info;
use App\Ref_Info;
use App\Project_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class jobseeker_education_skill_language_ref_info_controller extends Controller
{
 
    public function update_jobseeker_education_info(Request $request){
            $session_email=$request->session()->get('jobseeker_email');
        $candidate_id = DB::table('jobseeker_info')->where('jobseekeremail', $session_email)->value('id');
            $input=$request->form; 
            $i=0; $array=array(); $array2=array(); $array3=array();$lastcharecters=array(); 
             $new_create_row=0; $total_row=0; $user='';$create_education=false;
            $row_count=$request->row_count; 
           foreach ($input as $key) {
                   $array[$key['name']]=$key['value'];  
                   if (substr($key['name'], 0,-1) == 'id') {
                      $lastcharecters[]=(int)substr($key['name'], -1);
                    } 
                   }
                        
              $total_row = (count($input)-2) / 6;       
                $new_create_row=(int)$total_row-$row_count;
                //update ..........only...
      if ($row_count > 0 && $new_create_row==0) { 
            for($j=1; $j <= $row_count; $j++ ) { 
              $user = Education_Info::where('id',$array['id'.$j])->first();
                      $user->education_title=$array['education_title'.$j];    
                      $user->education_major=$array['education_major'.$j];    
                      $user->education_institute_name=$array['education_institute_name'.$j];    
                      $user->education_result=$array['education_result'.$j];    
                      $user->passing_year=$array['passing_year'.$j];        
                       $update_education=  $user->save();
                           $user=''; 
                }
                if ($update_education) {
                  return 'update_education_info';
                }
                else{ return 'not_update_education_info' ; }
              
      }
      
      //.........create new row with update.........
      elseif ($row_count > 0 && $new_create_row > 0) { 
         //...for update...............
         for($j=1; $j <= $row_count; $j++ ) { 
              $user = Education_Info::where('id',$array['id'.$j])->first();
                      $user->education_title=$array['education_title'.$j];    
                      $user->education_major=$array['education_major'.$j];    
                      $user->education_institute_name=$array['education_institute_name'.$j];    
                      $user->education_result=$array['education_result'.$j];    
                      $user->passing_year=$array['passing_year'.$j];        
                        $update_education = $user->save();
                           $user=''; 
                } 
             //........for create.......
                for($i=1; $i <= $new_create_row; $i++ ) {
                  if (!empty($array['education_title'.$lastcharecters[$j-1]]) && !empty($array['education_major'.$lastcharecters[$j-1]]) && !empty($array['education_institute_name'.$lastcharecters[$j-1]])) {
                   $array3['jobseeker_id']= $candidate_id;
                   $array3['education_title']=$array['education_title'.$lastcharecters[$j-1]];
                    $array3['education_major']=$array['education_major'.$lastcharecters[$j-1]];
                   $array3['education_institute_name']=$array['education_institute_name'.$lastcharecters[$j-1]];
                   $array3['education_result']=$array['education_result'.$lastcharecters[$j-1]];
                   $array3['passing_year']=$array['passing_year'.$lastcharecters[$j-1]];
                      
              $create_education= Education_Info::create($array3);
            }
               $j++; 
                }
                if ($create_education && $update_education ) {
                  return 'update_and_create_education_info';
                }
                elseif($update_education ){return 'update_education_info';}
                 else{ return 'not_update_and_create_education_info' ; }
               
      }
      //.........create new row.........
      else{   
          for($i=1; $i <= $new_create_row; $i++ ) {
            if (!empty($array['education_title'.$lastcharecters[$i-1]]) && !empty($array['education_major'.$lastcharecters[$i-1]]) && !empty($array['education_institute_name'.$lastcharecters[$i-1]])) {
                   $array3['jobseeker_id']= $candidate_id;
                   $array3['education_title']=$array['education_title'.$lastcharecters[$i-1]];
                    $array3['education_major']=$array['education_major'.$lastcharecters[$i-1]];
                   $array3['education_institute_name']=$array['education_institute_name'.$lastcharecters[$i-1]];
                   $array3['education_result']=$array['education_result'.$lastcharecters[$i-1]];
                   $array3['passing_year']=$array['passing_year'.$lastcharecters[$i-1]];      
              $create_education= Education_Info::create($array3);
                 }
                }
                if ($create_education) {
                   return 'create_education_info';
                }
                else{ return 'not_create_education_info' ; }
              } 
    }
    //.....for skill...................
    public function update_jobseeker_skill_info(Request $request){
       $session_email=$request->session()->get('jobseeker_email');
        $candidate_id = DB::table('jobseeker_info')->where('jobseekeremail', $session_email)->value('id');
            $input=$request->form; 
            $i=0; $array=array(); $array2=array(); $array3=array(); $lastcharecters=array(); 
             $new_create_row=0; $total_row=0; $user=''; $create_skill=false;
            $row_count=$request->row_count; 
           foreach ($input as $key) {
                   $array[$key['name']]=$key['value']; 
                   if (substr($key['name'], 0,-1) == 'id') {
                      $lastcharecters[]=(int)substr($key['name'], -1);
                    }   
                   }       
              $total_row = (count($input)-2) / 4;       
                $new_create_row=(int)$total_row-$row_count;
      if ($row_count > 0 && $new_create_row==0) { 
            for($j=1; $j <= $row_count; $j++ ) { 
              $user = Skill_Info::where('id',$array['id'.$j])->first();
                      $user->skill=$array['skill'.$j];    
                      $user->skill_experiance=$array['skill_experiance'.$j];    
                      $user->skill_proficency=$array['skill_proficency'.$j]; 
                   $update_skill=  $user->save();
                           $user=''; 
                }
                if ($update_skill) {
                  return 'update_skill_info';
                }
                else{ return 'not_update_skill_info' ; }
      }
      
      //.........create new row with update.........
      elseif ($row_count > 0 && $new_create_row > 0) { 
         //...for update...............
         for($j=1; $j <= $row_count; $j++ ) { 
               $user = Skill_Info::where('id',$array['id'.$j])->first();
                      $user->skill=$array['skill'.$j];    
                      $user->skill_experiance=$array['skill_experiance'.$j];    
                      $user->skill_proficency=$array['skill_proficency'.$j]; 
                       $update_skill = $user->save();
                           $user=''; 
                } 
             //........for create.......
                for($i=1; $i <= $new_create_row; $i++ ) {
                  if (!empty($array['skill'.$lastcharecters[$j-1]]) && !empty($array['skill_experiance'.$lastcharecters[$j-1]]) ) { 
                   $array3['jobseeker_id']=$candidate_id;
                   $array3['skill']=$array['skill'.$lastcharecters[$j-1]];
                    $array3['skill_experiance']=$array['skill_experiance'.$lastcharecters[$j-1]];
                   $array3['skill_proficency']=$array['skill_proficency'.$lastcharecters[$j-1]];   
               $create_skill= Skill_Info::create($array3);
             }
                   $j++;     
                 
                }
                if ($create_skill && $update_skill ) {
                  return 'update_and_create_skill_info';
                }
                elseif ($update_skill ) { return 'update_skill_info';  }
                 else{ return 'not_update_and_create_skill_info' ; }
      }
      //.........create new row.........
      else{   
          for($i=1; $i <= $new_create_row; $i++ ) {
            if(!empty($array['skill'.$lastcharecters[$i-1]]) || !empty($array['skill_experiance'.$lastcharecters[$i-1]]) || !empty($array['skill_proficency'.$lastcharecters[$i-1]]) ){
                   $array3['jobseeker_id']=$candidate_id;
                   $array3['skill']=$array['skill'.$lastcharecters[$i-1]];
                    $array3['skill_experiance']=$array['skill_experiance'.$lastcharecters[$i-1]];
                   $array3['skill_proficency']=$array['skill_proficency'.$lastcharecters[$i-1]];      
               $create_skill= Skill_Info::create($array3);
                  }
                }
                if ($create_skill) {
                   return 'create_skill_info';
                }
                else{ return 'not_create_skill_info' ; }
              }
    }
      //.....for language...................
    public function update_jobseeker_language_info(Request $request){
      $session_email=$request->session()->get('jobseeker_email');
        $candidate_id = DB::table('jobseeker_info')->where('jobseekeremail', $session_email)->value('id');
     $input=$request->form; 
            $i=0; $array=array(); $array2=array(); $array3=array();$lastcharecters=array();  
             $new_create_row=0; $total_row=0; $user=''; $create_language=false;
            $row_count=$request->row_count; 
           foreach ($input as $key) {
                   $array[$key['name']]=$key['value'];   
                   if (substr($key['name'], 0,-1) == 'id') {
                      $lastcharecters[]=(int)substr($key['name'], -1);
                    } 
                   }       
              $total_row = (count($input)-2) / 5;       
                $new_create_row=(int)$total_row-$row_count;
      if ($row_count > 0 && $new_create_row==0) { 
            for($j=1; $j <= $row_count; $j++ ) { 
              $user = Lannguage_Info::where('id',$array['id'.$j])->first();
                      $user->language=$array['language'.$j];    
                      $user->language_spoken_type=$array['language_spoken_type'.$j];    
                      $user->language_writting_type=$array['language_writting_type'.$j]; 
                      $user->language_reading_type=$array['language_reading_type'.$j]; 
                       $update_language=  $user->save();
                           $user=''; 
                }
                if ($update_language) {
                  return 'update_language_info';
                }
                else{ return 'not_update_language_info' ; }
      }
      
      //.........create new row with update.........
          elseif ($row_count > 0 && $new_create_row > 0) { 
         //...for update...............
         for($j=1; $j <= $row_count; $j++ ) { 
              $user = Lannguage_Info::where('id',$array['id'.$j])->first();
                      $user->language=$array['language'.$j];    
                      $user->language_spoken_type=$array['language_spoken_type'.$j];    
                      $user->language_writting_type=$array['language_writting_type'.$j]; 
                      $user->language_reading_type=$array['language_reading_type'.$j]; 
                        $update_language=$user->save();
                           $user=''; 
                }
               
             //........for create.......
                for($i=1; $i <= $new_create_row; $i++ ) {
                  if(!empty($array['language'.$lastcharecters[$j-1]])){
                   $array3['jobseeker_id']=$candidate_id;
                   $array3['language']=$array['language'.$lastcharecters[$j-1]];
                    $array3['language_spoken_type']=$array['language_spoken_type'.$lastcharecters[$j-1]];
                   $array3['language_writting_type']=$array['language_writting_type'.$lastcharecters[$j-1]];  
                   $array3['language_reading_type']=$array['language_reading_type'.$lastcharecters[$j-1]];      
                   $create_language= Lannguage_Info::create($array3);
                 }
                    $j++;
                }
                if ($create_language && $update_language) {
                   return 'create_and_update_language_info';
                }
                elseif($update_language){ return 'update_language_info';}
                else{ return 'not_create_and_update_language_info' ; }
      }
      //.........create new row.........
      else{   
          for($i=1; $i <= $new_create_row; $i++ ) {
            if(!empty($array['language'.$lastcharecters[$i-1]])){
                   $array3['jobseeker_id']=$candidate_id;
                   $array3['language']=$array['language'.$lastcharecters[$i-1]];
                    $array3['language_spoken_type']=$array['language_spoken_type'.$lastcharecters[$i-1]];;
                   $array3['language_writting_type']=$array['language_writting_type'.$lastcharecters[$i-1]];      
                   $array3['language_reading_type']=$array['language_reading_type'.$lastcharecters[$i-1]];      
               $create_language= Lannguage_Info::create($array3);
                  }
                }
                if ($create_language) {
                   return 'create_language_info';
                }
                else{ return 'not_create_language_info' ; }
              }
    }
  //.....for ref...................
    public function update_jobseeker_ref_info(Request $request){
            $session_email=$request->session()->get('jobseeker_email');
        $candidate_id = DB::table('jobseeker_info')->where('jobseekeremail', $session_email)->value('id');
            $input=$request->form; 
            $i=0; $array=array(); $array2=array(); $array3=array();$lastcharecters=array();  
             $new_create_row=0; $total_row=0; $user=''; $create_ref=false;
            $row_count=$request->row_count; 
           foreach ($input as $key) {
                   $array[$key['name']]=$key['value']; 
                   if (substr($key['name'], 0,-1) == 'id') {
                      $lastcharecters[]=(int)substr($key['name'], -1);
                    }   
                   }       
              $total_row = (count($input)-2) / 6;       
                $new_create_row=(int)$total_row-$row_count;
      if ($row_count > 0 && $new_create_row==0) { 
            for($j=1; $j <= $row_count; $j++ ) { 
              $user = Ref_Info::where('id',$array['id'.$j])->first();
                      $user->ref_name=$array['ref_name'.$j];    
                      $user->ref_designation=$array['ref_designation'.$j];    
                      $user->ref_relationship=$array['ref_relationship'.$j]; 
                      $user->ref_phone=$array['ref_phone'.$j]; 
                      $user->ref_email=$array['ref_email'.$j]; 
                      $update_ref= $user->save();
                           $user=''; 
                }
                if ($update_ref) {
                   return 'update_ref_info';
                }
                else{ return 'not_update_ref_info' ; }
      }
      
      //.........create new row with update.........
      elseif ($row_count > 0 && $new_create_row > 0) { 
         //...for update...............
         for($j=1; $j <= $row_count; $j++ ) { 
              $user = Ref_Info::where('id',$array['id'.$j])->first();
                      $user->ref_name=$array['ref_name'.$j];    
                      $user->ref_designation=$array['ref_designation'.$j];    
                      $user->ref_relationship=$array['ref_relationship'.$j]; 
                      $user->ref_phone=$array['ref_phone'.$j]; 
                      $user->ref_email=$array['ref_email'.$j]; 
                      $update_ref= $user->save();
                           $user=''; 
                }
             //........for create.......
                for($i=1; $i <= $new_create_row; $i++ ) {
                  if(!empty($array['ref_name'.$lastcharecters[$j-1]]) && !empty($array['ref_designation'.$lastcharecters[$j-1]])){
                   $array3['jobseeker_id']=$candidate_id;
                   $array3['ref_name']=$array['ref_name'.$lastcharecters[$j-1]];
                    $array3['ref_designation']=$array['ref_designation'.$lastcharecters[$j-1]];
                   $array3['ref_relationship']=$array['ref_relationship'.$lastcharecters[$j-1]];   
                   $array3['ref_phone']=$array['ref_phone'.$lastcharecters[$j-1]];   
                   $array3['ref_email']=$array['ref_email'.$lastcharecters[$j-1]]; 
                  $create_ref= Ref_Info::create($array3);
                }
                 $j++; 
                }
                if ($update_ref && $create_ref) {
                   return 'create_and_update_ref_info';
                }
                elseif($update_ref){return 'update_ref_info';}
                else{ return 'not_create_and_update_ref_info' ; }
      }
      //.........create new row.........
      else{   
          for($i=1; $i <= $new_create_row; $i++ ) {
            if(!empty($array['ref_name'.$lastcharecters[$i-1]]) && !empty($array['ref_designation'.$lastcharecters[$i-1]])){
                   $array3['jobseeker_id']=$candidate_id;
                   $array3['ref_name']=$array['ref_name'.$lastcharecters[$i-1]];
                    $array3['ref_designation']=$array['ref_designation'.$lastcharecters[$i-1]];
                   $array3['ref_relationship']=$array['ref_relationship'.$lastcharecters[$i-1]];      
                   $array3['ref_phone']=$array['ref_phone'.$lastcharecters[$i-1]];      
                   $array3['ref_email']=$array['ref_email'.$lastcharecters[$i-1]];      
              $create_ref= Ref_Info::create($array3);
                  }
                }
                 if ($create_ref) {
                   return 'create_ref_info';
                }
                else{ return 'not_create_ref_info' ; }
              }
    }

    //For Project.................
    public function update_jobseeker_project_info(Request $request){
            $session_email=$request->session()->get('jobseeker_email');
        $candidate_id = DB::table('jobseeker_info')->where('jobseekeremail', $session_email)->value('id');
            $input=$request->form; 
            $i=0; $array=array(); $array2=array(); $array3=array();$lastcharecters=array();  
             $new_create_row=0; $total_row=0; $user=''; $create_ref=false;
           $row_count=$request->row_count; 
           foreach ($input as $key) {
                   $array[$key['name']]=$key['value']; 
                   if (substr($key['name'], 0,-1) == 'id') {
                      $lastcharecters[]=(int)substr($key['name'], -1);
                    }   
                   }       
             $total_row = (count($input)-2) / 4;       
               $new_create_row=(int)$total_row-$row_count;
                //...For Only Update..........
      if ($row_count > 0 && $new_create_row==0) { 
            for($j=1; $j <= $row_count; $j++ ) { 
              $user = Project_Info::where('id',$array['id'.$j])->first();
                      $user->project_name=$array['project_name'.$j];    
                      $user->project_discription=$array['project_discription'.$j];    
                      $user->project_link=$array['project_link'.$j]; 
                       $update_language=  $user->save();
                           $user=''; 
                }
                if ($update_language) {
                   return 'update_project_info';
                }
                else{ return 'not_update_project_info' ; }
      }
      
      //.........create new row with update.........
      elseif ($row_count > 0 && $new_create_row > 0) { 
         //...for update...............
         for($j=1; $j <= $row_count; $j++ ) { 
              $user = Project_Info::where('id',$array['id'.$j])->first();
                      $user->project_name=$array['project_name'.$j];    
                      $user->project_discription=$array['project_discription'.$j];    
                      $user->project_link=$array['project_link'.$j]; 
                       $update_language=  $user->save();
                           $user='';
                }
             //........for create.......
                for($i=1; $i <= $new_create_row; $i++ ) {
                  if(!empty($array['project_name'.$lastcharecters[$j-1]]) && !empty($array['project_discription'.$lastcharecters[$j-1]]) && !empty($array['project_link'.$lastcharecters[$j-1]])){
                   $array3['jobseeker_id']=$candidate_id;
                   $array3['project_name']=$array['project_name'.$lastcharecters[$j-1]];
                    $array3['project_discription']=$array['project_discription'.$lastcharecters[$j-1]];
                   $array3['project_link']=$array['project_link'.$lastcharecters[$j-1]];   
                  $create_language= Project_Info::create($array3);
                }
                 $j++; 
                }
                if ($update_language && $create_language) {
                   return 'create_and_update_project_info';
                }
                elseif($update_language){return 'update_project_info';}
                else{ return 'not_create_and_update_project_info' ; }
      }
      //.........create only new row.........
      else{   
          for($i=1; $i <= $new_create_row; $i++ ) {
            if(!empty($array['project_name'.$lastcharecters[$i-1]]) && !empty($array['project_discription'.$lastcharecters[$i-1]]) && !empty($array['project_link'.$lastcharecters[$i-1]])){
                   $array3['jobseeker_id']=$candidate_id;
                   $array3['project_name']=$array['project_name'.$lastcharecters[$i-1]];
                    $array3['project_discription']=$array['project_discription'.$lastcharecters[$i-1]];
                   $array3['project_link']=$array['project_link'.$lastcharecters[$i-1]];        
              $create_ref= Project_Info::create($array3);
                  }
                }
                 if ($create_ref) {
                   return 'create_project_info';
                }
                else{ return 'not_create_project_info' ; }
              }

    }
    
}
