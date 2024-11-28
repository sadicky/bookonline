<?php
require_once('../../Models/Admin/member.class.php');
$member = new Member();
$id = isset($_POST['id']) ? $_POST['id'] : '';
$view = $member->getDepartement($id);
// var_dump($view);die();
?>


<form action="#" method="post" class="mt-2" id="formeditdep">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label> Departement</label>
                <input type='hidden' name="id" value="<?= $id ?>" class="form-control" id="id">
                <input type="text" class="form-control"  value="<?= $view->fac ?>" readonly>
                <input type="hidden" name="fac" id="fac" class="form-control"  value="<?= $view->fac_id ?>">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <b><label>Filiere :</label></b>
                <input type='text' name="dep" value="<?= $view->dep ?>" class="form-control" id="dep">
            </div>
        </div>
        <div class="col-sm-4">
            <b><label># </label></b>
            <button class="btn btn-primary dep btn-block btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Enregistrer </button>
        </div>

    </div>
</form>