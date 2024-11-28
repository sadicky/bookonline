<!-- main header @e -->
<!-- content @s -->

<div class="nk-content-body pt-0">

    <div class='col-sm-12' id="message"></div>
    <div class='col-sm-12 my-4' id="messages"></div>
    <?php if($_SESSION['role']!='SGAC'):?>
    <button class="btn btn-danger btn-xs" id="print_r"><i class="fa fa-file-pdf-o fa-fw"></i> Imprimer PDF</button>
    
    <?php endif ?>

    <div class="col-lg-12 py-3">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <form method="post" action="index.php?p=rdoc">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select class="form-select js-select2" data-search="on" name="type">
                                    <option value="0">Select Documents</option>
                                    <option value="Ouvrage">Ouvrage</option>
                                    <option value="TFC">TFC</option>
                                    <option value="Memoire">Memoire</option>
                                    <option value="R. Stage">Rapport de Stage</option>
                                    <option value="P. Tut">Projet Tutoré</option>
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
                    <h5><u>RAPPORT DE DOCUMENTS</u></h5>
                </center>

                <?php if (isset($_POST['submit'])) : ?>

                    <table class="table table-bordered my-3">
                        <thead>
                            <tr class="tb-tnx-head">
                                <th>Categorie</th>
                                <th>Titre</th>
                                <th>ISBN</th>
                                <th>Auteur</th>
                                <th>Num. Pages</th>
                                <th>Type</th>
                                <th>Date Enreg.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once('Models/Admin/book.class.php');
                            $s = new Book();
                            @$type = $_POST['type'];
                            @$data = $s->getBooksType($type);
                            foreach ($data as $user) : ?>
                                <tr>
                                    <td><?= $user->genre ?></td>
                                    <td><?= $user->titre ?></td>
                                    <td><?= $user->isbn ?></td>
                                    <td><?= $user->auteur ?></td>
                                    <td><?= $user->nbr_page ?></td>
                                    <td><?= $user->typeDoc ?></td>
                                    <td><?= $user->created_at ?></td>
                                </tr>
                            <?php
                            endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <table class="table table-bordered my-3">
                        <thead>
                            <tr class="tb-tnx-head">
                                <th>Categorie</th>
                                <th>Titre</th>
                                <th>ISBN</th>
                                <th>Auteur</th>
                                <th>Num. Pages</th>
                                <th>Type</th>
                                <th>Date Enreg.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $user) : ?>
                                <tr>
                                    <td><?= $user->genre ?></td>
                                    <td><?= $user->titre ?></td>
                                    <td><?= $user->isbn ?></td>
                                    <td><?= $user->auteur ?></td>
                                    <td><?= $user->nbr_page ?></td>
                                    <td><?= $user->typeDoc ?></td>
                                    <td><?= $user->created_at ?></td>
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