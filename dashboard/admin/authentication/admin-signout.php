<?php
require_once 'admin-class.php';
$admin = new ADMIN();

if(!$admin->is_logged_in())
{
 $admin->redirect('../../../public/admin/signin');
}

if($admin->is_logged_in()!="")
{
 $admin->logout();
 $admin->redirect('../../../public/admin/signin');
}
?>