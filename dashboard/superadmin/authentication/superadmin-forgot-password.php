<?php
require_once 'superadmin-class.php';
$superadmin = new SUPERADMIN();

if($superadmin->is_logged_in()!="")
{
 $superadmin->redirect('');
}

if(isset($_POST['btn-forgot-password']))
{
 $email = $_POST['email'];
 
 $stmt = $superadmin->runQuery("SELECT superadminId, tokencode FROM superadmin WHERE email=:email; AND tokencode=:code LIMIT 1");
 $stmt->execute(array(":code"=>$code,":email"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC); 
 if($stmt->rowCount() == 1)
 {
  $id = base64_encode($row['superadminId']);
  $code = ($row['tokencode']);
  
  $message= "
       Hello , $email
       <br /><br />
       We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore this email,
       <br /><br />
       Click Following Link To Reset Your Password 
       <br /><br />
       <a href='https://localhost/RMS/dashboard/superadmin/authentication/superadmin-reset-password?id=$id&code=$code'>click here to reset your password</a>
       <br /><br />
       thank you :)
       ";
  $subject = "Password Reset";
  
  $superadmin->send_mail($email,$message,$subject,$smtp_email,$smtp_password,$system_name);
  
  $_SESSION['status_title'] = "Success !";
  $_SESSION['status'] = "We've sent the password reset link to $email, kindly check your spam folder and 'Report not spam' to click the link.";
  $_SESSION['status_code'] = "success";
  header('Location: ../../../public/superadmin/signin');
 }
 else
 {
    $_SESSION['status_title'] = "Oops !";
    $_SESSION['status'] = "Entered email not found";
    $_SESSION['status_code'] = "error";
    header('Location: ../../../public/superadmin/forgot-password');
 }
}
?>