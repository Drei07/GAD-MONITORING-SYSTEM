<?php
include_once __DIR__. '/../../../database/dbconfig2.php';
require_once '../authentication/superadmin-class.php';


$superadmin_home = new SUPERADMIN();

if(!$superadmin_home->is_logged_in())
{
 $superadmin_home->redirect('');
}

if(isset($_POST['btn-update'])){

    $folder = "../../../src/img/" . basename($_FILES['Logo']['name']);
    $Picture = $_FILES['Logo']['name'];

    $pdoQuery = 'UPDATE system_logo SET logo=:logo WHERE Id=1';
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(
    array
    ( 
    ":logo"                =>$Picture
    )
    );

    $_SESSION['status_title'] = "Success!";
    $_SESSION['status'] = "System logo successfully updated";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_timer'] = 40000;
    header('Location: ../settings');

    if (move_uploaded_file($_FILES['Logo']['tmp_name'], $folder)) {
        header('Location: ../settings');
    }
}
else{

    $_SESSION['status_title'] = "Oops!";
    $_SESSION['status'] = "Something went wrong, please try again!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_timer'] = 100000;
    header('Location: ../settings');
    
    
}


?>