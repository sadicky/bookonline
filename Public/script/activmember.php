<?php
require_once('../../Models/Admin/member.class.php');
$tech = new Member();
$id=isset($_POST['id'])?$_POST['id']:'';

if($id)
{
    $active = $tech->activMember($id);
	if($active) echo "avec succes";
	else echo "non ajoute";
}
	
?>