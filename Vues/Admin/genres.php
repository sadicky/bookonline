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
                            <h4 class="page-header">Nouvelle Catégorie</h4>
                            <form method="post" id="formulaire_categories">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <b><label>Catégorie </label></b>
                                            <input type='text' name="name" placeholder="Nouvelle Catégorie" class="form-control" id="name" required>
                                        </div>
                                        <b><label># </label></b>
                                        <button class="btn btn-primary btn-block btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Enregistrer </button>

                                    </div>
                                    <div class="col-sm-5">
                                    </div>
                                    <div class="col-sm-2"></div>
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
                                    <th>Libellé</th>
                                    <?php if ($_SESSION['role'] != 'Membre'): ?>
                                        <th>Actions</th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cnt = 1;
                                foreach ($genres as $e) : ?>
                                    <tr class="odd gradeX">
                                        <td><?= $e->name ?></td>
                                        <?php if ($_SESSION['role'] != 'Membre'): ?>

                                            <td> <button class='btn btn-info btn-xs view_data_categorie' id="<?= $e->id_genre ?>" title='Modification'>
                                                    <span class='icon ni ni-edit'> </span> Modifier
                                                </button>
                                                <button type='button' id='<?= $e->id_genre ?>' name='delete' class='btn btn-xs btn-danger delete-categorie'></span> Supprimer?</button>
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
include 'Public/modals/edituser.php';
?>