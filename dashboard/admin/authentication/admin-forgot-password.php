<?php
require_once 'admin-class.php';
$admin = new ADMIN();

if($admin->is_logged_in()!="")
{
 $admin->redirect('');
}

if(isset($_POST['btn-forgot-password']))
{
 $email = $_POST['email'];
 
 $stmt = $admin->runQuery("SELECT userId, tokencode FROM admin WHERE adminEmail=:email; AND tokencode=:code LIMIT 1");
 $stmt->execute(array(":code"=>$code,":email"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC); 
 if($stmt->rowCount() == 1)
 {
  $id = base64_encode($row['userId']);
  $code = ($row['tokencode']);
  
  $message= "
       Hello , $email
       <br /><br />
       We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore this email,
       <br /><br />
       Click Following Link To Reset Your Password 
       <br /><br />
       <a href='https://localhost/HGDG/dashboard/admin/authentication/admin-reset-password?id=$id&code=$code'>click here to reset your password</a>
       <br /><br />
       thank you :)
       ";
  $subject = "Password Reset";
  
  $admin->send_mail($email,$message,$subject,$smtp_email,$smtp_password,$system_name);
  
  $_SESSION['status_title'] = "Success !";
  $_SESSION['status'] = "We've sent the password reset link to $email, kindly check your spam folder and 'Report not spam' to click the link.";
  $_SESSION['status_code'] = "success";
  header('Location: ../../../public/admin/signin');
 }
 else
 {
    $_SESSION['status_title'] = "Oops !";
    $_SESSION['status'] = "Entered email not found";
    $_SESSION['status_code'] = "error";
    header('Location: ../../../public/admin/forgot-password');
 }
}
?>