<?php
include_once __DIR__. '/../../../src/API/api.php';
require_once 'superadmin-class.php';

$superadmin_login = new SUPERADMIN();

if($superadmin_login->is_logged_in()!="")
{
 $superadmin_login->redirect('');
}

if(isset($_POST['btn-signin']))
{

   $response = $_POST['g-token'];
   $remoteip = $_SERVER['REMOTE_ADDR'];
   $url = "https://www.google.com/recaptcha/api/siteverify?secret=$SiteSECRETKEY&response=$response&remoteip=$remoteip";
   $data = file_get_contents($url);
   $row =  json_decode($data, true);
   
   if($row['success'] == "true"){

 $email = trim($_POST['email']);
 $upass = trim($_POST['password']);
 
 if($superadmin_login->login($email,$upass))
 {
  
    $_SESSION['status_title'] = "Hey !";
    $_SESSION['status'] = "Welcome back!";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_timer'] = 10000;
   header("Location: ../home");
    exit;

 }
}else{
   $_SESSION['status_title'] = "Error!";
   $_SESSION['status'] = "Invalid captcha, please try again!";
   $_SESSION['status_code'] = "error";
   $_SESSION['status_timer'] = 40000;
   header("Location: ../../../public/superadmin/signin");
   exit;
}
}
?>