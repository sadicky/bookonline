<!-- main header @e -->
<!-- content @s -->
<div class="nk-content-body">

    <div class='col-sm-12' id="message"></div>
    <div class='col-sm-12 my-4' id="messages"></div>

    <!-- /.col-lg-12 -->
    <div class="row">
        <div class="col-lg-12">
            <!-- /.panel-heading -->
            <?php if ($_SESSION['role'] != 'Membre'): ?>
                <div class="col-lg-12">
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <h4 class="page-header">Nouvel Auteur</h4>
                            <form method="post" id="formulaire_auteurs">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <b><label>Auteur </label></b>
                                            <input type='text' name="name" placeholder="Nouvel Auteur" class="form-control" id="name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <b><label># </label></b><br>
                                            <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Enregistrer </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <p></p>
            <div class="card card-bordered card-preview">
                <div class="card-inner">
                    <?php if ($_SESSION['role'] == 'Membre'): ?>
                        <table class="table">
                        <?php else: ?>
                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                            <?php endif ?>
                            <thead>
                                <tr class="tb-tnx-head">
                                    <th>Auteurs</th>
                                    <?php if ($_SESSION['role'] != 'Membre'): ?>
                                        <th>Actions</th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cnt = 1;
                                foreach ($auteurs as $e) : ?>
                                    <tr class="odd gradeX">
                                        <td><a href="<?= WEBROOT ?>detailA?id=<?= $e->id_author  ?>"><?= $e->names ?></a></td>

                                        <?php if ($_SESSION['role'] != 'Membre'): ?>
                                            <td> <button class='btn btn-info btn-xs view_data_auteur' id="<?= $e->id_author ?>" title='Modification'>
                                                    <span class='icon ni ni-edit'> </span> Modifier
                                                </button>
                                                <button type='button' id='<?= $e->id_author ?>' name='delete' class='btn btn-xs btn-danger delete-auteur'></span> Supprimer?</button>
                                            </td>
                                        <?php endif ?>
                                    </tr>
                                <?php $cnt++;
                                endforeach ?>
                            </tbody>
                            </table>
                </div>
            </div><!-- .card-preview -->
        </div>
    </div><!-- .card-preview -->
    <!-- /.panel-body -->
</div>
<!-- content @e -->
<!-- app-root @e -->
<?php
include 'Public/modals/editaut.php';
?>