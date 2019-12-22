//Enable input field .....
     function enable_all_input_fields(){
       var inputs=document.getElementsByTagName('input');                             
           for(i=0;i<inputs.length;i++){
                 inputs[i].disabled=false;
                 $(inputs[i]).css("border", "1px solid #00FFFF");
                     } 
           
           $(inputs[1]).focus();

     }
     //Disable input field .....
     function disable_all_input_fields(){
       var inputs=document.getElementsByTagName('input');                             
           for(i=0;i<inputs.length;i++){
                 inputs[i].disabled=true;
                  $(inputs[i]).css("border", "none");
                     } 
     }
     //Submit form all input value .....
       function update_personal_info(form_id){
          if($('input').is(':disabled')==false){
             var form = $(form_id).serializeArray();
               $.ajax({
                    type: 'POST',
                    url: 'update_candidate_personal',
                    data: {
                     "_token" : $('meta[name=_token]').attr('content'), 
                      form: form 
                    },   
                    success: function (msg) { 
                      if (msg=='confirm') {
                        disable_all_input_fields();
                        alert('Information Update Successful !!');
                      }
                  else{alert('There Have Error , Pleaze Try Again !!');}
                    }
                });
    
              }
      }

 
     
      $(document).ready(function(){  
      //for education.........  
      var education=a;    
      $('#add').click(function(){ 
           education++;  
             $('#dynamic_field').append('<tr id="row'+education+'"> <td width="90%"><input type="hidden" name="id'+education+'" value=""> <div class="panel panel-default"> <div class="panel-heading" role="button" data-toggle="collapse" data-parent="#accordion" href="#'+education+'" aria-expanded="true" aria-controls="'+education+'"> <h4 class="panel-title"> Academic #'+education+'</h4> </div> <div id="'+education+'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"> <div class="panel-body"> <div class="table-responsive"> <table class="table"> <tr> <th>SL</th> <td>'+education+'</td> </tr> <tr> <th>Title</th> <td> <input type="text" name="education_title'+education+'" class="form-control cv-table-color" value="" disabled maxlength="100"></td> </tr> <tr> <th>Major</th> <td> <input type="text" name="education_major'+education+'" class="form-control cv-table-color" value="" disabled maxlength="200"></td> </tr> <tr> <th>University</th> <td><input type="text" name="education_institute_name'+education+'" class="form-control cv-table-color" value="" disabled maxlength="254"></td> </tr> <tr> <th>Result</th> <td><input type="text" name="education_result'+education+'" class="form-control cv-table-color" value="" disabled maxlength="10"></td> </tr> <tr> <th>Passing Year</th> <td><input type="text" name="passing_year'+education+'" class="form-control cv-table-color" value="" disabled maxlength="10"></td> </tr> </table> </div> </div> </div> </div> </td> <td><button type="button" name="remove" id="'+education+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });  
      
      //For skill.............
       var skill=b;    
      $('#add_skill').click(function(){  
           skill++;  
             $('#dynamic_field_skill').append(' <tr id="row'+skill+'"><input type="hidden" name="id'+skill+'" value=" "> <td>&nbsp&nbsp'+skill+'</td> <td><input type="text" class="form-control cv-table-color" name="skill'+skill+'" value="" disabled maxlength="100"></td> <td><input type="text" class="form-control cv-table-color" name="skill_experiance'+skill+'" value="" disabled maxlength="50"></td> <td><input type="text" class="form-control cv-table-color" name="skill_proficency'+skill+'" value="" disabled maxlength="100" required></td> <td><button type="button" name="remove" id="'+skill+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      }); 
 
      
       //For language.............
      var language=l;    
      $('#add_language').click(function(){  
           language++;  
             $('#dynamic_field_language').append(' <tr id="row'+language+'"> <input type="hidden" name="id'+language+'" value=""><td>&nbsp&nbsp'+language+'</td> <td><input type="text" class="form-control cv-table-color" name="language'+language+'" value="" disabled maxlength="20"></td> <td><input type="text" class="form-control cv-table-color" name="language_spoken_type'+language+'" value="" disabled maxlength="10"></td> <td><input type="text" class="form-control cv-table-color" name="language_writting_type'+language+'" value="" disabled maxlength="10"></td> <td><input type="text" class="form-control cv-table-color" name="language_reading_type'+language+'" value="" disabled maxlength="10"></td><td><button type="button" name="remove" id="'+language+'" class="btn btn-danger btn_remove">X</button></td> </tr>');
      });  
     
       //For Ref.............
      var ref=r;    
      $('#add_ref').click(function(){  
           ref++;  
             $('#dynamic_field_ref').append('<tr id="row'+ref+'"><input type="hidden" name="id'+ref+'" value=""> <td><input type="text" class="form-control cv-table-color" name="ref_name'+ref+'" value="" disabled maxlength="100"></td> <td><input type="text" class="form-control cv-table-color" name="ref_designation'+ref+'" value="" disabled maxlength="50"></td> <td><input type="text" class="form-control cv-table-color" name="ref_relationship'+ref+'" value="" disabled maxlength="50"></td> <td><input type="text" class="form-control cv-table-color" name="ref_phone'+ref+'" value="" disabled maxlength="20"></td> <td><input type="text" class="form-control cv-table-color" name="ref_email'+ref+'" value="" disabled maxlength="100"></td> <td><button type="button" name="remove" id="'+ref+'" class="btn btn-danger btn_remove">X</button></td> </tr>');
      }); 
       //For Project....
      var pro=project;    
      $('#add_project').click(function(){  
           pro++;  
             $('#project_table').append(' <tr id="row'+pro+'"> <input type="hidden" name="id'+pro+'" value=""> <td><input type="text" class="form-control cv-table-color" name="project_name'+pro+'" value="" disabled ></td> <td><input type="text" class="form-control cv-table-color" name="project_discription'+pro+'" value="" disabled ></td> <td><input type="text" class="form-control cv-table-color" name="project_link'+pro+'" value="" disabled ></td></td> <td><button type="button" name="remove" id="'+pro+'" class="btn btn-danger btn_remove">X</button></td> </tr>');
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id).remove();
          // $(this).fadeOut('slow').fadeIn("slow");  
      });
 });  

      //Update update_jobseeker_education_info value .....
       function update_jobseeker_education_info(form_id){
          if($('input').is(':disabled')==false){
             var form = $(form_id).serializeArray();
             var row_count = $("#row_count_input").val();
               $.ajax({
                    type: 'POST',
                    url: 'update_jobseeker_education_info',
                    data: {
                     "_token" : $('meta[name=_token]').attr('content'), 
                      form: form ,
                      row_count: row_count
                    },   
                    success: function (msg) { 
                     if (msg=='update_education_info') {
                        disable_all_input_fields();
                        alert('Education Information Update Successful !!');
                      }
                     else if(msg=='update_and_create_education_info'){
                      alert('Education Information Update And Create Successful !!');
                       window.location = "/candidate_cv"; 
                     }
                     else if(msg=='create_education_info'){
                        alert('Education Information Create Successful !!');
                        window.location = "/candidate_cv";
                      
                     }
                  else{alert('There Have Error , Pleaze Try Again !!');}
                    }
                });
    
              }
             
      }
      //Update update_jobseeker_skill_info value .....
       function update_jobseeker_skill_info(form_id){
          if($('input').is(':disabled')==false){
             var form = $(form_id).serializeArray();
             var row_count = $("#row_count_input2").val();
               $.ajax({
                    type: 'POST',
                    url: 'update_jobseeker_skill_info',
                    data: {
                     "_token" : $('meta[name=_token]').attr('content'), 
                      form: form ,
                      row_count: row_count
                    },   
                    success: function (msg) { 
                     if (msg=='update_skill_info') {
                        disable_all_input_fields();
                        alert('Skill Information Update Successful !!');
                      }
                     else if(msg=='update_and_create_skill_info'){
                      alert('Skill Information Update And Create Successful !!');
                      window.location = "/candidate_cv";
                     }
                     else if(msg=='create_skill_info'){
                        alert('Skill Information Create Successful !!');
                        window.location = "/candidate_cv";
                     }
                  else{alert('There Have Error , Pleaze Try Again !!');}
                    }
                });
    
              }
             
      }
      //Update update_jobseeker_language_info value .....
       function update_jobseeker_language_info(form_id){
          if($('input').is(':disabled')==false){
             var form = $(form_id).serializeArray();
             var row_count = $("#row_count_input3").val();
               $.ajax({
                    type: 'POST',
                    url: 'update_jobseeker_language_info',
                    data: {
                     "_token" : $('meta[name=_token]').attr('content'), 
                      form: form ,
                      row_count: row_count
                    },   
                   success: function (msg) { 
                     if (msg=='update_language_info') {
                        disable_all_input_fields();
                        alert('Language Information Update Successful !!');
                      }
                     else if(msg=='create_and_update_language_info'){
                      alert('Language Information Update And Create Successful !!');
                      window.location = "/candidate_cv";
                     }
                     else if(msg=='create_language_info'){
                        alert('Language Information Create Successful !!');
                        window.location = "/candidate_cv";
                     }
                  else{alert('There Have Error , Pleaze Try Again !!');}
                    }
                });
    
              }
             
      }
      //Update update_jobseeker_ref_info value .....
       function update_jobseeker_ref_info(form_id){
          if($('input').is(':disabled')==false){
             var form = $(form_id).serializeArray();
             var row_count = $("#row_count_input4").val();
               $.ajax({
                    type: 'POST',
                    url: 'update_jobseeker_ref_info',
                    data: {
                     "_token" : $('meta[name=_token]').attr('content'), 
                      form: form ,
                      row_count: row_count
                    },   
                    success: function (msg) { 
                       console.log(msg);
                     if (msg=='update_ref_info') {
                     
                        disable_all_input_fields();
                        alert('Reference Information Update Successful !!');
                      }
                     else if(msg=='create_and_update_ref_info'){
                      alert('Reference Information Update And Create Successful !!');
                      window.location = "/candidate_cv";
                     }
                     else if(msg=='create_ref_info'){
                        alert('Reference Information Create Successful !!');
                        window.location = "/candidate_cv";
                     }
                  else{alert('There Have Error , Pleaze Try Again !!');}
                    }
                });
    
              }      
      }

      //Update update_jobseeker_Project_info value .....
       function update_jobseeker_project_info(form_id){
          if($('input').is(':disabled')==false){
             var form = $(form_id).serializeArray();
             var row_count = $("#project_row_count").val();
               $.ajax({
                    type: 'POST',
                    url: 'update_jobseeker_project_info',
                    data: {
                     "_token" : $('meta[name=_token]').attr('content'), 
                      form: form ,
                      row_count: row_count
                    },   
                    success: function (msg) { 
                     if (msg=='update_project_info') {
                        disable_all_input_fields();
                        alert('Project Information Update Successful !!');
                      }
                     else if(msg=='create_and_update_project_info'){
                      alert('Project Information Update And Create Successful !!');
                       window.location = "/candidate_cv"; 
                     }
                     else if(msg=='create_project_info'){
                        alert('Project Information Create Successful !!');
                        window.location = "/candidate_cv";
                      
                     }
                  else{alert('There Have Error , Pleaze Try Again !!');}
                    }
                });
    
              }
             
      }
      //image form submit.............
       function validate_candidate_image_submit(){
        if($('input').is(':disabled')==false && document.getElementById("candidate_photo").files.length !=0){
            return true;
    
              } 
              else return false;     
      }
    //image show inside image div when upload from desktop or any other source.........
       function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }