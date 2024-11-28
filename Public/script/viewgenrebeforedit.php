<?php
require_once('../../Models/Admin/book.class.php');
$book = new Book();
$id = isset($_POST['id']) ? $_POST['id'] : '';
$view = $book->getGenre($id);

?>


<form action="#" method="post" class="mt-2" id="formeditcat">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <b><label>Categorie</label></b>
                <input type='text' name="cat" value="<?= $view->name ?>" class="form-control" id="cat">
                <input type='hidden' name="id" value="<?= $id ?>" class="form-control" id="id">
            </div>
        </div>
        <div class="col-sm-6">
            <b><label># </label></b>
            <button class="btn btn-primary edit-category btn-block btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Enregistrer </button>
        </div>

    </div>
</form>