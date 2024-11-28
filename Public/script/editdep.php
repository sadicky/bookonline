<?php
session_start();
require_once '../../Models/Admin/connexion.php';
$db = getConnection();


// var_dump($_POST);die();

$id = htmlspecialchars(trim($_POST['id']));
$fac = htmlspecialchars(trim($_POST['fac']));
$dep = htmlspecialchars(trim($_POST['dep']));

$sql2 = "UPDATE tbl_departements SET dep=?,fac_id=? WHERE dep_id=?";
$req2 = $db->prepare($sql2);
$data2 = $req2->execute(array($dep,$fac, $id));
if ($data2) {
    echo '
		<strong style="color: green;">Succes:</strong> modifié avec succes .
		';
} else {
    echo '
		<strong style="color: red;">Erreur 401:</strong>.
		';
}
