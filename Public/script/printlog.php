<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="assets/css/dashlite.css">
<link id="skin-default" rel="stylesheet" href="assets/css/theme.css">
<link rel="stylesheet" href="assets/css/editors/summernote.css">
<?php

session_start();
require_once('../../Models/Admin/login.class.php');

$s = new Login();
$data = $s->getLogs();
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
    <h5><u>RAPPORT DE FREQUENTATION</u></h5>
</center>

<table width="100%" style="padding-bottom:35px;">
    <thead>
        <tr>
            <th>IP</th>
            <th>HOST</th>
            <th>DESCRIPTION</th>
            <th>ACTION</th>
            <th>CONNECTE</th>
            <th>DECONNECTE</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $user) : ?>
            <tr>
                <td><?= $user->ip ?></td>
                <td><?= $user->host ?></td>
                <td><?= $user->descriptions ?></td>
                <td><?= $user->action ?></td>
                <td><?= $user->created_at ?></td>
                <td><?= $user->deconnect_at ?></td>
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