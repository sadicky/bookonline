
<!-- /.panel-heading -->
<div class="row-fluid">
  <div class="row">
    <div class="col-md-8">
      <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="table table-bordered">
                <tr>
                    <th>Titre</th>
                    <td><?=$data->titre?></td>
                </tr>
                <tr>
                    <th>Type du Document</th>
                    <td><?=$data->typeDoc?></td>
                </tr>
                <tr>
                    <th>N° ISBN</th>
                    <td><?=$data->isbn?></td>
                </tr>
                <tr>
                    <th>Format</th>
                    <td><?=$data->format?></td>
                </tr>
                <tr>
                    <th>Auteur</th>
                    <td><?=$data->auteur?></td>
                </tr>
                <tr>
                    <th>Categorie</th>
                    <td><?=$data->genre?></td>
                </tr>
                <tr>
                    <th>Nombre de Page</th>
                    <td><?=$data->nbr_page?> Pages</td>
                </tr>
                <tr>
                    <th>Edition</th>
                    <td><?=$data->publisher?> - <?=$data->edition?></td>
                </tr>
                <?php if($data->format=='ebook'):?>
                <tr>
                    <th>Nombre de consultations</th>
                    <td>
                      <?php 
                      if(!@$d->nbr_visit) echo '0';
                      else echo @$d->nbr_visit;
                      ?>
                    </td>
                </tr>
                <?php endif?>
            </table>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-bordered card-preview">
        <div class="card-inner">
          <h4 class="page-header" style="margin-top:0px;"><b style="color:blue;"></b></h4>
          <?php if($data->format=='ebook'):?>
                    <a class="btn btn-primary btn-xs btn-block" href="index.php?p=viewbook&id=<?= $data->id_book  ?>">Visualiser le document</a>
                <?php endif ?>
        </div>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->