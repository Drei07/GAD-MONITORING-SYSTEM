<?php
include_once '../../../database/dbconfig2.php';
require_once '../authentication/superadmin-class.php';


$superadmin_home = new SUPERADMIN();

if(!$superadmin_home->is_logged_in())
{
 $superadmin_home->redirect('');
}


    $userId = $_GET["Id"];


    $pdoQuery = "UPDATE admin SET account_status = :account_status WHERE userId=:userId";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(
    array
    ( 
    ":account_status"      => "disabled",
    ":userId"                =>$userId
    )
    );

    $_SESSION['status_title'] = "Success!";
    $_SESSION['status'] = "Admin has succesfully removed";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_timer'] = 40000;
    header("Location: ../admin");


?>