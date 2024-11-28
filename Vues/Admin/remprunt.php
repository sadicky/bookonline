<!-- main header @e -->
<!-- content @s -->

<div class="nk-content-body pt-0">

    <div class='col-sm-12' id="message"></div>
    <div class='col-sm-12 my-4' id="messages"></div>


    <div class="col-lg-12 py-3">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <form method="post" action="index.php?p=ret">
                    <div class="row">
                           <div class="col-sm-4 px-2">
                            <div class="form-group">
                                <b><label>Du</label></b>
                                <input class="form-control" type="date" id="fromdate" name="fromdate" required="true">
                            </div>
                        </div>
                        <div class="col-sm-4 px-2">
                            <div class="form-group">
                                <b><label>Au</label></b>
                                <input class="form-control" type="date" id="todate" name="todate" required="true">
                            </div>
                        </div>
                        <div class="col-sm-4">
                        <b><label>#</label></b>
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
                    <h5><u>RAPPORT DE DOCUMENTS EMPRUNTES</u></h5>
                </center>

                <?php if (isset($_POST['submit'])) : ?>

                    <table class="table table-bordered my-3">
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
                            require_once('Models/Admin/book.class.php');
                            $s = new Book();
                            $fdate = $_POST['fromdate'];
                            $tdate = $_POST['todate'];
                            
                
                            @$data = $s->getReturn($fdate, $tdate);
                            // var_dump($data);
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
                <?php else: ?>
                    <table class="table table-bordered my-3">
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
                <?php endif ?>

                <div class="row py-5">
                    <div class="col-md-3">
                    <?php if($_SESSION['role']!='SGAC'):?>
                    <button class="btn btn-danger btn-xs" id="print_emprunt"><i class="fa fa-file-pdf-o fa-fw"></i> Imprimer PDF</button>
                <?php endif?>    
                </div>
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