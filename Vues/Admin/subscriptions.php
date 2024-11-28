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
                            <th>Noms</th>
                            <th>Email</th>
                            <th>Abonnement</th>
                            <!-- <th>Jours</th>
                            <th>Statut</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($data as $user) : ?>
                            <tr>
                                <td><a href="index.php?p=detailL&id=<?= $user->id_member  ?>"><?= $user->nom ?> <?= $user->postnom ?> <?= $user->prenom ?></a></td>
                                <td><?= $user->email ?></td>
                                <td><?= $user->bouquet ?></td>
                                <?php
                                
                                    $fin = date('d-m-Y',$user->fin) ;
                                    $debut = date('d-m-Y',$user->debut);
                                    $interval = intval($fin) - intval($debut);
                                    
                                    $membershipStatus = ($interval <= 0) ? 'Expired' : 'Actif';

                                    // echo "<td> <span class='text-danger'>".$interval."Jour(s)</span></td>";

                                if ($membershipStatus == 'Expired') {
                                    // echo "<td> <span class='text-danger'> Expired</span></td>";
                                } else {
                                    // echo "<td> <span class='text-success'> Actif</span></td>";
                                }
                                
                              ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->


</div>