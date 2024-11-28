<div class="nk-content-body mt-0">
    <?php if ($_SESSION['role'] == 'Librarian'): ?>
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">

                <div class="nk-block-head-content">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-return"><em class="icon ni ni-plus"></em><span>Livre Retourné</span></a>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->

    <?php endif ?>

    <div class='col-sm-12 my-4' id="messages"></div>
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <?php if($_SESSION['role']=='Membre'):?>
                    <table class="table">
                    <?php else: ?>
                    <table class="datatable-init-export nowrap table" data-export-title="Export">
                    <?php endif ?>
                    <thead>
                        <tr class="tb-tnx-head">
                            <th>Matricule</th>
                            <th>Noms</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // var_dump($data);die();
                        foreach ($data as $user) : ?>
                            <tr>

                                <td><?= $user->matricule ?></td>
                                <td><?= $user->nom ?> <?= $user->prenom ?> <?= $user->postnom ?></td>
                                <td><a href="<?= WEBROOT ?>view?id=<?= $user->id_book ?>"><?= $user->titre ?></a></td>
                                <td><?= $user->auteur ?></td>
                                <td><?= $user->date ?></td>
                            </tr>
                        <?php
                        endforeach ?>
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->


</div>

<?php
include('Public/modals/addreturn.php');
// include 'Public/modals/edituser.php';
?>