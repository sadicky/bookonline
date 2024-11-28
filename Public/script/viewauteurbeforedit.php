<?php
require_once('../../Models/Admin/book.class.php');
$book = new Book();
$id = isset($_POST['id']) ? $_POST['id'] : '';
$view = $book->getAuthor($id);

?>


<form action="#" method="post" class="mt-2" id="formeditaut">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <b><label>Auteur</label></b>
                <input type='text' name="aut" value="<?= $view->names ?>" class="form-control" id="aut">
                <input type='hidden' name="id" value="<?= $id ?>" class="form-control" id="id">
            </div>
        </div>
        <div class="col-sm-6">
            <b><label># </label></b>
            <button class="btn btn-primary edit-auteur btn-block btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Enregistrer </button>
        </div>

    </div>
</form>