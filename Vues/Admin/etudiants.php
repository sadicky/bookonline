<div class="nk-content-body mt-0">

    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init-export nowrap table" data-export-title="Export">
                    <thead>
                        <tr class="tb-tnx-head">
                            <th>#</th>
                            <th>Noms</th>
                            <th>E-mail</th>
                            <th>Tel</th>
                            <th>Classe</th>
                            <th>Departement</th>
                            <th>Faculty</th>
                            <th>Statut</th>
                            <th>Act/Des</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $user) : ?>
                            <tr>
                                <td><?= $user->matricule ?></td>
                                <td><a href="#"><?= $user->nom ?> <?= $user->prenom ?></a></td>
                                <td><?= $user->email ?></td>
                                <td><?= $user->tel ?></td>
                                <td><?= $user->classe ?></td>
                                <td><?= $user->dep ?></td>
                                <td><?= $user->fac ?></td>
                                <?php
                                if ($user->statut == 0) {
                                    echo "<td> <span class='text-danger'> Desactiver</span></td>";
                                } else {
                                    echo "<td> <span class='text-success'> Activer</span></td>";
                                }
                                if ($user->statut == 0) {
                                    echo "<td><button type='button'  id='" . $user->id_member . "' name='activer' class='btn btn-xs btn-round btn-dark activers'><span class='glyphicon glyphicon-ok' ></span> Activer?</button></td>";
                                } else {
                                    echo "<td>	<button type='button'  id='" . $user->id_member . "' name='desactiver' class='btn btn-round btn-xs btn-danger desactivers'><span class='glyphicon glyphicon-remove' ></span> Desactiver?</button>
                                                            </td>";
                                } ?>
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
include('Public/modals/addbook.php');
// include 'Public/modals/edituser.php';
?>