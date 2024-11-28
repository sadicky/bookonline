<?php
session_start();
require_once '../../Models/Admin/connexion.php';
$db = getConnection();

$id = htmlspecialchars(trim($_POST['id']));
$cl = htmlspecialchars(trim($_POST['cl']));
$dep = htmlspecialchars(trim($_POST['dep']));

$sql2 = "UPDATE tbl_classes SET classe=?,dep_id=? WHERE classe_id=?";
$req2 = $db->prepare($sql2);
$data2 = $req2->execute(array($cl,$dep,$id));
if ($data2) {
    echo '
		<strong style="color: green;">Succes:</strong> Modifié avec succes .
		';
} else {
    echo '
		<strong style="color: red;">Erreur 401:</strong>.
		';
}
