<?php
session_start();
require_once '../../Models/Admin/connexion.php';
$db = getConnection();


$id = htmlspecialchars(trim($_POST['id']));
$titre = htmlspecialchars(trim($_POST['title']));
$isbn = htmlspecialchars(trim($_POST['isbn']));
$typeDoc = htmlspecialchars(trim($_POST['doc']));
$nbr_page = htmlspecialchars(trim($_POST['pages']));
$edition = htmlspecialchars(trim($_POST['edit']));
$descr = htmlspecialchars(trim($_POST['desc']));

$sql2 = "UPDATE tbl_books SET titre=?,typeDoc=?,isbn=?,descr=?,nbr_page=?,edition=? WHERE id_book=?";
$req2 = $db->prepare($sql2);
$data2 = $req2->execute(array($titre,$typeDoc,$isbn,$descr,$nbr_page,$edition,$id));
if ($data2) {
    echo '
		<strong style="color: green;">Succes:</strong> Modifié avec succes .
		';
} else {
    echo '
		<strong style="color: red;">Erreur 401:</strong>.
		';
}
