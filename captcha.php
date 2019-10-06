<?php
 
 if(isset($_POST['submit']))
 {
       $User_name = $_POST['name'];
       $phone = $_POST['phone'];
       $user_email = $_POST['email'];
       $user_message = $_POST['message'];
       $email_from = 'noreply@di-class.herokuapp.com';
       $email_subject = "New Form Submission";
       $email_body = "Name: $User_name.\n".
                     "phone No: $phone.\n".
                     "Email_Id: $user_email.\n".
                     "User Message: $user_message.\n";
       $to_email = "admin@di-class.herokuapp.com";
       $headers = "From: $email_from \r\n";
       $headers .= "Reply-To: $User_name\r\n";
       $secretKey = '6LcBhrsUAAAAAElhCwx_x3LggQUV9ddfyfto-wV6';
       $responseKey = $_POST['g-recaptcha-response'];
       $UserIP = $_SERVER['REMOTE_ADDR'];
       $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";
       $response = file_get_contents($url);
       $response = json_decode($response);
       if($response->success)
       {
           mail($to_email, $email_subject, $email_body, $headers);
           echo "Your message has been submitted successfully.";
       }
       else
       {
           echo "<span>Verification failed, please try again.</span>";
       }
  }
?>