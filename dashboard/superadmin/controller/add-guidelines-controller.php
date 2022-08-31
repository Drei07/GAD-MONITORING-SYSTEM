<?php
include_once '../../../database/dbconfig2.php';
require_once '../authentication/superadmin-class.php';


$superadmin_home = new SUPERADMIN();

if(!$superadmin_home->is_logged_in())
{
 $superadmin_home->redirect('');
}


if(isset($_POST['btn-register'])) {

    $Guidelines        = trim($_POST['Guidelines']);
    $num               = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);

    $pdoQuery = "SELECT * FROM guidelines WHERE guidelines_name = :name LIMIT 1";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(array(":name" => $Guidelines));
    $guidelines_name = $pdoResult->fetch(PDO::FETCH_ASSOC);

    if($pdoResult->rowCount() > 0)
    {
        $_SESSION['status_title'] = "Oops!";
        $_SESSION['status'] = "Guidelines is already added!";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_timer'] = 100000;
        header('Location: ../add-guidelines');
    }
    else
    {

    $pdoQuery = "INSERT INTO guidelines (guidelines_name, guidelines_Id) VALUES (:guidelines_name, :guidelines_Id)";
    $pdoResult1 = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult1->execute
    (
        array
        ( 
            ":guidelines_name"                =>$Guidelines,
            ":guidelines_Id"                  => $num

        )
      );

      $_SESSION['status_title'] = "Success!";
      $_SESSION['status'] = "Guidelines is successfully added!";
      $_SESSION['status_code'] = "success";
      $_SESSION['status_timer'] = 40000;
      header('Location: ../add-guidelines');

      if($pdoExec){
        $sql =  "CREATE TABLE guidelines_$num(
            Id INT(145) AUTO_INCREMENT PRIMARY KEY,
            userId VARCHAR(125) NULL,
            files VARCHAR(125) NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
        )";
      }

      $Result = $pdoConnect->prepare($sql);
      $Exec = $Result->execute();
    }
}
else
{
    $_SESSION['status_title'] = "Oops!";
    $_SESSION['status'] = "Something went wrong, please try again!";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_timer'] = 100000;
    header('Location: ../add-room');

}

?>