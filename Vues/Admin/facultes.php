<!-- /.col-lg-12 -->
<div class="row">
    <!-- /.panel-heading -->
    <div class="col-lg-4">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <form method="post" id="formulaire_fac">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <b><label>Departement </label></b>
                                <input type='text' name="fac" placeholder="Informatique" class="form-control" id="fac">
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
                            <th>Departements</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($facultes as $e) : ?>
                            <tr class="odd gradeX">
                                <td><?= $e->fac ?></td>
                                <td>
                                    <button class='btn btn-info btn-xs view_fac' id="<?= $e->fac_id ?>" title='Modification'>
                                        <span class='icon ni ni-edit'></span> Modifier
                                    </button>
                                    <button type='button' id='<?= $e->fac_id ?>' name='delete' class='btn btn-xs btn-danger delete-fac'></span> Supprimer?</button>
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
include 'Public/modals/editfac.php';
?>