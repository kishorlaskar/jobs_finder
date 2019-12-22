<?php 
                
                if (isset($_POST['emailsubmit'])) {
                    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid Email "; 
    }
     else{
       $email_exist= DB::table('jobseekerlogininfo')->where('jobseekeremail', $email)->exists();
       if ($email_exist==false)
         {
          $part1= "modal-body modal-body-step-1";
             $part2="modal-body modal-body-step-2 is-showing";
         }
         else {
             $emailErr = "This Email Already Exist"; 
         } 
       }
 
                }
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
     ?> 