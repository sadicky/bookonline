<!-- /.col-lg-12 -->
<div class="row">
    <!-- /.panel-heading -->
    <div class="col-lg-4">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <form method="post" id="formulaire_classe">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <b><label>Departement : </label> <span class="text-danger">*</span></b>
                                <select name="fac" id="fac" class='form-select js-select2' data-search="on" required>
                                    <option selected value="" disabled>Choisir Devise</option>
                                    <?php foreach ($facultes as $f) { ?>
                                        <option value='<?= $f->fac_id ?>'><?= $f->fac ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <b><label>Filiere : </label> <span class="text-danger">*</span></b>
                                <select name="dep" id="dep" class='form-select js-select2' data-search="on" required></select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <b><label>Niveau </label></b>
                                <input type='text' name="niv" placeholder="G2" class="form-control" id="niv">
                            </div>
                        </div>

                        <div class="col-sm-12 my-2">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Créer</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class='col-sm-12' id="messages"></div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init-export nowrap table" data-export-title="Export">
                    <thead>
                        <tr>
                            <th>Départements</th>
                            <th>Filieres</th>
                            <th>Niveau</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($classes as $e) : ?>
                            <tr class="odd gradeX">
                                <td><?= $e->fac ?></td>
                                <td><?= $e->dep ?></td>
                                <td><?= $e->classe ?></td>
                                <td>
                                    <button class='btn btn-info btn-xs view_classe' id="<?= $e->classe_id ?>" title='Modification'>
                                        <span class='icon ni ni-edit'></span> Modifier
                                    </button>
                                    <button type='button' id='<?= $e->classe_id ?>' name='delete' class='btn btn-xs btn-danger delete-classe'></span> Supprimer?</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.panel-body -->
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
<?php
include 'Public/modals/editclasse.php';
?>