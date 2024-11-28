<div class="nk-content-body mt-0">
<?php if($_SESSION['role']!='Membre'):?>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">

            <div class="nk-block-head-content">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-book"><em class="icon ni ni-plus"></em><span>Nouveau Document</span></a>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    
    <?php endif ?>

    <div class='col-sm-12' id="message"></div>
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
                            <th>#</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Type</th>
                            <th>Format</th>
                            <th>Detail</th>
                            <?php if($_SESSION['role']!='Membre'):?>
                            <th></th>
                            <?php endif ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // var_dump($data);die();
                        foreach ($data as $user) : ?>
                            <tr>
                                <td><a href="#"><?= $user->isbn ?></a></td>
                                <td><?= $user->titre ?></td>
                                <td><?= $user->auteur ?></td>
                                <td><?= $user->typeDoc ?></td>
                                <td><?= $user->format ?></td>
                                <td> <a href="<?=WEBROOT?>view?id=<?= $user->id_book?>" class='btn btn-xs btn-warning'><em class='icon ni ni-eye'></em></a></td>
                                <?php if($_SESSION['role']!='Membre'):?>
                               <td>

                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#" id="<?= $user->id_book ?>" class="view_data_book"><em class="icon ni ni-edit"></em><span>Modifier</span></a></li>
                                                        <li><a href="#" class="supprimer-book" id="<?= $user->id_book ?>"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
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
include('Public/modals/addbook.php');
include 'Public/modals/editbook.php';
?>