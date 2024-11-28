<?php
require_once('../../Models/Admin/member.class.php');
$e = new Member();
// var_dump($_POST);die();
$fac = htmlspecialchars(trim($_POST['fac']));

$add = $e->setFaculty($fac);
if ($add) {
    echo "<span class='alert alert-pro alert-dismissible alert-success col-sm-12'><b>Reussi!!</b> Ajouté avec success</span>";
} else {
    echo "<span class='alert alert-pro  alert-dismissible alert-danger col-sm-12'>erreur d'insertion <button type='button' class='close' data-dismiss='alert'>x</button></span>";
}
