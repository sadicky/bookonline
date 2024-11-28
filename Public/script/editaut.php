<?php
session_start();
require_once '../../Models/Admin/connexion.php';
$db = getConnection();


// var_dump($_POST);die();

$id = htmlspecialchars(trim($_POST['id']));
$cat = htmlspecialchars(trim($_POST['aut']));

$sql2 = "UPDATE tbl_authors SET names=?  WHERE id_author=?";
$req2 = $db->prepare($sql2);
$data2 = $req2->execute(array($cat, $id));
if ($data2) {
    echo '
		<strong style="color: green;">Succes:</strong> Auteur modifié avec succes .
		';
} else {
    echo '
		<strong style="color: red;">Erreur 401:</strong>.
		';
}
