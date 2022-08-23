<?php
include_once '../../../database/dbconfig2.php';
require_once '../authentication/superadmin-class.php';


$superadmin_home = new SUPERADMIN();

if(!$superadmin_home->is_logged_in())
{
 $superadmin_home->redirect('');
}


    $profile                      = "profile-red.png";

    $pdoQuery = 'UPDATE superadmin SET profile=:profile WHERE superadminId=1';;
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(
    array
    ( 
    ":profile"                =>$profile,
    )
    );

    $_SESSION['status_title'] = "Success!";
    $_SESSION['status'] = "Avatar successfully updated!";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_timer'] = 40000;
    header('Location: ../profile');
    $pdoConnect = null;


?>