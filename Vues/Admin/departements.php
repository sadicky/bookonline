<!-- /.col-lg-12 -->
<div class="row">
    <!-- /.panel-heading -->
    <div class="col-lg-4">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <form method="post" id="formulaire_dep">
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
                                <b><label>Filiere </label></b>
                                <input type='text' name="dep" placeholder="Génie Logiciel" class="form-control" id="dep">
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
        <div class='col-sm-12 py-4' id="messages"></div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init-export nowrap table" data-export-title="Export">
                    <thead>
                        <tr>
                            <th>Départements</th>
                            <th>Filieres</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($departements as $e) : ?>
                            <tr class="odd gradeX">
                                <td><?= $e->fac ?></td>
                                <td><?= $e->dep ?></td>
                                <td>
                                    <button class='btn btn-info btn-xs view_dep' id="<?= $e->dep_id ?>" title='Modification'>
                                        <span class='icon ni ni-edit'></span> Modifier
                                    </button>
                                    <button type='button' id='<?= $e->dep_id ?>' name='delete' class='btn btn-xs btn-danger delete-dep'></span> Supprimer?</button>
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
include 'Public/modals/editdep.php';
?>