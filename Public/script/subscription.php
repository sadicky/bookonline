<?php
include('../../Public/includes/header.php');

require_once('../../Models/Admin/subscription.class.php');
require_once('../../Models/Admin/member.class.php');
$m = new Member();
$s = new Subscription();

$email = htmlspecialchars(trim($_POST['email']));
$id_plan = htmlspecialchars(trim($_POST["plan"]));


$d = $m->getMemberEmail($email);
$id_member = $d->id_member;

$p = $s->getPlan($id_plan);
$f = $p->frequence;
if($f=='Mois') {
    $duree = 30;
    $duree = time() + ($duree * 24 * 60 * 60);
}
else if ($f=='Semaine') {
    $duree = 7;
    $duree = time() + ($duree * 24 * 60 * 60);
}
else if ($f=='Année') {
    $duree = 365;    
    $duree = time() + ($duree * 24 * 60 * 60);
}
else {
    $duree = 100000; 
    $duree = time() + ($duree * 24 * 60 * 60);
}

$debut = time();
$fin = $duree;

$timeleft = $fin-$debut;
$daysleft = round((($timeleft/24)/60)/60); 

$membershipStatus = ($timeleft < 0) ? 'Expired' : 'Active';

// echo($daysleft);
// die();

$add = $s->setSubscription($id_member,$id_plan,$debut,$fin,1);
 
if ($add) {
    
    echo "<script>window.location.href='../../index.php?p=login'</script>";
    echo "<span class='alert alert-pro alert-dismissible alert-danger  col-sm-12'><strong>Abonnement</strong> reussi avec succes. Cliquez <a href''>ici</a> pour continuer </span>";
} else {

    echo "<span class='alert alert-pro alert-danger alert-dismissible  col-sm-12'>
        <strong>Erreur:</strong><br/>";
}
