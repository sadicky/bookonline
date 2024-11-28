<!-- main header @e -->
<!-- content @s -->
<div class="nk-content-body">

    <div class='col-sm-12' id="message"></div>
    <div class='col-sm-12 my-4' id="messages"></div>

    <!-- /.col-lg-12 -->
    <div class="row">
        <div class="col-lg-12">
            <!-- /.panel-heading -->
            <div class="col-lg-12">
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <h4 class="page-header">Nouvelle Langue</h4>
                        <form method="post" id="formulaire_blanguage">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <b><label>Langue </label></b>
                                        <input type='text' name="name" placeholder="Nouvel Editeur" class="form-control" id="name" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <b><label>Code </label></b>
                                        <input type='text' name="code" placeholder="FR" class="form-control" id="code" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <b><label># </label></b><br>
                                        <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Enregistrer </button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </form>
            </div>
            <p></p>
            <div class="card card-bordered card-preview">
                <div class="card-inner">
                    <table class="datatable-init-export nowrap table" data-export-title="Export">
                        <thead>
                            <tr class="tb-tnx-head">
                                <th>Code</th>
                                <th>Langues</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cnt = 1;
                            foreach ($l as $e) : ?>
                                <tr class="odd gradeX">
                                    <td><?= $e->code ?></td>
                                    <td><?= $e->names ?></td>
                                    <td> <button class='btn btn-info btn-xs view_data_bl' id="<?= $e->id_book_language ?>" title='Modification'>
                                            <span class='icon ni ni-edit'> </span> Modifier
                                        </button>
                                        <button type='button' id='<?= $e->id_book_language ?>' name='delete' class='btn btn-xs btn-danger delete-blanguage'></span> Supprimer?</button>
                                    </td>
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
include 'Public/modals/editbl.php';
?>