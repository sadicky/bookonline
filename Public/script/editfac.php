<?php
session_start();
require_once '../../Models/Admin/connexion.php';
$db = getConnection();


// var_dump($_POST);die();

$id = htmlspecialchars(trim($_POST['id']));
$name = htmlspecialchars(trim($_POST['fac']));

$sql2 = "UPDATE tbl_faculties SET fac=? WHERE fac_id=?";
$req2 = $db->prepare($sql2);
$data2 = $req2->execute(array($name, $id));
if ($data2) {
    echo '
		<strong style="color: green;">Succes:</strong> Editeur modifié avec succes .
		';
} else {
    echo '
		<strong style="color: red;">Erreur 401:</strong>.
		';
}
