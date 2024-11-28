<?php
session_start();
require_once '../../Models/Admin/connexion.php';
$db = getConnection();


// var_dump($_POST);die();

$id = htmlspecialchars(trim($_POST['id']));
$name = htmlspecialchars(trim($_POST['name']));
$lieu = htmlspecialchars(trim($_POST['lieu']));

$sql2 = "UPDATE tbl_publishers SET name=?,lieu=?  WHERE publisher_id=?";
$req2 = $db->prepare($sql2);
$data2 = $req2->execute(array($name,$lieu, $id));
if ($data2) {
    echo '
		<strong style="color: green;">Succes:</strong> Editeur modifié avec succes .
		';
} else {
    echo '
		<strong style="color: red;">Erreur 401:</strong>.
		';
}
