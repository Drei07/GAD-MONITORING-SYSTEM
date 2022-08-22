<?php
include_once '../../../database/dbconfig2.php';
require_once '../authentication/superadmin-class.php';


$superadmin_home = new SUPERADMIN();

if(!$superadmin_home->is_logged_in())
{
 $superadmin_home->redirect('');
}

if(isset($_POST['btn-update'])){

    $email                      = trim($_POST['Email']);
    $password                   = trim($_POST['GPassword']);

    $pdoQuery = 'UPDATE email_config SET email=:email, password=:password WHERE Id=1';;
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(
    array
    ( 
    ":email"                =>$email,
    ":password"               =>$password,

    )
    );

    $_SESSION['status_title'] = "Success!";
    $_SESSION['status'] = "SMTP Mailer succesfully updated";
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