<?php
require_once('../../Models/Admin/book.class.php');
$book = new Book();
$id = isset($_POST['id']) ? $_POST['id'] : '';

if ($id) {
	$delete = $book->deleteBook($id);
	if ($delete)
		echo "<span class='alert alert-pro alert-dismissible alert-success col-sm-12'>Reussi</span>";
	else echo "<span class='alert alert-pro alert-dismissible alert-danger col-sm-12'>Erreur</span>";
}
