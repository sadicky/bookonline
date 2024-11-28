<?php
require_once('../../Models/Admin/book.class.php');
$book = new Book();
$id = isset($_POST['id']) ? $_POST['id'] : '';
$view = $book->getPublisher($id);

?>


<form action="#" method="post" class="mt-2" id="formeditpub">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <b><label>Editeur</label></b>
                <input type='text' name="name" value="<?= $view->name ?>" class="form-control" id="name">
                <input type='hidden' name="id" value="<?= $id ?>" class="form-control" id="id">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <b><label>Lieu</label></b>
                <input type='text' name="lieu" value="<?= $view->lieu ?>" class="form-control" id="lieu">
             </div>
        </div>
        <div class="col-sm-4">
            <b><label># </label></b>
            <button class="btn btn-primary edit-publisher btn-block btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Enregistrer </button>
        </div>

    </div>
</form>