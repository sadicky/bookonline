<?php
require_once('../../Models/Admin/member.class.php');
require_once('../../Models/Admin/user.class.php');
$users = new User();
$m = new Member();

$email = htmlspecialchars(trim($_POST['email']));
$code = htmlspecialchars(trim($_POST["code"]));

$t = $m->getMemberEmail($email);
$c = $t->code;

if ($code==$c) {
    
    $add = $m->setMailVerification($email, $code);
    
    $d = $users->getUserByEmail($email);
    $users->activUser($d->id_user);

    if ($add) {
        echo "<script>window.location.href='index.php?p=plan&email=$email'</script>";
       
    } else {
        echo "<span class='alert alert-pro alert-dismissible alert-danger  col-sm-12'>Erreur de Validation </span>";
    }
}else{
    echo "<span class='alert alert-pro alert-dismissible alert-danger  col-sm-12'>Code Incorrect </span>";
}    

