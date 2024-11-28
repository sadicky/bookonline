<div class='col-sm-12' id="message"></div>
<div class='col-sm-12 my-4' id="messages"></div>

<div class="row g-gs">

    <div class="col-xxl-3 col-sm-3">
        <div class="card">
            <div class="nk-ecwg nk-ecwg6">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title info">
                            <h6 class="title change up text-danger">Lecteurs</h6>
                        </div>
                    </div>
                    <div class="data">
                        <div class="data-group">
                            <div class="amount"><h4><?=$l?></h4></div>
                        </div>
                    </div>
                </div><!-- .card-inner -->
            </div><!-- .nk-ecwg -->
        </div><!-- .card -->
    </div><!-- .col -->

    
    <div class="col-xxl-3 col-sm-3">
        <div class="card">
            <div class="nk-ecwg nk-ecwg6">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title info">
                            <h6 class="title change up text-danger">Documents</h6>
                        </div>
                    </div>
                    <div class="data">
                        <div class="data-group">
                            <div class="amount"><h4><?=$b?></h4></div>
                        </div>
                    </div>
                </div><!-- .card-inner -->
            </div><!-- .nk-ecwg -->
        </div><!-- .card -->
    </div><!-- .col -->

    
    <div class="col-xxl-3 col-sm-3">
        <div class="card">
            <div class="nk-ecwg nk-ecwg6">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title info">
                            <h6 class="title change up text-danger">Auteurs</h6>
                        </div>
                    </div>
                    <div class="data">
                        <div class="data-group">
                            <div class="amount"><h4><?=$a?></h4></div>
                        </div>
                    </div>
                </div><!-- .card-inner -->
            </div><!-- .nk-ecwg -->
        </div><!-- .card -->
    </div><!-- .col -->

    
    <div class="col-xxl-3 col-sm-3">
        <div class="card">
            <div class="nk-ecwg nk-ecwg6">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title info">
                            <h6 class="title change up text-info">Catégories</h6>
                        </div>
                    </div>
                    <div class="data">
                        <div class="data-group">
                            <div class="amount"><h4><?=$g?></h4></div>
                        </div>
                    </div>
                </div><!-- .card-inner -->
            </div><!-- .nk-ecwg -->
        </div><!-- .card -->
    </div><!-- .col -->

</div><!-- .row -->

        <div class="card card-bordered card-preview my-3">
            <div class="card-inner">
                <?php if($_SESSION['role']=='SGAC' || $_SESSION['role']=='Membre' ) :?>
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
                                                        <li><a href="#" id="<?= $user->id_member ?>" class="view_data"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                        <li><a href="#" class="delete" id="<?= $user->id_member ?>"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
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