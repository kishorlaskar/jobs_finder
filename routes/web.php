<?php
//Admin............................................
Route::get('/admin_dashboard','admincontroller@admin_dashboard');
Route::get('/user_profile','admincontroller@user_profile');
Route::get('/candidate_list','admincontroller@candidate_list');
Route::get('/jobholder_list','admincontroller@jobholder_list');
Route::get('/admin_job_list','admincontroller@job_list');
Route::get('/manage_job','admincontroller@manage_job');
Route::get('/job_designation','admincontroller@job_designation');
Route::get('/job_type','admincontroller@job_type');
Route::get('/skill_test_info','admincontroller@skill_test');
Route::get('/live_contest','admincontroller@live_contest');
Route::get('/notifications','admincontroller@notifications');

 //jobseeker Auth page after login.....
Route::group(['middleware'=>'checkcandidate'],function(){ 
    Route::get('update_candidate_profile','Candidatecontroller@update_candidate_profile');
    Route::post('submit_recomonded_designation','Candidatecontroller@submit_recomonded_designation');
    Route::get('/candidate_cv','Candidatecontroller@candidate_cv');
    Route::get('academic_transcript_info','Candidatecontroller@acdemic_transcript_info');
    Route::post('submit_transcripttion','Candidatecontroller@submit_transcripttion');
    Route::get('delete_transcription/{id}','Candidatecontroller@delete_transcription')->name('delete_transcription');
    Route::get('project_work_info','Candidatecontroller@project_work');
    Route::get('skill_test_result_info','Candidatecontroller@skill_test_result_info');
    Route::post('update_candidate_personal','Candidatecontroller@update_candidate_personal');
    Route::post('/update_jobseeker_education_info','jobseeker_education_skill_language_ref_info_controller@update_jobseeker_education_info');
    Route::post('/update_jobseeker_skill_info','jobseeker_education_skill_language_ref_info_controller@update_jobseeker_skill_info');
    Route::post('/update_jobseeker_language_info','jobseeker_education_skill_language_ref_info_controller@update_jobseeker_language_info');
    Route::post('/update_jobseeker_ref_info','jobseeker_education_skill_language_ref_info_controller@update_jobseeker_ref_info');
    Route::post('/update_jobseeker_project_info','jobseeker_education_skill_language_ref_info_controller@update_jobseeker_project_info');
    Route::post('/submit_candidate_image','Candidatecontroller@submit_candidate_image');
 
    Route::get('/skill_test','Candidatecontroller@skill_test');
    Route::get('/question_paper/{test_id}','Candidatecontroller@question_paper')->name('question_paper');
    Route::post('/skill_test_result','Candidatecontroller@skill_test_result');
    Route::get('/candidate_home','jobcontroller@candidate_home');
    Route::get('/job_details','jobcontroller@job_details');
    Route::get('/all_job_list','Candidatecontroller@all_job_list');
    Route::get('/side_search','Candidatecontroller@side_search');
    Route::get('/candidate_view_job_details/{job_id_for_view}','Candidatecontroller@view_job_details')->name('candidate_view_job_details');
    Route::get('/apply_job/{job_id_for_apply}','Candidatecontroller@apply_job')->name('apply_job');
    Route::get('applied_job_list','Candidatecontroller@applied_job_list');

    //general cv...............
    Route::get('general_cv','Candidatecontroller@general_cv');
    Route::get('Download_general_cv','testcontroller@test');

     //For contest ... Start...
    Route::get('/contest/', function () {
      return view('contest.index');
    });
    Route::get('/time.php', function () {
      return view('contest.create_watch.time');
    });

    Route::get('/contest/exam_control.php', function () {  
       return view('contest.exam_control');
    });
    Route::get('/exam_complete.php', function () {  
      return view('contest.exam_complete');
     });
    Route::get('/contest/time.php', function () {
      return view('contest.create_watch.time');
   
    });
    Route::get('/contest/test', function () {
       return view('contest.test');
    });
    Route::post('/contest/result', 'Mycontroller@get_exam_result');
    Route::post('/contest/trial_result', 'Mycontroller@trial_result');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/contest/{subject_name}', 'Mycontroller@show_exam_paper')->name('post.exam_start');

    Route::get('/contest/{year}/{subject_name}', 'Mycontroller@trial_exam_paper')->name('post.trial_exam');

         //Contest end............

    //Message...............................
    Route::get('/jobseeker/messanger',function(){return view('messanger');});
    Route::get('/jobseeker/messanger/{message_section}','candidatecontroller@message_section');
    Route::get('/jobseeker/messanger_data','candidatecontroller@messanger_data');
    Route::post('jobseeker/submit_message','MessageController@submit_message');
});





//jobholder Auth page after login......
Route::group(['middleware'=>'jobholdercheck'],function(){ 

	//jobholder auth start.................
    Route::get('/jobholder_home','jobholdercontroller@jobholder_home');
    Route::get('/post_job', function () {
      return view('post_job');
    });
    Route::post('/submit_job','submit_job_controller@submit_job');
    Route::get('/job_list','jobholdercontroller@job_list');
    Route::get('archive_job/{year}','jobholdercontroller@archive_job')->name('archive_job');
    Route::get('/edit_job/{job_id}','jobholdercontroller@edit_job')->name('job_id');
    Route::get('/archive_edit_job/{job_id}','jobholdercontroller@archive_edit_job')->name('archive_job_id');
    Route::get('/delete_job/{job_id_for_delete}','jobholdercontroller@delete_job')->name('job_delete');
    Route::get('/archive_job_delete/{job_id_for_delete}','jobholdercontroller@archive_delete_job')->name('archive_job_delete');
    Route::get('/view_job_details/{job_id_for_view}','jobholdercontroller@view_job_details')->name('view_job_details');
    Route::get('/archive_view_job_details/{job_id_for_view}','jobholdercontroller@archive_view_job_details')->name('archive_view_job_details');
    Route::post('/update_job_post','submit_job_controller@update_job_post' );
    Route::get('/apply_candidate_lists/{apply_job_id}', 'jobholdercontroller@apply_candidate_list')->name('apply_job_id');
    Route::post('/view_candidate_info','jobholdercontroller@view_apply_candidate_info');
    //Route::post('/view_candidate_info','jobholdercontroller@view_apply_candidate_info');
    Route::post('/Download_candidate_cv','jobholdercontroller@Download_candidate_cv');

    Route::get('recomondation_candidate_lists/{recomondation_id}','jobholdercontroller@recomondation_candidate_lists')->name('recomondation_id');
    //jobholder auth end.............


    //Message...............................
    Route::get('/jobholder/messanger',function(){return view('messanger');});
    Route::get('/jobholder/messanger/{message_section}','candidatecontroller@jobholder_message_section');
    Route::get('/jobholder/messanger_data','candidatecontroller@messanger_data');
    Route::post('jobholder/submit_message','MessageController@submit_message');

});

//For All Users.......................................

Route::get('/', 'jobcontroller@index');
Route::get('/search', 'jobcontroller@index_search');
Route::get('/jobseeker_registration', 'jobcontroller@jobseeker_registration');
Route::post('/email_verify', function () {
     if (isset($_POST['email'])) { $email = $_POST["email"]; $email_exist= DB::table('jobseeker_info')->where('jobseekeremail',$email)->exists(); if($email_exist==false){ return "confirm"; } else return "not_confirm"; }
 });
Route::post('/pass_candidate_register_info', 'jobcontroller@submit_candidate_register_info');
Route::get('/jobholder_registration', 'jobcontroller@jobholder_registration');
Route::post('/submit_jobholder_info','jobcontroller@submit_jobholder_info');
Route::post('loginpage','jobcontroller@login');
Route::get('/signout', 'jobcontroller@signout');
Route::get('/external_link/{external_link}','Candidatecontroller@external_link')->name('external_link');

//for test...........

Route::get('feature_job_details/{job_id_for_view}','Candidatecontroller@view_feature_job_details')->name('feature_job_details');
Route::get('interview_tips',function(){return view('interview_tips');});






