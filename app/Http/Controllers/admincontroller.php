<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class admincontroller extends Controller
{
    public function admin_dashboard(){
    	return view('admin.dashboard');
    }

    public function user_profile(){
    	return view('admin.user');
    }

   public function candidate_list(){
        $candidate_lists = DB::table('jobseeker_info')->orderby('id','DESC')->paginate(20);
      	return view('admin.candidate_list',compact('candidate_lists',$candidate_lists));
   }

   public function jobholder_list(){
   	$jobholder_lists = DB::table('jobholder_info')->orderby('id','DESC')->paginate(20);
      	return view('admin.jobholder_list',compact('jobholder_lists',$jobholder_lists));
   }

   public function job_list(){
   	$job_lists = DB::table('job_info')->join('job_designation','job_designation.id','job_info.job_designation_id')->join('jobholder_info','job_info.client_user_name','jobholder_info.username')->orderby('job_info.id','DESC')->select('job_info.*','jobholder_info.company_name','job_designation.designation_name')->paginate(20);
     return view('admin.job_list',compact('job_lists',$job_lists));
   }

   public function manage_job(){
    $industry_types = DB::table('industry_types')->orderby('id','DESC')->paginate(20);
        return view('admin.manage_job',compact('industry_types',$industry_types));
   }
   
   public function job_designation(){
      $job_designations = DB::table('job_designation')->orderby('id','DESC')->paginate(20);
        return view('admin.job_designation',compact('job_designations',$job_designations));
   }

   public function job_type(){
     $job_types = DB::table('job_types')->orderby('id','DESC')->paginate(20);
        return view('admin.job_type',compact('job_types',$job_types));
   }

   public function skill_test(){
    $skill_tests = DB::table('skill_test')->orderby('id','DESC')->paginate(20);
   	return view('admin.skill_test',compact('skill_tests',$skill_tests));
   }

   public function live_contest(){
   	return view('admin.live_contest');
   }

   public function notifications(){
   	return view('admin.notifications');
   }
}
