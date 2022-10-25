<?php
include_once '../../../database/dbconfig2.php';
require_once '../authentication/superadmin-class.php';


$superadmin_home = new SUPERADMIN();

if(!$superadmin_home->is_logged_in())
{
 $superadmin_home->redirect('');
}


    $ID = $_GET["Id"];
    $guidelinesID = $_GET['guidelinesID'];


    $pdoQuery = "UPDATE guidelines_$guidelinesID SET status = :status WHERE Id=:Id";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(
    array
    ( 
    ":status"      => "delete",
    ":Id"          =>$ID
    )
    );


    $_SESSION['status_title'] = "Success!";
    $_SESSION['status'] = "Admin has succesfully removed";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_timer'] = 40000;
    header("Location: ../guidelines-data?Id=$ID");


?>