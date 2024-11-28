<?php

require_once('../../Models/Admin/book.class.php');
require_once('../../Models/Admin/connexion.php');
$db = getConnection();
$e = new Book();
$member = $_POST['member'];
$dispo = $e->getEmpruntsNot($member);

// var_dump($dispo);die();

if (isset($member) && !empty($member)) {
	$query = $db->prepare("SELECT b.id_book, titre, isbn
        FROM tbl_members as m, tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl, tbl_emprunts as e 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author 
        and p.publisher_id = b.publisher_id and b.format='paper' and e.member_id=m.id_member and e.id_book=b.id_book and e.statut='2' and returned='0' and member_id = ?");
	$query->execute(array($member));
	$rc = $query->rowCount();
	if ($rc > 0) {
		echo "<option value=''>Choisi le document</option>";
		while ($value = $query->fetchObject()) {
			echo "<option value=" . $value->id_book . ">" . $value->titre . "</option>";
		}
		# code...
	} else {

		echo "<option>Aucun document</option>";
	}
}