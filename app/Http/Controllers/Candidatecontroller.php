<?php

namespace App\Http\Controllers;
use File;
use Mail;
use PDF;
use App\Candidate;
use App\Education_Info;
use App\Skill_Info;
use App\Lannguage_Info;
use App\Ref_Info;
use App\Project_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
 use Illuminate\Support\Facades\Session;
 use Illuminate\Support\Facades\Storage;
class Candidatecontroller extends Controller
{

  public function update_candidate_profile(Request $request){
    $designation_names=DB::table('job_designation')->get();
     $session_email=$request->session()->get('jobseeker_email');
     $existing_designation_names=DB::table('recomonded_designation')->where('jobseekeremail', $session_email)->get();
    return view('update_candidate_profile',compact('designation_names','existing_designation_names'));
  }

  public function submit_recomonded_designation(Request $request){
    $success;
    $designation_names=$request->designation_name;
    $session_email=$request->session()->get('jobseeker_email');
    DB::table('recomonded_designation')->where('jobseekeremail', $session_email)->delete();
    if (!empty( $designation_names)) {
      foreach ($designation_names as $designation_name) {
        $success= DB::table('recomonded_designation')->insert( ['jobseekeremail' => $session_email, 'designation_id' => $designation_name] );
       } 
       if ( $success == true) {
         return redirect()->back()->with('success', 'Your Recomondation Is Successful !!');
       }
       else{
        return redirect()->back()->with('error', 'Your Recomondation Is Not Successful !!');
       }
    }
    else{
       return redirect()->back()->with('error', 'Your Recomondation Is Null !!');
    }
  
    
  }


  public function candidate_cv(Request $request){
    $session_email=$request->session()->get('jobseeker_email');
    $candidate_info = Candidate::where('jobseekeremail',$session_email)->first();
   $education_infos = Education_Info::where('jobseeker_id',$candidate_info->id)->get();
   $skill_infos = Skill_Info::where('jobseeker_id',$candidate_info->id)->get();
   $language_infos = Lannguage_Info::where('jobseeker_id',$candidate_info->id)->get();
   $ref_infos = Ref_Info::where('jobseeker_id',$candidate_info->id)->get();
   $project_infos = Project_info::where('jobseeker_id',$candidate_info->id)->get();
   $skill_test_results=DB::table('skill_test_result')->where('jobseekeremail','=',$session_email)->get();
   $live_contest_results=DB::table('live_contest_result')->where('jobseekeremail','=',$session_email)->get();
    return view('candidate_cv',compact('candidate_info','education_infos','skill_infos','language_infos','ref_infos','project_infos','skill_test_results','live_contest_results'));
  }

  public function acdemic_transcript_info(Request $request){
    $session_email=$request->session()->get('jobseeker_email');
    $candidate_info = Candidate::where('jobseekeremail',$session_email)->first();
    $transcriptions=DB::table('academic_transcription')->where('candidate_email',$session_email)->get();
    return view('acdemic_transcript_info',compact('candidate_info','transcriptions'));
  }

  public function submit_transcripttion(Request $request){
    $session_email=$request->session()->get('jobseeker_email');
     $transcript_name=$request->input('transcript_name');
     $transcript_file_ext=$request->transcript_file->getClientOriginalExtension();;
     $exist=DB::table('academic_transcription')->where('candidate_email',$session_email)->where('transcription_name',$transcript_name)->first();
     if ($exist === null) {
       $file_upload_successful=$request->transcript_file->storeAs('public/uploaded_candidate_file',$session_email.'_'.$transcript_name.'.'.$transcript_file_ext);
    if ( $file_upload_successful == true) {
         DB::table('academic_transcription')->insert(['candidate_email'=>$session_email,'transcription_name'=>$transcript_name,'transcript_file_ext'=>$transcript_file_ext]);
         return redirect()->back()->with('success', 'Your Transcription Is Successfully Upload !!');
       }
       else{
        return redirect()->back()->with('error', 'Your Transcription Is Not Successfully Upload !!');
       }
     }
     else{
        return redirect()->back()->with('error', 'This Transcription Is Already Exist !!');
     }
     

  }

  public function delete_transcription(Request $request, $id){
     $session_email=$request->session()->get('jobseeker_email');
    $transcription=DB::table('academic_transcription')->where('id',$id)->first();
    $path='storage/uploaded_candidate_file/'.$session_email.'_'.$transcription->transcription_name.'.'.$transcription->transcript_file_ext;
    File::delete(public_path($path));
    $delete=DB::table('academic_transcription')->where('id',$id)->delete();
    if ($delete) {
      
      return redirect()->back()->with('success','Transcription Is Successfully delete !!');
    }
    else{
        return redirect()->back()->with('error', 'This Transcription Is Not Delete !!');
     }
    
  }

  public function project_work(Request $request){
    $session_email=$request->session()->get('jobseeker_email');
    $candidate_info = Candidate::where('jobseekeremail',$session_email)->first();
   $education_infos = Education_Info::where('jobseeker_id',$candidate_info->id)->get();
   $skill_infos = Skill_Info::where('jobseeker_id',$candidate_info->id)->get();
   $language_infos = Lannguage_Info::where('jobseeker_id',$candidate_info->id)->get();
   $ref_infos = Ref_Info::where('jobseeker_id',$candidate_info->id)->get();
   $project_infos = Project_info::where('jobseeker_id',$candidate_info->id)->get();
   $skill_test_results=DB::table('skill_test_result')->where('jobseekeremail','=',$session_email)->get();
   $live_contest_results=DB::table('live_contest_result')->where('jobseekeremail','=',$session_email)->get();
    return view('project_work_info',compact('candidate_info','education_infos','skill_infos','language_infos','ref_infos','project_infos','skill_test_results','live_contest_results'));
  }

  public function skill_test_result_info(Request $request){
    $session_email=$request->session()->get('jobseeker_email');
    $candidate_info = Candidate::where('jobseekeremail',$session_email)->first();
   $education_infos = Education_Info::where('jobseeker_id',$candidate_info->id)->get();
   $skill_infos = Skill_Info::where('jobseeker_id',$candidate_info->id)->get();
   $language_infos = Lannguage_Info::where('jobseeker_id',$candidate_info->id)->get();
   $ref_infos = Ref_Info::where('jobseeker_id',$candidate_info->id)->get();
   $project_infos = Project_info::where('jobseeker_id',$candidate_info->id)->get();
   $skill_test_results=DB::table('skill_test_result')->where('jobseekeremail','=',$session_email)->get();
   $live_contest_results=DB::table('live_contest_result')->where('jobseekeremail','=',$session_email)->get();
    return view('skill_test_result_info',compact('candidate_info','education_infos','skill_infos','language_infos','ref_infos','project_infos','skill_test_results','live_contest_results'));
  }
   public function update_candidate_personal(Request $request){
        $session_email=$request->session()->get('jobseeker_email');
        $input=$request->form;
    	  $i=0;
       
    	 $user = Candidate::where('jobseekeremail', $session_email)->first();
    	 foreach ($input as $data) {
    	 	if ($i != 0) {
          $attribute_name=$data['name'];
           $user->$attribute_name=$data['value'];
    	 	} 
    	  $i++;
        }	
                 // $user->firstname='anik';

    	 if ($user->save()) {
    	 	return 'confirm';
    	 }
    	 else return 'not confirm';
    }
    public function submit_candidate_image(Request $request){
          if ($request->hasFile('candidate_image'))     
            $image_size=$request->candidate_image->getClientSize();
          //  $image_size=$request->candidate_image->getClientOriginalExtension();
            $session_email=$request->session()->get('jobseeker_email');
            if ($image_size <=2000000) {
             $image_upload_successful=$request->candidate_image->storeAs('public/uploaded_candidate_image',$session_email.'.jpg');
                $user = Candidate::where('jobseekeremail',$session_email)->first();
                $user->candidate_image=$image_upload_successful;
                $upload_message = $user->save();
            }
            else{return 'Image size More than 2MB';} 
           if ($upload_message) {
              //return '<img src="storage/uploaded_candidate_image/'.$candidate_email.'.jpg">';
            return redirect('candidate_home');
           }
           else return 'Have Error,Try Again !!';
          
          
    }

    public function side_search_with_parametar($job_titles='',$job_city='',$industry=''){
       if(empty($job_titles) && empty($job_city) && empty($industry)){
         $JobLists = DB::table('job_designation')->join('job_info','job_designation.id', '=', 'job_info.job_designation_id')->orderBy('published_on', 'desc')->paginate(5);
     }
     elseif(!empty($job_titles) && !empty($job_city) && !empty($industry)){
          $JobLists = DB::table('job_designation')
                    ->join('job_info','job_designation.id', 'job_info.job_designation_id')
                    ->whereIn('job_info.job_designation_id',$job_titles)
                    ->join('jobholder_info','jobholder_info.username','job_info.client_user_name')
                    ->Where(function ($query) use($job_city) {
                      for ($i = 0; $i < count($job_city); $i++){
                         $query->orwhere('jobholder_info.company_city', 'like',  '%' . $job_city[$i] .'%');
                      }      
                     })
                     ->join('jobholder_industry_type','jobholder_industry_type.jobholder_username','jobholder_info.username')
                     ->whereIn('jobholder_industry_type.industry_type',$industry)
                    ->select('job_designation.designation_name','job_info.client_user_name','job_info.job_type','job_info.id')
                    ->orderBy('published_on', 'desc')
                    ->paginate(5);
     
        }  
    elseif(!empty($job_titles) && !empty($job_city)){
          $JobLists = DB::table('job_designation')
                    ->join('job_info','job_designation.id', 'job_info.job_designation_id')
                    ->whereIn('job_info.job_designation_id',$job_titles)
                    ->join('jobholder_info','jobholder_info.username','job_info.client_user_name')
                    ->Where(function ($query) use($job_city) {
                      for ($i = 0; $i < count($job_city); $i++){
                        $query->orwhere('jobholder_info.company_city', 'like',  '%' . $job_city[$i] .'%');
                      }      
                    })
                    ->select('job_designation.designation_name','job_info.client_user_name','job_info.job_type','job_info.id')
                    ->orderBy('published_on', 'desc')
                    ->paginate(5);
        } 
    elseif(!empty($job_city) && !empty($industry)){
      $JobLists = DB::table('job_designation')
                  ->join('job_info','job_designation.id', 'job_info.job_designation_id')
                  ->join('jobholder_info','jobholder_info.username','job_info.client_user_name')
                  ->Where(function ($query) use($job_city) {
                    for ($i = 0; $i < count($job_city); $i++){
                      $query->orwhere('jobholder_info.company_city', 'like',  '%' . $job_city[$i] .'%');
                    }      
                  })
                  ->join('jobholder_industry_type','jobholder_industry_type.jobholder_username','jobholder_info.username')
                  ->whereIn('jobholder_industry_type.industry_type',$industry)
                  ->select('job_designation.designation_name','job_info.client_user_name','job_info.job_type','job_info.id')
                  ->orderBy('published_on', 'desc')
                  ->paginate(5);
        }
     elseif(!empty($job_titles) && !empty($industry)){
      $JobLists = DB::table('job_designation')
                ->join('job_info','job_designation.id', 'job_info.job_designation_id')
                ->whereIn('job_info.job_designation_id',$job_titles)
                ->join('jobholder_industry_type','jobholder_industry_type.jobholder_username','job_info.client_user_name')
                ->whereIn('jobholder_industry_type.industry_type',$industry)
                ->select('job_designation.designation_name','job_info.client_user_name','job_info.job_type','job_info.id')
                ->orderBy('published_on', 'desc')
                ->paginate(5);
        }
      elseif(!empty($job_titles)){
          $JobLists = DB::table('job_designation')
                    ->join('job_info','job_designation.id', 'job_info.job_designation_id')
                    ->whereIn('job_info.job_designation_id',$job_titles)
                    ->select('job_designation.designation_name','job_info.client_user_name','job_info.job_type','job_info.id')
                    ->orderBy('published_on', 'desc')
                    ->paginate(5);
            }
      elseif(!empty($job_city)){
              $JobLists = DB::table('job_designation')
                        ->join('job_info','job_designation.id', 'job_info.job_designation_id')
                        ->join('jobholder_info','jobholder_info.username','job_info.client_user_name')
                        ->Where(function ($query) use($job_city) {
                          for ($i = 0; $i < count($job_city); $i++){
                             $query->orwhere('jobholder_info.company_city', 'like',  '%' . $job_city[$i] .'%');
                          }      
                         })
                        ->select('job_designation.designation_name','job_info.client_user_name','job_info.job_type','job_info.id')
                        ->orderBy('published_on', 'desc')
                        ->paginate(5);
         
            } 
      else{
            $JobLists = DB::table('job_designation')
                        ->join('job_info','job_designation.id', 'job_info.job_designation_id')
                         ->join('jobholder_industry_type','jobholder_industry_type.jobholder_username','job_info.client_user_name')
                         ->whereIn('jobholder_industry_type.industry_type',$industry)
                        ->select('job_designation.designation_name','job_info.client_user_name','job_info.job_type','job_info.id')
                        ->orderBy('published_on', 'desc')
                        ->paginate(5);
         
            }
            return $JobLists;
    }

    public function all_job_list(Request $request){
      $session_email=$request->session()->get('jobseeker_email');
        $JobLists='';$JobholderInfo_CompanyTypes='';
        $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail', $session_email)->first();

        $job_designation_id=DB::table('job_info')->get(['job_designation_id']);
        $city_id=DB::table('job_info')->join('jobholder_info','job_info.client_user_name','jobholder_info.username')->join('company_city','company_city.city_name','like','jobholder_info.company_city')->get(['company_city.id','company_city.city_name']);
        $industry_name=DB::table('job_info')->join('jobholder_industry_type','jobholder_industry_type.jobholder_username','job_info.client_user_name')->get(['jobholder_industry_type.industry_type']);

        $job_designation=DB::table('job_designation')->get();
        $city=DB::table('company_city')->get();
        $industry=DB::table('industry_types')->get();
        // return dd($city_id);

       $JobLists = DB::table('job_designation')->join('job_info','job_designation.id', '=', 'job_info.job_designation_id')->orderBy('published_on', 'desc')->paginate(5);
        if($JobLists->isNotEmpty())
            {
             $JobholderInfo_CompanyTypes=DB::table('jobholder_info')->join('jobholder_industry_type','jobholder_info.username','=','jobholder_industry_type.jobholder_username')->select('jobholder_info.username','jobholder_info.company_name','jobholder_info.company_area','jobholder_info.company_city','jobholder_info.company_country','jobholder_industry_type.industry_type')->get();

              return view('candidate_job_list',compact('candidate_info','JobholderInfo_CompanyTypes','JobLists','job_designation','job_designation_id','city','city_id','industry','industry_name'));
             }
             else{
               return view('candidate_job_list',compact('candidate_info','JobholderInfo_CompanyTypes','JobLists','job_designation','job_designation_id','city','city_id','industry','industry_name'));
            
             }
    }

    public function side_search(Request $request){
      $query='';$JobLists='';$JobholderInfo_CompanyTypes='';
      $job_titles= $request->input('job_titles'); 
      $job_city= $request->input('job_city');
     $industry= $request->input('industry');
     
    $candidatecontroller = new Candidatecontroller();
    $JobLists= $candidatecontroller->side_search_with_parametar($job_titles,$job_city,$industry);
      

     $session_email=$request->session()->get('jobseeker_email');
     $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail', $session_email)->first();

     $job_designation_id=DB::table('job_info')->get(['job_designation_id']);
     $city_id=DB::table('job_info')->join('jobholder_info','job_info.client_user_name','jobholder_info.username')->join('company_city','company_city.city_name','like','jobholder_info.company_city')->get(['company_city.id','company_city.city_name']);
     $industry_name=DB::table('job_info')->join('jobholder_industry_type','jobholder_industry_type.jobholder_username','job_info.client_user_name')->get(['jobholder_industry_type.industry_type']);

     $job_designation=DB::table('job_designation')->get();
     $city=DB::table('company_city')->get();
     $industry=DB::table('industry_types')->get();

     if(!empty($JobLists))
         {
          $JobholderInfo_CompanyTypes=DB::table('jobholder_info')->join('jobholder_industry_type','jobholder_info.username','=','jobholder_industry_type.jobholder_username')->select('jobholder_info.username','jobholder_info.company_name','jobholder_info.company_area','jobholder_info.company_city','jobholder_info.company_country','jobholder_industry_type.industry_type')->get();

           return view('candidate_job_list',compact('candidate_info','JobholderInfo_CompanyTypes','JobLists','job_designation','job_designation_id','city','city_id','industry','industry_name'));
          }
          else{
            return view('candidate_job_list',compact('candidate_info','JobholderInfo_CompanyTypes','JobLists','job_designation','job_designation_id','city','city_id','industry','industry_name'));
         
          }
          
    }

    public function skill_test(Request $request){
       $session_email=$request->session()->get('jobseeker_email');
       $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail',  $session_email)->first();
        $test_lists=DB::table('skill_test')->get();
    return view('skill_test')->with('candidate_info',$candidate_info)->with('test_lists',$test_lists);
    }
    public function question_paper($test_id,Request $request){
       $session_email=$request->session()->get('jobseeker_email');
      $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail',  $session_email)->first();
      $question_paper_details=DB::table('skill_test')->where('id',$test_id)->first();
    return view('question_paper')->with('candidate_info',$candidate_info)->with('question_paper_details',$question_paper_details);
    }

    public function skill_test_result(Request $request){
       $data= $request->all();
       $subject_name=$request->subject_name;
       $subject_id=$request->subject_id;
       $session_email=$request->session()->get('jobseeker_email');
       $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail',  $session_email)->first();
      $count_correct_answer=0;
       foreach ($data as $key => $value) {
          if($value!='on'){
         $count_correct_answer++;
           }
          }
          $count_correct_answer=$count_correct_answer-4;
        $session_email=$request->session()->get('jobseeker_email');
        $exist_subject=DB::table('skill_test_result')->where('jobseekeremail','=',$session_email)->where('subject_id','=',$subject_id)->exists();
        if ($exist_subject !=1) {
         DB::table('skill_test_result')->insert(['jobseekeremail' => $session_email, 'subject_id' => $subject_id, 'subject_name'=>$subject_name,'result'=>($count_correct_answer*10)]);
        }
        else{
          DB::table('skill_test_result')->where('jobseekeremail','=',$session_email)->where('subject_id','=',$subject_id)->update(['result'=>($count_correct_answer*10)]);
        }
        
      return view('skill_test_result')->with('count_correct_answer',$count_correct_answer)->with('candidate_info',$candidate_info);
    }

    public function view_job_details($job_id_for_view,Request $request){
    $session_email=$request->session()->get('jobseeker_email'); 
      $job_id=$job_id_for_view;
       $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail',$session_email)->first();
       $JobInfo = DB::table('job_designation')->join('job_info','job_designation.id', '=', 'job_info.job_designation_id')->where('job_info.id', $job_id)->first();
       $CompanyInfo = DB::table('jobholder_info')->where('username',$JobInfo->client_user_name)->first(['business_description','company_name','company_area','company_city','company_country','contact_person_email','website_address','contact_person_phone']);
       $educational_requirments = DB::table('educational_requirments')->where('job_id', $job_id)->get();
       $job_description = DB::table('job_description')->where('job_id', $job_id)->get();
       $job_requirments = DB::table('job_requirments')->where('job_id', $job_id)->get();
       $job_sources = DB::table('job_sources')->where('job_id', $job_id)->get();
       $other_benifits = DB::table('other_benifits')->where('job_id', $job_id)->get();
       return view('job_details',compact('candidate_info','CompanyInfo','JobInfo','educational_requirments','job_description','job_requirments','job_sources','other_benifits'));
    }

  public function apply_job($job_id_for_apply,Request $request){
      $session_email=$request->session()->get('jobseeker_email');
      $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail', $session_email)->first();
      $education_infos = Education_Info::where('jobseeker_id',$candidate_info->id)->get();
      $skill_infos = Skill_Info::where('jobseeker_id',$candidate_info->id)->get();
      $language_infos = Lannguage_Info::where('jobseeker_id',$candidate_info->id)->get();
      $ref_infos = Ref_Info::where('jobseeker_id',$candidate_info->id)->get();
      $project_infos = Project_Info::where('jobseeker_id',$candidate_info->id)->get();
      $job_id=$job_id_for_apply;
      $CompanyEmail=DB::table('job_info')->where('id', $job_id)->select('company_email')->get();
      $exist=DB::table('candidate_applying_job')->where(['jobseekeremail' => $session_email, 'job_id' => $job_id])->exists();
        if (!$exist) {

           //PDF File exist then delete it First................
          if (file_exists(public_path('Temporary_save_candidate_cv_folder/'.$session_email.'.pdf'))) {
            File::delete(public_path('Temporary_save_candidate_cv_folder/'.$session_email.'.pdf'));
          }
          //Generate PDF inside public/Temporary_save_candidate_cv_folder Folder...
          $pdf = PDF::loadView('general_cv_download_pdf',compact('candidate_info','education_infos','skill_infos','language_infos','project_infos','ref_infos'))->save('Temporary_save_candidate_cv_folder/'.$session_email.'.pdf');
         $data=[
                  //'email'=>$CompanyEmail,
                  'email'=>'mokbulhossain098@gmail.com',
                  'CandidateName' =>  $candidate_info->firstname.' '.$candidate_info->lastname,
                  'CandidateEmail' => $session_email,
                  
          ];
          Mail::send('viewmail',$data,function($message) use ($data,$session_email,$candidate_info){
            $message->from('mokbulhossain098@gmail.com', $candidate_info->firstname.' '.$candidate_info->lastname)->subject('CV');
            $message->to($data['email']);
            $message->attach('Temporary_save_candidate_cv_folder/'.$session_email.'.pdf');
          });

          File::delete(public_path('Temporary_save_candidate_cv_folder/'.$session_email.'.pdf'));
          //$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
          date_default_timezone_set('Asia/Dhaka');

        DB::table('candidate_applying_job')->insert(['jobseekeremail' => $session_email, 'job_id' => $job_id,'apply_date'=>date("Y-m-d"),'apply_time'=>date("H:i:s a")]);
         return redirect()->back()->with('success', 'This Job Is Apply !!');
      }
      else{
         return redirect()->back()->with('error','This Job Is Already Applied !!');
      }
     
    }

    public function applied_job_list(Request $request){
      $session_email=$request->session()->get('jobseeker_email');
        $JobLists='';$JobholderInfo_CompanyTypes='';
        $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail', $session_email)->first();
       $JobLists = DB::table('job_designation')->join('job_info','job_designation.id', '=', 'job_info.job_designation_id')->join('candidate_applying_job','job_info.id', '=', 'candidate_applying_job.job_id')->where('candidate_applying_job.jobseekeremail', '=',$session_email)->select('job_info.*','job_designation.designation_name')->paginate(5);
        if($JobLists->isNotEmpty())
            {
             $JobholderInfo_CompanyTypes=DB::table('jobholder_info')->join('jobholder_industry_type','jobholder_info.username','=','jobholder_industry_type.jobholder_username')->select('jobholder_info.username','jobholder_info.company_name','jobholder_info.company_area','jobholder_info.company_city','jobholder_info.company_country','jobholder_industry_type.industry_type')->get();

              return view('applied_job_list',compact('candidate_info','JobholderInfo_CompanyTypes','JobLists'));
             }
             else{
               return view('applied_job_list',compact('candidate_info','JobholderInfo_CompanyTypes','JobLists'));
            
             } 
    }

    public function external_link($external_link){
     $url="http://".$external_link;
      return Redirect::to($url);
    }

    public function general_cv(Request $request){
    $session_email=$request->session()->get('jobseeker_email');
   $candidate_info = Candidate::where('jobseekeremail',$session_email)->first();
   $education_infos = Education_Info::where('jobseeker_id',$candidate_info->id)->get();
   $skill_infos = Skill_Info::where('jobseeker_id',$candidate_info->id)->get();
   $language_infos = Lannguage_Info::where('jobseeker_id',$candidate_info->id)->get();
   $ref_infos = Ref_Info::where('jobseeker_id',$candidate_info->id)->get();
   $project_infos = Project_Info::where('jobseeker_id',$candidate_info->id)->get();
   $skill_test_results=DB::table('skill_test_result')->where('jobseekeremail','=',$session_email)->get();
   $live_contest_results=DB::table('live_contest_result')->where('jobseekeremail','=',$session_email)->get();
    return view('general_cv',compact('candidate_info','education_infos','skill_infos','language_infos','ref_infos','project_infos','skill_test_results','live_contest_results'));
    }
   
   public function view_feature_job_details($job_id_for_view,Request $request){ 
      $job_id=$job_id_for_view;
        $JobInfo = DB::table('job_designation')->join('job_info','job_designation.id', '=', 'job_info.job_designation_id')->where('job_info.id', $job_id)->first();
       $CompanyInfo = DB::table('jobholder_info')->where('username',$JobInfo->client_user_name)->first(['business_description','company_name','company_area','company_city','company_country','contact_person_email','website_address','contact_person_phone']);
       $educational_requirments = DB::table('educational_requirments')->where('job_id', $job_id)->get();
       $job_description = DB::table('job_description')->where('job_id', $job_id)->get();
       $job_requirments = DB::table('job_requirments')->where('job_id', $job_id)->get();
       $job_sources = DB::table('job_sources')->where('job_id', $job_id)->get();
       $other_benifits = DB::table('other_benifits')->where('job_id', $job_id)->get();
       return view('job_details',compact('CompanyInfo','JobInfo','educational_requirments','job_description','job_requirments','job_sources','other_benifits'));
   }

   //Message section.............................................
   public function messanger_data(Request $request){
    if (Session::has('jobseeker_email')) {
        
      $session_email=$request->session()->get('jobseeker_email');
      $reciver_info;
      
     $sender = DB::table('messanger')
                    ->where('receiver_username',$session_email)
                    ->where('receiver_type','candidate')
                    ->distinct()
                    ->select('sender_username')
                    ->get();


       $receiver = DB::table('messanger')
                    ->where([['sender_username',$session_email],['sender_type','candidate']])
                    ->distinct()
                    ->get(['receiver_username']);

          foreach ($sender as $value) {
            $data[]=$value->sender_username;
          }
          foreach ($receiver as $value) {
            $data[]=$value->receiver_username;
          }

      $sending_data = DB::table('jobholder_info')
                    ->whereIn('username',$data)
                    ->get(['username','company_name']);

          //return response($receiver);

      $data1 = DB::table('messanger')
            ->where('sender_username',$session_email)
            ->where('sender_type','candidate')
            ->Join('jobholder_info','messanger.receiver_username','jobholder_info.username')
            ->orderBy('messanger.sending_date','DESC')
            ->orderBy('messanger.sending_time','DESC')
            ->get(['messanger.message']);

      $data2 = DB::table('messanger')
            ->where('receiver_username',$session_email)
            ->where('receiver_type','candidate')
            ->Join('jobholder_info','messanger.sender_username','jobholder_info.username')
            ->orderBy('messanger.sending_date','DESC')
            ->orderBy('messanger.sending_time','DESC')
            ->get(['messanger.message']);

 
     return response()->json(["user_data"=>array_merge($data1->toArray(), $data2->toArray()),"sendind_data"=>$sending_data]);

   }
   elseif (Session::has('jobholder_username')) {
   $session_email=$request->session()->get('jobholder_username');
      $reciver_info;$data=array();
      
     $sender = DB::table('messanger')
                    ->where('receiver_username',$session_email)
                    ->where('receiver_type','job_holder')
                    ->distinct()
                    ->select('sender_username')
                    ->get();


       $receiver = DB::table('messanger')
                    ->where([['sender_username',$session_email],['sender_type','job_holder']])
                    ->distinct()
                    ->get(['receiver_username']);

          foreach ($sender as $value) {
            $data[]=$value->sender_username;
          }
          foreach ($receiver as $value) {
            $data[]=$value->receiver_username;
          }

          //return $data;

       $sending_data = DB::table('jobseeker_info')
                    ->whereIn('jobseekeremail',$data)
                    ->get(['jobseekeremail','firstname','lastname']);

          //return response($receiver);

      $data1 = DB::table('messanger')
            ->where('sender_username',$session_email)
            ->where('sender_type','job_holder')
            ->Join('jobseeker_info','messanger.receiver_username','jobseeker_info.jobseekeremail')
            ->orderBy('messanger.sending_date','DESC')
            ->orderBy('messanger.sending_time','DESC')
            ->get(['messanger.message']);

      $data2 = DB::table('messanger')
            ->where('receiver_username',$session_email)
            ->where('receiver_type','job_holder')
            ->Join('jobseeker_info','messanger.sender_username','jobseeker_info.jobseekeremail')
            ->orderBy('messanger.sending_date','DESC')
            ->orderBy('messanger.sending_time','DESC')
            ->get(['messanger.message']);

 
     return response()->json(["user_data"=>array_merge($data1->toArray(), $data2->toArray()),"sendind_data"=>$sending_data]);

   }
 }

 public function message_section(Request $request,$username){
   $session_username=$request->session()->get('jobseeker_email');
  
         $data1 = DB::table('messanger')
               ->where('sender_username',$username)
               ->where('receiver_username',$session_username)
               ->orwhere([['sender_username',$session_username],['receiver_username',$username]])
               ->orderBy('messanger.sending_date','ASC')
               ->orderBy('messanger.sending_time','ASC')
               ->get(['message']);

         $data2 = DB::table('messanger')
               ->where('sender_username',$session_username)
               ->where('receiver_username',$username)
               ->orderBy('messanger.sending_date','DESC')
               ->orderBy('messanger.sending_time','ASC')
               ->get(['message']);

        $request->session()->put('receiver_username',$username);       
     //return response()->json(["messaging_data"=>array_merge($data1->toArray())]);
     return response()->json(["messaging_data"=>$data1,"sending_data"=>$data2]);

 }

  public function jobholder_message_section(Request $request,$username){

   $session_username=$request->session()->get('jobholder_username');
  
         $data1 = DB::table('messanger')
               ->where('sender_username',$username)
               ->where('receiver_username',$session_username)
               ->orwhere([['sender_username',$session_username],['receiver_username',$username]])
               ->orderBy('messanger.sending_date','ASC')
               ->orderBy('messanger.sending_time','ASC')
               ->get(['message']);

         $data2 = DB::table('messanger')
               ->where('sender_username',$session_username)
               ->where('receiver_username',$username)
               ->orderBy('messanger.sending_date','DESC')
               ->orderBy('messanger.sending_time','ASC')
               ->get(['message']);

      $request->session()->put('receiver_username',$username);
     //return response()->json(["messaging_data"=>array_merge($data1->toArray())]);
     return response()->json(["messaging_data"=>$data1,"sending_data"=>$data2]);

 }

}
