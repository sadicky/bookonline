<?php
require_once('../../Models/Admin/book.class.php');
$book = new Book();
$id = isset($_POST['id']) ? $_POST['id'] : '';
$view = $book->getBLanguage($id);

?>


<form action="#" method="post" class="mt-2" id="formeditbl">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <b><label>Langue</label></b>
                <input type='text' name="names" value="<?= $view->names ?>" class="form-control" id="names">
                <input type='hidden' name="id" value="<?= $id ?>" class="form-control" id="id">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <b><label>Code</label></b>
                <input type='text' name="code" value="<?= $view->code ?>" class="form-control" id="code">
             </div>
        </div>
        <div class="col-sm-4">
            <b><label># </label></b>
            <button class="btn btn-primary bl btn-block btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Enregistrer </button>
        </div>

    </div>
</form>