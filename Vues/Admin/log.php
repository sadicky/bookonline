<!-- main header @e -->
<!-- content @s -->

<div class="nk-content-body pt-0">

<?php if($_SESSION['role']!='SGAC'):?>
<button class="btn btn-danger btn-xs" id="print_log"><i class="fa fa-file-pdf-o fa-fw"></i> Imprimer PDF</button>
<?php endif?>      
<div class="col-lg-12 py-3">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <form method="post" action="index.php?p=log">
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
                    <h5><u>RAPPORT DE FREQUENTATIONS</u></h5>
                </center>

                <?php if (isset($_POST['submit'])) : ?>

                    <table class="table table-bordered my-3">
                        <thead>
                            <tr class="tb-tnx-head">
                                <th>IP</th>
                                <th>HOST</th>
                                <th>DESCRIPTION</th>
                                <th>ACTION</th>
                                <th>CONNECTE</th>
                                <th>DECONNECTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once('Models/Admin/login.class.php');
                            $s = new Login();
                            $fdate = $_POST['fromdate'];
                            $tdate = $_POST['todate'];
                            
                
                            @$data = $s->getLog($fdate, $tdate);
                            // var_dump($data);
                            foreach ($data as $user) : ?>
                                <tr>
                                    <td><?= $user->ip ?></td>
                                    <td><?= $user->host ?></td>
                                    <td><?= $user->descriptions ?></td>
                                    <td><?= $user->action ?></td>
                                    <td><?= $user->created_at ?></td>
                                    <td><?= $user->deconnect_at ?></td>
                                </tr>
                            <?php
                            endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <table class="table table-bordered my-3">
                        <thead>
                            <tr class="tb-tnx-head">
                                <th>IP</th>
                                <th>HOST</th>
                                <th>DESCRIPTION</th>
                                <th>ACTION</th>
                                <th>CONNECTE</th>
                                <th>DECONNECTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $user) : ?>
                                <tr>
                                    <td><?= $user->ip ?></td>
                                    <td><?= $user->host ?></td>
                                    <td><?= $user->descriptions ?></td>
                                    <td><?= $user->action ?></td>
                                    <td><?= $user->created_at ?></td>
                                    <td><?= $user->deconnect_at ?></td>
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