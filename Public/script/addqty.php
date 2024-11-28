<?php
require_once('../../Models/Admin/book.class.php');
$e = new Book();
$id=isset($_POST['id'])?$_POST['id']:'';
$qty=isset($_POST['qty'])?$_POST['qty']:'';
$q = $e->getBook($id);
$qte = $q->qty + $qty;

if($id)
{
   $e->addQty($qte,$id);
   echo "<script>window.location.href='index.php?p=circulations'</script>";
          
}
	
?>