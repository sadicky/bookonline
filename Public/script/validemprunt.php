<?php
require_once('../../Models/Admin/book.class.php');
$e = new Book();
$id=isset($_POST['id'])?$_POST['id']:'';
$q = $e->getBook($id);
$qty = $q->qty - 1;
$date  = date("Y-m-d"); 

if($id)
{
   $e->validerEmprunt($date,$id);
   $e->addQty($qty,$id);
}
	
?>