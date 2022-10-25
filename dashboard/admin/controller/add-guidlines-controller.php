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

$userId = $row['userId'];

if(isset($_POST['btn-register'])) {

    
$Guidlines_ID = $_GET ['guidelinesID'];


    $num               = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);

    $folder = "../../PDF/" . basename($_FILES['files']['name']);
    $files = $_FILES['files']['name'];


    $pdoQuery = "INSERT INTO guidelines_$Guidlines_ID (userId, files, guidelines_Id) VALUES (:userId, :files, :guidelines_Id)";
    $pdoResult1 = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult1->execute
    (
        array
        ( 
            ":userId"                =>$userId,
            ":files"                 =>$files,
            ":guidelines_Id"         => $num

        )
      );

      $_SESSION['status_title'] = "Success!";
      $_SESSION['status'] = "Guidelines is successfully added!";
      $_SESSION['status_code'] = "success";
      $_SESSION['status_timer'] = 40000;
      header('Location: ../guidelines');


    if (move_uploaded_file($_FILES['files']['tmp_name'], $folder)) {
        header('Location: ../guidelines');
    }
}

else
{
    $_SESSION['status_title'] = "Oops!";
    $_SESSION['status'] = "Something went wrong, please try again!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_timer'] = 100000;
    header('Location: ../add-guidelines');

}

?>