<?php
include_once '../../../database/dbconfig2.php';
require_once '../authentication/superadmin-class.php';


$superadmin_home = new SUPERADMIN();

if(!$superadmin_home->is_logged_in())
{
 $superadmin_home->redirect('');
}

if(isset($_POST['btn-update'])){

    $system_name                       = trim($_POST['SName']);
    $system_number                     = trim($_POST['PNumber']);
    $system_email                      = trim($_POST['Email']);
    $copy_right                      = trim($_POST['CRight']);

    $pdoQuery = 'UPDATE system_config SET system_name=:system_name, system_number=:system_number, system_email=:system_email, copy_right=:copy_right WHERE Id=1';;
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(
    array
    ( 
    ":system_name"                =>$system_name,
    ":system_number"         =>$system_number,
    ":system_email"         =>$system_email,
    ":copy_right"         =>$copy_right,

    )
    );

    $_SESSION['status_title'] = "Success!";
    $_SESSION['status'] = "System setting succesfully updated";
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