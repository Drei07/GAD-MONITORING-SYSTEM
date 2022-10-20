<?php
include_once '../../../database/dbconfig2.php';
require_once '../authentication/admin-class.php';


$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
 $admin_home->redirect('../../public/admin/signin');
}

$stmt = $admin_home->runQuery("SELECT * FROM admin WHERE userId=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


    $profile                      = "profile-red.png";

    $pdoQuery = 'UPDATE admin SET adminProfile=:profile WHERE userId=' . $_GET['userId'];
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