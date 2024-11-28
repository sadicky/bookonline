<div class="nk-content-body mt-0">

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
			        				<th>ISBN</th>
			        				<th>Titre</th>
			        				<th>Auteur</th>
			        				<th>Statut</th>
                            <?php if($_SESSION['role']!='Membre'):?>
                            <th>Qté</th>
                            <?php endif ?>
                            <?php if($_SESSION['role']!='Membre'):?>
                            <th>Ajouter Qté</th>
                            <?php endif ?>
			        			</tr>
                    </thead>
                    <tbody>
                        <?php
                        // var_dump($data);die();
                        foreach ($data as $user) : ?>
                            <tr>
                                <td><a href="<?=WEBROOT?>view?id=<?= $user->id_book?>"><?= $user->isbn ?></a></td>
                                <td><?= $user->titre ?></td>
                                <td><?= $user->auteur ?></td>
                                <td>
                                    <?php
                                        if ($user->qty != 0) echo '<span class="badge bg-success">Disponible</span>' ;
                                        else echo '<span class="badge bg-danger">No Dispo</span>';
                                     ?>
                                </td>
                            <?php if($_SESSION['role']!='Membre'):?>
                            <td><?=$user->qty?></td>
                            <?php endif ?>
                            <?php if($_SESSION['role']!='Membre'):?>
                            <td><a href="<?=WEBROOT?>addqty?id=<?= $user->id_book?>"><em class="icon ni ni-edit"></em><span>Ajouter Qté</span></a></td>
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
include('Public/modals/addqty.php');
// include 'Public/modals/edituser.php';
?>
