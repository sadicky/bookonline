<?php
require_once('../../Models/Admin/book.class.php');
$e = new Book();
// var_dump($_POST);die();
$name = htmlspecialchars(trim($_POST['name']));
$desc = '';

$add = $e->setGenre($name, $desc);
if ($add) {
    echo "<span class='alert alert-pro alert-dismissible alert-success col-sm-12'><b>Reussi!!</b> Ajouté avec success</span>";
} else {
    echo "<span class='alert alert-pro  alert-dismissible alert-danger col-sm-12'>erreur d'insertion <button type='button' class='close' data-dismiss='alert'>x</button></span>";
}
