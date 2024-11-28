<?php

require_once('../../Models/Admin/book.class.php');
$book = new Book();

$titre = htmlspecialchars(trim($_POST['title']));
$id_genre = htmlspecialchars(trim($_POST['cat']));
$id_author = htmlspecialchars(trim($_POST['aut']));
$id_book_language = htmlspecialchars(trim($_POST['lang']));
$isbn = htmlspecialchars(trim($_POST['isbn']));
$typeDoc = htmlspecialchars(trim($_POST['doc']));
$format = htmlspecialchars(trim($_POST['format']));
$publisher_id = htmlspecialchars(trim($_POST['pub']));
$nbr_page = htmlspecialchars(trim($_POST['pages']));
$edition = htmlspecialchars(trim($_POST['edit']));
$descr = htmlspecialchars(trim($_POST['desc']));
$statut = 0; 

if ($_FILES['livre']['size'] >= 1048576 * 5) {
    $message = 'file selected exceeds 5MB size limit';
    $errflag = true;
}


$message = array();

$livre = $_FILES['livre']['tmp_name'];
$livre_name = $_FILES['livre']['name'];
// var_dump($livre);
// die();

if (empty($titre) || empty($isbn)) {
    echo "<span class='alert alert-pro alert-dismissible alert-danger col-sm-12 pb-5 mt-5'><strong>Erreur:</strong> Le Titre ne doit pas être vide.<br/>";
} else {


    move_uploaded_file($_FILES["livre"]["tmp_name"], "../../Public/Uploads/" . $_FILES["livre"]["name"]);
    $book_file = "Public/Uploads/" . $_FILES["livre"]["name"];

    if (!empty($book_file)) {
        $add = $book->setBook(
            $titre,
            $typeDoc,
            $isbn,
            $book_file,
            $descr,
            $format,
            $nbr_page,
            $edition,
            $id_author,
            $id_genre,
            $id_book_language,
            $publisher_id,
            $statut
        );

        if ($add) {
            echo "<script>window.location.href='../../index.php?p=livres'</script>";
        } else {
            echo "<span class='alert alert-pro alert-dismissible alert-danger  col-sm-12'>erreur d'insertion </span>";
        }
    } else {
        //successful upload
        // echo "It's done! The file has been saved as: ".$newname;		   
        $add = $b->setBook(
            $titre,
            $typeDoc,
            $isbn,
            $book_file,
            $descr,
            $format,
            $nbr_page,
            $edition,
            $id_author,
            $id_genre,
            $id_book_language,
            $publisher_id,
            $statut
        );
        if ($add) { 
            echo "<script>window.location.href='../../index.php?p=livres'</script>"; 
        } else {
            echo "<span class='alert alert-pro alert-dismissible alert-danger  col-sm-12'>erreur d'insertion </span>";
        }
    }
}
    
   
//
