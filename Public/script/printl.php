<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="assets/css/dashlite.css">
<link id="skin-default" rel="stylesheet" href="assets/css/theme.css">
<link rel="stylesheet" href="assets/css/editors/summernote.css">
<?php

session_start();

require_once('../../Models/Admin/member.class.php');

$s = new Member();
$data = $s->getMembers();
?>
<style>
    table,
    th,
    td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<div class="row">
    <center>
        <span> <img width="60px" src="assets/images/logo.jpg" srcset="assets/images/logo.jpg" alt="logo"></span>
        <b style="font-size: 20px;">INSTITUT SUPERIEUR DE COMMERCE</b>
        <span> <img width="60px" src="assets/images/logo.jpg" srcset="assets/images/logo.jpg" alt="logo"></span><br>
        <b>BIBLIOTHEQUE</b>

    </center>

</div>
</div>
<hr>
<center>
    <h5><u>RAPPORT DE LECTEURS</u></h5>
</center>

<table width="100%" style="padding-bottom:35px;">
    <thead>
        <tr>
            <th>Matricule</th>
            <th>Noms</th>
            <th>Sexe</th>
            <th>E-mail</th>
            <th>Type</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $user) : ?>
            <tr>
                <td><?= $user->matricule ?></td>
                <td><?= $user->nom ?> <?= $user->postnom ?> <?= $user->prenom ?></td>
                <td><?= $user->sexe ?></td>
                <td><?= $user->email ?></td>
                <td>
                    <?php
                    if ($user->type == 'I')
                        echo 'Interne';
                    else echo "Externe";
                    ?>
                </td>
            </tr>
        <?php
        endforeach ?>
    </tbody>
</table>

<div style="padding-top:35px;">
    <center style="text-align: right;">
        <span>Fait à Uvira, <b>Le <?= date("d-m-Y") ?></b></span><br>
        <b>Sceau et Signature</b>
    </center>
</div>