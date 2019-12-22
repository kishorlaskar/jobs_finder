<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PDF;
class testcontroller extends Controller
{
    public function test(Request $request){

    /*$pdf = PDF::loadView('general_cv_download_pdf')->save('Temporary_save_candidate_cv_folder/general_cv.pdf');
    return 'hiiiiiiiiiiii';*/ 

    $session_email=$request->session()->get('jobseeker_email');
   $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail',  $session_email)->first();
   $education_infos=DB::table('education_info')->where('jobseeker_id',$candidate_info->id)->get();
   $skill_infos = DB::table('skill_info')->where('jobseeker_id',$candidate_info->id)->get();
   $language_infos = DB::table('language_info')->where('jobseeker_id',$candidate_info->id)->get();
   $ref_infos = DB::table('ref_info')->where('jobseeker_id',$candidate_info->id)->get();
   $project_infos = DB::table('project_info')->where('jobseeker_id',$candidate_info->id)->get();
    $pdf = PDF::loadView('general_cv_download_pdf',compact('candidate_info','education_infos','skill_infos','language_infos','ref_infos','project_infos'));
    //$pdf = PDF::loadView('general_cv_download_pdf');
    return $pdf->download('general_cv.pdf');
 


}
}
