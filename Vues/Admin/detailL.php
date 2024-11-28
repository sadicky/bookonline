<div class='col-sm-12' id="message"></div>
<!-- /.col-lg-12 -->
<div class="panel-heading">
  Info du Lecteur <strong style="color:red">(<?php echo  $data->nom.' '.$data->prenom.' '.$data->postnom; ?>)</strong>
</div>
<!-- /.panel-heading -->
<div class="row-fluid">
  <div class="row">
    <div class="col-md-8">
      <div class="card card-bordered card-preview">
        <div class="card-inner">
        <table class="table table-bordered">
                <tr>
                    <th>Matricule</th>
                    <td><?=$data->matricule?></td>
                </tr>
                <tr>
                    <th>Noms</th>
                    <td><?=$data->nom?> <?=$data->prenom?> <?=$data->postnom?></td>
                </tr>
                <tr>
                    <th>Sexe</th>
                    <td><?=$data->sexe?></td>
                </tr>
                <tr>
                    <th>Numero Carte</th>
                    <td><?=$data->card_number?></td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td><?=$data->email?></td>
                </tr>
                <tr>
                    <th>Tel</th>
                    <td><?=$data->tel?></td>
                </tr>
                <tr>
                    <th>Provenance</th>
                    <td><?=$data->provenance?></td>
                </tr>
                <tr>
                    <th>Contact Autorité</th>
                    <td><?=$data->contact_autorite?></td>
                </tr>
            </table>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-bordered card-preview">
        <div class="card-inner">
          <h4 class="page-header" style="margin-top:0px;"><b style="color:blue;"></b></h4>
                    <a class="btn btn-primary btn-xs btn-block" href="Public/script/generate.php?id=<?= $data->id_member  ?>">Generer une Carte d'Etudiant</a>
        </div>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->