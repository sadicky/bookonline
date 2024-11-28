<?php
require_once('../../Models/Admin/member.class.php');
$b = new Member();
$id = isset($_POST['id']) ? $_POST['id'] : '';

if ($id) {
    $delete = $b->deleteDep($id);
    if ($delete)
        echo "<span class='alert alert-pro alert-dismissible alert-success col-sm-12'><b>Reussi!!</b> Suppression avec succes</span>";
    else echo "<span class='alert alert-pro alert-dismissible alert-danger col-sm-12'>Erreur</span>";
}
