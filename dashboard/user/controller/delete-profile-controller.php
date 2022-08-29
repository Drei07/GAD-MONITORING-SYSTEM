<?php
include_once '../../../database/dbconfig2.php';
require_once '../authentication/user-class.php';


$user_home = new USER();

if(!$user_home->is_logged_in())
{
 $user_home->redirect('');
}

$stmt = $user_home->runQuery("SELECT * FROM user WHERE userId=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


    $profile                      = "profile-red.png";

    $pdoQuery = 'UPDATE user SET userProfile=:profile WHERE userId=' . $_GET['userId'];
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