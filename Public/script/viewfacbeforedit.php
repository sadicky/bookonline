<?php
require_once('../../Models/Admin/member.class.php');
$member = new Member();
$id = isset($_POST['id']) ? $_POST['id'] : '';
$view = $member->getFaculty($id);

?>


<form action="#" method="post" class="mt-2" id="formeditfac">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <b><label>Departement</label></b>
                <input type='text' name="fac" value="<?= $view->fac ?>" class="form-control" id="fac">
                <input type='hidden' name="id" value="<?= $id ?>" class="form-control" id="id">
            </div>
        </div>
        <div class="col-sm-6">
            <b><label># </label></b>
            <button class="btn btn-primary fac btn-block btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Enregistrer </button>
        </div>

    </div>
</form>