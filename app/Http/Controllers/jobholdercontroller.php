<?php
 
namespace App\Http\Controllers;
use App\Candidate;
use App\Education_Info;
use App\Skill_Info;
use App\Lannguage_Info;
use App\Ref_Info;
use App\Project_Info;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class jobholdercontroller extends Controller
{

  public function jobholder_home(Request $request){
    $session_username=$request->session()->get('jobholder_username');
   /* $apply_candidate_infos =DB::table('jobseeker_info')->join('candidate_applying_job','jobseeker_info.jobseekeremail','=','candidate_applying_job.jobseekeremail')->where('candidate_applying_job.job_id',$job_id)->orderBy('candidate_applying_job.jobholder_see_or_not','DESC')->orderBy('candidate_applying_job.apply_date','ASC')->orderBy('candidate_applying_job.apply_time','ASC')->get(['jobseeker_info.jobseekeremail as candidate_email','jobseeker_info.id as candidate_id','jobseeker_info.firstname as first_name','jobseeker_info.lastname as last_name','jobseeker_info.candidate_image as image_path','candidate_applying_job.id as apply_job_id','present_address']);*/

    $all_recomonded_candidate_lists= DB::table('job_info')
                       ->where('job_info.client_user_name',$session_username)
                       ->join('job_designation','job_designation.id','job_info.job_designation_id')
                       ->join('recomonded_designation','recomonded_designation.designation_id','job_designation.id')
                       ->join('jobseeker_info','jobseeker_info.jobseekeremail','recomonded_designation.jobseekeremail')
                       ->get(['jobseeker_info.jobseekeremail as candidate_email','jobseeker_info.id as candidate_id','jobseeker_info.firstname as first_name','jobseeker_info.lastname as last_name','jobseeker_info.candidate_image as image_path','jobseeker_info.present_address']);

    return view('jobholder_home',compact('all_recomonded_candidate_lists'));
  }
    public function job_list(Request $request)
    {
      $session_username=$request->session()->get('jobholder_username');
      $JobList='';$JobHolderInfo='';$CompanyTypes='';$Jobcounts='';
       $archive_job_years=DB::table('job_archive')->where('client_user_name',$session_username)->distinct()->get(['year']);
      // return dd($archive_job_lists);
      $JobList = DB::table('job_designation')->join('job_info','job_designation.id', '=', 'job_info.job_designation_id')->where('client_user_name', $session_username)->paginate(5);
      $job_designations = DB::table('recomonded_designation')->get();
    	if($JobList->isNotEmpty())
            {
              $JobHolderInfo = DB::table('jobholder_info')->where('username', $session_username)->first();
            $CompanyTypes = DB::table('jobholder_industry_type')->where('jobholder_username', $session_username)->get(['industry_type']);
    	      $Jobcounts = DB::table('candidate_applying_job')->select('job_id')->get();
              return view('job_list',compact('JobList','JobHolderInfo','CompanyTypes','Jobcounts','job_designations','archive_job_years'));
             }
      else{
          	return view('job_list',compact('JobList','JobHolderInfo','CompanyTypes','Jobcounts','job_designations','archive_job_years'));
           }
    	
    }

    public function archive_job(Request $request, $year){
      $session_username=$request->session()->get('jobholder_username');
      $JobList='';$JobHolderInfo='';$CompanyTypes='';$Jobcounts='';
       $archive_job_years=DB::table('job_archive')->where('client_user_name',$session_username)->distinct()->get(['year']);
      // return dd($archive_job_lists);
      $JobList = DB::table('job_designation')
                ->join('job_archive','job_designation.id', '=', 'job_archive.job_designation_id')
                ->where('client_user_name', $session_username)
                ->where('year',$year)
                ->select('job_designation.designation_name','job_archive.job_type','job_archive.job_designation_id','job_archive.job_id as id')
                ->paginate(5);
      $job_designations = DB::table('recomonded_designation')->get();
      if($JobList->isNotEmpty())
            {
              $JobHolderInfo = DB::table('jobholder_info')->where('username', $session_username)->first();
            $CompanyTypes = DB::table('jobholder_industry_type')->where('jobholder_username', $session_username)->get(['industry_type']);
            $Jobcounts = DB::table('candidate_applying_job')->select('job_id')->get();
              return view('archive_job_list',compact('JobList','JobHolderInfo','CompanyTypes','Jobcounts','job_designations','archive_job_years'));
             }
      else{
            return view('archive_job_list',compact('JobList','JobHolderInfo','CompanyTypes','Jobcounts','job_designations','archive_job_years'));
           }
    }

    public function edit_job($job_id){
      $JobInfo = DB::table('job_designation')->join('job_info','job_designation.id', '=', 'job_info.job_designation_id')->where('job_info.id', $job_id)->first();
       $educational_requirments = DB::table('educational_requirments')->where('job_id', $job_id)->get();
       $job_description = DB::table('job_description')->where('job_id', $job_id)->get();
       $job_requirments = DB::table('job_requirments')->where('job_id', $job_id)->get();
       $job_sources = DB::table('job_sources')->where('job_id', $job_id)->get();
       $other_benifits = DB::table('other_benifits')->where('job_id', $job_id)->get();
          return view('edit_job',compact('JobInfo','educational_requirments','job_description','job_requirments','job_sources','other_benifits'));
    }

    public function archive_edit_job($job_id){
      $JobInfo = DB::table('job_designation')->join('job_archive','job_designation.id', '=', 'job_archive.job_designation_id')->where('job_archive.job_id', $job_id)->first();
       $educational_requirments = DB::table('educational_requirments')->where('job_id', $job_id)->get();
       $job_description = DB::table('job_description')->where('job_id', $job_id)->get();
       $job_requirments = DB::table('job_requirments')->where('job_id', $job_id)->get();
       $job_sources = DB::table('job_sources')->where('job_id', $job_id)->get();
       $other_benifits = DB::table('other_benifits')->where('job_id', $job_id)->get();
          return view('edit_job',compact('JobInfo','educational_requirments','job_description','job_requirments','job_sources','other_benifits'));
    }
    public function delete_job($job_id_for_delete){
        $delete_job_info= DB::table('job_info')->where('id', $job_id_for_delete)->delete(); 
        if ($delete_job_info) {
        	$delete_educational_requirments= DB::table('educational_requirments')->where('job_id', $job_id_for_delete)->delete();
        $delete_job_description= DB::table('job_description')->where('job_id', $job_id_for_delete)->delete();
        $delete_job_requirments= DB::table('job_requirments')->where('job_id', $job_id_for_delete)->delete();
        $delete_job_sources= DB::table('job_sources')->where('job_id', $job_id_for_delete)->delete();
        $delete_other_benifits= DB::table('other_benifits')->where('job_id', $job_id_for_delete)->delete();
          return redirect()->back()->with('success','Your Job Post Is Successfully Deleted !!');
        }
        else{
         return redirect()->back()->with('error','There Have Error..Pleaze Try Again !!');
        }
       
    }

    public function archive_delete_job($job_id_for_delete){
        $delete_job_info= DB::table('job_archive')->where('job_id', $job_id_for_delete)->delete(); 
        if ($delete_job_info) {
          $delete_educational_requirments= DB::table('educational_requirments')->where('job_id', $job_id_for_delete)->delete();
        $delete_job_description= DB::table('job_description')->where('job_id', $job_id_for_delete)->delete();
        $delete_job_requirments= DB::table('job_requirments')->where('job_id', $job_id_for_delete)->delete();
        $delete_job_sources= DB::table('job_sources')->where('job_id', $job_id_for_delete)->delete();
        $delete_other_benifits= DB::table('other_benifits')->where('job_id', $job_id_for_delete)->delete();
          return redirect()->back()->with('success','Your Job Post Is Successfully Deleted !!');
        }
        else{
         return redirect()->back()->with('error','There Have Error..Pleaze Try Again !!');
        }
       
    }

    public function view_job_details($job_id_for_view){
      $session_username=session()->get('jobholder_username');
    	 $job_id=$job_id_for_view;
    	 $CompanyInfo = DB::table('jobholder_info')->where('username', $session_username)->first();
       $JobInfo = DB::table('job_designation')->join('job_info','job_designation.id', '=', 'job_info.job_designation_id')->where('job_info.id', $job_id)->first();
       $educational_requirments = DB::table('educational_requirments')->where('job_id', $job_id)->get();
       $job_description = DB::table('job_description')->where('job_id', $job_id)->get();
       $job_requirments = DB::table('job_requirments')->where('job_id', $job_id)->get();
       $job_sources = DB::table('job_sources')->where('job_id', $job_id)->get();
       $other_benifits = DB::table('other_benifits')->where('job_id', $job_id)->get();
       return view('job_details',compact('CompanyInfo','JobInfo','educational_requirments','job_description','job_requirments','job_sources','other_benifits'));

    }

    public function archive_view_job_details($job_id_for_view){
      $session_username=session()->get('jobholder_username');
       $job_id=$job_id_for_view;
       $CompanyInfo = DB::table('jobholder_info')->where('username', $session_username)->first();
       $JobInfo = DB::table('job_designation')->join('job_archive','job_designation.id', '=', 'job_archive.job_designation_id')->where('job_archive.job_id', $job_id)->first();
       $educational_requirments = DB::table('educational_requirments')->where('job_id', $job_id)->get();
       $job_description = DB::table('job_description')->where('job_id', $job_id)->get();
       $job_requirments = DB::table('job_requirments')->where('job_id', $job_id)->get();
       $job_sources = DB::table('job_sources')->where('job_id', $job_id)->get();
       $other_benifits = DB::table('other_benifits')->where('job_id', $job_id)->get();
       return view('job_details',compact('CompanyInfo','JobInfo','educational_requirments','job_description','job_requirments','job_sources','other_benifits'));

    }

    public function recomondation_candidate_lists($recomondation_id){

      //here will be order by live result and skill result..........
      $recomondate_candidate_infos =DB::table('jobseeker_info')->join('recomonded_designation','jobseeker_info.jobseekeremail','=','recomonded_designation.jobseekeremail')->where('recomonded_designation.designation_id',$recomondation_id)->get(['jobseeker_info.jobseekeremail as candidate_email','jobseeker_info.id as candidate_id','jobseeker_info.firstname as first_name','jobseeker_info.lastname as last_name','jobseeker_info.candidate_image as image_path','recomonded_designation.id as apply_job_id','jobseeker_info.present_address']);

      $apply_candidate_infos = $recomondate_candidate_infos;
       
        return view('apply_candidate_list',compact('apply_candidate_infos'));
    }

    public function apply_candidate_list($job_id){
      $apply_candidate_infos =DB::table('jobseeker_info')->join('candidate_applying_job','jobseeker_info.jobseekeremail','=','candidate_applying_job.jobseekeremail')->where('candidate_applying_job.job_id',$job_id)->orderBy('candidate_applying_job.jobholder_see_or_not','DESC')->orderBy('candidate_applying_job.apply_date','ASC')->orderBy('candidate_applying_job.apply_time','ASC')->get(['jobseeker_info.jobseekeremail as candidate_email','jobseeker_info.id as candidate_id','jobseeker_info.firstname as first_name','jobseeker_info.lastname as last_name','jobseeker_info.candidate_image as image_path','candidate_applying_job.id as apply_job_id','jobseeker_info.present_address']);
       
        return view('apply_candidate_list',compact('apply_candidate_infos'));
    }

    public function view_apply_candidate_info(Request $request){
        $jobseekeremail = $request->input('jobseekeremail');
         $apply_job_id = $request->input('apply_job_id');

       $candidate_info = Candidate::where('jobseekeremail',$jobseekeremail)->first();
       $education_infos = Education_Info::where('jobseeker_id',$candidate_info->id)->get();
       $skill_infos = Skill_Info::where('jobseeker_id',$candidate_info->id)->get();
       $language_infos = Lannguage_Info::where('jobseeker_id',$candidate_info->id)->get();
       $ref_infos = Ref_Info::where('jobseeker_id',$candidate_info->id)->get();
       $project_infos = Project_Info::where('jobseeker_id',$candidate_info->id)->get();
       $skill_test_results=DB::table('skill_test_result')->where('jobseekeremail','=',$jobseekeremail)->get();
      $live_contest_results=DB::table('live_contest_result')->where('jobseekeremail','=',$jobseekeremail)->get(); 
      $transcriptions=DB::table('academic_transcription')->where('candidate_email',$jobseekeremail)->get();
      return view('general_cv',compact('candidate_info','education_infos','skill_infos','language_infos','ref_infos','project_infos','skill_test_results','live_contest_results','transcriptions'));
    }

    public function Download_candidate_cv(Request $request){

          $candidate_email =$request->input('candidate_email');
         // $session_email=$request->session()->get('jobseeker_email');
          $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail',  $candidate_email)->first();
         $education_infos=DB::table('education_info')->where('jobseeker_id',$candidate_info->id)->get();
         $skill_infos = DB::table('skill_info')->where('jobseeker_id',$candidate_info->id)->get();
         $language_infos = DB::table('language_info')->where('jobseeker_id',$candidate_info->id)->get();
         $ref_infos = DB::table('ref_info')->where('jobseeker_id',$candidate_info->id)->get();
         $project_infos = DB::table('project_info')->where('jobseeker_id',$candidate_info->id)->get();

          $pdf = PDF::loadView('general_cv_download_pdf',compact('candidate_info','education_infos','skill_infos','language_infos','ref_infos','project_infos'));
          return $pdf->download('general_cv.pdf');
    }
    public function external_link($external_link){
    	$url="http://".$external_link;
    	return Redirect::to($url);
    }
}
