<?php
include_once __DIR__. '/../../../database/dbconfig2.php';
require_once '../authentication/superadmin-class.php';


$superadmin_home = new SUPERADMIN();

if(!$superadmin_home->is_logged_in())
{
 $superadmin_home->redirect('');
}

if(isset($_POST['btn-update-password'])){

    $old_pass          = trim($_POST["Old"]);
    $new_password           = trim($_POST["New"]);
    $confirm_password       = trim($_POST["Confirm"]);

    $password = md5($new_password);
    $old_password = md5($old_pass);

    $pdoQuery = "SELECT * FROM superadmin WHERE superadminId = 1";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute();
    $pass= $pdoResult->fetch(PDO::FETCH_ASSOC);

    $current_password = $pass["password"];

    if($current_password == $old_password){

        if($new_password == $confirm_password){

            $pdoQuery = 'UPDATE superadmin SET password=:password WHERE superadminId=1';
            $pdoResult = $pdoConnect->prepare($pdoQuery);
            $pdoExec = $pdoResult->execute(
            array
            ( 
            ":password"                =>$password
            )
            );

            $_SESSION['status_title'] = "Success!";
            $_SESSION['status'] = "Password successfully change";
            $_SESSION['status_code'] = "success";
            $_SESSION['status_timer'] = 40000;
            header('Location: ../profile');
        }
        else
        {
            $_SESSION['status_title'] = "Sorry !";
            $_SESSION['status'] = "New password and Confirm password did not match, Please try again!";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_timer'] = 10000000;
            header('Location: ../profile');
        }
    }
    else
    {
        $_SESSION['status_title'] = "Sorry !";
        $_SESSION['status'] = "Incorrect old password, Please try again!";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_timer'] = 10000000;
        header('Location: ../profile');
    }


}

?>