<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="assets/css/dashlite.css">
<link id="skin-default" rel="stylesheet" href="assets/css/theme.css">
<link rel="stylesheet" href="assets/css/editors/summernote.css">
<?php

session_start();

require_once('../../Models/Admin/book.class.php');
$id = $_POST['id'];
// var_dump($id);
$s = new Book();
$dat = $s->getAuthor($id);
$user = $s->getAuthorBook($id);
$nb = $s->getCAuthorBook($id);
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
    <h5><u>RAPPORT DE <?= $dat->names ?></u></h5>
</center>
<h5>Nombre de documents <label style="color:red">(<?= $nb->nb ?>)</label></h5>
<table width="100%" style="margin-bottom:35px;">
    <thead>
        <tr>
            <th>Categorie</th>
            <th>Titre</th>
            <th>ISBN</th>
            <th>Num. Pages</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $user->genre ?></td>
            <td><?= $user->titre ?></td>
            <td><?= $user->isbn ?></td>
            <td><?= $user->nbr_page ?></td>
        </tr>
    </tbody>
</table>

<div style="padding-top:35px;">
    <center style="text-align: right;">
        <span>Fait à Uvira, <b>Le <?= date("d-m-Y") ?></b></span><br>
        <b>Sceau et Signature</b>
    </center>
</div>