<?php
require_once 'user-class.php';
$user = new USER();

if(!$user->is_logged_in())
{
 $user->redirect('../../../');
}

if($user->is_logged_in()!="")
{
 $user->logout();
 $user->redirect('../../../');
}
?>