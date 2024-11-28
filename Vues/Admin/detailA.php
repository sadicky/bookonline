<div class='col-sm-12' id="message"></div>
<!-- /.col-lg-12 -->
<div class="panel-heading">
  Info de l'Auteur <strong style="color:red">(<?=$dat->names?>)</strong>
</div>

<?php if($_SESSION['role']!='Membre'):?>
                    <button class="btn btn-danger pull-right my-2 btn-xs" id="print_aut"><i class="fa fa-file-pdf-o fa-fw"></i> Imprimer PDF</button>
                <?php endif?>
                   
<!-- /.panel-heading -->
<div class="row-fluid">
  <div class="row">
    <div class="col-md-12 ">
      <div class="card card-bordered card-preview">
        <div class="card-inner">
             <h5>nombre de documents <label style="color:red">(<?=$nb->nb?>)</label></h5>
        <table class="table table-bordered">
                <tr>
                    <th>ISBN</th>
                    <th>Document</th>
                    <th>Categorie</th>
                    <th>Maison d'Edition</th>
                </tr>
                <?php if($nb->nb>0):?>
                <tr>
                <td><?=$data->isbn?></td>
                <td><?=$data->titre?></td>
                    <td><?=$data->genre?></td>
                    <td><?=$data->publisher?></td>
                </tr>
                <?php else:?>
                    <h5>Aucun Document</h5>
                <?php endif?>
            </table>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->