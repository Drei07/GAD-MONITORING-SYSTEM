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

if(isset($_POST['btn-update'])){

    $folder = "../../../src/img/" . basename($_FILES['Logo']['name']);
    $Picture = $_FILES['Logo']['name'];

    $pdoQuery = 'UPDATE admin SET adminProfile=:profile WHERE userId='. $_GET['UID'];
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(
    array
    ( 
    ":profile"                =>$Picture
    )
    );

    $_SESSION['status_title'] = "Success!";
    $_SESSION['status'] = "Profile logo succesfully updated";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_timer'] = 40000;
    header('Location: ../profile');

    if (move_uploaded_file($_FILES['Logo']['tmp_name'], $folder)) {
        header('Location: ../profile');
    }
}
else{

    $_SESSION['status_title'] = "Oops!";
    $_SESSION['status'] = "Something went wrong, please try again!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_timer'] = 100000;
    header('Location: ../profile');
    
    
}


?>