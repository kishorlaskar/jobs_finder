<?php

namespace App\Http\Controllers;
use App\Submit_Job;
use App\Job_Requirments;
use App\Job_Description;
use App\Educational_requirments;
use App\Other_Benifits;
use App\Job_Sources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class submit_job_controller extends Controller
{
    public function submit_job(Request $request){
        $input_designation_id;
        $session_username=$request->session()->get('jobholder_username');
    	$array=array(); $array1=array();$array2=array();$array3=array();$array4=array();$array5=array();
    	date_default_timezone_set("Asia/Dhaka");
        $input_designation=$request->job_designation;
        $job_designation=DB::table('job_designation')->where('designation_name',$input_designation)->first();
        if (!empty($job_designation)) {
            $input_designation_id=$job_designation->id;
        }
        else{
            DB::table('job_designation')->insert( ['designation_name' => $input_designation]);
            $job_designation2=DB::table('job_designation')->where('designation_name',$input_designation)->first();
             $input_designation_id=$job_designation2->id;
        }
    	 $array['client_user_name']=$session_username;
    	 $array['company_email']=$request->company_email;
    	 $array['job_designation_id']=$input_designation_id;
    	 $array['number_of_vacancies']=$request->number_of_vacancies;
         $array['avilability_day']=$request->avilability_day;
         $avilability_day=$request->avilability_day;
    	 $array['deadline']=date('Y-m-d', strtotime(date('Y-m-d'). ' + '.$avilability_day.' days'));
    	 $array['candidate_min_age']=$request->candidate_age;
    	 $array['job_type']=$request->job_type;
    	 $array['salary_range']=$request->salary_range;
         $array['experience_of_years']=$request->experience_of_years;
    	 $array['published_on']=date('Y-m-d');
         $job_requirments=$request->job_jequirments;
    	 $job_descriptions=$request->job_description;
    	 $educational_requirments=$request->educational_requirment;
    	 $other_benifits=$request->other_benifits;
    	 $job_sources=$request->job_source;
    	
    	$create_education= Submit_Job::create($array);
    	 if ($create_education) {
    	 	$job_id = Submit_Job::where($array)->first()->id;
    	 	 foreach ($job_requirments as $job_requirment) {
                if ($job_requirment != '') {
                   Job_Requirments::create(['job_id' => $job_id,'job_requirment_name'=>$job_requirment]);
                }
    	 	 	 
    	 	 }
    	 	 foreach ($job_descriptions as $job_description) {
                if ($job_description !='') {
                    Job_Description::create(['job_id' => $job_id,'job_description_details'=>$job_description]);
                }
    	 	 	 
    	 	 }
    	 	 foreach ($educational_requirments as $educational_requirment) {
                if ($educational_requirment != '') {
                    Educational_requirments::create(['job_id' => $job_id,'education_requirment_name'=>$educational_requirment]);
                }
    	 	 	
    	 	 }
    	 	 foreach ($other_benifits as $other_benifit) {
                if ($other_benifit !='') {
                   Other_Benifits::create(['job_id' => $job_id,'other_benifit_name'=>$other_benifit]);
                }
    	 	 	 
    	 	 }
    	 	 foreach ($job_sources as $job_source) {
                if ($job_source != '') {
                     Job_Sources::create(['job_id' => $job_id,'job_source_name'=>$job_source]);
                }
    	 	 	
    	 	 }
    	 	return redirect('job_list')->with('success','Your Job Post Is Successfully Complete !!');
    	 	

                }
                else{return redirect()->back()->with('error','There Have Error..Pleaze Try Again !!'); }

              }

 public function update_job_post(Request $request){

         $input_designation_id;
           $session_username=$request->session()->get('jobholder_username');
              $array=array(); $array1=array();$array2=array();$array3=array();$array4=array();$array5=array();
              $input_designation=$request->job_designation;
            $job_designation=DB::table('job_designation')->where('designation_name',$input_designation)->first();
        if (!empty($job_designation)) {
            $input_designation_id=$job_designation->id;
        }
        else{
            DB::table('job_designation')->insert( ['designation_name' => $input_designation]);
            $job_designation2=DB::table('job_designation')->where('designation_name',$input_designation)->first();
             $input_designation_id=$job_designation2->id;
        }
         $job_id=$request->job_id;
        $user = Submit_Job::where('id',$job_id)->first();
        if ($user) {

        $user->client_user_name=$session_username; 
        $user->company_email=$request->company_email;
        $user->job_designation_id=$input_designation_id;
        $user->number_of_vacancies=$request->number_of_vacancies;
        $user->avilability_day=$request->avilability_day;
        $user->candidate_min_age=$request->candidate_age;
        $user->job_type=$request->job_type;
        $user->salary_range=$request->salary_range;
        $user->experience_of_years=$request->experience_of_years;
        $update_job_info=  $user->save();
        if ($update_job_info) {
            $delete_job_requirments = Job_Requirments::where('job_id', '=', $request->job_id)->delete();
        $delete_job_descriptions = Job_Description::where('job_id', '=', $request->job_id)->delete();
        $delete_educational_requirments = Educational_requirments::where('job_id', '=', $request->job_id)->delete();
        $delete_other_benifits = Other_Benifits::where('job_id', '=', $request->job_id)->delete();
        $delete_job_sources = Job_Sources::where('job_id', '=', $request->job_id)->delete();

         $job_requirments=$request->job_jequirments;
         $job_descriptions=$request->job_description;
         $educational_requirments=$request->educational_requirment;
         $other_benifits=$request->other_benifits;
         $job_sources=$request->job_source;

             foreach ($job_requirments as $job_requirment) {
                if ($job_requirment != '') {
                   Job_Requirments::create(['job_id' => $job_id,'job_requirment_name'=>$job_requirment]);
                }
                 
             }
             foreach ($job_descriptions as $job_description) {
                if ($job_description !='') {
                    Job_Description::create(['job_id' => $job_id,'job_description_details'=>$job_description]);
                }
                 
             }
             foreach ($educational_requirments as $educational_requirment) {
                if ($educational_requirment != '') {
                    Educational_requirments::create(['job_id' => $job_id,'education_requirment_name'=>$educational_requirment]);
                }
                
             }
             foreach ($other_benifits as $other_benifit) {
                if ($other_benifit !='') {
                   Other_Benifits::create(['job_id' => $job_id,'other_benifit_name'=>$other_benifit]);
                }
                 
             }
             foreach ($job_sources as $job_source) {
                if ($job_source != '') {
                     Job_Sources::create(['job_id' => $job_id,'job_source_name'=>$job_source]);
                }
                
             }
             //return redirect()->route('job_list')->with('success','Your Job Post Is Successfully Complete !!');
            return redirect('job_list')->with('success','Your Job Post Is Successfully Update !!');
        }
        
            
                else{return redirect()->back()->with('error','There Have Error..Pleaze Try Again !!'); }
            }
            //insert job in job_info table and delete from archive_job table....
            else{
                  

         $array['id']=$job_id;
         $array['client_user_name']=$session_username;
         $array['company_email']=$request->company_email;
         $array['job_designation_id']=$input_designation_id;
         $array['number_of_vacancies']=$request->number_of_vacancies;
         $array['avilability_day']=$request->avilability_day;
         $avilability_day=$request->avilability_day;
         $array['deadline']=date('Y-m-d', strtotime(date('Y-m-d'). ' + '.$avilability_day.' days'));
         $array['candidate_min_age']=$request->candidate_age;
         $array['job_type']=$request->job_type;
         $array['salary_range']=$request->salary_range;
         $array['experience_of_years']=$request->experience_of_years;
         $array['published_on']=date('Y-m-d');
         $job_requirments=$request->job_jequirments;
         $job_descriptions=$request->job_description;
         $educational_requirments=$request->educational_requirment;
         $other_benifits=$request->other_benifits;
         $job_sources=$request->job_source;
        
        $create_education= Submit_Job::create($array);
         if ($create_education) {
            $job_id = Submit_Job::where($array)->first()->id;
             foreach ($job_requirments as $job_requirment) {
                if ($job_requirment != '') {
                   Job_Requirments::create(['job_id' => $job_id,'job_requirment_name'=>$job_requirment]);
                }
                 
             }
             foreach ($job_descriptions as $job_description) {
                if ($job_description !='') {
                    Job_Description::create(['job_id' => $job_id,'job_description_details'=>$job_description]);
                }
                 
             }
             foreach ($educational_requirments as $educational_requirment) {
                if ($educational_requirment != '') {
                    Educational_requirments::create(['job_id' => $job_id,'education_requirment_name'=>$educational_requirment]);
                }
                
             }
             foreach ($other_benifits as $other_benifit) {
                if ($other_benifit !='') {
                   Other_Benifits::create(['job_id' => $job_id,'other_benifit_name'=>$other_benifit]);
                }
                 
             }
             foreach ($job_sources as $job_source) {
                if ($job_source != '') {
                     Job_Sources::create(['job_id' => $job_id,'job_source_name'=>$job_source]);
                }
                
             }
             DB::table('job_archive')->where('job_id',$job_id)->delete();
            return redirect('job_list')->with('success','Your Job Post Is Successfully Complete !!');
            

                }
                else{return redirect()->back()->with('error','There Have Error..Pleaze Try Again !!'); }



            }

              }
          
         

      

    }

