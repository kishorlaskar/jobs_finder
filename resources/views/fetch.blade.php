<?php
               $othererror='';
                if (isset($_POST['username'])) {
                       $username=$_POST['username'];
                            $con = mysql_connect("localhost", "root", "");
                            $dbname = mysql_select_db("jobsfinder", $con);
                            $sqlquery="SELECT jobseekerusername FROM jobseekerlogininfo where jobseekerusername ='".$username."'";   
                            $result2=mysql_query($sqlquery,$con);
                            $row2 = mysql_num_rows($result2);
                            if($row2 == 0){
                                $email=$_POST['email'];
                                $firstname=$_POST['firstname'];
                                $lastname=$_POST['lastname'];
                                $password=$_POST['password'];
                                $sqlquery2="INSERT INTO jobseekerlogininfo (jobseekeremail,firstname,lastname, jobseekerusername,jobseekerpassword) VALUES ('".$email."','".$firstname."','".$lastname."','".$username."','".$password."')"; $result2=mysql_query($sqlquery2,$con); 
                                session_start();
                                //$_SESSION['login_user']=$username; 
                                $othererror=1000123;
                            }
                    else{
                         mysql_close();
                        $othererror=20364;
                    }
                    echo $othererror;
                }

                ?>