<?php
require_once 'admin-class.php';
$user = new ADMIN();

if(empty($_GET['id']) && empty($_GET['code']))
{
 $user->redirect('');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
 $id = base64_decode($_GET['id']);
 $code = $_GET['code'];
 
 $statusY = "Y";
 $statusN = "N";
 
 $stmt = $user->runQuery("SELECT userId,adminStatus FROM admin WHERE userId=:uID AND tokencode=:code LIMIT 1");
 $stmt->execute(array(":uID"=>$id,":code"=>$code));
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 if($stmt->rowCount() > 0)
 {
  if($row['adminStatus']==$statusN)
  {
   $stmt = $user->runQuery("UPDATE admin SET adminStatus=:status WHERE userId=:uID");
   $stmt->bindparam(":status",$statusY);
   $stmt->bindparam(":uID",$id);
   $stmt->execute(); 
   
   $msg = "
        <div class='alert alert-error' style='font-size:20px; font-weight:300; color:#000;'>
        <strong>Welcome !</strong> Your account is now activated.
        </div>
        <a href='../../public/admin/signin' style='text-decoration:none; display: flex; justify-content: right; font-size: 1.2rem; color:#000; font-weight:600;''>Signin here  <img src='../../src/img/caret-right-fill.svg' style='margin-top: .5rem; margin-left: 5px;' width='15' height='15' alt='Arrow right'></a>";
  }
  else
  {
   $msg = "
        <div class='alert alert-error' style='font-size:20px; font-weight:300; color:#000;'>
        <strong>Hey !</strong>  Your account is all ready activated.
        </div>
        <a href='../../public/admin/signin' style='text-decoration:none; display: flex; justify-content: right; font-size: 1.2rem; color:#000; font-weight:600;'>Signin here  <img src='../../src/img/caret-right-fill.svg' style='margin-top: .5rem; margin-left: 5px;' width='15' height='15' alt='Arrow right'></a>";
  }
 }
 else
 {
  $msg = "
        <div class='alert alert-error' style='font-size:20px; font-weight:300; color:#000;'>
        <strong>Warning !</strong> No account Found.
        </div>";
 } 
}
