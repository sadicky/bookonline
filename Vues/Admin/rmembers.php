<!-- main header @e -->
<!-- content @s -->

<div class="nk-content-body pt-0">

    <div class='col-sm-12' id="message"></div>
    <div class='col-sm-12 my-4' id="messages"></div>

    <?php if($_SESSION['role']!='SGAC'):?>
    <button class="btn btn-danger btn-xs" id="print_l"><i class="fa fa-file-pdf-o fa-fw"></i> Imprimer PDF</button>
    <?php endif?>   

    <div class="col-lg-12 py-3">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <form method="post" action="index.php?p=rmember">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="type" class="form-select js-select2" data-search="on">
                                    <option value="0">Selectionner Type Lecteur</option>
                                    <option value="I">Interne</option>
                                    <option value="E">Externe</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <button name="submit" class="btn btn-primary btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Filtrer </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">

                <div class="row">
                    <div class="col-md-2">
                        <img width="80px" src="assets/images/logo.jpg" srcset="assets/images/logo.jpg" alt="logo">
                    </div>
                    <div class="col-md-8">
                        <center>
                            <h4>INSTITUT SUPERIEUR DE COMMERCE</h4>
                            <b>BIBLIOTHEQUE</b>
                        </center>
                    </div>
                    <div class="col-md-2">
                        <img width="80px" src="assets/images/logo.jpg" srcset="assets/images/logo.jpg" alt="logo">
                    </div>
                </div>
                <hr>
                <center>
                    <h5><u>RAPPORT DE LECTEURS</u></h5>
                </center>

                <?php if (isset($_POST['submit'])) : ?>

                    <table class="table table-bordered my-3">
                        <thead>
                            <tr class="tb-tnx-head">
                                <th>Matricule</th>
                                <th>Noms</th>
                                <th>Sexe</th>
                                <th>E-mail</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once('Models/Admin/member.class.php');
                            $s = new Member();
                            @$type = $_POST['type'];
                            @$data = $s->getMembersType($type);
                            foreach ($data as $user) : ?>
                                <tr>
                                    <td><a href="index.php?p=detailL&id=<?= $user->id_member  ?>"><?= $user->matricule ?></a></td>
                                    <td><?= $user->nom ?> <?= $user->postnom ?> <?= $user->prenom ?></td>
                                    <td><?= $user->sexe ?></td>
                                    <td><?= $user->email ?></td>
                                    <td>
                                        <?php
                                        if ($user->type == 'I')
                                            echo 'Interne';
                                        else echo "Externe";
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <table class="table table-bordered my-3">
                        <thead>
                            <tr class="tb-tnx-head">
                                <th>Matricule</th>
                                <th>Noms</th>
                                <th>Sexe</th>
                                <th>E-mail</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $user) : ?>
                                <tr>
                                    <td><a href="index.php?p=detailL&id=<?= $user->id_member  ?>"><?= $user->matricule ?></a></td>
                                    <td><?= $user->nom ?> <?= $user->postnom ?> <?= $user->prenom ?></td>
                                    <td><?= $user->sexe ?></td>
                                    <td><?= $user->email ?></td>
                                    <td>
                                        <?php
                                        if ($user->type == 'I')
                                            echo 'Interne';
                                        else echo "Externe";
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            endforeach ?>
                        </tbody>
                    </table>
                <?php endif ?>

                <div class="row py-5">
                    <div class="col-md-3"></div>
                    <div class="col-md-6"></div>
                    <div class="col-md-3">
                        <center>
                            <span>Fait à Uvira, <b>Le <?= date("d-m-Y") ?></b></span><br>
                            <b>Sceau et Signature</b>
                        </center>
                    </div>
                </div>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->


</div>