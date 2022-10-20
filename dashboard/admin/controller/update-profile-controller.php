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

if(isset($_POST['btn-update-profile'])){

    $first_name     = trim($_POST['FName']);
    $middle_name    = trim($_POST['MName']);
    $last_name      = trim($_POST['LName']);
    $phone_number   = trim($_POST['PNumber']);

    $pdoQuery = "UPDATE admin SET adminFirst_Name=:adminFirst_Name, adminMiddle_Name=:adminMiddle_Name, adminLast_Name=:adminLast_Name WHERE userId=". $_GET['id'];
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(
    array
    ( 

    ":adminFirst_Name"              =>$first_name,
    ":adminMiddle_Name"             =>$middle_name,
    ":adminLast_Name"               =>$last_name,

    )
    );

    $_SESSION['status_title'] = "Success!";
    $_SESSION['status'] = "Profile succesfully updated";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_timer'] = 40000;
    header('Location: ../profile');

}
else{

    $_SESSION['status_title'] = "Oops!";
    $_SESSION['status'] = "Something went wrong, please try again!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_timer'] = 100000;
    header('Location: ../profile');
    
    
}

?>