<!-- main header @e -->
<!-- content @s -->

<div class="nk-content-body">

    <div class='col-sm-12' id="message"></div>
    <div class='col-sm-12 my-4' id="messages"></div>

    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init-export nowrap table" data-export-title="Export">
                    <thead>
                        <tr class="tb-tnx-head">
                            <th>#</th>
                            <th>Noms</th>
                            <th>Type</th>
                            <th>E-mail</th>
                            <th>Statut</th>
                            <th>Act/Des</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $user) : ?>
                            <tr>
                                <td><a href="index.php?p=detailL&id=<?= $user->id_member  ?>"><?= $user->matricule ?></a></td>
                                <td><?= $user->nom ?> <?= $user->postnom ?> <?= $user->prenom ?></td>
                                <td>
                                    <?php
                                    if ($user->type == 'I')
                                        echo 'Membre Interne';
                                    else echo "Membre Externe";
                                    ?></td>
                                <td><?= $user->email ?></td>
                                <?php
                                if ($user->statut == 0) {
                                    echo "<td> <span class='text-danger'> Desactiver</span></td>";
                                } else {
                                    echo "<td> <span class='text-success'> Activer</span></td>";
                                }
                                if ($user->statut == 0) {
                                    echo "<td><button type='button'  id='" . $user->id_member . "' name='activer' class='btn btn-xs btn-round btn-dark activerM'><span class='glyphicon glyphicon-ok' ></span> Activer?</button></td>";
                                } else {
                                    echo "<td>	<button type='button'  id='" . $user->id_member . "' name='desactiver' class='btn btn-round btn-xs btn-danger desactiverM'><span class='glyphicon glyphicon-remove' ></span> Desactiver?</button>
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
