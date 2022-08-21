<?php
require_once 'superadmin-class.php';
$superadmin = new SUPERADMIN();

if(!$superadmin->is_logged_in())
{
 $superadmin->redirect('../../../public/superadmin/signin');
}

if($superadmin->is_logged_in()!="")
{
 $superadmin->logout();
 $superadmin->redirect('../../../public/superadmin/signin');
}
?>