<?php
require_once('../../Models/Admin/subscription.class.php');
$s = new Subscription();

$name = htmlspecialchars(trim($_POST['name']));
$freq = htmlspecialchars(trim($_POST['freq']));
$prix = htmlspecialchars(trim($_POST['prix']));
$desc = htmlspecialchars(trim($_POST['desc']));

@$getEmail = $s->getPlanName($name);
// var_dump($getEmail);
// die();

if (@$getEmail->name != $name) {
    $add = $s->setPlan($name, $freq, $prix, $desc);
    if ($add) {
        echo "<span class='alert alert-pro alert-success alert-dismissible fw-bold col-sm-12'>
                <strong style='color:green'>Plan</strong> est enregistré avec succes.<br/>";
    } else {
        echo "<span class='alert alert-pro alert-dismissible alert-danger fw-bold col-sm-12'>erreur d'insertion </span>";
    }
} else {
    echo "<span class='alert alert-danger alert-pro alert-dismissible fw-bold col-lg-12'>Ce Plan d'abonnement existe déjà </span>";
}
//