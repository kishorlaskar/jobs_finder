<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;

class jobcontroller extends Controller
{
    public function index()
    {
        $current_date=Carbon::now()->toDateString();

       $all_jobs=DB::table('job_info')->where('deadline','<',$current_date)->get();
      // return dd($all_jobs);
       if ($all_jobs) {
          foreach ($all_jobs as $job_info) {
            //return $job_info->id;
             DB::table('job_archive')->insert([
                 'job_id' => $job_info->id,'client_user_name' => $job_info->client_user_name,
                 'company_email' => $job_info->company_email,'job_designation_id' => $job_info->job_designation_id,
                 'number_of_vacancies' => $job_info->number_of_vacancies,'avilability_day' => $job_info->avilability_day,
                 'candidate_min_age' => $job_info->candidate_min_age,'job_type' => $job_info->job_type,
                 'salary_range' => $job_info->salary_range,'experience_of_years' => $job_info->experience_of_years,
                 'published_on' => $job_info->published_on,'update_on' => $current_date,
                 'deadline' => $job_info->deadline,'year' => date('Y'),

             ]);
            DB::table('job_info')->where('id',$job_info->id)->delete();
          }
       }
     //return 'e';
        
     $JobLists='';$JobholderInfo_CompanyTypes='';
     $job_designation_id = DB::table('job_info')->get(['job_designation_id']);
     $job_designation = DB::table('job_designation')->get();
     $recomonded_designation = DB::table('recomonded_designation')->get();
     $job_types=DB::table('job_types')->get();
     $city=DB::table('company_city')->get();
     $company = DB::table('jobholder_info')->count();
     $candidate = DB::table('jobseeker_info')->count();
     $resume = DB::table('jobseeker_education_skill_language_ref_info')->distinct('jobseekeremail')->count('jobseekeremail');
     $JobLists = DB::table('job_designation')->join('job_info','job_designation.id', '=', 'job_info.job_designation_id')->paginate(5);
        if($JobLists->isNotEmpty())
            {
             $JobholderInfo_CompanyTypes=DB::table('jobholder_info')->join('jobholder_industry_type','jobholder_info.username','=','jobholder_industry_type.jobholder_username')->select('jobholder_info.username','jobholder_info.company_name','jobholder_info.company_area','jobholder_info.company_city','jobholder_info.company_country','jobholder_industry_type.industry_type')->get();

              return view('index',compact('JobholderInfo_CompanyTypes','JobLists','job_designation_id','job_designation','recomonded_designation','company','candidate','resume','job_types','city'));
             }
        else{
               return view('index',compact('JobholderInfo_CompanyTypes','JobLists','job_designation','job_designation_id','recomonded_designation','company','candidate','resume','job_types','city'));
            
             }
    }

    public function index_search(Request $request){

        $get_category=$request->input('search_category');
        $get_city=$request->input('city');
        $get_job_type=$request->input('job_type');
      
        $JobLists='';$JobholderInfo_CompanyTypes='';
        
        $job_designation_id = DB::table('job_info')->where('job_type','like','%'.$get_job_type.'%')->join('job_designation','job_designation.id','job_info.job_designation_id')->where('job_designation.designation_name','like','%'.$get_category.'%')->join('jobholder_info','jobholder_info.username','job_info.client_user_name')->get(['job_info.job_designation_id']);
       // return dd($job_designation_id);
     $job_designation = DB::table('job_designation')->get();
     $recomonded_designation = DB::table('jobseeker_info')->where('jobseeker_info.present_address','like','%'.$get_city.'%')->orwhere('jobseeker_info.permanent_address','like','%'.$get_city.'%')->join('recomonded_designation','recomonded_designation.jobseekeremail','jobseeker_info.jobseekeremail')->get(['recomonded_designation.designation_id']);

     $job_types=DB::table('job_types')->get();
     $city=DB::table('company_city')->get();
     $company = DB::table('jobholder_info')->count();
     $candidate = DB::table('jobseeker_info')->count();
     $resume = DB::table('jobseeker_education_skill_language_ref_info')->distinct('jobseekeremail')->count('jobseekeremail');
     //$JobLists = DB::table('job_designation')->join('job_info','job_designation.id', '=', 'job_info.job_designation_id')->paginate(50);

     $JobLists = DB::table('job_info')->where('job_info.job_type','like','%'.$get_job_type.'%')->join('jobholder_info','jobholder_info.username','job_info.client_user_name')->where('jobholder_info.company_city','like','%'.$get_city.'%')->join('job_designation','job_designation.id', '=', 'job_info.job_designation_id')->where('job_designation.designation_name','like','%'.$get_category.'%')->select('job_info.id','job_info.client_user_name','job_designation.designation_name','job_info.job_type')->paginate(50);

     //return dd($JobLists);
        if($JobLists->isNotEmpty())
            {
             $JobholderInfo_CompanyTypes=DB::table('jobholder_info')->join('jobholder_industry_type','jobholder_info.username','=','jobholder_industry_type.jobholder_username')->select('jobholder_info.username','jobholder_info.company_name','jobholder_info.company_area','jobholder_info.company_city','jobholder_info.company_country','jobholder_industry_type.industry_type')->get();

              return view('index',compact('JobholderInfo_CompanyTypes','JobLists','job_designation_id','job_designation','recomonded_designation','company','candidate','resume','job_types','city'));
             }
        else{
               return view('index',compact('JobholderInfo_CompanyTypes','JobLists','job_designation','job_designation_id','recomonded_designation','company','candidate','resume','job_types','city'));
            
             }
      
    }

    public function jobholder_registration()
    {
        $industry_types=DB::table('industry_types')->get();
        $industry_types_count = DB::table('industry_types')->count();
        return view('jobholder_registration',compact('industry_types',$industry_types,'industry_types_count',ceil($industry_types_count/3)));
        //return ceil($industry_types_count/3);
    }
     public function submit_jobholder_info(Request $request)
    {
        $input = $request->all();
        $password = Hash::make($request->input('password'));
         $insert_successful= DB::table('jobholder_info')->insert(
            ['username' => $input['username'],'password' => $password,'company_name' => $input['company_name'],'alternative_company_name' => $input['alternative_company_name'],'contact_person_designation' => $input['contact_person_designation'],'contact_person_phone' => $input['contact_person_phone'],'contact_person_email' => $input['contact_person_email'],'business_description' => $input['business_description'],'company_address' => $input['company_address'],'company_country' => $input['company_country'],'company_city' => $input['company_city'],'company_area' => $input['company_area'],'billing_address' => $input['billing_address'],'website_address' => $input['company_website']]
        );
         if($insert_successful==true){  
            foreach ($input['buisnesstype'] as $key => $value) {
                $industry_type= DB::table('jobholder_industry_type')->insert(
            ['industry_type' => $value,'jobholder_username'=>$input['username']] );
              }
               if($industry_type==true){
                 $id = DB::table('jobholder_info')->where('username',$input['username'])->first()->id;
                 $request->session()->put('jobholder_username',$input['username']);
                 $request->session()->put('jobholder_id',$id);
                 return view('jobholder_home')->with('successful_message','Your  Registration is Successful');
                //return "Your  Registration is Successful";
                 }
               else {return view('jobholder_registration')->with('error',"Your  Registration is Not Successful"); }  
            
             }
         else return view('jobholder_registration')->with('error',"Your  Registration is Not Successful"); 
       
    }
    
    public function jobseeker_registration()
    {
        return view('jobseeker_registration');
    }
    public function fetch()
    {
        return view('fetch');
    }
     public function submit_candidate_register_info(Request $request)
    {
       if($request->input('email')){
         $email = $request->input('email');  
         $pass=$request->input('password');
         $password = Hash::make($pass);
         $firstname = $request->input('firstname'); 
         $lastname = $request->input('lastname'); 
          $insert_successful= DB::table('jobseeker_info')->insert(
            ['jobseekeremail' => $email, 'firstname' => $firstname, 'lastname' => $lastname, 'jobseekerpassword' => $password ]
        );
        if($insert_successful==true){ 
          $id = DB::table('jobseeker_info')->where('jobseekeremail',$email)->first()->id;
            $request->session()->put('jobseeker_email',$email);     
            $request->session()->put('jobseeker_id',$id);     
           // $request->session()->put('jobseeker_id',$id);     
            return "Your Registration is Successful";
             }
         else return "Your  Registration is Not Successful"; 
       }
    }
    public function candidate_home(Request $request){
       $session_email=$request->session()->get('jobseeker_email');
        $JobLists='';$JobholderInfo_CompanyTypes='';
        $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail', $session_email)->first();

        $job_designation_id=DB::table('job_info')->get(['job_designation_id']);
        $city_id=DB::table('job_info')->join('jobholder_info','job_info.client_user_name','jobholder_info.username')->join('company_city','company_city.city_name','like','jobholder_info.company_city')->get(['company_city.id','company_city.city_name']);
        $industry_name=DB::table('job_info')->join('jobholder_industry_type','jobholder_industry_type.jobholder_username','job_info.client_user_name')->get(['jobholder_industry_type.industry_type']);

        $job_designation=DB::table('job_designation')->get();
        $city=DB::table('company_city')->get();
        $industry=DB::table('industry_types')->get();


        $JobLists = DB::table('recomonded_designation')->where('recomonded_designation.jobseekeremail',$session_email)->join('job_designation','job_designation.id', '=', 'recomonded_designation.designation_id')->join('job_info','job_info.job_designation_id', '=', 'recomonded_designation.designation_id')->paginate(5);


         if($JobLists->isNotEmpty())
            {
             $JobholderInfo_CompanyTypes=DB::table('jobholder_info')->join('jobholder_industry_type','jobholder_info.username','=','jobholder_industry_type.jobholder_username')->select('jobholder_info.username','jobholder_info.company_name','jobholder_info.company_area','jobholder_info.company_city','jobholder_info.company_country','jobholder_industry_type.industry_type')->get();

              return view('candidate_home',compact('candidate_info','JobholderInfo_CompanyTypes','JobLists','job_designation_id','city_id','industry_name','job_designation','city','industry'));
             }
        else{
               return view('candidate_home',compact('candidate_info','JobholderInfo_CompanyTypes','JobLists','job_designation_id','city_id','industry_name','job_designation','city','industry'));
            
             }

    }




    public function job_details(Request $request){
        $session_email=$request->session()->get('jobseeker_email');
     $candidate_info = DB::table('jobseeker_info')->where('jobseekeremail', $session_email)->first();
    return view('job_details')->with('candidate_info',$candidate_info);
    }
    public function login(Request $request)
    {
      
        $usertype=$request->input('name_combo');
        $email_or_username=$request->input('email_or_username');
        $password=$request->input('password');
        //job holder......
        if ($usertype=='jobholder_info') {
            $firstname_password = DB::table($usertype)->where('username', $email_or_username)->first(['password','id']);
             if ($firstname_password === null) {
              return "Email or Username is not Correct !!";
           }
       elseif(Hash::check($password, $firstname_password->password)){  
         $request->session()->put('jobholder_username',$email_or_username);
         $request->session()->put('jobholder_id',$firstname_password->id);
          return "jobholder_123";
         }
         else{return 'Password is not Correct !!';}
        }
        //job seeker.............
        else{
            $firstname_password = DB::table($usertype)->where('jobseekeremail', $email_or_username)->first(['firstname','jobseekerpassword','id']);
              if ($firstname_password === null) {
              return "Email or Username is not Correct !!";
           }
          elseif(Hash::check($password, $firstname_password->jobseekerpassword)){
            // email and password match...jobseeker...
             $request->session()->put('jobseeker_email',$email_or_username);
             $request->session()->put('jobseeker_id',$firstname_password->id);
            return "jobseeker_123";
          }
          else{return 'Password is not Correct !!';}
        }
      
    }
    public function signout(Request $request){
            $request->session()->flush();
            return redirect('/');
    }
 
}














