<?php

require_once('../../Models/Admin/member.class.php');
require_once('../../Models/Admin/user.class.php');
$users = new User();
$m = new Member();

$nom = htmlspecialchars(trim($_POST['nom']));
$postnom = htmlspecialchars(trim($_POST['postnom']));
$prenom = htmlspecialchars(trim($_POST['prenom']));
$email = htmlspecialchars(trim($_POST['email']));
$sexe = htmlspecialchars(trim($_POST['sexe']));
$matricule = htmlspecialchars(trim($_POST['mat']));
$card_number = htmlspecialchars(trim($_POST['card']));
@$classe = htmlspecialchars(trim($_POST['classe']));
$tel = htmlspecialchars(trim($_POST['tel']));
$type = htmlspecialchars(trim($_POST['type']));
$provenance = htmlspecialchars(trim($_POST['prov']));
$contact_autorite = htmlspecialchars(trim($_POST['aut']));
$adresse = htmlspecialchars(trim($_POST['adresse']));
$type = htmlspecialchars(trim($_POST['type']));
$fx= htmlspecialchars(trim($_POST['fonction']));
$promo= htmlspecialchars(trim($_POST['promo']));
$ville= htmlspecialchars(trim($_POST['ville']));

$pwd = htmlspecialchars(trim($_POST['pwd']));
$cpwd = htmlspecialchars(trim($_POST['cpwd']));
$statut = 0;

@$getEmail = $m->getMemberEmail($email);

if (@$getEmail->email != $email) {
    if ($pwd != $cpwd) {
        echo "<span class='alert alert-pro alert-dismissible alert-danger fw-bold col-sm-12'>
                <strong  style='color:red'>Erreur:</strong> Les mots de passe doivent être identique.<br/>";
    } else {
        if (empty($nom) && empty($prenom) && empty($email)) {
            echo "<span class='alert alert-pro alert-dismissible alert-danger col-sm-12 pb-5 mt-5'>
            <strong>Erreur:</strong> Ces champs ne doivent pas être vide.<br/>";
        } else {

            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 8);
            

            $subject = 'Email verification code';
            $body    = 'Voici ton code de vérification:' . $verification_code;

            $t = mail($email, $subject, $body, 'From:admin@bookapp.com');

            $noms =  $nom . ' ' . $postnom . ' ' . $prenom;
            $users->setUser($card_number, $pwd, 'Membre', $noms, $email, $tel);
            $add = $m->setMember($nom, $postnom, $prenom, $sexe, $card_number, $type, $provenance, $contact_autorite, $matricule, $email, $adresse, $tel, $verification_code, $statut,$fx,$promo,$ville, $classe);

            echo "<script>window.location.href='index.php?p=verification&email=$email'</script>";
            
            if ($add) {
                echo "<script>window.location.href='index.php?p=verification&email=$email'</script>";

                echo "<span class='alert alert-pro alert-success alert-dismissible  col-sm-12'>
                <strong>Message</strong> envoyé avec succes.<br/>";
            } else {
                echo "<span class='alert alert-pro alert-dismissible alert-danger  col-sm-12'>erreur d'insertion </span>";
            }
        }
    }
} else {
    echo "<span class='alert alert-pro alert-dismissible alert-danger  col-sm-12'><strong>Erreur:</strong> Cet adresse Email existe déjà. Veillez la changée </span>";
}


//
