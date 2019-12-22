<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Mycontroller extends Controller
{
     public function show_exam_paper($subject_name)
    {
         return view('contest.exam_paper')->with('subject_name' ,$subject_name);
    }
    public function trial_exam_paper($year,$subject_name,Request $request)
    {
        $session_email=$request->session()->get('jobseeker_email');
         $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail',  $session_email)->first();
         return view('contest.trial_exam')->with('year', $year)->with('subject_name' ,$subject_name)->with('candidate_info',$candidate_info);
    }
    public function get_exam_result(Request $request)
    {
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
        $exist_subject=DB::table('live_contest_result')->where('jobseekeremail',$session_email)->where('subject_id',$subject_id)->exists();
        if ($exist_subject !=1) {
         DB::table('live_contest_result')->insert(['jobseekeremail' => $session_email, 'subject_id' => $subject_id, 'subject_name'=>$subject_name,'result'=>($count_correct_answer*10)]);
        }
        else{
          DB::table('live_contest_result')->where('jobseekeremail','=',$session_email)->where('subject_id','=',$subject_id)->update(['result'=>($count_correct_answer*10)]);
        }
        
      return view('contest.result')->with('count_correct_answer',$count_correct_answer)->with('candidate_info',$candidate_info);
    }
    public function trial_result(Request $request){
         $data= $request->all();
      $count_correct_answer=0;
       foreach ($data as $key => $value) {
          if($value!='on'){
         $count_correct_answer++;
           }
          }
          $count_correct_answer=$count_correct_answer-2;
         $session_email=$request->session()->get('jobseeker_email');
       $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail',  $session_email)->first();      
      return view('contest.result')->with('count_correct_answer',$count_correct_answer)->with('candidate_info',$candidate_info);
    }
}
