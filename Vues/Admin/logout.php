<?php 
session_start();
session_destroy();

require_once('Models/Admin/connexion.php');

$action = $_SESSION['role']." Logout";
$description = $_SESSION['noms']. " est deconnecté avec succès.";
$date = date('Y-m-d H:i:s');
setLogout($action,$description,$date);
/*-----------SpaceLine---------------*/ 
// header("location:".WEBROOT."login");
 ?>