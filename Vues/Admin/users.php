<!-- main header @e -->
<!-- content @s -->
<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">

            <div class="nk-block-head-content">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-user"><em class="icon ni ni-plus"></em><span>Nouvel Utilisateur</span></a>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->

    <div class='col-sm-12' id="message"></div>
    <div class='col-sm-12 my-4' id="messages"></div>

    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init-export nowrap table" data-export-title="Export">
                    <thead>
                        <tr class="tb-tnx-head">
                            <th>#</th>
                            <th>username</th>
                            <th>Fonction</th>
                            <th>Statut</th>
                            <th>Act/Des</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $cnt = 1;
                        foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $cnt ?></td>
                                <td><?= $user->username ?></td>
                                <td><?= $user->role ?></td>
                                <?php
                                if ($user->statut == 0) {
                                    echo "<td> <span class='text-danger'> Desactiver</span></td>";
                                } else {
                                    echo "<td> <span class='text-success'> Activer</span></td>";
                                }
                                if ($user->statut == 0) {
                                    echo "<td><button type='button'  id='" . $user->id_user . "' name='activer' class='btn btn-xs btn-round btn-dark activerU'><span class='glyphicon glyphicon-ok' ></span> Activer?</button></td>";
                                } else {
                                    echo "<td>	<button type='button'  id='" . $user->id_user . "' name='desactiver' class='btn btn-round btn-xs btn-danger desactiverU'><span class='glyphicon glyphicon-remove' ></span> Desactiver?</button>
                                                            </td>";
                                } ?>
                            </tr>
                        <?php $cnt++;
                        endforeach ?>
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->


</div>

<?php
include('Public/modals/adduser.php');
// include 'Public/modals/edituser.php';
?>