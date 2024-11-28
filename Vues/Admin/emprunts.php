<div class="nk-content-body mt-0">
    <?php if ($_SESSION['role'] == 'Membre'): ?>
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">

                <div class="nk-block-head-content">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-emprunt"><em class="icon ni ni-plus"></em><span>Nouvel Emprunt</span></a>
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
                            <th>Statut</th>
                            <?php if ($_SESSION['role'] != 'Membre'): ?>
                            <th>Validation</th>
                            <?php endif ?>
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
                                <td>
                                    <?php
                                    if ($user->statut == '0') echo '<b>En Attente</b>';
                                    else if ($user->statut == '1') echo '<b style="color:red">Refusé</b>';
                                    else echo '<b style="color:green"">Accepté</b>';
                                    ?>
                                </td>
                                
    <?php if ($_SESSION['role'] != 'Membre'): ?>
                                <td>
                                    <?php
                                    if ($user->statut == 0):?>
                                        <button type='button'  id='<?= $user->id_book ?>' name='activer' class='btn btn-xs btn-success valider-emprunt' ><em class='icon ni ni-ok'></em> Valider?</button>
                                         <button type='button'  id='<?= $user->id_book ?>' name='desactiver' class='btn btn-xs btn-danger refuser-emprunt'><em class='icon ni ni-remove'></em> Refuser?</button>
                                    <?php endif
                                    ?>
                                </td>
                                <?php endif ?>
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
include('Public/modals/addemprunt.php');
// include 'Public/modals/edituser.php';
?>