<?php
include_once '../../../database/dbconfig2.php';
require_once '../authentication/superadmin-class.php';


$superadmin_home = new SUPERADMIN();

if(!$superadmin_home->is_logged_in())
{
 $superadmin_home->redirect('');
}

if(isset($_POST['btn-update'])){

    $SKey                      = trim($_POST['SKey']);
    $SSKEy                     = trim($_POST['SSKey']);

    $pdoQuery = 'UPDATE google_recaptcha_api SET site_key=:site_key, site_secret_key=:site_secret_key WHERE Id=1';;
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(
    array
    ( 
    ":site_key"                =>$SKey,
    ":site_secret_key"         =>$SSKEy,

    )
    );

    $_SESSION['status_title'] = "Success!";
    $_SESSION['status'] = "Google reCAPTCHA API succesfully updated";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_timer'] = 40000;
    header('Location: ../settings');

}
else{

    $_SESSION['status_title'] = "Oops!";
    $_SESSION['status'] = "Something went wrong, please try again!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_timer'] = 100000;
    header('Location: ../settings');
    
    
}

?>