<?php
require_once('../../Models/Admin/member.class.php');
$member = new Member();
$id = isset($_POST['id']) ? $_POST['id'] : '';
$view = $member->getClasse($id);
// var_dump($view);die();
?> 


<form action="#" method="post" class="mt-2" id="formeditcl">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label> Filiere</label>
                <input type='hidden' name="id" value="<?= $id ?>" class="form-control" id="id">
                <input type="text" class="form-control"  value="<?= $view->dep ?>" readonly>
                <input type="hidden" name="dep" id="dep" class="form-control"  value="<?= $view->dep_id ?>">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <b><label>Promotion :</label></b>
                <input type='text' name="cl" value="<?= $view->classe ?>" class="form-control" id="cl">
            </div>
        </div>
        <div class="col-sm-4">
            <b><label># </label></b>
            <button class="btn btn-primary cl btn-block btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Enregistrer </button>
        </div>

    </div>
</form>