<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function submit_message(Request $request){
    	$username=$request->session()->get('jobholder_username');
    	$receiver_username=$request->session()->get('receiver_username');
    	date_default_timezone_set("Asia/Dhaka");
      $message= $request->message;
      DB::table('messanger')
      ->insert(['sender_type'=>'job_holder','sender_username'=> $username,'receiver_type'=>'candidate','receiver_username'=>$receiver_username,'message'=>$message,'sending_date'=>date('Y-m-d'),'sending_time'=>date("H:i:s a")]);
    }

     public function candidate_submit_message(Request $request){
    	$username=$request->session()->get('jobseeker_email');
    	$receiver_username=$request->session()->get('receiver_username');
    	date_default_timezone_set("Asia/Dhaka");
      $message= $request->message;
      DB::table('messanger')
      ->insert(['sender_type'=>'candidate','sender_username'=> $username,'receiver_type'=>'job_holder','receiver_username'=>$receiver_username,'message'=>$message,'sending_date'=>date('Y-m-d'),'sending_time'=>date("H:i:s a")]);
    }
}
